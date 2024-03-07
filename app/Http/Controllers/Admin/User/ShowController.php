<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\User;

class ShowController {


    public function show(User $user) {
        return view('admin.user.show', compact('user'));
    }

}
