<?php

require_once "../controladores/tablero.controlador.php";
require_once "../modelos/tablero.modelo.php";
class AjaxTablero
{

  public function getDatosTablero()
  {
    $datos = TableroControlador::ctrGetDatosTablero();
    echo json_encode($datos);
  }

  public function getVentasMesActual()
  {
    $ventasMesActual = TableroControlador::ctrGetVentasMesActual();
    echo json_encode($ventasMesActual);
  }
}

if (isset($_POST['accion']) && $_POST['accion'] == 1) {

  $ventasMesActual = new AjaxTablero();
  $ventasMesActual->getVentasMesActual();
} else {

  $datos = new AjaxTablero();
  $datos->getDatosTablero();
}
