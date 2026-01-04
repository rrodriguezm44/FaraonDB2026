<?php

class VentasControlador
{

  static public function ctrObtenerNroBoleta()
  {

    $nroBoleta = VentasModelo::mdlObtenerNroBoleta();

    return $nroBoleta;
  }

  static public function ctrRegistrarVenta($datos, $nro_boleta, $total_venta, $descripcion_venta, $id_cliente, $vendedor, $obs_venta, $fechaEntrega, $tipoPago, $docVenta, $usuarioID)
  {

    $productos = VentasModelo::mdlRegistrarVenta($datos, $nro_boleta, $total_venta, $descripcion_venta, $id_cliente, $vendedor, $obs_venta, $fechaEntrega, $tipoPago, $docVenta, $usuarioID);

    return $productos;
  }

  static public function ctrListarVentas($fechaDesde, $fechaHasta)
  {

    $ventas = VentasModelo::mdlListarVentas($fechaDesde, $fechaHasta);

    return $ventas;
  }

  static public function ctrEliminarVenta($nroBoleta)
  {

    $respuesta = VentasModelo::mdlEliminarVenta($nroBoleta);

    return $respuesta;
  }
}
