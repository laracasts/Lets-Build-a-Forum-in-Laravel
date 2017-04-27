<?php

namespace App\Policies;

use App\Reply;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReplyPolicy
{
    use HandlesAuthorization;

    /**
     * Determine if the authenticated user has permission to update a reply.
     *
     * @param  User  $user
     * @param  Reply $reply
     * @return bool
     */
    public function update(User $user, Reply $reply)
    {
        return $reply->user_id == $user->id;
    }
}
