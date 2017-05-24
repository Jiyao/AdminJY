<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(10);
        return view('category.index', compact('categories'));
    }

    public function create()
    {
        return view('category.create-edit');
    }

    public function store(CategoryRequest $request)
    {
        $category = new Category();
        if ($request->commonUpdate($category)) {
            \Flashy::success('操作成功');
            return redirect()->route('category.index');
        }
        return redirect()->back()->withInput($request->input());
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('category.create-edit', compact('category'));
    }

    public function update(CategoryRequest $request, $id)
    {
        $category = Category::findOrFail($id);
        if ($request->commonUpdate($category)) {
            \Flashy::success('操作成功');
            return redirect()->route('category.index');
        }
        return redirect()->back()->withInput($request->input());
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        if ($category->delete()) {
            \Flashy::success('删除成功');
        } else {
            \Flashy::success('删除失败');
        }
        return redirect()->route('category.index');
    }
}
