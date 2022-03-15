<?php

namespace App\Http\Controllers\API\custom;

use App\Http\Controllers\Controller;
use App\Models\Blog\Post;
use App\Models\Blog\PostCategory;
use App\Models\User;
use Illuminate\Http\Request;

class CustomController extends Controller
{

    public function dashboardData()
    {

        $categoryCount = PostCategory::all()->count();
        $PostCount = Post::all()->count();
        $usersCount = User::all()->count();

        return response()->json([
            'categoryCount' => $categoryCount,
            "postsCount" => $PostCount,
            "usersCount" => $usersCount
        ], 200);
    }
}
