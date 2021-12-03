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
    public function edit($id)
    {
        $category = Category::find($id);

        return view('blog.admin.admin_category_edit',compact('category'));

    }
    public function save(Request $request,$id)
    {
        $data = $request->all();

        $category = Category::find($id);
        $answer = $category->fill($data)->save();
        if($answer)
        {
           return redirect()->route('admin.category',$id)->with(['success'=>'Сохранение данных категории успешно']);
        }else
        {
            return back()->withErrors(['error'=>'Ошибка сохранения'])->withInput();
        }

    }
    public function destroy($id)
    {
        dd(__METHOD__,$id);
    }
}
