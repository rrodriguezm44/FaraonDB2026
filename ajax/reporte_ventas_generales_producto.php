<?php

require_once "../modelos/conexion.php";

try {
    $fdesde = $_POST['fdesde'];
    $fhasta = $_POST['fhasta'];
    $idP = $_POST['idPr'];

    date_default_timezone_set("America/La_Paz");
    
    // Conectar a la base de datos usando PDO
    $conexion = Conexion::conectar();
    
    // Consulta de ventas con JOIN para obtener información del cliente y vendedor
    $query_lista = "SELECT 
                      v.nro_boleta, 
                      v.fecha_venta, 
                      c.nombre AS nombre_cliente, 
                      u.nombre_usuario AS nombre_vendedor, 
                      dv.cantidad, 
                      dv.precio, 
                      dv.total_producto,
                      dv.descuento_porcentual
                  FROM ventas v
                  INNER JOIN detalle_ventas dv ON v.venta_id = dv.venta_id
                  INNER JOIN clientes c ON v.cliente_id = c.cliente_id
                  INNER JOIN usuarios u ON v.vendedorID = u.id_usuario
                  WHERE DATE(v.fecha_venta) BETWEEN ? AND ?
                    AND dv.codigo_producto = ?
                    AND v.estado = 1
                  ORDER BY v.fecha_venta ASC";
    
    $stmt_lista = $conexion->prepare($query_lista);
    $stmt_lista->execute([$fdesde, $fhasta, $idP]);
    
    $registros = $stmt_lista->fetchAll();

    // Verificar si hay registros
    if (count($registros) == 0) {
        echo "<tr><td colspan='7' style='text-align: center;'>No se encontraron registros para los criterios seleccionados</td></tr>";
    } else {
        // Mostrar los registros de ventas
        foreach ($registros as $registro) {
            echo "
                <tr>
                <td style='text-align: center;'>" . $registro['nro_boleta'] . "</td>
                <td style='text-align: center;'>" . date("d/m/Y", strtotime($registro['fecha_venta'])) . "</td>
                <td style='text-align: left;'>" . $registro['nombre_cliente'] . "</td>
                <td style='text-align: left;'>" . $registro['nombre_vendedor'] . "</td>
                <td style='text-align: center;'>" . $registro['cantidad'] . "</td>
                <td style='text-align: right;'>" . number_format((float)$registro['precio'], 2, '.', ',') . " (" . $registro['descuento_porcentual'] . "%)</td>
                <td style='text-align: right;'>" . number_format((float)$registro['total_producto'], 2, '.', ',') . "</td>
                </tr>";
        }
    }

    // Calcular el total de ventas para el periodo y producto
    $query_total = "SELECT 
                      SUM(dv.total_producto) as total_ventas,
                      p.nombre as nombre_producto
                  FROM ventas v
                  INNER JOIN detalle_ventas dv ON v.venta_id = dv.venta_id
                  INNER JOIN productos p ON CONVERT(dv.codigo_producto USING utf8) = CONVERT(p.codigo_producto USING utf8)
                  WHERE DATE(v.fecha_venta) BETWEEN ? AND ?
                    AND CONVERT(dv.codigo_producto USING utf8) = CONVERT(? USING utf8)
                    AND v.estado = 1";
                    
    $stmt_total = $conexion->prepare($query_total);
    $stmt_total->execute([$fdesde, $fhasta, $idP]);
    
    $fila_total = $stmt_total->fetch();

    $total_ventas = $fila_total['total_ventas'];
    $nombre_producto = $fila_total['nombre_producto'];
    
    if ($total_ventas == null) {
        $total_ventas = 0;
    }
    
    $total_formateado = number_format((float)$total_ventas, 2, '.', ',');

    echo "
        <tr>
            <td colspan='5' style='text-align: right; '><b>Total Periodo :</b></td>
            <td style='text-align: right;'><b>Bs. $total_formateado</b></td>
            <td style='text-align: right;'></td>
        </tr>
        <tr>
            <td colspan='5' style='text-align: right; '><b>Producto :</b></td>
            <td colspan='2' style='text-align: right; '>$nombre_producto</td>
        </tr>";
    
} catch (Exception $e) {
    echo "<tr><td colspan='7' style='text-align: center; color: red;'>Error: " . $e->getMessage() . "</td></tr>";
}

?>