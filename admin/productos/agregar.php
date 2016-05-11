<?php

	session_start();
	
	include("../../includes/conexion.php");
	include("../../includes/funciones.php");
	include("../ckeditor/ckeditor.php");
	include("../ckfinder/ckfinder.php");
	include("../control.php");	
	
	control_session($_SESSION['admin_admin']);	
	
	$cn = Conexion();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../css/estilos.css"/>
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/ajax.js"></script>
<script>
	function cancelar()
	{
		document.location.href="index.php";
	}
</script>
<title>JBG Electric - Panel de administracion</title>
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
      <p>Agregar Productos</p>
      <div id="regresar_cpanel"> <a href="../cpanel.php">Regresar al Cpanel</a> </div>
   </div>
   <div id="contenido_cpanel">
      <form action="procesar.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
         <table width="858" border="0" cellpadding="2" cellspacing="0">
            <tr>
               <td class="tdrow1">&nbsp;</td>
               <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
               <td width="199" class="tdrow1">Nombre producto</td>
               <td colspan="2"><input name="nombre_producto" type="text" class="formularios" id="nombre_producto" size="90" /></td>
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
                           <td width="240" class="tdrow1">Marcas</td>
                           <td width="159"><!-- Muestro las marcas -->
                              
                              <select name="marcas" class="formularios" id="marcas">
                                 <option value="">--Marcas--</option>
                                 <?php
                  
                        $sql_marcas  = "SELECT * FROM marcas";
                        $rpta_marcas = query($sql_marcas) or die(mysql_error());
                        $row_marcas = fetch_array($rpta_marcas);
                        
                        foreach( $row_marcas as $row_marca )
                        {
                            echo "<option value=".$row_marca['idmarca'].">".$row_marca['nombre_marca']."</option>";	
                        }
                  
                  ?>
                              </select></td>
                           <td width="119" class="tdrow1">Categorias</td>
                           <td width="264"><div id="seccion">
                                 <select name="seccion" class="formularios" id="seccion" onchange="niveles(this.value);">
                                    <option value="">--seleccione--</option>
                                    <?php	
							$padre = ($padre == null) ? 'IS NULL' : ' = ' . $padre;
                            $sql = "SELECT * FROM secciones WHERE idpadre ".$padre." ORDER BY seccion ASC";
                            $rpta = query($sql,$cn) or die(mysql_error());
                            $rows = fetch_array($rpta);
                        
                           foreach( $rows as $row ){
                                    echo "<option value=".$row['idseccion'].">".$row['seccion']."</option>";
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
                                 </select>
                              </div></td>
                           <td class="tdrow1">Niveles</td>
                           <td><div id="subniveles">
                                 <select name="subnivel" class="formularios" id="subnivel">
                                    <option>--Seleccione--</option>
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
               <td colspan="2"><input name="modelo" type="text" class="formularios" id="modelo" size="30" /></td>
            </tr>
            <tr>
               <td class="tdrow1">Logo del fabricante</td>
               <td colspan="2">
               <select name="fabricante" class="formularios" id="fabricante">
                  <option value="">--Fabricante--</option>
                  <?php
                  
                        $sql_fabricante  = "SELECT * FROM logos_marcas";
                        $rpta_fabricante = query($sql_fabricante) or die(mysql_error());
                        $rows_fabricante = fetch_array($rpta_fabricante);

                        foreach( $rows_fabricante as $row_fabricante)
                        {
                            echo "<option value=".$row_fabricante['idlogo'].">".$row_fabricante['imagen_marca']."</option>";	
                        }
                  
                  ?>
               </select></td>
            </tr>
            <tr>
               <td valign="top" class="tdrow1">Descripcion</td>
               <td colspan="2">
				<?php
				
					$initialValue = '';
				
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
               	<!--<textarea name="descripcion" cols="45" rows="5" class="formularios" id="descripcion"></textarea>-->
               </td>
            </tr>
            <tr>
               <td class="tdrow1">Codigo producto</td>
               <td colspan="2"><input name="codproducto" type="text" class="formularios" id="codproducto" size="30" /></td>
            </tr>
            <tr>
               <td class="tdrow1">Imagen producto</td>
               <td colspan="2"><input name="imagen_producto" type="file" class="formularios" id="imagen_producto" />
               <span style="color:#000;">Subir tamaño de 800 x 600</span></td>
            </tr>
            <tr>
               <td class="tdrow1">PDF (Opcional)</td>
               <td colspan="2"><input name="pdf" type="file" class="formularios" id="pdf" /></td>
            </tr>
            <tr>
               <td class="tdrow1">Promoción</td>
               <td colspan="2">
                <input type="radio" name="promocion" id="promocion" value="1" />
                <span style="color:#000000;">Si</span>
                   <input type="radio" name="promocion" id="promocion" value="0" />
                <span style="color:#000000;">No</span>
			  </td>
            </tr>
            <tr>
               <td class="tdrow1">&nbsp;</td>
               <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
               <td class="tdrow1">&nbsp;</td>
               <td width="224" align="center"><input name="button" type="submit" class="boton" id="button" value="Guardar" /></td>
               <td width="405" align="center"><input name="button2" type="button" class="boton" id="button2" onclick="cancelar();" value="Cancelar" /></td>
            </tr>
         </table>
      </form>
   </div>
</div>
</body>
</html>