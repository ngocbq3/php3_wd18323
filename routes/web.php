<?php

use Illuminate\Support\Facades\DB;
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

//Query builder
Route::get('/posts', function () {
    //Lấy dữ liệu
    // $posts = DB::table('posts')->get();
    //Lấy 10 bản ghi
    // $posts = DB::table('posts')
    //     ->select('id', 'title', 'view') //lấy ra cột id, title, view
    //     ->limit(10)->get();

    //Update data
    // DB::table('posts')
    //     ->where('id', '=', 13)
    //     ->update([
    //         'title' => 'Dữ liệu được cập nhật'
    //     ]);

    //Delete data
    // DB::table('posts')->delete(18);
    //Lấy ra các bài viết có lượt view > 800
    // $posts = DB::table('posts')
    //     ->where('view', '>', 800)
    //     ->get();

    //Nối 2 bảng posts và categories
    $posts = DB::table('posts')
        ->join('categories', 'cate_id', '=', 'categories.id')
        ->get();
    return view('post-list', compact('posts'));
});


Route::get('/', function () {
    $posts = DB::table('posts')
        ->orderBy('view', 'desc')
        ->limit(8)
        ->get();

    return view('post-list', compact('posts'));
});

//Hiển thị bài viết theo danh mục
Route::get('/category/{id}', function ($id) {
    $posts = DB::table('posts')
        ->where('cate_id', '=', $id)
        ->get();
    return view('post-list', compact('posts'));
});

//Chi tiết bài viết
Route::get('/post/{id}', function ($id) {
    $post = DB::table('posts')
        ->where('id', $id)
        ->first();
    return $post;
})->name('post.detail');
