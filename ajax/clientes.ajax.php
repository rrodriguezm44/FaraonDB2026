<?php

require_once "../controladores/clientes.controlador.php";
require_once "../modelos/clientes.modelo.php";
class AjaxClientes
{

  public $idCliente;
  public $razonSocial;
  public $nombreEmpresa;
  public $telefono;
  public $direccion;
  public $tipoEmpresa;
  public $categoria;
  public function ajaxListarClientes()
  {

    $listaClientes = ClientesControlador::ctrListarClientes();

    echo json_encode($listaClientes, JSON_UNESCAPED_UNICODE);
  }

  public function ajaxEliminarCliente($idCliente)
  {

    $respuesta = ClientesControlador::ctrEliminarCliente($idCliente);

    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
  }

  public function ajaxGuardarCliente($accion)
  {

    $guardarClientes = ClientesControlador::ctrGuardarCliente($accion, $this->idCliente, $this->razonSocial, $this->nombreEmpresa, $this->telefono, $this->direccion, $this->tipoEmpresa, $this->categoria);

    echo json_encode($guardarClientes, JSON_UNESCAPED_UNICODE);
  }
}

if (isset($_POST['idCliente']) && $_POST['idCliente'] > 0) { //EDITAR

  $editarCliente = new AjaxClientes();
  $editarCliente->idCliente = $_POST['idCliente'];
  $editarCliente->razonSocial = $_POST['razonSocial'];
  $editarCliente->nombreEmpresa = $_POST['nombreEmpresa'];
  $editarCliente->telefono = $_POST['telefono'];
  $editarCliente->direccion = $_POST['direccion'];
  $editarCliente->tipoEmpresa = $_POST['tipoEmpresa'];
  $editarCliente->categoria = $_POST['categoria'];

  $editarCliente->ajaxGuardarCliente(0);
} else if (isset($_POST['idCliente']) && $_POST['idCliente'] == 0) { //REGISTRAR

  $registrarCliente = new AjaxClientes();
  $registrarCliente->idCliente = $_POST['idCliente'];
  $registrarCliente->razonSocial = $_POST['razonSocial'];
  $registrarCliente->nombreEmpresa = $_POST['nombreEmpresa'];
  $registrarCliente->telefono = $_POST['telefono'];
  $registrarCliente->direccion = $_POST['direccion'];
  $registrarCliente->tipoEmpresa = $_POST['tipoEmpresa'];
  $registrarCliente->categoria = $_POST['categoria'];

  $registrarCliente->ajaxGuardarCliente(1);
} else if (isset($_POST['accion']) && $_POST['accion'] == 2) { //borrar clientes

  $eliminarCliente = new AjaxClientes();
  $eliminarCliente->ajaxEliminarCliente($_POST['cod_cliente']);
} else {
  $listaClientes = new AjaxClientes();
  $listaClientes->ajaxListarClientes();
}
