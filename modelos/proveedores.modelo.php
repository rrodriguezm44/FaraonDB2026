<?php

require_once "conexion.php";

class ProveedoresModelo
{

  static public function mdlListarProveedores()
  {

    $stmt = Conexion::conectar()->prepare("SELECT proveedor_id, 
                                                            nombre_empresa,
                                                            nit,
                                                            telefono,
                                                            direccion,
                                                            CASE
                                                              WHEN estado = 1 THEN 'Activo'
                                                              WHEN estado = 2 THEN 'Inactivo'
                                                              ELSE 'Desconocido'
                                                            END as estado,
                                                            '' as opciones,
                                                            razon_social,
                                                            fecha_registro 
                                                            FROM proveedores order by nombre_empresa ASC");

    $stmt->execute();

    return $stmt->fetchAll();
  }

  static public function mdlGuardarProveedor($accion, $idProveedor, $razonSocial, $nombreEmpresa, $telefono, $direccion, $nit)
  {

    //$date = null;

    if ($accion > 0) { // REGISTRAR

      //$date = date("Y-m-d");

      $stmt = Conexion::conectar()->prepare("INSERT INTO proveedores (razon_social,nombre_empresa,telefono,direccion,nit) 
                                                    VALUES (:razonSocial, :nombreEmpresa, :telefono, :direccion, :nit)");

      $stmt->bindParam(":razonSocial", $razonSocial, PDO::PARAM_STR);
      $stmt->bindParam(":nombreEmpresa", $nombreEmpresa, PDO::PARAM_STR);
      $stmt->bindParam(":telefono", $telefono, PDO::PARAM_STR);
      $stmt->bindParam(":direccion", $direccion, PDO::PARAM_STR);
      $stmt->bindParam(":nit", $nit, PDO::PARAM_STR);
      //$stmt->bindParam(":fechaRegistro", $date, PDO::PARAM_STR);

      if ($stmt->execute()) {
        $resultado = "Se registró el proveedor correctamente. ";
      } else {

        $resultado = "Error al registrar al proveedor";
      }
    } else { // EDITAR

      //$date = date("Y-m-d");

      $stmt = Conexion::conectar()->prepare("UPDATE proveedores
                                            SET razon_social = :razonSocial, 
                                            nombre_empresa = :nombreEmpresa, 
                                            telefono = :telefono, 
                                            direccion = :direccion, 
                                            nit = :nit
                                            WHERE proveedor_id = :idProveedor");

      $stmt->bindParam(":idProveedor", $idProveedor, PDO::PARAM_STR);
      $stmt->bindParam(":razonSocial", $razonSocial, PDO::PARAM_STR);
      $stmt->bindParam(":nombreEmpresa", $nombreEmpresa, PDO::PARAM_STR);
      $stmt->bindParam(":telefono", $telefono, PDO::PARAM_STR);
      $stmt->bindParam(":direccion", $direccion, PDO::PARAM_STR);
      $stmt->bindParam(":nit", $nit, PDO::PARAM_STR);

      if ($stmt->execute()) {
        $resultado = "Se actualizó el proveedor correctamente. ";
      } else {
        $resultado = "Error al actualizar al proveedor";
      }
    }

    return $resultado;

    $stmt = null;
  }
}