<?php

namespace App\Policies;

use App\Post;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Se ejecutara antes de update (u otra accion definida). Tambien existe after.
     * Lo comento para realizarlo en el AuthServiceProvider.
     */
    public function before(User $user)
    {
        // No devolvemos algo en todas las partes de la función, ya que si no,
        // no seguiría con las siguientes comprobaciones de ser necesario
        /*
        if ($user->id === 2) {
            return true;
        }
        */
    }

    /**
     * Determine whether the user can update the post.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function update(User $user, Post $post)
    {
        return ! $post->author->is($user);
    }
}
