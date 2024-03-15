<?php

namespace App\Models;

use App\Notifications\SendVerifyWithQueueNotification;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail {

    use SoftDeletes, Notifiable;

    protected $table = 'users';
    protected $fillable = ['name', 'email', 'password', 'role_id', 'remember_token'];


    public function sendEmailVerificationNotification() {
        $this->notify(new SendVerifyWithQueueNotification());
    }

    public function likedPosts() {
        return $this->belongsToMany(Post::class, 'post_user_likes', 'user_id', 'post_id');
    }
}



