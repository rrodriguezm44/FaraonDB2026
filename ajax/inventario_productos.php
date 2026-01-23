<?php

require_once "../modelos/conexion.php";

try {
    $fdesde = $_POST['fdesde'];
    $fhasta = $_POST['fhasta'];
    $tp = $_POST['tipo'];

    date_default_timezone_set("America/La_Paz");
    
    // Conectar a la base de datos usando PDO
    $conexion = Conexion::conectar();
    
    // Determinar la consulta según el tipo
    switch($tp) {
        case '1': // INVENTARIO INICIAL
            $query_lista = "SELECT 
                                p.codigo_producto AS 'codigo',
                                p.nombre AS 'producto',
                                k.fecha AS 'fechaRegistro',
                                k.ex_unidades AS 'cantidad'
                            FROM kardex k
                            INNER JOIN productos p ON CONVERT(k.codigo_producto USING utf8) = CONVERT(p.codigo_producto USING utf8)
                            WHERE 
                                k.concepto LIKE 'INVENTARIO INICIAL%'
                                AND date(k.fecha) BETWEEN ? AND ?
                                AND k.ex_unidades > 0
                            ORDER BY k.fecha ASC";
            break;
            
        case '2': // VENTA
            $query_lista = "SELECT 
                                p.codigo_producto AS 'codigo',
                                p.nombre AS 'producto',
                                k.fecha AS 'fechaRegistro',
                                k.out_unidades AS 'cantidad'
                            FROM kardex k
                            INNER JOIN productos p ON CONVERT(k.codigo_producto USING utf8) = CONVERT(p.codigo_producto USING utf8)
                            WHERE 
                                k.concepto LIKE 'VENTA%'
                                AND date(k.fecha) BETWEEN ? AND ?
                                AND k.out_unidades > 0
                            ORDER BY k.fecha ASC";
            break;
            
        case '3': // COMPRA
            $query_lista = "SELECT 
                                p.codigo_producto AS 'codigo',
                                p.nombre AS 'producto',
                                k.fecha AS 'fechaRegistro',
                                k.in_unidades AS 'cantidad'
                            FROM kardex k
                            INNER JOIN productos p ON CONVERT(k.codigo_producto USING utf8) = CONVERT(p.codigo_producto USING utf8)
                            WHERE 
                                k.concepto LIKE 'COMPRA%'
                                AND date(k.fecha) BETWEEN ? AND ?
                                AND k.in_unidades > 0
                            ORDER BY k.fecha ASC";
            break;
            
        default:
            throw new Exception("Tipo de inventario no válido");
    }
    
    $stmt_lista = $conexion->prepare($query_lista);
    $stmt_lista->execute([$fdesde, $fhasta]);
    
    $registros = $stmt_lista->fetchAll();

    // Verificar si hay registros
    if (count($registros) == 0) {
        echo "<tr><td colspan='7' style='text-align: center;'>No se encontraron registros para los criterios seleccionados</td></tr>";
    } else {
        $item = 1; // Contador manual para el número de item
        // Mostrar los registros según el tipo
        foreach ($registros as $registro) {
            switch($tp) {
                case '1': // INVENTARIO INICIAL
                    echo "
                        <tr>
                        <td style='text-align: center;'>" . $item . "</td>
                        <td style='text-align: left;'>" . $registro['codigo'] . "</td>
                        <td style='text-align: left;'>" . $registro['producto'] . "</td>
                        <td style='text-align: center;'>" . date("d/m/Y", strtotime($registro['fechaRegistro'])) . "</td>
                        <td style='text-align: center;'>" . $registro['cantidad'] . "</td>
                        </tr>";
                    break;
                    
                case '2': // VENTA
                    echo "
                        <tr>
                        <td style='text-align: center;'>" . $item . "</td>
                        <td style='text-align: left;'>" . $registro['codigo'] . "</td>
                        <td style='text-align: left;'>" . $registro['producto'] . "</td>
                        <td style='text-align: center;'>" . date("d/m/Y", strtotime($registro['fechaRegistro'])) . "</td>
                        <td style='text-align: center;'>" . $registro['cantidad'] . "</td>
                        </tr>";
                    break;
                    
                case '3': // COMPRA
                    echo "
                        <tr>
                        <td style='text-align: center;'>" . $item . "</td>
                        <td style='text-align: left;'>" . $registro['codigo'] . "</td>
                        <td style='text-align: left;'>" . $registro['producto'] . "</td>
                        <td style='text-align: center;'>" . date("d/m/Y", strtotime($registro['fechaRegistro'])) . "</td>
                        <td style='text-align: center;'>" . $registro['cantidad'] . "</td>
                        </tr>";
                    break;
            }
            $item++;
        }
    }
    
    // Calcular totales según el tipo
    switch($tp) {
        case '1': // INVENTARIO INICIAL
            $query_total = "SELECT 
                              SUM(k.in_unidades) as total_cantidad,
                              SUM(k.in_costo_total) as total_costo,
                              p.nombre as nombre_producto
                          FROM kardex k
                          INNER JOIN productos p ON CONVERT(k.codigo_producto USING utf8) = CONVERT(p.codigo_producto USING utf8)
                          WHERE k.concepto LIKE 'INVENTARIO INICIAL%'
                            AND date(k.fecha) BETWEEN ? AND ?";
            break;
            
        case '2': // VENTA
            $query_total = "SELECT 
                              SUM(k.out_unidades) as total_cantidad,
                              SUM(k.out_costo_total) as total_venta,
                              p.nombre as nombre_producto
                          FROM kardex k
                          INNER JOIN productos p ON CONVERT(k.codigo_producto USING utf8) = CONVERT(p.codigo_producto USING utf8)
                          WHERE k.concepto LIKE 'VENTA%'
                            AND date(k.fecha) BETWEEN ? AND ?";
            break;
            
        case '3': // COMPRA
            $query_total = "SELECT 
                              SUM(k.in_unidades) as total_cantidad,
                              SUM(k.in_costo_total) as total_costo,
                              p.nombre as nombre_producto
                          FROM kardex k
                          INNER JOIN productos p ON CONVERT(k.codigo_producto USING utf8) = CONVERT(p.codigo_producto USING utf8)
                          WHERE k.concepto LIKE 'COMPRA%'
                            AND date(k.fecha) BETWEEN ? AND ?";
            break;
    }
    
    $stmt_total = $conexion->prepare($query_total);
    $stmt_total->execute([$fdesde, $fhasta]);
    
    $fila_total = $stmt_total->fetch();

    // Mostrar totales según el tipo
    switch($tp) {
        case '1': // INVENTARIO INICIAL
            $total_cantidad = $fila_total['total_cantidad'] ?? 0;
            $total_costo = $fila_total['total_costo'] ?? 0;
            $nombre_producto = $fila_total['nombre_producto'] ?? 'Todos los productos';
            
            echo "
                <tr>
                    <td colspan='4' style='text-align: right; '><b>Total Cantidad:</b></td>
                    <td style='text-align: center;'><b>" . $total_cantidad . "</b></td>
                </tr>";
            break;
            
        case '2': // VENTA
            $total_cantidad = $fila_total['total_cantidad'] ?? 0;
            $total_venta = $fila_total['total_venta'] ?? 0;
            $nombre_producto = $fila_total['nombre_producto'] ?? 'Todos los productos';
            
            echo "
                <tr>
                    <td colspan='4' style='text-align: right; '><b>Total Unidades Vendidas:</b></td>
                    <td style='text-align: center;'><b>" . $total_cantidad . "</b></td>
                </tr>";
            break;
            
        case '3': // COMPRA
            $total_cantidad = $fila_total['total_cantidad'] ?? 0;
            $total_costo = $fila_total['total_costo'] ?? 0;
            $nombre_producto = $fila_total['nombre_producto'] ?? 'Todos los productos';
            
            echo "
                <tr>
                    <td colspan='4' style='text-align: right; '><b>Total Unidades Compradas:</b></td>
                    <td style='text-align: center;'><b>" . $total_cantidad . "</b></td>
                </tr>";
            break;
    }
    
} catch (Exception $e) {
    echo "<tr><td colspan='7' style='text-align: center; color: red;'>Error: " . $e->getMessage() . "</td></tr>";
}

?>