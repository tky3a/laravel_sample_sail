<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Auth\AuthManager;

final class RetrieveAction extends Controller
{
    private $authManager;

    public function __construct(AuthManager $authManager)
    {
        $this->authManager = $authManager;
    }

    public function __invoke(Request $request)
    {
        // 認証済みの場合に認証ユーザーを返却
        return $this->authManager->guard('jwt')->user();
    }
}
