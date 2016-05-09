<?php
	include("../../includes/conexion.php");
	include("funciones.php");
	
	$cn = Conexion();
	
	cambiar_estado($_GET['idbanner']);
					
	header("Location:index.php?ok=4$a$b");
	
?>
