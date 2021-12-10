<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Класс изменения категорий в админке
class AdminCategoryController extends Controller
{
    // Выводит все категории в админке
    public function  index()
    {
        $categories = Category::all();

        return view('blog.admin.admin_categories', compact('categories'));
    }

    // Метод редактирования категории
    public function edit($id)
    {
        $category = Category::find($id);

        return view('blog.admin.admin_category_edit', compact('category'));
    }
    //Метод сохранение отредактированной категории
    public function save(Request $request, $id)
    {
        $data = $request->all();
        $data['pizda'] = 10;

        $category = Category::find($id);
        unset($data['_token']);

        $answer = $category->fill($data)->save();
        if ($answer) {
            return redirect()->route('admin.category.edit', $id)->with(['success' => 'Сохранение данных категории успешно']);
        } else {
            return back()->withErrors(['error' => 'Ошибка сохранения'])->withInput();
        }
    }
    // Метод удаления категории
    public function destroy($id)
    {
        $category = Category::find($id);
        $title = $category->title;
        $answer = $category->delete();

        if($answer)
        {
            return redirect()->route('admin.categories')->with(['success'=>'Удаление категории "'.$title.'"  успешно']);

        }else{
            return back()->withErrors(['error'=>'Ошибка- удаление категории не исполнилось']);
        }

    }


    // Метод создания новой категории
    public function create()
    {
        return view('blog.admin.admin_category_create');
    }

    // Метод сохранения созданной категории
    public function store(Request $request)
    {

        $data = $request->all();
        $category = new Category;
        $result = $category->fill($data)->save();

        if ($result) {
            return redirect()->route('admin.category.edit',$category->id)
                ->with(['success' => 'Создание новой категории прошло успешно']);
        } else {
            return back()->withErrors(['error' => 'Произошла ошибка создания категории'])->withInput();

        }
    }
}
