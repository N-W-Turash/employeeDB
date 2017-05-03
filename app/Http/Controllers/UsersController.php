<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    public function index()
    {
        $users = User::all();

        return $users;
    }

    public function show($id)
    {

        $user = User::find($id);

        return $user;
    }

    public function store()
    {

        //dd('test');

        $this->validate(request(), [

            'first_name' => 'required',

            'last_name' => 'required',

            'email' => 'required',

            'password' => 'required',

            'designation' => 'required',

            'salary' => 'required',

            'phone_no' => 'required',

            'joining_date' => 'required',

            'role' => 'required'

        ]);

        $user = User::create([

            'first_name' => request('first_name'),

            'last_name' => request('last_name'),

            'email' => request('email'),

            'password' => bcrypt(request('password')),

            'blood_group' => request('blood_group'),

            'designation' => request('designation'),

            'salary' => request('salary'),

            'phone_no' => request('phone_no'),

            'address' => request('address'),

            'joining_date' => request('joining_date'),

            'role' => request('role')
        ]);

        auth()->login($user);

        //return 'User created successfully';

        return response()->json([

            'message' => 'User created successfully',

            'user' => $user
        ]);
    }

    public function update($id, Request $request)
    {

        $user = User::find($id);

        $user->first_name = request('first_name');

        $user->last_name = request('last_name');

        $user->email = request('email');

        $user->password = request('password');

        $user->blood_group = request('blood_group');

        $user->designation = request('designation');

        $user->salary = request('salary');

        $user->phone_no = request('phone_no');

        $user->address = request('address');

        $user->joining_date = request('joining_date');

        $user->role = request('role');

        $user->save();

        //dd('test');

        return response()->json([

            'message' => 'User updated successfully',

            'user' => $user
        ]);
    }

    public function destroy($id)
    {

        $user = User::findOrFail($id);

        $user->delete();

        return response()->json([

            'message' => 'User deleted successfully',
        ]);
    }
}
