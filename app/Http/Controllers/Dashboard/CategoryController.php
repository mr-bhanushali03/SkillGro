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
        return view('dashboard.category')->with('Title', 'Category');
    }

    function addCategory(Request $request)
    {
        $request->validate([
            'category' => 'required|string|max:250',
            'icon' => 'required|string|max:250',
        ]);
        if (Category::where('category', $request->category)->exists()) {
            return redirect()->route('category')->withErrors(['error' => 'Category already exists!'])->onlyInput('category');
        } else if (Category::where('icon', $request->icon)->exists()) {
            return redirect()->route('category')->withErrors(['icon' => 'Icon already exists!'])->onlyInput('icon');
        } else {
            Category::create($request->all());
            return redirect()->route('category')->withSuccess('You have successfully added a new category!');
        }
    }

    function icons()
    {
        return view('dashboard.icons')->with('Title', 'Icons');
    }
}
