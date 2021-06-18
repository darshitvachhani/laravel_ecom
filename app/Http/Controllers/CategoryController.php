<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Category;
Use App\Http\Requests\StoreCategoryRequest;
Use App\Http\Requests\UpdateCategoryRequest;
Use App\Http\Requests\StoreRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        try{
            return view('categories/view')-> with('categoriesArr',Category::all());
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

        return view('categories/add');
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
    public function store(StoreCategoryRequest $request)
    {
        //
        try {
                $categoryObj=new Category;
                $categoryObj->name =$request->input('name');
                $categoryObj->description =$request->input('description');
                $categoryObj->status =$request->input('status');
                $categoryObj->save();
                $request->session()->flash('msg','Category Added successsfully');
                return redirect(route('categories.index'));
            }
        catch (\Exception $e) {
            echo $e;
            Log::error($e);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category,$id)
    {
        //
        try{
        return view('categories/edit')->with('categoryArr',Category::find($id));
        }
        catch (\Exception $e) {
            Log::error($e);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatecategoryRequest $request, Category $category,$id)
    {
        //
        try{
        $categoryObj = Category::find($id);
        $categoryObj->name =$request->input('name');
        $categoryObj->description =$request->input('description');
        $categoryObj->status =$request->input('status');
        $categoryObj->save();

        $request->session()->flash('msg','Category Details Updated');
        return redirect(route('categories.index'));
        }
        catch (\Exception $e) {
            Log::error($e);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category,$id)
    {
        //
        try{
        Category::destroy(array('id',$id));
        return redirect(route('categories.index'));
        }
        catch (\Exception $e) {
            echo $e;
            Log::error($e);
        }
    }

}
