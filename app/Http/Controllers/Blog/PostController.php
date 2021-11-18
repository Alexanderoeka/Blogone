<?php

namespace App\Http\Controllers\Blog;

use App\Models\Post;
use App\models\Category;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;

// Контроллер работы с постами на странице постов
class PostController extends BaseController
{

    // Вывод всех постов данной категории
    public function index($category_id)
    {
        $postsbyCategory = Post::where('category_id', $category_id)->paginate(7);
        $category  = Category::find($category_id);
        //dd($postsbyCategory );
        return view('blog.posts_by_category', compact('postsbyCategory', 'category'));
    }

    public function show($post_id)
    {
        $post = Post::find($post_id);

        return view('blog.post_show', compact('post'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('blog.create_post', compact('categories'));
    }

    public function store(Request $request)
    {
        $req = $request->all();
        unset($req['_token']);

        $post = Post::create($req);

        return redirect()->route('post.show', $post->id);
    }
}
