<?php

require_once "../controladores/ventas.controlador.php";
require_once "../modelos/ventas.modelo.php";

class AjaxVentas
{

  public function ajaxObtenerNroBoleta()
  {

    $nroBoleta = VentasControlador::ctrObtenerNroBoleta();

    echo json_encode($nroBoleta, JSON_UNESCAPED_UNICODE);
  }

  public function ajaxRegistrarVenta($datos, $nro_boleta, $total_venta, $descripcion_venta, $id_cliente, $vendedor, $obs_venta, $fechaEntrega, $tipoPago, $docVenta, $usuarioID)
  {

    $registroVenta = VentasControlador::ctrRegistrarVenta($datos, $nro_boleta, $total_venta, $descripcion_venta, $id_cliente, $vendedor, $obs_venta, $fechaEntrega, $tipoPago, $docVenta, $usuarioID);
    echo json_encode($registroVenta, JSON_UNESCAPED_UNICODE);
  }

  public function ajaxListarVentas($fechaDesde, $fechaHasta, $idUsuario = null, $idPerfil = null)
  {

    $ventas = VentasControlador::ctrListarVentas($fechaDesde, $fechaHasta, $idUsuario, $idPerfil);

    echo json_encode($ventas, JSON_UNESCAPED_UNICODE);
  }

  public function ajaxActualizarVenta($nro_boleta, $descripcion_venta, $id_cliente, $obs_venta, $fechaEntrega, $vendedor, $tipoPago, $docVenta)
  {

    $respuesta = VentasControlador::ctrActualizarVenta($nro_boleta, $descripcion_venta, $id_cliente, $obs_venta, $fechaEntrega, $vendedor, $tipoPago, $docVenta);

    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
  }

  public function ajaxObtenerVentaPorNroBoleta($nroBoleta)
  {

    $venta = VentasControlador::ctrObtenerVentaPorNroBoleta($nroBoleta);

    echo json_encode($venta, JSON_UNESCAPED_UNICODE);
  }

  public function ajaxEliminarVenta($nroBoleta)
  {

    $respuesta = VentasControlador::ctrEliminarVenta($nroBoleta);

    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
  }
}

if (isset($_POST["accion"]) && $_POST["accion"] == 1) {

  $nroBoleta = new AjaxVentas();
  $nroBoleta->ajaxObtenerNroBoleta();
} else if (isset($_POST["accion"]) && $_POST["accion"] == 2) { // LISTADO DE VENTAS POR RANGO DE FECHAS

  $idUsuario = isset($_POST["idUsuario"]) ? $_POST["idUsuario"] : null;
  $idPerfil = isset($_POST["idPerfil"]) ? $_POST["idPerfil"] : null;
  
  $ventas = new AjaxVentas();
  $ventas->ajaxListarVentas($_POST["fechaDesde"], $_POST["fechaHasta"], $idUsuario, $idPerfil);
} else if (isset($_POST["accion"]) && $_POST["accion"] == 3) { // ELIMINAR UN AVENTA

  $ventas = new AjaxVentas();
  $ventas->ajaxEliminarVenta($_POST["Boleta"]);
} else if (isset($_POST["accion"]) && $_POST["accion"] == 4) { // OBTENER VENTA POR NRO BOLETA

  $ventas = new AjaxVentas();
  $ventas->ajaxObtenerVentaPorNroBoleta($_POST["nroBoleta"]);
} else if (isset($_POST["accion"]) && $_POST["accion"] == 5) { // ACTUALIZAR VENTA

  $ventas = new AjaxVentas();
  $ventas->ajaxActualizarVenta($_POST["nro_boleta"], $_POST["descripcion_venta"], $_POST["id_cliente"], $_POST["obs_venta"], $_POST["fechaEntrega"], $_POST["vendedor"], $_POST["tipoPago"], $_POST["docVenta"]);
} else {

  if ((isset($_POST["arr"]))) {

    $registrar = new AjaxVentas();
    $registrar->ajaxRegistrarVenta($_POST["arr"], $_POST['nro_boleta'], $_POST['total_venta'], $_POST['descripcion_venta'], $_POST['id_cliente'], $_POST['vendedor'], $_POST['obs_venta'], $_POST['fechaEntrega'], $_POST['tipoPago'], $_POST['docVenta'], $_POST['usuarioID']);

    //echo json_encode($_POST['arr']);
  }
}
