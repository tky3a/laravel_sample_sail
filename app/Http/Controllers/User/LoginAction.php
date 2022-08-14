<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Responder\TokenResponder;
use Illuminate\Auth\AuthManager;
use Illuminate\Http\JsonResponse;

final class LoginAction extends Controller
{
    private $authManager;

    public function __construct(AuthManager $authManager)
    {
        $this->authManager = $authManager;
    }


    public function __invoke(Request $request, TokenResponder $tokenResponder): JsonResponse
    {
        $guard = $this->authManager->guard('jwt');
        // 認証が成功したらtokenを受け取る
        $token = $guard->attempt([
            'email' => $request->get('email'),
            'password' => $request->get('password')
        ]);

        return $tokenResponder(
            $token,
            $guard->factory()->getTTL() * 60,
        );
    }
}
