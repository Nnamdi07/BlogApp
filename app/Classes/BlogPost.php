<?php
namespace App\Classes;

use App\Actions\AddPostAction;
use App\Http\Requests\AddPostRequest;
use App\Http\Requests\GetPostRequest;
use App\Http\Requests\CommentSectionRequest;
use App\Http\Requests\UpdatePosttRequest;
use App\Models\BlogPost as ModelsBlogPost;
use App\Models\CommentSection;
use Exception;
use Illuminate\Support\Collection;

class BlogPost{
    /**
     * adds post to db
     *
     * @param AddPostRequest $request
     * @return ModelsBlogPost
     */
    public function add(AddPostRequest $request) : ModelsBlogPost{
        return (new AddPostAction())->execute($request);
    }

    /**
     * removes a post
     *
     * @param integer $blog_post_id
     * @return void
     */
    public function remove(int $blog_post_id) : void{
        if(!ModelsContact::find($blog_post_id)){
            throw new Exception('Post does not exists');
        }

        ModelsBlogPost::where('id',$blog_post_id)->delete();
    }

    /**
     * fetches all posts
     *
     * @param GetPostRequest $request
     * @return Collection
     */
    public function getAll(GetPostRequest $request){
        $length = $request->length ?? 20;
        return ModelsBlogPost::with('comment_section')->paginate($length);
    }

    /**
     * Retrieves a post
     *
     * @param integer $blog_post_id
     * @return ModelsBlogPost
     */
    public function find(int $blog_post_id) : ModelsBlogPost{
        return ModelsBlogPost::with('comment_section')->where('id',$blog_post_id)->first();
    }

    /**
     * updates a post
     *
     * @param UpdatePostRequest $request
     * @return ModelsBlogPost
     */
    public function update(UpdatePosttRequest $request) : ModelsBlogPost{
        $blog_post = ModelsBlogPost::find($request->blog_post_id);

        $contact->update($request->validated());

        return $blog_post;
    }

    public function addCommentSection(CommentSectionRequest $request) : CommentSection{
        return CommentSection::create($request->validated());
    }
}