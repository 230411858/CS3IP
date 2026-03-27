<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\StudentsHaveGuardians;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class GuardianController extends Controller
{
    public function dashboard()
    {
        $guardian = User::find(Auth::id());
        return view("guardian.dashboard", ['children' => $guardian->children()->with('achievements')->get()]);
    }
    public function view($child_id)
    {
        $guardian = User::find(Auth::id());
        if (($child = User::findOrFail($child_id))->type === 'student' && $guardian->children()->get()->contains($child))
        {
            return view('guardian.view', ['child' => $child]);
        }
        return back()->withErrors('Please check if the student you are attempting to access has been added to your account.', 403);
    }

    public function add(Request $request)
    {
        $guardian = User::find(Auth::id());
        $validated = $request->validate([
            'email' => 'required|exists:users,email',

            'password' => 'required'
        ]);

        $child = User::firstWhere('email', '=', $validated['email']);

        if ($guardian->children()->get()->contains($child))
        {
            return back()->withErrors('You have already added this child to your account');
        }

        if ($child->type === 'student' && Auth::validate(["email" => $validated['email'], "password" => $validated['password']]))
        {
            StudentsHaveGuardians::factory()->create([
                'student_id' => $child->id,
                'guardian_id' => Auth::id()
            ]);
            return back()->with('success', 'Successfully added child');
        }
        return back()->withErrors('Please check login information and try again');
    }
}
