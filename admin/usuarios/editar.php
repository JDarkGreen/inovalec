<?php
	
	session_start();
	include("../../includes/conexion.php");
	include("../ckeditor/ckeditor.php");
	include("../ckfinder/ckfinder.php");	
	include("../control.php");	
	
	// definimos la funcion control_session.
	control_session($_SESSION['admin_admin']);	
	
	// Definimos la variable de conexion.
	$cn = Conexion();	
	
	$sql_editar    = "SELECT * FROM admin WHERE idadmin = '".$_GET['idadmin']."'";
	$rpta_editar   = query($sql_editar) or die(mysql_error());
	$fila		   = fetch_array($rpta_editar);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../css/estilos.css"/>
<link rel="stylesheet" type="text/css" href="../css/reset.css"/>
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
      <p>Editar usuario</p>
      <div id="regresar_cpanel"> <a href="../cpanel.php"> Regresar al Cpanel </a> </div>
   </div>
   <div id="contenido_cpanel">
      <form id="form1" name="form1" method="post" action="procesar.php">
         <input type = "hidden" name = "editar" id = "editar" value = "1" />
         <input type="hidden" name="codigo" id="codigo" value="<?php echo $_GET['idadmin']; ?>" />
         <table width="858" border="0" align="center" cellpadding="2" cellspacing="0">
            <tr>
               <td width="189" class="tdrow1">Nombre usuario</td>
               <td colspan="2"><input name="usuario" type="text" class="formularios" id="usuario" value="<?php echo $fila['usuario']; ?>" size="30" /></td>
            </tr>
            <tr>
               <td valign="top" class="tdrow1">Clave</td>
               <td colspan="2"><input name="clave" type="password" class="formularios" id="clave" value="<?php echo $fila['clave']; ?>" size="30" /></td>
            </tr>
            <tr>
               <td valign="top" class="tdrow1">&nbsp;</td>
               <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
               <td class="tdrow3">&nbsp;</td>
               <td width="254" align="center"><input name="button" type="submit" class="boton" id="button" value="Guardar" /></td>
               <td width="270" align="center"><input type="button" class="boton" onclick="cancelar();" value="Cancelar" /></td>
            </tr>
         </table>
      </form>
   </div>
</div>
</body>
</html>