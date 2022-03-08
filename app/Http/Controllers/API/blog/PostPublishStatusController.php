<?php

namespace App\Http\Controllers\API\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog\PostPublishStatus;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PostPublishStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statuses = PostPublishStatus::all();
        
        return response()->json([
            'modes' => $statuses
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

            'mode' => ['string','required'],
        ]);
        
        $mode = new PostPublishStatus([
            'mode' => $request->mode,
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->first(), 'status' => false], 500);
        } else {

            if ($user->can('edit post')) {

                $mode->save();

                return response()->json([
                    'message' => 'Mode Has ben created!'
                ], 201);
            } else {
                return response()->json([
                    'message' => 'You don have permission to create a Mode!'
                ], 500);
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
        //
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
        $user = Auth::user();
        $mode = PostPublishStatus::findOrFail($id);

        $validator = Validator::make($request->all(), [

            'mode' => ['string','required'],

        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->first(), 'status' => false], 500);
        } else {
            if ($user->can('edit post')) {
                $mode->update($request->all());

                return response()->json(['message' => 'Mode has ben updated!'], 201);
            } else {
                return response()->json([
                    'message' => 'You don have permission to Update a Mode!'
                ], 401);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Auth::user();
        $mode = PostPublishStatus::findOrFail($id);

        if ($user->can('edit articles')) {
            $mode->delete();

            return response()->json(['message' => 'Mode has ben Deleted!'],202);
        } else {
            return response()->json([
                'message' => 'You don have permission to Update a Mode!'
            ], 401);
        }
    }
}
