<?php

namespace App\Http\Controllers\Personal\Liked;

use App\Models\Post;

class DeleteController {

   public function delete(Post $post) {
       $posts = auth()->user()->likedPosts()->detach($post->id);
       return redirect()->route('personal.liked.index');
   }

}
