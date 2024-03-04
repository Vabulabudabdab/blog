<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Models\Tag;

class DeleteController {

    public function delete(Tag $tag) {
        $tag->delete();
        return redirect()->route('admin.tag.index');
    }

}
