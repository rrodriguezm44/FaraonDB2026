<?php

require_once "../../modelos/conexion.php";

if ($_POST['action'] == 'edit') {

  $data = array(
    'codigo_producto' => $_POST['codigo_producto'],
    'cantidad' => $_POST['cantidad'],
    'id' => $_POST['detalle_venta_id']
  );

  $statement = Conexion::conectar()->prepare("Call prc_ActualizarDetalleVenta(:p_codigo_producto,:p_cantidad,:p_id)");
  $statement->bindParam(":p_codigo_producto", $data["codigo_producto"], PDO::PARAM_STR);
  $statement->bindParam(":p_cantidad", $data["cantidad"], PDO::PARAM_STR);
  $statement->bindParam(":p_id", $data["id"], PDO::PARAM_INT);

  $statement->execute();

  echo json_encode($_POST);
}

if ($_POST['action'] == 'delete') {
  $data = array(
    'id' => $_POST['detalle_venta_id']
  );

  // $statement = Conexion::conectar()->prepare("DELETE FROM detalle_ventas WHERE detalle_venta_id = '" . $data["id"] . "'");
  $statement = Conexion::conectar()->prepare("Call prc_EliminarDetalleVenta(:p_id)");
  $statement->bindParam(":p_id", $data["id"], PDO::PARAM_STR);

  $statement->execute();

  echo json_encode($_POST);
}
