<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class AchievementUser extends Pivot
{
    /** @use HasFactory<\Database\Factories\AchievementUserFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'student_id',
        'achievement_id'
    ];
}
