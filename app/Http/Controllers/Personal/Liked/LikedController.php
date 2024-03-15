<?php

namespace App\Http\Controllers\Personal\Liked;

class LikedController {

   public function liked() {
       $posts = auth()->user()->likedPosts;
       return view('personal.liked.index', compact('posts'));
   }

}
