<?php

namespace App\Policies;

use App\User;
use App\Group;
use Illuminate\Auth\Access\HandlesAuthorization;

class GroupPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //group
    }

    public function deleteGroup(User $user, Group $group)
    {
        return $user->id === $group->user_id;
    }

    public function viewEditGroup(User $user, Group $group)
    {
        return $user->id === $group->user_id;
    }
}
