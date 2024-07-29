<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use App\Models\User;
use Mockery\Generator\StringManipulation\Pass\Pass;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        //validate form
        $validateAttributes = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => ['required', 'email'],
            'password' => ['required', Password::min(6), 'confirmed'],
        ]);

        //if form validated, create the user
        $user = User::create($validateAttributes);

        //log user in
        Auth::login($user);

        //redirect user
        return redirect('/jobs');
    }
}
