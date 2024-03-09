<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Requests\admin\post\StoreRequest;

class StoreController extends BaseController {
    public function store(StoreRequest $storeRequest) {

        $data = $storeRequest->validated();
        $this->service->store($data);

        return redirect()->route('admin.post.index');
    }
}
