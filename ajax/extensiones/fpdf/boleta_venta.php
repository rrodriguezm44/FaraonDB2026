<?php
require "database.php";
require_once "conexion.php";
require "../fpdf/fpdf.php";

//MOSTRARNDO INFORMACION DE LA BASE DE DATOS, VENTAS
$codigo = $_REQUEST['codigo'];

date_default_timezone_set("America/La_Paz");
$fechaHoy = date("d/m/Y");

//DATOS EMPRESA
$query = "SELECT * FROM empresa";
$result = mysqli_query($connection, $query);
$empr = mysqli_fetch_array($result);
$fonos = $empr['telefonos'];

//DATOS VENTA
$query_ven = "SELECT * FROM ventas WHERE nro_boleta = $codigo";
$result_ven = mysqli_query($connection, $query_ven);
$fila = mysqli_fetch_array($result_ven);

$dias = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
$dia = $dias[(date('N', strtotime($fila["fecha_entrega"]))) - 1];

$fecha = date("d/m/Y", strtotime($fila["fecha_venta"]));
$fecha_entrega = $dia . ', ' . date("d/m/Y", strtotime($fila["fecha_entrega"]));
//$productos = json_decode($fila["productos"], true);
//$neto = number_format($fila["neto"], 2);
//$impuesto = number_format($fila["impuesto"], 2);
//$total = number_format($fila["total"], 2);
if ($fila["docuVenta"] == 1) {
  $tipodoc = 'CN';
} else {
  $tipodoc = 'CF';
}

if ($fila["tipoPago"] == 1) {
  $fpago = 'Contado';
} else if ($fila["tipoPago"] == 2) {

  $fpago = 'Credito';
} else {

  $fpago = 'Transferencia';
}
$obs = $fila["observa_venta"];


$idcliente = $fila["cliente_id"];
$idvendedor = $fila["vendedorID"];
$idusuario = $fila["usuarioID"];

//DATOS CLIENTE
$query_cli = "SELECT * FROM clientes WHERE cliente_id = $idcliente";
$result_cli = mysqli_query($connection, $query_cli);
$datoc = mysqli_fetch_array($result_cli);

$empresa = $datoc["nombre_empresa"];
$nempresa = strlen($datoc["nombre_empresa"]);
$nit = $datoc["nit"];
$nombre = $datoc["nombre"];
$telefono = $datoc["telefono"];
$direccion = $datoc["direccion"];
$zona = $datoc["zona"];

//DATOS VENDEDOR
$query_ven = "SELECT * FROM usuarios WHERE id_usuario = $idvendedor";
$result_ven = mysqli_query($connection, $query_ven);
$datoven = mysqli_fetch_array($result_ven);


$pdf = new FPDF("P", "mm", "Letter");
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 15);
$pdf->Cell(190, 5, utf8_decode('NOTA DE VENTA'), 0, 0, "C");
$pdf->SetXY(160, 13);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(30, 5, utf8_decode('Fecha de Impresion: ') . $fechaHoy, 0, 1, "R");
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(180, 5, utf8_decode('N°: ') . $codigo, 0, 1, "C");
$pdf->SetXY(10, 25);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(30, 5, utf8_decode($fonos), 0, 1, "R");
$pdf->SetXY(160, 17);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(30, 5, utf8_decode('Tipo de Documento:') . '(' . $tipodoc . ')', 0, 1, "R");
$pdf->SetXY(160, 21);
$pdf->Cell(30, 5, utf8_decode('Forma de Pago: ') . $fpago, 0, 1, "R");
$pdf->Image("../fpdf/images/logo_oficial.png", 10, 5, 35, 20);

//DATOS DEL CLIENTE Y LA VENTA 
$pdf->SetXY(10, 32);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(20, 5, utf8_decode('Razón Social:'), 0, 0, "L");
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(30, 5, utf8_decode($empresa), 0, 1, "L");
$pdf->SetFont('Arial', 'B', 8);
$pdf->SetXY(10, 36);
$pdf->Cell(20, 5, utf8_decode('Cliente:'), 0, 0, "L");
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(30, 5, utf8_decode($nombre), 0, 1, "L");
$pdf->SetFont('Arial', 'B', 8);
$pdf->SetXY(10, 40);
$pdf->Cell(30, 5, utf8_decode('Telefono:'), 0, 0, "L");
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(30, 5, utf8_decode($telefono), 0, 1, "L");
$pdf->SetFont('Arial', 'B', 8);
$pdf->SetXY(10, 44);
$pdf->Cell(20, 5, utf8_decode('Dirección:'), 0, 0, "L");
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(40, 5, utf8_decode($direccion) . ' | ' . 'Zona: ' . $zona, 0, 1, "L");
$pdf->SetXY(145, 32);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(10, 5, utf8_decode('NIT:'), 0, 0, "L");
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(30, 5, utf8_decode($nit), 0, 1, "L");
$pdf->SetFont('Arial', 'B', 8);
$pdf->SetXY(100, 36);
$pdf->Cell(25, 5, utf8_decode('Fecha de Venta:'), 0, 0, "L");
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(30, 5, utf8_decode($fecha), 0, 1, "L");
$pdf->SetFont('Arial', 'B', 8);
$pdf->SetXY(145, 36);
$pdf->Cell(25, 5, utf8_decode('Fecha de Entrega:'), 0, 0, "L");
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(30, 5, utf8_decode($fecha_entrega), 0, 1, "L");
$pdf->SetFont('Arial', 'B', 8);
$pdf->SetXY(100, 40);
$pdf->Cell(20, 5, utf8_decode('Vendedor:'), 0, 0, "L");
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(30, 5, utf8_decode($datoven["nombre_usuario"]) . ' (' . $datoven["telefono"] . ')', 0, 1, "L");

// TITULOS DEL REPORTE

$pdf->SetXY(10, 50);
$pdf->SetFont('Arial', 'B', 7);
$pdf->MultiCell(15, 5, utf8_decode('Cantidad'), 1, 'C');
$pdf->SetXY(25, 50);
$pdf->MultiCell(15, 5, utf8_decode('Codigo'), 1, "C");
$pdf->SetXY(40, 50);
$pdf->MultiCell(80, 5, utf8_decode('Descripcion'), 1, "C");
$pdf->SetXY(120, 50);
$pdf->MultiCell(25, 5, utf8_decode('Precio Uni. Bs.'), 1, "C");
$pdf->SetXY(145, 50);
$pdf->MultiCell(15, 5, utf8_decode('Dscto. Bs.'), 1, "C");
$pdf->SetXY(160, 50);
$pdf->MultiCell(20, 5, utf8_decode('Dscto. %.'), 1, "C");
$pdf->SetXY(180, 50);
$pdf->MultiCell(25, 5, utf8_decode('Total a Cobrar'), 1, "C");


$pdf->Line(10, 7, 205, 7); //horizontal superior
$pdf->Line(10, 30, 205, 30); //horizontal dos
$pdf->Line(10, 50, 205, 50); //horizontal tres
$pdf->Line(10, 111, 205, 111); //horizontal cuatro
$pdf->Line(10, 138, 205, 138); //horizontal cinco
// $pdf->Line(10, 113, 205, 113); //horizontal seis

// Consulta SQL
$query = Conexion::conectar()->prepare("
SELECT 
    dv.nro_boleta,
    p.nombre,
    dv.cantidad,
    dv.precio,
    dv.descuento_porcentual,
    dv.total_producto,
		p.precio_venta,
    p.codigo_producto
FROM 
    detalle_ventas dv
JOIN 
    productos p ON dv.codigo_producto = p.codigo_producto
    WHERE 
        dv.nro_boleta = :numero_boleta
");

$query->bindParam(':numero_boleta', $codigo);
$query->execute();

// Recorrido con foreach
$resultados = $query->fetchAll(PDO::FETCH_ASSOC);

//DATOS PRODUCTOS
foreach ($resultados as $registro) {


  $valorUnitario = number_format($registro["precio"], 2);
  $descuento_moneda = number_format(($registro["precio"] * $registro["descuento_porcentual"] / 100), 2);
  $dstoPor = number_format($registro["descuento_porcentual"], 2);
  $precioTotal = number_format($registro["total_producto"], 2);


  //$pdf->SetXY(10, 58);
  $pdf->SetFont('Arial', '', 7);
  $pdf->Cell(15, 5, $registro['cantidad'], 0, 0, 'C');
  $pdf->SetFont('Arial', '', 6);
  $pdf->Cell(15, 5, $registro['codigo_producto'], 0, 0, 'L');
  if (strlen($registro['nombre']) > 50) {
    $pdf->SetFont('Arial', '', 6);
    $pdf->Cell(80, 5, utf8_decode($registro['nombre']), 0, 0, 'L');
  } else if (strlen($registro['nombre']) > 60) {
    $pdf->SetFont('Arial', '', 5.5);
    $pdf->Cell(80, 5, utf8_decode($registro['nombre']), 0, 0, 'L');
  } else {
    $pdf->SetFont('Arial', '', 7);
    $pdf->Cell(80, 5, utf8_decode($registro['nombre']), 0, 0, 'L');
  }
  $pdf->Cell(25, 5, $valorUnitario, 0, 0, 'R');
  $pdf->Cell(15, 5, $descuento_moneda, 0, 0, 'R');
  $pdf->Cell(20, 5, $dstoPor, 0, 0, 'R');
  $pdf->Cell(25, 5, $precioTotal, 0, 1, 'R');
}

// Consulta SQL
$query = Conexion::conectar()->prepare("
SELECT 
    dv.nro_boleta,
    SUM(dv.precio) AS suma_precio,
    SUM(dv.total_producto) AS suma_total_productos,
    SUM(dv.descuento_porcentual) AS suma_descuento_porcentual,
    ROUND(SUM(dv.precio * dv.descuento_porcentual / 100), 2) AS suma_precio_con_descuento
FROM 
    detalle_ventas dv
WHERE 
    dv.nro_boleta = :numero_boleta
GROUP BY 
    dv.nro_boleta;
");

$query->bindParam(':numero_boleta', $codigo);
$query->execute();

// Recorrido con foreach
$resultados2 = $query->fetchAll(PDO::FETCH_ASSOC);

//DATOS TOTALES
foreach ($resultados2 as $fila2) {
  $subtotaldesc = number_format($fila2["suma_precio_con_descuento"], 2);
  $total = $fila2["suma_total_productos"];
}

//CONVERTIMOS TOTALES A LETRAS
include('conversion.php');
require_once 'numeroaletras.php';

//llamamos a la(s) clases
$modelonumero = new modelonumero();
$numeroaletras = new numeroaletras();

$letra = $numeroaletras->convertir($total, 'bolivianos', 'centavos');

//COMO EL PIE DE LA NOTA
$pdf->SetXY(10, 112);
$pdf->SetFont('Arial', 'B', 7);
$pdf->Cell(6, 5, utf8_decode('Son: '), 0, 0, 'L');
$pdf->SetFont('Arial', '', 6);
$pdf->Cell(115, 5, utf8_decode($letra), 0, 0, 'L');
$pdf->SetFont('Arial', 'B', 7);
$pdf->Cell(25, 5, utf8_decode('TOTALES '), 0, 0, 'L');
$pdf->Cell(24, 5, utf8_decode($subtotaldesc) . ' Bs.', 0, 0, 'R');
$pdf->Cell(25, 5, $total, 0, 1, 'R');
//NUEVO MENSAJE
$pdf->SetXY(10, 116);
$pdf->SetFont('Arial', 'B', 7);
$pdf->Cell(6, 5, utf8_decode('NOTA:   '), 0, 0, 'L');
$pdf->SetXY(18, 116);
$pdf->SetFont('Arial', '', 7);
$pdf->Cell(6, 5, " UNA VEZ ENTREGADA LA MERCADERÍA NO SE ACEPTAN CAMBIOS NI DEVOLUCIONES", 0, 1, 'L');
$pdf->SetXY(50, 132);
$pdf->SetFont('Arial', '', 7);
$pdf->Cell(100, 5, utf8_decode('ENTREGUE CONFORME'), 0, "C");
$pdf->Cell(25, 5, utf8_decode('RECIBI CONFORME'), 0, 1, "C");

//DATOS USUARIO
$query_usu = "SELECT * FROM usuarios WHERE id_usuario = $idusuario";
$result_usu = mysqli_query($connection, $query_usu);
$datousu = mysqli_fetch_array($result_usu);
$pdf->SetXY(106, 133);
$pdf->MultiCell(105, 5, '', 0, "C");
//$pdf->Ln(1);
$pdf->Cell(70, 5, utf8_decode('ELABORADO POR: ') . $datousu['nombre_usuario'], 0, 0, "L");
$pdf->Cell(15, 5, "OBSERVACIONES: ", 0, 1, "L");
$pdf->SetXY(105, 139);
$pdf->MultiCell(90, 3, utf8_decode($obs), 0, "L");
$pdf->Output();