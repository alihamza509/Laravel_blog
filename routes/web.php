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

  Route::get('/','App\Http\Controllers\front\post@index');
Route::get('/post/{id}','App\Http\Controllers\front\post@show');
Route::post('/contact_insert','App\Http\Controllers\admin\contact@store');
Route::view('/contact','front.contact');
Route::view('/admin/login','admin.login');
Route::post('/admin/login_submit','App\Http\Controllers\Login_auth@login_submit');
Route::get('admin/logout', function () {
    session()->forget('s_id');
    return redirect('admin/login');
});
Route::group(['middleware'=>['App\Http\Middleware\login_auth']], function () {
   Route::view('/admin','admin.layout.layout');
Route::get('/admin/post/list','App\Http\Controllers\admin\post@index');
Route::post('/admin/post_submit','App\Http\Controllers\admin\post@store');
Route::get('/admin/post/delete/{id}','App\Http\Controllers\admin\post@destroy');
Route::get('/admin/post/edit/{id}','App\Http\Controllers\admin\post@edit');
Route::post('/admin/post/update/{id}','App\Http\Controllers\admin\post@update');


Route::view('/admin/page/add','admin.page.add');
 
Route::get('/admin/page/list','App\Http\Controllers\admin\pages@index');
Route::post('/admin/page_submit','App\Http\Controllers\admin\pages@store');
Route::get('/admin/page/delete/{id}','App\Http\Controllers\admin\pages@destroy');
Route::get('/admin/page/edit/{id}','App\Http\Controllers\admin\pages@edit');
Route::post('/admin/page/update/{id}','App\Http\Controllers\admin\pages@update');
Route::get('/admin/contact/list','App\Http\Controllers\admin\contact@index');
});