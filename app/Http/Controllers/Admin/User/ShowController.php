<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\Role;
use App\Models\Tag;
use App\Models\User;

class ShowController {


    public function show(User $user, Role $roles) {

        return view('admin.user.show', compact('user', 'roles'));
    }

}
