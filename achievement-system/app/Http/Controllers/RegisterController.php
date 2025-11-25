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

            'name' => 'required|string|max:255|regex:[a-zA-z][a-zA-Z]*\s[a-zA-Z][a-zA-Z]*',

            'email' => 'required|email|unique:users|max:255',

            'password' => 'required|min:8',

        ]);

        $formatted_name = explode(" ", $validated['name']);

        $formatted_name = strtoupper($formatted_name[0][0]) . strtolower(substr($formatted_name[0], 1)) . " " . strtoupper($formatted_name[1][0]) . strtolower(substr($formatted_name[1], 1));

        $user = User::create([
            'name' => $formatted_name,
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'type' => 'student',
        ]);

        Auth::login($user);

        return redirect()->route('dashboard');
    }
}
