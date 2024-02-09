<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function category()
    {
        $data = [
            'Title' => 'Category',
            'Categories' => Category::all()
        ];
        return view('dashboard.category', $data);
    }

    function addCategory(Request $request)
    {
        $request->validate([
            'category' => 'required|string|max:250',
            'icon' => 'required|string|max:250',
        ]);
        if (Category::where('category', $request->category)->exists()) {
            return redirect()->route('category')->withErrors(['category' => 'Category already exists!'])->onlyInput('category');
        } else if (Category::where('icon', $request->icon)->exists()) {
            return redirect()->route('category')->withErrors(['icon' => 'Icon already exists!'])->onlyInput('icon');
        } else {
            Category::create($request->all());
            return redirect()->route('category')->withSuccess('You have successfully added a new category!');
        }
    }

    function updateCategory(Request $request)
    {
        $request->validate([
            'category' => 'required|string|max:250',
            'icon' => 'required|string|max:250',
        ]);

        if (Category::where('id', $request->id)->exists()) {
            Category::where('id', $request->id)->update($request->except('_token'));
            return redirect()->route('category')->withSuccess('You have successfully updated the category!');
        } else {
            return redirect()->route('category')->withErrors('Category not found!');
        }
    }

    function deleteCategory($id)
    {
        if (Category::where('id', $id)->exists()) {
            Category::where('id', $id)->delete();
            return redirect()->route('category')->withSuccess('You have successfully deleted the category!');
        } else {
            return redirect()->route('category')->withErrors('Category not found!');
        }
    }

    function deleteAll()
    {
        Category::truncate();
        return redirect()->route('category')->withSuccess('You have successfully deleted all categories!');
    }

    function icons()
    {
        return view('dashboard.icons')->with('Title', 'Icons');
    }
}
