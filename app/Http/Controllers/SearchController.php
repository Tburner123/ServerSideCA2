<?php

namespace App\Http\Controllers;

use App\Models\Comment;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;
use Ramsey\Collection\Collection;


class SearchController extends Controller
{



    public function index(Request $request)
    {
        $searchQuery = $request->input('q');
        if($request->input('filter') !== ""){
            $tagQuery = Tag::find($request->input('filter'));
            $posts = $tagQuery->posts;
            $posts = $posts->where('title', 'LIKE', '%' . $searchQuery . '%');
            return view('blog.index')
                ->with('posts', $posts)
                ->with('searchQuery', $searchQuery);
        } else {
            $query = Post::orderBy('updated_at', 'DESC');
            // $tagQuery = Tag::orderBy('updated_at', 'DESC');
            if ($searchQuery != '') {
                $query->where('title', 'LIKE', '%' . $searchQuery . '%');
                $tags = Post::whereHas('tag', function ($query1) use ($searchQuery) {
                    $query1->where('tag', 'LIKE', '%' . $searchQuery . '%');
                })->get();

                $posts = array($query->get());
                if ($tags != null) {
                    $tags = array($tags);
                    array_merge($posts, $tags);
                }
            }

            return view('blog.index')
                ->with('posts', $query->get())
                ->with('searchQuery', $searchQuery);
        }
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
