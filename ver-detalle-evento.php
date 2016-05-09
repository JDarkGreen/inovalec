<?php

	include("includes/conexion.php");
	include("includes/funciones.php");
	
	$cn = Conexion();
	
	// mostrar el evento por defecto.
	
	$sql_detalleseccion  = "SELECT e.*, cev.* FROM eventos e, contenido_eventos cev 
					 		WHERE e.idcategoria = cev.idcategoria
					 		AND cev.idevento = '".$_GET['idevento']."'";
	$rpta_detalleseccion = query($sql_detalleseccion) or die(mysql_error());
	$row_detalleseccion  = fetch_array($rpta_detalleseccion);	
	
?>
<h2><?php echo $row_detalleseccion[0]['titulo_evento']; ?></h2>
<p><?php echo $row_detalleseccion[0]['descripcion']; ?></p>