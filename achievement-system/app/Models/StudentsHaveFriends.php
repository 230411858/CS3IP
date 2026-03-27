<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StudentsHaveFriends extends Pivot
{
    /** @use HasFactory<\Database\Factories\StudentsHaveFriends> */
    use HasFactory;

    public $table = 'students_have_friends';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'student_id',
        'friend_id'
    ];
}
