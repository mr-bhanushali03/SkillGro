<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Payment;
use App\Models\StudentCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class DashboardController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        if (Auth::user()->role == 'Instructor') {
            $courses = Course::where('user_id', auth()->user()->id)->get();
            $paymentCount = Payment::where('student_name', auth()->user()->name)->get();
            $payments = Payment::where('student_name', auth()->user()->name)->paginate(10);
        } else {
            $courses = StudentCourse::where('student_id', auth()->user()->id)
                ->join('courses', 'student_courses.course_id', '=', 'courses.id')
                ->join('users as student', 'student_courses.student_id', '=', 'student.id')
                ->join('users as instructor', 'student_courses.instructor_id', '=', 'instructor.id')
                ->select('student_courses.*', 'courses.*', 'student.*', 'instructor.*')
                ->get();

            $paymentCount = Payment::where('student_name', auth()->user()->name)->get();
            $payments = Payment::where('student_name', auth()->user()->name)->paginate(10);
        }

        $data = [
            'Title' => 'Dashboard',
            'Courses' => $courses,
            'Payments' => $paymentCount,
            'PaymentList' => $payments,
        ];
        
        return Auth::check()
            ? view('dashboard.dashboard', $data)
            : redirect()
                ->route('login')
                ->withErrors(['email' => 'Please login to access the dashboard.'])
                ->onlyInput('email');
    }

    public function roles()
    {
        if (Auth::user()->role == 'Student') {
            User::where('id', Auth::user()->id)->update(['role' => 'Instructor']);
            Auth::user()->update(['role' => 'Instructor']);
            return redirect()->route('dashboard')->withSuccess('You have successfully changed your role to Instructor!');
        } else {
            User::where('id', Auth::user()->id)->update(['role' => 'Student']);
            Auth::user()->update(['role' => 'Student']);
            return redirect()->route('dashboard')->withSuccess('You have successfully changed your role to Student!');
        }
    }
}
