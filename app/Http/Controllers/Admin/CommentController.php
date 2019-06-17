<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Comment;
class CommentController extends Controller
{
    //
    public function index(){
     $all=Comment::latest()->get();
     return view('Admin.comments.comments',compact('all'));
    }
    public function approved(Request $request)
    {
      $comment=Comment::find($request->id);
      if($comment->approved == 1)
      {
        Comment::where('id', $request->id)->update([
            'approved'=>'0',
        ]);
      }else{
        Comment::where('id', $request->id)->update([
            'approved'=>'1',
        ]);
      }
      return back();
    }
}
