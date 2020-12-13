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
    return view('index');
});
//Login  and Register
Route::resource('signup','RegisterController');
Route::resource('login','LoginController');
Route::get('logout','RegisterController@logout');

//About us
Route::get('/aboutus', function () {
    return view('aboutus');
});
//Contatc us
Route::post('/contactus','ContactUs@contact_us');

Route::get('contactus',function(){
    return view('contactus');
});
//profile
Route::get('/userprofile', 'UserData@userdata');
Route::POST('/updatepersonalinfo', 'UserData@updatepersonalinfo');
Route::POST('/changepassword', 'UserData@changepassword');

//Display product
Route::get('','DisplayProduct@index');
Route::get('/viewitem','DisplayProduct@viewitem');
Route::get('/viewcategoryitem','DisplayProduct@viewcategoryitem');

//cart management
Route::post('/addtocart','AddToCart@addtocart');
Route::get('/cart','AddToCart@viewcart');
Route::post('/pluscartitem','AddToCart@pluscartitem');
Route::post('/minushcartitem','AddToCart@minuscartitem');
Route::post('/removecart','AddToCart@removecart');


//order management
Route::post('checkout','OrderManagement@checkout');
Route::post('order','OrderManagement@order');
Route::get('orderhistory','OrderManagement@orderhistory');
//Route::get('delete_order/{id}','OrderManagement@delete_order');
//Admin Site Route
Route::get('admin/admindashboard', function () {
    return view('admin/admindashboard');
  });
 Route::resource('/admin/index','AdminLoginController');
 Route::get('admin/logout','AdminLoginController@deleteSession');
 

 //Add Brand
 Route::post('admin/add_brand','AddBrand@add_brand')->name('admin/add_brand');
  Route::get('admin/manage_brand','AddBrand@show_brand');
  Route::get('edit_brand/{id}','AddBrand@edit_brand');
  Route::post('update_brand','AddBrand@update_brand');
  Route::get('delete_brand/{id}','AddBrand@delete_brand');  
  Route::get('admin/add_brand', function () {
    return view('admin.add_brand');
  });

  //Add Category
Route::post('admin/add_category','AddCategory@add_category')->name('admin/add_category');
Route::get('admin/manage_category','AddCategory@show_category');
Route::get('edit_category/{id}','AddCategory@edit_category');
Route::post('update_category','AddCategory@update_category');
Route::get('delete_category/{id}','AddCategory@delete_category');
Route::get('admin/add_category', function () {
    return view('admin.add_category');
  });


//Add sub_category
Route::get('admin/add_sub_category','AddSubCategory@category_drop')->name('admin/add_sub_category');
Route::post('admin/add_sub_category','AddSubCategory@add_sub_category');
Route::get('admin/manage_sub_category','AddSubCategory@showsubcategory');
Route::get('delete_sub_category/{id}','AddSubCategory@delete_sub_category');
Route::get('edit_sub_category/{id}','AddSubCategory@edit_sub_category');
Route::post('update_sub_category','AddSubCategory@update_sub_category');


//Manage Product
Route::get('admin/add_product','AddProduct@addProduct');
Route::post('admin/insert_product','AddProduct@insert_product')->name('admin/add_product');
Route::get('admin/manage_product','AddProduct@show_product');
Route::get('edit_product/{id}','AddProduct@edit_product');
Route::post('update_product','AddProduct@update_product');
// Route::get('delete_product/{id}','AddProduct@delete_product');
//Manage User
// Route::get('admin/manage_user',function(){
//     return view('admin.manage_user');
// });
Route::get('admin/manage_user','ManageUser@show_user');
Route::get('delete_user/{user_id}','ManageUser@delete_user');

//Admin Site Excel Exports File
Route::get('/excelbrand','Exports@excelBrand');
Route::get('/excelcategory','Exports@excelCategory');
Route::get('/excelsubcategory','Exports@excelSubCategory');
Route::get('/excelproduct','Exports@excelProduct');
Route::get('/exceluser','Exports@excelUser');
Route::get('/excelcontact','Exports@excelContactUs');
Route::get('/excelorder','Exports@excelOrder');
Route::post('/importbrand', 'Exports@import');

Route::get('admin/brandimport',function(){
    return view('admin.brandimport');
});

//Invoice pdf
Route::post('/pdf','Invoice@pdf');

//Admin Side Order Page
Route::get('admin/manage_order','OrderManagement@manageorderview');
Route::get('changeorderinfo/{orderid}','OrderManagement@changeorderinfo');
Route::post('updateorder','OrderManagement@updateorderinfo')->name('/updateorder');

//Customer side reply route
Route::get('admin/customer_review','ContactUs@show_message');
Route::get('delete_messages/{id}','ContactUs@delete_message');




