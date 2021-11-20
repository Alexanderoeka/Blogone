<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {

        //dd(Auth::user());
        return view('blog.profile');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $passwordBase = DB::table('users')->select('password')->where('id', Auth::id())->get()[0]->password;

        if (!(Hash::check($data['ppass'], $passwordBase))) {
            dd('nevernii parl');
            return back()->withErrors(['Неверный пароль'])->withInput();
        }



        if ($data['npass1'] != $data['npass2']) {
            dd('nesovpali paroli');
            return back()->withErrors(['difpass' => 'Пароли не совпадают '])->withInput();
        } else {
            dd('vse kruto');
            $data['password'] = $data['npass1'];
        }



        return back();
    }
}
