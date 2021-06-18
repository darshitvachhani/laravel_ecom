<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Exports\ProductsExport;
use Maatwebsite\Excel\Facades\Excel;
use Auth;
use Illuminate\Support\Facades\Log;
use App\Imports\ProductsImport;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
Use App\Http\Requests\StoreProductRequest;
Use App\Http\Requests\UpdateProductRequest;



class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        try {
            return view('products/view')-> with('productsArr',Product::all());
            }
            catch (\Exception $e) {
                Log::error($e);
            }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        try {
            $categories = Category::all();
            return view('products/add')->with('categoriesArr',$categories);
            }
            catch (\Exception $e) {
                Log::error($e);
            }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {

        try {

            $productObj=new product;
            $productObj->name =$request->input('name');
            $productObj->user_id = Auth::user()->id;
            $productObj->category_id =$request->input('category');
            $productObj->description =$request->input('description');
            $productObj->price =$request->input('price');
            if ($request->hasFile('image')){

                $filenameWithExt = $request->file('image')->getClientOriginalName ();
                // Get Filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get just Extension
                $extension = $request->file('image')->getClientOriginalExtension();
                // Filename To store
                $fileNameToStore = $filename. '_'. time().'.'.$extension;
                // Upload Image
                $path = $request->file('image')->storeAs('public/images', $fileNameToStore);
                $productObj->image=$fileNameToStore;
            }
            $productObj->save();
            $request->session()->flash('msg','Prouct Added for sale');
            return redirect('products');
        }
        catch (\Exception $e) {
            echo $e;
            Log::error($e);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product,$id)
    {
        //
        try {
        return view('products/edit')->with('productArr',Product::find($id));
        }
        catch (\Exception $e) {
            Log::error($e);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product,$id)
    {

        try {
        $productObj= Product::find($request->id);
        $productObj->name =$request->input('name');
        $productObj->description =$request->input('description');
        $productObj->price =$request->input('price');
        if($request->hasFile('image'))
        {
            //Delete Old Image
            if(File::exists('../storage/app/public/images/'.$productObj->image))
            {
                    File::delete('../storage/app/public/images/'.$productObj->image);
            }
            //Add new image
            $filenameWithExt = $request->file('image')->getClientOriginalName ();
            // Get Filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just Extension
            $extension = $request->file('image')->getClientOriginalExtension();
            // Filename To store
            $fileNameToStore = $filename. '_'. time().'.'.$extension;
            // Upload Image
            $path = $request->file('image')->storeAs('public/images', $fileNameToStore);
            $productObj->image=$fileNameToStore;
        }
        $productObj->status =$request->input('status');
        $productObj->save();

        $request->session()->flash('msg','Product Details Updated');
        return redirect('products');
        }
        catch (\Exception $e) {
            echo $e;
            Log::error($e);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Product $product,$id)
    {
       //unlink("uploads/".$image->image_name);
       try {
        $productObj= Product::find($request->id);
        if(File::exists('../storage/app/public/images/'.$productObj->image))
        {
            File::delete('../storage/app/public/images/'.$productObj->image);
        }/*
        else
        {

            //abort(404);
        }*/

        Product::destroy(array('id',$id));
        return redirect('products');
        }
        catch (\Exception $e) {
            echo $e;
            Log::error($e);
        }
    }


    /**
     * * * * * * * * * * * * * * * * * * *
     * * * * * Buying Product  * * * * * *
     * * * * * * * * * * * * * * * * * * *
     */

     public function viewcatalog()
     {
        return view('buyproducts/catalog')-> with('productsArr',Product::all());
     }


     public function vieworderhistory()
     {
        echo "Order History";
     }

     public function search(Request $request)
     {
         try{
                                    //print_r($request->all());
                                    //echo $request->input('searchKeyword;');
                                    //echo $request->input('searchKeyword');
        $x = $request->input('searchKeyword');//Getting Search key word from form
        $y = Product::where('name',$x)->get();//Query for searching product
        //echo $y;
        //echo $y[1]['user_id'];
        return view('buyproducts/catalog')->with('productsArr',$y);
        }
         catch (\Exception $e) {
             echo $e;
            Log::error($e);
        }
    }



    /**
     * * * * * * * * * * * * * * * * * * *
     * * * * * Products export/Import  * *
     * * * * * * * * * * * * * * * * * * *
     */
    public function export()
    {
        try {
        return Excel::download(new ProductsExport(), 'products'. '_'. time().'.'.'xlsx');
        }
        catch (\Exception $e) {
            Log::error($e);
        }
    }

    public function importview()
    {
        try{
        return view("products/import");
        }
        catch (\Exception $e) {
            Log::error($e);
        }
    }

    public function import(Request $request)
    {
        try
        {
            Excel::import( new ProductsImport, $request->import_file );
            return redirect(route('products.index'))->with("Succesfully imported");
        }
        catch (\Exception $e)
        {

            Log::error($e);
        }
    }


    /**
     * API Testing
     */

    function productApiDemo()
    {
        return Product::all();
    }


    /**
     * * * * * * * * * * * * * * * * * * *
     * * * * * Helper Functions  * * * * *
     * * * * * * * * * * * * * * * * * * *
     */
    public function helperfunctionsview()
    {
        try
        {
            return view("products/helperfunctions");
        }
        catch (\Exception $e)
        {
            Log::error($e);
        }
    }

    public function helperfunctionsexamples()
    {

        try {
        $outputArr = [];

        //1.To Check if a product of laptop category exsists
        //Fetching the category_id for laptop
        $categoryId = Category::select('id')->where('name','Laptop')->first()->toArray();
        $x = $categoryId['id'];
        //Fetching category_id array from product table
        $categoryIdArr = Product::select('category_id')->get()->toArray();
        //Checking if similar category id exsists
        if(Arr::has($categoryIdArr, $x))
        {
            //Arr::prepend($outputArr,"Yes");
            array_push($outputArr,"Yes");
        }
        else
        {
            Arr::add($outputArr,1,"No");
        }


        //2.To get date for last product addition
        $createdatArr = Product::select('created_at')->get()->toArray();
        $lastDate = last($createdatArr);
        $dateinformat =  date('d/m/Y ', strtotime($lastDate['created_at']));
        array_push($outputArr,$dateinformat);


        //3.To replace 'Rs.' wtih '₹'
        $pricestr ="Price of this mobile phone is Rs.25000";
        $pricestr = Str::replaceFirst('Rs.', '₹', $pricestr);
        array_push($outputArr,$pricestr);



        return view('products/helperfunctions')-> with('outputArr',$outputArr);
        }
        catch (\Exception $e)
        {
            Log::error($e);
        }
    }
}
