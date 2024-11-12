<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Fungsi Login
     */
    public function login(Request $request)
{
    // Validate input
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required|string',
    ]);

    // Attempt login
    if (Auth::attempt($credentials)) {
        $user = Auth::user();

        // Check if user is admin
        if ($user->role === 'admin') {
            return redirect()->route('dashboard')->with('success', 'Selamat datang di Dashboard Admin!');
        }

        // Logout non-admin users
        Auth::logout();
        return redirect()->route('login')->with('error', 'Akses hanya untuk admin!');
    }

    // Handle failed login
    return redirect()->route('login')->with('error', 'Kredensial yang Anda berikan salah!');
}

        // Register
    public function register(Request $request) {
        // Validasi input dari form register
        $validator = Validator::make($request->all(), [
            'nama_lengkap' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        try {
            // Membuat pengguna baru
            $user = new User();
            $user->name = $request->nama_lengkap;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role = 'user';  // Set role default sebagai 'user'
            $user->save();

            // Redirect ke halaman login setelah registrasi berhasil
            return redirect()->route('login')->with('Status', 'Akun berhasil ditambahkan. Silakan login.');

        } catch (\Throwable $th) {
            // Menangani error dan menampilkan pesan error
            return back()->withErrors([
                'message' => 'Terjadi kesalahan: ' . $th->getMessage(),
            ])->withInput();
        }
    }

    /**
     * Fungsi Logout
     */
    public function logout(Request $request) {
        // Proses logout pengguna
        Auth::logout();

        // Invalidasi sesi
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect ke halaman utama
        return redirect('/');
    }

}
