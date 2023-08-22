<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CekUserLogin
{
    public function handle(Request $request, Closure $next, $allowedRole)
{
    if (!Auth::check()) {
        return redirect()->route('login');
    }

    $user = Auth::user();
    if ($user->role === $allowedRole || $user->role === 'admin') {
        return $next($request);
    }

    return redirect()->route('login')->with('error', "Kamu Tidak Memiliki Hak Akses");
}
} 
