<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TenSinhVienController;

// method http
// GET, POST, PUT, PATCH, DELETE

// base url: http://127.0.0.1:8000/

// http://127.0.0.1:8000/test
Route::get('/test', function(){
    echo 'hello';
});

Route::get('/', function(){
    echo 'Trang chủ';
});

Route::get('list-product', [ProductController::class, 'showProduct']);

// slug vs params
// http://127.0.0.1:8000/list-product/1/iphone (slug)
Route::get('get-product/{id}', [ProductController::class, 'getProduct']);



// http://127.0.0.1:8000/list-product?id=1&name=iphone (params)
Route::get('update-product', [ProductController::class, 'updateProduct'] );

Route::get('thong-tin-sinh-vien', [TenSinhVienController::class, 'tensinhvien']);