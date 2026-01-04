<?php

require_once "conexion.php";

class VentasModelo
{

  public $resultado;

  static public function mdlObtenerNroBoleta()
  {

    $stmt = Conexion::conectar()->prepare("call prc_ObtenerNroBoleta()");

    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_OBJ);
  }

  static public function mdlRegistrarVenta($datos, $nro_boleta, $total_venta, $descripcion_venta, $id_cliente, $vendedor, $obs_venta, $fechaEntrega, $tipoPago, $docVenta, $usuarioID)
  {

    date_default_timezone_set("America/La_Paz");
    $fechaIng = date("Y-m-d", strtotime($fechaEntrega));
    $fechaPre = date("Y-m-d");

    // GUARDAR REFERENCIA A LA CONEXIÓN PDO
    $dbh = Conexion::conectar();

    $stmt = $dbh->prepare("INSERT INTO ventas(nro_boleta,
                                              descripcion,
                                              total,
                                              cliente_id,
                                              observa_venta,
                                              fecha_entrega,
                                              vendedorID,
                                              tipoPago,
                                              docuVenta, usuarioID, fecha_e)         
                          VALUES(:nro_boleta,
                                :descripcion,
                                :total_venta,
                                :id_cliente,
                                :obs_venta,
                                :fechaEntrega,
                                :codVendedor,
                                :tipoPago,
                                :docVenta,
                                :usuarioID,
                                :fecha_e)");


    $stmt->bindParam(":nro_boleta", $nro_boleta, PDO::PARAM_STR);
    $stmt->bindParam(":descripcion", $descripcion_venta, PDO::PARAM_STR);
    $stmt->bindParam(":total_venta", $total_venta, PDO::PARAM_STR);
    $stmt->bindParam(":id_cliente", $id_cliente, PDO::PARAM_INT);
    $stmt->bindParam(":obs_venta", $obs_venta, PDO::PARAM_STR);
    $stmt->bindParam(":fechaEntrega", $fechaIng, PDO::PARAM_STR);
    $stmt->bindParam(":codVendedor", $vendedor, PDO::PARAM_INT);
    $stmt->bindParam(":tipoPago", $tipoPago, PDO::PARAM_INT);
    $stmt->bindParam(":docVenta", $docVenta, PDO::PARAM_INT);
    $stmt->bindParam(":usuarioID", $usuarioID, PDO::PARAM_INT);
    $stmt->bindParam(":fecha_e", $fechaPre, PDO::PARAM_STR);


    if ($stmt->execute()) {

      // OBTENER EL ID DEL PDO (no del statement)
      $id_venta_inserted = $dbh->lastInsertId();

      $stmt = null;

      $stmt = $dbh->prepare("UPDATE empresa SET nro_correlativo_venta = LPAD(nro_correlativo_venta + 1,8,'0')");

      if ($stmt->execute()) {

        $listaProductos = [];

        for ($i = 0; $i < count($datos); ++$i) {

          $listaProductos = explode(",", $datos[$i]);

          $stmt = $dbh->prepare("INSERT INTO detalle_ventas(nro_boleta,
                                                            codigo_producto, 
                                                            cantidad, 
                                                            total_producto, 
                                                            codProducto, 
                                                            precio, 
                                                            descuento_porcentual, 
                                                            venta_id) 
                                  VALUES(:nro_boleta,
                                          :codigo_producto,
                                          :cantidad,
                                          :total_venta,
                                          :cod_producto,
                                          :precio,
                                          :descuento,
                                          :id_venta)");

          $stmt->bindParam(":nro_boleta", $nro_boleta, PDO::PARAM_STR);
          $stmt->bindParam(":codigo_producto", $listaProductos[0], PDO::PARAM_STR);
          $stmt->bindParam(":cantidad", $listaProductos[1], PDO::PARAM_STR);
          $stmt->bindParam(":total_venta", $listaProductos[2], PDO::PARAM_STR);
          $stmt->bindParam(":cod_producto", $listaProductos[3], PDO::PARAM_INT);
          $stmt->bindParam(":precio", $listaProductos[4], PDO::PARAM_STR);
          $stmt->bindParam(":descuento", $listaProductos[5], PDO::PARAM_STR);
          $stmt->bindParam(":id_venta", $id_venta_inserted, PDO::PARAM_INT);

          if ($stmt->execute()) {

            $stmt = null;

            $concepto = 'VENTA';

            $stmt = $dbh->prepare("call prc_registrar_kardex_ventas (:codigo_producto,
                                                                     upper(:concepto),
                                                                     upper(:comprobante),
                                                                     :cantidad_venta,
                                                                     :precio_venta)");

            $stmt->bindParam(":codigo_producto", $listaProductos[0], PDO::PARAM_STR);
            $stmt->bindParam(":concepto", $concepto, PDO::PARAM_STR);
            $stmt->bindParam(":comprobante", $nro_boleta, PDO::PARAM_STR);
            $stmt->bindParam(":cantidad_venta", $listaProductos[1], PDO::PARAM_STR);
            $stmt->bindParam(":precio_venta", $listaProductos[4], PDO::PARAM_STR);

            // $stmt = Conexion::conectar()->prepare("UPDATE productos SET stock = stock - :cantidad
            //                                                     WHERE codigo_producto = :codigo_producto");

            // $stmt->bindParam(":codigo_producto", $listaProductos[0], PDO::PARAM_STR);
            // $stmt->bindParam(":cantidad", $listaProductos[1], PDO::PARAM_STR);

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
    } else {
      return "Error al registrar la venta";
    }
  }

  static public function mdlListarVentas($fechaDesde, $fechaHasta)
  {

    try {
      /* LISTADO DE PRODUCTOS VENDIDOS */
      $stmt = Conexion::conectar()->prepare("SELECT Concat('Boleta Nro: ',dv.nro_boleta,' - Total Venta: Bs. ',Round(v.total,2)) as nro_boleta,
                                            dv.codigo_producto,
                                            c.nombre,
                                            p.nombre,
                                            dv.cantidad,                            
                                            concat('Bs. ',round(dv.total_producto,2)) as precio,
                                            v.fecha_venta
                                            FROM detalle_ventas dv 
                                            inner join productos p on dv.codigo_producto = p.codigo_producto
                                            inner join ventas v on cast(v.nro_boleta as integer) = cast(dv.nro_boleta as integer)
                                            inner join categorias c on c.categoria_id = p.categoria_id
                                      where DATE(v.fecha_venta) >= date(:fechaDesde) and DATE(v.fecha_venta) <= date(:fechaHasta)
                                      order by dv.nro_boleta desc");

      $stmt->bindParam(":fechaDesde", $fechaDesde, PDO::PARAM_STR);
      $stmt->bindParam(":fechaHasta", $fechaHasta, PDO::PARAM_STR);

      $stmt->execute();

      return $stmt->fetchAll();
    } catch (Exception $e) {
      return 'Excepción capturada: ' .  $e->getMessage() . "\n";
    }

    $stmt = null;
  }

  static public function mdlEliminarVenta($nroBoleta)
  {

    $stmt = Conexion::conectar()->prepare("call prc_eliminar_venta(:nroBoleta)");

    $stmt->bindParam(":nroBoleta", $nroBoleta, PDO::PARAM_STR);

    $stmt->execute();

    return $stmt->fetch();
  }
}