<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPosts extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'title',
        'body',
    ];

    public function commentSection(){
        return $this->hasOne(CommentSection::class, 'blog_post_id');
    }
}
