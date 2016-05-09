<?php

	session_start();
	include("../../includes/conexion.php");
	include("../control.php");
	
	control_session($_SESSION['admin_admin']);
	
	$cn = Conexion();
	
	// para las marcas
	if( isset( $_POST['marcas'] ) && !empty( $_POST['marcas'] ) )
	{
		$marcas = $_POST['marcas'];
		$condicion .= "AND p.idmarca = '".$marcas."'";
	}	
	
	
	if( isset( $_POST['secciones'] ) && !empty( $_POST['secciones'] ) )
	{
		$secciones = $_POST['secciones'];
		$condicion .= "AND p.idseccion = '".$secciones."'";
	}
	
	$sql_datos  = "SELECT p.*, s.*, m.* FROM productos p, secciones s, marcas m
				   WHERE p.idseccion = s.idseccion
				   AND p.idmarca = m.idmarca
				   ".$condicion."
				   ORDER BY p.idmarca ASC";
	$rpta_datos = query($sql_datos,$cn) or die(mysql_error());
	

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../css/estilos.css"/>
<script type="text/javascript">
	function borrar(cod)
	{
		con = confirm("Desea borrar este producto ?");
		if(con==true)
		{
			document.form1.action = "eliminar.php?cod="+cod;
			document.form1.submit();
		}
	}
	
	function buscar()
	{
		document.form1.action = "index.php";
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
      <p>Productos</p>
      <div id="regresar_cpanel"> <a href="../cpanel.php"> Regresar al Cpanel </a> </div>
   </div>
   <div id="contenido_cpanel">
      <form id="form1" name="form1" method="post">
         <table width="960" border="0" align="center" cellpadding="2" cellspacing="2">
            <tr>
               <td colspan="11" align="center"><a href="agregar.php">Agregar productos</a></td>
            </tr>
            <tr>
               <td colspan="11" align="center">&nbsp;</td>
            </tr>
            <tr>
               <td colspan="11" class="tdrow1"><table width="945" border="0" cellpadding="0" cellspacing="2">
                  <tr>
                     <td width="120">Marca</td>
                     <td width="164"><select name="marcas" id="marcas">
                        <option value="">--seleccione-</option>
                        <?php
						$sql_marcas  = "SELECT * FROM marcas ORDER BY nombre_marca ASC";
						$rpta_marcas = query($sql_marcas,$cn) or die(mysql_error());
						
						while($row_marcas = fetch_array($rpta_marcas))
						{
							echo "<option value='".$row_marcas['idmarca']."'>".$row_marcas['nombre_marca']."</option>";
						}                    
					
					?>
                     </select></td>
                     <td width="116">Categorias</td>
                     <td width="171"><select name="secciones" id="secciones">
                        <option value="">--seleccione-</option>
                        <?php
						$padre 			= ($padre == null) ? 'IS NULL' : ' = ' . $padre;
						$sql_categoria  = "SELECT * FROM secciones WHERE idpadre ".$padre." ORDER BY seccion ASC";
						$rpta_categoria = query($sql_categoria,$cn) or die(mysql_error());
						
						while($row_categoria = fetch_array($rpta_categoria))
						{
							echo "<option value='".$row_categoria['idseccion']."'>".$row_categoria['seccion']."</option>";
						}                    
					
					?>
                     </select></td>
                     <td width="377"><input name="button" type="button" id="boton_buscar" value="Buscar" onclick="buscar(); "/></td>
                  </tr>
               </table></td>
            </tr>
            <tr>
               <td>&nbsp;</td>
               <td colspan="2">&nbsp;</td>
               <td colspan="2">&nbsp;</td>
               <td colspan="2">&nbsp;</td>
            </tr>
            <tr class="tdrow1">
               <td width="168">Producto</td>
               <td width="166">Marca</td>
               <td width="218">Seccion</td>
               <td width="224">Modelo</td>
               <td width="71">Editar</td>
               <td width="78">Eliminar</td>
            </tr>
            <?php
    
		while($fila = mysql_fetch_array($rpta_datos))
		{	
			// subseccion.
			$sql_dato1   = "SELECT s.seccion as subseccion FROM secciones s WHERE s.idseccion='".$fila['idsubseccion']."'";
			$rpta_dato1  = query($sql_dato1) or die(mysql_error());
			$fila_dato1  = fetch_array($rpta_dato1);
			
			// niveles.
			$sql_dato2  = "SELECT s.seccion as nivel FROM secciones s WHERE s.idseccion='".$fila['niveles']."'";
			$rpta_dato2 = query($sql_dato2) or die(mysql_error());
			$fila_dato2 = fetch_array($rpta_dato2);
			
			// subniveles.
			$sql_dato3 = "SELECT s.seccion as subnivel FROM secciones s WHERE s.idseccion='".$fila['subniveles']."'";
			$rpta_dato3 = query($sql_dato3) or die(mysql_error());
			$fila_dato3 = fetch_array($rpta_dato3);
			
	
	?>
            <tr class="tdrow2">
               <td valign="top"><?php echo $fila['nombre_producto']; ?></td>
               <td valign="top"><?php echo $fila['nombre_marca']; ?></td>
               <td valign="top"><?php echo $fila['seccion']; ?></td>
               <td valign="top"><?php echo $fila['modelo']; ?></td>
               <td valign="top"><a href="editar.php?idproducto=<?php echo $fila['idproducto']; ?>&seccion=<?php echo $fila['idseccion']; ?>&subseccion=<?php echo $fila['niveles']; ?>"><img src="../imagenes/application_form_edit.png" width="16" height="16" border="0" /></a></td>
               <td valign="top"><a href="javascript:borrar('<?php echo $fila['idproducto']; ?>');"><img src="../imagenes/application_form_delete.png" width="16" height="16" border="0" /></a></td>
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