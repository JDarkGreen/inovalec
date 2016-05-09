<?php
	
	session_start();
	include("../../includes/conexion.php");
	include("../control.php");	
	
	// definimos la funcion control_session.
	control_session($_SESSION['admin_admin']);	
	
	// Definimos la variable de conexion.
	$cn = Conexion();	
	
	$sql_detalleEmpresa  = "SELECT * FROM ventas WHERE idventas = '".$_GET['idventas']."'";
	$rpta_detalleEmpresa = query($sql_detalleEmpresa,$cn) or die(mysql_error());
	$fila				 = fetch_array($rpta_detalleEmpresa);
	
	// Listar detalle del pedido.
	$sql_detallePedido  = "SELECT v.idventas, cv.cantidad, cv.producto, cv.marca FROM cotizar_ventas cv, ventas v 
						   WHERE v.idventas = cv.idventas
						   AND cv.idventas = '".$_GET['idventas']."'";
	$rpta_detallePedido = query($sql_detallePedido,$cn) or die(mysql_error());	

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../css/estilos.css"/>
<script type="text/javascript">
	function borrar(cod)
	{
		con = confirm("Desea borrar esta marca ?");
		if(con==true)
		{
			document.form1.action = "eliminar.php?cod="+cod;
			document.form1.submit();
		}
	}
	
	function exportarExcel(idventas)
	{
		document.form1.action = "reporte-por-fecha.php?idventas="+idventas;
		document.form1.method = "GET";
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
      <p>Detalle del pedido</p>
      <div id="regresar_cpanel"> <a href="index.php"> Regresar a la lista </a> </div>
   </div>
   <div id="contenido_cpanel">
      <form id="form1" name="form1">
         <table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
               <td align="center">&nbsp;</td>
            </tr>
         </table>
         <table width="960" border="0" align="center" cellpadding="2" cellspacing="0">
            <tr>
               <td colspan="4">
                <input type="hidden" name="idventas" id="idventas" value="<?php echo $_GET['idventas']; ?>" />
                <table width="735" border="0" align="center" cellpadding="2" cellspacing="2">
                  <tr>
                     <td width="139" class="tdrow1">Empresa</td>
                     <td width="588" colspan="2" bgcolor="#FFFFFF"><span style="color:#000;"><?php echo $fila['empresa']; ?></span></td>
                  </tr>
                  <tr>
                     <td class="tdrow1">Teléfono</td>
                     <td colspan="2" bgcolor="#FFFFFF"><span style="color:#000;"><?php echo $fila['telefono']; ?></span></td>
                  </tr>
                  <tr>
                     <td class="tdrow1">E-mail</td>
                     <td colspan="2" bgcolor="#FFFFFF"><span style="color:#000;"><?php echo $fila['email']; ?></span></td>
                  </tr>
                  <tr>
                     <td class="tdrow1">Fecha</td>
                     <td colspan="2" bgcolor="#FFFFFF"><span style="color:#000;"><?php echo $fila['fecha']; ?></span></td>
                  </tr>
                  <tr>
                     <td colspan="3">&nbsp;</td>
                     </tr>
                  <tr>
                     <td colspan="3" align="center"><input name="button" type="button" class="boton_exportar" id="button" value="Exportar" onclick="exportarExcel('<?php echo $_GET['idventas']; ?>');" /></td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr class="tdrow1">
               <td width="162">No</td>
               <td width="163">Cantidad</td>
               <td width="401">Producto</td>
               <td width="222">Marca</td>
            </tr>
            <?php
				$i = 1;
				while($row_detalleVentas = fetch_array($rpta_detallePedido))
				{
					
			?>
            <tr>
               <td class="tdrow2"><?php echo $i; ?></td>
               <td class="tdrow2"><?php echo $row_detalleVentas['cantidad']; ?></td>
               <td class="tdrow2"><?php echo $row_detalleVentas['producto']; ?></td>
               <td class="tdrow2"><?php echo $row_detalleVentas['marca']; ?></td>
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