<?php
	include("../../includes/conexion.php");
	include("funciones.php");
	
	// Definimos la variable de conexion.
	$cn = Conexion();	
	
	if(isset($_GET['cod']))
	{	
		$idseccion = $_GET['cod'];
		$idsubseccion = $_GET['codsubseccion'];		
		borrar_subsecciones($idseccion);			
					
		header("Location:index.php?idsubseccion=$idsubseccion");		
		
	}
	
?>
