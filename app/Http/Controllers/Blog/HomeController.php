<?php

namespace App\Http\Controllers\Blog;

use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Контроллер стартовой странницы
class HomeController extends Controller
{
    // Метод вывода стартовой страницы (+ выводит 10 последних постов)
    public function index()
    {

        $lastPosts = Post::select()->orderBy('id', 'desc')->limit(10)->get();


        return view('blog.main_page',compact('lastPosts'));
    }
}
