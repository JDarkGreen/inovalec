<?php
	
	session_start();
	include("../../includes/conexion.php");
	include("../control.php");	
	include("funciones.php");
	
	// definimos la funcion control_session.
	control_session($_SESSION['admin_admin']);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript">
	function cancelar(subseccion)
	{
		document.form1.action = "index.php?idsubseccion="+subseccion;
		document.form1.submit();
	}
</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../css/estilos.css"/>
<title> INOVALEC - Panel de administración </title>
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
      <p>Agregar Subcategorias</p>
      <div id="regresar_cpanel"> <a href="../cpanel.php">Regresar al Cpanel</a> </div>
   </div>
   <div id="contenido_cpanel">

      <form id="form1" name="form1" method="post" action="procesar.php">

         <input type="hidden" name="subseccion" id="subseccion" value="<?php echo $_GET['idsubseccion']; ?>" />
         
         <table width="750" border="0" align="center" cellpadding="2" cellspacing="0">
            <tr>
                <td colspan="3" class="tdrow1">
                    <?php
                  	    if(isset($_GET['msg']))
						{
							if($_GET['msg']=='1')
							{
								echo '<span align="center">Ya existe la subcategoria ingresada.</span>';
							}
						}
				    ?>               
               </td>
            </tr>

            <tr>
               <td class="tdrow1">&nbsp;</td>
               <td colspan="2">&nbsp;</td>
            </tr>

            <tr>
               <td width="171" class="tdrow1">Nombre subcategoria</td>
               <td colspan="2"><input name="nombre_subseccion" type="text" class="formularios" id="nombre_subseccion" size="45" /></td>
            </tr>

            <tr>
               <td class="tdrow1">Estado</td>
               <td colspan="2">
                  <input type="radio" name="estado" id="estado" value="1" /> Si
                  <input type="radio" name="estado" id="estado" value="0" /> No
               </td>
            </tr>

            <tr>
               <td class="tdrow1">&nbsp;</td>
               <td colspan="2">&nbsp;</td>
            </tr>

            <tr>
               <td class="tdrow1">&nbsp;</td>

               <td width="177" align="center">
                  <input name="button" type="submit" class="boton" id="button" value="Guardar" />
               </td>

               <td width="260" align="center">
                  <input type="button" class="boton" onclick="cancelar(<?php echo $_GET['idsubseccion']; ?>);" value="Cancelar" />
               </td>
            </tr>

         </table>
      </form>
   </div>
</div>
</body>
</html>