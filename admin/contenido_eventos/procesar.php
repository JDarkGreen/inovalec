<?php

	include("../../includes/conexion.php");
	include("funciones.php");	
	
	$cn = Conexion();
	
	$categoria			= $_POST['categoria'];
	$subcategoria		= $_POST['subcategoria'];
	$titulo_evento 		= $_POST['titulo_evento'];
	$descripcion  		= $_POST['descripcion'];
	
	// empieza el 1er if.
	if(!isset($_POST['editar']))
	{			
		agregar_eventos($categoria,$subcategoria,$titulo_evento,$descripcion); 
		
		header("Location:index.php");		
		
	}
	
	if(isset($_POST['editar']))
	{
		if($_POST['editar']=='1')
		{	
			editar_eventos($_POST['codigo'],$categoria,$subcategoria,$titulo_evento,$descripcion);
			
			header("Location:index.php");
				
							
		}
		
	}
	
?>