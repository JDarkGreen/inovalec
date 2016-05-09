<?php

	function agregar_usuarios($usuario,$clave)
	{
		$sql_agregar = "INSERT INTO admin(usuario,clave)VALUES('$usuario','$clave')";
		query($sql_agregar) or die(mysql_error());
		
		return $sql_agregar;
	
	}
	
	function editar_usuarios($codigo,$usuario,$clave)
	{
		$sql_editar = "UPDATE admin SET usuario = '$usuario', clave = '$clave' 
					   WHERE idadmin = '$codigo'";
		query($sql_editar) or die(mysql_error());
		
		return $sql_editar;
		
	}
	
	function borrar_usuarios($cod)
	{
		$sql_borrar = "DELETE FROM admin WHERE idadmin = '$cod'"	;
		query($sql_borrar) or die(mysql_error());
		
		return $sql_borrar;
		
	}
	
?>