<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function Categories()
    {
        return Category::all();
    }

    function index()
    {
        $data = [
            'Categories' => $this->Categories(),
            'Instructors' => User::where('role', 'Instructor')->orderBy('id', 'desc')->get(),
        ];
        return view('website.index', $data);
    }

    function about()
    {
        $Categories = $this->Categories();
        return view('website.about', compact('Categories'));
    }

    function blogs()
    {
        $Categories = $this->Categories();
        return view('website.blog', compact('Categories'));
    }

    function blogDetail()
    {
        $Categories = $this->Categories();
        return view('website.blog-details', compact('Categories'));
    }

    function courses()
    {
        $Courses = Course::orderBy('id', 'desc')->paginate(6);
        $AllCourses = Course::orderBy('id', 'desc');
        $Categories = $this->Categories();
        $Instructors = User::where('role', 'Instructor')->orderBy('id', 'desc')->take(10)->get();

        $data = compact('Courses', 'AllCourses', 'Categories', 'Instructors');

        return view('website.courses')->with($data);
    }

    function courseInDetail($name)
    {
        $course = Course::where('title', decrypt($name))->first();
        $data = [
            'Course' => $course,
            'Categories' => $this->Categories(),
            'Instructors' => User::where('id', $course->user_id)->first(),
            'Students' => User::find(auth()->id()),
        ];
        return view('website.courseDetail', $data);
    }

    function events()
    {
        $Categories = $this->Categories();
        return view('website.events', compact('Categories'));
    }

    function eventDetail()
    {
        $Categories = $this->Categories();
        return view('website.eventDetail', compact('Categories'));
    }

    function instructors()
    {
        $data = [
            'Instructor' => User::where('role', 'Instructor')->paginate(9),
            'Categories' => $this->Categories(),
        ];
        return view('website.instructors', $data);
    }

    function instructorDetail()
    {
        $Categories = $this->Categories();
        return view('website.instructorDetail', compact('Categories'));
    }

    function contact()
    {
        $Categories = $this->Categories();
        return view('website.contact', compact('Categories'));
    }

    function privacy()
    {
        $Categories = $this->Categories();
        return view('website.privacy', compact('Categories'));
    }

    function support()
    {
        $Categories = $this->Categories();
        return view('website.support', compact('Categories'));
    }

    function terms()
    {
        $Categories = $this->Categories();
        return view('website.terms', compact('Categories'));
    }
}
