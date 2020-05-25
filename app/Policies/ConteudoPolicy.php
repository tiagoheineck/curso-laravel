<?php

namespace App\Policies;

use App\Model\Conteudo;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ConteudoPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Conteudo  $conteudo
     * @return mixed
     */
    public function view(User $user, Conteudo $conteudo)
    {

    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user, Conteudo $conteudo)
    {


    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Conteudo  $conteudo
     * @return mixed
     */
    public function update(User $user, Conteudo $conteudo)
    {
        return $user->id === $conteudo->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Conteudo  $conteudo
     * @return mixed
     */
    public function delete(User $user, Conteudo $conteudo)
    {
        return $user->id === $conteudo->user_id;

    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Conteudo  $conteudo
     * @return mixed
     */
    public function restore(User $user, Conteudo $conteudo)
    {

    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Conteudo  $conteudo
     * @return mixed
     */
    public function forceDelete(User $user, Conteudo $conteudo)
    {
      return $user->id === $conteudo->user_id;

    }
}
