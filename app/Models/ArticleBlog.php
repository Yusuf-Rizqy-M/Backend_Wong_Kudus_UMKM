<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleBlog extends Model
{
    use HasFactory;

    protected $fillable = ['category_blog_id','author', 'title', 'description', 'image', 'status','sender_name_last'];

    public function categoryBlog()
    {
        return $this->belongsTo(CategoryBlog::class, 'category_blog_id');
    }


}
