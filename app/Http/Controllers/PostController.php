<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\PostStoreRequest;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return response()->json([
            'data' => $posts
        ], status:200);
    }

    public function store(PostStoreRequest $request)
    {
        $inputs = $request->validated();
        $post = Post::create($inputs);
        return response()->json([
            'data' => $post
        ], status:201);
    }

    public function show(Post $post)
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

    public function destroy(Post $post)
    {
        $post->delete();
       
    }
}
