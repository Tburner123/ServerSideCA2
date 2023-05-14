<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller
{


    public function search(Request $request)
    {
        $search = $request->input('search');
        $tags = Tag::query()
            ->where('tag', 'LIKE', "%{$search}%")
            ->get();

        foreach($tags as $tag) {
            $items[] = [
                'id' => $tag->id,
                'text' => $tag->name
            ];
        }

        return response()->json([
            'items' => $items
        ]);
    }
}
