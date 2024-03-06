<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Post;

class EditController {

    public function edit(Post $post) {
        return view('admin.post.edit', compact('post'));
    }
}
