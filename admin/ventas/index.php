<?php
	
	session_start();
	include("../../includes/conexion.php");
	include("../control.php");	
	
	// definimos la funcion control_session.
	control_session($_SESSION['admin_admin']);	
	
	// Definimos la variable de conexion.
	$cn = Conexion();	
	
	$sql_ventas  = "SELECT * FROM ventas ORDER BY empresa DESC";
	$rpta_ventas = query($sql_ventas,$cn) or die(mysql_error());

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../css/estilos.css"/>
<script type="text/javascript">
	function borrar(cod)
	{
		con = confirm("Desea borrar esta venta ?");
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
      <p>Ventas de productos</p>
      <div id="regresar_cpanel"> <a href="../cpanel.php"> Regresar al Cpanel </a> </div>
   </div>
   <div id="contenido_cpanel">
      <form id="form1" name="form1" method="post">
         <table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
               <td align="center">&nbsp;</td>
            </tr>
         </table>
         <table width="960" border="0" align="center" cellpadding="2" cellspacing="0">
            <tr>
               <td colspan="5">&nbsp;</td>
               <td colspan="2">&nbsp;</td>
            </tr>
            <tr class="tdrow1">
               <td width="58">No</td>
               <td width="155">Fecha</td>
               <td width="155">Telefono</td>
               <td width="252">Email</td>
               <td width="181">Empresa</td>
               <td colspan="2">&nbsp;</td>
            </tr>
            <?php
				
				$i = 1;
				while($row_ventas = fetch_array($rpta_ventas))
				{
				
	  		?>
            <tr>
               <td class="tdrow2"><?php echo $i; ?></td>
               <td class="tdrow2"><?php echo $row_ventas['fecha']; ?></td>
               <td class="tdrow2"><?php echo $row_ventas['telefono']; ?></td>
               <td class="tdrow2"><?php echo $row_ventas['email']; ?></td>
               <td class="tdrow2"><?php echo $row_ventas['empresa']; ?></td>
               <td width="93" class="tdrow2"><a class="ventas" href="ver-ventas.php?idventas=<?php echo $row_ventas['idventas']; ?>">Ver pedido</a></td>
               <td width="38" align="center" class="tdrow2"><img src="../imagenes/application_form_delete.png" width="16" height="16" onclick="borrar('<?php echo $row_ventas['idventas']; ?>');" style="cursor:pointer;" /></td>
            </tr>
            <?php
				$i++;
				
				}
	 	 	?>
         </table>
      </form>
   </div>
</div>
</body>
</html>