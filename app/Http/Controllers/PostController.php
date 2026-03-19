<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\PostStoreRequest;
use App\Http\Resources\PostResource;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return PostResource::collection($posts);
        /* return response()->json([
            'data' => $posts
        ], status:200); */
    }

    public function store(PostStoreRequest $request)
    {
        $inputs = $request->validated();
        $post = Post::create($inputs);
        return new PostResource($post);
    }

    public function show(Post $post)
    {
        return new PostResource($post); 
    }

    public function update(Post $post, PostStoreRequest $request)
    {
        $inputs = $request->validated();
        $post->update($inputs);
        return new PostResource($post);  
    }

    public function destroy(Post $post)
    {
        $post->delete();
       
    }
}
