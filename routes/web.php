<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;

// method http
// GET, POST, PUT, PATCH, DELETE

// base url: http://127.0.0.1:8000/

// http://127.0.0.1:8000/test
// Route::get('/test', [UserController::class, 'test']);

Route::get('/', function(){
    echo 'Trang chủ';
});


// // // điều hướng qua action của controller
// // // php artisan make:controller TênController
// // Route::get('list-product', [ProductController::class, 'showProduct']);

// // // slug vs params
// // // http://127.0.0.1:8000/list-product/1/iphone (slug)
// // Route::get('get-product/{id}', [ProductController::class, 'getProduct']);



// // // http://127.0.0.1:8000/list-product?id=1&name=iphone (params)
// // Route::get('update-product', [ProductController::class, 'updateProduct'] );

// Route::get('thong-tin-sinh-vien', [TenSinhVienController::class, 'tensinhvien']);

// // CRUD => query builder
// // http://127.0.0.1:8000/users/add-user
// // http://127.0.0.1:8000/users/update-user
// Route::group([
//     'prefix' => 'users',
//     'as' => 'users.'
// ], function() {
//     // http://127.0.0.1:8000/users/list-user
//     Route::get('list-user', [UserController::class, 'listUsers'])
//     ->name('listUsers');
//     // http://127.0.0.1:8000/users/add-user
//     Route::get('add-user', [UserController::class, 'addUsers'])
//     ->name('addUsers');
//     Route::post('add-user', [UserController::class, 'addPostUsers'])
//     ->name('addPostUsers');
//     // http://127.0.0.1:8000/users/delete-user/1
//     Route::get('delete-user/{userID}', [UserController::class, 'deleteUser'])
//     ->name('deleteUser');
//     // http://127.0.0.1:8000/users/update-user/1
//     Route::get('update-user/{userID}', [UserController::class, 'updateUser'])
//     ->name('updateUser');
//     Route::post('update-user', [UserController::class, 'updatePostUser'])
//     ->name('updatePostUser');
// });

// Route::group([
//     'prefix' => 'products',
//     'as' => 'products.'
// ], function() {
//     Route::get('list-product', [ProductController::class, 'listProduct'])
//     ->name('listProduct');
//     Route::get('add-product', [ProductController::class, 'addProduct'])
//     ->name('addProduct');
//     Route::post('add-product', [ProductController::class, 'addPostProduct'])
//     ->name('addPostProduct');
//     Route::get('delete-product/{productID}', [ProductController::class, 'deleteProduct'])
//     ->name('deleteProduct');
//     Route::get('update-product/{productID}', [ProductController::class, 'updateProduct'])
//     ->name('updateProduct');
//     Route::post('update-product', [ProductController::class, 'updatePostProduct'])
//     ->name('updatePostProduct');
// });

// Route::get('test', function() {
//     return view('test')->with([
//         'var1' => 'hello',
//         'var2' => [
//             'apple', 'orange', 'mango'
//         ]
//     ]);
// });
// Route::get('test2', function(){
//     return view('admin.products.list-product');
// });
// Route::get('test3', function(){
//     return view('admin.products.add-product');
// });

// http://127.0.0.1:8000/admin/products/
// CRUD bảng product
// Route -> Controller -> Model -> DB
// Controller -> View  list, add, update, detail

Route::group(['prefix' => 'admin', 'as' => 'admin.'],
function(){
    Route::group(['prefix' => 'products', 'as' => 'products.'], function(){
        Route::get('/', [ProductController::class, 'listProduct'])
        ->name('listProduct');
        Route::get('add-product', [ProductController::class, 'addProduct'])
        ->name('addProduct');
        Route::post('add-product', [ProductController::class, 'addPostProduct'])
        ->name('addPostProduct');
        Route::delete('delete-product', [ProductController::class, 'deleteProduct'])
        ->name('deleteProduct');
        Route::get('detail-product/{idProduct}', [ProductController::class, 'detailProduct'])
        ->name('detailProduct');
        Route::get('update-product/{idProduct}', [ProductController::class, 'updateProduct'])
        ->name('updateProduct');
        Route::patch('update-product/{idProduct}', [ProductController::class, 'updatePatchProduct'])
        ->name('updatePatchProduct');

    });
});
