<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userinfo;
use App\Http\Controllers\vendor;
Route::get('/', function () {
    return view('index');
});

Route::post('/qr_code_generator',[userinfo::class,'qr_code_generator']);
Route::post('/deleteqr',[userinfo::class, 'deleteqr']);

Route::get('order', [userinfo::class,'order']);
Route::post('orderAmount',[userinfo::class, 'orderAmount']);


Route::get('/vlogin',[vendor::class, 'login']);
Route::post('/submitLogin',[vendor::class, 'submitLogin']);
Route::get('/vdashboard',[vendor::class,'vdashboard'])->middleware('vendor');


Route::get('/comming',[vendor::class, 'comming'])->middleware('vendor');
Route::get('/delivered', [vendor::class, 'delivered'])->middleware('vendor');
Route::get('/cancel', [vendor::class, 'cancel'])->middleware('vendor');