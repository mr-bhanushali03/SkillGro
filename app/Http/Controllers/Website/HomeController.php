<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index() {
        return view('website.index');
    }

    function about() {
        return view('website.about');
    }

    function blogs() {
        return view('website.blog');
    }

    function blogDetail() {
        return view('website.blog-details');
    }

    function courses() {
        return view('website.courses');
    }

    function courseDetail() {
        return view('website.courseDetail');
    }

    function events() {
        return view('website.events');
    }

    function eventDetail() {
        return view('website.eventDetail');
    }

    function instructors() {
        $Instructor = User::where('role', 'Instructor')->paginate(9);
        return view('website.instructors', compact('Instructor'));
    }

    function instructorDetail() {
        return view('website.instructorDetail');
    }

    function contact() {
        return view('website.contact');
    }

    function privacy() {
        return view('website.privacy');
    }

    function support() {
        return view('website.support');
    }

    function terms() {
        return view('website.terms');
    }

    function cart() {
        return view('website.cart');
    }
}
