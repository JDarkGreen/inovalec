<?php
	
	//print($_POST);
	
	include("../../includes/conexion.php");
	include("funciones.php");
	
	$cn = Conexion();
	
	$idsubseccion		= $_POST['subseccion'];
	$nombre_subseccion  = $_POST['nombre_subseccion'];
	
	$sql_subcategoria  = "SELECT * FROM secciones WHERE idpadre = '".$idsubseccion."' AND seccion = '".$nombre_subseccion."'";
	$rpta_subcategoria = query($sql_subcategoria) or die(mysql_error());	
	$num_filas		   = fetch_array($rpta_subcategoria);	
	
	if(!isset($_POST['editar']))
	{
		if($num_filas>0)
		{
			header("Location:agregar.php?msg=1&idsubseccion=$idsubseccion");
		}
		else
		{		
			agregar_subsecciones($idsubseccion,$nombre_subseccion);
			header("Location:index.php?idsubseccion=$idsubseccion");
		}
	
	}
	
	if(isset($_POST['editar']))
	{
		if($_POST['editar']=='1')
		{
			editar_subsecciones($_POST['codigo'],$idsubseccion,$nombre_subseccion);
			
			header("Location:index.php?idsubseccion=$idsubseccion");
			
		}
		
	}	

?>