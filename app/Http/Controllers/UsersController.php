<?php

namespace App\Http\Controllers;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index')->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            "name" => "required",
            "email" => "required",
            "password" => "required",
            "role_id" => "required",
        ]);
        $role = Role::find($request->role_id);
        $user = Auth::user();
        if($user->role->name === 'admin'){
            $new_user = new User();
            $new_user->name = $request->name;
            $new_user->email = $request->email;
            $new_user->role()->associate($role);
            $new_user->password = bcrypt($request->password);
            $new_user->save();
            return redirect()->route('admin.users.index');
        }
        else{
            return abort(404);
        }
    }


}
