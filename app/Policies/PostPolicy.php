<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Post;
<<<<<<< HEAD
use App\Policies\UserPolicy;
use App\Policies\PostPolicy;
use Illuminate\Support\Facades\Auth;

=======
>>>>>>> 981499a6d708467ce2e1e41f15d86eaeb882b97c

class PostPolicy
{
    use HandlesAuthorization;
    /*編集と削除の認可を確認する。

    @param \App\User $user
    @param \App\Post $post
    @return mixied
    */

    public function edit(User $user, Post $post) {
<<<<<<< HEAD
      return Auth::user()->id == $post->user_id;
=======
      return $user->id == $post->user_id;
>>>>>>> 981499a6d708467ce2e1e41f15d86eaeb882b97c
    }

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function before($user, $ability) {
      return $user->isAdmin() ? true : null;
    }
}
