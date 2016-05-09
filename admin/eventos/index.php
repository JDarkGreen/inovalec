<?php
	
	session_start();
	include("../../includes/conexion.php");	
	include("../control.php");
	
	// definimos la funcion control_session.
	control_session($_SESSION['admin_admin']);
	
	// Definimos la variable de conexion.
	$cn = Conexion();
	
	$padre = ($padre == null) ? 'IS NULL' : ' = ' . $padre;
	$sql_secciones  = "SELECT * FROM eventos WHERE idpadre ".$padre." ORDER BY categoria ASC";
	$rpta_secciones = query($sql_secciones,$cn) or die(mysql_error());

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript">

	function borrar(cod){
		con = confirm("Desea borrar la seccion ?");
			if(con==true){
				document.form1.action = "eliminar.php?cod="+cod;
				document.form1.submit();
			}
	}

	function changeState2(url,est,mssg)
	{
		if(est==1){		
			message = "quieres desactivar esta "+mssg+" ?";
		}else{
			message = "quieres activar esta "+mssg+" ?";
		}
		if(confirm(message)){
			document.form1.action='estado.php?estado=1&'+url;
			document.form1.submit();	
		}
	}
</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../css/estilos.css"/>
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
         <p>Seccion eventos</p>
         <div id="regresar_cpanel"> <a href="../cpanel.php"> Regresar al Cpanel </a> </div>
      </div>
      <div id="contenido_cpanel">
         <form id="form1" name="form1" method="post">
            <table width="960" border="0" align="center" cellpadding="2" cellspacing="2">
<!--               <tr>
                  <td align="center"><a href="agregar.php">Agregar seccion eventos</a></td>
               </tr>-->
               <tr>
                  <td>&nbsp;</td>
               </tr>
            </table>
            <table width="960" border="0" align="center" cellpadding="2" cellspacing="0">
               <tr> 
                  <!--      <td width="200">Marca</td>-->
                  <td width="450" class="tdrow1">Nombre categoria</td>
                  <td colspan="3" align="center" class="tdrow1">Operaciones</td>
               </tr>
               <?php
					while($row_secciones = fetch_array($rpta_secciones))
					{
			  ?>
               <tr> 
                  <!--<td valign="top"><?php//echo $row_secciones['nombre_marca']; ?></td>-->
                  <td valign="top" class="tdrow2"><?php echo $row_secciones['categoria']; ?></td>
                  <td width="137" align="center" valign="top" class="tdrow2"><a href="../subeventos/index.php?idsubseccion=<?php echo $row_secciones['idcategoria']; ?>"><img src="../imagenes/ico_mapa.gif" alt="subcategorias" title="subcategorias" width="19" height="15" border="0" /></a></td>
                  <td width="141" align="center" valign="top" class="tdrow2"><a href="editar.php?id=<?php echo $row_secciones['idcategoria']; ?>"><img src="../imagenes/application_form_edit.png" width="16" height="16" border="0" /></a></td>
                  <td width="139" align="center" valign="top" class="tdrow2"><img src="../imagenes/application_form_delete.png" width="16" height="16" onclick="borrar('<?php echo $row_secciones['idcategoria']; ?>')" style="cursor:pointer;" /></td>
               </tr>
               <?php
					}
					
			  ?>
            </table>
         </form>
      </div>
      <div style="margin-top:25px;"></div>
   </div>
</div>
</div>
</body>
</html>