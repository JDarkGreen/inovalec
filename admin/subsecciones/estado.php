<?php
	include("../../includes/conexion.php");
	include("funciones.php");
	
	$cn = Conexion();
	
	$idpadre = $_GET['idpadre'];
	
	cambiar_estado($_GET['idseccion'],$_GET['idpadre']);
					
	header("Location:index.php?idsubseccion=$idpadre");
	
?>
