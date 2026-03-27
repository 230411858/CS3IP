<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\StudentsHaveFriends;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function dashboard()
    {
        $student = User::find(Auth::id());
        return view("student.dashboard", ['achievements' => $student->achievements()->orderByDesc('created_at')->get(), 'guardians' => $student->guardians()->get(), 'friends' => $student->friends()]);
    }
    public function achievements($type)
    {
        $student = User::find(Auth::id());
        if (in_array($type, ['badge', 'medal', 'trophy']))
        {
            return view('student.achievements', ['achievements' => $student->achievements()->where('type', '=', $type)->orderByDesc('created_at')->get(), 'type' => $type]);
        }
        return back()->withErrors('Achievements must be of type badge, medal or trophy');
    }

    public function friendsAchievements($id, $type)
    {
        $student = User::find(Auth::id());
        try 
        {
            $friend = User::findOrFail($id);
        }
        catch (ModelNotFoundException)
        {
            return back()->withErrors('This user could not be found');
        }
        if (in_array($type, ['badge', 'medal', 'trophy']))
        {
            if ($friend->type === 'student')
            {
                if ($student->friends()->where('pending', '=', false)->firstWhere('id', '=', $friend->id) !== null)
                {
                    return view('student.friend', ['achievements' => $friend->achievements()->where('type', '=', $type)->orderByDesc('created_at')->get(), 'type' => $type, 'friend' => $friend, 'myAchievements' => $student->achievements()->where('type', '=', $type)]);
                }
                return back()->withErrors('You must be friends with this student before viewing their achievements');
            }
            return back()->withErrors('Friend must be a student, cannot be a(n) '.$friend->type);
        }
        return back()->withErrors('Achievements must be of type badge, medal or trophy');
    }

    public function sendFriendRequest(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|exists:users,email'
        ]);

        $student = User::find(Auth::id());

        $friend = User::firstWhere('email', '=', $validated['email']);

        if ($student->id === $friend->id)
        {
            return back()->withErrors('You cannot add yourself as a friend');
        }

        if ($friend->type !== 'student')
        {
            return back()->withErrors('You can only add other students as friends, not '.$friend->type.'s');
        }

        if (($record = $student->friends()->firstWhere('id', '=', $friend->id)) !== null)
        {
            if ($record->pending)
            {
                return back()->withErrors('You have either already sent this student a friend request or received one from them');
            }
            return back()->withErrors('This student is already your friend');
        }

        StudentsHaveFriends::factory()->create(
        [
            'student_id' => Auth::id(),
            'friend_id' => $friend->id,
            'pending' => true,
        ]);
        return back()->with('success', 'Friend request successfully sent');
    }

    public function acceptFriendRequest(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|exists:users,id'
        ]);

        $recordToModify = StudentsHaveFriends::where(function($query) use ($validated)
        {
            $query->where('student_id', '=', Auth::id())
            ->where('friend_id', '=', $validated['id']);
        })
        ->orWhere(function($query) use ($validated)
        {
            $query->where('student_id', '=', $validated['id'])
            ->where('friend_id', '=', Auth::id());
        })->first();

        if ($recordToModify === null)
        {
            return back()->withErrors('You cannot accept a friend request that you have not received');
        }

        if (!$recordToModify->pending)
        {
            return back()->withErrors('You have already accepted this student\'s friend request');
        }
        
        $recordToModify->pending = false;
        $recordToModify->save();
        return back()->with('success', 'Friend request accepted');
    }

    public function cancelOrRejectFriendRequestOrRemoveFriend(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|exists:users,id'
        ]);

        $recordToDelete = StudentsHaveFriends::where(function($query) use ($validated)
        {
            $query->where('student_id', '=', Auth::id())
            ->where('friend_id', '=', $validated['id']);
        })
        ->orWhere(function($query) use ($validated)
        {
            $query->where('student_id', '=', $validated['id'])
            ->where('friend_id', '=', Auth::id());
        })->first();

        if ($recordToDelete !== null)
        {
            $recordToDelete->delete();

            if ($recordToDelete->pending)
            {
                if ($recordToDelete->student_id  === Auth::id())
                {
                    return back()->with('success', 'You have cancelled this friend request');
                }
                return back()->with('success', 'You have rejected this friend request');
            }
            return back()->with('success', 'You have removed this student from your friends list');
        }
        return back()->withErrors('You cannot remove a user from your friends list that you are not friends with');
    }
}
