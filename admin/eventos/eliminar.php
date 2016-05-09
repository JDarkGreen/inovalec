<?php
	include("../../includes/conexion.php");
	include("funciones.php");
	
	// Definimos la variable de conexion.
	$cn = Conexion();	
	
	if(isset($_GET['cod'])){
		borrar_secciones($_GET['cod']);
		
		if($_GET['pagina']!=""){
			$pagina = $_GET['pagina'];
			$a = "&pagina=$pagina";
		}			
					
		header("Location:index.php?ok=3$a");		
		
	}
	
?>
