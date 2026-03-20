<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

use App\Models\Achievement;

use App\Models\StudentsHaveAchievements;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class TeacherController extends Controller
{
    public function showAward(Request $request)
    {
        $students = [];
        foreach ($request->all() as $id)
        {
            if (($student = User::findOrFail($id))->type === 'student')
            {
                $students[] = $student;
            }
            else
            {
                return back()->withErrors('Invalid ID; selected user must be a student');
            }
        }
        if (empty($students))
        {
            return back()->withErrors('You must select at least 1 student before trying to award an achievement');
        }
        return view('teacher.award', ['students' => $students]);
    }

    public function award(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required',

            'type' => 'required|in:badge,medal,trophy',

            'title' => 'required|string|max:255',

            'description' => 'nullable|string|max:1023'
        ]);


        $students = [];
        foreach (explode(' ', trim($validated['id'])) as $id)
        {
            try
            {
                if (($student = User::findOrFail($id))->type === 'student')
                {
                    $students[] = $student;
                }
                else
                {
                    return back()->withErrors('Invalid ID; achievements can only be awarded to students');
                }
            }
            catch(ModelNotFoundException)
            {
                return back()->withErrors('One or more students could not be found, no achievements were issued');
            }
        }

        $achievement = Achievement::factory()->create([
            'type' => $validated['type'],
            'title' => $validated['title'],
            'description' => $validated['description'],
            'teacher_id' => Auth::id()
        ]);

        foreach ($students as $student)
        {
            StudentsHaveAchievements::factory()->create([
                'student_id' => $student->id, 
                'achievement_id' => $achievement->id
            ]);
        }

        return back()->with('success', 'Successfully issued award(s)');
    }
}
