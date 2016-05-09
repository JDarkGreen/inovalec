<?php

	function agregar_productos($producto,$unidad_medida,$idmarca,$idseccion,$niveles,$subniveles,$modelo,$idlogo,$descripcion,$codigo_prod,$imagen,$imagen_promocion,$imagen_detalle,$pdf,$promocion)
	{
		$sql_agregar  = "INSERT INTO productos(nombre_producto,unidad_medida,idmarca,idseccion,niveles,subniveles,modelo,idlogo,descripcion,codigo_prod,imagen,imagen_promocion,imagen_detalle,pdf,promocion)";
		$sql_agregar .= "VALUES('$producto','$unidad_medida','$idmarca','$idseccion','$niveles','$subniveles','$modelo','$idlogo','$descripcion','$codigo_prod','$imagen','$imagen_promocion','$imagen_detalle','$pdf','$promocion')";
	 
		query($sql_agregar) or die(mysql_error());
		
		header("Location:index.php");
	
	}
	
	function editar_productos($codigo,$producto,$unidad_medida,$idmarca,$idseccion,$niveles,$subniveles,$modelo,$idlogo,$descripcion,$codigo_prod,$imagen,$imagen_promocion,$imagen_detalle,$pdf,$promocion)	
	{
		$sql_editar  = "UPDATE productos SET nombre_producto = '$producto', unidad_medida = '$unidad_medida', idmarca = '$idmarca', idseccion = '$idseccion', ";
		$sql_editar .= "niveles = '$niveles', subniveles = '$subniveles', modelo = '$modelo', idlogo = '$idlogo', ";
		$sql_editar .= "descripcion = '$descripcion', codigo_prod = '$codigo_prod', imagen = '$imagen', imagen_promocion = '$imagen_promocion', imagen_detalle = '$imagen_detalle', pdf = '$pdf', promocion = '$promocion' ";
		$sql_editar .= "WHERE idproducto = '$codigo' "; 
		
		query($sql_editar) or die(mysql_error());
		
		header("Location:index.php");
		
	}
	
	function borrar_productos($cod)
	{	
		$eliimage = "SELECT * FROM productos WHERE idproducto = '$cod'";
		$rowimages = query($eliimage) or die(mysql_error());
		$rs_image = fetch_array($rowimages);

		$fotoprincipal = $rs_image['imagen'];
		if($fotoprincipal!=""){
			@unlink("../../images/productos/$fotoprincipal");
		}
		
		$fotopromocion = $rs_image['imagen_promocion'];
		if($fotopromocion!=""){
			@unlink("../../images/productos/promociones/$fotopromocion");
		}		
		
		$pdf = $rs_image['pdf'];
		if($pdf!=""){
			@unlink("../../pdf/$pdf");
		}				
		
		$sql_borrar = "DELETE FROM productos WHERE idproducto = '$cod'";
		query($sql_borrar) or die(mysql_error());
		
		header("Location:index.php");		
		
	}
		
	
?>