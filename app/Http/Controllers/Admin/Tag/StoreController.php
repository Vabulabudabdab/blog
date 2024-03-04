<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Requests\admin\tag\StoreRequest;
use App\Models\Tag;

class StoreController {
    public function store(StoreRequest $storeRequest) {
           $data = $storeRequest->validated();

           Tag::firstOrCreate($data);
           return redirect()->route('admin.tag.index');
    }
}
