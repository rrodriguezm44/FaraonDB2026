<?php

class ProductosControlador
{

  static public function ctrCargaMasivaProductos($fileProductos)
  {

    $respuesta = ProductosModelo::mdlCargaMasivaProductos($fileProductos);

    return $respuesta;
  }

  static public function ctrListarProductos()
  {
    $productos = ProductosModelo::mdlListarProductos();
    return $productos;
  }

  static public function ctrRegistrarProducto($codigo_producto, $id_categoria, $id_subcategoria, $doc_producto, $descripcion, $precio_compra, $precio_venta, $descuento_producto, $stock_producto, $id_unidad_medida, $id_proveedor, $precio_feria, $precio_oferta)
  {
    $registroProducto = ProductosModelo::mdlRegistrarProducto($codigo_producto, $id_categoria, $id_subcategoria, $doc_producto, $descripcion, $precio_compra, $precio_venta, $descuento_producto, $stock_producto, $id_unidad_medida, $id_proveedor, $precio_feria, $precio_oferta);
    return $registroProducto;
  }

  static public function ctrListarNombreProductos()
  {

    $producto = ProductosModelo::mdlListarNombreProductos();

    return $producto;
  }

  static public function ctrGetDatosProducto($codigo_producto)
  {

    $producto = ProductosModelo::mdlGetDatosProducto($codigo_producto);

    return $producto;
  }

  static public function ctrVerificaStockProducto($codigo_producto, $cantidad_a_comprar)
  {

    $respuesta = ProductosModelo::mdlVerificaStockProducto($codigo_producto, $cantidad_a_comprar);

    return $respuesta;
  }

  static public function ctrActualizarProducto($table, $data, $id, $nameId)
  {

    $respuesta = ProductosModelo::mdlActualizarInformacion($table, $data, $id, $nameId);

    return $respuesta;
  }

  static public function ctrActualizarStock($table, $data, $id, $nameId, $codigo_producto, $precioCompra, $precioVenta, $precioFeria, $documentoCompra, $idProveedor, $fechaRegistro, $observaCompra, $cantidadCompra)
  {
    $respuesta = ProductosModelo::mdlActualizarStock($table, $data, $id, $nameId, $codigo_producto, $precioCompra, $precioVenta, $precioFeria, $documentoCompra, $idProveedor, $fechaRegistro, $observaCompra, $cantidadCompra);
    return $respuesta;
  }
}
