<?php

namespace App\Http\Controllers;

use App\Models\Comment;

use Illuminate\Http\Request;
use App\Models\Post;


class SearchController extends Controller
{

    

    public function index(Request $request)
    {
        $searchQuery = $request->input('q');

        $query = Post::orderBy('updated_at', 'DESC');

        if ($searchQuery) {
            $query->where('title', 'LIKE', '%' . $searchQuery . '%');
        }
        

        return view('blog.index')
            ->with('posts', $query->get())
            ->with('searchQuery', $searchQuery);
    }

   
}