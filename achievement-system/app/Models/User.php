<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'type'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function classrooms(): BelongsToMany
    {
        return $this->belongsToMany(Classroom::class, 'users_have_classrooms', 'user_id', 'classroom_id')->withTimestamps();
    }

    public function achievements(): BelongsToMany
    {
        return $this->belongsToMany(Achievement::class, 'students_have_achievements', 'student_id', 'achievement_id')->withTimestamps();
    }

    public function guardians(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'students_have_guardians', 'student_id', 'guardian_id')->withTimestamps();
    }

    public function children(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'students_have_guardians', 'guardian_id', 'student_id')->withTimestamps();
    }

    public function friends()
    {
        $friends = [];
        $rows = StudentsHaveFriends::where('student_id', '=', $this->id)->orWhere('friend_id', '=', $this->id)->get();
        foreach ($rows as $row)
        {
            if ($row->student_id === $this->id) 
            { 
                $friend = User::find($row->friend_id);
                $friend->isSender = false;
            }
            else
            {
                $friend = User::find($row->student_id);
                $friend->isSender = true;
            }
            $friend->pending = $row->pending;
            $friend->requestCreatedAt = $row->created_at;
            $friend->since = $friend->pending ? null : $row->updated_at;
            $friends[] = $friend;  
        }
        return collect($friends);
    }
}
