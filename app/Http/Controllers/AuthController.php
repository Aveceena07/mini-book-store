<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; // Pastikan model User diimport
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Fungsi untuk menampilkan halaman register
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Fungsi untuk menangani proses registrasi
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()
            ->route('login')
            ->with('success', 'Registration successful. Please login.');
    }

    // Fungsi untuk menampilkan halaman login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Fungsi untuk menangani proses login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('books.index'); // Ganti dengan route yang sesuai
        }

        return redirect()
            ->back()
            ->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
    }

    // Fungsi untuk logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}