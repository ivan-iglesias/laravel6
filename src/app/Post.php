<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    /**
     * Para que cuando Laravel busque posts de forma
     * automática, lo haga en base al slug y no al id.
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Get the user that owns the post.
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Ruta del post.
     */
    public function path()
    {
        return route('posts.show', $this);
    }
}
