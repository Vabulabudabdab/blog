<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\User;

class EditController {

    public function edit(User $user) {
        return view('admin.user.edit', compact('user'));
    }
}
