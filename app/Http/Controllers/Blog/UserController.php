<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {

        $pass = Auth::user()->password;

        dd(__METHOD__,Hash::check('7777777',Auth::user()->password));

        return view('blog.profile');
    }
}
