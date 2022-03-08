<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\blog\CategoryController;
use App\Http\Controllers\API\blog\PostCommentController;
use App\Http\Controllers\API\blog\PostController;
use App\Http\Controllers\API\blog\PostPublishStatusController;

/*
|--------------------------------------------------------------------------
| Authentication API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Authentication API routes for your application.
*/


Route::prefix('v1')->group(function () {


    // Post Category APIS
    Route::get('post-category', [CategoryController::class, 'index']);
    Route::get('post-category/{id}', [CategoryController::class, 'show']);

    // Get Posts
    Route::get('post/{slug}', [PostController::class, 'getSingle']);
    Route::get('posts', [PostController::class, 'index']);
    Route::post('get-post-id', [PostController::class, 'show']);
    Route::get('postimages', [PostController::class, 'getAllPostImage']);

    // Post Comments
    Route::get('post-comments', [PostCommentController::class, 'index']);
    Route::get('post-comment/{id}', [PostCommentController::class, 'show']);
    
    Route::middleware("auth:api")->group(function () {
        
        // Post Category API
        Route::resource('post-category', CategoryController::class);

        // Posts API
        Route::post('post', [PostController::class, 'store']);
        Route::put('post/{id}', [PostController::class, 'update']);
        Route::delete('post-delete/{id}', [PostController::class, 'destroy']);

        // Post Status API
        Route::post('post-status', [PostPublishStatusController::class, 'store']);
        Route::get('post-status', [PostPublishStatusController::class, 'index']);
        Route::put('post-status/{id}', [PostPublishStatusController::class, 'update']);
        Route::delete('post-status/{id}', [PostPublishStatusController::class, 'destroy']);


        // PostComments API
        //  Route::apiResource('post-comment', PostCommentController::class);


        // PostComments API
        Route::post('post-comment', [PostCommentController::class, 'store']);
        Route::put('post-comment/{id}', [PostCommentController::class, 'update']);
        Route::delete('post-comment/{id}', [PostCommentController::class, 'destroy']);
    });
});
