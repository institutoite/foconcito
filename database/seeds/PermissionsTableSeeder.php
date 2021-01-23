<?php

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use App\User;


class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Permission list
        Permission::create(['name' => 'ciudad_datatable']);
        Permission::create(['name' => 'ciudad_crear']);
        Permission::create(['name' => 'ciudad_mostrar']);
        Permission::create(['name' => 'ciudad_guardar']);
        Permission::create(['name' => 'ciudad_editar']);
        Permission::create(['name' => 'ciudad_actualizar']);
        Permission::create(['name' => 'ciudad_eliminar']);

        Permission::create(['name' => 'zona_listar']);
        Permission::create(['name' => 'zona_crear']);
        Permission::create(['name' => 'zona_mostrar']);
        Permission::create(['name' => 'zona_guardar']);
        Permission::create(['name' => 'zona_editar']);
        Permission::create(['name' => 'zona_actualizar']);
        Permission::create(['name' => 'zona_eliminar']);

        Permission::create(['name' => 'persona_listar']);
        Permission::create(['name'=>'persona_informar']);
        Permission::create(['name' => 'persona_crear']);
        Permission::create(['name' => 'persona_mostrar']);
        Permission::create(['name' => 'persona_guardar']);
        Permission::create(['name' => 'persona_editar']);
        Permission::create(['name' => 'persona_actualizar']);
        Permission::create(['name' => 'persona_eliminar']);
        Permission::create(['name'=>'telefonos_persona']);

   
        Permission::create(['name' => 'mensaje_listar']);
        Permission::create(['name' => 'mensaje_crear']);
        Permission::create(['name' => 'mensaje_mostrar']);
        Permission::create(['name' => 'mensaje_guardar']);
        Permission::create(['name' => 'mensaje_editar']);
        Permission::create(['name' => 'mensaje_actualizar']);
        Permission::create(['name' => 'mensaje_eliminar']);    
    
        Permission::create(['name' => 'segmentacion']);          
        Permission::create(['name' => 'segmentar']);
        Permission::create(['name' => 'bombardear']);

        Permission::create(['name' => 'categoria_listar']);
        Permission::create(['name' => 'categoria_crear']);
        Permission::create(['name' => 'categoria_mostrar']);
        Permission::create(['name' => 'categoria_guardar']);
        Permission::create(['name' => 'categoria_editar']);
        Permission::create(['name' => 'categoria_actualizar']);
        Permission::create(['name' => 'categoria_eliminar']);    
        Permission::create(['name' => 'categoria_prioridad']);
        Permission::create(['name' => 'categoria_reset']);


        Permission::create(['name' => 'empresa_listar']);
        Permission::create(['name' => 'empresa_crear']);
        Permission::create(['name' => 'empresa_mostrar']);
        Permission::create(['name' => 'empresa_guardar']);
        Permission::create(['name' => 'empresa_editar']);
        Permission::create(['name' => 'empresa_actualizar']);
        Permission::create(['name' => 'empresa_eliminar']);  
        Permission::create(['name' => 'empresa_votar']);
        Permission::create(['name' => 'empresa_detalle']);
        Permission::create(['name' => 'empresa_buscar']);
        Permission::create(['name' => 'empresa_priorizar']);
        Permission::create(['name' => 'empresa_guardar_prioridad']);

        Permission::create(['name'=>'empresa_vista_priorizar']);
        Permission::create(['name'=>'empresa_galeria']);
        Permission::create(['name'=>'empresa_config']);
    
        Permission::create(['name'=>'pago_listar']);
        Permission::create(['name'=>'pago_formas']);
        Permission::create(['name'=>'pago_crear']);
      
        Permission::create(['name'=>'pago_mostrar']);
     
        Permission::create(['name'=>'pago_guardar']);
        Permission::create(['name'=>'pago_editar']);
        Permission::create(['name'=>'pago_actualizar']);
        Permission::create(['name'=>'pago_verificar']);
        Permission::create(['name'=>'pago_eliminar']);

        // RUTAS ORDEN
        Permission::create(['name'=>'orden_listar']);
        Permission::create(['name'=>'orden_crear']);
        Permission::create(['name'=>'orden_mostrar']);
        Permission::create(['name'=>'orden_guardar']);
        Permission::create(['name'=>'orden_editar']);
        Permission::create(['name'=>'orden_actualizar']);
        Permission::create(['name'=>'orden_eliminar']);
        Permission::create(['name'=>'orden_detalle']);
        Permission::create(['name'=>'orden_buscar']);
    
        //RUTAS USUARIOS
        Permission::create(['name'=>'usuario_listar']);
        Permission::create(['name'=>'usuario_crear']);
        Permission::create(['name'=>'usuario_mostrar']);
        Permission::create(['name'=>'usuario_guardar']);
        Permission::create(['name'=>'usuario_editar']);
        Permission::create(['name'=>'usuario_actualizar']);
        Permission::create(['name'=>'usuario_eliminar']);
        Permission::create(['name'=>'usuario_detalle']);
        Permission::create(['name'=>'usuario_buscar']);

        //RUTAS CATEGORIAS
        Permission::create(['name'=>'metodopago_listar']);
        Permission::create(['name'=>'metodopago_crear']);
        Permission::create(['name'=>'metodopago_mostrar']);
        Permission::create(['name'=>'metodopago_guardar']);
        Permission::create(['name'=>'metodopago_editar']);
        Permission::create(['name'=>'metodopago_actualizar']);
        Permission::create(['name'=>'metodopago_eliminar']);


        // RUTAS FOTOS
        Permission::create(['name'=>'imagen_guardar']);
        Permission::create(['name'=>'imagen_crear']);
        Permission::create(['name'=>'imagen_editar']);
        Permission::create(['name'=>'imagen_actualizar']);
        Permission::create(['name'=>'imagen_eliminar']);
        Permission::create(['name'=>'imagen_mostrar']);

        //RUTAS CONSTANTES
        Permission::create(['name'=>'constante_listar']);
        Permission::create(['name'=>'constante_crear']);
        Permission::create(['name'=>'constante_mostrar']);
        Permission::create(['name'=>'constante_guardar']);
        Permission::create(['name'=>'constante_editar']);
        Permission::create(['name'=>'constante_actualizar']);
        Permission::create(['name'=>'constante_eliminar']);

        //RUTAS CLIKCS
        Permission::create(['name'=>'click_listar']);
        Permission::create(['name'=>'click_crear']);
        Permission::create(['name'=>'click_mostrar']);
        Permission::create(['name'=>'click_guardar']);
        Permission::create(['name'=>'click_editar']);
        Permission::create(['name'=>'click_actualizar']);
        Permission::create(['name'=>'click_eliminar']);



        
        // Creando Roles
        $admin = Role::create(['name' => 'Administrador']);
        $empresario=Role::create(['name'=>'Empresario']);
        $invitado=Role::create(['name'=>'Invitado']);
        $admin->givePermissionTo([
            'ciudad_datatable',
            'ciudad_crear',
            'ciudad_mostrar',
            'ciudad_guardar',
            'ciudad_editar',
            'ciudad_actualizar',
            'ciudad_eliminar',
            
            'zona_listar',
            'zona_crear',
            'zona_mostrar',
            'zona_guardar',
            'zona_editar',
            'zona_actualizar',
            'zona_eliminar',

            'persona_listar',
            'persona_crear',
            'persona_informar',
            'persona_mostrar',
            'persona_guardar',
            'persona_editar',
            'persona_actualizar',
            'persona_eliminar',
            'telefonos_persona',

            'mensaje_listar',
            'mensaje_crear',
            'mensaje_mostrar',
            'mensaje_guardar',
            'mensaje_editar',
            'mensaje_actualizar',
            'mensaje_eliminar',
            
            'segmentacion',
            'segmentar',
            'bombardear',

            'categoria_listar',
            'categoria_crear',
            'categoria_mostrar',
            'categoria_guardar',
            'categoria_editar',
            'categoria_actualizar',
            'categoria_eliminar',
            'categoria_prioridad',
            'categoria_reset',

            'empresa_listar',
            'empresa_crear',
            'empresa_mostrar',
            'empresa_guardar',
            'empresa_editar',
            'empresa_actualizar',
            'empresa_eliminar',

            'empresa_votar',
            'empresa_detalle',
            'empresa_buscar',
            'empresa_priorizar',
            'empresa_guardar_prioridad',

            'empresa_vista_priorizar',
            'empresa_galeria',
            'empresa_config',
        
            'pago_listar',
            'pago_formas',
            'pago_crear',
           
            'pago_mostrar',
            
            'pago_guardar',
            'pago_editar',
            'pago_actualizar',
            'pago_verificar',
            'pago_eliminar',

            // RUTAS ORDEN
            'orden_listar',
            'orden_crear',
            'orden_mostrar',
            'orden_guardar',
            'orden_editar',
            'orden_actualizar',
            'orden_eliminar',
            'orden_detalle',
            'orden_buscar',
        
            //RUTAS USUARIOS
            'usuario_listar',
            'usuario_crear',
            'usuario_mostrar',
            'usuario_guardar',
            'usuario_editar',
            'usuario_actualizar',
            'usuario_eliminar',
            'usuario_detalle',
            'usuario_buscar',

            //RUTAS CATEGORIAS
            'metodopago_listar',
            'metodopago_crear',
            'metodopago_mostrar',
            'metodopago_guardar',
            'metodopago_editar',
            'metodopago_actualizar',
            'metodopago_eliminar',

            // RUTAS FOTOS
            'imagen_guardar',
            'imagen_crear',
            'imagen_editar',
            'imagen_actualizar',
            'imagen_eliminar',
            'imagen_mostrar',

            //RUTAS CONSTANTES
            'constante_listar',
            'constante_crear',
            'constante_mostrar',
            'constante_guardar',
            'constante_editar',
            'constante_actualizar',
            'constante_eliminar',

            //RUTAS CLIKCS
            'click_listar',
            'click_crear',
            'click_mostrar',
            'click_guardar',
            'click_editar',
            'click_actualizar',
            'click_eliminar',
        ]);

        $empresario->givePermissionTo([
            'ciudad_datatable',
            'ciudad_crear',
            'ciudad_mostrar',
            'ciudad_guardar',
            'ciudad_editar',
            'ciudad_actualizar',
            'ciudad_eliminar',
            
            'zona_listar',
            'zona_crear',
            'zona_mostrar',
            'zona_guardar',
            'zona_editar',
            'zona_actualizar',
            'zona_eliminar',

            'persona_listar',
            'persona_crear',
            'persona_informar',
            'persona_mostrar',
            'persona_guardar',
            'persona_editar',
            'persona_actualizar',
            'persona_eliminar',
            'telefonos_persona',

            'mensaje_listar',
            'mensaje_crear',
            'mensaje_mostrar',
            'mensaje_guardar',
            'mensaje_editar',
            'mensaje_actualizar',
            'mensaje_eliminar',
            
            'segmentacion',
            'segmentar',
            'bombardear',

            'categoria_listar',
            'categoria_crear',
            'categoria_mostrar',
            'categoria_guardar',
            'categoria_editar',
            'categoria_actualizar',
            'categoria_eliminar',
            'categoria_prioridad',
            'categoria_reset',

            'empresa_listar',
            'empresa_crear',
            'empresa_mostrar',
            'empresa_guardar',
            'empresa_editar',
            'empresa_actualizar',
            'empresa_eliminar',

            'empresa_votar',
            'empresa_detalle',
            'empresa_buscar',
            'empresa_priorizar',
            'empresa_guardar_prioridad',

            'empresa_vista_priorizar',
            'empresa_galeria',
            'empresa_config',
        
            'pago_guardar',
           
            // RUTAS ORDEN
            
            'orden_guardar',

            // RUTAS FOTOS
            'imagen_guardar',
            'imagen_crear',
            'imagen_editar',
            'imagen_actualizar',
            'imagen_eliminar',
            'imagen_mostrar',

            //RUTAS CONSTANTES
            'constante_listar',
            'constante_crear',
            'constante_mostrar',
            'constante_guardar',
            'constante_editar',
            'constante_actualizar',
            'constante_eliminar',

            //RUTAS CLIKCS
            'click_listar',
            'click_crear',
            'click_mostrar',
            'click_guardar',
            'click_editar',
            'click_actualizar',
            'click_eliminar',
        ]);

        $invitado->givePermissionTo([
            'empresa_votar',
            'empresa_detalle',
            'persona_mostrar',
            'empresa_buscar',
            'empresa_priorizar',
            'empresa_guardar_prioridad',
        
            'empresa_vista_priorizar',
            'empresa_galeria',
            
            'empresa_mostrar',
        
            'pago_guardar',

            'click_guardar',
        ]);

      
    
        //User Admin
        $user = User::find(1); 
        $user->assignRole('Administrador');

        $userioEditor=User::find(2);
        $userioEditor->assignRole('Invitado');
    }
}
