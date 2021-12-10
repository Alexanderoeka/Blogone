<?php

namespace App\Http\Controllers\Blog;

use App\Models\User;
use App\Models\Category;
use App\Models\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


// Класс пользователя и профиля
class UserController extends Controller
{

    // Функция отвечающая за страницу профиля (и поиска постов в профиле )
    public function index(Request $request)
    {
        if (!empty($request->all()) && empty($request->page)) {
            $data = $request->all();

            $query = array();

            $query['user_id'] = Auth::id();

            if ($data['category_id'] != 0) {
                $query['category_id'] = $data['category_id'];
            }

            if ($data['title'] != null) {
                $query['title'] = $data['title'];
            }

            $posts = Post::select()->where($query)->paginate(5);
            $categories = Category::all();


        return view('blog.profile', compact('posts', 'categories','query'));
        } else {

            $posts = User::find(Auth::id())->posts()->orderBy('id', 'desc')->paginate(5);
            $categories = Category::all();


        return view('blog.profile', compact('posts', 'categories'));
        }


    }
    // Функция  сохранения данных пользователя (она должна была называться save, но ладно)
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

    // Функция поиска постов по названию и категории (сейчас реализуется в index функции данного класса)
    public function find(Request $request)
    {
        $data = $request->all();

        $query = array();

        $query['user_id'] = Auth::id();

        if ($data['category_id'] != 0) {
            $query['category_id'] = $data['category_id'];
        }

        if ($data['title'] != null) {
            $query['title'] = $data['title'];
        }

        $posts = Post::select()->where($query)->paginate(7);

        $categories = Category::all();

        return view('blog.profile', compact('posts', 'categories'));
    }
}
