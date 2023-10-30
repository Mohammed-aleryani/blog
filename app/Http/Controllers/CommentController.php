<?php

    namespace App\Http\Controllers;


    use App\Models\Comment;
    use App\Models\Post;

    class CommentController extends Controller
    {
        public
        function store(
            Post $post
        ){
            request()->validate([
                'body' => ['required']
            ]);

            $post->comments()->create(
                [
                    'user_id' => auth()->id(),
                    'body'    => request('body')

                ]
            );

            return back();
        }

        public
        function update(
            Comment $comment
        ){
            $attributes = request()->validate([
                'body' => 'required'
            ]);

            $comment->update($attributes);
            return back()->with('success', 'Comment has been update it');
        }


        public
        function destroy(
            Comment $comment
        ){
            $comment->delete();
            return back()->with('success', 'Comment has been deleted');
        }

    }
