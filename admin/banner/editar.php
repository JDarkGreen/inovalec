<?php
	
	session_start();
	include("../../includes/conexion.php");
	include("../../includes/funciones.php");
	include("../control.php");
	
	// definimos la funcion control_session.
	control_session($_SESSION['admin_admin']);	
	
	$cn = Conexion();
	
	$sql_editar  = "SELECT * FROM banner WHERE idbanner = '".$_GET['idbanner']."'";
	$rpta_editar = query($sql_editar) or die(mysql_error());
	$fila		 = fetch_array($rpta_editar);

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
<title>JBG Electric - Panel de administracion</title>
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
      <p>Editar Banner</p>
      <div id="regresar_cpanel"> <a href="../cpanel.php"> Regresar al Cpanel </a> </div>
   </div>
   <div id="contenido_cpanel">
      <form action="procesar.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
         <input type = "hidden" name = "editar" id = "editar" value = "1" />
         <input type = "hidden" name = "codigo" id = "codigo" value = "<?=$_GET['idbanner']; ?>" />
         <input name = "nombreFoto" type="hidden" value="<?php echo $fila['imagen_banner']; ?>" />
         <table width="960" border="0" align="center" cellpadding="2" cellspacing="0">
            <tr>
               <td colspan="3"><img src="../../images/slides/<?php echo $fila['imagen_banner']; ?>" width="960" height="303" border="0" /></td>
            </tr>
            <tr>
               <td class="tdrow1">Imagen banner</td>
               <td colspan="2"><input name="imagen_banner" type="file" class="formularios" id="imagen_banner" />
               <div style="color:#000000;">(Recomendacion banner mediano 1360 x 332)</div>
               </td>
            </tr>
            <tr>
               <td class="tdrow1">&nbsp;</td>
               <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
               <td>&nbsp;</td>
               <td align="center"><input name="button" type="submit" class="boton" id="boton" value="Guardar" /></td>
               <td align="center"><input type="button" class="boton" id="boton" onclick="cancelar();" value="Cancelar" /></td>
            </tr>
         </table>
      </form>
   </div>
</div>
</body>
</html>