<?php

namespace App\Http\Controllers\Blog;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        $user = new User;

        $users = $user->select()->orderBy('id')->limit(15)->get();


        return view('blog.authors', compact('users'));
    }

    public function show($id)
    {
        $author = User::find($id);

        return view('blog.author_show', compact('author'));
    }
}
