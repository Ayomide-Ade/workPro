<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class InternDashboardController extends Controller
{
    public function index()
    {
        $user        = Auth::user();
        $application = $user->application;

        return view('intern.dashboard', compact('user', 'application'));
    }
}
