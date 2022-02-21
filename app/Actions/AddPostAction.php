<?php
namespace App\Actions;

use App\Http\Requests\AddPostRequest;
use App\Models\BlogPosts;

class AddPostAction{
    /**
     * Adds a post to the db
     * 
     * @param AddPostRequest $request
     * @return BlogPosts
     */
    public function execute(AddPostRequest $request) : BlogPosts{
        return BlogPosts::create($request->validate());
    }
}






?>