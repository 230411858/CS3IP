<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    function showEdit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.edit', ['user' => $user]);
    }

    function edit(Request $request)
    {
        $user = User::findOrFail($request->id);

        if (!empty($request->name))
        {
            $validated = $request->validate([

            'name' => 'required|string|max:255|regex:/[a-zA-Z](\s?[a-zA-Z])*/',

            ]);

            $full_name = trim($validated['name']);

            $individual_names = explode(" ", $full_name);

            $formatted_full_name = "";

            foreach ($individual_names as $name)
            {
                $formatted_full_name = $formatted_full_name . ucfirst(strtolower($name)) . " ";
            }

            trim($formatted_full_name);

            $user->name = $formatted_full_name;
        }

        if (!empty($request->email))
        {
            $validated = $request->validate([

            'email' => 'required|email|unique:users|max:255',

            ]);

            $user->email = $validated['email'];
        }

        if (!empty($request->password))
        {
            $validated = $request->validate([

                'password' => 'required|min:8',

            ]);

            $user->password = Hash::make($validated['password']);
        }

        $user->save();

        return back();
    }
}
