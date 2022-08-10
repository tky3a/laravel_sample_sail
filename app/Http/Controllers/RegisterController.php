<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Http\Requests\UserRegistPost;

class RegisterController extends Controller
{
    public function create()
    {
        return view('regist.register');
    }

    public function store(UserRegistPost $request)
    {
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|string|email|max:255|unique:users',
        //     'password' => 'required|string|confirmed|min:8'
        // ]);

        $name = $request->get('name');

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // // Registeredイベント
        // event(new Registered($user));

        return view('regist.complete', compact('user'));
    }
}
