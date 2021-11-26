<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
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

    public function view_all_payments(){
        return Auth::user()->is_admin == true ? Response::allow()
        : Response::deny('You do not have access to this page.');
    }
}
