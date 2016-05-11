<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>INOVALEC - Autenticacion de usuarios</title>
<link href="css/global.css" rel="stylesheet" type="text/css" />
<link href="css/estilos-admin.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.color.js"></script>
<script type="text/javascript" src="js/validar.js"></script>
</head>
<body>
<div id="contenedor">
  <div id="cuerpo_login">
    <div id="cabecera">
      <div id="logo_admin"></div>
      <div id="texto_login">
        <p>Sistema de administrador de contenidos</p>
        <p>Acceso de usuario </p> 
      </div>
    </div>
    <div id="form_login">
      <form id="form1" name="form1" method="post">
        <table width="300" border="0" align="center" cellpadding="2" cellspacing="2">
          <tr>
            <td class="usuario">&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td width="81" class="usuario">Usuario</td>
            <td width="156"><input name="usuario" type="text" class="texto_login" id="usuario" size="30" /></td>
            <td width="35">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="3"><div id = "error1" class="mensaje_error">Ingrese nombre de usuario</div></td>
          </tr>
          <tr>
            <td class="clave">Clave</td>
            <td><input name="clave" type="password" class="texto_login" id="clave" size="30" /></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td colspan="3"><div id = "error2" class="mensaje_error">Ingrese su contraseña</div></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><div align="center">
                <input type="button" id="boton" value="Ingresar" onclick="validar();" />
              </div></td>
            <td>&nbsp;</td>
          </tr>
        </table>
      </form>
    </div>
  </div>
  <div id="pie">
    <!-- powered by-->
    <div id="powered_by">Copyright © 2013. Diseño y Desarrollo por: <a href="http://www.ingenioart.com/" target="_blank"><span>Ingenio Art SAC</span></a></div>
    <!-- -->
  </div>
</div>
</body>
</html>
