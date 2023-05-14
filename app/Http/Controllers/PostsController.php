<?php

namespace App\Http\Controllers;

use App\Models\Comment;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Models\Post;
use Cviebrock\EloquentSluggable\Services\SlugService;
use function PHPUnit\Framework\isEmpty;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('blog.index')
            ->with('posts', Post::orderBy('updated_at', 'DESC')->get());
    }

    public function filter(Request $request)
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        return view('blog.create')->with('tags', $tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg|max:5048'
        ]);

        $newImageName = uniqid() . '-' . $request->title . '.' . $request->image->extension();

        $request->image->move(public_path('images'), $newImageName);

        $post = Post::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'slug' => SlugService::createSlug(Post::class, 'slug', $request->title),
            'image_path' => $newImageName,
            'user_id' => auth()->user()->id
        ]);


        if($request->input('tags') !== null) {
            $tags = $request->input('tags');
            $tags = explode(', ', $tags);
            $tagsId = [];
            foreach($tags as $tag) {
                $tag = Tag::firstOrCreate([
                    'tag' => $tag
                ]);
                $tagsId[] = $tag->id;
            }
            $post->tag()->sync($tagsId);
        }

        return redirect('/blog')
            ->with('message', 'Your post has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();
        $comments = $post->comment;
        $userName = Comment::where('post_id', $post->id)->first();
        return view('blog.show', compact('post', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $tags = Tag::all();
        $post = Post::where('slug', $slug)->first();
//        $added_tags = $post->tag();

        return view('blog.edit')
            ->with('post', $post)->with('tags', $tags);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        $post = Post::where('slug', $slug)->first();
        $post->update(['title' => $request->input('title'),
            'description' => $request->input('description'),
            'slug' => SlugService::createSlug(Post::class, 'slug', $request->title),
            'user_id' => auth()->user()->id]);

        if($request->input('tags') !== null) {
            $tags = $request->input('tags');
            $tags = explode(', ', $tags);
            $tagsId = [];
            foreach($tags as $tag) {
                $tag = Tag::firstOrCreate([
                    'tag' => $tag
                ]);
                $tagsId[] = $tag->id;
            }
            $post->tag()->sync($tagsId);
        }

        return redirect('/blog')
            ->with('message', 'Your post has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $post = Post::where('slug', $slug)->first();
        $post->tag()->sync([]);
        $post->delete();

        return redirect('/blog')
            ->with('message', 'Your post has been deleted!');
    }
}
