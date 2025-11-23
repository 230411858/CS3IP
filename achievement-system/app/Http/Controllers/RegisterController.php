<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __invoke(Request $request)
    {
        $validated = $request->validate([

            'name' => ['required', 'string', 'max:255'],

            'email' => ['required', 'email', 'unique:users', 'max:255'],

            'password' => ['required', 'min:8'],

        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'type' => 'student',
        ]);

        Auth::login($user);

        return redirect()->route('dashboard');
    }
}
