<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function index()
    {
        return Comment::all();
    }

    public function store(Request $request)
    {
        $post = Post::find($request->post_id);
        if($post == null){
            return response()->json(['message' => 'Post not found'], 404);
        } else {
            $comment = Comment::create($request->all());
            return response()->json($comment, 201);
        }
    }

//    public function show( )
//    {
//        return $comment;
//    }

    public function update(Request $request, Comment $comment)
    {
        $comment->update($request->all());
        return response()->json($comment, 200);
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return response()->json(null, 204);
    }
}
