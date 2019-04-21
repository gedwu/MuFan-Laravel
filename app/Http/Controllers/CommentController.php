<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Resources\CommentResource;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function get(Request $request) {
        $articleId = (int) $request->get('article_id');
        $comments = Comment::where('article_id', $articleId)->get();
//        dd($comments);
        $commentsCount = count($comments);

        return CommentResource::collection($comments)
            ->additional(['total_comments' => $commentsCount]
        );

    }
}
