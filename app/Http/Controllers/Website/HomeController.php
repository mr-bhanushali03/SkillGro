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
}
