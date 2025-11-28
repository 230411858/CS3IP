<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use App\Models\User;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function dashboard()
    {
        switch (Auth::user()->type)
        {
            case 'admin':
                return view("admin.dashboard", ['users' => User::all()]);
                break;
            case 'teacher':
                return view("teacher.dashboard", ['students' => User::where('type', '=', 'student')->orderBy('name')->get()]);
                break;
            case 'student':
                return view("student.dashboard", ['achievements' => Achievement::where('awarded_to', '=', Auth::id())->orderByDesc('created_at')->get()]);
                break;
        }
        abort(404);
    }
    
    public function updateEmail(Request $request)
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

    public function updatePassword(Request $request)
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
