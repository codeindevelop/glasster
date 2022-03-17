<?php

namespace App\Http\Controllers\API\blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog\PostComment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PostCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = PostComment::all();
        $commentCount = $comments->count();
        
        return response()->json([
            'comments' => $comments,
            'allCommentsCount' => $commentCount
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'post_id' => ['required'],
            'comment_content' => ['required']
        ]);

        $comment = new PostComment([
            'post_id' => $request->post_id,
            'user_id' => $user->id,
            'comment_parent' => $request->comment_parent,
            'comment_author_email' => $request->comment_author_email,
            'comment_author_url' => $request->comment_author_url,
            'comment_author_IP' => $request->comment_author_IP,
            'comment_content' => $request->comment_content,
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->first(), 'status' => false], 500);
        } else {
            if ($user) {
                $comment->save();
                return response()->json(['message' => 'Comment has ben store'], 201);
            } else {
                return response()->json(['message' => 'you must be register to submite comment'], 201);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comment = PostComment::findOrFail($id);

        return response()->json([
            'comment' => $comment
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = PostComment::findOrFail($id);
        $user = Auth::user();

        if ($user->can('edit post')) {
            $comment->delete();

            return response()->json(['message' => 'Comment has ben deleted'], 200);
        } else {
            return response()->json(['message' => 'you dont have permission to delete Comment'], 500);
        }
    }
}
