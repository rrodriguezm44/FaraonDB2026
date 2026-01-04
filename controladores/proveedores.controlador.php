<?php

class ProveedoresControlador
{

  static public function ctrListarProveedores()
  {

    $proveedores = ProveedoresModelo::mdlListarProveedores();

    return $proveedores;
  }

  static public function ctrGuardarProveedor($accion, $idProveedor, $razonSocial, $nombreEmpresa, $telefono, $direccion, $nit)
  {

    $guardarProveedor = ProveedoresModelo::mdlGuardarProveedor($accion, $idProveedor, $razonSocial, $nombreEmpresa, $telefono, $direccion, $nit);
    return $guardarProveedor;
  }
}
