<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Persona;
use App\Empresario;
use App\Telefono;

use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME; 
protected $redirectTo ='radicatoria/config';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        //;
         $validado=Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'apellidos' => ['required', 'string', 'max:50'],
            'fechanacimiento' => ['required'],
            'telefono' => ['required','max:15'],
            'prefijo' => ['required','max:4'],
            'genero' => ['required'],
        ]);
        //dd($validado);
        return $validado;
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        
        
        $NuevaPersona=new  Persona;
        $NuevaPersona->nombre=$data['name'];
        $NuevaPersona->apellidos=$data['apellidos'];
    
        $NuevaPersona->fechanacimiento=$data['fechanacimiento'];
        $NuevaPersona->tipo=$data['tipo'];
        $NuevaPersona->genero=$data['genero'];
        $NuevaPersona->pais_id=1;
        $NuevaPersona->ciudad_id=1;
        $NuevaPersona->zona_id=1;

        
        $NuevaPersona->save(); 
        $id_persona=$NuevaPersona->id;

        //dd($NuevaPersona);
        $NuevoTelefono = new Telefono;
        $NuevoTelefono->detalle="PERSONAL";
        $NuevoTelefono->numero=$data['telefono'];
        $NuevoTelefono->prefijo=$data['prefijo'];
        $NuevoTelefono->persona_id=$id_persona;
        $NuevoTelefono->save();

        if ($data['tipo']=="empresario"){
            $NuevoCliente=new Empresario;
            $NuevoCliente->persona_id=$id_persona;
            $NuevoCliente->save();
        }
        //dd($id_persona);
        
       
        $UserNuevo= new User;
        $UserNuevo->name= $data['name'];
        $UserNuevo->email= $data['email'];
        $UserNuevo->persona_id= $id_persona;
        $UserNuevo->password= Hash::make($data['password']);
        $UserNuevo->save();
        $usuario_id=$UserNuevo->id;

        

        $userioEditor=User::find($usuario_id);
        $userioEditor->assignRole('Invitado');

        session(['persona_id'=>$id_persona]);

        return $UserNuevo;
 
    }

}
