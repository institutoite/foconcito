<?php

namespace App\Policies;

use App\User;
use App\Persona;
use Illuminate\Auth\Access\HandlesAuthorization;

class PersonaPolicy
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
    public function permitido(User $user, Persona $persona){
        return $user->persona_id==$persona->persona_id; 
    } 
}
