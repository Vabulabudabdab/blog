<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Requests\admin\user\StoreRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class StoreController {
    public function store(StoreRequest $storeRequest) {
           $data = $storeRequest->validated();

           $data['password'] = Hash::make($data['password']);

           User::firstOrCreate(['email' => $data['email'], 'role_id' => $data['roles']], $data);
           return redirect()->route('admin.user.index');
    }
}
