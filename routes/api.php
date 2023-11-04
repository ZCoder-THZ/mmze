<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\PostController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/**
 * Get all users
 *
 * Route: GET /users
 */
Route::get('users',[ UserController::class,'getUsers']);

/**
 * Get all posts
 *
 * Route: GET /posts
 */
Route::get('posts',[PostController::class,'getPosts']);

/**
 * Create a new post
 *
 * Route: POST /posts/create
 */
Route::post('posts/create',[PostController::class,'createPost']);

/**
 * Delete a post by ID
 *
 * Route: DELETE /posts/delete/{id}
 */
Route::delete('posts/delete/{id}',[PostController::class,'deletePost']);

/**
 * Update a post by ID
 *
 * Route: PUT /posts/update/{id}
 */
Route::put('posts/update/{id}',[PostController::class,'updatePost']);
