<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\Role;
use App\Models\User;

class CreateController {


    public function create(User $users, Role $roles) {
        $users = User::all();
        $roles = Role::all();
        return view('admin.user.create', compact('users','roles'));
    }

}
