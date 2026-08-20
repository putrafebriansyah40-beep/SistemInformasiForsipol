<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BendaharaMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check() && in_array(auth()->user()->role, ['bendahara', 'admin'])) {
            return $next($request);
        }

        abort(403, 'Akses ditolak. Halaman ini hanya untuk Bendahara.');
    }
}
