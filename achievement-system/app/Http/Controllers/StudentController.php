<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use App\Models\User;
use App\Models\StudentHasGuardian;
use App\Models\StudentHasAchievement;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function view($achievement_id)
    {
        if (($achievement = Achievement::findOrFail($achievement_id)) && !is_null(StudentHasAchievement::where('student_id', '=', Auth::id())->firstWhere('achievement_id', '=', $achievement_id)))
        {
            return view('student.view', ['achievement' => $achievement]);
        }
        abort(403);
    }
}
