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
            "role" => "required",
        ]);
        $role = Role::where('name',$request->role)->first();
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

    public function show(User $user)
    {
         return view('admin.users.show')->with('user',$user)->with('posts',$user->post);
    }

    public function edit(User $user)
    {
        return view('admin.users.edit')->with('user',$user)->with('roles',Role::all());
    }

    public function update(Request $request, User $user){
        $request->validate([
            "name" => "required",
            "email" => "required",
            "role" => "required",
        ]);
        $role = Role::where('name',$request->role)->first();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role()->associate($role);
        $user->save();
        return redirect()->route('admin.users.index');
    }


    public function destroy(User $user){
        $user->delete();
        return redirect()->route('admin.users.index')->with('success','User deleted successfully');
    }

}
