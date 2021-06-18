<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;


use Illuminate\Support\Facades\Validator;

class userProfileController extends Controller
{
    //
    public function edit(User $user)
    {
        return view('users/edit');
    }

    public function update(Request $request)
    {
        try{

            //Validation
            $validator = Validator::make($request->all(),[
                'firstname' => 'max:255',
                'lastname' => 'max:255',
                'username' => 'max:255',//Unique validation to be addedd
                'phone' => 'max:255|size:10',
            ]);

            if ($validator->fails()) {
                return redirect(url()->previous() .'#contact')
                        ->withErrors($validator)
                        ->withInput();
            }

            $userObj = User::find(Auth::user()->id);

            $userObj->firstname=$request->input('firstname');
            $userObj->lastname=$request->input('lastname');
            $userObj->username=$request->input('username');
            $userObj->phone=$request->input('phone');

            $userObj->save();
            $request->session()->flash('msg','Prouct Added for sale');
            return redirect(route('home'));
        }

        catch (\Exception $e) {
            echo $e;
            Log::error($e);
        }
    }

    public function show(User $user)
    {
        $userId=Auth::user()->id;
        return view('users/profile')->with('profileInfo',User::find($userId));
    }

    public function changepasswordview(User $user)
    {
        try{
            $userId=Auth::user()->id;
            return view('users/changepassword')->with('profileInfo',User::find($userId));;
        }
        catch (\Exception $e) {
            Log::error($e);
        }
    }
    public function changePassword(Request $request)
    {
        try{

            echo Hash::make($request->input('12345678'));

            /*if(bcrypt($request->input('currentpassword')) == User::where(Auth::user()->password)){

                if($request->input('password') == $request->input('confirmpassword'))
                {

                }

            }
            else{
            }*/
            //return view();
        }
        catch (\Exception $e) {
            echo $e;
            Log::error($e);
        }
    }


    public function addaddressview()
    {
        try{

            return view('users/addaddress');

        }
        catch (\Exception $e) {
            echo $e;
            Log::error($e);
        }
    }

    public function addaddress()
    {
        try{

            

        }
        catch (\Exception $e) {
            echo $e;
            Log::error($e);
        }
    }
}
