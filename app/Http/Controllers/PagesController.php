<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function index()
    {
            if(Auth::check() && auth()->user()->role->name == 'admin') {
                return redirect()->route('admin.index');
            } else {
                return view('index');
            }
    }
}
