<?php
	
	include("includes/conexion.php");

	include("includes/class.phpmailer.php");
	include("includes/class.smtp.php");
	
	include("includes/funciones.php");
	

	$cn = Conexion();
	
	$empresa   = $_POST['empresa1'];
	$telefono  = $_POST['telefono1'];
	$email	   = $_POST['email'];
	$fecha	   = $_POST['fecha'];
	
	agregarVenta($empresa,$telefono,$email,$fecha);

	# declaro una variable y almaceno cuantas imagenes se iran agregando.
	
	$tot = count($_POST["cantidad"]);
	
	if(isset($_POST['cantidad']))
	{
		#$idventa = mysql_insert_id();		
		$idventa = last_id_pdo();	
		
		//este for recorre el arreglo. Con el indice $i, podemos obtener la propiedad que desemos de cada imagen para trabajar con este.
		for ($i = 0; $i < $tot; $i++)
		{		
			$cantidad 		= $_POST["cantidad"][$i];
			$producto 		= $_POST["producto"][$i];
			$marca	 		= $_POST['marcas'][$i];	
			
			enviarSolicitudVenta($idventa,$cantidad,$producto,$marca);
			
		}
		
		$mail             = new PHPMailer(); // defaults to using php "mail()"

		$mail->From       = "$email";
		$mail->FromName   = "$empresa";	

		$mail->Port       = 25;
		$mail->SMTPSecure = 'ssl';
		//Whether to use SMTP authentication
		$mail->SMTPAuth   = true;
		$mail->Host       = 'smtp.gmail.com';
		$mail->Username   = "jgomez.4net@gmail.com";
		//Password to use for SMTP authentication
		$mail->Password   = "ARLAC_RINOEVER";

	
		$mail->addAddress("tquintana@inovalec.com.pe");
		$mail->addAddress("mcoba@inovalec.com.pe"); //Recipient name is optional
		$mail->addAddress("jgomez.4net@gmail.com"); //Recipient name is optional

		$mail->Subject    = "INOVALEC S.A.C. - Solicitud de una cotizacion.";
		
		$msg  = "Empresa: ".$empresa."<br/>";
		$msg .= "Telefono: ".$telefono."<br />";	
		$msg .= "E-mail: ".$email."<br/>";
		$msg .= "Fecha: ".$fecha."<br/><br />";
		
		$sql_cotizarVentas  = "SELECT v.*, cv.* FROM cotizar_ventas cv, ventas v 
							   WHERE v.idventas = cv.idventas
							   AND v.idventas = '$idventa'
							   AND v.fecha = '$fecha'";
		$rpta_cotizarVentas =  query($sql_cotizarVentas,$cn) or die(mysql_error());	
		
		$msg .= '<table width="640" border="1" cellpadding="0" cellspacing="0">';
		$msg .= '   <tr>';
		$msg .= '      <td width="101" align="center" style="background:#006699; color:#fff;">Cantidad</td>';
		$msg .= '      <td width="151" align="center" style="background:#006699; color:#fff;">Producto</td>';
		$msg .= '      <td width="80" align="center" style="background:#006699; color:#fff;">Marca</td>';
		$msg .= '   </tr>';
		
		while($row_ventas = fetch_array($rpta_cotizarVentas))
		{
			
			$msg .= '   <tr>';
			$msg .= '      <td align="center">'.$row_ventas['cantidad'].'</td>';
			$msg .= '      <td align="center">'.$row_ventas['producto'].'</td>';
			$msg .= '      <td align="center">'.$row_ventas['marca'].'</td>';
			$msg .= '   </tr>';
		
		}
		$msg .= '</table>';		
		
		$mail->MsgHTML($msg);
		$mail->IsHTML(true);
		$mail->Send();		
		
		echo 'Su solicitud de venta se ha enviado. En breves nos comunicaremos con usted.';
	
	}
	

?>