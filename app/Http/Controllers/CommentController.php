<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * 儲存 Comment
     *
     * @param  Request  $request
     * @param  Integer  $postId  Post 的 ID
     * @return JsonResponse
     */
    public function store(Request $request, int $postId): JsonResponse
    {
        $post    = Post::findOrFail($postId);
        $comment = $post->comments()->create($request->all());
        return response()->json($comment, 201);
    }
}
