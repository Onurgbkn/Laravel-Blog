<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Comment;

class CommentController extends Controller
{
    public function index()
    {
        $data['loggedUserInfo']=Admin::where('id', '=', session('loggedUser'))->first();
        $data['comments']=Comment::get();
        return view('admin.comments.comments', $data);
    }

    public function toggle(Request $request){
        $comment = Comment::find($request->id);
        if ($request->state == "true") {
            $comment->state = 'Aktif';
        }else {
            $comment->state = 'Pasif';
        }
        $comment->save();
    }
}
