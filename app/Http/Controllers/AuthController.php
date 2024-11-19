<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Artikel;
use App\Models\TitikPembuangan;
use Illuminate\Support\Facades\Hash; // Import Hash facade
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login'); // Menampilkan halaman login
    }

    public function login(Request $request)
    {
        // Validasi input user
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Cek apakah username dan password cocok dengan data di database
        $admin = Admin::where('username', $request->username)->first();

        if ($admin && $admin->password == $request->password) {
            // Set session untuk login sukses
            session(['admin_id' => $admin->id, 'admin_username' => $admin->username]);

            return redirect('/admin');
        }

        // Jika username dan password salah
        return redirect()->back()->with('error', 'Username atau password salah!');
    }
}
