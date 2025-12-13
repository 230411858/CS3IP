<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

use App\Models\Achievement;

use App\Models\AchievementUser;
use App\Models\StudentHasAchievement;

class TeacherController extends Controller
{
    public function showAward(int $id)
    {
        if (($student = User::findOrFail($id))->type === 'student')
        {
            return view('teacher.award', ['student' => $student]);
        }
        return back();
    }

    public function award(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|exists:users,id',

            'type' => 'required|in:badge,medal,trophy',

            'title' => 'required|string|max:255',

            'description' => 'nullable|string|max:1023'
        ]);

        if (($type = User::find($validated['id'])->type) !== 'student')
        {
            return back()->withErrors('You can only award achievements to students, not ' . $type .'s');
        }

        $achievement = Achievement::factory()->create([
            'type' => $validated['type'],
            'title' => $validated['title'],
            'description' => $validated['description'],
            'teacher_id' => Auth::id()
        ]);

        StudentHasAchievement::factory()->create([
            'student_id' => $validated['id'], 
            'achievement_id' => $achievement->id
        ]);

        return back()->with('success', 'Successfully issued award');
    }
}
