<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function registerForm()
    {
        return view('pages.register');
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ]);

        $user = User::add($request->all());
        $user->generatePassword($request->get('password'));

        return redirect('/login');
    }

    public function loginForm()
    {
        return view('pages.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $attempt = Auth::attempt([
            'email' => $request->get('email'),
            'password' => $request->get('password'),
        ]);
        
        if($attempt){
            return redirect()->route('home');
        }

        return redirect()->back()->with('status', 'Неправильный логин или пароль')->withInput();   
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
