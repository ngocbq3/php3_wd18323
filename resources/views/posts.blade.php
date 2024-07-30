<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Danh sách</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <h1>Danh sách bài viết</h1>

    @auth
        <div>
            Username: {{ Auth::user()->username }}
            <a href="{{ route('logout') }}">Logout</a>
        </div>
    @endauth

    @if (session('message'))
        <div class="alert alert-success ">
            {{ session('message') }}
        </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#ID</th>
                <th scope="col">Title</th>
                <th scope="col">Image</th>
                <th scope="col">Description</th>
                <th scope="col">View</th>
                <th scope="col">Cate Name</th>
                <th scope="col">
                    <a href="{{ route('post.create') }}" class="btn btn-primary">Create new</a>
                </th>

            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <th scope="row">{{ $post->id }}</th>
                    <td>{{ $post->title }}</td>
                    <td>
                        <img src="{{ asset('/storage/' . $post->image) }}" width="50" alt="">
                    </td>
                    <td>{{ $post->description }}</td>
                    <td>{{ $post->view }}</td>
                    <td>{{ $post->category->name }}</td>
                    <td class="d-flex gap-1">
                        <a href="{{ route('post.edit', $post) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('post.destroy', $post) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Bạn có muốn xóa không?')" type="submit"
                                class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
    {{ $posts->links() }}
</body>

</html>
