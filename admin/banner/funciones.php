<?php

	function agregar_banner($imagen_banner,$estado)
	{
		$sql_agregar = "INSERT INTO banner(imagen_banner,estado)VALUES('$imagen_banner','$estado')";
		
		query($sql_agregar,$cn) or die(mysql_error());
	
	}
	
	function editar_banner($codigo,$imagen_banner,$estado)
	{
		$sql_editar  = "UPDATE banner SET imagen_banner = '$imagen_banner', estado = '$estado' WHERE idbanner = '$codigo'";
		
		query($sql_editar) or die(mysql_error());
		
	}
	
	function cambiar_estado($idbanner)
	{
		
		$qryEstado = "SELECT * FROM banner WHERE idbanner ='$idbanner'";
		$rptaEstado = query($qryEstado,$cn) or die(mysql_error());
		$rowEstado = fetch_array($rptaEstado);
		
		$estado = ($rowEstado['estado']=='1')?'0':'1';
		
		//Activar-desactivar 
						
		$sql_edit = "UPDATE banner SET estado='".$estado."' WHERE idbanner = '$idbanner'";
		query($sql_edit,$cn) or die(mysql_error());
		
		if($_POST['pagina']!=""){
			$pagina = $_POST['pagina'];
			$a = "&pagina=$pagina";
		}
		
		if($_GET['stUsuario']!=""){
			$b = "&stUsuario=$estado";
		}
		
		if($_POST['stUsuario']!=""){
			$b = "&stUsuario=$estado";
		}
		
		return $rptaEstado;		
		
	}	
	
	function eliminar_banner($cod)
	{
		$eliimage  = "SELECT * FROM banner WHERE idbanner = '$cod'";
		$rowimages = query($eliimage) or die(mysql_error());
		$rs_image  = fetch_array($rowimages);

		$fotoprincipal = $rs_image['imagen_banner'];
		if($fotoprincipal!="")
		{
			@unlink("../../images/slides/$fotoprincipal");
		}		
		
		$sql_borrar = "DELETE FROM banner WHERE idbanner = '$cod'";
		query($sql_borrar) or die(mysql_error());
		
	}

?>