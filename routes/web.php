<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PhoneController;
use App\Http\Controllers\Admin\CompController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/',[CompController::class,'listComp'])->name('layouts.cl');
Route::get('/client',[PhoneController::class,'basic'])->name('client.index');
Route::get('/client/{phone}/detail',[PhoneController::class,'detail'])->name('client.detail');
Route::get('/client/{comp}/list',[CompController::class,'list'])->name('client.list');


Route::get('/client/addCart/{id}',[PhoneController::class,'addCart']);
Route::get('/client/deleteItemCart/{id}',[PhoneController::class,'DeleteItemCart']);
Route::get('/client/view',[PhoneController::class,'viewListCart'])->name('client.view');
Route::get('/client/deleteItemListCart/{id}',[PhoneController::class,'deleteItemListCart']);
Route::get('/client/saveItemListCart/{id}/{quanty}',[PhoneController::class,'saveItemListCart']);
Route::get('/client/checkout',[PhoneController::class,'checkOut'])->name('client.checkout');
Route::get('/client/endCheckOut',[PhoneController::class,'EndCheckOut'])->name('client.thanhcong');


Route::resource('admin/phone',PhoneController::class);
Route::resource('admin/comp',CompController::class);