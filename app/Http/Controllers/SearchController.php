<?php

namespace App\Http\Controllers;

use App\Models\Comment;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;


class SearchController extends Controller
{

    

    public function index(Request $request)
    {
        $searchQuery = $request->input('q');

        $query = Post::orderBy('updated_at', 'DESC');
        // $tagQuery = Tag::orderBy('updated_at', 'DESC');

        if ($searchQuery) {
            $query->where('title', 'LIKE', '%' . $searchQuery . '%');
            $tags = Post::whereHas('tags', function ($query1) use ($searchQuery) {
                $query1->where('name', $searchQuery);
            })->get();
        }
        
        

        return view('blog.index')
            ->with('posts', $query->get())
            ->with('tags', $tags)
            ->with('searchQuery', $searchQuery);

    }

    public function filter(Request $request){
        $searchQuery = $request->input('q');
        $tagQuery = Tag::orderBy('updated_at', 'DESC');
        if ($searchQuery) {
            $tagQuery->where('tag', 'LIKE', '%' . $searchQuery . '%')->get();
        }
        return view('blog.index')
            ->with('tags', $tagQuery->get())
            ->with('searchQuery', $searchQuery);
    }

   
}