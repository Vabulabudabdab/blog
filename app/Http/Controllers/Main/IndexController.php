<?php

namespace App\Http\Controllers\Main;

use App\Models\Post;

class IndexController {
    public function home_index() {
        return redirect()->route('post.index');
    }
}
