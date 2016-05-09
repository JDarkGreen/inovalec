<?php
	
	session_start();
	include("../../includes/conexion.php");
	include("../../includes/funciones.php");
	include("../ckeditor/ckeditor.php");
	include("../ckfinder/ckfinder.php");	
	include("../control.php");
	
	// definimos la funcion control_session.
	control_session($_SESSION['admin_admin']);	
	
	$cn = Conexion();
	
	$sql_editar  = "SELECT * FROM productos WHERE idproducto = '".$_GET['idproducto']."'";
	$rpta_editar = query($sql_editar) or die(mysql_error());
	$fila		 = fetch_array($rpta_editar);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/ajax.js"></script>
<script type="text/javascript">
	function cancelar()
	{
		document.location.href="index.php";
	}
</script>
<title>JBG Electric - Panel de administracion</title>
<link rel="stylesheet" type="text/css" href="../css/estilos.css"/>
</head>

<body>
<div id="contenedor">
<div id="cuerpo_cpanel">
   <div id="cabecera_titulo">
      <p><?php echo "Bienvenido ".$_SESSION['admin_admin']; ?></p>
      <div id="cabecera_salir"> <a href="../cerrar-sistema.php">Cerrar sesion</a></div>
   </div>
   <div id="cabecera_portada"> </div>
   <div id="titulo_cpanel">
      <p>Editar Productos</p>
      <div id="regresar_cpanel"> <a href="../cpanel.php">Regresar al Cpanel</a> </div>
   </div>
   <div id="contenido_cpanel">
      <form action="procesar.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
         <input type = "hidden" name = "editar" id = "editar" value = "1" />
         <input type = "hidden" name = "codigo" id = "codigo" value = "<?=$_GET['idproducto']; ?>" />
         <input name = "nombreFoto" type="hidden" value="<?php echo $fila['imagen']; ?>" />
         <input name = "nombreFotoPromocion" type="hidden" value="<?php echo $fila['imagen_promocion']; ?>" />
         <input name = "nombreFotoDetalle" type="hidden" value="<?php echo $fila['imagen_detalle']; ?>" />                  
         <input name = "nombrePDF" type="hidden" value="<?php echo $fila['pdf']; ?>" />         
         <table width="858" border="0" cellpadding="2" cellspacing="0">
            <tr>
               <td width="199" class="tdrow1">Nombre producto</td>
               <td colspan="2"><input name="nombre_producto" type="text" class="formularios" id="nombre_producto" value="<?php echo $fila['nombre_producto']; ?>" size="90" /></td>
            </tr>
            <tr>
               <td>&nbsp;</td>
               <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
               <td colspan="3"><fieldset>
                     <legend>Secciones </legend>
                     <table width="850" border="0" cellpadding="2" cellspacing="2">
                        <tr>
                           <td width="96" class="tdrow1">Marcas</td>
                           <td width="261"><!-- Muestro las marcas -->
                              
                              <select name="marcas" class="formularios" id="marcas">
                                 <option value="">--Marcas--</option>
                                 <?php
                  
								$sql_marcas  = "SELECT * FROM marcas";
								$rpta_marcas = query($sql_marcas) or die(mysql_error());
								
								while($row_marcas = fetch_array($rpta_marcas)){
									echo "<option value='".$row_marcas['idmarca']."'";
									if($fila['idmarca'] == $row_marcas['idmarca']){	
										echo "selected";
									}
										echo ">".$row_marcas['nombre_marca']."</option>";
								}								
                  
                  			?>
                              </select></td>
                           <td width="96" class="tdrow1">Categorias</td>
                           <td width="439"><div id="seccion">
                                 <select name="seccion" class="formularios" id="seccion" onchange="niveles(this.value);">
                                    <option value="">--seleccione--</option>
                                    <?php	
								$padre = ($padre == null) ? 'IS NULL' : ' = ' . $padre;
								$sql = "SELECT * FROM secciones WHERE idpadre ".$padre." ORDER BY seccion ASC";
								$rpta = query($sql,$cn) or die(mysql_error());
                        
								while($row = fetch_array($rpta)){
									echo "<option value='".$row['idseccion']."'";
									if($fila['idseccion'] == $row['idseccion']){	
										echo "selected";
									}
										echo ">".$row['seccion']."</option>";
								}						
						
                        	  ?>
                                 </select>
                              </div></td>
                        </tr>
                        <tr>
                           <td class="tdrow1">Subcategorias</td>
                           <td><div id="niveles">
                                 <select name="nivel" class="formularios" id="nivel">
                                    <option>--Seleccione--</option>
                                    <?php
                                $id = $_GET["seccion"];
                                if($id!="0" )
                                {
                                    $condicion .= "WHERE idpadre='".$id."'";
                                }	
                                
                                $sql_subseccion  = "SELECT * FROM secciones ".$condicion."";
                                $rpta_subseccion = query($sql_subseccion,$cn) or die(mysql_error());
                            	
								while($row_subseccion = fetch_array($rpta_subseccion))
								{
									echo "<option value='".$row_subseccion['idseccion']."'";
									if($fila['niveles'] == $row_subseccion['idseccion'])
									{	
										echo "selected";
									}
										echo ">".$row_subseccion['seccion']."</option>";
								}						
								
                            ?>
                                 </select>
                              </div></td>
                           <td class="tdrow1">Niveles</td>
                           <td><div id="subniveles">
                                 <select name="subnivel" class="formularios" id="subnivel">
                                    <option>--Seleccione--</option>
                                    <?php
                                $id1 = $_GET["subseccion"];
                                if($id1!="0" )
                                {
                                    $condicion1 .= "WHERE idpadre='".$id1."'";
                                }	
                                
                                $sql_niveles  = "SELECT * FROM secciones ".$condicion1."";
                                $rpta_niveles = query($sql_niveles,$cn) or die(mysql_error());
                            	
								while($row_niveles = fetch_array($rpta_niveles))
								{
									echo "<option value='".$row_niveles['idseccion']."'";
									if($fila['subniveles'] == $row_niveles['idseccion'])
									{	
										echo "selected";
									}
										echo ">".$row_niveles['seccion']."</option>";
								}						
								
                            ?>
                                 </select>
                              </div></td>
                        </tr>
                     </table>
                  </fieldset></td>
            </tr>
            <tr>
               <td>&nbsp;</td>
               <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
               <td class="tdrow1">Modelo</td>
               <td colspan="2"><input name="modelo" type="text" class="formularios" id="modelo" value="<?php echo $fila['modelo']; ?>" size="30" /></td>
            </tr>
            <tr>
               <td class="tdrow1">Logo del fabricante</td>
               <td colspan="2">
               <select name="fabricante" class="formularios" id="fabricante">
                  <option value="">--Fabricante--</option>
                  <?php
				  
                        $sql_fabricante  = "SELECT * FROM logos_marcas";
                        $rpta_fabricante = query($sql_fabricante) or die(mysql_error());
                        
						while($row_fabricante = fetch_array($rpta_fabricante)){
							echo "<option value='".$row_fabricante['idlogo']."'";
							if($fila['idlogo'] == $row_fabricante['idlogo']){	
								echo "selected";
							}
								echo ">".$row_fabricante['imagen_marca']."</option>";
						}						
                  
                  ?>
               </select>
              </td>
            </tr>
            <tr>
               <td valign="top" class="tdrow1">Descripcion</td>
               <td colspan="2">
				<?php
				
					$initialValue = $fila['descripcion'];
				
					$ckeditor = new CKEditor() ;
					$ckeditor->basePath	= '../ckeditor/';
					// Configuration that will be used only by the second editor.
					$ckeditor->config['toolbar'] = array(
						array( 'Source','Bold', 'Italic', 'Underline','-','Cut','Copy','Paste','PasteText','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','Table'),
						array( 'Image','Link', 'Unlink')
					);	
					$ckeditor->config['skin']  = 'office2003';
					$ckeditor->config['width'] = 680;
					$ckeditor->config['height'] = 300;
				
					// Just call CKFinder::SetupCKEditor before calling editor(), replace() or replaceAll()
					// in CKEditor. The second parameter (optional), is the path for the
					// CKFinder installation (default = "/ckfinder/").
					CKFinder::SetupCKEditor($ckeditor, '../ckfinder/');
					
					$ckeditor->editor('descripcion', $initialValue);
                
            	?>               
               </td>
            </tr>
            <tr>
               <td class="tdrow1">Codigo producto</td>
               <td colspan="2"><input name="codproducto" type="text" class="formularios" id="codproducto" value="<?php echo $fila['codigo_prod']; ?>" size="30"/></td>
            </tr>
            <tr>
               <td class="tdrow1">&nbsp;</td>
               <td colspan="2"><img src="../../images/productos/<?php echo $fila['imagen']; ?>" width="100" /></td>
            </tr>
            <tr>
               <td class="tdrow1">Imagen producto</td>
               <td colspan="2"><input name="imagen_producto" type="file" class="formularios" id="imagen_producto" />
               <span style="color:#000;">Subir tamaño de 800 x 600</span>
               </td>
            </tr>
            <tr>
               <td class="tdrow1">PDF (Opcional)</td>
               <td colspan="2"><input name="pdf" type="file" class="formularios" id="pdf" /></td>
            </tr>
            <tr>
               <td class="tdrow1">Promoción</td>
               <td colspan="2"><input type="radio" name="promocion" id="promocion" value="1" 
		<?php 
        if($fila['promocion']=='1')
        {
        	echo "checked='checked'";
        }
		
        ?>      
      />
<span style="color:#000000;">Si</span>
   <input type="radio" name="promocion" id="promocion" value="0" 
		<?php 
        if($fila['promocion']=='0')
        {
        	echo "checked='checked'";
        }
		
        ?>    
    />
<span style="color:#000000;">No </span>
			  </td>
            </tr>
            <tr>
               <td class="tdrow1">&nbsp;</td>
               <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
               <td class="tdrow1">&nbsp;</td>
               <td width="224" align="center"><input name="button" type="submit" class="boton" id="button" value="Guardar" /></td>
               <td width="498" align="center"><input type="button" class="boton" onclick="cancelar();" value="Cancelar" /></td>
            </tr>
         </table>
      </form>
   </div>
</div>
</body>
</html>