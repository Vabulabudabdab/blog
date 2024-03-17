<?php

namespace App\Http\Controllers\Post\Comments;

use App\Http\Requests\Post\Comment\StoreRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class StoreController {

   public function __invoke(Post $post, StoreRequest $storeRequest) {
       $data = $storeRequest->validated();
       $data['user_id'] = Auth::user()->id;
       $data['post_id'] = $post->id;

       Comment::create($data);
       return redirect()->route('post.show', $post->id);
   }

}
