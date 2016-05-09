<?php

	include("../../includes/conexion.php");
	include("../../includes/class.upload.php");
	include("funciones.php");	
	
	$cn = Conexion();
	
	$link_marca = $_POST['url_marca'];
	
	// empieza el 1er if.
	if(!isset($_POST['editar']))
	{		
	
		// Subir imagen producto.
		$imagen_marca = new upload ($_FILES['imagen_marca']);
	
		if ($imagen_marca->uploaded)
		{
			$imagen_marca->image_resize         = true;
			$imagen_marca->image_ratio_x        = true;
			$imagen_marca->image_ratio_y        = true;		
			$imagen_marca->image_y              = 61;			
			$imagen_marca->process('../../images/marcas/');			
			$foto_imagen_marca = $imagen_marca->file_dst_name;
		}			
		
		agregar_logo_marcas($foto_imagen_marca,$link_marca);			
		
		header("Location:index.php");

		
	}
	
	if(isset($_POST['editar']))
	{
		if($_POST['editar']=='1')
		{			
			
			# editamos la foto del producto (portada).
			if($_FILES['imagen_marca']['size'] != '0' )
			{				
					$handle = new upload($_FILES['imagen_marca']);
						
					$handle->image_resize         = true;
					$handle->image_ratio_x        = true;
					$handle->image_ratio_y        = true;												
					$handle->image_y              = 61;
					$handle->process("../../images/marcas/");
					$imagen_marca = $handle->file_dst_name;
			}
			else
			{
					$imagen_marca = $_POST['nombreFoto'];			
			}			
				
			editar_logo_marcas($_POST['codigo'],$imagen_marca,$link_marca);
			
			header("Location:index.php");
				
							
		}
		
	}
	
?>