<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return response()->json([
            'data' => $posts
        ], status:200);
    }

    public function create()
    {
        $inputs = request()->all();
        $post = Post::create($inputs);
        return response()->json([
            'data' => $post
        ], status:201);
    }

    public function read(Post $post)
    {
        return response()->json([
            'data' => $post
        ], status:200);
    }

    public function update(Post $post)
    {
        $inputs = request()->all();
        $post->update($inputs);
        return response()->json([
            'data' => $post
        ], status:200);
    }

    public function delete(Post $post)
    {
        $post->delete();
       
    }
}
