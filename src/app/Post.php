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
}
