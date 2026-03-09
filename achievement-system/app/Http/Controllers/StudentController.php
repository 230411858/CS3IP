<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use App\Models\StudentsHaveAchievements;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function viewAchievement($type)
    {
        if (in_array($type, ['badge', 'medal', 'trophy']))
        {
            return view('student.view', ['achievements' => Auth::user()->achievements()->where('type', '=', $type)->orderByDesc('created_at')->get(), 'type' => $type]);
        }
        return back()->withErrors('Achievements must be of type badge, medal or trophy');
    }
}
