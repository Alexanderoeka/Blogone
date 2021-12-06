<?php

namespace App\Http\Controllers\Blog;

use App\Models\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index()
    {
        $categories = Category::all();


        return view('blog.search',compact('categories'));
    }

    public function search(Request $request){

    }
}
