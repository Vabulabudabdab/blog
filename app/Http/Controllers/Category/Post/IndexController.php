<?php

namespace App\Http\Controllers\Category\Post;

use App\Models\Category;
use App\Models\Post;

class IndexController {
    public function __invoke() {
        $category = Category::all();
//        $postLikes = Post::withCount('likedUsers')->orderBy('liked_users_count', 'DESC')->get()->take(4);
        return view('category.index', compact('category'));
    }
}
