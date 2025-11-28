<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view("admin.dashboard", ['users' => User::all()->orderByDesc('type')->get()]);
    }

    public function showEdit(int $id)
    {
        $user = User::findOrFail($id);
        return view('admin.edit', ['user' => $user]);
    }

    public function edit(Request $request)
    {
        $user = User::find($request->id);

        $validated = $request->validate([

            'name' => 'nullable|string|max:255|regex:/[a-zA-Z](\s?[a-zA-Z])*/',

            'email' => 'nullable|email|unique:users|max:255',

            'password' => 'nullable|min:8',

            'type' => 'nullable|in:teacher,parent,student',

        ]);

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
            $user->type = $type;
        }

        $user->save();

        return back()->with('success', 'Successfully modified user');
    }
}
