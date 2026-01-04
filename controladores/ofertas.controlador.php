<?php

class OfertasControlador
{

  static public function ctrObtenerNroOferta()
  {

    $nroOferta = OfertasModelo::mdlObtenerNroOferta();

    return $nroOferta;
  }

  static public function ctrRegistrarOferta($datos, $nro_oferta, $total_oferta, $id_proveedor, $id_categoria, $precio_venta_oferta, $unidad_medida, $cantidad_oferta, $descripcion, $codigo_oferta, $fecha_inicio, $fecha_fin)
  {

    $productos = OfertasModelo::mdlRegistrarOferta($datos, $nro_oferta, $total_oferta, $id_proveedor, $id_categoria, $precio_venta_oferta, $unidad_medida, $cantidad_oferta, $descripcion, $codigo_oferta, $fecha_inicio, $fecha_fin);

    return $productos;
  }
}
