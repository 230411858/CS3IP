<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class StudentHasAchievement extends Model
{
    /** @use HasFactory<\Database\Factories\StudentHasAchievementFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'student_id',
        'achievement'
    ];

    public function student(): HasOne
    {
        return $this->hasOne(Student::class, 'id', 'student_id');
    }

    public function achievement(): HasOne
    {
        return $this->hasOne(Achievement::class, 'id', 'achievement_id');
    }
}
