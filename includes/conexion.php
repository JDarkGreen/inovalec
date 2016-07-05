<?php

	/* tomamos como referencia el ejemplo 2 utilizando las constantes qu han sido definidas. */
	
	#define("SERVIDOR","localhost");
	#define("USUARIO","electric_user");
	#define("CLAVE","coyote13579");
	#define("BASE_DATOS","electric_jbg");
	
	#SERVIDOR INOVALES
	#define("SERVIDOR","localhost");
	#define("USUARIO","inovalec_user");
	#define("CLAVE","coyote13579");
	#define("BASE_DATOS","inovalec_db");	

	#LOCALHOST
	define("SERVIDOR","localhost");
	define("USUARIO","root");
	define("CLAVE","");
	define("BASE_DATOS","inovalec");
	
	// ruta absoluta del servidor.
	
	$host = $_SERVER['HTTP_HOST'];
	$uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
	$base = "http://" . $host . $uri . "/";
	
	define("RUTA_SERVIDOR",$base);
	
	/*|*****************************************************************************|*/
	/*|*****************************************************************************|*/
	
	function Conexion()
	{
		try {
			$conn = new PDO("mysql:host=".SERVIDOR.";dbname=".BASE_DATOS,USUARIO,CLAVE);
			//echo "Conexión realizada con éxito !!!";
		}
		catch (PDOException $ex) {
			echo $ex->getMessage();
			exit;
		}	
	   
	    return $conn;
	}
	
	// ejecuta la query cargada en $sql.
	function query($sql)
	{
		$conn   = Conexion(); 
		$result = $conn->query($sql);
		return $result;
	}
	
	// retorna el numero de filas del result_set ($result)
	function fetch_array($result)
	{
		$conn = Conexion();
		$fila = $result->fetchAll();
		return $fila;
	}
	
	// retorna el numero de filas del result_set ($result)
	function num_rows($result)
	{
		$conn     = Conexion();
		$num_rows = $result->rowCount();
		return $num_rows;
	}

	//retorna el ultimo id de la consulta hecha
	function last_id_pdo(){
		$conn  = Conexion(); 
		return $conn->lastInsertId();
	}	

?>