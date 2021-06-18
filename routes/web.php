<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function ()
    {

        Route::get('/home', 'HomeController@index')->name('home');

        //Routes for User CRUD
        Route::get('users/edit','userProfileController@edit')->name('users.edit');//Show view for update profile
        Route::put('users/update','userProfileController@update')->name('users.update');//Function for updating in table
        Route::get('users/viewprofile','userProfileController@show')->name('users.viewprofile');//View users profile
        Route::get('users/changepassword','userProfileController@changepasswordview')->name('users.changepasswordview');//View Change password page
        Route::post('users/changepasswordmethod','userprofilecontroller@changepassword')->name('users.changepasswordmethod');//Change password method
        Route::get('users/address','userprofilecontroller@addaddressview')->name('users.addaddressview');//Address create
        Route::post('users/addaddressmethod','userprofilecontroller@addaddress')->name('users.addaddressmethod');//Address Add


        //Routes for Product CRUD//Sell
        Route::get('products','ProductController@index')->name('products.index');//Manage product view
        Route::get('products/create', 'ProductController@create')->name('products.create');//Add product page view
        Route::post('products/store','ProductController@store')->name('products.store');//Adding in db post
        Route::get('products/{id}/edit','ProductController@edit')->name('products.edit');//Showing view for updating a product
        Route::put('products/{id}/update','ProductController@update')->name('products.update');//Function for updating in table
        Route::get('products/{id}/delete','ProductController@destroy')->name('products.delete');//Function for deleting a product

        //Routes for Product CRUD//Buy
        Route::get('products/catalog','ProductController@viewcatalog')->name('products.viewcatalog');//Manage product view
        Route::get('products/orderhistory', 'ProductController@vieworderhistory')->name('products.vieworderhistory');//Add product page view
        Route::post('products/search', 'ProductController@search')->name('products.search');//Add product page view


        //Routes for Categories CRUD
        Route::get('categories','CategoryController@index')->name('categories.index');//Manage category view
        Route::get('categories/create', 'CategoryController@create')->name('categories.create');//Add category page view
        Route::post('categories/store','CategoryController@store')->name('categories.store');//Adding in db post
        Route::get('categories/{categoryId}/edit','CategoryController@edit')->name('categories.edit');//Showing view for updating a category
        Route::put('categories/{categoryId}/update','CategoryController@update')->name('categories.update');//Function for updating in table
        Route::get('categories/{categoryId}/delete','CategoryController@destroy')->name('categories.delete');//Function for deleting a category

        //Route for exporting
        Route::get('products/export', 'ProductController@export')->name('products.export');//Function for export function

        //Route for importing
        Route::get('products/import', 'ProductController@importview')->name('products.importview');//Function for showing import page
        Route::post('products/importmethod','ProductController@import')->name('products.import');//Function for calling import function

        //Routes for helper functions
        Route::get('products/helperfunctions','ProductController@helperfunctionsview')->name('products.helperfunctionsview');//View for testing helper functions
        Route::get('helperfunctions/examples','Productcontroller@helperfunctionsexamples')->name('helperfunctions.examples');//helper function a

        //Routes for Order
        Route::get('orders/create','OrderController@create')->name('orders.create');//Creating Order
        Route::post('orders/store','OrderController@store')->name('orders.store');//Adding order in Order DB


    });
