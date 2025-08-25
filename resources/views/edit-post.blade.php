<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Edit Post</h1>
    <div style="border: 3px solid black;">
        <h2>Edit Post</h2>
        <form action="/edit-post/{{ $post->id }}" method="POST">
            @csrf
            @method('PUT')
            <input name="title" type="text" value={{ $post->title }} placeholder="title">
            <textarea name="body" placeholder="body">{{ $post->body }}</textarea>
            <button>Update Post</button>
        </form>
    </div>
</body>

</html>
