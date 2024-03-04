<?php

namespace App\Http\Controllers\Admin\Category;

use App\Models\Category;

class CategoryController {

    public function categories() {
        $categories = Category::all();

        return view('admin.category.index', compact('categories'));
    }
}
