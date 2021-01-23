<?php

namespace App\Policies;

use App\User;
use App\Empresa;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Access\HandlesAuthorization;

class EmpresaPolicy
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

    public function pass(User $user, Empresa $empresa){
        $empresario=DB::table('users')
                    ->join('personas','users.persona_id','=','personas.id')
                    ->join('empresarios','empresarios.persona_id','=','personas.id')
                    ->where('users.id','=',$user->id)
                    ->select('empresarios.id')
                   ->get()[0]->id;
        return $empresario==$empresa->empresario_id; 
    } 

}
