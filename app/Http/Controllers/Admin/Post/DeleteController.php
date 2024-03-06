<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Post;

class DeleteController {

    public function delete(Post $posts) {
        $posts->delete();
        return redirect()->route('admin.post.index');
    }

}
