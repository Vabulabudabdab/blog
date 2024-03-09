<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\Role;
use App\Models\User;

class EditController {

    public function edit(User $user, Role $roles) {
        $roles = Role::all();
        return view('admin.user.edit', compact('user', 'roles'));
    }
}
