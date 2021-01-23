<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Foconcito</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="icon" href="{{asset('imagenes/logotipo.ico')}}" type="image/x-icon">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
	
		
		<link href='https://fonts.googleapis.com/css?family=Lato:400,300,700' rel='stylesheet' type='text/css'>

		<!-- SweetAlert2 CSS -->
  		<link rel="stylesheet" href="{{asset("plugins/sweetalert2/sweetalert2.css")}}">
		<link rel="stylesheet" href="{{asset('dist/css/custom.css')}}">

        <link rel="stylesheet" href="{{asset('sima/css/normalize.css')}}">
        <link rel="stylesheet" href="{{asset('sima/css/main.css')}}">
		<link rel="stylesheet" href="{{asset('sima/css/bootstrap.min.css')}}">
		<!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"-->
        <link rel="stylesheet" href="{{asset('sima/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{asset('sima/css/owl.carousel.css')}}">
        <link rel="stylesheet" href="{{asset('sima/css/responsive.css')}}">
		<link rel="stylesheet" href="{{asset('sima/css/style.css')}}">
		 <link rel="stylesheet" href="{{asset("plugins/fontawesome-free/css/all.min.css")}}">
		 

    </head>
<body>
		 <!-- start preloader -->
        <div id="loader-wrapper">
            <div class="logo"></div>
            <div id="loader">
            </div>
        </div>
        <!--end preloader -->
      
		
		
<!-- Start Header Section -->
<header class="navbar fondo-azul navbar-fixed-top">
	
		<div class="row">
			<!--div class="col-lg-3 col-md-3 col-sm-3">
				
			</div-->
						
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="lft_hd" style="position:fixed;top:0px">
				<a href="index.html"><img src="imagenes/logotipo1.png" alt="" width="80" height="15"/></a>
			</div>
				<div class="rgt_hd">					
					<div class="main_menu">
						<nav id="nav_menu">

							<button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							</button>	
						<div id="navbar">
							<ul>
								<li><a class="page-scroll" href="#slider_sec"><i class="fas fa-home"></i></a></li> 
								<li><a class="page-scroll" href="#pr_sec">Servicios</a></li>
								<li><a class="page-scroll" href="#ctn_sec">Contactos</a></li>
								<li><a class="page-scroll" href="#abt_sec">Nosotros</a></li>

								@if (Route::has('login'))
										@auth
											<li><a class="page-scroll" href="{{ url('/home') }}">Sistema</a></li>
										@else
											<li><a class="btn btn-secundary" href="{{ route('login') }}">Login</a></li>
											@if (Route::has('register'))
												<li><a class="btn btn-secundary text-white" href="{{ route('register') }}">Registrar</a></li>
											@endif
										@endauth
									
								@endif
							</ul>
						</div>		
						</nav>			
					</div>					
						
				</div>
			</div>	
		</div>	
	
</header>
<!-- End Header Section -->

<!-- start slider Section -->
<section id="slider_sec">
	
		<div class="row">
			<div class="slider">
					<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
				  <!-- Indicators -->
				  <ol class="carousel-indicators">
					<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
					<li data-target="#carousel-example-generic" data-slide-to="1"></li>
					<li data-target="#carousel-example-generic" data-slide-to="2"></li>
					<li data-target="#carousel-example-generic" data-slide-to="3"></li>
					<li data-target="#carousel-example-generic" data-slide-to="4"></li>
					<li data-target="#carousel-example-generic" data-slide-to="5"></li>
					<li data-target="#carousel-example-generic" data-slide-to="6"></li>
					
				  </ol>

				  <!-- Wrapper for slides -->
				  <div class="carousel-inner" role="listbox">
					<div class="item active">
						<div class="wrap_caption">
						  <div class="caption_carousel">
							<h1 class="display-1">Regístrate gratis</h1>
							<p>Destácate en tu rubro</p>
							</div>						
						</div>
					</div> 
					<div class="item">
						<div class="wrap_caption">
						  <div class="caption_carousel">
							<h1 class="display-1">Tus clientes</h1>
							<p>Tus clientes potenciales te están buscando tus productos o servicios</p>
						  </div>						
						</div>
					</div>					
					<div class="item">
						<div class="wrap_caption">
						  <div class="caption_carousel">
							<h1 class="display-1">Quieres Vender o Comprar</h1>
							<p>ENCUENTRA LO QUE NECESITAS EN UN SOLO LUGAR</p>
						  </div>						
						</div>
					</div>					
					<div class="item ">
						<div class="wrap_caption">
						  <div class="caption_carousel">
							<h1 class="display-1">Registra lo que vendes</h1>
							<p>ALGUEN REQUIRE TU PRODUCTO O SERVICIO</p>
						  </div>						
						</div>
					</div>
					<div class="item">
						<div class="wrap_caption">
						  <div class="caption_carousel">
							<h1 class="display-1">Ofrece tus productos en tu zona</h1>
							<p>Vende y compra en tu zona</p>
						  </div>						
						</div>
					</div>
					<div class="item">
						<div class="wrap_caption">
						  <div class="caption_carousel">
							<h1 class="display-1">Empieza a vender digitalmente</h1>
							<p>No te quedes atras...</p>
						  </div>						
						</div>
					</div>			
				  </div>

				  <!-- Controls -->
				  <a class="left left_crousel_btn" href="#carousel-example-generic" role="button" data-slide="prev">
					<i class="fa fa-angle-left"></i>
					<span class="sr-only">Aterior</span>
				  </a>
				  <a class="right right_crousel_btn" href="#carousel-example-generic" role="button" data-slide="next">
					<i class="fa fa-angle-right"></i>
					<span class="sr-only">Siguiente</span>
				  </a>
				</div>
			</div>	
		</div>			
		
</section>
<!-- End slider Section -->

<!-- start about Section -->
<section id="abt_sec">
	<div class="coitainer">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs12 ">
				<div class="title_sec">
					<h1>NOSOTROS</h1>
					<h2>Foconcito</h2>
					
				</div>			
			</div>		
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs12 ">
				<div class="abt">
					<p>	<strong>Foconcito </strong> es una agencia de publicidad digital con sede en Santa Cruz de la Sierra, Bolivia.
					   	<strong>Foconcito</strong> es una agencia digital independiente, no tradicional, cuya existencia tiene como fin ayudar a las marcas a conectarse con su público a través de una comprensión profunda de la cultura y el comportamiento.
					   	Nuestra intención es acercar las mejores prácticas en marketing moderno hacia marcas de todos los tamaños, minimizando la estructura usual de un departamento de mercadeo tradicional.

						Producimos proyectos innovadores en colaboración con los mejores talentos creativos.
						<strong>Foconcito</strong> fue creada por <strong>David Eduardo Flores Beltrán</strong>Julio 2020</p>
				</div>
			</div>			
		</div>
	</div>
</section>
<!-- End About Section -->

<!-- start Counting section-->
<section id="counting_sec fondo-azul">
<div class="container">
	<div class="row">	
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs12 ">
			<div class="title_sec">
				<h1>FOCONCITO EN NUMEROS</h1>
				<h2>GENERAMOS VENTAS TODOS LOS DIAS</h2>
			</div>			
		</div>	
		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
			<div class="counting_sl">
			<i class="fas fa-shopping-cart"></i>
			<h2 class="counter">1145454</h2>
			<h4>Ventas Digitales</h4>	
			</div>
		</div>			
		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
			<div class="counting_sl">
			<i class="fas fa-comment-dollar"></i>
			<h2 class="counter">1522542</h2>
			<h4>Chats Compra Venta</h4>	
			</div>
		</div>			
		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
			<div class="counting_sl">
			<i class="fas fa-people-carry"></i>
			<h2 class="counter">1120000</h2>
			<h4>Intension de Ventas</h4>	
			</div>
		</div>			
		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
			<div class="counting_sl">
			<i class="fas fa-desktop"></i>
			<h2 class="counter">150000</h2>
			<h4>Personas contratadas</h4>	
			</div>
		</div>										
	</div>					
</div>
</section>


<!-- start progress bar Section -->
<section id="skill_sec">
	<div class="fondo-blanco">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs12 ">
				<div class="title_sec">
					<h1>VENTAS EN LINEA ESTAN POR LAS NUBES</h1>
					<h2>NO TE QUEDES ATRAS </h2>
				</div>			
			</div>			
		  <div class="skills progress-bar1">		  
				<ul class="col-md-6 col-sm-12 col-xs-12 wow fadeInLeft">
					  <li class="progress">
							<div class="progress-bar" data-width="95">
								VENTAS EN PRODUCTOS EN LINEA  95%
							</div>
					  </li>
					  <li class="progress">
							<div class="progress-bar" data-width="85">
								VENTA SERVICIOS ONLINE   85%
							</div>
					  </li>
					  <li class="progress">
							<div class="progress-bar" data-width="50">
								  DESARROLLO DE SOFTWARE 50%
							</div>
					  </li>
					  <li class="progress">
							<div class="progress-bar" data-width="85">
								  TRANSACCIONES BANCARIAS 85%
							</div>
					  </li>
				</ul>
				<ul class="col-md-6 col-sm-12 col-xs-12 wow fadeInRight">
					  <li class="progress">
							<div class="progress-bar" data-width="95">
								  WHATSAPP 95%
							</div>
					  </li>
					  <li class="progress">
							<div class="progress-bar" data-width="90">
								  FACEBOOK 90%
							</div>
					  </li>
					  <li class="progress">
							<div class="progress-bar" data-width="40">
								  OTRAS REDES 40%
							</div>
					  </li>
					  <li class="progress">
							<div class="progress-bar" data-width="80">
								  PAGINAS WEB 80%
							</div>
					  </li>
				</ul>
		  </div>
                     
		
		</div>
	</div>
</section>
<!-- End progress bar Section -->




<!-- start Service Section -->
<section id="pr_sec">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs12 ">
				<div class="title_sec">
					<h1>¿Quieres hacer crecer tu negocio?</h1>
					<h2>Conoce nuestros servicios digitales</h2>
				</div>			
			</div>		
			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
				<div class="service">						
					<i class="fas fa-project-diagram"></i>
					<h2>ESTRATEGIA DIGITAL</h2>
					<div class="service_hoverly">
						<i class="fas fa-project-diagram"></i>
						<h2>ESTRATEGIA DIGITAL</h2>
						<p>Te ayudamos a incrementar las ventas de tu producto o servicio a través de una estrategia digital global seleccionando los canales digitales óptimos para tu negocio para conseguir mejores resultados.</p>
					</div>
				</div>
			</div>				
			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
				<div class="service">						
					<i class="fa fa-globe"></i>
					<h2>DISEÑO WEB</h2>
					<div class="service_hoverly">
						<i class="fa fa-globe"></i>
						<h2>DISEÑO WEB</h2>
						<p>Nos especializamos en crear páginas web que ofrecen experiencias novedosas, inteligentes y seguras. Tener un sitio web con un diseño atractivo, dinámico y de fácil interacción es fundamental para lograr que este sea la mejor herramienta para hacer crecer tu empresa.!</p>
					</div>
				</div>
			</div>				
			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
				<div class="service">						
					<i class="fas fa-mail-bulk"></i>
					<h2>SEO</h2>
					<div class="service_hoverly">
						<i class="fas fa-mail-bulk"></i>
						<h2>SEO</h2>
						<p>Nuestra misión es posicionarte en Google. Creamos estrategias y un plan de contenido único de calidad para lograr que tus clientes potenciales te encuentren en los primeros lugares al buscar tu producto o servicio en Google.!</p>
					</div>
				</div>
			</div>				
			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
				<div class="service">						
					<i class="fas fa-users"></i>
					<h2>REDES SOCIALES</h2>
					<div class="service_hoverly">
						<i class="fas fa-users"></i>
						<h2>REDES SOCIALES</h2>
						<p>Nuestra forma de comunicación y la manera como interactuamos ha cambiando a partir de las nuevas tecnologías. Sin duda, las redes sociales son un punto clave en el acercamiento de tu marca con el público. Nosotros podemos apoyarte para encontrar a tus clientes potenciales y hacer que conozcan tu marca e interactuen con ella.!</p>
					</div>
				</div>
			</div>			
		</div>
	</div>
</section>
<!-- End Service Section -->


<!-- start our team Section -->
<section id="tm_sec">
	
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs12 ">
				<div class="title_sec">
					<h1>INTEGRATE AL MUNDO DIGITAL</h1>
					<h2>REVISA QUE PUEDE ESTAR FALTANDOTE</h2>
				</div>			
			</div>		
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs12">
				<div class="all_team">
					<div class="sngl_team">						
						<img src="{{asset('sima/img/web.png')}}" alt="esto es el alt"/>
						<h3>SITIO<span>WEB</span></h3>
						<p>Al crear una página web no solamente debemos pensar en tener presencia en internet, si no en reflejar la esencia de la marca</p>								
					</div>					
					<div class="sngl_team">						
						<img src="{{asset('sima/img/posicionamiento.png')}}" alt="esto es el alt"/>
						<h3>POSICIONAMIENTO<span>WEB </span></h3>
						<p>Planificamos la mejor estrategia para que tus clientes te encuentren entre los primeros resultados en Google.</p>						
					</div>				
					<div class="sngl_team">						
						<img src="{{asset('sima/img/redes.png')}}" alt="esto es el alt"/>
						<h3> REDES <span>   SOCIALES   </span></h3>
						<p>Redes Sociales
							Las redes sociales han cambiado la manera en la que interactúan los usuarios así como la comunicación. El secreto del éxito para todas las empresas es empezar por segmentar el tipo de público al que quieren llegar.</p>						
					</div>				
					<div class="sngl_team">						
						<img src="{{asset('sima/img/mail.png')}}" alt="esto es el alt"/>	
						<h3>E-Mail<span> Automation </span></h3>
						<p>Creación de campañas de boletines con análisis del comportamiento de los suscriptores. Mantenemos a los usuarios informados de las últimas noticias de tu negocio</p>						
					</div>		
					
					<div class="sngl_team">						
						<img src="{{asset('sima/img/mail.png')}}" alt="esto es el alt"/>	
						<h3>Identidad<span> Coporativa </span></h3>
						<p>Desarrollamos la identidad corporativa de las marcas, trabajamos en la imagen de sus productos, instalaciones, elementos de comunicación, tecnología, etc.</p>						
					</div>

					<div class="sngl_team">						
						<img src="{{asset('sima/img/seo.png')}}" alt=""/>	
						<h3> SEM y  <span>SEO</span></h3>
						<p>El SEM es el conjunto de técnicas de marketing orientadas a ganar visibilidad en los motores de búsqueda.</p>						
					</div>					
					<div class="sngl_team">						
						<img src="{{asset('sima/img/movil.png')}}" alt=""/>	
						<h3>Marketing <span> Móvil </span></h3>
						<p>En el entorno móvil, tanto los sitios web como las aplicaciones optimizadas para estos dispositivos juegan un papel crucial.</p>						
					</div>				
					<div class="sngl_team">						
						<img src="{{asset('sima/img/contenido.png')}}" alt=""/>	
						<h3> Marketing de <span> Contenidos </span></h3>
						<p>El Marketing de Contenidos es un elemento del Marketing Digital cuyo enfoque es crear, publicar y distribuir contenido, que le permita a un negocio formar parte de la conversación en Internet.</p>						
					</div>
					<div class="sngl_team">						
						<img src="{{asset('sima/img/contenido.png')}}" alt=""/>	
						<h3> Registra tu  <span> Empresa en Google Maps </span></h3>
						<p>El Marketing de Contenidos es un elemento del Marketing Digital cuyo enfoque es crear, publicar y distribuir contenido, que le permita a un negocio formar parte de la conversación en Internet.</p>						
					</div>																
				</div>			
			</div>
		</div>
	
</section>
<!-- End our team Section -->

<!-- start our teastimonial Section 
<section id="tstm_sec">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="all_tstm">
					
				<div class="clnt_tstm">
					<div class="sngl_tstm">
						<i class="fa fa-quote-right"></i>
						<h3>what people say?</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur sequi accusamus voluptatum rem itaque alias deleniti nostrum aperiam fugiat voluptates debitis praesentium incidunt accusantium distinctio,</p>
						<h6>- jhon deo</h6>					
					</div>
				</div>						
				
				<div class="clnt_tstm">
					<div class="sngl_tstm">
						<i class="fa fa-quote-right"></i>
						<h3>Clien Design</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur sequi accusamus voluptatum rem itaque alias deleniti nostrum aperiam fugiat voluptates debitis praesentium incidunt accusantium distinctio,</p>
						<h6>- shura deo</h6>					
					</div>
				</div>				
				<div class="clnt_tstm">
					<div class="sngl_tstm">
						<i class="fa fa-quote-right"></i>
						<h3>Awesome Support SIMA</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur sequi accusamus voluptatum rem itaque alias deleniti nostrum aperiam fugiat voluptates debitis praesentium incidunt accusantium distinctio,</p>
						<h6>- kumara deo</h6>					
					</div>
				</div>				
				<div class="clnt_tstm">
					<div class="sngl_tstm">
						<i class="fa fa-quote-right"></i>
						<h3>Theme Feature great</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur sequi accusamus voluptatum rem itaque alias deleniti nostrum aperiam fugiat voluptates debitis praesentium incidunt accusantium distinctio,</p>
						<h6>- dhera deo</h6>					
					</div>
				</div>				
				<div class="clnt_tstm">
					<div class="sngl_tstm">
						<i class="fa fa-quote-right"></i>
						<h3>Non conflict</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur sequi accusamus voluptatum rem itaque alias deleniti nostrum aperiam fugiat voluptates debitis praesentium incidunt accusantium distinctio,</p>
						<h6>- jhon deo</h6>					
					</div>
				</div>	
					
				</div>
			</div>	
		</div>
	</div>
</section>
 End our teastimonial Section -->

<!-- start pricing Section -->
{{--section id="pricing_sec">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs12 ">
				<div class="title_sec">
					<h1>COSTOS SOLIDARIOS </h1>
					<h2>Vajamos los precios por la pandemia mundial</h2>
				</div>			
			</div>		
			<div class="col-lg-4 col-md-4 col-sm-12">
				<div class="sngl_pricing">											
					<h2 class="title_bg_1">Básico</h2>
					<h3><span class="currency"><del>Bs. 40</del></span>Bs. 34<span class="monuth">/Mes</span></h3>
					<ul>
						<li>UN MES con acceso a version PRO </li>
						<li>Búsqueda de empresas ILIMITADO</li>
						<li>Generador de contactos </li>
						<li>Mensajes Segmentados</li>
						<li>Y mucho Mas......</li>
						<li><a href="{{route('register')}}" class="btn pricing_btn">Quiero</a></li>	
					</ul>		
				</div>
			</div>			
			<div class="col-lg-4 col-md-4 col-sm-12">
				<div class="sngl_pricing">											
					<h2 class="title_bg_2">Standard</h2>
					<h3><span class="currency"> <del>Bs. 204</del> Bs.</span>150<span class="monuth">/Medio Año</span></h3>
					<ul>
						<li>MEDIO AÑO con acceso a version PRO </li>
						<li>Búsqueda de empresas ILIMITADO</li>
						<li>Generador de contactos </li>
						<li>Mensajes Segmentados</li>
						<li>Y mucho Mas......</li>
						<li><a href="{{route('register')}}" class="btn pricing_btn">Quiero</a></li>
					</ul>		
				</div>
			</div>			
			<div class="col-lg-4 col-md-4 col-sm-12">
				<div class="sngl_pricing">											
					<h2 class="title_bg_3">Extendedido</h2>
					<h3><span class="currency"><del>Bs. 350</del> Bs. </span>250<span class="monuth">/Anual</span></h3>
					<ul>
						<li>UNA AÑO con acceso a version PRO </li>
						<li>Búsqueda de empresas ILIMITADO</li>
						<li>Generador de contactos </li>
						<li>Mensajes Segmentados</li>
						<li>Y mucho Mas......</li>
						<li><a href="{{route('register')}}" class="btn pricing_btn">Quiero</a></li>
					</ul>		
				</div>
			</div>	
		</div>
	</div>
</section>--}}

<!-- End pricing Section -->


<!-- start Happy Client Section -->
<!--<section id="clt_sec">
	<div class="container">	
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs12 ">
				<div class="title_sec">
					<h1>Our Happy Clients</h1>
					<h2>WE’RE BRANDING & DIGITAL STUDIO FROM VIET NAM</h2>
				</div>			
			</div>		
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs12">
				<div class="al_clt">						
					<div class="sngl_clt">
						<a href=""><img src="http://showwp.com/demos/porton/default/upload/client_03.png" alt=""/></a>
					</div>				
					<div class="sngl_clt">
						<a href=""><img src="http://showwp.com/demos/porton/default/upload/client_03.png" alt=""/></a>
					</div>				
					<div class="sngl_clt">
						<a href=""><img src="http://showwp.com/demos/porton/default/upload/client_04.png" alt=""/></a>
					</div>				
					<div class="sngl_clt">
						<a href=""><img src="http://showwp.com/demos/porton/default/upload/client_05.png" alt=""/></a>
					</div>				
					<div class="sngl_clt">
						<a href=""><img src="http://showwp.com/demos/porton/default/upload/client_01.png" alt=""/></a>
					</div>					
					<div class="sngl_clt">
						<a href=""><img src="http://showwp.com/demos/porton/default/upload/client_03.png" alt=""/></a>
					</div>				
					<div class="sngl_clt">
						<a href=""><img src="http://showwp.com/demos/porton/default/upload/client_04.png" alt=""/></a>
					</div>				
					<div class="sngl_clt">
						<a href=""><img src="http://showwp.com/demos/porton/default/upload/client_05.png" alt=""/></a>
					</div>				
					<div class="sngl_clt">
						<a href=""><img src="http://showwp.com/demos/porton/default/upload/client_01.png" alt=""/></a>
					</div>					

				</div>
			</div>	
		</div>
	</div>
</section-->
<!-- End Happy Client  Section -->

<!-- start contact us Section -->


<section id="ctn_sec">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs12 ">
				<div class="title_sec">
					<h1>Envianos un mensaje</h1>
					<h2>NOS GUSTRIA ESCUCHARTE </h2>
				</div>			
			</div>
		
			<div class="col-lg-6 col-md-6 col-sm-6" id="formulario"> 
				<div class="form_info">
						<form id="contact-form"  class="contact" name="contact-form" method="post" onsubmit="return enviar();">
						@csrf
						<div class="form-group">
							<input type="text" value="" id="nombre" name="nombre" class="form-control name-field @error('name') is-invalid @enderror"  placeholder="Tu nombre">
							@error('nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
						</div>
						


						<div class="form-group">
							<select class="form-control" name="prefijo" id="">
											 <option value=''>Elija prefijo de País</option>
											<option value="591">591(Bolivia)</option>
											<option value='1907'>1907(Alaska)</option>	
								 			<option value='1907'>1907(Alaska)</option>
                                            <option value='355'>355(Albania)</option>
                                            <option value='49'>49(Alemania)</option>
                                            <option value='376'>376(Andorra)</option>
                                            <option value='244'>244(Angola)</option>
                                            <option value='966'>966(Arabia Saudí)</option>
                                            <option value='213'>213(Argelia)</option>
                                            <option value='54'>54(Argentina)</option>
                                            <option value='374'>374(Armenia)</option>
                                            <option value='61'>61(Australia)</option>
                                            <option value='43'>43(Austria)</option>
                                            <option value='973'>973(Bahreim)</option>
                                            <option value='880'>880(Bangladesh)</option>
                                            <option value='32'>32(Bélgica)</option>
                                            <option value='387'>387(Bosnia)</option>
                                            <option value='55'>55(Brasil)</option>
                                            <option value="591">591(Bolivia)</option>
                                            <option value='359'>359(Bulgaria)</option>
                                            <option value='238'>238(Cabo Verde)</option>
                                            <option value='855'>855(Camboya)</option>
                                            <option value='237'>237(Camerún)</option>
                                            <option value='1'>1(Canadá)</option>
                                            <option value='236'>236(Centroafricana, Rep.)</option>
                                            <option value='420'>420(Checa, Rep.)</option>
                                            <option value='56'>56(Chile)</option>
                                            <option value='86'>86(China)</option>
                                            <option value='357'>357(Chipre)</option>
                                            <option value='57'>57(Colombia)</option>
                                            <option value='242'>242(Congo, Rep. del)</option>
                                            <option value='243'>243(Congo, Rep. Democ.)</option>
                                            <option value='82'>82(Corea, Rep.)</option>
                                            <option value='850'>850(Corea, Rep. Democ.)</option>
                                            <option value='225'>225(Costa de Marfil)</option>
                                            <option value='506'>506(Costa Rica)</option>
                                            <option value='385'>385(Croacia)</option>
                                            <option value='53'>53(Cuba)</option>
                                            <option value='45'>45(Dinamarca)</option>
                                            <option value='1809'>1809(Dominicana, Rep.)</option>
                                            <option value='593'>593(Ecuador)</option>
                                            <option value='20'>20(Egipto)</option>
                                            <option value='503'>503(El Salvador)</option>
                                            <option value='971'>971(Emiratos Árabes Unidos)</option>
                                            <option value='421'>421(Eslovaca, Rep.)</option>
                                            <option value='386'>386(Eslovenia)</option>
                                            <option value='34'>34(España)</option>
                                            <option value='1'>1(Estados Unidos)</option>
                                            <option value='372'>372(Estonia)</option>
                                            <option value='251'>251(Etiopía)</option>
                                            <option value='63'>63(Filipinas)</option>
                                            <option value='358'>358(Finlandia)</option>
                                            <option value='33'>33(Francia)</option>
                                            <option value='9567'>9567(Gibraltar)</option>
                                            <option value='30'>30(Grecia)</option>
                                            <option value='299'>299(Groenlandia)</option>
                                            <option value='502'>502(Guatemala)</option>
                                            <option value='240'>240(Guinea Ecuatorial)</option>
                                            <option value='509'>509(Haití)</option>
                                            <option value='1808'>1808(Hawai)</option>
                                            <option value='504'>504(Honduras)</option>
                                            <option value='852'>852(Hong Kong)</option>
                                            <option value='36'>36(Hungría)</option>
                                            <option value='91'>91(India)</option>
                                            <option value='62'>62(Indonesia)</option>
                                            <option value='964'>964(Irak)</option>
                                            <option value='98'>98(Irán)</option>
                                            <option value='353'>353(Irlanda)</option>
                                            <option value='354'>354(Islandia)</option>
                                            <option value='972'>972(Israel)</option>
                                            <option value='39'>39(Italia)</option>
                                            <option value='1876'>1876(Jamaica)</option>
                                            <option value='81'>81(Japón)</option>
                                            <option value='962'>962(Jordania)</option>
                                            <option value='254'>254(Kenia)</option>
                                            <option value='965'>965(Kuwait)</option>
                                            <option value='856'>856(Laos)</option>
                                            <option value='371'>371(Letonia)</option>
                                            <option value='961'>961(Líbano)</option>
                                            <option value='231'>231(Liberia)</option>
                                            <option value='218'>218(Libia)</option>
                                            <option value='41'>41(Liechtenstein)</option>
                                            <option value='370'>370(Lituania)</option>
                                            <option value='352'>352(Luxemburgo)</option>
							</select>
						</div>

						
							
						<div class="form-group">
							<input type="number" value="" id="telefono" name="telefono" class="form-control"  placeholder="Tu teléfono con whatsapp">
						</div>

						<div class="form-group">
							<input type="email" value="" id="email" name="email" class="form-control mail-field"  placeholder="Tu correo electronico">
						</div> 
						<div class="form-group">
							<textarea name="mensaje" id="mensaje"  class="form-control" rows="8" placeholder="Escribe aquí tu mensaje"></textarea>
						</div> 
						<div class="form-group text-center">
							<button type="submit" class="btn-lg btn turqueza texto-claro">Enviar Mensaje</button>
						</div>
					</form> 
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6">
				<div class="cnt_info">
					<ul>
						<li><i class="fa fa-phone fa-2x"></i><p> </p> (591) 3-219050</li>
						<li><i class="fa fa-envelope-open-text fa-2x"></i><p> </p> contactos@foconcito.com</li>
						<li><i class="fa fa-phone fa-2x"></i><p> </p> 591-75553338    591-71039910</li>
						<li><i class="fab fa-facebook fa-2x"></i><p></p> @foconcito</li>
						<li><i class="fas fa-map-marker-alt fa-2x"></i><p></p> Calle 16 #9 Villa 1 de Mayo Santa Cruz Bolivia</li>
						
					</ul>
					
				</div>
			
			</div>

		</div>
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs12 ">
				<div class="title_sec">
					<a class="btn fondo-azul text-yellow" href="http://bit.ly/institutoite" > <i class="fab fa-whatsapp">Escríbanos</i> </a> 
				</div>
			</div>	
		</div>
	</div>
</section>
<!-- End contact us  Section -->

<!-- start located map Section -->
<section id="ltd_map_sec">
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<div class="map">						
			<h1>NUESTRA UBICACION FISICA</h1><a href="#slidingDiv" class="show_hide" rel="#slidingDiv"><i class="fa fa-angle-up"></i></a>
			<div id="slidingDiv">
				<div class="map_area">
					<div id="googleMap" style="width:100%;height:300px;"></div>
				</div>
			</div>	
			</div>
		</div>
	</div>
</div>
</section>

<!-- End located map  Section -->
<!-- start footer Section -->
<footer id="ft_sec">
	<div class="fondo-blanco">
		<div class="row">
			<div class="col-lg-12">
				
				<ul class="copy_right">
					<li>&copy;Foconcito 2020</li>
					<li>developer by DAVID EDUARDO FLORES BELTRAN</li>
				</ul>					
			</div>	
		</div>
	</div>
</footer>
<!-- End footer Section -->

<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
        <script src="{{asset('sima/js/vendor/jquery-1.11.3.min.js')}}"></script>

<script src="{{asset('sima/js/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('sima/js/bootstrap.min.js')}}"></script>

<script src="{{asset('sima/js/jquery-ui.js')}}"></script>
<script src="{{asset('sima/js/appear.js')}}"></script>
<script src="{{asset('sima/js/jquery.counterup.min.js')}}"></script>
<script src="{{asset('sima/js/waypoints.min.js')}}"></script>
<script src="{{asset('sima/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('sima/js/showHide.js')}}"></script>
<script src="{{asset('sima/js/jquery.nicescroll.min.js')}}"></script>
<script src="{{asset('sima/js/jquery.easing.min.js')}}"></script>
<script src="{{asset('sima/js/scrolling-nav.js')}}"></script>
<script src="{{asset('sima/js/plugins.js')}}"></script>
 <!-- SweetAlert2 JS -->
  <script src="{{asset("plugins/sweetalert2/sweetalert2.js")}}"></script>
  
<!-- Google Map js -->
		<!--script src="https://maps.googleapis.com/maps/api/js"></script
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDjSpxe_yY4smn1Z2lNWXOtQPrFUAjK0OU&callback=initialize"></script-->
		<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBDaeWicvigtP9xPv919E-RNoxfvC-Hqik&callback=initialize"
  			type="text/javascript"></script>
		<script>
			function initialize() {
			  var mapOptions = {
				zoom: 14, 
				scrollwheel: false,
				center:{lat:-17.802041,lng:-63.136210}// new google.maps.LatLng(-17.802003,-63.136219)
			  };
			  var map = new google.maps.Map(document.getElementById('googleMap'),
				  mapOptions);
			  var marker = new google.maps.Marker({
				position:{lat:-17.802041,lng:-63.136210},
				animation:google.maps.Animation.BOUNCE,
				icon: 'sima/img/map-marker.png',
				map: map
			  });
			}
			google.maps.event.addDomListener(window, 'load', initialize);
		</script>
<script src="{{asset('sima/js/main.js')}}"></script>


<script src="{{asset('sima/showHide.js')}}" type="text/javascript"></script>

<script type="text/javascript">

$(document).ready(function(){
   $('.show_hide').showHide({			 
		speed: 1000,  // speed you want the toggle to happen	
		easing: '',  // the animation effect you want. Remove this line if you dont want an effect and if you haven't included jQuery UI
		changeText: 1, // if you dont want the button text to change, set this to 0
		showText: 'View',// the button text to show when a div is closed
		hideText: 'Close' // the button text to show when a div is open
					 
	}); 
	


});

function enviar(){	
	var nombre=document.getElementById("nombre").value;
	var telefono=document.getElementById("telefono").value;
	var email=document.getElementById("email").value;
	var mensaje=document.getElementById("mensaje").value;
	var datos=$("#contact-form");
	

	//var datos="nombre="+nombre+"&telefono="+telefono+"&email="+email+"&mensaje="+mensaje;

	console.log(datos);
	
		$.ajax({
			type:"POST",
			url:"{{route('contacto_guardar')}}",
			data:datos.serialize(),
			success:function(data){	
					$("#formulario").find('#alert').remove();
					document.getElementById("nombre").value="";
					document.getElementById("telefono").value="";
					document.getElementById("email").value="";
					document.getElementById("mensaje").value="";
					$(".form_info").before('<div class="alert alert-success alert-dismissible" id="alert" data-auto-dismiss="1500">'+
											'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'+
											'<h5 class="text-success"><i class="icon fas fa-check text-success"></i> Mensaje Foconcito </h5>'+
												'<div class="alert alert-success">'+
													'<ul>'+
															'<p> Gracias por contactarnos: Su mensaje ha sido enviado correctamente </p>'+
													'</ul>'+
												'</div>'+
										'</div>');
					$('#alert').fadeIn();
						setTimeout(function() {
					$("#alert").fadeOut();  
					},3000);					
					
					const Toast = Swal.mixin({
                    toast: true,
                    position: 'bottom-start',
                    showConfirmButton: true,
                    timer: 4000,
                    timerProgressBar: true,
                    onOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                	})
                    Toast.fire({
                    icon: 'success',
                    title: 'Su Mensaje ha sido enviado correctamente'
                    })
                

			},
			error:function(){
				$("#alert").remove();
				//$(".form_info").append("<div id='temporal' class='alert alert-danger' role='alert'>"+"Error: Favor llena todos los campos"+"</div>");*/
					$(".form_info").before('<div class="alert alert-danger alert-dismissible" id="alert" data-auto-dismiss="1500">'+
											'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'+
											'<h5 class="text-danger"><i class="fas fa-times"></i> Mensaje Foconcito </h5>'+
												'<div class="alert alert-danger">'+
													'<ul>'+
															'<p> Error: Todos los campos son obligatorios </p>'+
													'</ul>'+
												'</div>'+
										'</div>');
					$('#alert').fadeIn();
						setTimeout(function() {
					$("#alert").fadeOut();  

					},3000);					
					
				 const Toast = Swal.mixin({
                    toast: true,
                    position: 'bottom-start',
                    showConfirmButton: false,
                    timer: 4500,
                    timerProgressBar: true,
                    onOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                	})
                    Toast.fire({
                    icon: 'error',
                    title: 'Su mensaje no pudo enviarse los campos son obligatorios'
                    })
			}		
	});
	
	return false;
}
 
</script>
<script>
    jQuery(document).ready(function( $ ) {
        $('.counter').counterUp({
            delay: 10,
            time: 1000
        });
    });
</script>

<script>

  //Hide Overflow of Body on DOM Ready //
$(document).ready(function(){
    $("body").css("overflow", "hidden");

});

// Show Overflow of Body when Everything has Loaded 
$(window).load(function(){
    $("body").css("overflow", "visible");        
    var nice=$('html').niceScroll({
	cursorborder:"5",
	cursorcolor:"#00AFF0",
	cursorwidth:"3px",
	boxzoom:true, 
	autohidemode:true
	});

});

</script>



    </body>
</html>


<!--

	

-->