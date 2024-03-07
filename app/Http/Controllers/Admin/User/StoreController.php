<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Requests\admin\user\StoreRequest;
use App\Models\Category;

class StoreController {
    public function store(StoreRequest $storeRequest) {
           $data = $storeRequest->validated();

           Category::firstOrCreate($data);
           return redirect()->route('admin.user.index');
    }
}
