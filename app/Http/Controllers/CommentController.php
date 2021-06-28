<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Thread;
use Illuminate\Http\Request;
use App\Notifications\RepliedToThread;

class CommentController extends Controller
{

    public function addThreadComment(Request $request, Thread $thread)
    {
        // dd($thread, $request);
        $this->validate($request, [
            'body' => 'required'
        ]);

        $comment = new Comment();
        $comment->body = $request->body;
        $comment->user_id = auth()->user()->id;

        $thread->comments()->save($comment);

        $thread->user->notify(new RepliedToThread($thread));

        return back()->withMessage('Comment created!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        if(intval($comment->user_id) !== auth()->user()->id){
            abort('404');
        }

        $this->validate($request, [
            'body' => 'required'
        ]);

        $comment->update($request->all());
        return back()->withMessage('updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        if(intval($comment->user_id) !== auth()->user()->id){
            abort('404');
        }

        $comment->delete();
        return back()->withMessage('Deleted');
    }
}
