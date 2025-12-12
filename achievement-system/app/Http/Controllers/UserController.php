<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\StudentHasAchievement;

use App\Models\User;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

use App\UserType;

class UserController extends Controller
{
    public function dashboard()
    {
        $user = User::find(Auth::id());
        switch ($user->type())
        {
            case UserType::Administrator:
                return view("admin.dashboard", ['users' => User::all()]);
            case UserType::Teacher:
                return view("teacher.dashboard", ['students' => Student::with('user')->get()]);
            case UserType::Guardian:
                return view("guardian.dashboard", ['students' => Student::with('user')->get()]);
            case UserType::Student:
                return view("student.dashboard", ['achievements' => StudentHasAchievement::with('achievement')->where('student_id', '=', Auth::id())->orderByDesc('created_at')->get()]);
        }
        abort(404);
    }
    
    public function updateEmail(Request $request)
    {
        $user = User::find(Auth::id());
        $validated = $request->validate([
            'email' => 'required|email|unique:users|max:255',
        ]);

        $user->email = $validated['email'];

        $user->save();

        return back(200);
    }

    public function updatePassword(Request $request)
    {
        $user = User::find(Auth::id());

        $validated = $request->validate([
            'password' => 'required|min:8',
        ]);

        $user->password = Hash::make($validated['password']);

        $user->save();

        return back(200);
    }
}
