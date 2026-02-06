<?php
require("../database.php");

// Obtener los datos del formulario
$detalle_venta_id = isset($_POST['detalle_venta_id']) ? mysqli_real_escape_string($connection, $_POST['detalle_venta_id']) : '';
$campo = isset($_POST['campo']) ? mysqli_real_escape_string($connection, $_POST['campo']) : '';
$valor = isset($_POST['valor']) ? mysqli_real_escape_string($connection, $_POST['valor']) : '';

// Validar que se hayan proporcionado los parámetros necesarios
if (empty($detalle_venta_id) || empty($campo) || empty($valor)) {
    echo json_encode(array('error' => 'Parámetros incompletos'));
    exit;
}

// Validar que el campo a actualizar sea uno permitido
$campos_permitidos = array('cantidad', 'precio', 'descuento_porcentual');
if (!in_array($campo, $campos_permitidos)) {
    echo json_encode(array('error' => 'Campo no permitido para actualización'));
    exit;
}

// Validar que el valor sea numérico si es un campo numérico
if (($campo == 'cantidad' || $campo == 'precio' || $campo == 'descuento_porcentual') && !is_numeric($valor)) {
    echo json_encode(array('error' => 'Valor inválido para el campo ' . $campo));
    exit;
}

// Si el campo es cantidad o descuento, validar rangos
if ($campo == 'cantidad' && $valor <= 0) {
    echo json_encode(array('error' => 'La cantidad debe ser mayor a 0'));
    exit;
}

if ($campo == 'descuento_porcentual' && ($valor < 0 || $valor > 100)) {
    echo json_encode(array('error' => 'El descuento debe estar entre 0 y 100'));
    exit;
}

// Obtener los datos actuales del detalle de venta
$query_actual = "SELECT dv.* FROM detalle_ventas dv 
                 WHERE detalle_venta_id = '$detalle_venta_id'";
$result_actual = mysqli_query($connection, $query_actual);

if (!$result_actual || mysqli_num_rows($result_actual) == 0) {
    echo json_encode(array('error' => 'Detalle de venta no encontrado'));
    exit;
}

$row_actual = mysqli_fetch_assoc($result_actual);

// Determinar valores actuales o nuevos dependiendo del campo actualizado
$cantidad = ($campo == 'cantidad') ? $valor : $row_actual['cantidad'];
$precio = ($campo == 'precio') ? $valor : $row_actual['precio'];
$descuento_porcentual = ($campo == 'descuento_porcentual') ? $valor : $row_actual['descuento_porcentual'];

// Calcular el nuevo total basado en los valores actualizados
$descuento_decimal = $descuento_porcentual / 100;
$total_producto = $cantidad * $precio * (1 - $descuento_decimal);

// Preparar la consulta de actualización
$update_query = "UPDATE detalle_ventas SET 
                 $campo = '$valor', 
                 total_producto = '$total_producto',
                 precio = '$precio'
                 WHERE detalle_venta_id = '$detalle_venta_id'";

$result_update = mysqli_query($connection, $update_query);

if (!$result_update) {
    echo json_encode(array('error' => 'Error al actualizar el producto en la venta: ' . mysqli_error($connection)));
    exit;
}

// Obtener el número de boleta para devolverlo
$nro_boleta = $row_actual['nro_boleta'];

// Consultar todos los detalles de la venta actualizada para devolver la tabla actualizada
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

// Calcular el total de la venta actualizada
$query_total = "SELECT SUM(total_producto) as total_venta FROM detalle_ventas WHERE nro_boleta = '$nro_boleta'";
$result_total = mysqli_query($connection, $query_total);
$row_total = mysqli_fetch_assoc($result_total);
$total_venta = number_format($row_total['total_venta'], 2);

// Actualizar el total en la tabla principal de ventas
$update_venta_query = "UPDATE ventas SET total = '$row_total[total_venta]' WHERE nro_boleta = '$nro_boleta'";
$result_update_venta = mysqli_query($connection, $update_venta_query);

if (!$result_update_venta) {
    echo json_encode(array('error' => 'Error al actualizar el total de la venta principal: ' . mysqli_error($connection)));
    exit;
}

// Devolver los resultados como JSON
$response = array(
    'status' => 'success',
    'html' => $html,
    'nro_boleta' => $nro_boleta,
    'total_venta' => $total_venta,
    'mensaje' => 'Producto actualizado correctamente'
);

echo json_encode($response);
?>