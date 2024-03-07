<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Requests\admin\post\StoreRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Mockery\Exception;

class StoreController extends BaseController {
    public function store(StoreRequest $storeRequest) {

        $data = $storeRequest->validated();
        $this->service->store($data);

        return redirect()->route('admin.post.index');
    }
}
