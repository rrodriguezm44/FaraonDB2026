<?php

class ClientesControlador
{

  static public function ctrListarClientes()
  {

    $clientes = ModeloClientes::mdlListarClientes();
    return $clientes;
  }

  static public function ctrEliminarCliente($idCliente)
  {

    $respuesta = ModeloClientes::mdlEliminarCliente($idCliente);

    return $respuesta;
  }

  static public function ctrGuardarCliente($accion, $idCliente, $razonSocial, $nombreEmpresa, $telefono, $direccion, $tipoEmpresa, $categoria, $nitEmpresa, $zona)
  {

    $guardarCliente = ModeloClientes::mdlGuardarCliente($accion, $idCliente, $razonSocial, $nombreEmpresa, $telefono, $direccion, $tipoEmpresa, $categoria, $nitEmpresa, $zona);
    return $guardarCliente;
  }
}
