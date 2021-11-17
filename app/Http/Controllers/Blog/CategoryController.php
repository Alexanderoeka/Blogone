<?php

namespace App\Http\Controllers\Blog;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Контроллер категорий постов
class CategoryController extends BaseController
{
    // Функция вывода всех категорий блога
    public function index()
    {
        $categories = Category::all();
        return view('blog.category',compact('categories'));
    }
}
