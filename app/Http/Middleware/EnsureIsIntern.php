<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureIsIntern
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::guest()) {
            return redirect("/login")
                ->with('error', 'Please log in to access your dashboard.');
        }

        if (Auth::user()->isAdmin()) {
            abort(404);
        }

        return $next($request);
    }
}
