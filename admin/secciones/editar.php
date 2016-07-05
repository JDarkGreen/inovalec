<?php
	
	session_start();
	include("../../includes/conexion.php");
	include("../control.php");	
	include("funciones.php");
	
	// definimos la funcion control_session.
	control_session($_SESSION['admin_admin']);		
	
	// Definimos la variable de conexion.
	$cn = Conexion();
	
	$sql_editar  = "SELECT * FROM secciones WHERE idseccion = '".$_GET['id']."'";
	$rpta_editar = query($sql_editar,$cn) or die(mysql_error());
	$row_seccion = fetch_array($rpta_editar); //var_dump( $row_seccion );
	

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript">
	function cancelar()
	{
		document.form1.action = "index.php";
		document.form1.submit();
	}
</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../css/estilos.css"/>
<title> INOVALEC - Panel de administración </title>
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
      <p>Editar Categorias</p>
      <div id="regresar_cpanel"> <a href="../cpanel.php">Regresar al Cpanel</a> </div>
   </div>
   <div id="contenido_cpanel">
      <form id="form1" name="form1" method="post" action="procesar.php">
         <input type = "hidden" name = "editar" id = "editar" value = "1" />
         <input type = "hidden" name = "codigo" id = "codigo" value = "<?=$_GET['id']; ?>" />
         <table width="750" border="0" align="center" cellpadding="2" cellspacing="0">
            <tr>
               <td width="154" class="tdrow1">Nombre categoria</td>
               <td colspan="2"><input name="nombre_seccion" type="text" class="formularios" id="nombre_seccion" value="<?= $row_seccion[0]['seccion']; ?>" size="30"/></td>
            </tr>
            <tr>
                <td class="tdrow1">Estado</td>
                <td colspan="2">

                  <input type="radio" name="estado" id="estado" value="1" 
                  <?= $row_seccion[0]['estado']=='1'? "checked='checked'" : ""; ?> /> Si

                  <!-- No -->
                  <input type="radio" name="estado" id="estado" value="0" 
                  <?= $row_seccion[0]['estado']=='0'? "checked='checked'" : ""; ?> /> No
                </td>
            </tr>
            <tr>
               <td class="tdrow1">&nbsp;</td>
               <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
               <td class="tdrow1">&nbsp;</td>
               <td width="205" align="center"><input name="button" type="submit" class="boton" id="button" value="Guardar" /></td>
               <td width="300" align="center"><input name="button2" type="button" class="boton" id="button2" onclick="cancelar();" value="Cancelar" /></td>
            </tr>
         </table>
      </form>
   </div>
</div>
</body>
</html>