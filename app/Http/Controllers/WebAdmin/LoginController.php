<?php

namespace App\Http\Controllers\WebAdmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('dashboard.login.index');
    }
    public function authenticate(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password) || !$user->is_admin) {
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])->onlyInput('email');
        }

        if (Auth::attempt($request->only('email', 'password'))) {
            // Retrieve the authenticated user
            $user = User::where('email', $request->email)
                ->first();

            Auth::login($user, true);
            $request->session()->regenerate();

            return to_route('admin.dashboard');
        }



        return to_route('admin.dashboard')->with('success', 'Logged in successfully!');
    }
}
