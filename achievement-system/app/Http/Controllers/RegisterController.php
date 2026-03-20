<?php

namespace App\Http\Controllers;

use App\Models\User;

use App\Models\Student;

use App\Models\Guardian;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __invoke(Request $request)
    {
        $validated = $request->validate([

            'name' => 'required|string|min:1|max:255|regex:/([a-zA-Z]\s?)*/',

            'email' => 'required|email|unique:users|max:255',

            'password' => 'required|min:8',

            'type' => 'required|in:student,guardian'

        ]);

        $name = trim($validated['name']);

        $names = explode(" ", $name);

        $formatted_name = "";

        foreach ($names as $name)
        {
            $formatted_name = $formatted_name . ucfirst(strtolower($name)) . " ";
        }

        trim($formatted_name);

        $user = User::create([
            'name' => $formatted_name,
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'type' => $validated['type']
        ]);

        Auth::login($user);

        return redirect()->route('dashboard');
    }
}
