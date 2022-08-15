<?php

namespace App\Http\Controllers\Register;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Auth\AuthManager;
use Laravel\Socialite\Contracts\Factory;

class CallbackAction extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Factory $factory, AuthManager $authManager)
    {
        $user = $factory->driver('github')->user();

        $authManager->guard()->login(
            User::firstOrCreate([
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'password' => ''
            ]),
            true
        );

        return redirect('/home');
    }
}
