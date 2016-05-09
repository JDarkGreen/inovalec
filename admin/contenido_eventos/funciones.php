<?php

	function agregar_eventos($idcategoria,$subcategoria,$titulo_evento,$descripcion)
	{
		$sql_agregar = "INSERT INTO contenido_eventos(idcategoria,subcategoria,titulo_evento,descripcion)
						VALUES('$idcategoria','$subcategoria','$titulo_evento','$descripcion')";
		query($sql_agregar) or die(mysql_error());
		
		return $sql_agregar;
	
	}
	
	function editar_eventos($codigo,$idcategoria,$subcategoria,$titulo_evento,$descripcion)
	{
		$sql_editar = "UPDATE contenido_eventos SET idcategoria = '$idcategoria', subcategoria = '$subcategoria',
					   titulo_evento = '$titulo_evento', descripcion = '$descripcion' 
					   WHERE idevento = '$codigo'";
		query($sql_editar) or die(mysql_error());
		
		return $sql_editar;
		
	}
	
	function borrar_eventos($cod)
	{
		$sql_borrar = "DELETE FROM contenido_eventos WHERE idevento = '$cod'"	;
		query($sql_borrar) or die(mysql_error());
		
		return $sql_borrar;
		
	}
	
?>