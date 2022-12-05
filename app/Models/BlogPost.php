<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BlogPost extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'body', 'user_id', 'is_trash'];

    /**
     * Get the comments for the blog post.
     */
    public function blogComments()
    {
        return $this->hasMany(BlogComment::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
