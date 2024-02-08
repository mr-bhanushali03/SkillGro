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
        $this->middleware('guest')->except(['logout', 'lockscreen', 'unlock']);
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
        ]);

        Auth::login(User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'Student',
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

    function lockscreen() {
        if(session('user_data') == null){
            $data = [
                'email' => Auth::user()->email,
                'profile_photo_url' => Auth::user()->profile_photo_url,
                'profile_photo_path' => Auth::user()->profile_photo_path,
                'name' => Auth::user()->name,
            ];
            session(['user_data' => $data]);
        }
        Auth::logout();
        return view('auth.lockscreen');
    }

    public function unlock(Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:8',
            'email' => 'required|email|max:250'
        ]);

        if (User::where('email', $request->email)->exists()) {
            $user = User::where('email', $request->email)->first();
            if (Hash::check($request->password, $user->password)) {
                session()->forget('user_data');
                Auth::login($user);
                return redirect()->route('dashboard')->withSuccess('You have successfully unlocked your account!');
            } else {
                return redirect()->route('lockscreen')->withErrors(['password' => 'Password is invalid']);
            }
        } else {
            return redirect()->route('lockscreen')->withErrors(['email' => 'Invalid email or password']);
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
