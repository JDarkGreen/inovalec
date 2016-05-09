<?php

	function agregar_promocion($idcategoria,$subcategoria,$titulo_promocion,$imagen_promocion,$sumilla,$descripcion,$portada)
	{
		$sql_agregar = "INSERT INTO promociones(idcategoria,subcategoria,titulo_promocion,imagen_promocion,sumilla,descripcion,portada)
						VALUES('$idcategoria','$subcategoria','$titulo_promocion','$imagen_promocion','$sumilla','$descripcion','$portada')";
		query($sql_agregar) or die(mysql_error());
		
		return $sql_agregar;
	
	}
	
	function editar_promocion($codigo,$idcategoria,$subcategoria,$titulo_promocion,$imagen_promocion,$sumilla,$descripcion,$portada)
	{
		$sql_editar = "UPDATE promociones SET idcategoria = '$idcategoria', subcategoria = '$subcategoria', titulo_promocion = '$titulo_promocion',
					   imagen_promocion = '$imagen_promocion', sumilla = '$sumilla', descripcion = '$descripcion', portada = '$portada'
					   WHERE idpromocion = '$codigo'";
		query($sql_editar) or die(mysql_error());
		
		return $sql_editar;
		
	}
	
	function borrar_promocion($cod)
	{
		
		$eliimage = "SELECT * FROM promociones WHERE idpromocion = '$cod'";
		$rowimages = query($eliimage) or die(mysql_error());
		$rs_image = fetch_array($rowimages);		
		
		$fotopromocion = $rs_image['imagen_promocion'];
		if($fotopromocion!=""){
			@unlink("../../images/productos/promociones/$fotopromocion");
		}		
		
		$sql_borrar = "DELETE FROM promociones WHERE idpromocion = '$cod'";
		query($sql_borrar) or die(mysql_error());
		
		return $sql_borrar;
		
	}
	
?>