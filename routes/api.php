<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogPostsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix'=> 'blog'],function (){
    Route::post('add',[BlogPostsController::class,'add']);
    Route::post('update',[BlogPostsController::class,'update']);
    Route::get('/{blog_post_id}',[BlogPostsController::class,'show']);
    Route::get('',[BlogPostsController::class,'index']);
    Route::post('remove/{blog_post_id}',[BlogPostsController::class,'remove']);
    Route::post('/comment_section',[BlogPostsController::class,'addCommentSection']);
   
});