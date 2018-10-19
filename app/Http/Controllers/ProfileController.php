<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('pages.profile', [
            'user' => $user,
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore(Auth::user()->id),
            ],
            //'password' => 'required',
            'avatar' => 'nullable|image'
        ]);

        $user = Auth::user();
        $user->edit($request->all());
        $user->generatePassword($request->get('password'));
        $user->uploadAvatar($request->file('image'));

        return redirect()->route('profile')->with('status', 'Профиль успешно обновлен');
    }
}
