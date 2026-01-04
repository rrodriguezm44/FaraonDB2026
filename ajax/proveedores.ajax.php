<?php

require_once "../controladores/proveedores.controlador.php";
require_once "../modelos/proveedores.modelo.php";

class AjaxProveedores
{
  public $idProveedor;
  public $razonSocial;
  public $nombreEmpresa;
  public $telefono;
  public $direccion;
  public $nit;
  public function ajaxListarProveedores()
  {

    $proveedores = ProveedoresControlador::ctrListarProveedores();

    echo json_encode($proveedores, JSON_UNESCAPED_UNICODE);
  }

  public function ajaxGuardarProveedor($accion)
  {

    $guardarProveedores = ProveedoresControlador::ctrGuardarProveedor($accion, $this->idProveedor, $this->razonSocial, $this->nombreEmpresa, $this->telefono, $this->direccion, $this->nit);

    echo json_encode($guardarProveedores, JSON_UNESCAPED_UNICODE);
  }
}

if (isset($_POST['idProveedor']) && $_POST['idProveedor'] > 0) { //EDITAR

  $editarProveedor = new AjaxProveedores();
  $editarProveedor->idProveedor = $_POST['idProveedor'];
  $editarProveedor->razonSocial = $_POST['razonSocial'];
  $editarProveedor->nombreEmpresa = $_POST['nombreEmpresa'];
  $editarProveedor->telefono = $_POST['telefono'];
  $editarProveedor->direccion = $_POST['direccion'];
  $editarProveedor->nit = $_POST['nit'];

  $editarProveedor->ajaxGuardarProveedor(0);
} else if (isset($_POST['idProveedor']) && $_POST['idProveedor'] == 0) { //REGISTRAR

  $registrarProveedor = new AjaxProveedores();
  $registrarProveedor->idProveedor = $_POST['idProveedor'];
  $registrarProveedor->razonSocial = $_POST['razonSocial'];
  $registrarProveedor->nombreEmpresa = $_POST['nombreEmpresa'];
  $registrarProveedor->telefono = $_POST['telefono'];
  $registrarProveedor->direccion = $_POST['direccion'];
  $registrarProveedor->nit = $_POST['nit'];
  //$registrarProveedor->fechaRegistro = $_POST['fechaRegistro'];

  $registrarProveedor->ajaxGuardarProveedor(1);
} else {
  $proveedores = new AjaxProveedores();
  $proveedores->ajaxListarProveedores();
}
