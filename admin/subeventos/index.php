<?php

	session_start();
	include("../../includes/conexion.php");	
	include("../control.php");
	
	// definimos la funcion control_session.
	control_session($_SESSION['admin_admin']);	
	
	// Definimos la variable de conexion.
	$cn = Conexion();
	
	if(isset($_GET['idsubseccion']))
	{	
		$sql_subsecciones  = "SELECT * FROM eventos  WHERE idpadre = '".$_GET['idsubseccion']."'";
		$rpta_subsecciones = query($sql_subsecciones,$cn) or die(mysql_error());
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript">

	function borrar(codseccion,codsubseccion)
	{
		con = confirm("Desea borrar la subcategoria ?");
			if(con==true)
			{
				document.form1.action = "eliminar.php?cod="+codseccion+"&codsubseccion="+codsubseccion;
				document.form1.submit();
			}
			
	}

	function changeState2(url,est,mssg)
	{
		if(est==1)
		{		
			message = "quieres desactivar esta "+mssg+" ?";
		}
		else
		{
			message = "quieres activar esta "+mssg+" ?";
		}
		
		if(confirm(message))
		{
			document.form1.action='estado.php?estado=1&'+url;
			document.form1.submit();	
		}
		
	}
</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../css/estilos.css"/>
<title>JBG Electric - Panel de control</title>
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
      <p>Subcategorias</p>
      <div id="regresar_cpanel"> <a href="../cpanel.php"> Regresar al Cpanel </a> </div>
   </div>
   <div id="contenido_cpanel">
      <form id="form1" name="form1" method="post">
         <table width="960" border="0" align="center" cellpadding="2" cellspacing="2">
            <tr>
               <td align="center"><a href="agregar.php?idsubseccion=<?php echo $_GET['idsubseccion']; ?>">Agregar subcategorias</a></td>
            </tr>
            <tr>
               <td>&nbsp;</td>
            </tr>
         </table>
         <table width="960" border="0" align="center" cellpadding="2" cellspacing="0">
            <tr class="tdrow1">
               <td width="402">Nombre subcategorias</td>
               <td colspan="2" align="center">Operaciones</td>
            </tr>
            <?php
				while($row_subsecciones = fetch_array($rpta_subsecciones))
				{
			?>
            <tr>
               <td class="tdrow2"><?php echo $row_subsecciones['categoria']; ?></td>
               <td width="51" align="center" class="tdrow2"><a href="editar.php?id=<?php echo $row_subsecciones['idcategoria']; ?>&idsubseccion=<?php echo $row_subsecciones['idpadre'];?>"><img src="../imagenes/application_form_edit.png" width="16" height="16" border="0" /></a></td>
               <td width="42" align="center" class="tdrow2"><img src="../imagenes/application_form_delete.png" width="16" height="16" onclick="borrar('<?php echo $row_subsecciones['idcategoria']; ?>','<?php echo $row_subsecciones['idpadre']; ?>')" style="cursor:pointer;" /></td>
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