<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function dashboard()
    {
        switch (Auth::user()->type)
        {
            case 'admin':
                return view("admin.dashboard", ['users' => User::all()]);
                break;
            case 'teacher':
                return view("teacher.dashboard", ['students' => User::where('type', '=', 'student')->sortBy('name')]);
                break;
            default:
                return view("student.dashboard");
                break;
        }
        abort(404);
    }
    
    function updateEmail(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|unique:users|max:255',
        ]);

        $user = Auth::user();

        $user->email = $validated['email'];

        /* Ignore syntax error from Intelephense plugin, user does have save method but plugin cannot find it */
        $user->save();

        return back(200);
    }

    function updatePassword(Request $request)
    {
        $validated = $request->validate([
            'password' => 'required|min:8',
        ]);

        $user = Auth::user();

        $user->password = Hash::make($validated['password']);

        /* Ignore syntax error from Intelephense plugin, user does have save method but plugin cannot find it */
        $user->save();

        return back(200);
    }
}
