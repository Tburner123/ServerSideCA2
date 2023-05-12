<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class PagesController extends Controller
{
    public function index()
    {
        $posts = Post::select('title', 'description',)->get();
            if(Auth::check() && auth()->user()->role->name == 'admin') {
                return redirect()->route('admin.index');
            } else {
                return view('index')->with('posts', $posts);
            }
    }
}
