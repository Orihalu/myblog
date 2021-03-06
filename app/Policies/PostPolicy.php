<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Post;
use App\Policies\UserPolicy;
use App\Policies\PostPolicy;
use Illuminate\Support\Facades\Auth;


class PostPolicy
{
    use HandlesAuthorization;
    /*編集と削除の認可を確認する。

    @param \App\User $user
    @param \App\Post $post
    @return mixied
    */

    public function edit(User $user, Post $post) {
      // dd($user);
      //laravelのおかげで$userでもできるかも
      return Auth::user()->id == $post->user_id;
    }

    public function destroy(User $user, Post $post) {
      return Auth::user()->id == $post->user_id;
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
//管理者には全認可が降りる
//他のメソッドの前に実行
    public function before($user, $ability) {
      return $user->isAdmin() ? true : null;
    }
}
