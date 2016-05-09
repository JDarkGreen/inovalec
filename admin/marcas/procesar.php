<?php

	include("../../includes/conexion.php");
	include("../../includes/class.upload.php");
	include("funciones.php");	
	
	$cn = Conexion();
	
	$nombre_marca = $_POST['nombre_marca'];
	
	$sql_marca  = "SELECT * FROM marcas WHERE nombre_marca = '".$nombre_marca."'";
	$rpta_marca = query($sql_marca) or die(mysql_error());
	$num_filas  = num_rows($rpta_marca);
	
	// empieza el 1er if.
	if(!isset($_POST['editar']))
	{		

		if($num_filas>0)		
		{
			header("Location:agregar.php?msg=1");
		}
		else
		{			
			
			agregar_marcas($nombre_marca);			
			
			header("Location:index.php");
			
		}
		
	}
	
	if(isset($_POST['editar']))
	{
		if($_POST['editar']=='1')
		{						
				
			editar_marcas($_POST['codigo'],$nombre_marca);
			
			header("Location:index.php");
				
							
		}
		
	}
	
?>