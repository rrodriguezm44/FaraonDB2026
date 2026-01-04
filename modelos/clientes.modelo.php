<?php

require_once "conexion.php";
class ModeloClientes
{

  static public function mdlListarClientes()
  {

    $stmt = Conexion::conectar()->prepare("SELECT 
                                            cliente_id as id,
                                            nombre_empresa as empresa,
                                            nit,
                                            telefono,
                                            direccion,
                                            CASE
                                              WHEN estado = 1 THEN 'Activo'
                                              WHEN estado = 2 THEN 'desactivo'
                                              ELSE 'Desconocido'
                                            END as estado,
                                            categoria,
                                            '' as opciones,
                                            nombre,
                                            tipo_empresa,
                                            fecha_creacion
                                          FROM clientes ORDER BY nombre_empresa");
    $stmt->execute();

    return $stmt->fetchAll();
  }

  static public function mdlEliminarCliente($idCliente)
  {

    $stmt = Conexion::conectar()->prepare("DELETE FROM clientes WHERE cliente_id = :idCliente");

    $stmt->bindParam(":idCliente", $idCliente, PDO::PARAM_STR);

    if ($stmt->execute()) {
      $resultado = "Se elimino el cliente correctamente. ";
    } else {
      $resultado = "Error al eliminar el cliente";
    }

    return $resultado;
  }

  static public function mdlGuardarCliente($accion, $idCliente, $razonSocial, $nombreEmpresa, $telefono, $direccion, $tipoEmpresa, $categoria)
  {

    //$date = null;

    if ($accion > 0) { // REGISTRAR

      $date = date("Y-m-d");

      $stmt = Conexion::conectar()->prepare("INSERT INTO clientes (nombre,nombre_empresa,telefono,direccion,tipo_empresa,fecha_creacion,categoria) 
                                                    VALUES (:razonSocial, :nombreEmpresa, :telefono, :direccion, :tipoEmpresa, :fechaRegistro, :categoria)");

      $stmt->bindParam(":razonSocial", $razonSocial, PDO::PARAM_STR);
      $stmt->bindParam(":nombreEmpresa", $nombreEmpresa, PDO::PARAM_STR);
      $stmt->bindParam(":telefono", $telefono, PDO::PARAM_STR);
      $stmt->bindParam(":direccion", $direccion, PDO::PARAM_STR);
      $stmt->bindParam(":tipoEmpresa", $tipoEmpresa, PDO::PARAM_STR);
      $stmt->bindParam(":fechaRegistro", $date, PDO::PARAM_STR);
      $stmt->bindParam(":categoria", $categoria, PDO::PARAM_STR);

      if ($stmt->execute()) {
        $resultado = "Se registró el cliente correctamente. ";
      } else {

        $resultado = "Error al registrar al cliente";
      }
    } else { // EDITAR

      $date = date("Y-m-d");

      $stmt = Conexion::conectar()->prepare("UPDATE clientes
                                            SET nombre = :razonSocial, 
                                            nombre_empresa = :nombreEmpresa, 
                                            telefono = :telefono, 
                                            direccion = :direccion, 
                                            tipo_empresa = :tipoEmpresa, 
                                            fecha_creacion = :fechaRegistro,
                                            categoria = :categoria
                                            WHERE cliente_id = :idCliente");

      $stmt->bindParam(":idCliente", $idCliente, PDO::PARAM_STR);
      $stmt->bindParam(":razonSocial", $razonSocial, PDO::PARAM_STR);
      $stmt->bindParam(":nombreEmpresa", $nombreEmpresa, PDO::PARAM_STR);
      $stmt->bindParam(":telefono", $telefono, PDO::PARAM_STR);
      $stmt->bindParam(":direccion", $direccion, PDO::PARAM_STR);
      $stmt->bindParam(":tipoEmpresa", $tipoEmpresa, PDO::PARAM_STR);
      $stmt->bindParam(":fechaRegistro", $date, PDO::PARAM_STR);
      $stmt->bindParam(":categoria", $categoria, PDO::PARAM_STR);

      if ($stmt->execute()) {
        $resultado = "Se actualizó el cliente correctamente. ";
      } else {
        $resultado = "Error al actualizar al cliente";
      }
    }

    return $resultado;

    $stmt = null;
  }
}
