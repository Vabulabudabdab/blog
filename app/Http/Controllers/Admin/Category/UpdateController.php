<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Requests\admin\category\UpdateRequest;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class UpdateController {
    public function update(UpdateRequest $updateRequest, Category $category) {

        $data = $updateRequest->validated();
        $category->update($data);

//        $exist = DB::table('categories')->select('title')->where('id', $category)->exists();

        return redirect()->route('admin.category.show', compact('category'));
    }
}
