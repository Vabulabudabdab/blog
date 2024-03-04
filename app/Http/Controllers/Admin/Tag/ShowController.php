<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Models\Tag;

class ShowController {


    public function show(Tag $tag) {
        return view('admin.tag.show', compact('tag'));
    }

}
