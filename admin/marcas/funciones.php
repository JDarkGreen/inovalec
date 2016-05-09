<?php

	function agregar_marcas($nombre_marca)
	{
		$sql_agregar = "INSERT INTO marcas(nombre_marca)VALUES('$nombre_marca')";
		
		query($sql_agregar,$cn) or die(mysql_error());
	
	}
	
	function editar_marcas($codigo,$nombre_marca)
	{
		$sql_editar  = "UPDATE marcas SET nombre_marca = '$nombre_marca'
						WHERE idmarca = '$codigo'";
		
		query($sql_editar) or die(mysql_error());
		
	}	
	
	function eliminar_marcas($cod)
	{		
					
		$sql_borrar = "DELETE FROM marcas WHERE idmarca = '$cod'";		
		
		query($sql_borrar) or die(mysql_error());
		
	}

?>