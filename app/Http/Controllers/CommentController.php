<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Systemsetting;
use App\Comment;
use App\category;
use App\Reply;

class CommentController extends Controller
{
    // List the comments
    public function index()
{
    $data['system'] = Systemsetting::find(1);
    $_SESSION['setting'] = $data['system'];

    $comments = Comment::all();
    $categories = Category::all();
    $reply = Reply::all();

    return view('frontend.index', compact('comments', 'reply', 'categories'));
}


  

// Add to the comments
public function add_comment(Request $request)
{
    $request->validate([
        'comment' => 'required|string|max:255',
    ]);

    $comment = new Comment;
    $comment->name = Auth::user()->name;
    $comment->user_id = Auth::id();
    $comment->comment = $request->comment;

    $comment->save();
    

    return redirect()->route('comments.index');
}

    
public function add_reply(Request $request)
{
    if (Auth::id()) {
        $reply = new Reply;
        $reply->name = Auth::user()->name;
        $reply->user_id = Auth::user()->id;
        $reply->comment_id = $request->commentId;
        $reply->reply = $request->reply;
        $reply->save();

        return redirect()->back();
    } else {
        return redirect('login');
    }
}



    

}
