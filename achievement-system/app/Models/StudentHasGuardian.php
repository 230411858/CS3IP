<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class StudentHasGuardian extends Pivot
{
    /** @use HasFactory<\Database\Factories\StudentHasGuardianFactory> */
    use HasFactory;

    public $table = 'students_have_guardians';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'student_id',
        'guardian_id'
    ];
}
