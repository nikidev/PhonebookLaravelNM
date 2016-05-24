<?php

namespace App\Policies;

use App\Phone;
use App\OtherContact;
use App\User;
use Auth;
use Illuminate\Auth\Access\HandlesAuthorization;


class OtherContactPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     //
    // }

    /*public function viewContactsList(User $user,  Phone $phone)
    {
        
        return true;
    }*/

    /*public function viewEditContact(User $user, OtherContact $otherContact)
    {
        return $user->id === $otherContact->phone_id;
    }*/

    public function deleteContact(User $user, OtherContact $otherContact)
    {
        return $user->id === $otherContact->phone_id;
    }
}
