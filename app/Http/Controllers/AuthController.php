<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function postLogin(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        // dd(Auth::attempt($credentials));

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // return redirect(route('admin.index'));

            return response()->json([
                'success' => false,
                'url' => route('admin.index'),
            ]);
        }

        return response()->json(
            [
                'success' => false,
                'message' => 'invalid credentials',
            ],
            422,
        );
    }

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();

        return redirect()->route('auth.login');
    }
}
