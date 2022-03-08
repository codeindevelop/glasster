<?php

namespace App\Http\Controllers\API\blog;

use App\Http\Controllers\Controller;
use App\Models\Blog\PostCategory;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = PostCategory::all();
        $count = $category->count();

        return response()->json([
            'categories' => $category,
            'totalCount' => $count,
        ], 200);
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

        $validate = Validator::make($request->all(), [

            'category_name' => ['required', 'string', 'min:1', 'max:255'],
            'category_link_slug' => ['required', 'string','unique:post_categories', 'min:1', 'max:255'],
            'active' => ['required', 'boolean'],
        ]);

        if ($validate->fails()) {
            return response()->json(['message' => $validate->errors()->first(), 'status' => false], 500);
        } else {
            if ($user->can('create post category')) {


                $category = new PostCategory([
                    'parent_id' => $request->parent_id,
                    'category_name' => $request->category_name,
                    'category_link_slug' => $request->category_link_slug,
                    'active' => $request->active,
                ]);

                $category->save();

                return response()->json([
                    'message' => 'category has ben created successful!'
                ], 201);
            }
            return response()->json([
                'message' => 'you dont have permission to create post category'
            ], 401);
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
        $category = PostCategory::where('id', $id)->get();

        return response()->json([
            'category' => $category
        ], 200);
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

        if ($user->can('edit post category')) {

            // $category = PostCategory::where('id', $id)->get();

            // $category->update($request->all());
            PostCategory::where('id', $id)->update($request->all());

            return response()->json([
                'message' => 'category has ben updated'
            ], 201);
        } else {
            return response()->json([
                'message' => 'you dont have permission to update post category'
            ], 401);
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

        if ($user->can('delete post category')) {


            PostCategory::where('id', $id)->delete();

            return response()->json([
                'message' => 'Postcategory has ben delete'
            ], 202);
        } else {
            return response()->json([
                'message' => 'you dont have permission to delete post category'
            ], 401);
        }
    }
}
