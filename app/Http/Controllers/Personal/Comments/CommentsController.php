<?php

namespace App\Http\Controllers\Personal\Comments;

class CommentsController {

   public function comments() {
       $comments = auth()->user()->comments;
       return view('personal.comments.index', compact('comments'));
   }

}
