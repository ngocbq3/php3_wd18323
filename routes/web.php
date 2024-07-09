<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('test');
});

Route::view('/about-us', 'about')->name('page.about');
Route::get('/users', function () {
    return "LIST USER";
});
//Đường dẫn có tham số
Route::get('/user/{id}', function (int $id) {
    return "User ID: $id";
});
Route::get(
    '/user/{id}/comment/{comment_id}',
    function ($id, $comment_id) {
        return "User ID: $id - Comment ID: $comment_id";
    }
)->where('id', '[0-9]+');

//Nhóm đường dẫn theo tiền tố
Route::prefix('admin')->group(function () {
    Route::get('/product', function () {
        return "PRODUCT";
    });
    Route::get('/users', function () {
        return "USERS";
    });
});
