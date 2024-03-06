<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Category;

class CreateController {


    public function create() {
        $categories = Category::all();
        return view('admin.post.create', compact('categories'));
    }

}
