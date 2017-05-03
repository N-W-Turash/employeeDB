<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class SessionsController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest', ['except' => 'destroy']);
    }

    public function store()
    {
        // attempt to authenticate the user

        if(!auth()->attempt(request(['email', 'password']))){

            return back()->withErrors([

                'message' => 'Please try again, something went wrong.'
            ]);
        }

        return response()->json([

            'message' => 'User logged in.',

            'user' => auth()->user()
        ]);
    }

    public function destroy()
    {

        auth()->logout();

        return response()->json([

            'message' => 'User logged out.'
        ]);

    }

    public function getUser()
    {
//        $user = Auth::user();
//
//        //$user = auth()->user();
//
//        return $user;

        //dd(Auth::user());

        dd(auth::user());
    }
}
