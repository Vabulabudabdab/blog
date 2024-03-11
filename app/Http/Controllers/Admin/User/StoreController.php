<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Requests\admin\user\StoreRequest;
use App\Mail\User\Password;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class StoreController {
    public function store(StoreRequest $storeRequest) {
           $data = $storeRequest->validated();
           $password = Str::random(10);
           $data['password'] = Hash::make($password);

           User::firstOrCreate(['email' => $data['email'], 'role_id' => $data['roles']], $data);

           Mail::to($data['email'])->send(new Password($password));

           return redirect()->route('admin.user.index');
    }
}
