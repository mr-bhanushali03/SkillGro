<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function Categories() {
        return Category::all();
    }

    function index() {
        $Categories = $this->Categories();
        return view('website.index',compact('Categories'));
    }

    function about() {
        $Categories = $this->Categories();
        return view('website.about',compact('Categories'));
    }

    function blogs() {
        $Categories = $this->Categories();
        return view('website.blog',compact('Categories'));
    }

    function blogDetail() {
        $Categories = $this->Categories();
        return view('website.blog-details',compact('Categories'));
    }

    function courses() {
        $Categories = $this->Categories();
        return view('website.courses',compact('Categories'));
    }

    function courseDetail() {
        $Categories = $this->Categories();
        return view('website.courseDetail',compact('Categories'));
    }

    function events() {
        $Categories = $this->Categories();
        return view('website.events',compact('Categories'));
    }

    function eventDetail() {
        $Categories = $this->Categories();
        return view('website.eventDetail',compact('Categories'));
    }

    function instructors() {
        $data = [
            'Instructor' => User::where('role', 'Instructor')->paginate(9),
            'Categories' => $this->Categories(),
        ];
        return view('website.instructors', $data);
    }

    function instructorDetail() {
        $Categories = $this->Categories();
        return view('website.instructorDetail',compact('Categories'));
    }

    function contact() {
        $Categories = $this->Categories();
        return view('website.contact',compact('Categories'));
    }

    function privacy() {
        $Categories = $this->Categories();
        return view('website.privacy',compact('Categories'));
    }

    function support() {
        $Categories = $this->Categories();
        return view('website.support',compact('Categories'));
    }

    function terms() {
        $Categories = $this->Categories();
        return view('website.terms',compact('Categories'));
    }

    function cart() {
        $Categories = $this->Categories();
        return view('website.cart',compact('Categories'));
    }
}
