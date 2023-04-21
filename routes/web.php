<?php

use Illuminate\Support\Facades\Route;

Route::get('/',[App\Http\Controllers\HomeController::class,'index']);


Route::get('/trang-chu',[App\Http\Controllers\HomeController::class,'index']);


//////backend admin


Route::get('/admin',[App\Http\Controllers\AdminController::class,'index']);

Route::get('/adminhome',[App\Http\Controllers\AdminController::class,'homeadmin']);

Route::post('/adminlogin',[App\Http\Controllers\AdminController::class,'loginadmin']);

Route::get('/adminlogout',[App\Http\Controllers\AdminController::class,'logoutadmin']);


///Danh muc san pham

Route::get('/addcategory',[App\Http\Controllers\CategoryController::class,'add_category']);
Route::get('/allcategory',[App\Http\Controllers\CategoryController::class,'all_category']);
Route::get('/unactive-category/{idcategory}',[App\Http\Controllers\CategoryController::class,'unactive_category']);
Route::get('/active-category/{idcategory}',[App\Http\Controllers\CategoryController::class,'active_category']);



Route::get('/edit-category/{idcategory}',[App\Http\Controllers\CategoryController::class,'edit_category']);
Route::get('/delete-category/{idcategory}',[App\Http\Controllers\CategoryController::class,'delete_category']);


Route::post('/save-category',[App\Http\Controllers\CategoryController::class,'save_category']);
Route::post('/update-category/{idcategory}',[App\Http\Controllers\CategoryController::class,'update_category']);
