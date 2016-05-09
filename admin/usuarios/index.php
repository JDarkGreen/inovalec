<?php
	
	session_start();
	include("../../includes/conexion.php");
	include("../control.php");	
	
	// definimos la funcion control_session.
	control_session($_SESSION['admin_admin']);	
	
	// Definimos la variable de conexion.
	$cn = Conexion();	
	
	$sql_usuarios  = "SELECT * FROM admin ORDER BY idadmin DESC";
	$rpta_usuarios = query($sql_usuarios) or die(mysql_error());

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../css/estilos.css"/>
<script type="text/javascript">
	function borrar(cod)
	{
		con = confirm("Desea borrar el usuario ?");
		if(con==true)
		{
			document.form1.action = "eliminar.php?cod="+cod;
			document.form1.submit();
		}
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
      <p>Lista de usuarios</p>
      <div id="regresar_cpanel"> <a href="../cpanel.php"> Regresar al Cpanel </a> </div>
   </div>
   <div id="contenido_cpanel">
      <form id="form1" name="form1" method="post">
         <table width="858" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
               <td align="center">&nbsp;</td>
            </tr>
            <tr>
               <td align="center"><a href="agregar.php" class="titulo_agregar">Agregar usuarios</a></td>
            </tr>
            <tr>
               <td>&nbsp;</td>
            </tr>
         </table>
         <table width="858" border="0" align="center" cellpadding="2" cellspacing="0">
            <tr>
               <td width="687" class="tdrow1">Usuario</td>
               <td width="76" class="tdrow1">Editar</td>
               <td width="83" class="tdrow1">Eliminar</td>
            </tr>
            <?php
      		while($row_usuario = fetch_array($rpta_usuarios))
			{
				
	  ?>
            <tr>
               <td class="tdrow2"><?php echo $row_usuario['usuario']; ?></td>
               <td align="center" class="tdrow2"><a href="editar.php?idadmin=<?php echo $row_usuario['idadmin']; ?>"><img src="../imagenes/application_form_edit.png" width="16" height="16" border="0" /></a></td>
               <td align="center" class="tdrow2"><img src="../imagenes/application_form_delete.png" width="16" height="16" onclick="borrar('<?php echo $row_usuario['idadmin']; ?>');" style="cursor:pointer;" /></td>
            </tr>
            <?php
			}
	  ?>
         </table>
      </form>
   </div>
</div>
</body>
</html>