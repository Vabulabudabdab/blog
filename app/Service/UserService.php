<?php

namespace App\Service;

use Illuminate\Support\Facades\DB;

class UserService {
    public function store($data) {

        try {
            DB::beginTransaction();
            DB::table('users')->insert(['name' => $data['name'], 'email' => $data['email'], 'password' => $data['password'], 'role_id' => $data['role_id']]);
            DB::commit();
            } catch (\Exception $exception) {
            DB::rollBack();

            abort(500);
        }
    }
}
