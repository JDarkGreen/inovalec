<?php

include("includes/conexion.php");
include("includes/funciones.php");

$cn = Conexion();

$sql_seccion  = "SELECT e.*, cev.* FROM eventos e, contenido_eventos cev 
WHERE e.idcategoria = cev.idcategoria
AND cev.subcategoria = '".$_GET['subcategoria']."'
ORDER BY cev.idevento DESC";
$rpta_seccion = query($sql_seccion) or die(mysql_error());

	// mostrar el evento por defecto.

$sql_detalleseccion  = "SELECT e.*, cev.* FROM eventos e, contenido_eventos cev 
WHERE e.idcategoria = cev.idcategoria
AND cev.subcategoria = '".$_GET['subcategoria']."'
ORDER BY cev.idevento DESC";
$rpta_detalleseccion = query($sql_detalleseccion) or die(mysql_error());
$row_detalleseccion  = fetch_array($rpta_detalleseccion);	

	// contenido de la subcategoria.
$sql_contenidosubseccion   = "SELECT e.categoria as subcat FROM eventos e WHERE e.idcategoria='".$_GET['subcategoria']."'";
$rpta_contenidosubseccion  = query($sql_contenidosubseccion) or die(mysql_error());
$fila_contenidosubseccion  = fetch_array($rpta_contenidosubseccion);	

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="css/estilos.css" />
	<link rel="stylesheet" type="text/css" href="css/reset.css" />
	<link rel="stylesheet" type="text/css" href="css/jMyCarousel.css" />
	<link rel="stylesheet" type="text/css" href="css/jquery.simplyscroll.css" />
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<!-- jquery no conflict -->
	<script type="text/javascript">
		$.noConflict();
	</script>
	<!-- jquery carousel -->
	<script type="text/javascript" src="js/jquery.simplyscroll.js"></script>
	<script type="text/javascript">
		jQuery(function($) {
			jQuery("#scroller").simplyScroll({
				auto: true,
				speed: 3
			});
		});
	</script>
	<script type="text/javascript" src="js/jquery.carouFredSel-6.0.5-packed.js"></script>
	<script type="text/javascript" src="js/home.js"></script>
	<!--<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>-->
	<script type="text/javascript" src="js/menu.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			jQuery("#m7").addClass("activaeventos");
	// jQuery("#m1").removeClass("removehome");    
});

</script>
<!-- fecha y hora -->
<script type="text/javascript" src="js/fecha_hora.js"></script>
<!-- -->
<script type="text/javascript" src="js/swfobject2.js"></script>
<script type="text/javascript" src="js/scripts.js"></script>
<title>JBG ELECTRIC | Noticias y eventos de materiales instalaciones electricas industrial, automatizacion industrial, conductores electricos, equipo de media tension control y proteccion, equipos de seguridad y maniobra, ferreteria de electrificacion, iluminacion peru, instrumentos de medicion, linea conduit, materiales aislantes, materiales para instalaciones residenciales, pararrayos, sistema puesta tierra y afines, seguridad industrial lima peru, repuestos electricos lima peru, material construccion electricos,  productos por marcas 3m, lima abb abro aibar, bremas  celsa cirmarker lima, coel crc elcope lima, exosolda general electric indeco peru, kss legrand leviton peru, loctite lumnia mennekes peru, schneider electric siemens peru, talma ide termoweld lima, solera jsl santos peru dexson tecnoflex ls repuestos peru, tecnofil bticino orbis metal&a opalux hurricane lima peru</title>
</head>

<body onload="actualizaReloj()">
	<div id="contenido_bg">

		<div id="contenido" class="limpiar">

			<div id="header_bg">

				<?php
				include("includes/header2.php");

				?>
				<!-- header -->

				<?php
				include("includes/header.php");
				?>                

			</div><!-- header_bg -->

			<div id="cuerpo">

				<div id="banner"> </div>
				<!-- banner -->

				<div id="cuerpo_eventos">

					<h1 id="eventos"><?php echo $fila_contenidosubseccion[0]['subcat']; ?></h1>
					<div id="eventos2">
						<div id="bg-corned-1"></div>              
						<div id="lista_eventos">
							<ul>
								<?php
									$i = 1; $row_evento = fetch_array($rpta_seccion);
									foreach( $row_evento as $evento ) :
								?>
								<li>
									<a id="idx_<?= $i; ?>" href="javascript:void(0);" class="all" onclick="cargar_eventos('ver-detalle-evento.php?idevento=<?= $evento['idevento']; ?>');"><?= $evento['titulo_evento']; ?></a>
								</li>        
								<?php $i++; endforeach; ?>
						</ul>
					</div><!-- lista_eventos -->
					<div id="bg-corned-2"></div>
				</div>                  

				<div id="contenido_evento">
					<h2><?php echo $row_detalleseccion[0]['titulo_evento']; ?></h2>
					<?php echo $row_detalleseccion[0]['descripcion']; ?>      		
				</div>

			</div><!-- cuerpo_eventos -->

			<?php
			include("includes/lista-marcas.php");

			?>

		</div><!-- cuerpo -->

		<?php
		include("includes/footer.php");

		?>

	</div><!-- contenido -->



</div><!-- contenido_bg -->

</body>
<script type="text/javascript">

	var so = new SWFObject("swf/banner.swf","flores","950","383","9");
	so.addParam("wmode", "transparent");
	so.addParam("menu", "false");
	so.write("banner");

</script>
<script type="text/javascript">

	var so = new SWFObject("swf/logo.swf","miguelangoma","377","153","9");
	so.addParam("wmode", "transparent");
	so.addParam("menu", "false");
	so.write("header_logo");
</script>
</html>