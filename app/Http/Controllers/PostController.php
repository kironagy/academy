<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(9);

        return view('posts', \compact('posts'));
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);

        return \view('postDetails', \compact('post'));
    }
}
