<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Requests\admin\user\UpdateRequest;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class UpdateController {
    public function update(UpdateRequest $updateRequest, User $user) {

        $data = $updateRequest->validated();

        $user->update(['email' => $data['email'], 'role_id' => $data['roles']], $data);

        return redirect()->route('admin.user.show', compact('user'));
    }
}
