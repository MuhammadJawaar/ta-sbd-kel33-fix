<?php

// app/Http/Controllers/HomeController.php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function show()
    {
        // Ambil ID pengguna dari session
        $userId = session('user_id');

        // Ambil informasi pengguna dari database menggunakan kueri langsung
        $user = DB::select("SELECT * FROM users WHERE id = :id", ['id' => $userId]);

        if (empty($user)) {
            // Jika pengguna tidak ditemukan, redirect atau lakukan tindakan lainnya
            // Contoh: Redirect ke halaman login
            return redirect('/login');
        }

        $user = $user[0]; // Karena hasil kueri adalah array, kita ambil elemen pertama

        return view('home.show', ['user' => $user]);
    }
}
