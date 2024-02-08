<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class DashboardController extends Controller
{
    function __construct() {
        $this->middleware('auth');
    }

    public function dashboard(Request $request)
    {
        return Auth::check()
            ? view('dashboard.dashboard')->with('Title', 'Dashboard')
            : redirect()->route('login')->withErrors(['email' => 'Please login to access the dashboard.'])->onlyInput('email');
    }

    public function roles()
    {
        if(Auth::user()->role == 'Student'){
            User::where('id', Auth::user()->id)->update(['role' => 'Instructor']);
            Auth::user()->update(['role' => 'Instructor']);
            return redirect()->route('dashboard')->withSuccess('You have successfully changed your role to Instructor!');
        }else{
            User::where('id', Auth::user()->id)->update(['role' => 'Student']);
            Auth::user()->update(['role' => 'Student']);
            return redirect()->route('dashboard')->withSuccess('You have successfully changed your role to Student!');
        }
    }
}
