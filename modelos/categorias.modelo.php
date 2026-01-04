<?php

require_once "conexion.php";

class CategoriasModelo
{

  static public function mdlListarCategorias()
  {

    $stmt = Conexion::conectar()->prepare("call prc_ContarSubcategorias");

    $stmt->execute();

    return $stmt->fetchAll();
  }

  static public function mdlGuardarCategoria($accion, $idCategoria, $categoria, $subcategoria)
  {

    //$date = null;

    if ($accion > 0) { // REGISTRAR

      //$date = date("Y-m-d H:i:s");

      $stmt = Conexion::conectar()->prepare("INSERT INTO categorias (nombre,subcategoria_id) VALUES (:categoria,:subcategoria)");

      $stmt->bindParam(":categoria", $categoria, PDO::PARAM_STR);
      $stmt->bindParam(":subcategoria", $subcategoria, PDO::PARAM_STR);
      //$stmt -> bindParam(":fecha_actualizacion_categoria", $date,PDO::PARAM_STR);

      if ($stmt->execute()) {
        $resultado = "Se registró la categoría correctamente. ";
      } else {

        $resultado = "Error al registrar la categoria";
      }
    } else { // EDITAR

      //$date = date("Y-m-d H:i:5");

      $stmt = Conexion::conectar()->prepare("UPDATE categorias
                                            SET nombre = :categoria, 
                                            subcategoria_id = :subcategoria 
                                            WHERE categoria_id = :idCategoria");

      $stmt->bindParam(":idCategoria", $idCategoria, PDO::PARAM_STR);
      $stmt->bindParam(":categoria", $categoria, PDO::PARAM_STR);
      $stmt->bindParam(":subcategoria", $subcategoria, PDO::PARAM_STR);
      //$stmt -> bindParam(":fecha_actualizacion_categoria", $date ,PDO::PARAM_STR);

      if ($stmt->execute()) {
        $resultado = "Se actualizó la categoría correctamente. ";
      } else {
        $resultado = "Error al actualizar la categoría";
      }
    }

    return $resultado;

    $stmt = null;
  }

  static public function mdlEliminarCategoria($idCategoria)
  {

    $stmt = Conexion::conectar()->prepare("DELETE FROM categorias WHERE categoria_id = :idCategoria");

    $stmt->bindParam(":idCategoria", $idCategoria, PDO::PARAM_STR);

    if ($stmt->execute()) {
      $resultado = "Se elimino la categoría correctamente. ";
    } else {
      $resultado = "Error al eliminar la categoría";
    }

    return $resultado;
  }
}
