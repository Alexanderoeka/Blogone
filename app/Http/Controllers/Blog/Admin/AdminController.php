<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


// Основной класс админки
class AdminController extends Controller
{
    //Выводит основную страницу контроллера
    public function index()
    {

        return view('blog.admin.admin_main');
    }

    // Метод выхода из админки
    public function logout()
    {
        session()->forget('admin');
       return redirect()->route('admin.login');
    }
}
