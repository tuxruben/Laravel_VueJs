<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the usera can view any users.
     *
     * @param  \App\usera  $usera
     * @return mixed
     */
    public function viewAny(User $usera)
    {

    }



    /**
     * Determine whether the usera can create users.
     *
     * @param  \App\usera  $usera
     * @return mixed
     */
    public function create(User $usera)
    {
        return  $usera->id==0;
    }

    /**
     * Determine whether the usera can update the user.
     *
     * @param  \App\usera  $usera
     * @param  \App\usera  $user
     * @return mixed
     */
    public function update(User $usera, User $user , $perm=null)
    {
         if($usera->havePermission($perm[0])){
            return true;
        }else
        if($usera->havePermission($perm[1])){
             return  $usera->id>=  $user->id;
        }else{
            return false;
        }
    }
/**
     * Determine whether the usera can view the user.
     *
     * @param  \App\usera  $usera
     * @param  \App\usera  $user
     * @return mixed
     */
    public function view(User $usera, User $user, $perm=null)
    {
        if($usera->havePermission($perm[0])){
            return true;
        }else
        if($usera->havePermission($perm[1])){
             return  $usera->id>=  $user->id;
        }else{
            return false;
        }

        }
        }

