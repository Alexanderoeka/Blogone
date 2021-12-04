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
        $data['pizda']=10;

        $category = Category::find($id);
        unset($data['_token']);

        $answer = $category->fill($data)->save();
        if($answer==false)
        {
           return redirect()->route('admin.category.edit',$id)->with(['success'=>'Сохранение данных категории успешно']);
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
