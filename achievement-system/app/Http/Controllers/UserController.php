<?php

namespace App\Http\Controllers;

use App\Models\Achievement;

use App\Models\AchievementUser;

use App\Models\User;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

use function Pest\Laravel\session;

class UserController extends Controller
{
    public function dashboard()
    {
        $user = User::find(Auth::id());
        switch ($type = $user->type)
        {
            case 'administrator':
                return view("administrator.dashboard", ['users' => User::all()]);
            case 'teacher':
                return view("teacher.dashboard", ['students' => User::where('type', 'student')->get()]);
            case 'guardian':
                return view("guardian.dashboard", ['children' => $user->children()->with('achievements')->get()]);
            case 'student':
                return view("student.dashboard", ['achievements' => $user->achievements()->orderByDesc('created_at')->get(), 'guardians' => $user->guardians()->get()]);
        }
        return back()->withErrors('Could not find corresponding dashboard for user with type '. $type);
    }
    
    public function updateEmail(Request $request)
    {
        $user = User::find(Auth::id());

        $validated = $request->validate([
            'email' => 'required|email|unique:users|max:255',
        ]);

        $user->email = $validated['email'];

        $user->save();

        return back()->with('success', 'Email updated successfully');
    }

    public function updatePassword(Request $request)
    {
        $user = User::find(Auth::id());

        $validated = $request->validate([
            'currentPassword' => 'required|min:8',
            'newPassword' => 'required|min:8',
            'newPasswordConfirmation' => 'required|min:8'
        ]);

        if (Hash::check($validated['currentPassword'], $user->password))
        {
            if ($validated['newPassword'] === $validated['newPasswordConfirmation'])
            {
                $user->password = Hash::make($validated['newPassword']);

                $user->save();

                return back()->with('success', 'Password updated successfully');
            }
            else
            {
                return back()->withErrors('Please check that you have entered your new password correctly twice');
            }
        }
        return back()->withErrors('Please check that you have entered your current password correctly');
    }
}
