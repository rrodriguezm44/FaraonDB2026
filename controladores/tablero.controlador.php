<?php

class TableroControlador
{
  static public function ctrGetDatosTablero()
  {
    $datos = TableroModelo::mdlGetDatosTablero();
    return $datos;
  }

  static public function ctrGetVentasMesActual()
  {
    $ventasMesActual = TableroModelo::mdlGetVentasMesActual();
    return $ventasMesActual;
  }
}
