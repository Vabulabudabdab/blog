<?php

namespace App\Http\Controllers\Personal\Comments;

use App\Models\Comment;

class DeleteController {

   public function deleteComment(Comment $comment) {
       $comment->delete();
       return redirect()->route('personal.comments.index');
   }

}
