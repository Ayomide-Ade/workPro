<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureIsAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::guest()) {
            return redirect('/login')
                ->with('error', 'Please log in to access your dashboard.');
        }

        if (Auth::user()->isIntern()) {
            abort(404);
        }

        return $next($request);
    }
}
