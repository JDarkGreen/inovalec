<?php
	include("../../includes/conexion.php");
	include("../../includes/funciones.php");
	
	$cn = Conexion();
	
?>
<select name="subcategoria" class="objetoformulario" id="subcategoria">
<option value="0">--seleccione--</option>
    <?php
		$id = $_GET["idpadre"];
		if($id!="0" )
		{
			$condicion .= "WHERE idpadre='".$id."'";
		}	
		
    	$sql = "SELECT * FROM eventos ".$condicion." ORDER BY categoria ASC LIMIT 1,2";
		$rpta = query($sql,$cn) or die(mysql_error());
    
    ?>	
	<?php
			while ($row = fetch_array($rpta)){
				echo "<option value=".$row['idcategoria'].">".$row['categoria']."</option>";
			}
	?>
</select>