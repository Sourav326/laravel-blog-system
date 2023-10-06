<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
     /**
     * Handle request to create a comment on a blog
     */
    public function create(Request $request){
        try{
                $validated = $request->validate([
                    'comment' => 'required',
                ]);
                $comment = new Comment;
                $comment->commment = $request->comment;
                $comment->blog_id = $request->blog_id;
                $comment->user_id = auth()->user()->id;
                if($comment->save()){
                    return redirect()->back()->with('sucess',"Comment Added successfully");
                } else {
                    return redirect()->back()->with('error',"Comment Not Added");
                }
        } catch (Exception $e){
            return redirect()->back()->with('error',$e->getMessage());
        }
    }
}
