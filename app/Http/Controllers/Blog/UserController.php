<?php

namespace App\Http\Controllers\Blog;

use App\Models\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {

        $postsfromUser = User::find(Auth::id())->posts()->orderBy('id', 'desc')->get();


        //dd(Auth::user());
        return view('blog.profile', compact('postsfromUser'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $passwordBase = DB::table('users')->select('password')->where('id', Auth::id())->get()[0]->password;


        if (!(Hash::check($data['ppass'], $passwordBase))) {

            return back()->withErrors(['error' => 'Неверный пароль'])->withInput();
        }




        if ($data['npass1'] != $data['npass2']) {

            return back()->withErrors(['error' => 'Пароли не совпадают'])->withInput();
        } else {

            $data['password'] = Hash::make($data['npass1']);
        }

        unset($data['_token']);
        unset($data['_method']);
        unset($data['npass1']);
        unset($data['npass2']);
        unset($data['ppass']);


        $user = User::find(Auth::id());

        $result = $user->fill($data)->save();





        return redirect()->route('user')->with(['success' => 'Сохранение успешно']);
    }
}
