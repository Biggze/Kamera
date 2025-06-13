<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
      public function handle(Request $request, Closure $next): Response
    {
        // Ganti email sesuai email admin Anda
        if (auth()->check() && auth()->user()->email === 'dewa@email.com') {
            return $next($request);
        }
        abort(403, 'Unauthorized');
    }
   
   
}
