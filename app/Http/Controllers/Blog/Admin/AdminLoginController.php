<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
    public function login()
    {

        return view('blog.admin.admin_login');
    }
    public function checklogin(Request $request)
    {
        dd(__METHOD__, $request->all);
    }
}
