<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginRegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except(['logout', 'dashboard', 'uploadAvatar', 'roles']);
    }

    public function register()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:250',
            'email' => 'required|email|max:250|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string|min:8|same:password',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        Auth::login(User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'Student',
            'avatar' => $request->hasFile('avatar') ? $request->file('avatar')->store('avatars', 'public') : null,
            'remember_token' => Hash::make($request->email . $request->password),
        ]));

        return redirect()->route('dashboard')->withSuccess('You have successfully registered & logged in!');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:250',
            'password' => 'required|string|min:8',
            'rememberToken' => 'nullable|string'
        ]);

        if (User::where('email', $request->email)->exists()) {
            $user = User::where('email', $request->email)->first();
            if (Hash::check($request->password, $user->password)) {
                if ($request->has('rememberToken') && $request->rememberToken == 'checked') {
                    $rememberToken = Hash::make($request->email . $request->password);
                    User::where('email', $request->email)->update(['remember_token' => $rememberToken]);
                    Auth::login($user);
                    return redirect()->route('dashboard')->withSuccess('You have successfully logged in!');
                } else {
                    $credentials = [
                        'email' => $user->email,
                        'password' => $request->password,
                    ];

                    $user = Auth::attempt($credentials);
                    return redirect()->route('dashboard')->withSuccess('You have successfully logged in!');
                }
            } else {
                return redirect()->route('login')->withErrors(['password' => 'Password is invalid']);
            }
        } else {
            return redirect()->route('login')->withErrors(['email' => 'Invalid email or password']);
        }
    }

    public function dashboard(Request $request)
    {
        return Auth::check()
            ? view('dashboard.dashboard')
            : redirect()->route('login')->withErrors(['email' => 'Please login to access the dashboard.'])->onlyInput('email');
    }

    public function uploadAvatar(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        User::where('id', Auth::user()->id)->update(['avatar' => $request->file('avatar')->store('avatars', 'public')]);
        return redirect()->route('dashboard')->withSuccess('You have successfully uploaded your avatar!');
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

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->withSuccess('You have logged out successfully!');
    }
}
