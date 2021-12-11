<?php

namespace App\Http\Controllers\Blog;

use App\Models\Post;
use App\models\Category;
use App\Http\Requests;

use App\Http\Requests\PostEditRequest;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostCreateRequest;
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

    // Метод вывода данного поста
    public function show($post_id)
    {
        $post = Post::find($post_id);

        return view('blog.post_show', compact('post'));
    }

    // Метод создания поста от своего аккаунта
    public function create()
    {
        $categories = Category::all();

        return view('blog.create_post', compact('categories'));
    }
    // Метод сохранения созданного поста
    public function store(PostCreateRequest $request)
    {
        $req = $request->all();
        unset($req['_token']);

        $post = Post::create($req);

        return redirect()->route('post.show', $post->id);
    }
    // Метод редактирование своего поста
    public function edit(Request $request)
    {
        $post_id= $request->id;

        $post = Post::find($post_id);
        $categories = Category::all();

        return view('blog.post_edit',compact('post','categories'));

    }
    // Метод сохранения своего отредактированного поста
    public function save(PostEditRequest $request)
    {
        $data = $request->all();
        $id = $request->id;
        $post = Post::find($id);

        $answer = $post->fill($data)->save();

        if($answer)
        {
            return redirect()->route('post.show',$id)->with(['success'=>'Редактирование поста успешно']);
        }else{
            return back()->withErrors(['error'=>'Ошибка редактирования'])->withInput();
        }

    }
}
