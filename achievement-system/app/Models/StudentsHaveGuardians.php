<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class StudentsHaveGuardians extends Pivot
{
    /** @use HasFactory<\Database\Factories\StudentsHaveGuardiansFactory> */
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
