<?php

require_once "../../modelos/conexion.php";

$query = "SELECT dof.detalle_oferta_id,
                dof.nro_oferta,
                dof.codigo_producto,
                c.nombre as nombre_categoria,
                p.nombre as producto,
                dof.cantidad as cantidad,                            
                round(dof.precio,2) as precio,
                round(dof.total_producto,2) as total
                FROM detalle_ofertas dof 
                inner join productos p on dof.codigo_producto = p.codigo_producto
                left join categorias c on c.categoria_id = p.categoria_id
          where nro_oferta = " . $_POST['nro_oferta'] . " ORDER BY dof.detalle_oferta_id";

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
