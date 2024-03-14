<?php

namespace App\Http\Controllers\User\Register;

use App\Http\Requests\user\login\StoreRequest;

class RegisterController {

   public function register(StoreRequest $storeRequest) {

       return redirect()->route('auth.login');
   }

}
