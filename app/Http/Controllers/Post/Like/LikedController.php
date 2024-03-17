<?php

namespace App\Http\Controllers\Post\Like;

use App\Models\Post;

class LikedController {

   public function liked(Post $post) {

       auth()->user()->likedPosts()->toggle($post->id);

       return redirect()->back();
   }

}
