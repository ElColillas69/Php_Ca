<?php
// app/Models/Article.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title', 'content', 'blog_id'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
