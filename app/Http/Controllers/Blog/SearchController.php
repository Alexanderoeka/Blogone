<?php

namespace App\Http\Controllers\Blog;

use App\Models\Category;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index()
    {

        $categories = Category::all();


        return view('blog.search', compact('categories'));
    }

    public function search(Request $request)
    {
        $data = $request->all();

        $quer = array();
        if ($data['title'] != null) {
            $quer['title'] = $data['title'];
        }
        if ($data['category_id'] != 0) {
            $quer['category_id'] = $data['category_id'];
        }
        $user_id = isset(User::select('id')->where('name', $data['name'])->get()[0]['id']) ? User::select('id')->where('name', $data['name'])->get()[0]['id'] : null;

        if ($data['name'] != null && $user_id != null) {

            $quer['user_id'] = $user_id;
        }

        $posts = Post::select()->where($quer)->get();

        if (isset($posts)) {
            return $this->found($posts,$data);
        }
    }
    public function found($posts,$data)
    {
        $categories = Category::all();

        return view('blog.search', compact('categories','posts','data'));
    }
}
