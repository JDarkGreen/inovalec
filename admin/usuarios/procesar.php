<?php

	include("../../includes/conexion.php");
	include("funciones.php");	
	
	$cn = Conexion();
	
	$usuario 		= $_POST['usuario'];
	$clave		  	= $_POST['clave'];
	
	// empieza el 1er if.
	if(!isset($_POST['editar']))
	{			
		agregar_usuarios($usuario,$clave);
		
		header("Location:index.php");		
		
	}
	
	if(isset($_POST['editar']))
	{
		if($_POST['editar']=='1')
		{	
			editar_usuarios($_POST['codigo'],$usuario,$clave);
			
			header("Location:index.php");
				
							
		}
		
	}
	
?>