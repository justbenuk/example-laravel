<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    /**
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $attributes = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        //attempt to log user in
        if (!Auth::attempt($attributes, true)) {
            throw ValidationException::withMessages([
                'email' => 'Credentials Do Not Match',
                'password' => 'Credentials Do Not Match'
            ]);
        }

        $request->session()->regenerate();

        return redirect('/jobs');
    }

    public function destroy(): RedirectResponse
    {
        Auth::logout();
        return redirect('/');
    }
}
