<?php

namespace App\Http\Controllers\Blog;

use App\Models\Post;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Контроллер работы с постами на странице постов
class PostController extends BaseController
{

    // Вывод всех постов данной категории
    public function index($category_id)
    {
        $postsbyCategory = Post::where('category_id', $category_id)->paginate(7);
        //dd($postsbyCategory );
       return view('blog.posts_by_category',compact('postsbyCategory'));
    }
}
