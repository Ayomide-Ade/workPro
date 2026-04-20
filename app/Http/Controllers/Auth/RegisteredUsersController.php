<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Models\Application;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisteredUsersController extends Controller
{
    public function create()
    {
        return view('auth.register', [
            'nigerianStates' => $this->nigerianStates(),
            'availableRoles' => $this->availableRoles(),
        ]);
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name'             => ['required', 'string', 'max:255'],
            'email'            => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'         => ['required', Password::defaults()],
            'age'              => ['required', 'integer', 'min:16', 'max:40'],
            'school'           => ['required', 'string', 'max:255'],
            'department'       => ['required', 'string', 'max:255'],
            'state'            => ['required', 'string', 'in:' . implode(',', $this->nigerianStates())],
            'cgpa'             => ['required', 'numeric', 'min:0', 'max:5.00'],
            'role_applied_for' => ['required', 'string', 'in:' . implode(',', $this->availableRoles())],
        ]);

        $user = User::create([
            'name'       => $attributes['name'],
            'email'      => $attributes['email'],
            'password'   => $attributes['password'],
            'role'       => 'intern',
            'age'        => $attributes['age'],
            'school'     => $attributes['school'],
            'department' => $attributes['department'],
            'state'      => $attributes['state'],
            'cgpa'       => $attributes['cgpa'],
        ]);

        Application::create([
            'user_id'          => $user->id,
            'status'           => 'pending',
            'role_applied_for' => $attributes['role_applied_for'],
        ]);

        Auth::login($user);

        return redirect('/dashboard');
    }

    private function nigerianStates(): array
    {
        return [
            'Abia','Adamawa','Akwa Ibom','Anambra','Bauchi','Bayelsa',
            'Benue','Borno','Cross River','Delta','Ebonyi','Edo','Ekiti',
            'Enugu','FCT - Abuja','Gombe','Imo','Jigawa','Kaduna','Kano',
            'Katsina','Kebbi','Kogi','Kwara','Lagos','Nasarawa','Niger',
            'Ogun','Ondo','Osun','Oyo','Plateau','Rivers','Sokoto',
            'Taraba','Yobe','Zamfara',
        ];
    }

    private function availableRoles(): array
    {
        return [
            'Frontend Development',
            'Backend Development',
            'UI/UX Design',
            'Data Science & AI',
            'DevOps & Cloud',
            'Product Management',
            'QA & Testing',
            'Technical Writing',
        ];
    }
}
