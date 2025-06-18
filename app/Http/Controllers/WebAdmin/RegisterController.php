<?php

namespace App\Http\Controllers\WebAdmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('dashboard.register.index');
    }

    public function register(RegisterRequest $request)
    {
        // Create the user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'type' => 'admin',
            'is_admin' => true,
        ]);

        return to_route('admin.login')->with('success', 'Registration successful! Please log in.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        
        // Invalidate the session
        $request->session()->invalidate();

        // Regenerate the CSRF token
        $request->session()->regenerateToken();

        return to_route('admin.login')->with('success', 'Logged out successfully!');
    }
}
