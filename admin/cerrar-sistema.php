<?php

	session_start();

	$usuario = $_SESSION['usuario'];
	$clave   = $_SESSION['clave'];

	// removemos las variables de session creadas.
	unset($usuario,$clave);
	
	// destruimos la session.
	session_destroy();		
	
	// redireccionamos al formulario de autenticacion.
	header("Location:index.php");

?>