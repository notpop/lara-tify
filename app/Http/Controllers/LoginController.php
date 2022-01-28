<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {
        return view('page.login.index');
    }

    public function login(Request $request) {
        $data = $request->validate([
            'email' => ['required', 'email:filter'],
            'password' => ['required', 'string'],
            // 'remember_token' => ['string'],
        ]);

        if (Auth::attempt($data)) {
            $request->session()->regenerate();

            // if (isset($data['remember_token']) && 'on' === $data['remember_token']) {
            //     Auth::attempt($data, true);
            // }
            // else {
            //     Auth::attempt($data, false);
            // }

            return redirect('mypage');
        }

        return back()->withErrors([
            'email' => '認証情報が間違っています。',
        ])->withInput();
    }

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('login')->with('message', 'ログアウトしました');
    }
}
