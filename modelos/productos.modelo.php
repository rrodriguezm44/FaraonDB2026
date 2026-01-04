<?php

require_once "conexion.php";

use PhpOffice\PhpSpreadsheet\IOFactory;

class ProductosModelo
{

  static public function mdlCargaMasivaProductos($fileProductos)
  {

    $nombreArchivo = $fileProductos['tmp_name'];
    $documento = IOFactory::load($nombreArchivo);

    $hojaCategorias = $documento->getSheet(1);
    $numeroFilasCategorias = $hojaCategorias->getHighestDataRow();

    $hojaProductos = $documento->getSheetByName('Productos');
    $numeroFilasProductos = $hojaProductos->getHighestDataRow();

    $categoriasRegistradas = 0;
    $productosRegistrados = 0;

    ///CICLO PARA CATEGORIAS
    for ($i = 2; $i <= $numeroFilasCategorias; $i++) {
      $nombre = $hojaCategorias->getCellByColumnAndRow(1, $i);

      if (!empty($nombre)) {
        $stmt = Conexion::conectar()->prepare("INSERT INTO categorias(nombre) VALUES(:nombre);");
        $stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);

        if ($stmt->execute()) {
          $categoriasRegistradas = $categoriasRegistradas + 1;
        } else {
          $categoriasRegistradas = 0;
        }
      }
    }

    //return $categoriasRegistradas;
    //   CICLO FOR PARA PRODUCTOS
    if ($categoriasRegistradas > 0) {

      for ($i = 2; $i <= $numeroFilasProductos; $i++) {

        $codigo_producto = $hojaProductos->getCellByColumnAndRow(1, $i);
        $nombre = $hojaProductos->getCellByColumnAndRow(2, $i);
        $unidad_medida = $hojaProductos->getCellByColumnAndRow(3, $i);
        $stock = $hojaProductos->getCellByColumnAndRow(4, $i);
        $precio_venta = $hojaProductos->getCellByColumnAndRow(5, $i);
        $precio_compra = $hojaProductos->getCellByColumnAndRow(6, $i);
        $descuento = $hojaProductos->getCellByColumnAndRow(7, $i);
        $categoria_id = $hojaProductos->getCellByColumnAndRow(8, $i);
        $subcategoria_id = $hojaProductos->getCellByColumnAndRow(9, $i);
        $estado = $hojaProductos->getCellByColumnAndRow(11, $i);


        if (!empty($codigo_producto)) {
          $stmt = Conexion::conectar()->prepare("INSERT INTO productos(codigo_producto,
                                                                        nombre,
                                                                        unidad_medida,
                                                                        stock,
                                                                        precio_venta,
                                                                        precio_compra,
                                                                        descuento,
                                                                        categoria_id,
                                                                        subcategoria_id,
                                                                        estado) 
                                                VALUES (:codigo_producto,
                                                      :nombre,
                                                      :unidad_medida,
                                                      :stock,
                                                      :precio_venta,
                                                      :precio_compra,
                                                      :descuento,
                                                      :categoria_id,
                                                      :subcategoria_id,
                                                      :estado);");

          $stmt->bindParam(":codigo_producto", $codigo_producto, PDO::PARAM_STR);
          $stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
          $stmt->bindParam(":unidad_medida", $unidad_medida, PDO::PARAM_STR);
          $stmt->bindParam(":stock", $stock, PDO::PARAM_STR);
          $stmt->bindParam(":precio_venta", $precio_venta, PDO::PARAM_STR);
          $stmt->bindParam(":precio_compra", $precio_compra, PDO::PARAM_STR);
          $stmt->bindParam(":descuento", $descuento, PDO::PARAM_STR);
          $stmt->bindParam(":categoria_id", $categoria_id, PDO::PARAM_STR);
          $stmt->bindParam(":subcategoria_id", $subcategoria_id, PDO::PARAM_STR);
          $stmt->bindParam(":estado", $estado, PDO::PARAM_STR);

          if ($stmt->execute()) {
            $productosRegistrados = $productosRegistrados + 1;
          } else {
            $productosRegistrados = 0;
          }
        }
      }
    }
    $respuesta["totalCategorias"] = $categoriasRegistradas;
    $respuesta["totalProductos"] = $productosRegistrados;
    return $respuesta;
  }

  static public function mdlListarProductos()
  {

    $stmt = Conexion::conectar()->prepare('call prc_ListarProductos');

    $stmt->execute();

    return $stmt->fetchAll();
  }

  static public function mdlRegistrarProducto($codigo_producto, $id_categoria, $id_subcategoria, $doc_producto, $descripcion, $precio_compra, $precio_venta, $descuento_producto, $stock_producto, $id_unidad_medida, $id_proveedor, $precio_feria, $precio_oferta)
  {

    try {

      $stmt = Conexion::conectar()->prepare("INSERT INTO productos(codigo_producto, 
                                                    categoria_id,
                                                    subcategoria_id,
                                                    nombre, 
                                                    unidad_medida,
                                                    stock,
                                                    precio_venta, 
                                                    precio_compra,
                                                    documento,
                                                    descuento,
                                                    proveedor_id,
                                                    precio_feria,
                                                    precio_oferta) 
                            VALUES (:codigo_producto,
                                    :id_categoria,
                                    :id_subcategoria,
                                    :descripcion,
                                    :id_unidad_medida,
                                    :stock_producto,
                                    :precio_venta,
                                    :precio_compra,
                                    :doc_producto,
                                    :descuento_producto,
                                    :id_proveedor,
                                    :precio_feria,
                                    :precio_oferta)");

      $stmt->bindParam(":codigo_producto", $codigo_producto, PDO::PARAM_STR);
      $stmt->bindParam(":id_categoria", $id_categoria, PDO::PARAM_STR);
      $stmt->bindParam(":id_subcategoria", $id_subcategoria, PDO::PARAM_STR);
      $stmt->bindParam(":doc_producto", $doc_producto, PDO::PARAM_STR);
      $stmt->bindParam(":descripcion", $descripcion, PDO::PARAM_STR);
      $stmt->bindParam(":precio_compra", $precio_compra, PDO::PARAM_STR);
      $stmt->bindParam(":precio_venta", $precio_venta, PDO::PARAM_STR);
      $stmt->bindParam(":descuento_producto", $descuento_producto, PDO::PARAM_STR);
      $stmt->bindParam(":stock_producto", $stock_producto, PDO::PARAM_STR);
      $stmt->bindParam(":id_unidad_medida", $id_unidad_medida, PDO::PARAM_STR);
      $stmt->bindParam(":id_proveedor", $id_proveedor, PDO::PARAM_STR);
      $stmt->bindParam(":precio_feria", $precio_feria, PDO::PARAM_STR);
      $stmt->bindParam(":precio_oferta", $precio_oferta, PDO::PARAM_STR);

      if ($stmt->execute()) {
        $resultado = "ok";
      } else {
        $resultado = "error";
      }
    } catch (Exception $e) {
      $resultado = 'Excepcion capturada: ' . $e->getMessage() . "\n";
    }
    return $resultado;

    $stmt = null;
  }

  static public function mdlActualizarInformacion($table, $data, $id, $nameId)
  {

    $set = "";

    foreach ($data as $key => $value) {

      $set .= $key . " = :" . $key . ",";
    }

    $set = substr($set, 0, -1);

    $stmt = Conexion::conectar()->prepare("UPDATE $table SET $set WHERE $nameId = :$nameId");

    foreach ($data as $key => $value) {

      $stmt->bindParam(":" . $key, $data[$key], PDO::PARAM_STR);
    }

    $stmt->bindParam(":" . $nameId, $id, PDO::PARAM_INT);

    if ($stmt->execute()) {

      return "ok";
    } else {

      return Conexion::conectar()->errorInfo();
    }
  }
  static public function mdlListarNombreProductos()
  {

    $stmt = Conexion::conectar()->prepare("SELECT Concat(codigo_producto,' - ',nombre,' - Precio Normal Bs. ',precio_venta) as descripcion_producto, producto_id FROM productos");
    // $stmt = Conexion::conectar()->prepare("SELECT codigo_producto as descripcion_producto, producto_id FROM productos");

    $stmt->execute();

    return $stmt->fetchAll();
  }

  static public function mdlGetDatosProducto($codigo_producto)
  {
    $stmt = Conexion::conectar()->prepare("SELECT producto_id,
                                                  codigo_producto,
                                                  c.categoria_id,
                                                  c.nombre, 
                                                  p.nombre as nombre_p,
                                                  '1' as cantidad,
                                                  CONCAT('Bs. ',CONVERT(ROUND(precio_venta,2), CHAR)) as precio_venta,
                                                  p.descuento as descuento,
                                                  CONCAT('Bs. ',CONVERT(ROUND(precio_venta-(precio_venta*descuento/100)*1,2), CHAR)) as total,
                                                  '' as acciones,
                                                  '' as precios,
                                                  CONCAT('Bs. ',CONVERT(ROUND(p.precio_feria,2), CHAR)) as precio_feria,
                                                  CONCAT('Bs. ',CONVERT(ROUND(p.precio_oferta,2), CHAR)) as precio_oferta
                                          FROM productos p INNER JOIN categorias c ON p.categoria_id = c.categoria_id
                                          WHERE codigo_producto = SUBSTRING_INDEX('$codigo_producto',' ', 1)
                                          AND p.stock > 0");


    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_OBJ);
  }

  static public function mdlVerificaStockProducto($codigo_producto, $cantidad_a_comprar)
  {
    $stmt = Conexion::conectar()->prepare("SELECT count(*) as existe
                                            FROM productos p
                                            WHERE p.codigo_producto = :codigo_producto
                                            AND p.stock > :cantidad_a_comprar");

    $stmt->bindParam(":codigo_producto", $codigo_producto, PDO::PARAM_STR);
    $stmt->bindParam(":cantidad_a_comprar", $cantidad_a_comprar, PDO::PARAM_STR);

    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_OBJ);
  }

  static public function mdlActualizarStock($table, $data, $id, $nameId, $codigo_producto, $precioCompra, $precioVenta, $precioFeria, $documentoCompra, $idProveedor, $fechaRegistro, $observaCompra, $cantidadCompra)
  {

    $set = "";

    foreach ($data as $key => $value) {

      $set .= $key . " = :" . $key . ",";
    }

    $set = substr($set, 0, -1);

    $stmt = Conexion::conectar()->prepare("UPDATE $table SET $set WHERE $nameId = :$nameId");

    foreach ($data as $key => $value) {

      $stmt->bindParam(":" . $key, $data[$key], PDO::PARAM_STR);
    }

    $stmt->bindParam(":" . $nameId, $id, PDO::PARAM_INT);

    if ($stmt->execute()) {

      $stmt = Conexion::conectar()->prepare("INSERT INTO detalle_actualiza_producto(codigo_producto,precio_compra,precio_venta,precio_feria,documento,proveedor_id,fecha_actualiza,observa_actualiza,cantidad) 
      VALUES(:codigo_producto, :precioCompra, :precioVenta, :precioFeria, :documentoCompra, :idProveedor, :fechaRegistro, :observaCompra, :cantidadCompra)");

      $fechaR = date("Y-m-d", strtotime($fechaRegistro));

      $stmt->bindParam(":codigo_producto", $codigo_producto, PDO::PARAM_STR);
      $stmt->bindParam(":precioCompra", $precioCompra, PDO::PARAM_STR);
      $stmt->bindParam(":precioVenta", $precioVenta, PDO::PARAM_STR);
      $stmt->bindParam(":precioFeria", $precioFeria, PDO::PARAM_STR);
      $stmt->bindParam(":documentoCompra", $documentoCompra, PDO::PARAM_STR);
      $stmt->bindParam(":idProveedor", $idProveedor, PDO::PARAM_INT);
      $stmt->bindParam(":fechaRegistro", $fechaR, PDO::PARAM_STR);
      $stmt->bindParam(":observaCompra", $observaCompra, PDO::PARAM_STR);
      $stmt->bindParam(":cantidadCompra", $cantidadCompra, PDO::PARAM_INT);

      if ($stmt->execute()) {
        $resultado = "Se realizo la actualizacion de forma correcta";
      } else {
        $resultado = "Error al actualizar el stock";
      }
    } else {

      return Conexion::conectar()->errorInfo();
    }
    return $resultado;
  }
}
