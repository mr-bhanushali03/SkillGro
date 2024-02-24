<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class CourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function Categories() {
        return Category::all();
    }

    public function courses()
    {
        $data = [
            'Title' => 'Courses',
            'Categories' => $this->Categories(),
        ];
        return view('dashboard.courses', $data);
    }

    function addCourse(Request $request) {
        dd($request->all());
    }
}
