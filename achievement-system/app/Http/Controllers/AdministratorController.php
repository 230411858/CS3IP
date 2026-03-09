<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Hash;

class AdministratorController extends Controller
{
    public function showEdit(int $id)
    {
        $user = User::findOrFail($id);
        return view('administrator.edit', ['user' => $user]);
    }

    public function edit(Request $request)
    {

        $validated = $request->validate([
            'id' => 'required|exists:users,id',

            'name' => 'nullable|string|max:255|regex:/[a-zA-Z](\s?[a-zA-Z])*/',

            'email' => 'nullable|email|unique:users|max:255',

            'password' => 'nullable|min:8',

            'type' => 'nullable|in:teacher,guardian,student',

        ]);

        $user = User::find($validated['id']);

        if (!empty($raw_name = $validated['name']))
        {
            $raw_name = trim($raw_name);

            $individual_names = explode(" ", $raw_name);

            $formatted_name = "";

            foreach ($individual_names as $name)
            {
                $formatted_name = $formatted_name . ucfirst(strtolower($name)) . " ";
            }

            trim($formatted_name);

            $user->name = $formatted_name;
        }

        if (!empty($email = $validated['email']))
        {
            $user->email = $email;
        }

        if (!empty($password = $validated['password']))
        {
            $user->password = Hash::make($password);
        }

        if (!empty($type = $validated['type']))
        {
            if ($user->type === 'administrator')
            {
                return back()->withErrors('An administrator\'s type cannot be changed, user has not been modified');
            }
            $user->type = $type;
        }

        $user->save();

        return back()->with('success', 'Successfully modified user');
    }
}
