<?php
	
	//print($_POST);
	
	include("../../includes/conexion.php");
	include("funciones.php");
	
	$cn = Conexion();
	
	$idsubseccion      = $_POST['subseccion'];
	$nombre_subseccion = $_POST['nombre_subseccion'];
	$url_subseccion    = url_amigable($nombre_subseccion);
	$estado            = $_POST['estado'];
	
	$sql_subcategoria  = "SELECT * FROM secciones WHERE idpadre = '".$idsubseccion."' AND seccion = '".$nombre_subseccion."'";
	$rpta_subcategoria = query($sql_subcategoria) or die(mysql_error());	
	$num_filas		   = fetch_array($rpta_subcategoria);	
	
	if(!isset($_POST['editar']))
	{
		if( count($num_filas) >0 )
		{
			header("Location:agregar.php?msg=1&idsubseccion=$idsubseccion");
		}
		else
		{		
			agregar_subsecciones($idsubseccion,$nombre_subseccion,$url_subseccion,$estado);
			header("Location:index.php?idsubseccion=$idsubseccion");
		}
	
	}
	else
	{
		if($_POST['editar']=='1')
		{
			editar_subsecciones($_POST['codigo'],$idsubseccion,$nombre_subseccion,$url_subseccion,$estado);
			
			header("Location:index.php?idsubseccion=$idsubseccion");
			
		}
		
	}	

?>