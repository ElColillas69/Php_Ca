<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogArticle extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content'
    ];
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
