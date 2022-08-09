<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(): View
    {
        return view('auth.login');
    }

    // ログイン処理
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        //  Auth::attemptで認証が成功すればHOME画面に遷移
        if (Auth::attempt($credentials)) {
            // セッションIDの再発行
            $request->session()->regenerate();
            return redirect()->intended(RouteServiceProvider::HOME);
        }

        return back()->withErrors([
            'message' => 'メールアドレスまたはパスワードが正しくありません。'
        ])->withInput();
    }

    // ログアウト処理
    public function logout(Request $request)
    {
        // ログアウト（認証情報をクリア）
        Auth::logout();
        // sessionデータを削除
        $request->session()->invalidate();
        // セッションIDの再発行
        $request->session()->regenerate();
        // ホームに遷移
        return redirect(RouteServiceProvider::HOME);
    }
}
