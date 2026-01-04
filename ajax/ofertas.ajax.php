<?php

require_once "../controladores/ofertas.controlador.php";
require_once "../modelos/ofertas.modelo.php";

class AjaxOfertas
{

  public function ajaxObtenerNroOferta()
  {

    $nroOferta = OfertasControlador::ctrObtenerNroOferta();

    echo json_encode($nroOferta, JSON_UNESCAPED_UNICODE);
  }


  public function ajaxRegistrarOferta($datos, $nro_oferta, $total_oferta, $id_proveedor, $id_categoria, $precio_venta_oferta, $unidad_medida, $cantidad_oferta, $descripcion, $codigo_oferta, $fecha_inicio, $fecha_fin)
  {

    $registroOferta = OfertasControlador::ctrRegistrarOferta($datos, $nro_oferta, $total_oferta, $id_proveedor, $id_categoria, $precio_venta_oferta, $unidad_medida, $cantidad_oferta, $descripcion, $codigo_oferta, $fecha_inicio, $fecha_fin);
    echo json_encode($registroOferta, JSON_UNESCAPED_UNICODE);
  }
}

if (isset($_POST["accion"]) && $_POST["accion"] == 1) {

  $nroOferta = new AjaxOfertas();
  $nroOferta->ajaxObtenerNroOferta();
} else {

  if ((isset($_POST["arr"]))) {


    $registrar = new AjaxOfertas();
    $registrar->ajaxRegistrarOferta($_POST["arr"], $_POST['nro_oferta'], $_POST['total_oferta'], $_POST['id_proveedor'], $_POST['id_categoria'], $_POST['precio_venta_oferta'], $_POST['unidad_medida'], $_POST['cantidad_oferta'], $_POST['descripcion'], $_POST['codigo_oferta'], $_POST['fecha_inicio'], $_POST['fecha_fin']);
  }
}
