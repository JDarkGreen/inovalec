<?php

	function agregar_subsecciones($idsubseccion,$nombre_subseccion,$url_subseccion,$estado)
	{
		$sql_agregar  = "INSERT INTO secciones(idpadre,seccion,url_seccion,estado)";
		$sql_agregar .= "VALUES('$idsubseccion','$nombre_subseccion','$url_subseccion','$estado')";
		
		query($sql_agregar,$cn) or die(mysql_error());
	
	}
	
	function editar_subsecciones($codigo,$idsubseccion,$nombre_subseccion,$url_subseccion,$estado)
	{
		$sql_editar  = "UPDATE secciones SET idpadre = '$idsubseccion', seccion = '$nombre_subseccion', ";
		$sql_editar .= "url_seccion = '$url_subseccion', estado = '$estado' WHERE idseccion = '$codigo'";
		
		query($sql_editar,$cn) or die(mysql_error());
		
	}
	
	function borrar_subsecciones($cod)
	{
		$sql_borrar = "DELETE FROM secciones WHERE idseccion = '$cod'";
		query($sql_borrar) or die(mysql_error());
	
	}
	
	function url_amigable($cadena)
	{
		// Sepadador de palabras que queremos utilizar
		$separador = "-";
		// Eliminamos el separador si ya existe en la cadan actual
		$cadena = str_replace($separador, "", $cadena);
		// Remplazo tildes y eЯes
		
		$cadena = strtr($cadena, array('А'=>'a', 'И'=>'e', 'М'=>'i', 'С'=>'o', 'З'=>'u'));//"АИМСЗаимсзЯя", "aeiouAEIOUnN");
		$cadena = strtr($cadena, array('а'=>'a', 'и'=>'e', 'м'=>'i', 'с'=>'o', 'з'=>'u'));
		$cadena = strtr($cadena, array('Я'=>'n', 'я'=>'n'));
		// Convertimos la cadena a minusculas
		$cadena = strtolower($cadena);
		// Remplazo cuarquier caracter que no este entre A-Za-z0-9 por un espacio vacio
		$cadena = trim(ereg_replace("[^ A-Za-z0-9]", "", $cadena));
		// Inserto el separador antes definido
		$cadena = ereg_replace("[ \t\n\r]+", $separador, $cadena);
	
		return $cadena;
		
	}	
	
	function cambiar_estado($idseccion,$idpadre)
	{
		
		$qryEstado = "SELECT * FROM secciones WHERE idseccion ='$idseccion' AND idpadre = '$idpadre'";
		$rptaEstado = query($qryEstado,$cn) or die(mysql_error());
		$rowEstado = fetch_array($rptaEstado);
		
		$estado = ($rowEstado['estado']=='1')?'0':'1';
		//Activar-desactivar 
						
		$sql_edit = "UPDATE secciones SET estado='".$estado."' WHERE idseccion = '$idseccion' AND idpadre = '$idpadre'";
		query($sql_edit,$cn) or die(mysql_error());
		
		
		if($_GET['stUsuario']!=""){
			$b = "&stUsuario=$estado";
		}
			
		return $rptaEstado;
		
	}
	

?>