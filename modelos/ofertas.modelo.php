<?php

require_once "conexion.php";

class OfertasModelo
{

  //public $resultado;

  static public function mdlObtenerNroOferta()
  {

    $stmt = Conexion::conectar()->prepare("call prc_ObtenerNroOferta()");

    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_OBJ);
  }

  static public function mdlRegistrarOferta($datos, $nro_oferta, $total_oferta, $id_proveedor, $id_categoria, $precio_venta_oferta, $unidad_medida, $cantidad_oferta, $descripcion, $codigo_oferta, $fecha_inicio, $fecha_fin)
  {

    //return $nro_boleta . ' ' . $obs_venta . ' ' . $id_cliente . ' ' . $id_vendedor;

    $stmt = Conexion::conectar()->prepare("INSERT INTO ofertas(nro_oferta,
                                                              total_oferta, 
                                                              id_proveedor, 
                                                              id_categoria, 
                                                              precio_venta_oferta, 
                                                              unidad_medida, 
                                                              cantidad_oferta, 
                                                              descripcion, 
                                                              codigo_oferta, 
                                                              fecha_inicio, 
                                                              fecha_fin,
                                                              fecha_registro)         
                                                VALUES(:nro_oferta,
                                                      :total_oferta, 
                                                      :id_proveedor, 
                                                      :id_categoria, 
                                                      :precio_venta_oferta, 
                                                      :unidad_medida, 
                                                      :cantidad_oferta, 
                                                      :descripcion, 
                                                      :codigo_oferta, 
                                                      :fecha_inicio, 
                                                      :fecha_fin,
                                                      :fecha_registro)");

    $fechaInicial = date("Y-m-d", strtotime($fecha_inicio));
    $fechaFinal = date("Y-m-d", strtotime($fecha_fin));
    $fechaAct = date("Y-m-d");

    $stmt->bindParam(":nro_oferta", $nro_oferta, PDO::PARAM_STR);
    $stmt->bindParam(":total_oferta", $total_oferta, PDO::PARAM_STR);
    $stmt->bindParam(":id_proveedor", $id_proveedor, PDO::PARAM_INT);
    $stmt->bindParam(":id_categoria", $id_categoria, PDO::PARAM_INT);
    $stmt->bindParam(":precio_venta_oferta", $precio_venta_oferta, PDO::PARAM_STR);
    $stmt->bindParam(":unidad_medida", $unidad_medida, PDO::PARAM_STR);
    $stmt->bindParam(":cantidad_oferta", $cantidad_oferta, PDO::PARAM_INT);
    $stmt->bindParam(":descripcion", $descripcion, PDO::PARAM_STR);
    $stmt->bindParam(":codigo_oferta", $codigo_oferta, PDO::PARAM_STR);
    $stmt->bindParam(":fecha_inicio", $fechaInicial, PDO::PARAM_STR);
    $stmt->bindParam(":fecha_fin", $fechaFinal, PDO::PARAM_STR);
    $stmt->bindParam(":fecha_registro", $fechaAct, PDO::PARAM_STR);



    if ($stmt->execute()) {

      $stmt = null;

      $stmt = Conexion::conectar()->prepare("UPDATE master_ofertas SET nro_oferta_correlativo = LPAD(nro_oferta_correlativo + 1,8,'0')");

      if ($stmt->execute()) {

        $listaProductos = [];

        for ($i = 0; $i < count($datos); ++$i) {

          $listaProductos = explode(",", $datos[$i]);

          $stmt = Conexion::conectar()->prepare("INSERT INTO detalle_ofertas(nro_oferta,codigo_producto, cantidad, precio, cod_productoID) 
                                                        VALUES(:nro_oferta,:codigo_producto,:cantidad,:total_oferta,:cod_producto)");

          $total_cant_oferta = $cantidad_oferta * $listaProductos[1];
          $stmt->bindParam(":nro_oferta", $nro_oferta, PDO::PARAM_STR);
          $stmt->bindParam(":codigo_producto", $listaProductos[0], PDO::PARAM_STR);
          $stmt->bindParam(":cantidad", $total_cant_oferta, PDO::PARAM_STR);
          $stmt->bindParam(":total_oferta", $listaProductos[2], PDO::PARAM_STR);
          $stmt->bindParam(":cod_producto", $listaProductos[3], PDO::PARAM_INT);

          if ($stmt->execute()) {

            $stmt = null;

            $stmt = Conexion::conectar()->prepare("UPDATE productos SET stock = stock - (:cantidad * :cantidad_oferta)
                                                    WHERE codigo_producto = :codigo_producto");

            $stmt->bindParam(":codigo_producto", $listaProductos[0], PDO::PARAM_STR);
            $stmt->bindParam(":cantidad", $listaProductos[1], PDO::PARAM_STR);
            $stmt->bindParam(":cantidad_oferta", $cantidad_oferta, PDO::PARAM_STR);

            if ($stmt->execute()) {
              $resultado = "Se registró la venta correctamente.";
            } else {
              $resultado = "Error al actualizar el stock";
            }
          } else {
            $resultado = "Error al registrar la venta";
          }
        }


        return $resultado;

        $stmt = null;
      }
    }
  }
}
