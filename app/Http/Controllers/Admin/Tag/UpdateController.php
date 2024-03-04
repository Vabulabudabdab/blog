<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Requests\admin\tag\UpdateRequest;
use App\Models\Tag;


class UpdateController {
    public function update(UpdateRequest $updateRequest, Tag $tag) {

        $data = $updateRequest->validated();
        $tag->update($data);

//        $exist = DB::table('category')->select('title')->where('id', $category)->exists();

        return redirect()->route('admin.tag.show', compact('tag'));
    }
}
