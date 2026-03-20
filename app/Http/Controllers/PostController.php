<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\PostStoreRequest;
use App\Http\Resources\PostResource;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;

class PostController extends Controller
{
    public function index()
    {
        $posts = QueryBuilder::for(Post::class)
        ->allowedFilters(
            AllowedFilter::partial('title')
        )
        ->paginate();
        return PostResource::collection($posts);
    }

    public function store(PostStoreRequest $request)
    {
        $inputs = $request->validated();
        $post = Post::create($inputs);
        return new PostResource($post);
    }

    public function show(Post $post)
    {
        $post->load('comments');
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
