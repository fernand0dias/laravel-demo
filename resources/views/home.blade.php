<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Home Page</h1>

    @auth
        <p>Congrats you're logged in!</p>
        <form action="/logout" method="POST">
            @csrf
            <button>Logout</button>
        </form>

        <div style="border: 3px solid black;">
            <h2>Create a New Post</h2>
            <form action="/create-post" method="POST">
                @csrf
                <input name="title" type="text" placeholder="title">
                <textarea name="body" type="text" placeholder="body">
                </textarea>
                <input type="submit" value="Create Post">
            </form>
        </div>

        <div style="border: 3px solid black;">
            <h2>Your Posts</h2>
            @foreach ($userPosts as $post)
                <div style="margin-bottom: 20px;">
                    <h3>{{ $post->title }}</h3>
                    <p>{{ $post->body }}</p>
                    <p><a href="/edit-post/{{ $post->id }}">Edit</a></p>
                    <form action="/delete-post/{{ $post->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button>Delete</button>
                    </form>

                    <hr>
                </div>
            @endforeach
        </div>
    @else
        <div style="border: 3px solid black;">
            <h2>Register</h2>
            <form action="/register" method="POST">
                @csrf
                <input name="name" type="text" placeholder="name">
                <input name="email" type="text" placeholder="email">
                <input name="password" type="password" placeholder="password">
                <input type="submit" value="Register">
            </form>
        </div>

        <div style="border: 3px solid black;">
            <h2>Login</h2>
            <form action="/login" method="POST">
                @csrf
                <input name="loginname" type="text" placeholder="name">
                <input name="loginpassword" type="password" placeholder="password">
                <input type="submit" value="Login">
            </form>
        </div>

        <div style="border: 3px solid black;">
            <h2>All Posts</h2>
            @foreach ($posts as $post)
                <div style="margin-bottom: 20px;">
                    <h3>{{ $post->title }} by {{ $post->user->name }}</h3>
                    <p>{{ $post->body }}</p>
                    <hr>
                </div>
            @endforeach
        </div>
    @endauth
</body>

</html>
