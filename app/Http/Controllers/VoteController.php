<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    public function like(Post $post){

        $post->votes += 1;
        $post->save();
        return back();
    }

    public function dislike(Post $post){
        $post->votes -= 1;
        $post->save();
        return back();
    }
}
