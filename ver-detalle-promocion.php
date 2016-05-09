<?php

	include("includes/conexion.php");
	include("includes/funciones.php");
	
	$cn = Conexion();
	
	// mostrar el evento por defecto.
	
	$sql_detallepromocion  = "SELECT p.*, e.* FROM eventos e, promociones p 
					 		  WHERE e.idcategoria = p.idcategoria
					 		  AND p.idpromocion = '".$_GET['idpromocion']."'";
	$rpta_detallepromocion = query($sql_detallepromocion) or die(mysql_error());
	$row_detallepromocion  = fetch_array($rpta_detallepromocion);	
	
?>
<h2><?php echo $row_detallepromocion[0]['titulo_promocion']; ?></h2>
<img src="images/productos/promociones/<?php echo $row_detallepromocion[0]['imagen_promocion']; ?>" style="float:left; margin-left: 30px;" /> 
<div style="float:right; margin-left: 30px;">
    <?php echo $row_detallepromocion[0]['descripcion']; ?>      		
</div>