<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Post;

class ShowController extends BaseController {


    public function show(Post $post) {
        return view('admin.post.show', compact('post'));
    }

}
