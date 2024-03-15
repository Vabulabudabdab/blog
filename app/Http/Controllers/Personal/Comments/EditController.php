<?php

namespace App\Http\Controllers\Personal\Comments;

use App\Models\Comment;

class EditController {

   public function editComment(Comment $comment) {
       return view('personal.comments.edit', compact('comment'));
   }

}
