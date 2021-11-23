<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    public function  index()
    {
        $categories = Category::all();

        return view('blog.admin.admin_categories',compact('categories'));

    }
}
