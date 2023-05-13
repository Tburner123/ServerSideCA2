<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function store(Request $request, Post $post){
        // $request->validate([
        //     'content' => 'required'
        // ]);

        $post->comments()->create([
            'content' => $request->input('content'),
            'user_id' => auth()->user()->id,
            'post_id' => $post->id
        ]);

        return redirect()->back();
    }

    public function edit(Request $request){
        $request->validate([
            'content' => 'required'
            , 'comment_id' => 'required'
        ]);

        Comment::where('id', $request->input('comment_id'))
            ->update([
                'content' => $request->input('content')
            ]);
    }

    public function destroy(Comment $comment){
        $comment->delete();
        return redirect()->back();
    }
}
