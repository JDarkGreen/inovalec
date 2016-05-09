<?php

include("includes/conexion.php");
include("includes/funciones.php");

//CARPETA DE IMAGENES
define("IMAGES","images");

$cn = Conexion();

 //  funcion para mostrar las promociones.
$rpta_listar_promocion = listar_promociones(1);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<!-- Importar iconos -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<!-- Materialize -->
<link rel="stylesheet" href="css/materialize/css/materialize.min.css" />
<!-- Reset -->
<link rel="stylesheet" type="text/css" href="css/reset.css" />
<!-- examples -->
<link rel="stylesheet" type="text/css" href="css/examples.css" />
<!-- Simplyscroll -->
<link rel="stylesheet" type="text/css" href="css/jquery.simplyscroll.css" />
<!-- Cubeslider -->
<link rel="stylesheet" type="text/css" href="css/cubeslider/cubeslider.css" />
<!-- owl-->
<link rel="stylesheet" type="text/css" href="css/owlcarousel/owl.carousel.css" />
<!-- My Style -->
<link rel="stylesheet" href="css/master.css" />

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>

<!-- jquery no conflict -->
<script type="text/javascript"> var j = jQuery.noConflict(); </script>

<!-- jquery carousel -->
<script type="text/javascript" src="js/jquery.simplyscroll.js"></script>
<script type="text/javascript" src="js/jquery.carouFredSel-6.0.5-packed.js"></script>
<script type="text/javascript" src="js/home.js"></script>
<script type="text/javascript" src="js/menu.js"></script>
<script type="text/javascript">
	j(document).on('ready', function($) {
   		j("#m1").addClass("activamenuhome");    
   	});
</script>


<title><?= ( isset($title) && !empty($title) ) ? $title : '' ?></title>
</head>

<body class="body_texture">
	
	<!-- Incluir banner superior header -->
	<header class="mainHeader">

		<!-- Banner Cabecera-->
		<figure class="mainHeader__img-banner">
    		<img src="<?= IMAGES ?>/banner/inicio_cabecera.jpg" class="responsive-img" />

        <!-- Logo Principal -->
        <a class="main-logo hide-on-small-only" href="index.php">
          <img src="images/inicio_logo.png" alt="logo-principal" class="responsive-img" />
        </a><!-- /.main-logo -->
  	</figure> <!-- /.mainHeader__img-banner -->

    <!-- Seccion solo visible en mobile -->
    <section class="hide-on-med-and-up">
      <!-- Icono abre menu -->
      <a href="#" data-activates="slide-out" class="mainHeader__btn-collapse button-collapse left"><i class="material-icons medium">view_module</i></a><!-- /icono -->
      <h1 class="logo brand-logo">
        <a href="#" class="center-block"><img src="images/inicio_logo_blanco.png" alt="logo inovalec" class="responsive-img" /></a>
      </h1><!-- /.logo -->    
      <!-- Limpiar floats --><div class="clearfix"></div>      
    </section><!-- /.show-on-small -->

  	<!-- Menu de Navegacion  -->
  	<nav class="mainNav">
  		<div class="container hide-on-small-only">
  			<ul id="nav-mobile" class="menu center">
					<li><a class="<?= $active == 1 ? 'active' : '' ?> waves-effect" href="index.php">inicio</a></li>
  				<li><a class="<?= $active == 2 ? 'active' : '' ?> waves-effect" href="inovalec-electric-historia-empresa-lima-peru.php">empresa</a></li>
  				<li><a class="<?= $active == 3 ? 'active' : '' ?> waves-effect js-no-link" href="#" >productos</a>
            <!-- Submenu -->
            <ul class="submenu">
              <li><a class="<?= $subactive == 3.1? 'active' : '' ?> waves-effect" href="marcas-inovalec-electric-lima-peru.php#marca">por marca</a></li><li>
              <a class="<?= $subactive == 3.2 ? 'active' : '' ?> waves-effect" href="linea-inovalec-electric-lima-peru.php#lineas">por línea</a></li>
            </ul><!-- /.submenu -->
          </li>
  				<li><a class="<?= $active == 4 ? 'active' : '' ?> waves-effect" href="servicios-inovalec-electric-lima-peru.php">servicios</a></li>
  				<li><a class="<?= $active == 5 ? 'active' : '' ?> waves-effect" href="nuestras-inovalec-jbg-electric-lima-peru.php">marcas</a></li>
          <li><a class="<?= $active == 6 ? 'active' : '' ?> waves-effect" href="venta-en-linea-inovalec-electric-lima-peru.php">venta en línea</a></li>
  				<li><a class="<?= $active == 7 ? 'active' : '' ?> waves-effect" href="promociones-inovalec-electric-lima-peru.php">promociones</a></li>
  				<li><a class="<?= $active == 8 ? 'active' : '' ?> waves-effect" href="contactenos-inovalec-electric-lima-peru.php">contáctenos</a></li>
  			</ul>
	  	</div>
    </nav><!-- /mainNav -->

    <!-- Menu de navegacion solo en mobiles -->
    <nav id="slide-out" class="mainNav--small side-nav text-uppercase">
      <h1 class="logo">
        <a href="#" class="center-block"><img src="images/inicio_logo.png" alt="logo inovalec" class="responsive-img" /></a>
      </h1><!-- /.logo -->
      
      <!-- Lista -->
      <ul>
        <li><a class="waves-effect" href="">inicio</a></li>
        <li><a class="waves-effect" href="">empresa</a></li>
        <li><a class="waves-effect" href="">productos</a></li>
        <li><a class="waves-effect" href="">servicios</a></li>
        <li><a class="waves-effect" href="">marca de venta</a></li>
        <li><a class="waves-effect" href="">eventos</a></li>
        <li><a class="waves-effect" href="">contáctenos</a></li>       
      </ul><!-- /ul -->
    </nav><!-- /mainNav--small -->

	</header><!-- /.mainHeader -->
