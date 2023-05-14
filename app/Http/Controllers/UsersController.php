<?php

namespace App\Http\Controllers;
use App\Models\Role;
use App\Models\User;
use App\Models\Post;
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
        if(Auth::user()->id == $user->id || Auth::user()->isAdmin())
        return view('admin.users.edit')->with('user',$user)->with('roles',Role::all());
        else
            return abort(404);

    }

    public function update(Request $request, User $user){
        if(Auth::user()->id == $user->id || Auth::user()->isAdmin()) {

            $flag = false;
            if ($user->role_id === 1) {
                $flag = true;
            }
            $request->validate([
                "name" => "required",
                "email" => "required",
                "role" => "required",
            ]);
            $role = Role::where('name', $request->role)->first();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->role()->associate($role);
            $user->save();

            if ($flag) {
                return view('blog.index')->with('posts', Post::orderBy('updated_at', 'DESC')->get());
            }
            return redirect()->route('admin.users.index');
        }
        else{
            return abort(404);
        }
    }


    public function destroy(User $user){
        $user->delete();
        return redirect()->route('admin.users.index')->with('success','User deleted successfully');
    }

    public function search($keyword){
        $users = User::where('name','LIKE','%'.$keyword.'%')->get();
        return view('admin.users.index')->with('users',$users);
    }
}
