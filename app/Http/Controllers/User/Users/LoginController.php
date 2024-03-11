<?php

namespace App\Http\Controllers\User\Users;

use App\Http\Requests\user\login\StoreRequest;
use Illuminate\Support\Facades\Auth;

class LoginController {


    public function login(StoreRequest $storeRequest) {
        $data = $storeRequest->validated();

        $email = $storeRequest->post('email');

        $password = $storeRequest->post('password');

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return redirect('/');
        }
        return view('auth.login');
    }

    public function logout() {
        Auth::logout();
        return redirect('/');
    }

}
