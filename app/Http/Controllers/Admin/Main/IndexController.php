<?php

namespace App\Http\Controllers\Admin\Main;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;

class IndexController {

   public function admin_panel() {
       $data = [];
       $data['usersCount'] = User::all()->count();
       $data['postsCount'] = Post::all()->count();
       $data['categoryCount'] = Category::all()->count();
       $data['tagsCount'] = Tag::all()->count();

       return view('admin.Main.index', compact('data'));
   }

}
