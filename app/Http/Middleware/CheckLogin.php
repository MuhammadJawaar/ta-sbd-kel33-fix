<?php

// File: app/Http/Middleware/CheckLogin.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class CheckLogin
{
    public function handle($request, Closure $next)
    {
        if (Session::has('user_id')) {
            // Pengguna terautentikasi, lanjutkan ke rute
            return $next($request);
        }

        // Pengguna tidak terautentikasi, lempar ke halaman login
        return redirect('/login');
    }
}
