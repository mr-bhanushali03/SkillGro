<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
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
        return view('website.instructors');
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
