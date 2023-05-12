<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $user_role = Role::where('name','user')->first();
        $num_user = User::where('role_id',$user_role->id)->count();
        $num_post = \App\Models\Post::all()->count();
        $num_comment = \App\Models\Comment::all()->count();
        return view('admin.dashboard')->with([
            'num_post' => $num_post,
            'num_user' => $num_user,
            'num_comment' => $num_comment,
        ]);
    }

    public function userTable()
    {
        $users = User::select('name', 'email', 'id','role_id')->get();
        return view('admin.userTable')->with('users', $users);
    }


}
