<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable {
    use HasFactory, SoftDeletes;

    const ROLE_ADMIN = 1;
    const ROLE_READER = 2;

    public static function getRoles() {
        return Role::all();
    }

    protected $table = 'users';
    protected $fillable = ['name', 'email', 'password', 'role_id'];

}
