<?php
	include("../../includes/conexion.php");
	include("../../includes/funciones.php");
	
	$cn = Conexion();
	
?>
<select name="subsecciones" class="objetoformulario" id="subsecciones" onchange="niveles(this.value);">
<option value="0">--seleccione--</option>
    <?php
		$id = $_GET["idpadre"];
		if($id!="0" )
		{
			$condicion .= "WHERE idpadre='".$id."'";
		}	
		
		$sql  = "SELECT * FROM secciones ".$condicion."";
		$rpta = query($sql) or die(mysql_error());
		$rows = fetch_array($rpta);
    
    ?>	
	<?php
			foreach( $rows as $row ){
				echo "<option value=".$row['idseccion'].">".$row['seccion']."</option>";
			}
	?>
</select>