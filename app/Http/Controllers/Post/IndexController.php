<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;

class IndexController {
    public function home_index() {

        $posts = Post::paginate(6);
        $randomPosts = Post::get()->random(4);
        $postLikes = Post::withCount('likedUsers')->orderBy('liked_users_count', 'DESC')->get()->take(4);
        return view('post.index', compact('posts', 'randomPosts', 'postLikes'));
    }
}
