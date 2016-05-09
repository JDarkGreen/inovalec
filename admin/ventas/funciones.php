<?php

	function borrar_ventas($cod)
	{					
		
		$sql_borrar = "DELETE FROM ventas WHERE idventas = '$cod'";
		query($sql_borrar) or die(mysql_error());
		
		header("Location:index.php");		
		
	}

?>