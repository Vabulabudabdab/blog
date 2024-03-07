<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DeleteController extends BaseController {

    public function delete(Post $post) {
        $this->service->delete($post);

        return redirect()->route('admin.post.index');
    }

}
