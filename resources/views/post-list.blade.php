@extends('layout')

@section('title', 'Trang Post')

@section('content')
    <h1>Danh sách bài viết</h1>
    <hr>
    @foreach ($posts as $post)
        <div>
            <a href="#">
                <h3>{{ $post->title }}</h3>
            </a>
            <p>{{ $post->description }}</p>
            <hr>
        </div>
    @endforeach
@endsection
