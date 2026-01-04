<?php

require_once "../../modelos/conexion.php";
/*ventana de edicion*/
$query = "SELECT dv.detalle_venta_id,
                dv.nro_boleta,
                dv.codigo_producto,
                c.nombre as nombre_categoria,
                p.nombre as descripcion_producto,
                dv.cantidad as cantidad,                            
                round(dv.total_producto,2) as total_venta 
                FROM detalle_ventas dv 
                inner join productos p on dv.codigo_producto = p.codigo_producto
                inner join categorias c on c.categoria_id = p.categoria_id
          where nro_boleta = " . $_POST['nro_boleta'] . " ORDER BY dv.detalle_venta_id";

$statement = Conexion::conectar()->prepare($query);
$statement->execute();


$numero_filas_filtradas = $statement->rowCount();

$result  = $statement->fetchAll();

$output = array(
  'draw' => intval($_POST['draw']),
  'recordsTotal' => $numero_filas_filtradas,
  'recordsFiltered' => $numero_filas_filtradas,
  'data' => $result
);

echo json_encode($output);
