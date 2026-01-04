<?php

require_once "../controladores/usuarios.controlador.php";
require_once "../modelos/usuario.modelo.php";

class AjaxUsuarios
{

  public $idUsuario;
  public $iptFechaRegistro;
  public $iptNombreUsuario;
  public $iptEstadoUsuario;
  public $iptNumeroFono;
  public $iptUsuario;
  public $iptPassword;
  public $iptPerfilUsuario;
  public $passwordActual;

  public $codigo_usuario;

  public function ajaxListarUsuarios()
  {

    $usuarios = UsuarioControlador::ctrListarUsuarios();

    echo json_encode($usuarios, JSON_UNESCAPED_UNICODE);
  }

  public function ajaxGuardarUsuario($accion)
  {

    $guardarUsuarios = UsuarioControlador::ctrGuardarUsuario($accion, $this->idUsuario, $this->iptNombreUsuario, $this->iptEstadoUsuario, $this->iptNumeroFono, $this->iptUsuario, $this->iptPassword, $this->iptPerfilUsuario, $this->passwordActual);

    echo json_encode($guardarUsuarios, JSON_UNESCAPED_UNICODE);
  }

  public function ajaxEliminarUsuario($codigo_usuario)
  {

    $respuesta = UsuarioControlador::ctrEliminarUsuario($codigo_usuario);

    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
  }
}

if (isset($_POST['idUsuario']) && $_POST['idUsuario'] > 0) { //EDITAR

  $editarUsuario = new AjaxUsuarios();
  $editarUsuario->idUsuario = $_POST['idUsuario'];
  $editarUsuario->iptNombreUsuario = $_POST["iptNombreUsuario"];
  $editarUsuario->iptEstadoUsuario = $_POST["iptEstadoUsuario"];
  $editarUsuario->iptNumeroFono = $_POST["iptNumeroFono"];
  $editarUsuario->iptUsuario = $_POST["iptUsuario"];
  $editarUsuario->iptPassword = $_POST["iptPassword"];
  $editarUsuario->iptPerfilUsuario = $_POST["iptPerfilUsuario"];
  $editarUsuario->passwordActual = $_POST["passwordActual"];
  $editarUsuario->ajaxGuardarUsuario(0);
} else if (isset($_POST['idUsuario']) && $_POST['idUsuario'] == 0) { //REGISTRAR

  $registrarUsuario = new AjaxUsuarios();
  $registrarUsuario->idUsuario = $_POST['idUsuario'];
  $registrarUsuario->iptNombreUsuario = $_POST["iptNombreUsuario"];
  $registrarUsuario->iptEstadoUsuario = $_POST["iptEstadoUsuario"];
  $registrarUsuario->iptNumeroFono = $_POST["iptNumeroFono"];
  $registrarUsuario->iptUsuario = $_POST["iptUsuario"];
  $registrarUsuario->iptPassword = $_POST["iptPassword"];
  $registrarUsuario->iptPerfilUsuario = $_POST["iptPerfilUsuario"];
  $registrarUsuario->passwordActual = $_POST["passwordActual"];
  $registrarUsuario->ajaxGuardarUsuario(1);
} else if (isset($_POST['accion']) && $_POST['accion'] == 2) {

  $eliminarCategoria = new AjaxUsuarios();
  $eliminarCategoria->ajaxEliminarUsuario($_POST['codigo_usuario']);
} else {

  $listaUsuarios = new AjaxUsuarios();
  $listaUsuarios->ajaxListarUsuarios();
}
