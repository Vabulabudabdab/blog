<?php

namespace App\Http\Controllers\Personal\Comments;

use App\Http\Requests\personal\Comment\UpdateRequest;
use App\Models\Comment;

class UpdateController {

   public function updateComment(UpdateRequest $updateRequest ,Comment $comment) {
       $data = $updateRequest->validated();
       $comment->update($data);
       return redirect()->route('personal.comments.index');
   }

}
