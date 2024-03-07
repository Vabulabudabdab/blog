<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Requests\admin\user\UpdateRequest;
use App\Models\User;

class UpdateController {
    public function update(UpdateRequest $updateRequest, User $user) {

        $data = $updateRequest->validated();
        $user->update($data);

//        $exist = DB::table('category')->select('title')->where('id', $category)->exists();

        return redirect()->route('admin.user.show', compact('user'));
    }
}
