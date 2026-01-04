<?php

class UsuarioControlador
{

  public function login()
  {

    if (isset($_POST["loginUsuario"])) {

      $usuario = $_POST["loginUsuario"];

      $password = crypt($_POST["loginPassword"], '$2a$07$azybxcags23425sdg23sdeanQZqjaf6Birm2NvcYTNtJw24CsO5uq');

      $respuesta = UsuarioModelo::mdlIniciarSesion($usuario, $password);

      if (count($respuesta) > 0) {

        $_SESSION["usuario"] = $respuesta[0];

        echo '
            <script>

              window.location = "http://localhost/faraonbd/"
              
            </script>
        ';
      } else {
        echo '
            <script>

              fncSweetAlert{
                "error",
                "Usuario y/o contraseña invalida",
                "http://localhost/faraondb/"
              };  
            

            </script>
        ';
      }
    }
  }

  static public function ctrObtenerMenuUsuario($id_usuario)
  {

    $menuUsuario = UsuarioModelo::mdlObtenerMenuUsuario($id_usuario);

    return $menuUsuario;
  }

  static public function ctrObtenerSubMenuUsuario($idMenu)
  {

    $subMenuUsuario = UsuarioModelo::mdlObtenerSubMenuUsuario($idMenu);

    return $subMenuUsuario;
  }

  static public function ctrListarUsuarios()
  {

    $usuarios = UsuarioModelo::mdlListarUsuarios();

    return $usuarios;
  }

  static public function ctrGuardarUsuario($accion, $idUsuario, $iptNombreUsuario, $iptEstadoUsuario, $iptNumeroFono, $iptUsuario, $iptPassword, $iptPerfilUsuario, $passwordActual)
  {

    $guardarUsuario = UsuarioModelo::mdlGuardarUsuario($accion, $idUsuario, $iptNombreUsuario, $iptEstadoUsuario, $iptNumeroFono, $iptUsuario, $iptPassword, $iptPerfilUsuario, $passwordActual);
    return $guardarUsuario;
  }

  static public function ctrEliminarUsuario($codigo_usuario)
  {

    $respuesta = UsuarioModelo::mdlEliminarUsuario($codigo_usuario);

    return $respuesta;
  }
}