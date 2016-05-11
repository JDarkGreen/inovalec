<?php
	include("../../includes/conexion.php");
	include("../../includes/funciones.php");
	
	$cn = Conexion();
	
?>
<select name="seccion" class="objetoformulario" id="seccion" onchange="niveles(this.value);">
<option value="0">--seleccione--</option>
    <?php
		$id = $_GET["idmarca"];
		if($id!="0" )
		{
			$condicion .= "WHERE idmarca='".$id."'";
		}	
		
    	echo $sql = "SELECT * FROM secciones ".$condicion."";
		$rpta = query($sql,$cn) or die(mysql_error());
		$rows = fetch_array($rpta);
    
    ?>	
	<?php
			foreach( $rows as $row){
				echo "<option value=".$row['idseccion'].">".$row['seccion']."</option>";
			}
	?>
</select>