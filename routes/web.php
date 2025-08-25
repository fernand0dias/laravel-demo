<?php

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    $posts = Post::all();

    $userPosts = [];
    if (Auth::check()) {
        // $userPosts = Post::where('user_id', Auth::id() ?? 0)->get();

        $userPosts = Auth::user()->usersCoolPosts()->latest()->get();
    }

    return view('home', ['posts' => $posts, 'userPosts' => $userPosts]);
});

// Route::post('/register', function () {
//     return 'Form Submitted';
// });

Route::post('/register', [UserController::class, 'register']);
Route::post('/logout', [UserController::class, 'logout']);
Route::post('/login', [UserController::class, 'login']);

Route::post('/create-post', [PostController::class, 'createPost']);
