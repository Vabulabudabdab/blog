<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\Category;
use App\Models\User;

class DeleteController {

    public function delete(User $user) {
        $user->delete();
        return redirect()->route('admin.user.index');
    }

}
