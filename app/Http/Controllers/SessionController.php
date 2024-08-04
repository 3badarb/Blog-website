<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Validation\ValidationException;
class SessionController extends Controller
{
    //
    public function LoginPage()
    {
        return view('login');
    }

    public function DoLogin()
    {
        $user=\request()->validate([
            'email'=>'required  ',
            'password'=>'required'
        ]);

        if (auth()->attempt($user)){
            session()->regenerate();
            return redirect('/')->with('success','Welcome');

        }
        throw ValidationException::withMessages([
            'email'=>'Wrong Credentials'
        ]);
    }
    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success','Goodbye');
    }
}
