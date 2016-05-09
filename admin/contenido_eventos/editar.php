<?php
	
	session_start();
	include("../../includes/conexion.php");
	include("../ckeditor/ckeditor.php");
	include("../ckfinder/ckfinder.php");	
	include("../control.php");	
	
	// definimos la funcion control_session.
	control_session($_SESSION['admin_admin']);	
	
	// Definimos la variable de conexion.
	$cn = Conexion();	
	
	$sql_editar    = "SELECT * FROM contenido_eventos WHERE idevento = '".$_GET['idevento']."'";
	$rpta_editar   = query($sql_editar) or die(mysql_error());
	$fila		   = fetch_array($rpta_editar);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../css/estilos.css"/>
<link rel="stylesheet" type="text/css" href="../css/reset.css"/>
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/ajax.js"></script>
<script>
	function cancelar()
	{
		document.form1.action="index.php";
		document.form1.submit();
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
      <p>Editar Noticia</p>
      <div id="regresar_cpanel"> <a href="../cpanel.php"> Regresar al Cpanel </a> </div>
   </div>
   <div id="contenido_cpanel">
      <form id="form1" name="form1" method="post" action="procesar.php">
         <input type = "hidden" name = "editar" id = "editar" value = "1" />
         <input type="hidden" name="codigo" id="codigo" value="<?php echo $_GET['idevento']; ?>" />
         <table width="858" border="0" align="center" cellpadding="2" cellspacing="0">
            <tr>
               <td class="tdrow1">Categoria</td>
               <td colspan="2">
					<select name="categoria" class="formularios" id="categoria" onchange="ver_subseccion(this.value);">
                     <option value="0">--Seleccione--</option>
				 	 <?php
                    
                        $padre 			= ($padre == null) ? 'IS NULL' : ' = ' . $padre;
                        $sql_categoria  = "SELECT * FROM eventos WHERE idpadre ".$padre." ORDER BY categoria ASC";
                        $rpta_categoria = query($sql_categoria,$cn) or die(mysql_error());
                        
                        while($row_categoria = fetch_array($rpta_categoria))
                        {
                            echo "<option value='".$row_categoria['idcategoria']."'";
                            if($fila['idcategoria'] == $row_categoria['idcategoria']){	
                                echo "selected";
                            }
                                echo ">".$row_categoria['categoria']."</option>";
                        }
                    
                    ?>
                  </select>               
               </td>
            </tr>
            <tr>
               <td class="tdrow1">Subcategoria</td>
               <td colspan="2">
					<div id="subseccion">
                     <select name="subcategoria" class="formularios" id="subcategoria">
                        <option value="0">--Seleccione--</option>
                        <?php            
							$sql_subcategoria  = "SELECT * FROM eventos WHERE idpadre = '".$fila['idcategoria']."' AND idcategoria = '3'";
							$rpta_subcategoria = query($sql_subcategoria,$cn) or die(mysql_error());
							
							while($row_subcategoria = fetch_array($rpta_subcategoria))
							{
								echo "<option value='".$row_subcategoria['idcategoria']."'";
								if($fila['subcategoria'] == $row_subcategoria['idcategoria']){	
									echo "selected";
								}
									echo ">".$row_subcategoria['categoria']."</option>";
							}
						
						?>
                     </select>
                  </div>               
               </td>
            </tr>
            <tr>
               <td width="178" class="tdrow1">Titulo Noticia</td>
               <td colspan="2"><input name="titulo_evento" type="text" class="formularios" id="titulo_evento" value="<?php echo $fila['titulo_evento']; ?>" size="70" /></td>
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
                    array( 'Source','Bold', 'Italic', 'Underline', 'TextColor', 'Format' ,'-','Cut','Copy','Paste','PasteText','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','Table','BulletedList'),
                    array( 'Image','Link', 'Unlink')
                );	
                $ckeditor->config['skin']  = 'office2003';
                $ckeditor->config['width'] = 750;
                $ckeditor->config['height'] = 470;
            
                // Just call CKFinder::SetupCKEditor before calling editor(), replace() or replaceAll()
                // in CKEditor. The second parameter (optional), is the path for the
                // CKFinder installation (default = "/ckfinder/").
                CKFinder::SetupCKEditor($ckeditor, '../ckfinder/');
                
                $ckeditor->editor('descripcion', $initialValue);
                
            ?></td>
            </tr>
            <tr>
               <td class="tdrow3">&nbsp;</td>
               <td width="355" align="center"><input name="button" type="submit" class="boton" id="button" value="Guardar" /></td>
               <td width="317" align="center"><input type="button" class="boton" onclick="cancelar();" value="Cancelar" /></td>
            </tr>
         </table>
      </form>
   </div>
</div>
</body>
</html>