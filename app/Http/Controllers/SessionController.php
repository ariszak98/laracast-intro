<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create() {
        return view('auth.login');
    }

    public function store() {

        // validate
        $attributes = request()->validate([
            'email'     => ['required', 'email', 'max:254'],
            'password'  => ['required', Password::min(6)]
        ]);

        // attempt to sign in user
        if(! Auth::attempt($attributes) ){
            throw ValidationException::withMessages([
                'credentials'     =>  'Sorry wrong credentials.'
            ]);
        }
        
        // regenerate token
        request()->session()->regenerate();

        // redirect
        return redirect('/');
    }

    public function destroy(){
        Auth::logout();

        return redirect('/');
    }

}
