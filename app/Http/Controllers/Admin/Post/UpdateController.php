<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Requests\admin\post\UpdateRequest;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UpdateController extends BaseController {
    public function update(UpdateRequest $updateRequest, Post $post) {

        $data = $updateRequest->validated();
        $this->service->update($data, $post);
        return redirect()->route('admin.post.show', compact('post'));
    }
}
