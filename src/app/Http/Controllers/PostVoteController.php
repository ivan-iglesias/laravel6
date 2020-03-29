<?php

namespace App\Http\Controllers;

use App\Post;

class PostVoteController extends Controller
{
    public function store(Post $post)
    {
        /*
        if (Gate::denies('update-post', $post)) {
            die('handle it this way');
        }
        */

        // Cambiamos update-post a update (PostPolicy), tambien en el "@can('update', $post)".
        $this->authorize('update', $post);

        $post->like();

        return back();
    }
}
