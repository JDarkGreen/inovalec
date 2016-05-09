<?php

	function agregar_subsecciones($idsubseccion,$categoria)
	{
		$sql_agregar  = "INSERT INTO eventos(idpadre,categoria)VALUES('$idsubseccion','$categoria')";
		
		query($sql_agregar,$cn) or die(mysql_error());
	
	}
	
	function editar_subsecciones($codigo,$idsubseccion,$categoria)
	{
		$sql_editar  = "UPDATE eventos SET idpadre = '$idsubseccion', categoria = '$categoria', ";
		$sql_editar .= "WHERE idcategoria = '$codigo'";
		
		query($sql_editar,$cn) or die(mysql_error());
		
	}
	
	function borrar_subsecciones($cod)
	{
		$sql_borrar = "DELETE FROM eventos WHERE idcategoria = '$cod'";
		query($sql_borrar) or die(mysql_error());
	
	}	
	
	function cambiar_estado($idseccion,$idpadre)
	{
		
		$qryEstado = "SELECT * FROM eventos WHERE idcategoria ='$idseccion' AND idpadre = '$idpadre'";
		$rptaEstado = query($qryEstado,$cn) or die(mysql_error());
		$rowEstado = fetch_array($rptaEstado);
		
		$estado = ($rowEstado['estado']=='1')?'0':'1';
		//Activar-desactivar 
						
		$sql_edit = "UPDATE eventos SET estado='".$estado."' WHERE idcategoria = '$idseccion' AND idpadre = '$idpadre'";
		query($sql_edit,$cn) or die(mysql_error());
		
		
		if($_GET['stUsuario']!=""){
			$b = "&stUsuario=$estado";
		}
			
		return $rptaEstado;
		
	}
	

?>