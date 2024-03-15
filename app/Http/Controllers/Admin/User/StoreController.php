<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Requests\admin\user\StoreRequest;
use App\Jobs\StoreUserJob;

class StoreController {
    public function store(StoreRequest $storeRequest) {
           $data = $storeRequest->validated();

           StoreUserJob::dispatch($data);
           return redirect()->route('admin.user.index');
    }
}
