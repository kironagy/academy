<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function addComment(Request $request, $id)
    {
        Comment::create([
            'user_id' => auth()->user()->id,
            'course_id' => $id,
            'comment' => $request['comment'],
        ]);

        return \redirect()->back();
    }
}
