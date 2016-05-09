<?php
	@session_start();
	include("../includes/conexion.php");
	
	$cn = Conexion();
	
	$usuario = $_POST['usuario'];
	$clave   = $_POST['clave'];
	
	#$usuario = $_POST['usuario'];
	#$clave   = $_POST['clave'];

	$sql_login = "SELECT * FROM admin WHERE usuario = '".$usuario."'
				  AND clave = '".$clave."'";
				  
	$rpta_login = query($sql_login) or die(mysql_error());
	
	
	if(num_rows($rpta_login)>0)
	{
		$_SESSION['admin_admin'] = $usuario;
		$_SESSION['admin_pass']  = $clave;
		
		header("Location:cpanel.php");
	
	}
	else
	{
		header("Location:index.php?error=1");
	}
	
?>
