<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsVerifiedOtp
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Bypass OTP untuk admin
        if ($request->user() && !$request->user()->is_verified && $request->user()->role !== 'admin') {
            return redirect()->route('otp.verify');
        }

        return $next($request);
    }
}
