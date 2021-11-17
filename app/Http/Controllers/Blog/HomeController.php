<?php

namespace App\Http\Controllers\Blog;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Контроллер стартовой странницы
class HomeController extends Controller
{
    // Функция вывода основной страницы (в ближайшем будущем вместе последними постами)
    public function index()
    {

        return view('blog.main_page');
    }
}
