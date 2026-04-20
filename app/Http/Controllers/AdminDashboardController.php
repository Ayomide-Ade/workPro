<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\User;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->query('status', 'all');

        $query = User::where('role', 'intern')
                     ->with('application')
                     ->latest();

        if (in_array($filter, ['pending', 'approved', 'rejected'])) {
            $query->whereHas('application', function ($q) use ($filter) {
                $q->where('status', $filter);
            });
        }

        $interns = $query->paginate(15)->withQueryString();

        $counts = [
            'all'      => User::where('role', 'intern')->count(),
            'pending'  => Application::where('status', 'pending')->count(),
            'approved' => Application::where('status', 'approved')->count(),
            'rejected' => Application::where('status', 'rejected')->count(),
        ];

        return view('admin.dashboard', compact('interns', 'counts', 'filter'));
    }

    public function show(User $user)
    {
        abort_if($user->isAdmin(), 404);

        $application = $user->application;

        return view('admin.profile', compact('user', 'application'));
    }

    public function updateStatus(Request $request, User $user)
    {
        abort_if($user->isAdmin(), 404);

        $validated = $request->validate([
            'status'      => ['required', 'in:pending,approved,rejected'],
            'admin_notes' => ['nullable', 'string', 'max:1000'],
        ]);

        $user->application()->updateOrCreate(
            ['user_id' => $user->id],
            [
                'status'      => $validated['status'],
                'admin_notes' => $validated['admin_notes'] ?? null,
                'reviewed_at' => now(),
            ]
        );

        return back()->with('success', 'Internship ' . ($request->status) . ' for ' . $user->name . '.');
    }
}