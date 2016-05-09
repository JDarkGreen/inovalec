<?php

	function agregar_logo_marcas($imagen_marca,$link_marca)
	{
		$sql_agregar = "INSERT INTO logos_marcas(imagen_marca,link_marca)VALUES('$imagen_marca','$link_marca')";
		
		query($sql_agregar,$cn) or die(mysql_error());
	
	}
	
	function editar_logo_marcas($codigo,$imagen_marca,$link_marca)
	{
		$sql_editar  = "UPDATE logos_marcas SET imagen_marca = '$imagen_marca', link_marca = '$link_marca' WHERE idlogo = '$codigo'";
		
		query($sql_editar) or die(mysql_error());
		
	}	
	
	function eliminar_logo_marcas($cod)
	{
		
		$eliimage = "SELECT * FROM logos_marcas WHERE idlogo = '$cod'";
		$rowimages = query($eliimage) or die(mysql_error());
		$rs_image = fetch_array($rowimages);

		$fotoprincipal = $rs_image['imagen_marca'];
		if($fotoprincipal!=""){
			@unlink("../../images/marcas/$fotoprincipal");
		}		
					
		$sql_borrar = "DELETE FROM logos_marcas WHERE idlogo = '$cod'";		
		
		query($sql_borrar) or die(mysql_error());
		
	}

?>