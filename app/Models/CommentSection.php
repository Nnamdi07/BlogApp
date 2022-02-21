<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'blog_post_id'
    ];

    public function blogPost(){
        return $this->belongsTo(BlogPosts::class,'blog_post_id');
    }
}
