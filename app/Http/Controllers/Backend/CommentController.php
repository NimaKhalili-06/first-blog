<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CommentController extends Controller
{
    public function Index()
    {
        $comments = Comment::all();
        return view('backend.comment.comment_all',compact('comments'));
    }

    public function Delete($id)
    {
        Comment::find($id)->delete();
        return Redirect::back()->with('success','Comment deleted successfully');
    }
}
