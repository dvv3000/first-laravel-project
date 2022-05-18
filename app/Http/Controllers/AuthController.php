<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Throwable;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function processLogin(Request $request)
    {
        try {
            $user = User::query()
            ->where('email', $request->get('email'))
            ->where('password', $request->get('password'))
            ->firstOrFail();

            session()->put('id', $user->id);
            session()->put('name', $user->name);
            session()->put('role', $user->role);
            session()->put('avatar', $user->avatar);

            return redirect()->route('course.index');
        }
        catch(Throwable $e) {
            return redirect()->route('login');
        }
    }

    public function logout() 
    {
        session()->forget('id');
        session()->forget('avatar');
        session()->forget('name');
        session()->forget('role');

        return redirect()->route('login');
    }
}
