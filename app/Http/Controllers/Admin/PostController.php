<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function test()
    {
        //Lấy ra toan bộ dữ liệu
        // $posts = Post::all();
        //Lấy 1 bản ghi
        // $post = Post::all()->first();

        //Lấy dữ liệu theo điều kiện
        // $posts = Post::query()->where('cate_id', 1)->get();

        //Tìm dữ liệu gần đúng
        // $posts = Post::query()->where('title', 'LIKE', '%aut%')->get();

        //Sử dụng hàm sum, count, avg, ..
        // $sum = Post::sum('view');
        // return $sum;

        //Thêm dữ liệu
        //1. Dùng mảng
        // $data = [
        //     'title' => fake()->text(25),
        //     'image' => fake()->imageUrl(),
        //     'description' => fake()->text(30),
        //     'content' => fake()->paragraph(),
        //     'view' => rand(10, 1000),
        //     'cate_id' => rand(1, 4),
        // ];
        // Post::query()->create($data);
        //2. sử dụng đối tượng
        // $post = new Post();
        // $post->title = fake()->text(25);
        // $post->image = fake()->imageUrl();
        // $post->description = fake()->text(30);
        // $post->content = fake()->paragraph();
        // $post->view = rand(10, 1000);
        // $post->cate_id = rand(1, 4);
        // $post->save();

        Post::query()->find(101)->update([
            'title' => 'Update data'
        ]);
        $posts = Post::orderByDesc('id')->get();
        return $posts;
    }

    public function index()
    {
        $posts = Post::paginate(10);
        return view('posts', compact('posts'));
    }
}
