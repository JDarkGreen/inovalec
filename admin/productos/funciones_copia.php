<?php

	function agregar_productos($producto,$unidad_medida,$idmarca,$idseccion,$idsubseccion,$niveles,$subniveles,$modelo,$descripcion,$codigo_prod,$imagen,$pdf)
	{
		$sql_agregar  = "INSERT INTO productos(nombre_producto,unidad_medida,idmarca,idseccion,idsubseccion,niveles,subniveles,modelo,descripcion,codigo_prod,imagen,pdf)";
		$sql_agregar .= "VALUES('$producto','$unidad_medida','$idmarca','$idseccion','$idsubseccion','$niveles','$subniveles','$modelo','$descripcion','$codigo_prod','$imagen','$pdf')";
	
		query($sql_agregar) or die(mysql_error());
		
		header("Location:index.php");
	
	}
	
	function editar_productos($codigo,$producto,$unidad_medida,$idmarca,$idseccion,$idsubseccion,$niveles,$subniveles,$modelo,$descripcion,$codigo_prod,$imagen,$pdf)	
	{
		$sql_editar  = "UPDATE productos SET nombre_producto = '$producto', unidad_medida = '$unidad_medida', idmarca = '$idmarca', idseccion = '$idseccion', ";
		$sql_editar .= "idsubseccion = '$idsubseccion', niveles = '$niveles', subniveles = '$subniveles', modelo = '$modelo', ";
		$sql_editar .= "descripcion = '$descripcion', codigo_prod = '$codigo_prod', imagen = '$imagen', pdf = '$pdf' ";
		$sql_editar .= "WHERE idproducto = '$codigo' ";
		
		echo $sql_editar;
		
		query($sql_editar) or die(mysql_error());
		
		// header("Location:index.php");
		
	}
	
	function borrar_productos($cod)
	{	
		$eliimage = "SELECT * FROM productos WHERE idproducto = '$cod'";
		$rowimages = query($eliimage) or die(mysql_error());
		$rs_image = fetch_array($rowimages);

		$fotoprincipal = $rs_image['imagen'];
		if($fotoprincipal!=""){
			@unlink("../../productos/$fotoprincipal");
		}		
		
		$sql_borrar = "DELETE FROM productos WHERE idproducto = '$cod'";
		query($sql_borrar) or die(mysql_error());
		
		header("Location:index.php");		
		
	}
		
	
?>