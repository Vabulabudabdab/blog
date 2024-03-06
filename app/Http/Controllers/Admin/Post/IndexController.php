<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Post;

class IndexController {

    public function categories() {
        $posts = Post::all();

        return view('admin.post.index', compact('posts'));
    }
}
