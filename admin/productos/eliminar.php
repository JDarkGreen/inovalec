<?php

	include("../../includes/conexion.php");
	include("funciones.php");
	
	$cn = Conexion();

	if(isset($_GET['cod']))
	{
		borrar_productos($_GET['cod']);
	}

?>