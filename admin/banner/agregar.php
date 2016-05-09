<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../css/estilos.css"/>
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
      <p>Agregar Banner</p>
      <div id="regresar_cpanel"> <a href="../cpanel.php"> Regresar al Cpanel </a> </div>
   </div>
   <div id="contenido_cpanel">
      <form action="procesar.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
         <table width="960" border="0" align="center" cellpadding="2" cellspacing="0">
            <tr>
               <td>&nbsp;</td>
               <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
               <td class="tdrow1">Imagen banner</td>
               <td colspan="2"><input type="file" name="imagen_banner" id="imagen_banner" />
               <div style="color:#000000;">(Recomendacion banner mediano 1360 x 332)</div>
               </td>
            </tr>
            <tr>
               <td class="tdrow1">&nbsp;</td>
               <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
               <td class="tdrow1">&nbsp;</td>
               <td align="center"><input name="button" type="submit" class="boton" id="boton" value="Guardar" /></td>
               <td align="center"><input type="button" class="boton" id="boton" onclick="cancelar();" value="Cancelar" /></td>
            </tr>
         </table>
      </form>
   </div>
</div>
</body>
</html>