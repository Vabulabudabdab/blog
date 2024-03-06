<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Requests\admin\post\UpdateRequest;
use App\Models\Post;

class UpdateController {
    public function update(UpdateRequest $updateRequest, Post $post) {

        $data = $updateRequest->validated();
        $post->update($data);

        return redirect()->route('admin.post.show', compact('post'));
    }
}
