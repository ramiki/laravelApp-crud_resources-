<?php

namespace App\Policies;

use App\Models\Form;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class formPolicy
{
    use HandlesAuthorization;

    /**
     * Perform pre-authorization checks.
     *
     * @param  \App\Models\User  $user
     * @param  string  $ability
     * @return void|bool
     */

    // authoriz all policys if condition (admin)
    // restrinc the update and delete methode of other users for admin
    public function before(User $user, $ability)
    {

        // if($user->is_admin && ( $ability != 'update' || $ability != 'delete')) {
        //     return true ;
        // }
        // The issue with the current code is that the condition inside the if 
        // statement is always true because $ability cannot be equal to both 'update' and 'delete' at the same time.

        // Here's the corrected code:

        if ($user->is_admin && ($ability == 'create' || $ability == 'view')) {
            return true;
        }

        // This code will allow admin users to perform the 'create' and 'view' actions,
        // but not the 'update' and 'delete' actions, which can be performed by all authenticated users.
        // The before method of a policy class will not be called if the class doesn't contain a method with a name matching the name of the ability being checked.


    }

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Form $form)
    {
        return $user->id === $form->user_id;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Form $form)
    {
        return $user->id === $form->user_id;

        // disable update for all
        // return false ;

    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Form $form)
    {
        return $user->id === $form->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Form $form)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Form $form)
    {
        // return $user->is === $form->user_id ;
    }
}
