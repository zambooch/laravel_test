<?php

namespace App\Policies;

use App\Message;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MessagePolicy
{
    use HandlesAuthorization;

    /**
     * Определяем, может ли данный пользователь удалить данную мессагу.
     *
     * @param  User  $user
     * @param  Message  $message
     * @return bool
     */
    public function destroy(User $user, Message $message)
    {
        return $user->id === $message->user_id;
    }

    /**
     * Определяем, может ли данный пользователь редактировать данную мессагу.
     *
     * @param  User  $user
     * @param  Message  $message
     * @return bool
     */
    public function update(User $user, Message $message)
    {
        return $user->id === $message->user_id;
    }
}
