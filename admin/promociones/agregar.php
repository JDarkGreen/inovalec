<?php
	
	session_start();
	include("../../includes/conexion.php");
	include("../ckeditor/ckeditor.php");
	include("../ckfinder/ckfinder.php");
	include("../control.php");
	
	$cn = Conexion();
	
	// definimos la funcion control_session.
	control_session($_SESSION['admin_admin']);	

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
      <p>Agregar Promoción</p>
      <div id="regresar_cpanel"> <a href="../cpanel.php"> Regresar al Cpanel </a> </div>
   </div>
   <div id="contenido_cpanel">
      <form action="procesar.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
         <table width="860" border="0" align="center" cellpadding="2" cellspacing="2">
            <tr>
               <td class="tdrow1">Categoria</td>
               <td colspan="2">
				<select name="categoria" class="formularios" id="categoria" onchange="ver_subseccionEventos(this.value);">
                     <option value="0">--Seleccione--</option>
                     <?php
					             	
						$padre 			= ($padre == null) ? 'IS NULL' : ' = ' . $padre;
						$sql_categoria  = "SELECT * FROM eventos WHERE idpadre ".$padre." ORDER BY categoria ASC";
						$rpta_categoria = query($sql_categoria,$cn) or die(mysql_error());
						
						while($row_categoria = fetch_array($rpta_categoria))
						{
							echo "<option value='".$row_categoria['idcategoria']."'>".$row_categoria['categoria']."</option>";
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
                     </select>
                   </div>
               </td>
            </tr>
            <tr>
               <td width="158" class="tdrow1">Titulo evento</td>
               <td colspan="2"><input name="titulo_promocion" type="text" class="formularios" id="titulo_promocion" size="70" /></td>
            </tr>
            <tr>
              <td class="tdrow1">Imagen promoción</td>
              <td colspan="2"><input name="imagen_promocion" type="file" class="formularios" id="imagen_promocion" /></td>
            </tr>
            <tr>
              <td valign="top" class="tdrow1">Sumilla</td>
              <td colspan="2" valign="top">
			  <?php
                $initialValue = '';
            
                $ckeditor = new CKEditor() ;
                $ckeditor->basePath	= '../ckeditor/';
                // Configuration that will be used only by the second editor.
                $ckeditor->config['toolbar'] = array(
                    array( 'Source','Bold', 'Italic', 'Underline', 'TextColor', 'Format' ,'-','Cut','Copy','Paste','PasteText','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','Table','BulletedList'),
                    array( 'Image','Link', 'Unlink')
                );	
                $ckeditor->config['skin']  = 'office2003';
                $ckeditor->config['width'] = 750;
                $ckeditor->config['height'] = 270;
            
                // Just call CKFinder::SetupCKEditor before calling editor(), replace() or replaceAll()
                // in CKEditor. The second parameter (optional), is the path for the
                // CKFinder installation (default = "/ckfinder/").
                CKFinder::SetupCKEditor($ckeditor, '../ckfinder/');
                
                $ckeditor->editor('sumilla', $initialValue);
                
            ?></td>
           </tr>
            <tr>
               <td valign="top" class="tdrow1">Descripcion</td>
               <td colspan="2" valign="top">
			   <?php
                $initialValue2 = '';
            
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
                
                $ckeditor->editor('descripcion', $initialValue2);
                
            ?></td>
            </tr>
            <tr>
              <td valign="top" class="tdrow1">Portada ?.</td>
              <td colspan="2"><input type="radio" name="portada" id="portada" value="1" />
                <span style="color:#000000;">Si</span>
                <input type="radio" name="portada" id="portada" value="0" />
              <span style="color:#000000;">No</span></td>
            </tr>
            <tr>
               <td class="tdrow3">&nbsp;</td>
               <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
               <td class="tdrow3">&nbsp;</td>
               <td width="380" align="center"><input name="button" type="submit" class="boton" id="button" value="Guardar" /></td>
               <td width="302" align="center"><input name="button2" type="button" class="boton" value="Cancelar" onclick="cancelar();" /></td>
            </tr>
         </table>
      </form>
   </div>
</div>
</body>
</html>