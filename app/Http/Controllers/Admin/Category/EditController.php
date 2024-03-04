<?php

namespace App\Http\Controllers\Admin\Category;

use App\Models\Category;

class EditController {

    public function edit(Category $category) {
        return view('admin.category.edit', compact('category'));
    }
}
