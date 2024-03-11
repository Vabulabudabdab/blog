<?php

namespace App\Http\Controllers\User\Users;

use App\Http\Requests\user\register\RegisterRequest;
use App\Models\User;
use App\Mail\User\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class RegisterController {

    public function registerUser(RegisterRequest $registerRequest) {

        $data = $registerRequest->validated();

        $email = $registerRequest->post('email');

        $password = Hash::make($data['password']);

        Hash::make($data['password_confirmation']);

        $data['password'] = Hash::make($password);

        $user = User::firstOrCreate(['email' => $data['email'], 'role_id' => 2], $data);

        event(new Registered($user));

        Auth::login($user);

        return redirect('/register');
    }
}
