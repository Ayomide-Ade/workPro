<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class InternDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $application = $user->application;

        return view('intern.dashboard', ['user' => $user, 'application' => $application]);
    }
}
