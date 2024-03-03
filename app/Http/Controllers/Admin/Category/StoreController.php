<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Requests\admin\category\StoreRequest;
use App\Models\Category;

class StoreController {
    public function store(StoreRequest $storeRequest) {
           $data = $storeRequest->validated();

           Category::firstOrCreate($data);
           return redirect()->route('admin.category.index');
    }
}
