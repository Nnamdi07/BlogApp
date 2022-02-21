<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes\BlogPost;
use App\Http\Requests\AddPostRequest;
use App\Http\Requests\GetPostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Requests\CommentSectiontRequest;

class BlogPostsController extends Controller
{
    private BlogPost $blog_post;

    public function __construct(BlogPost $blog_post){
        $this->blog_post = $blog_post;
    }

    public function add(AddPostRequest $request){
        return $this->blog_post->add($request);
    }

    public function remove(int $blog_post_id){
        $this->blog_post->remove($blog_post_id);
        return response('Post successfully removed',200);
    }

    public function update(UpdatePostRequest $request){
        return $this->blog_post->update($request);
    }

    public function index(GetPostRequest $request){
        return $this->blog_post->getAll($request);
    }

    public function show(int $blog_post_id){
        return $this->contact->find($blog_post_id);
    }

    public function addCommentSection(CommentSectionRequest $request){
        return $this->blog_post->addCommentSection($request);
    }
}
