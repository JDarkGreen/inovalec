<?php

	function agregar_secciones($categoria)
	{
		$sql_agregar  = "INSERT INTO eventos(categoria)VALUES('$categoria')";
		
		query($sql_agregar,$cn) or die(mysql_error());
		
	}
	
	function editar_secciones($codigo,$categoria)
	{
		$sql_editar  = "UPDATE eventos SET categoria = '$categoria' WHERE idcategoria = '$codigo'";
		
		query($sql_editar,$cn) or die(mysql_error());
		
	}
	
	function borrar_secciones($cod)
	{
		$sql_del = "DELETE FROM eventos WHERE idcategoria = '$cod'";
		query($sql_del,$cn) or die(mysql_error());
	
	}
	
	function cambiar_estado($idseccion)
	{
		
		$qryEstado = "SELECT * FROM secciones WHERE idseccion ='$idseccion'";
		$rptaEstado = query($qryEstado,$cn) or die(mysql_error());
		$rowEstado = fetch_array($rptaEstado);
		
		$estado = ($rowEstado['estado']=='1')?'0':'1';
		
		//Activar-desactivar 
						
		$sql_edit = "UPDATE secciones SET estado='".$estado."' WHERE idseccion = '$idseccion'";
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

?>