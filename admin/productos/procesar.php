<?php

	include("../../includes/conexion.php");
	include("../../includes/class.upload.php");
	include("funciones.php");	
	
	$cn = Conexion();
	
	$nombre_producto = $_POST['nombre_producto'];
	$medidas		 = $_POST['medidas'];
	$idmarca		 = $_POST['marcas'];
	$seccion		 = $_POST['seccion'];
	$subseccion		 = $_POST['subsecciones'];
	$niveles		 = $_POST['nivel'];
	$subniveles		 = $_POST['subnivel'];
	$modelo			 = $_POST['modelo'];
	$idlogo			 = $_POST['fabricante'];
	$descripcion	 = $_POST['descripcion'];
	$codproducto	 = $_POST['codproducto'];
	$promocion		 = $_POST['promocion'];
	
	// empieza el 1er if.
	if(!isset($_POST['editar']))
	{	
		
		// Subir imagen del producto.
		$imagen_producto = new upload ($_FILES['imagen_producto']);
	
		if ($imagen_producto->uploaded)
		{
			$imagen_producto->image_resize         = true;			
			$imagen_producto->image_ratio_y        = true;
			$imagen_producto->image_x              = 304;
			$imagen_producto->image_y              = 230;						
			$imagen_producto->process('../../images/productos/');
			$foto_imagen_producto = $imagen_producto->file_dst_name;
		}
		
		// Subir imagen de la promoción del producto.
		$imagen_promocion = new upload ($_FILES['imagen_producto']);
	
		if ($imagen_promocion->uploaded)
		{
			$imagen_promocion->image_resize         = true;			
			$imagen_promocion->image_x              = 168;
			$imagen_promocion->image_y              = 234;						
			$imagen_promocion->process('../../images/productos/promociones/');
			$foto_imagen_promocion = $imagen_promocion->file_dst_name;
		}
		
		// Subir imagen del detalle producto.
		$imagen_detalle = new upload ($_FILES['imagen_producto']);
	
		if ($imagen_detalle->uploaded)
		{
			$imagen_detalle->image_resize         = true;			
			$imagen_detalle->image_x              = 168;
			$imagen_detalle->image_y              = 234;						
			$imagen_detalle->process('../../images/productos/detalle/');
			$foto_imagen_detalle = $imagen_promocion->file_dst_name;
		}				
		
		// Subir pdf.
		$pdf 		= $_FILES['pdf']['name'];
		$llega_size = $_FILES['pdf']['size'];
		$info_pdf   = str_replace(' ','_',$pdf);
		
		$path = "../../pdf/";
		
		move_uploaded_file($_FILES['pdf']['tmp_name'],$path.$info_pdf);		
		
		agregar_productos($nombre_producto,$medidas,$idmarca,$seccion,$niveles,$subniveles,$modelo,$idlogo,$descripcion,$codproducto,$foto_imagen_producto,$foto_imagen_promocion,$foto_imagen_detalle,$info_pdf,$promocion);
				
	}
	
	if(isset($_POST['editar']))
	{
		if($_POST['editar']=='1')
		{
			
			# editamos la foto del producto.
			if($_FILES['imagen_producto']['size'] != '0' )
			{				
					$handle = new upload($_FILES['imagen_producto']);
						
					$handle->image_resize         = true;
					$handle->image_ratio_y        = true;
					$handle->image_x              = 304;
					$handle->image_y              = 230;					
					$handle->process("../../images/productos/");
					$imagen_producto = $handle->file_dst_name;
			}
			else
			{
					$imagen_producto = $_POST['nombreFoto'];			
			}
			
			# editamos la foto de la promocion del producto.
			if($_FILES['imagen_producto']['size'] != '0' )
			{				
					$handle2 = new upload($_FILES['imagen_producto']);
						
					$handle2->image_resize         = true;
					$handle2->image_x              = 168;
					$handle2->image_y              = 234;					
					$handle2->process("../../images/productos/promociones/");
					$imagen_promocion = $handle2->file_dst_name;
			}
			else
			{
					$imagen_promocion = $_POST['nombreFotoPromocion'];			
			}
			
			# editamos la foto detalle del producto.
			if($_FILES['imagen_producto']['size'] != '0' )
			{				
					$handle3 = new upload($_FILES['imagen_producto']);
						
					$handle3->image_resize         = true;
					$handle3->image_x              = 168;
					$handle3->image_y              = 234;					
					$handle3->process("../../images/productos/detalle/");
					$imagen_detalle = $handle3->file_dst_name;
			}
			else
			{
					$imagen_detalle = $_POST['nombreFotoDetalle'];			
			}						
			
			# editamos el pdf.
			if($_FILES['pdf']['size'] != '0' )
			{				
					$pdf       = $_FILES['pdf']['name'];
					$info_pdf  = str_replace(' ','_',$pdf);
					$path1 = "../../pdf/";
					
						if(move_uploaded_file($_FILES['pdf']['tmp_name'],$path1.$info_pdf))
						{ 
							move_uploaded_file($_FILES['pdf']['tmp_name'],$path1.$info_pdf);
							
						}
			}
			else
			{
					$info_pdf = $_POST['nombrePDF'];			
			}			
			
			editar_productos($_POST['codigo'],$nombre_producto,$medidas,$idmarca,$seccion,$niveles,$subniveles,$modelo,$idlogo,$descripcion,$codproducto,$imagen_producto,$imagen_promocion,$imagen_detalle,$info_pdf,$promocion);						
			
		}
		
	}
	
?>