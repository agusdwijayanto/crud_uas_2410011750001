<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Menampilkan halaman form login admin.
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Memproses login admin dengan validasi dan remember token.
     */
    public function login(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Coba login dengan remember token jika checkbox dicentang
        if (Auth::attempt($credentials, $request->has('remember'))) {
            $user = Auth::user();

            // Pastikan hanya user dengan role 'admin' yang bisa login
            if ($user->role !== 'admin') {
                Auth::logout();
                return back()->withErrors(['email' => 'Akun ini bukan admin.']);
            }

            // Redirect ke dashboard admin
            return redirect()->intended('/admin');
        }

        // Jika login gagal
        return back()->withErrors(['email' => 'Email atau password salah.']);
    }

    /**
     * Proses logout dan menghapus session.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        // Invalidate session dan regenerate token untuk keamanan
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }
}