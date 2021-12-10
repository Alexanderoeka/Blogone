<?php

namespace App\Http\Controllers\Blog;

use App\Models\Post;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Класс авторов
class AuthorController extends Controller
{

    // Выводит 15 последних авторов + поиск
    public function index()
    {
        $user = new User;

        $users = $user->select()->orderBy('id')->limit(15)->get();


        return view('blog.authors', compact('users'));
    }
    // Показывает автора и его посты
    public function show($id)
    {
        $author = User::find($id);

        $posts = Post::select()->where('user_id', $id)->paginate(10);



        return view('blog.author_show', compact('author', 'posts'));
    }


    //Метод поиска постов
    public function find(Request $request)
    {
        $userName = $request->name;

        $users = User::select()->where('name', $userName)->get();
        if (isset($users)) {
            return view('blog.authors', compact('users'));
        } else {
            return view('blog.authors');
        }
    }
}
