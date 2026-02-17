<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserHasClassroom extends Pivot
{
    /** @use HasFactory<\Database\Factories\UserHasClassroomFactory> */
    use HasFactory;

    public $table = "users_have_classrooms";

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'user_id',
        'classroom_id'
    ];
}
