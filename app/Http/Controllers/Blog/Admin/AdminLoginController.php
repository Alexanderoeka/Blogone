<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Models\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminLoginController extends Controller
{
    public function login()
    {

        return view('blog.admin.admin_login');
    }
    public function checklogin(Request $request)
    {
        $data = $request->all();



        if (isset(Admin::select()->where('name', $data['name'])->get()[0])) {
            $admin = Admin::select()->where('name', $data['name'])->get()[0];
        } else {
            return back()->withErrors(['error' => 'Неверный логин или пароль']);
        }


        if (Hash::check($data['password'], $admin->password)) {
            session(['admin' => $admin]);
            return redirect()->route('admin.index');
        } else {
            return back()->withErrors(['error' => 'Неверный логин или пароль']);
        }
    }
}
