<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['tag'];

    public function post(){
        return $this->belongsToMany(Post::class,'posts_and_tags','tag_id','post_id');
    }
}
