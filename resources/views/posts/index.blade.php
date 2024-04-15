<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BLOG LARAVEL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <!-- resources/views/posts/index.blade.php -->
    <div class="m-1 p-3 bg-info bg-opacity-10 border border-info rounded">

        <div class="mb-4 d-flex justify-content-between align-items-center border-bottom border-info">
            <h1 class="mt-3 pb-2 ">All Posts</h1>
            <a href="{{ route('posts.create') }}" class="btn btn-success ">Create New Post</a>
        </div>


        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>

        @endif
        <table class="table border border-info ">
            <thead>
                <tr class="text-center">
                    <th class="col-2">Title</th>
                    <th class="col-8">Content</th>
                    <th class="col-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->content }}</td>
                    <td>
                        <a href="{{ route('posts.show', $post) }}" class="btn btn-primary">View</a>
                        <a href="{{ route('posts.edit', $post) }}" class="btn btn-secondary">Edit</a>
                        <form action="{{ route('posts.destroy', $post)
}}" method="POST" style="display: inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $posts->links() }}
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>