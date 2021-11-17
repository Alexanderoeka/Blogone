<?php

namespace App\Http\Controllers\Blog;

use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Контроллер стартовой странницы
class HomeController extends Controller
{
    // Функция вывода основной страницы (в ближайшем будущем вместе последними постами)
    public function index()
    {

        $lastPosts = Post::select()->orderBy('id', 'desc')->limit(10)->get();


        return view('blog.main_page',compact('lastPosts'));
    }
}
