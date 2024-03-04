<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Models\Tag;

class EditController {

    public function edit(Tag $tag) {
        return view('admin.tag.edit', compact('tag'));
    }
}
