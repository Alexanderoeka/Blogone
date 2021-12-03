<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {

        return view('blog.admin.admin_main');
    }

    public function logout()
    {
        session()->forget('admin');
       return redirect()->route('admin.login');
    }
}
