<?php

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
Route::any('admin/index','Admin\AdminController@index');
Route::any('admin/top','Admin\AdminController@top');
Route::any('admin/main','Admin\AdminController@main');
Route::any('admin/menu','Admin\AdminController@menu');
Route::any('admin/drag','Admin\AdminController@drag');
Route::any('brand/brand_add','Admin\BrandController@brand_add');
Route::any('brand/brand_list','Admin\BrandController@brand_list');
Route::any('brand/delete','Admin\BrandController@delete');
Route::any('brand/edit','Admin\BrandController@edit');
Route::any('brand/edit_do','Admin\BrandController@edit_do');
