<?php
require("../database.php");

if (isset($_POST['detalle_venta_id'])) {
    $detalle_venta_id = mysqli_real_escape_string($connection, $_POST['detalle_venta_id']);

    // Primero obtenemos el número de boleta antes de eliminar
    $sql_select = "SELECT nro_boleta FROM detalle_ventas WHERE detalle_venta_id = '$detalle_venta_id'";
    $result_select = mysqli_query($connection, $sql_select);
    
    if (!$result_select || mysqli_num_rows($result_select) == 0) {
        echo json_encode(array(
            'status' => 'error',
            'error' => 'Registro no encontrado'
        ));
        exit;
    }
    
    $venta_data = mysqli_fetch_assoc($result_select);
    $nro_boleta = $venta_data['nro_boleta'];

    // Eliminar el detalle de venta
    $sql = "DELETE FROM detalle_ventas WHERE detalle_venta_id = '$detalle_venta_id'";
    $result = mysqli_query($connection, $sql);
    
    if ($result) {
        // Eliminación exitosa, ahora recalcular el total
        
        // Calcular el total de la venta actualizada
        $query_total = "SELECT SUM(total_producto) as total_venta FROM detalle_ventas WHERE nro_boleta = '$nro_boleta'";
        $result_total = mysqli_query($connection, $query_total);
        $row_total = mysqli_fetch_assoc($result_total);
        $total_venta = number_format($row_total['total_venta'], 2);
        
        // Actualizar el total en la tabla principal de ventas
        $update_venta_query = "UPDATE ventas SET total = '$row_total[total_venta]' WHERE nro_boleta = '$nro_boleta'";
        $result_update_venta = mysqli_query($connection, $update_venta_query);
        
        if (!$result_update_venta) {
            echo json_encode(array(
                'status' => 'error', 
                'error' => 'Error al actualizar el total de la venta principal: ' . mysqli_error($connection)
            ));
            exit;
        }
        
        // Generar el HTML actualizado de la tabla
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
                        <td class='cantidad' data-id_cantidad='" . $row1['detalle_venta_id'] . "' contenteditable>" . $row1['cantidad'] . "</td>
                        <td class='precio' data-id_precio='" . $row1['detalle_venta_id'] . "' contenteditable>" . $row1['precio'] . "</td>
                        <td class='descuento' data-id_descuento='" . $row1['detalle_venta_id'] . "' contenteditable>" . $row1['descuento_porcentual'] . "</td>
                        <td>" . $row1['total_venta'] . "</td>
                        <td><button class='btnEliminar btn-danger' data-id_codigo='" . $row1['detalle_venta_id'] . "'>Eliminar</button></td>
                      </tr>";
        }

        // Obtener lista de productos para el select
        $query_productos = "SELECT codigo_producto, nombre FROM productos ORDER BY nombre";
        $result_productos = mysqli_query($connection, $query_productos);

        $productos_options = "<option value=''>Seleccione un producto...</option>";
        while ($prod = mysqli_fetch_assoc($result_productos)) {
            $productos_options .= "<option value='" . $prod['codigo_producto'] . "'>" . $prod['codigo_producto'] . " - " . $prod['nombre'] . "</option>";
        }

        $html .= "
                  <tr>
                    <td></td>
                    <td>" . $nro_boleta . "</td>
                    <td>
                      <select id='codigo_producto_add' class='form-control bg-light-green'>
                        " . $productos_options . "
                      </select>
                    </td>
                    <td id='nombre_categoria_add'></td>
                    <td id='descripcion_producto_add'></td>
                    <td id='cantidad_add' contenteditable class='bg-light-green'></td>
                    <td id='precio_add'></td>
                    <td id='descuento_add' contenteditable class='bg-light-green'></td>
                    <td></td>
                    <td><button class='btnAgregar btn-success'>Agregar</button></td>
                  </tr>";

        if ($html === "") {
            $html = "<tr><td colspan='8'>No se encontraron detalles para esta venta</td></tr>";
        }
        
        // Respuesta exitosa
        echo json_encode(array(
            'status' => 'success',
            'html' => $html,
            'nro_boleta' => $nro_boleta,
            'total_venta' => $total_venta,
            'mensaje' => 'Producto eliminado correctamente'
        ));
    } else {
        // Error en la eliminación
        echo json_encode(array(
            'status' => 'error',
            'error' => 'Error al eliminar el producto: ' . mysqli_error($connection)
        ));
    }
} else {
    // Parámetro no recibido
    echo json_encode(array(
        'status' => 'error',
        'error' => 'Parámetro detalle_venta_id no recibido'
    ));
}
?>