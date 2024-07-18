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
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#ID</th>
                <th scope="col">Title</th>
                <th scope="col">Image</th>
                <th scope="col">Description</th>
                <th scope="col">View</th>
                <th scope="col">Cate Name</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <th scope="row">{{ $post->id }}</th>
                    <td>{{ $post->title }}</td>
                    <td>
                        <img src="{{ $post->image }}" width="50" alt="">
                    </td>
                    <td>{{ $post->description }}</td>
                    <td>{{ $post->view }}</td>
                    <td>{{ $post->cate_id }}</td>
                </tr>
            @endforeach

        </tbody>
    </table>
    {{ $posts->links() }}
</body>

</html>
