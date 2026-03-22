<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionTimeout
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $lastActivity = session('last_activity');
            $timeout = config('session.lifetime') * 60; // konversi ke detik

            if ($lastActivity && (time() - $lastActivity) > $timeout) {
                Auth::logout();
                session()->invalidate();
                session()->regenerateToken();

                return redirect('/login')->with('message', 'Sesi Anda telah berakhir.');
            }

            session(['last_activity' => time()]);
        }

        return $next($request);
    }
}
