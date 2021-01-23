<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactoGuardarRequest;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Pago;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user=Auth::user();
        session(['persona_id'=>$user->persona_id]);
       $rol=$user->roles->implode('name','-');
       //dd($rol);
       switch ($rol) {
           case 'Administrador':
                 $plata = Pago::where( 'id','>','0')->sum( 'monto' );
                return view('pago.index',compact('plata'));
            break;
            case 'Empresario':
                $mensaje="Bienvenido a Foconcito: Version PRO";
                return view('home',compact('mensaje'));
            break;
            case 'Invitado':
                $mensaje="Bienvenido a Foconcito: Version Invitado";
                return view('home',compact('mensaje'));
            break;
       }
        return view('home');
    }
    public function storecontact(Request $request){
          dd($request->all());
        //if(Request()->ajax()){
            //Contacto::create($request->all());
            //Ciudad::create($request->all());
                $data=['mensaje'=>'Su mensaje ha sido enviado'];
            return response()->json($data, 200);   
        //} 
    }
}
