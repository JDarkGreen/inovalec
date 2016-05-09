<?php

	/**
	 * PHPExcel
	 *
	 * Copyright (C) 2006 - 2011 PHPExcel
	 *
	 * This library is free software; you can redistribute it and/or
	 * modify it under the terms of the GNU Lesser General Public
	 * License as published by the Free Software Foundation; either
	 * version 2.1 of the License, or (at your option) any later version.
	 *
	 * This library is distributed in the hope that it will be useful,
	 * but WITHOUT ANY WARRANTY; without even the implied warranty of
	 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
	 * Lesser General Public License for more details.
	 *
	 * You should have received a copy of the GNU Lesser General Public
	 * License along with this library; if not, write to the Free Software
	 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
	 *
	 * @category   PHPExcel
	 * @package    PHPExcel
	 * @copyright  Copyright (c) 2006 - 2011 PHPExcel (http://www.codeplex.com/PHPExcel)
	 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
	 * @version    1.7.6, 2011-02-27
	 */
	
	/** Error reporting */
	error_reporting(E_ALL);
	
	header('Content-Type: application/vnd.ms-excel');
	header('Content-Disposition: attachment;filename="reporte-por-fechas.xls"');
	header('Cache-Control: max-age=0');	
	
	include("../../includes/conexion.php");
	// Definimos la variable de conexion.
	$cn = Conexion();
	
	/** PHPExcel */
	require_once('../Classes/PHPExcel.php');
	
	// Create new PHPExcel object
	$objPHPExcel = new PHPExcel();
	
 	$campo = NULL;
	if(isset($_GET['idventas']))
	{
		if($_GET['idventas']!="0")
		{
			$campo    = "WHERE idventas = '".$_GET['idventas']."'";	
		}

	}		
		
	$sql_detalleEmpresa  = "SELECT * FROM ventas ".$campo."";
	$rpta_detalleEmpresa = query($sql_detalleEmpresa,$cn) or die(mysql_error());
	$row_detalleEmpresa  = fetch_array($rpta_detalleEmpresa);
	
	// Listar detalle del pedido.
	$sql_detallePedido  = "SELECT v.idventas, v.fecha, cv.cantidad, cv.producto, cv.marca FROM cotizar_ventas cv, ventas v 
						   WHERE v.idventas = cv.idventas
						   AND v.idventas = '".$row_detalleEmpresa['idventas']."'";
	$rpta_detallePedido = query($sql_detallePedido,$cn) or die(mysql_error());							   

	$objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
								 ->setLastModifiedBy("Maarten Balliauw")
								 ->setTitle("Office 2007 XLSX Test Document")
								 ->setSubject("Office 2007 XLSX Test Document")
								 ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
								 ->setKeywords("office 2007 openxml php")
								 ->setCategory("Test result file");
	
	
	$objPHPExcel->setActiveSheetIndex(0);
	
	$objPHPExcel->getActiveSheet()->setCellValue('A1', 'DETALLES DEL PEDIDO');
	$objPHPExcel->getActiveSheet()->setCellValue('A2', '');
	$objPHPExcel->getActiveSheet()->setCellValue('A3', 'Empresa');
	$objPHPExcel->getActiveSheet()->setCellValue('A4', 'Télefono');
	$objPHPExcel->getActiveSheet()->setCellValue('A5', 'E-mail');
	$objPHPExcel->getActiveSheet()->setCellValue('A6', 'Fecha');
	$objPHPExcel->getActiveSheet()->setCellValue('A7', '');	
	
	$objPHPExcel->getActiveSheet()->setCellValue('B3', $row_detalleEmpresa['empresa']);
	$objPHPExcel->getActiveSheet()->setCellValue('B4', $row_detalleEmpresa['telefono']);
	$objPHPExcel->getActiveSheet()->setCellValue('B5', $row_detalleEmpresa['email']);
	$objPHPExcel->getActiveSheet()->setCellValue('B6', $row_detalleEmpresa['fecha']);						
	
	$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(15);
	$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(12);
	$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
	$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(25);
	$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(25);
	$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(25);
	$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(25);	
	
	$objPHPExcel->getActiveSheet()->setCellValue('A8', 'No');
	$objPHPExcel->getActiveSheet()->setCellValue('B8', 'Cantidad');
	$objPHPExcel->getActiveSheet()->setCellValue('C8', 'Producto');
	$objPHPExcel->getActiveSheet()->setCellValue('D8', 'Marca');	
	
	// Set fonts
	$objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
	$objPHPExcel->getActiveSheet()->getStyle('A8')->getFont()->setBold(true);
	$objPHPExcel->getActiveSheet()->getStyle('B8')->getFont()->setBold(true);
	$objPHPExcel->getActiveSheet()->getStyle('C8')->getFont()->setBold(true);
	$objPHPExcel->getActiveSheet()->getStyle('D8')->getFont()->setBold(true);
	
	// While
	$i = 9;
	$j = 1;
	while($rw_pedido = fetch_array($rpta_detallePedido)){
	$i++;
		
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$i, $j);
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$i, $rw_pedido['cantidad']);
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$i, $rw_pedido['producto']);
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$i, $rw_pedido['marca']);	
	$j++;
	
	}
	//  End while
	
	// Resolve range
	
	$objPHPExcel->getActiveSheet()->setTitle('Reporte de ventas realizadas');

	// Set active sheet index to the first sheet, so Excel opens this as the first sheet
	$objPHPExcel->setActiveSheetIndex(0);
	
	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
	$objWriter->save('php://output');
	exit;
	
?>