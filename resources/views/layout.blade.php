<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title> @yield('titulo') </title>
  
<link rel="icon" href="{{asset('imagenes/logotipo.ico')}}" type="image/x-icon">

    @yield('metadatos')

     <!-- SweetAlert2 CSS -->
  <link rel="stylesheet" href="{{asset("plugins/sweetalert2/sweetalert2.css")}}">
 
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset("plugins/fontawesome-free/css/all.min.css")}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset("dist/css/adminlte.css")}}">
   <link rel="stylesheet" href="{{asset("dist/css/custom.css")}}">

  <link rel="stylesheet" href="">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <!-- datatable -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
  

  <!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"-->

   @yield('css')

</head>
<body class="hold-transition sidebar-mini">


  
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-cyan navbar-light">
      <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <nav class=" btn navbar navbar-expand-md navbar-light bg-cyan shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                   
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto text-white">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Salir') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                                
                            </li>
                            
                        @endguest
                    </ul>
                    
                    
                </div>
            </div>
        </nav>
      <div class="">
          <a href="{{route('home')}}" class="btn text-white">Buscar <i class="fas fa-search fa-2x text-white-50"></i> </a>
      </div>
        
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-cyan elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="/imagenes/logotipo1.png" width="80" alt="logo ite" class="brand-image elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">.
      </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
 
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
{{-- %%%%%%%%%%%%%%%%%%%%%%  INICIO SIN SESION %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
      @if (Auth::guest())
        <li class="nav-item has-treeview menu-open">
          <a href="#" class="nav-link active">
            <i class="fas fa-user-tie"></i>
            <p>
                  Mi Perfil
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href=" {{route('login')}}" class="nav-link">
                 <i class="fas fa-user"></i>
                  <p>Iniciar Sesion</p>
                </a>
              </li>
              <li class="nav-item">
                  <a href=" {{ route('register')}} " class="nav-link">
                 <i class="fas fa-user"></i>
                    <p>Registrarse Gratis</p>
                  </a>
                </li>
            </ul>
        </li>  
      @endif
{{--%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  FIN SIN SESION %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%--}}

{{-- %%%%%%%%%%%%%%%%%%%%%%  INICIO EMPRESA %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
    @hasanyrole('Administrador|Empresario|Invitado') 
    <li class="nav-item has-treeview menu-open">
          <a href="#" class="nav-link active">
            <i class="fas fa-user-tie"></i>
            <p>
                  Mi Perfil
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
            <ul class="nav nav-treeview">
             
          
              <li class="nav-item">
                <a href=" {{ route('empresario_perfil') }} " class="nav-link">
                 <i class="far fa-list-alt"></i>
                  <p>Editar mi Perfil</p>
                </a>
              </li>
          
            </ul>
        </li>
      <li class="nav-item has-treeview menu-open">
          <a href="#" class="nav-link active">
            <i class="fas fa-user-friends"></i>
            <p>
                  Mis Empresas
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
            <ul class="nav nav-treeview">
             
          
              <li class="nav-item">
                <a href=" {{ route('empresa_listar') }} " class="nav-link">
                 <i class="far fa-list-alt"></i>
                  <p>Listar Empresas</p>
                </a>
              </li>
          
              <li class="nav-item">
                <a href="{{ route('empresa_crear')}}" class="nav-link">
                  <i class="far fa-plus-square"></i>
                  <p>Crear Empresa</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('telofempresas_listar')}}" class="nav-link">
                  <i class="fas fa-mobile-alt"></i>
                  <p>Gestionar Teléfonos</p>
                </a>
              </li>
            </ul>
        </li>

        <li class="nav-item has-treeview menu-open">
          <a href="#" class="nav-link active">
            <i class="fas fa-user-friends"></i>
            <p>
                  Productos
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('empresa_config')}}" class="nav-link">
                  <i class="fas fa-images"></i>
                  <p>Crear productos</p>
                </a>
              </li>
            </ul>
        </li>

       
    @endhasanyrole    
{{--%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  FIN EMPRESA %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%--}}

{{-- %%%%%%%%%%%%%%%%%%%%%%  INICIO PERSONAS %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
  @hasanyrole('Administrador|Empresario|Invitado')      
    <li class="nav-item has-treeview menu-open">
          <a href="#" class="nav-link active">
            <i class="fas fa-user-friends"></i>
            <p>
                  Mis Clientes
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
            <ul class="nav nav-treeview">
             
          
              <li class="nav-item">
                <a href=" {{ route('persona_listar') }} " class="nav-link">
                 <i class="far fa-list-alt"></i>
                  <p>Listar Clientes</p>
                </a>
              </li>
          
              <li class="nav-item">
                <a href="{{ route('persona_crear')}}" class="nav-link">
                  <i class="far fa-plus-square"></i>
                  <p>Crear Cliente</p>
                </a>
              </li>
            </ul>
            
        </li>
      
            {{--%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  FIN PERSONAS %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%--}}

          {{-- %%%%%%%%%%%%%%%%%%%%%%  INICIO MENSAJES %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
        <li class="nav-item has-treeview menu-open">
          <a href="#" class="nav-link active">
            <i class="fas fa-sms"></i>
            <p>
                  Mensajes
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
            <ul class="nav nav-treeview">
             
          
              <li class="nav-item">
                <a href=" {{ route('mensaje_listar') }} " class="nav-link">
                 <i class="far fa-list-alt"></i>
                  <p>Listar Mensajes <span class="right badge badge-success">Whatsapp</span></p>
                  
                </a>
              </li>

             
          
              <li class="nav-item">
                <a href="{{ route('mensaje_crear')}}" class="nav-link">
                  <i class="far fa-plus-square"></i>
                  <p>Crear Mensaje</p>
                </a>
              </li>
            </ul>
            
        </li>
  @endhasanyrole     
{{--%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  FIN MENSAJESA %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%--}}
 
      

{{-- %%%%%%%%%%%%%%%%%%%%%%  INICIO CIUDADES %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
  @role('Administrador|Empresario|Invitado')  
  <li class="nav-item has-treeview menu-open">
          <a href="#" class="nav-link active">
           <i class="fas fa-city"></i>
            <p>
                  Ciudades
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
            <ul class="nav nav-treeview">
             
          
              <li class="nav-item">
                <a href=" {{ route('ciudad_datatable') }} " class="nav-link">
                  <i class="far fa-list-alt"></i>
                  <p>Listar Ciudades</p>
                </a>
              </li>
          
              <li class="nav-item">
                <a href="{{ route('ciudad_crear')}}" class="nav-link">
                  <i class="far fa-plus-square"></i>
                  <p>Crear Ciudad</p>
                </a>
              </li>
            </ul>
            
        </li>
{{--%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  FIN CIUDADES %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%--}}

{{-- %%%%%%%%%%%%%%%%%%%%%%  INICIO PERSONAS %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
        <li class="nav-item has-treeview menu-open">
          <a href="#" class="nav-link active">
            <i class="fas fa-user-friends"></i>
            <p>
                  Categorías
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
            <ul class="nav nav-treeview">
             
          
              <li class="nav-item">
                <a href=" {{ route('categoria_listar') }} " class="nav-link">
                 <i class="far fa-list-alt"></i>
                  <p>Listar Categorías</p>
                </a>
              </li>
          
              <li class="nav-item">
                <a href="{{ route('categoria_crear')}}" class="nav-link">
                  <i class="far fa-plus-square"></i>
                  <p>Crear Categoría</p>
                </a>
              </li>
            </ul>
            
        </li>
{{--%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  FIN PERSONAS %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%--}}



{{-- %%%%%%%%%%%%%%%%%%%%%%  INICIO ZONAS %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
        <li class="nav-item has-treeview menu-open">
          <a href="#" class="nav-link active">
            <i class="fas fa-map-marked-alt"></i>
            <p>
                  Zonas
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href=" {{ route('zona_datatable') }} " class="nav-link">
                  <i class="far fa-list-alt"></i>
                  <p>Listar Zonas</p>
                </a>
              </li>
          
              <li class="nav-item">
                <a href="{{ route('zona_crear')}}" class="nav-link">
                 <i class="far fa-plus-square"></i>
                  <p>Crear Zona</p>
                </a>
              </li>
            </ul>
            
        </li>
@endrole
{{--%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  FIN ZONAS %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%--}}


{{-- %%%%%%%%%%%%%%%%%%%%%%  INICIO USUARIOS %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% --}}
    @hasanyrole('Administrador')
        <li class="nav-item has-treeview menu-open">
          <a href="" class="nav-link active">
            <i class="fas fa-sms"></i>
            <p>
                  Busqueda
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
            <ul class="nav nav-treeview">
             
          
              <li class="nav-item">
                <a href=" {{ route('home') }} " class="nav-link">
                 <i class="far fa-list-alt"></i>
                  <p>Búsqueda</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-plus-square"></i>
                  <p>Busqueda Avanzada</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('empresa_priorizar')}}" class="nav-link">
                  <i class="far fa-plus-square"></i>
                  <p>Priorizar Empresa</p>
                </a>
              </li>
            </ul>
            
        </li>
    
      <li class="nav-item has-treeview menu-open">
          <a href="#" class="nav-link active">
            <i class="fas fa-user-friends"></i>
            <p>
                  Usuarios
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
            <ul class="nav nav-treeview">
             
          
              <li class="nav-item">
                <a href=" {{ route('usuario_listar') }} " class="nav-link">
                 <i class="far fa-list-alt"></i>
                  <p>Listar Usuarios</p>
                </a>
              </li>
          
                
             
            </ul>
            
        </li>

      <li class="nav-item has-treeview menu-open">
          <a href="#" class="nav-link active">
            <i class="fas fa-user-friends"></i>
            <p>
                  Forma pago
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
            <ul class="nav nav-treeview">
             
          
              <li class="nav-item">
                <a href=" {{ route('metodopago_listar') }} " class="nav-link">
                 <i class="far fa-list-alt"></i>
                  <p>Listar formapago</p>
                </a>
              </li>
          
              <li class="nav-item">
                <a href="{{ route('metodopago_crear')}}" class="nav-link">
                  <i class="far fa-plus-square"></i>
                  <p>Crear Formapago</p>
                </a>
              </li>
            </ul>
            
        </li>
        
        
        <li class="nav-item has-treeview menu-open">
          <a href="#" class="nav-link active">
            <i class="fas fa-user-friends"></i>
            <p>
                  Ordenes
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href=" {{ route('orden_listar') }} " class="nav-link">
                 <i class="far fa-list-alt"></i>
                  <p>Listar ordenes</p>
                </a>
              </li>
            </ul>
            
        </li>

         <li class="nav-item has-treeview menu-open">
          <a href="#" class="nav-link active">
            <i class="fas fa-user-friends"></i>
            <p>
                  Constante
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href=" {{ route('constante_listar') }} " class="nav-link">
                 <i class="far fa-list-alt"></i>
                  <p>Listar Constantes</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href=" {{ route('constante_crear') }} " class="nav-link">
                 <i class="far fa-list-alt"></i>
                  <p>Crear Constantes</p>
                </a>
              </li>
            </ul>
        </li>

         <li class="nav-item has-treeview menu-open">
          <a href="#" class="nav-link active">
            <i class="fas fa-user-friends"></i>
            <p>
                  Cliks
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href=" {{ route('click_listar') }} " class="nav-link">
                 <i class="far fa-list-alt"></i>
                  <p>Listar Clicks</p>
                </a>
              </li>
            </ul>
        </li>
    @endhasanyrole    
{{--%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  FIN EMPRESA %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%--}}

           


          {{--<li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Simple Link
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
        --}}
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
 
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="fondoturqueza">
      <div class="container-fluid">
            @yield('contenido')
      </div> <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{asset("plugins/jquery/jquery.min.js")}}" ></script>
<!-- Bootstrap 4 -->
<script src="{{asset("plugins/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
<!-- AdminLTE App -->
<script src="{{asset("dist/js/adminlte.min.js")}}"></script>
 <!-- SweetAlert2 JS -->
  <script src="{{asset("plugins/sweetalert2/sweetalert2.js")}}"></script>

 <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
 <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

<script src="{{asset("dist/js/alertas.js")}}"></script>
@yield('codigojs')
</body>
</html>
