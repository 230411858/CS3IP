<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class StudentHasAchievement extends Pivot
{
    /** @use HasFactory<\Database\Factories\StudentHasAchievementFactory> */
    use HasFactory;

    public $table = "students_have_achievements";

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'student_id',
        'classroom_id'
    ];
}
