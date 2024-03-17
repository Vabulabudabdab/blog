<?php

namespace App\Http\Controllers\Category\Post;

use App\Models\Category;
use App\Models\Post;

class ShowController {
    public function __invoke(Category $category) {

        $posts = Post::all()->where('category_id', $category->id);

        return view('category.show', compact('category', 'posts'));
    }
}
