<?php  /** Incluir Constantes **/ include("../includes/constants.php"); ?>
<?php
	session_start();
	include("control.php");
	
	// definimos la funcion control_session.
	control_session($_SESSION['admin_admin']);	
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/estilos.css"/>
<title> <?= SITE_NAME; ?> - Panel de administracion</title>
</head>

<body>
<div id="contenedor">
   <div id="cuerpo_cpanel">
      <div id="cabecera_titulo">
         <p><?php echo "Bienvenido ".$_SESSION['admin_admin']; ?></p>
         <div id="cabecera_salir"> <a href="cerrar-sistema.php">Cerrar sesion</a></div>
      </div>
      <div id="cabecera_portada"> </div>
      <div id="titulo_cpanel">
         <p> Administración - <?= SITE_NAME; ?> </p>
      </div>
      <div id="contenido_cpanel">
         <table width="851" border="0" cellpadding="0" cellspacing="0">
            <tr>
               <td width="176">&nbsp;</td>
               <td width="179">&nbsp;</td>
               <td colspan="4">&nbsp;</td>
            </tr>
            <tr>
               <td align="center"><a href="secciones/index.php"><img src="imagenes/categorias.png" width="120" height="131" border="0" /></a></td>
               <td align="center"><a href="productos/index.php"><img src="imagenes/productos.png" width="123" height="134" border="0" /></a></td>
              <!-- <td width="142" align="center"><a href="eventos/index.php"><img src="imagenes/eventos.png" width="128" height="123" border="0" /></a></td>-->
               <td width="165" align="center"><a href="promociones/index.php"><img src="imagenes/promociones.png" width="128" height="128" border="0" /></a></td>
               <!--td width="162" align="center"><a href="contenido_eventos/index.php"><img src="imagenes/noticias.png" width="128" height="128" border="0" /></a></td-->
               <td width="169" align="center"><a href="marcas/index.php"><img src="imagenes/marcas.png" width="128" height="128" border="0" /></a></td>
            </tr>
         </table>
     </div>
      <div style="margin-top:25px;"></div>
      <div id="titulo_cpanel">
         <p>Configuración</p>
      </div>
      <div id="contenido_cpanel">
         <table width="503" border="0" cellpadding="0" cellspacing="0">
            <tr>
               <td width="171">&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
            </tr>
            <tr>
               <td align="center"><a href="usuarios/index.php"><img src="imagenes/administrador.png" width="97" height="137" border="0" /></a></td>
               <td width="166" align="center"><a href="ventas/index.php"><img src="imagenes/solicitud-de-pedidos.png" width="128" height="128" border="0" /></a></td>
               <td width="166" align="center"><a href="logos-marcas/index.php"><img src="imagenes/fabricantes.png" width="128" height="128" border="0" /></a></td>
            </tr>
         </table>
      </div>
   </div>
</div>
</div>
</body>
</html>