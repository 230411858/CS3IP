<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class StudentHasClassroom extends Model
{
    /** @use HasFactory<\Database\Factories\StudentHasClassroomFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'student_id',
        'classroom_id'
    ];

    public function student(): HasOne
    {
        return $this->hasOne(Student::class, 'id', 'student_id');
    }

    public function classroom(): HasOne
    {
        return $this->hasOne(Classroom::class, 'id', 'classroom_id');
    }
}
