<?php

namespace App\Http\Controllers;

use App\Models\User;

use App\Models\Teacher;

use App\Models\Guardian;

use App\Models\Student;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

use app\UserType;

class AdministratorController extends Controller
{
    public function dashboard()
    {
        return view("admin.dashboard", ['users' => User::all()]);
    }

    public function showEdit(int $id)
    {
        $user = User::findOrFail($id);
        return view('admin.edit', ['user' => $user]);
    }

    public function edit(Request $request)
    {
        $user = User::find($request->id);

        $validated = $request->validate([
            'id' => 'required|exists:users,id',

            'name' => 'nullable|string|max:255|regex:/[a-zA-Z](\s?[a-zA-Z])*/',

            'email' => 'nullable|email|unique:users|max:255',

            'password' => 'nullable|min:8',

            'type' => 'nullable|in:teacher,guardian,student',

        ]);

        if (!empty($raw_name = $validated['name']))
        {

            $raw_name = trim($raw_name);

            $individual_names = explode(" ", $raw_name);

            $formatted_name = "";

            foreach ($individual_names as $name)
            {
                $formatted_name = $formatted_name . ucfirst(strtolower($name)) . " ";
            }

            trim($formatted_name);

            $user->name = $formatted_name;
        }

        if (!empty($email = $validated['email']))
        {
            $user->email = $email;
        }

        if (!empty($password = $validated['password']))
        {
            $user->password = Hash::make($password);
        }

        if (!empty($type = $validated['type']))
        {
            $type = UserType::from($type);
            // Remove user from table of old type
            switch($user->type())
            {
                case UserType::Teacher:
                    Teacher::destroy(Teacher::firstWhere('user_id', '=', $user->id)->id);
                    break;
                case UserType::Guardian:
                    Guardian::destroy(Guardian::firstWhere('user_id', '=', $user->id)->id);
                    break;
                case UserType::Student:
                    Student::destroy(Student::firstWhere('user_id', '=', $user->id)->id);
                    break;
            }

            // Add user to table of new type
            switch($type)
            {
                case UserType::Teacher:
                    Teacher::create([
                        'user_id' => $user->id
                    ]);
                    break;
                case UserType::Guardian:
                    Guardian::create([
                        'user_id' => $user->id
                    ]);
                    break;
                case UserType::Student:
                    Student::create([
                        'user_id' => $user->id
                    ]);
                    break;
            }
        }

        $user->save();

        return back()->with('success', 'Successfully modified user');
    }
}
