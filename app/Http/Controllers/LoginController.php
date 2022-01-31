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
        $remember_checkbox = $request->input('remember_checkbox');
        $is_remember = false;
        if (isset($remember_checkbox) && 'on' === $remember_checkbox) {
            $is_remember = true;
        }

        $data = $request->validate([
            'email' => ['required', 'email:filter'],
            'password' => ['required', 'string'],
            'remember_token' => ['string'],
        ]);

        if (Auth::attempt($data, $is_remember)) {
            if ( ! $is_remember) {
                $request->session()->regenerate();
            }

            return redirect('mypage');
        }

        return back()->withErrors([
            'email' => 'メールアドレスまたはパスワードが正しくありません。',
        ])->withInput();
    }

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('login')->with('message', 'ログアウトしました');
    }
}
