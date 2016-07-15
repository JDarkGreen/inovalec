<?php
   /** Incluir Constantes **/ 
   include("../../includes/constants.php");
	
	session_start();
	include("../../includes/conexion.php");
	include("../../includes/funciones.php");
	include("../control.php");
	
	// definimos la funcion control_session.
	control_session($_SESSION['admin_admin']);	
	
	$cn = Conexion();
	
   $sql_editar  = "SELECT * FROM logos_marcas WHERE idlogo = '".$_GET['idlogo']."'";
   $rpta_editar = query($sql_editar) or die(mysql_error());
   $fila        = fetch_array($rpta_editar);
   $fila        = $fila[0];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../css/estilos.css"/>
<script>
	function cancelar()
	{
		document.form1.action="index.php";
		document.form1.submit();
	}
</script>
<title> <?= SITE_NAME; ?> - Panel de administración </title>
</head>

<body>
<div id="contenedor">
<div id="cuerpo_cpanel">
   <div id="cabecera_titulo">
      <p><?php echo "Bienvenido ".$_SESSION['admin_admin']; ?></p>
      <div id="cabecera_salir"> <a href="../cerrar-sistema.php">Cerrar sesion</a></div>
   </div>
   <div id="cabecera_portada"> </div>
   <div id="titulo_cpanel">
      <p>Editar logo marca</p>
      <div id="regresar_cpanel"> <a href="../cpanel.php"> Regresar al Cpanel </a> </div>
   </div>
   <div id="contenido_cpanel">
      <form action="procesar.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
         <input type = "hidden" name = "editar" id = "editar" value = "1" />
         <input type = "hidden" name = "codigo" id = "codigo" value = "<?=$_GET['idlogo']; ?>" />
         <input name = "nombreFoto" type="hidden" value="<?php echo $fila['imagen_marca']; ?>" />         
         <table width="735" border="0" align="center" cellpadding="2" cellspacing="0">
            <tr>
               <td width="206" class="tdrow1">&nbsp;</td>
               <td colspan="2"><img src="../../images/marcas/<?php echo $fila['imagen_marca']; ?>" /></td>
            </tr>
            <tr>
               <td class="tdrow1">Imagen marca</td>
               <td colspan="2"><input name="imagen_marca" type="file" class="formularios" id="imagen_marca" />
               <span style="color:#000;">Subir tamaño de 61 pixeles de alto</span></td>
            </tr>
            <tr>
               <td class="tdrow1">Url marca</td>
               <td colspan="2"><input name="url_marca" type="text" class="formularios" id="url_marca" size="80" value="<?php echo $fila['link_marca']; ?>" /></td>
            </tr>
            <tr>
               <td class="tdrow1">&nbsp;</td>
               <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
               <td>&nbsp;</td>
               <td width="244" align="center"><input name="button" type="submit" class="boton" id="boton" value="Guardar" /></td>
               <td width="273" align="center"><input type="button" class="boton" id="boton" onclick="cancelar();" value="Cancelar" /></td>
            </tr>
         </table>
      </form>
   </div>
</div>
</body>
</html>