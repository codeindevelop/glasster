<?php

namespace App\Http\Controllers\API\blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;




class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        $PostCount = $posts->count();
        return response()->json([
            "posts" => $posts,
            "totalCount" => $PostCount
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

            // 'publish_id' => ['required'],
            'post_name' => ['required'],
            // 'active' => ['required', 'boolean'],

        ]);

        $slugset = [];

        if ($request->slug == "") {
            $slugset = Str::slug($request->post_name, '-');
        } else {
            $slugset = Str::slug($request->slug, '-');
        }

        // try to giv category id
        $categoryId = [];
        if ($request->category_id == "") {
            $categoryId = "1";
        } else {
            $categoryId = $request->category_id;
        }

        $post = new Post([
            'author_id' => $user->id,
            'category_id' => $categoryId,
            'publish_id' => $request->publish_id,
            'post_name' => $request->post_name,
            'slug' => $slugset,
            'post_content' => $request->post_content,
            'post_featured_image' => $request->post_featured_image,
            'comment_status' => $request->comment_status,
            'active' => $request->active,
            'publish_date' => $request->publish_date,
            'post_password' => $request->post_password,

            // Meta Tags Configuration

            'search_engine_flow' => $request->search_engine_flow,
            'search_engine_index' => $request->search_engine_index,
            'canonical_link' => $request->canonical_link,
            'meta_title' => $request->meta_title,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description,
            'meta_tags' => $request->meta_tags,

            //  Og configuration
            'og_locale' => $request->og_locale,
            'og_title' => $request->og_title,
            'og_description' => $request->og_description,
            'og_url' => $request->og_url,
            'og_site_name' => $request->og_site_name,
            'og_image' => $request->og_image,

            // Twitter Configuration
            'twitter_card' => $request->twitter_card,
            'twitter_creatort' => $request->twitter_creatort,
            'twitter_label1' => $request->twitter_label1,
            'twitter_data1' => $request->twitter_data1,
            'twitter_label2' => $request->twitter_label2,
            'twitter_data2' => $request->twitter_data2,
            'twitter_site' => $request->twitter_site,
            'twitter_title' => $request->twitter_title,
            'twitter_description' => $request->twitter_description,
            'twitter_url' => $request->twitter_url,
            'twitter_image' => $request->twitter_image,

            // FaceBook Configuration
            'article_publisher' => $request->article_publisher,
            'article_publish_time' => $request->article_publish_time,
            'article_modified_time' => $request->article_modified_time,


        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->first(), 'status' => false], 500);
        } else {

            if ($user->can('create post')) {

                $post->save();

                // Add post to Portal-post Table
                // $post->portals()->attach($request->portal_id);

                return response()->json([
                    'message' => 'Post Has ben created!'
                ], 201);
            } else {
                return response()->json([
                    'message' => 'You don have permission to create a post!'
                ], 500);
            }
        }
    }

    // Get post by URL
    public function getSingle($slug)
    {

        Post::where('slug', $slug)->increment('reads');
        $post = Post::where('slug', $slug)->get();


        return response()->json([
            'post' => $post
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        Post::where('id', $request->id)->increment('reads');
        $post = Post::where('id', $request->id)->get();

        // $post->update([
        //     'reads' => 
        // ]);

        return response()->json([
            'post' => $post
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
        $post = Post::findOrFail($id);


        if ($user->can('edit post')) {
            $post->update([
                'author_id' => $user->id,
                'category_id' => $request->category_id,
                'publish_id' => $request->publish_id,
                'post_name' => $request->post_name,
                'slug' => $request->slug,
                'post_content' => $request->post_content,
                'post_featured_image' => $request->post_featured_image,
                'comment_status' => $request->comment_status,
                'active' => $request->active,
                'publish_date' => $request->publish_date,
                'post_password' => $request->post_password,

                // Meta Tags Configuration

                'search_engine_flow' => $request->search_engine_flow,
                'search_engine_index' => $request->search_engine_index,
                'canonical_link' => $request->canonical_link,
                'meta_title' => $request->meta_title,
                'meta_keywords' => $request->meta_keywords,
                'meta_description' => $request->meta_description,
                'meta_tags' => $request->meta_tags,

                //  Og configuration
                'og_locale' => $request->og_locale,
                'og_title' => $request->og_title,
                'og_description' => $request->og_description,
                'og_url' => $request->og_url,
                'og_site_name' => $request->og_site_name,
                'og_image' => $request->og_image,

                // Twitter Configuration
                'twitter_card' => $request->twitter_card,
                'twitter_creatort' => $request->twitter_creatort,
                'twitter_label1' => $request->twitter_label1,
                'twitter_data1' => $request->twitter_data1,
                'twitter_label2' => $request->twitter_label2,
                'twitter_data2' => $request->twitter_data2,
                'twitter_site' => $request->twitter_site,
                'twitter_title' => $request->twitter_title,
                'twitter_description' => $request->twitter_description,
                'twitter_url' => $request->twitter_url,
                'twitter_image' => $request->twitter_image,

                // FaceBook Configuration
                'article_publisher' => $request->article_publisher,
                'article_publish_time' => $request->article_publish_time,
                'article_modified_time' => $request->article_modified_time,
            ]);

            return response()->json(['message' => 'post has ben updated!'], 201);
        } else {
            return response()->json([
                'message' => 'You don have permission to Update a post!'
            ], 500);
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
        $post = Post::findOrFail($id);

        if ($user->can('edit post')) {
            $post->delete();

            return response()->json(['message' => 'post has ben Deleted!']);
        } else {
            return response()->json([
                'message' => 'You don have permission to Update a post!'
            ], 500);
        }
    }
}
