<?php

	include("includes/conexion.php");
	include("includes/funciones.php");
	
	$cn = Conexion();
	
	// muestro el detalle del producto.
	$rpta_detalle_producto = mostrarDetalleProducto($_GET['producto']);
	$row_detalle_producto  = fetch_array($rpta_detalle_producto);
	
	$idseccion	    = $_GET['idseccion'];
	$idmarca		= $_GET['idmarca'];	
	$nom_marca      = $_GET['nom_marca'];
	$seccion		= $_GET['seccion'];
	$subseccion	    = $_GET['subseccion'];
	$subseccion1	= $_GET['subseccion'];		
	$subnivel 		= $_GET['subnivel'];	
	
	$sql_submarcas  = "SELECT p.*, s.*, m.*, s.seccion as subseccion FROM productos p, secciones s, marcas m
						WHERE p.idseccion = s.idseccion
						AND p.idmarca = m.idmarca
						AND p.idseccion = '".$idseccion."'
						AND p.idmarca = '".$idmarca."'";
	$rpta_submarcas = query($sql_submarcas) or die(mysql_error());
	$row_submarca   = fetch_array($rpta_submarcas);	
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/estilos.css" />
<link rel="stylesheet" type="text/css" href="css/reset.css" />
<link rel="stylesheet" type="text/css" href="css/examples.css" />
<link rel="stylesheet" type="text/css" href="css/examples_portada.css" />
<link rel="stylesheet" type="text/css" href="css/jquery.simplyscroll.css" />
<link rel="stylesheet" type="text/css" href="css/style_m.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/style_alt_m.css" media="screen" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<!-- jquery no conflict -->
<script type="text/javascript">
	$.noConflict();
</script>
<!-- jquery carousel -->
<script type="text/javascript" src="js/jMyCarousel.js"></script>
<script type="text/javascript">
	jQuery(function($) {
		jQuery("#scroller").simplyScroll({
			auto: true,
			speed: 3
		});
	});
</script>
<script type="text/javascript" src="js/menu.js"></script>
<script src="js/scripts_m.js" type="text/javascript"></script>
<script type="text/javascript">
jQuery(document).ready(function($) {
	jQuery("#m3").addClass("activaproductos");    
});

</script>
<!-- fecha y hora -->
<script type="text/javascript" src="js/fecha_hora.js"></script>
<!-- -->
<script type="text/javascript" src="js/swfobject2.js"></script>
<title>JBG ELECTRIC | Detalle del producto para equipos electricos Peru,  repuestos electricos,  productos por linea, materiales instalaciones electricas industrial, automatizacion industrial, conductores electricos, equipo de media tension control y proteccion, equipos de seguridad y maniobra, ferreteria de electrificacion, iluminacion peru, instrumentos de medicion, linea conduit, materiales aislantes, materiales para instalaciones residenciales, pararrayos, sistema puesta tierra y afines, seguridad industrial lima peru, repuestos electricos lima peru, material construccion electricos,  productos por marcas 3m, lima abb abro aibar, bremas  celsa cirmarker lima, coel crc elcope lima, exosolda general electric indeco peru, kss legrand leviton peru, loctite lumnia mennekes peru, schneider electric siemens peru, talma ide termoweld lima, solera jsl santos peru dexson tecnoflex ls repuestos peru, tecnofil bticino orbis metal&a opalux hurricane lima peru - <?php echo $row_detalle_producto['nombre_producto']; ?></title>
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
        	
            <div id="banner">
            	<img src="images/slides/banner-jbg-lima-peru.jpg" width="950" height="383" />
                
            </div><!-- banner -->
            
            <div id="contenido_productos">
            
              <div id="page-titulo" style="margin-top:15px;">
                 <h1 id="marca"> DETALLE DEL PRODUCTO</h1> 
                 <div id="form_buscar-1" style="margin-right: 12px;">
                    <form action="jbg-electric-resultados-busqueda-lima-peru.php" method="post" id="frmbuscar" name="frmbuscar">
                        <p style="padding-right:8px;">Buscar producto</p>
                        <p style="margin-top:10px;"><input type="text" value="" class="borde_texto" id="buscar" name="buscar"></p>   
                    </form>                    
                 </div>                  
              </div>
            <div id="detalle_producto">
              <div class="sidebar">
                <div class="sidebarPad" style="margin-left: 52px;">
                   <div id="sidebarMenu"><!-- #sidebarMenu -->
                      <div id="sidebarSwitcherContainer" class="center">
                         <input type="button" class="sidebarSwitcher sidebarMarcasBtn " value="LÍNEAS" title="lineas"/>
                         <input type="button" class="sidebarSwitcher sidebarLineasBtn sidebarSwitcherOff" value="MARCAS" title="marcas"/>
                      </div>
                      <div class="separator5"></div>
                      <div id="sidebarScrollable1" class="sidebarMenu">
                         <div id="oaScrollable">
                            <?php
                                $padre 		 = ($padre == null) ? 'IS NULL' : ' ' . $padre;
                                $sql_lineas  = "SELECT * FROM secciones WHERE idpadre ".$padre." ORDER BY seccion ASC";
                                $rpta_lineas = query($sql_lineas,$cn) or die(mysql_error());
                                                        
                            ?>
                            <ul>
                            <?php 
                                while($row_lineas = fetch_array($rpta_lineas))
                                {						
                            ?>                        
                               <li><a href="lista-lineas-subseccion.php?nom_marca=<?php echo $row_lineas['seccion']; ?>&subseccion=<?php echo $row_lineas['idseccion']; ?>" title="<?php echo $row_lineas['seccion']; ?>"> <?php echo ucwords(strtolower(recortar_texto_menu_detalle($row_lineas['seccion']))); ?></a></li>
                            <?php
                                }
                            ?>                           
                            </ul>
                         </div>                  
                      
    
                      </div>
                      <div id="sidebarScrollable" class="sidebarMenu hidden">
                         <ul>
                            <?php
                                $sql_marcas  = "SELECT * FROM marcas ORDER BY idmarca ASC";
                                $rpta_marcas = query($sql_marcas) or die(mysql_error());
                                
                                while($row_marcas = fetch_array($rpta_marcas))
                                {
                                
                            ?>
                            <li><a href="marcas-jbg-electric-lima-peru.php?marca=<?php echo $row_marcas['idmarca']; ?>&nom_marca=<?php echo $row_marcas['nombre_marca']; ?>" title="<?php echo $row_marcas['nombre_marca']; ?>"><?php echo ucfirst(strtoupper($row_marcas['nombre_marca'])); ?></a></li>
                            <?php
                                }
                            ?>                        
                         </ul>
                         
                      </div>
                   </div>
                   <!-- end of #sidebarMenu --> 
                   
                </div>
             </div>
             
             <div id="descripcion_producto">
                <h2><?php echo ucwords(strtolower($nom_marca)); ?> -> <?php echo ucwords(strtolower($seccion)); ?> -> <?php echo ucwords(strtolower($subseccion)); ?> -> <?php echo ucwords(strtolower($subnivel)); ?></h2>
                <div id="nombre_producto">
                    <?php echo ucwords(strtoupper($row_detalle_producto['nombre_producto'])); ?>
                </div>
                <div id="items_productos">
                    <div style="float:left; height:auto; width:356px;">
                        <p style="padding:18px;"><img src="images/marcas/<?php echo $row_detalle_producto['imagen_marca']; ?>" border="0" /></p>
                        <div style="float:left; height:auto; margin-bottom: 23px;">
                              <div style="float:left; height:anto; width:356px;">
                                <div class="cuadro-items">
                                    <div class="cuadro_bloque">
                                        <p>codigo</p>
                                    </div>
                                    <div class="cuadro-items-derecha">
                                        <?php
                                            if($row_detalle_producto['codigo_prod']=="")
                                            {
                                                echo '<p>--------</p>';
                                            }
                                            else
                                            {
                                        ?>
                                        <p><?php echo $row_detalle_producto['codigo_prod']; ?></p>
                                        <?php
                                            }
                                            
                                        ?>
                                    </div>
                                    
                                </div><!-- cuadro-items -->
                                
                                <div class="cuadro-items">
                                    <div class="cuadro_bloque">
                                        <p>modelo</p>
                                    </div>
                                    <div class="cuadro-items-derecha">
                                        <p><?php echo $row_detalle_producto['modelo']; ?></p>
                                    </div>                        
                                                        
                                </div><!-- cuadro-items -->
                                
                                <div class="cuadro-items">
                                    <div class="cuadro_bloque">
                                        <p>marca</p>
                                    </div>
                                    <div class="cuadro-items-derecha">
                                        <p><?php echo $row_detalle_producto['nombre_marca']; ?></p>
                                    </div>                        
                                                        
                                </div><!-- cuadro-items -->                                        
                              
                              </div>
                          </div>
                          
                    </div>
                    
                    <div style="float:left; height:auto; margin-top: 25px; margin-left: 21px; width:190px; text-align:center;">
                        <?php
                            if($row_detalle_producto['imagen']=="")
                            {
                                echo '';
                            }
                            else
                            {
                        ?>
                        <img src="images/productos/detalle/<?php echo $row_detalle_producto['imagen_detalle']; ?>" border="0" />
                        <?php
                            }
                            
                        ?>                        
                    </div>                
                    
                </div><!-- items_productos -->
                
                <div class="desc-uso-des">
                
                    <ul id="tabSelector">
                        <li id="tab0" class="detallesTab tabLong tabSelected">Descripción</li>
                        <?php
                            if($row_detalle_producto['pdf']=="")
                            {
                                echo "";
                            }
                            else
                            {
                        ?>
                        <li id="tab1" class="detallesTab tabShort">PDF</li>
                        <?php
                            }
                            
                        ?>
                    </ul>
                    
                    <div class="clear"></div>
                    <div id="tabContentContainer" class="detallesContenidoTabs">
                        <div class="contentTab"> 
                            <!-- /////   muestra la DESCRIPCION del producto  ////// -->
                            <div id="descr" class="padding1020">
                                <?php echo $row_detalle_producto['descripcion']; ?>
                                                
                            </div>
                        </div>
                        <!-- /////   muestra las APLICACIONES relacionadas al producto  ////// -->
                        <div class="contentTab hidden">
                            <div id="apli" class="padding1020">
                                <p><a href="pdf/<?php echo $row_detalle_producto['pdf']; ?>" target="_blank" style="color:#069; text-decoration:none; font-size:15px;">Descargar PDF</a></p>
                            </div>
                        </div>
            
                    </div>
                    
                </div>                        
               
             </div><!-- descripcion_producto -->
             
            </div>
            
            </div><!-- contenido_productos -->            
            
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