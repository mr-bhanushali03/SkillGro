<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function courses()
    {
        $data = [
            'Title' => 'Courses'
        ];
        return view('dashboard.courses', $data);
    }

    public function courseDetail()
    {
        $data = [
            'Title' => 'Course Detail'
        ];
        return view('dashboard.courseDetail', $data);
    }
}
