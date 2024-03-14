<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Requests\admin\user\StoreRequest;
use App\Jobs\StoreUserJob;
use App\Mail\User\Password;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class StoreController {
    public function store(StoreRequest $storeRequest) {
           $data = $storeRequest->validated();

           StoreUserJob::dispatch($data);
           return redirect()->route('admin.user.index');
    }
}
