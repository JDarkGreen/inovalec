<?php

	include("../../includes/conexion.php");
	include("../../includes/class.upload.php");	
	include("funciones.php");	
	
	$cn = Conexion();
	
	$categoria			= $_POST['categoria'];
	$subcategoria		= $_POST['subcategoria'];
	$titulo_promocion 	= $_POST['titulo_promocion'];
	$sumilla			= $_POST['sumilla'];
	$descripcion  		= $_POST['descripcion'];
	$portada			= $_POST['portada'];
	
	// empieza el 1er if.
	if(!isset($_POST['editar']))
	{
		
		// Subir imagen de la promoción del producto (para la portada y en el detalle).
		$imagen_promocion = new upload ($_FILES['imagen_promocion']);
	
		if ($imagen_promocion->uploaded)
		{
			$imagen_promocion->image_resize         = true;
			$imagen_promocion->image_ratio_crop     = 'C';	# el crop lo que hara es cortar la imagen al centro.
			$imagen_promocion->image_x              = 168;
			$imagen_promocion->image_y              = 234;						
			$imagen_promocion->process('../../images/productos/promociones/');
			$foto_imagen_promocion = $imagen_promocion->file_dst_name;
		}		
		
		agregar_promocion($categoria,$subcategoria,$titulo_promocion,$foto_imagen_promocion,$sumilla,$descripcion,$portada); 
		
		header("Location:index.php");		
		
	}
	
	if(isset($_POST['editar']))
	{
		if($_POST['editar']=='1')
		{
			
			# editamos la foto de la promocion del producto (para la portada y en el detalle).
			if($_FILES['imagen_promocion']['size'] != '0' )
			{				
					$handle2 = new upload($_FILES['imagen_promocion']);
						
					$handle2->image_resize         = true;
					$handle2->image_ratio_crop     = 'C';	# el crop lo que hara es cortar la imagen al centro.
					$handle2->image_x              = 168;
					$handle2->image_y              = 234;					
					$handle2->process("../../images/productos/promociones/");
					$imagen_promocion = $handle2->file_dst_name;
			}
			else
			{
					$imagen_promocion = $_POST['nombreFotoPromocion'];			
			}			
			
			editar_promocion($_POST['codigo'],$categoria,$subcategoria,$titulo_promocion,$imagen_promocion,$sumilla,$descripcion,$portada);
			
			header("Location:index.php");
				
							
		}
		
	}
	
?>