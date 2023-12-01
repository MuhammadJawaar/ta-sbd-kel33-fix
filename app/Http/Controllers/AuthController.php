<?php

// app/Http/Controllers/AuthController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        if (session('user_id')){
            return redirect('/home');
        }
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $nomerHandphone = $request->input('nomer_handphone');
        $password = $request->input('password');
        

        // Debug: Tambahkan log informasi
        Log::info('Trying to log in with nomer_handphone: ' . $nomerHandphone);

        $user = DB::select("SELECT * FROM users WHERE nomer_handphone = :nomer_handphone", ['nomer_handphone' => $nomerHandphone]);

        // Debug: Tambahkan log informasi
        Log::info('User from database:', ['user' => $user]);

        if ($user && password_verify($password, $user[0]->password)) {
            // Debug: Tambahkan log informasi
            Log::info('Authentication successful for user ID: ' . $user[0]->id);

            // Otentikasi berhasil, simpan informasi pengguna dalam session
            session(['user_id' => $user[0]->id]);

            return redirect('/home'); // Ganti dengan URL yang sesuai
        }

        // Debug: Tambahkan log informasi
        Log::warning('Authentication failed for nomer_handphone: ' . $nomerHandphone. $password);

        // Otentikasi gagal
        return back()->withErrors(['nomer_handphone' => 'Invalid credentials']);
    }

    public function logout()
    {
        // Debug: Tambahkan log informasi
        Log::info('Logging out user ID: ' . auth()->id());

        // Logout pengguna
        Auth::logout();

        // Hapus data sesi pengguna
        session()->forget('user_id');

        // Redirect ke halaman login
        return redirect('/login');
    }
}


