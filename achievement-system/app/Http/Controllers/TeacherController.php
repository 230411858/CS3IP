<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    public function showAward(int $id)
    {
        if (($student = User::findOrFail($id))->type === 'student')
        {
            return view('teacher.award', ['student' => $student]);
        }
        abort(403);
    }

    public function award(Request $request)
    {
        $validated = $request->validate([
            'type' => 'required|in:badge,medal,trophy',

            'title' => 'required|string|max:255',

            'description' => 'nullable|string|max:1023'
        ]);

        Achievement::create([
            'type' => $validated['type'],
            'title' => $validated['title'],
            'description' => $validated['description'],
            'awarded_to' => $request->id,
            'awarded_by' => Auth::id(),
        ]);

        return back()->with('success', 'Successfully issued award');
    }
}
