<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\Category;
use App\Models\User;

class IndexController {

    public function users() {
        $users = User::all();

        return view('admin.user.index', compact('users'));
    }
}
