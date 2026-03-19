<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment; 
use App\Http\Resources\CommentResource;
use App\Http\Requests\CommentStoreRequest;
use App\Http\Requests\CommentUpdateRequest;

class PostCommentController extends Controller
{
    public function index(Post $post)
    {
        return CommentResource::collection($post->comments);
    }

    public function store(Post $post, CommentStoreRequest $request)
    {
        $inputs = $request->validated();
        $comment =$post->comments()->create($inputs);
        return new CommentResource($comment);
    }

    public function show(Post $post, Comment $comment)
    {
        return new CommentResource($comment);
    }

    public function update(Post $post, Comment $comment, CommentUpdateRequest $request)
    { 
        $inputs = $request->validated();
        $comment->update($inputs);
        return new CommentResource($comment);
    }

    public function destroy(Post $post, Comment $comment)
    {
        $comment->delete();
        return response()->noContent();
    }
}
