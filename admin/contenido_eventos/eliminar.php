<?php

	include("../../includes/conexion.php");
	include("funciones.php");
	
	// Definimos la variable de conexion.
	$cn = Conexion();

	if(isset($_GET['cod']))
	{
		borrar_eventos($_GET['cod']);
		
		header("Location:index.php");
		
	}

?>