<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Comment;

class CommentController extends Controller
{
    //

    public function store($id)
    {
    	$this->validate(request(), [ 'comment' => 'required|min:2' ]);

        $comment = new Comment;
        $comment->post_id = $id;
        $comment->body = request('comment');
        $comment->save();

        return back();
    }

}
