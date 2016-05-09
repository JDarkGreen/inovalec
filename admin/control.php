<?php

	// funcion para controlar el ingreso de usuarios no autorizados.
	function control_session($usuario)
	{
		if(!isset($usuario))
		{
			header("Location:../index.php");
		}
		
		return $usuario;
	
	}

?>