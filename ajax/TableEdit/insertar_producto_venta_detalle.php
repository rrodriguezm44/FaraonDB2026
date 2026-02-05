<?php

require("../database.php");

// Obtener los datos del formulario
$nro_boleta = isset($_POST['nro_boleta']) ? mysqli_real_escape_string($connection, $_POST['nro_boleta']) : '';
$codigo_producto = isset($_POST['codpro_add']) ? mysqli_real_escape_string($connection, $_POST['codpro_add']) : '';
$cantidad = isset($_POST['cant_add']) ? mysqli_real_escape_string($connection, $_POST['cant_add']) : '1';
$descuento = isset($_POST['desc_add']) ? mysqli_real_escape_string($connection, $_POST['desc_add']) : '0';

// Validar que se haya proporcionado el número de boleta
if (empty($nro_boleta)) {
    echo json_encode(array('error' => 'Número de boleta es requerido'));
    exit;
}

// Validar que se haya proporcionado el código del producto
if (empty($codigo_producto)) {
    echo json_encode(array('error' => 'Código de producto es requerido'));
    exit;
}

// Validar que la cantidad sea un número válido
if (!is_numeric($cantidad) || $cantidad <= 0) {
    echo json_encode(array('error' => 'Cantidad inválida'));
    exit;
}

// Validar que el descuento sea un número
if (!is_numeric($descuento)) {
    $descuento = 0;
}

// Primero obtener los datos del producto para calcular el precio y total
$query_producto = "SELECT precio_venta, nombre FROM productos WHERE codigo_producto = '$codigo_producto'";
$result_producto = mysqli_query($connection, $query_producto);

if (!$result_producto || mysqli_num_rows($result_producto) == 0) {
    echo json_encode(array('error' => 'Producto no encontrado'));
    exit;
}

$row_producto = mysqli_fetch_assoc($result_producto);
$precio_unitario = $row_producto['precio_venta'];
$nombre_producto = $row_producto['nombre'];

// Calcular el total con descuento
$descuento_decimal = $descuento / 100;
$total_sin_descuento = $precio_unitario * $cantidad;
$total_con_descuento = $total_sin_descuento * (1 - $descuento_decimal);
$precio_final = $precio_unitario * (1 - $descuento_decimal);

// Consultar la categoría del producto
$query_categoria = "SELECT c.nombre as nombre_categoria 
                   FROM productos p 
                   INNER JOIN categorias c ON p.categoria_id = c.categoria_id 
                   WHERE p.codigo_producto = '$codigo_producto'";
$result_categoria = mysqli_query($connection, $query_categoria);
$row_categoria = mysqli_fetch_assoc($result_categoria);
$nombre_categoria = $row_categoria['nombre_categoria'];

// Insertar el nuevo detalle de venta
$query_insert = "INSERT INTO detalle_ventas (nro_boleta, codigo_producto, cantidad, total_producto, codProducto, precio, descuento_porcentual) 
                 VALUES ('$nro_boleta', '$codigo_producto', '$cantidad', '$total_con_descuento', '0', '$precio_final', '$descuento')";

$result_insert = mysqli_query($connection, $query_insert);

if (!$result_insert) {
    echo json_encode(array('error' => 'Error al insertar el producto en la venta: ' . mysqli_error($connection)));
    exit;
}

// Obtener el ID del nuevo registro insertado
$detalle_venta_id = mysqli_insert_id($connection);

// Consultar todos los detalles de la venta actualizada
$query = "SELECT dv.detalle_venta_id,
                dv.nro_boleta,
                dv.codigo_producto,
                c.nombre as nombre_categoria,
                p.nombre as descripcion_producto,
                dv.cantidad as cantidad,                            
                dv.precio as precio,                            
                dv.descuento_porcentual as descuento_porcentual,                            
                round(dv.total_producto,2) as total_venta 
                FROM detalle_ventas dv 
                inner join productos p on dv.codigo_producto = p.codigo_producto
                inner join categorias c on c.categoria_id = p.categoria_id
          where nro_boleta = '$nro_boleta' ORDER BY dv.detalle_venta_id";

$result = mysqli_query($connection, $query);

$html = "";

while ($row1 = mysqli_fetch_assoc($result)) {

  $html .= "<tr>
              <td>" . $row1['detalle_venta_id'] . "</td>
              <td>" . $row1['nro_boleta'] . "</td>
              <td>" . $row1['codigo_producto'] . "</td>
              <td>" . $row1['nombre_categoria'] . "</td>
              <td>" . $row1['descripcion_producto'] . "</td>
              <td id='cantidad' data-id_cantidad='" . $row1['detalle_venta_id'] . "' contenteditable>" . $row1['cantidad'] . "</td>
              <td id='precio' data-id_precio='" . $row1['detalle_venta_id'] . "' contenteditable>" . $row1['precio'] . "</td>
              <td id='descuento' data-id_descuento='" . $row1['detalle_venta_id'] . "' contenteditable>" . $row1['descuento_porcentual'] . "</td>
              <td>" . $row1['total_venta'] . "</td>
              <td><button class='btnEliminar' data-id='" . $row1['detalle_venta_id'] . "'><i class='far fa-trash-alt text-danger fs-6'></i></button></td>
            </tr>";
}

$html .= "
          <tr>
            <td></td>
            <td>" . $nro_boleta . "</td>
            <td id='codigo_producto_add' contenteditable></td>
            <td id='nombre_categoria_add' contenteditable></td>
            <td id='descripcion_producto_add' contenteditable></td>
            <td id='cantidad_add' contenteditable></td>
            <td id='precio_add' contenteditable></td>
            <td id='descuento_add' contenteditable></td>
            <td></td>
            <td><button class='btnAgregar btn-success' id='btnAgregarNuevoProducto'>Agregar</button></td>
          </tr>";

if ($html === "") {
  $html = "<tr><td colspan='8'>No se encontraron detalles para esta venta</td></tr>";
}

// Devolver el HTML generado como respuesta
echo $html;
?>