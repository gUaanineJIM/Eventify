<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('adRegister');
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|unique:admins',
            'email' => 'required|email|unique:admins',
            'password' => 'required|min:8',
        ]);

        $admin = Admin::create([
            'username' => $validatedData['username'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        return redirect()->route('admin.login');
    }

    public function showLoginForm()
    {
        return view('adLogin');
    }

    public function login(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|exists:admins,email',
            'password' => 'required',
        ]);

        $admin = Admin::where('email', $validatedData['email'])->first();

        if (!$admin || !Hash::check($validatedData['password'], $admin->password)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        return redirect()->route('dashboard');
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('admin.login');
    }

    public function checkUniqueName(Request $request)
    {
        $username = $request->input('username');
        $existingUser = Admin::where('username', $username)->first();

        if ($existingUser) {
            return response()->json(['error' => 'Username already exists'], 409);
        }

        return response()->json(['success' => true]);
    }
}