<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Requests\admin\post\StoreRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class StoreController {
    public function store(StoreRequest $storeRequest) {
           $data = $storeRequest->validated();
           $data['preview_image'] = Storage::put('/images', $data['preview_image']);
           $data['main_image'] = Storage::put('/images',$data['main_image']);

           Post::firstOrCreate($data);
           return redirect()->route('admin.post.index');
    }
}
