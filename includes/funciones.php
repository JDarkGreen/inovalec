<?php

/**********************************************************************************************************************************/	
	
	function Banners()
	{
		$sql_banner  = "SELECT * FROM banner ORDER BY idbanner DESC";
		$rpta_banner = query($sql_banner,$cn) or die(mysql_error());
		
		return $rpta_banner;
		
	}	

/**********************************************************************************************************************************/	

	function listar_marcas()
	{
		$sql_lista_marcas  = "SELECT * FROM marcas";
		$rpta_lista_marcas = query($sql_lista_marcas) or die(mysql_error());
		$row_lista_marcas = fetch_array($rpta_lista_marcas);

		foreach ($row_lista_marcas as $marcas) : ?>
		
		<ul class="cuatro_columnas">
    		<li>
    			<a href="marca-inovalec-electric-lima-peru.php?marca=<?= $marcas['idmarca'].'&nom_marca='.$marcas['nombre_marca'].'#marca' ?>"><?= $marcas['nombre_marca'] ?>
    			</a>
    		</li>
    	</ul>

		<?php endforeach;
		
	}
	
/**********************************************************************************************************************************/	
	
	function listar_promociones($portada)
	{
		$sql_listar_promocion  = "SELECT * FROM promociones WHERE portada = '$portada' ORDER BY idpromocion DESC";
		$rpta_listar_promocion = query($sql_listar_promocion) or die(mysql_error());
		
		return $rpta_listar_promocion;
	
	}
	
/**********************************************************************************************************************************/	

	function seccion_marcas($idseccion,$idmarca)
	{
		$sql_niveles    = "SELECT p.*, s.*, m.* FROM productos p, secciones s, marcas m
							WHERE p.idseccion = s.idseccion
							AND p.idmarca = m.idmarca
							AND p.idseccion = '".$idseccion."'
							AND p.idmarca = '".$idmarca."'
							GROUP BY p.niveles ORDER BY s.seccion ASC";
		$rpta_niveles = query($sql_niveles) or die(mysql_error());
		
		return $rpta_niveles;
		
	}

/**********************************************************************************************************************************/	
	
	function subseccion_marcas($idsubseccion,$idmarca)
	{
		$sql_subniveles  = "SELECT p.*, s.*, m.* FROM productos p, secciones s, marcas m
							WHERE p.idseccion = s.idseccion
							AND p.idmarca = m.idmarca
							AND p.niveles = '".$idsubseccion."'
							AND p.idmarca = '".$idmarca."'
							GROUP BY p.subniveles ORDER BY s.seccion ASC";
		$rpta_subniveles = query($sql_subniveles) or die(mysql_error());
		$num_subniveles  = num_rows($rpta_subniveles);
		
		return $rpta_subniveles;
	
	}
	
/***********************************************************************************************************************************/
	
	function productos($subnivel)
	{
		# marca del producto.
		if( isset($_GET['idmarca']) && !empty($_GET['idmarca']) )
		{
			$condicion .= "AND p.idmarca = '".$_GET['idmarca']."'";
		}
		
		# marca del producto.
		if( isset($_GET['idsubnivel']) && !empty($_GET['idsubnivel']) )
		{
			$condicion = "AND p.subniveles = '".$_GET['idsubnivel']."'";
		}			
		
		$sql_productos  = "SELECT p.*, s.*, m.* FROM productos p, secciones s, marcas m
						   WHERE p.idseccion = s.idseccion
						   AND p.idmarca = m.idmarca
						   ".$condicion."";
		$rpta_productos = query($sql_productos) or die(mysql_error());
		
		return $rpta_productos;
		
	}
	
/***********************************************************************************************************************************/

	function mostrarDetalleProducto($producto)
	{
		$sql_detalle_producto  = "SELECT p.*, s.*, m.*, lm.* FROM productos p, secciones s, marcas m, logos_marcas lm
						  		  WHERE p.idseccion = s.idseccion
						  		  AND p.idmarca = m.idmarca
								  AND p.idlogo = lm.idlogo 
						  		  AND idproducto ='$producto'";
		$rpta_detalle_producto = query($sql_detalle_producto) or die(mysql_error());
		
		return $rpta_detalle_producto;
		
	}

/*************************************************************************************************************************************/

	function lista_eventos()
	{
		$sql_eventos  = "SELECT * FROM eventos ORDER BY idevento DESC";
		$rpta_eventos = query($sql_eventos,$cn) or die(mysql_error());								
		
		return $rpta_eventos;
		
	}
	
/*************************************************************************************************************************************/	

	function portadaEventos()
	{
		
		$sql_contenido_evento  = "SELECT * FROM contenido_eventos LIMIT 0,3";
		$rpta_contenido_evento = query($sql_contenido_evento,$cn) or die(mysql_error());								
		
		return $rpta_contenido_evento;
		
	}
	
/*************************************************************************************************************************************/	

	function mostrarPortada()
	{
		$sql_portada  = "SELECT * FROM portada";
		$rpta_portada = query($sql_portada) or die(mysql_error());
		
		while($row_portada = fetch_array($rpta_portada))
		{
			echo '<li><img src="portada/'.$row_portada['imagen_portada'].'" alt="" class="sombra" /></li>';	
		}
		
	}

/*************************************************************************************************************************************/
	
	function logosMarcas()
	{
		$sql_logos   = "SELECT * FROM logos_marcas";
		$rpta_logos = query($sql_logos) or die(mysql_error());
		
		return $rpta_logos;
		
	}
	
/*************************************************************************************************************************************/		

	function resultadosBusqueda($buscar)
	{
		if( isset($_GET['buscar']) )
		{
			$buscar     = $_GET['buscar'];
			$a 			= "&buscar=$buscar";
			$condicion  = "AGAINST( '$buscar' IN BOOLEAN MODE )";
		}else{
			$a 			= "&buscar=$buscar";
			$condicion  = "AGAINST( '$buscar' IN BOOLEAN MODE )";
		}

		//SETEAMOS VARIABLES
		$resto = 0;

		$registros = 15;
		$pagina    = isset($_GET['pagina']) && !empty($_GET['pagina']) ? $_GET['pagina'] : "";
		
		if ( empty($pagina) ) { 
			$inicio = 0; 
			$pagina = 1; 
		}else{ 
			$inicio = ( $pagina - 1) * $registros; 
		}
		
		# Primera consulta.
		$sql_buscar  = "SELECT p.idmarca , p.idproducto, p.nombre_producto, p.codigo_prod, p.niveles, p.subniveles, p.imagen, m.nombre_marca, 
						s.seccion FROM productos p
						INNER JOIN marcas m ON m.idmarca = p.idmarca
						INNER JOIN secciones s ON s.idseccion = p.idseccion 
						WHERE p.nombre_producto LIKE '%$buscar%' OR m.nombre_marca LIKE '%$buscar%'";	

		$rpta_buscar     = query($sql_buscar);
		$total_registros = num_rows($rpta_buscar);

		/**
		* Si los registros están vacios
 		**/
 		if( $total_registros == 0 )
 		{
 			echo "<h2> No hay resultados para mostrar. Puede consultar otro producto </h2>";
 		}
		
		# Segunda consulta.
		if ($buscar<>'')
		{
		   //CUENTA EL NUMERO DE PALABRAS
		   $trozos = explode(" ",$buscar);
		   $numero = count($trozos);
		  if ($numero==1) 
		  {
		   //SI SOLO HAY UNA PALABRA DE BUSQUEDA SE ESTABLECE UNA INSTRUCION CON LIKE
		  $cadbusca="SELECT p.idmarca , p.idproducto, p.nombre_producto, p.codigo_prod, p.niveles, p.subniveles, p.imagen, m.nombre_marca, 
					  s.seccion FROM productos p
					  INNER JOIN marcas m ON m.idmarca = p.idmarca
					  INNER JOIN secciones s ON s.idseccion = p.idseccion 
		   			  WHERE p.nombre_producto LIKE '%$buscar%' OR m.nombre_marca LIKE '%$buscar%'
					  LIMIT $inicio, $registros";
		  } 
		  elseif ($numero > 1 ) 
		  {
		  //SI HAY UNA FRASE SE UTILIZA EL ALGORTIMO DE BUSQUEDA AVANZADO DE MATCH AGAINST
		  //busqueda de frases con mas de una palabra y un algoritmo especializado
		  $cadbusca = "SELECT p.idmarca , p.idproducto, p.nombre_producto, p.codigo_prod, p.niveles, p.subniveles, p.imagen, m.nombre_marca, 
					   s.seccion FROM productos p
					   INNER JOIN marcas m ON m.idmarca = p.idmarca
					   INNER JOIN secciones s ON s.idseccion = p.idseccion
					
					   WHERE MATCH 
					   (
						p.nombre_producto, m.nombre_marca
					   )
					   ".$condicion."LIMIT $inicio, $registros";
		  }
		  
		}
				
		$rpta_buscarProductos = query($cadbusca) or die(mysql_error());		
		$total_paginas        = ceil($total_registros / $registros);
		
		echo "<table class='containerTable__search' align='left' border = '0'>";
		
		$columnes = 3; # Número de columnas (variable)

		//OBTENER TODOS LOS RESULTADOS EN UN ARRAY 
		$array_products_found = fetch_array($rpta_buscarProductos);

		#var_dump($array_products_found);exit;

		for ( $i = 1 ; $i <= count($array_products_found) ; $i++) 
		{	
		
			//OBTENER DATOS DE CADA PRODUCTO Y SETEARLO EN LA VARIABLE ROW
			$row = array();
			$row = $array_products_found[ $i - 1 ];

			// subseccion.
			$sql_dato1  = "SELECT s.seccion as subseccion FROM secciones s WHERE s.idseccion='".$row['niveles']."'";

			$rpta_dato1 = query($sql_dato1) or die(mysql_error());
			$fila_dato1 = fetch_array($rpta_dato1);
			$fila_dato1 = $fila_dato1[0];

			
			// subniveles.
			$sql_dato2 = "SELECT s.seccion as subnivel FROM secciones s WHERE s.idseccion='".$row['subniveles']."'";
			$rpta_dato2 = query($sql_dato2) or die(mysql_error());
			$fila_dato2 = fetch_array($rpta_dato2);			
			$fila_dato2 = $fila_dato2[0];			

			$resto = ($i % $columnes); # Número de celda del <tr> en que nos encontramos
			
			if ($resto == 1) 
			{
				echo "<tr>"; # Si es la primera celda, abrimos <tr>
			}
		?>

		<!-- Filas y celdas para mostrar los resultados -->
		<td class="container-cell">
			<!-- Tabla Interior -->
			<table> 
				<!-- Imagen de producto -->
				<td width="25%">
					<img src="images/productos/<?= $row['imagen']; ?>" style="width:84px; height: auto;" />
				</td> <!--/ -->
				<!-- Detalles de producto -->
				<td width="75%">
					<!-- Nombre -->
					<h3 class="productName"> 
						<a href="<?= 'inovalec-electric-detalle-producto-lima-peru.php?idmarca='.$row['idmarca'].'&idseccion='.$row['idproducto'].'&nom_marca='.$row['nombre_marca'].'&seccion='.$row['seccion'].'&subseccion='.$fila_dato1['subseccion'].'&subnivel='.$fila_dato2['subnivel'].'&producto='.$row['idproducto'] ?>">
						<?= $row['nombre_producto']; ?>
						</a>  
					</h3> <!--/productName -->

					<!-- Codigo -->
					<p><strong>Código: <?= $row['codigo_prod']; ?></strong></p> 

					<!-- Marca -->
					<p><strong>Marca: <?= $row['nombre_marca']; ?></strong></p> 

				</td> <!--/ -->

			</table> <!-- /table -->
		</td>
				
		<?php

			if ($resto == 0)
			{
				echo "</tr>";
			} # Si es la última celda, cerramos </tr>
		
		}
		
		if ($resto <> 0) # Si el resultado no es múltiple de $columnes acabamos de rellenar los huecos
		{ 
			$ajust = $columnes - $resto; # Número de huecos necesarios
		
			for ($j = 0; $j < $ajust; $j++) 
			{
				echo "<td>&nbsp;</td>";
			}
			
			echo "</tr>"; # Cerramos la última línea </tr>
			
		}
		
		echo "</table>";

		echo "<div style='clear:both'></div>";
		
		echo '<div id="paginacion">';
		
			echo "<div id = \"pag\">";
			
			#mysql_free_result($rpta_buscarProductos);				
			
			#pregunto si hay resultados para paginar.
			
			if($total_registros) 
			{
			
				if(($pagina - 1) > 0) 
				{
					echo "<a href=\"sumelect-resultado-busqueda-productos-peru.php?pagina=".($pagina-1)."$a\">< </a>";
					
				}
				
				
				for ( $i=1; $i<=$total_paginas; $i++)
				{ 
					if ($pagina == $i) 
					{
						echo "<a class='sel' href = 'javascript:void(0);'>".$pagina."</a>";
				
					} 
					else 
					{
						echo "<a href=\"inovalec-electric-resultados-busqueda-lima-peru.php?pagina=$i$a\" >".$i."</a>";
				
					}	
				}
				
				if(($pagina + 1)<=$total_paginas) 
				{
					echo "<a href=\"sumelect-resultado-busqueda-productos-peru.php?pagina=".($pagina+1)."$a\"> ></a>";
				}
			
			}
			else{ }
			
			echo "</div>";
		
		echo '</div>';
		
		//return $rs_rpta_eventos;
		return true;
	}
	
/***********************************************************************************************************************************/	

	function recortar_texto($string, $longitud = 350) {
	//Comprobamos que sea necesario recortar la cadena de texto
		if((mb_strlen($string) > $longitud)) {
			$espacios = mb_strpos($string, ' ', $longitud) - 1;
			if($espacios > 0) {
				$char = count_chars(mb_substr($string, 0, ($espacios + 1)), 1);
				if ($char[ord('<')] > $char[ord('>')]) {
					$espacios = mb_strpos($string, ">", $espacios) - 1;
				}
				$string = mb_substr($string, 0, ($espacios + 1)).'...';
			}
			if(preg_match_all("|(<([\w]+)[^>]*>)|", $string, $buffer)) {
				if(!empty($buffer[1])) {
					preg_match_all("|</([a-zA-Z]+)>|", $string, $buffer2);
					if(count($buffer[2]) != count($buffer2[1])) {
						$tags = array_diff($buffer[2], $buffer2[1]);
						$tags = array_reverse($tags);
						foreach($tags as $tag) {
								$string .= '</'.$tag.'>';
						}
					}
				}
			}
		}
		
		return $string;
	}
	
/***********************************************************************************************************************************/	
	
	function recortar_texto_eventos($string, $longitud = 200) {
	//Comprobamos que sea necesario recortar la cadena de texto
		if((mb_strlen($string) > $longitud)) {
			$espacios = mb_strpos($string, ' ', $longitud) - 1;
			if($espacios > 0) {
				$char = count_chars(mb_substr($string, 0, ($espacios + 1)), 1);
				if ($char[ord('<')] > $char[ord('>')]) {
					$espacios = mb_strpos($string, ">", $espacios) - 1;
				}
				$string = mb_substr($string, 0, ($espacios + 1)).'...';
			}
			if(preg_match_all("|(<([\w]+)[^>]*>)|", $string, $buffer)) {
				if(!empty($buffer[1])) {
					preg_match_all("|</([a-zA-Z]+)>|", $string, $buffer2);
					if(count($buffer[2]) != count($buffer2[1])) {
						$tags = array_diff($buffer[2], $buffer2[1]);
						$tags = array_reverse($tags);
						foreach($tags as $tag) {
								$string .= '</'.$tag.'>';
						}
					}
				}
			}
		}
		
		return $string;
	}	
	
/****************************************************************************************************************************************/	

	function recortar_texto_menu_detalle($string, $longitud = 15) {
	//Comprobamos que sea necesario recortar la cadena de texto
		if((mb_strlen($string) > $longitud)) {
			$espacios = mb_strpos($string, ' ', $longitud) - 1;
			if($espacios > 0) {
				$char = count_chars(mb_substr($string, 0, ($espacios + 1)), 1);
				if ($char[ord('<')] > $char[ord('>')]) {
					$espacios = mb_strpos($string, ">", $espacios) - 1;
				}
				$string = mb_substr($string, 0, ($espacios + 1)).'...';
			}
			if(preg_match_all("|(<([\w]+)[^>]*>)|", $string, $buffer)) {
				if(!empty($buffer[1])) {
					preg_match_all("|</([a-zA-Z]+)>|", $string, $buffer2);
					if(count($buffer[2]) != count($buffer2[1])) {
						$tags = array_diff($buffer[2], $buffer2[1]);
						$tags = array_reverse($tags);
						foreach($tags as $tag) {
								$string .= '</'.$tag.'>';
						}
					}
				}
			}
		}
		
		return $string;
	}
	
/****************************************************************************************************************************************/

	function agregarVenta($empresa,$telefono,$email,$fecha)
	{
		$sql_agregarventa = "INSERT INTO ventas(empresa,telefono,email,fecha)VALUES('$empresa','$telefono','$email','$fecha')";
		query($sql_agregarventa);

	}
	
/****************************************************************************************************************************************/

	function enviarSolicitudVenta($idventas,$cantidad,$producto,$marca)
	{
		$sql_enviarsolicitud  = "INSERT INTO cotizar_ventas(idventas,cantidad,producto,marca)";
		$sql_enviarsolicitud .=	"VALUES('$idventas','$cantidad','$producto','$marca')";
		
		query($sql_enviarsolicitud) or die(mysql_error());
		
	}	
	
?>