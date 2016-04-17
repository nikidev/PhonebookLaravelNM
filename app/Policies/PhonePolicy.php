<?php

namespace App\Policies;


use App\User;
use App\Phone;
use Illuminate\Auth\Access\HandlesAuthorization;

class PhonePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function deletePhone(User $user, Phone $phone)
    {
        return $user->id === $phone->user_id;
    }

    public function viewEditPhone(User $user, Phone $phone)
    {
        return $user->id === $phone->user_id;
    }
}
