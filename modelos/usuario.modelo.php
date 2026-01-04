<?php

require_once "conexion.php";

class UsuarioModelo
{
  // LOGIN DE USUARIO
  static public function mdlIniciarSesion($usuario, $password)
  {
    $stmt = Conexion::conectar()->prepare("select *
                                          from usuarios u
                                          inner join perfiles p
                                          on u.id_perfil_usuario = id_perfil
                                          inner join perfil_modulo pm
                                          on pm.id_perfil = u.id_perfil_usuario
                                          inner join modulos m
                                          on m.id = pm.id_modulo 
                                          where u.usuario = :usuario 
                                          and u.clave = :password 
                                          and vista_inicio = 1");
    $stmt->bindParam(":usuario", $usuario, PDO::PARAM_STR);
    $stmt->bindParam(":password", $password, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_CLASS);
  }

  /* static public function mdlObtenerMenuUsuario($id_usuario)
  {
    $stmt = Conexion::conectar()->prepare("SELECT m.id,m.modulo,m.icon_menu,m.vista,pm.vista_inicio
                                          FROM usuarios u inner join perfiles p on u.id_perfil_usuario = p.id_perfil
                                          inner join perfil_modulo pm on pm.id_perfil = p.id_perfil
                                          inner join modulos m on m.id = pm.id_modulo
                                          where u.id_usuario = :id_usuario
                                          and m.padre_id is null
                                          order by m.id;");

    $stmt->bindParam(":id_usuario", $id_usuario, PDO::PARAM_STR);

    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_CLASS);
  } */

static public function mdlObtenerMenuUsuario($id_usuario)
    {

        $stmt = Conexion::conectar()->prepare("SELECT m.id,m.modulo,m.icon_menu,m.vista,pm.vista_inicio,
                                                    (select count(1) from modulos m1
                                                            where m1.padre_id = m.id
                                                            and exists (select 'x' from perfil_modulo pm1 
                                                                        where pm1.id_modulo = m1.id 
                                                                        and pm1.vista_inicio = 1
                                                                        AND pm1.id_perfil = u.id_perfil_usuario)) as abrir_arbol
                                                from usuarios u inner join perfiles p on u.id_perfil_usuario = p.id_perfil
                                                inner join perfil_modulo pm on pm.id_perfil = p.id_perfil
                                                inner join modulos m on m.id = pm.id_modulo
                                                where u.id_usuario = :id_usuario
                                                and (m.padre_id is null or m.padre_id = 0)
                                                order by m.orden");

        $stmt->bindParam(":id_usuario", $id_usuario, PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

/*   static public function mdlObtenerSubMenuUsuario($idMenu)
  {
    $stmt = Conexion::conectar()->prepare("SELECT m.id,m.modulo,m.icon_menu,m.vista
                                          FROM modulos m
                                          where m.padre_id = :idMenu
                                          order by m.id;");

    $stmt->bindParam(":idMenu", $idMenu, PDO::PARAM_STR);

    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_CLASS);
  } */

      static public function mdlObtenerSubMenuUsuario($idMenu, $id_usuario)
    {

        $stmt = Conexion::conectar()->prepare("SELECT m.id,m.modulo,m.icon_menu,m.vista,pm.vista_inicio
                                                from usuarios u inner join perfiles p on u.id_perfil_usuario = p.id_perfil
                                                inner join perfil_modulo pm on pm.id_perfil = p.id_perfil
                                                inner join modulos m on m.id = pm.id_modulo
                                                where u.id_usuario = :id_usuario
                                                and m.padre_id = :idMenu
                                                order by m.orden");

        $stmt->bindParam(":idMenu", $idMenu, PDO::PARAM_STR);
        $stmt->bindParam(":id_usuario", $id_usuario, PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

  static public function mdlListarUsuarios()
  {

    $stmt = Conexion::conectar()->prepare("SELECT 
                                                  u.id_usuario as id,
                                                  u.nombre_usuario as nom_usuario,
                                                  u.usuario,
                                                  u.clave as clave,
                                                  p.descripcion as perfil,
                                                  CASE
                                                  WHEN u.estado = 1 THEN 'Activo'
                                                  WHEN u.estado = 2 THEN 'Desactivo'
                                                  ELSE 'Desconocido'
                                                  END as nestado,
                                                  u.telefono,
                                                  u.email,
                                                  u.fecha_registro as fecha,
                                                  '' as opciones,
                                                  u.id_perfil_usuario as idp,
                                                  u.estado as idestado
                                                  FROM usuarios u
                                                  JOIN perfiles p ON u.id_perfil_usuario = p.id_perfil
                                                  ORDER BY nombre_usuario");

    $stmt->execute();

    return $stmt->fetchAll();
  }

  static public function mdlGuardarUsuario($accion, $idUsuario, $iptNombreUsuario, $iptEstadoUsuario, $iptNumeroFono, $iptUsuario, $iptPassword, $iptPerfilUsuario, $passwordActual)
  {

    //$date = null;

    if ($accion > 0) { // REGISTRAR

      $date = date("Y-m-d");
      $encriptar = crypt($_POST["iptPassword"], '$2a$07$azybxcags23425sdg23sdeanQZqjaf6Birm2NvcYTNtJw24CsO5uq');

      $stmt = Conexion::conectar()->prepare("INSERT INTO usuarios (nombre_usuario,usuario,clave,id_perfil_usuario,estado,telefono,fecha_registro) 
                                            VALUES (:iptNombreUsuario, :iptUsuario, :encriptar,:iptPerfilUsuario,:iptEstadoUsuario,:iptNumeroFono,:fecha )");

      $stmt->bindParam(":iptNombreUsuario", $iptNombreUsuario, PDO::PARAM_STR);
      $stmt->bindParam(":iptUsuario", $iptUsuario, PDO::PARAM_STR);
      $stmt->bindParam(":encriptar", $encriptar, PDO::PARAM_STR);
      $stmt->bindParam(":iptEstadoUsuario", $iptEstadoUsuario, PDO::PARAM_STR);
      $stmt->bindParam(":iptNumeroFono", $iptNumeroFono, PDO::PARAM_STR);
      $stmt->bindParam(":iptPerfilUsuario", $iptPerfilUsuario, PDO::PARAM_STR);
      $stmt->bindParam(":fecha", $date, PDO::PARAM_STR);

      if ($stmt->execute()) {
        $resultado = "Se registró la categoría correctamente. ";
      } else {

        $resultado = "Error al registrar la categoria";
      }
    } else { // EDITAR

      if ($_POST["iptPassword"] != "") {

        $encriptar = crypt($_POST["iptPassword"], '$2a$07$azybxcags23425sdg23sdeanQZqjaf6Birm2NvcYTNtJw24CsO5uq');
      } else {

        $encriptar = $_POST["passwordActual"];
      }

      $stmt = Conexion::conectar()->prepare("UPDATE usuarios
                                            SET nombre_usuario = :iptNombreUsuario, 
                                            usuario = :iptUsuario,
                                            clave = :encriptar,
                                            estado = :iptEstadoUsuario,
                                            telefono = :iptNumeroFono,
                                            id_perfil_usuario = :iptPerfilUsuario
                                        
                                            WHERE id_usuario = :idUsuario");

      $stmt->bindParam(":iptNombreUsuario", $iptNombreUsuario, PDO::PARAM_STR);
      $stmt->bindParam(":iptUsuario", $iptUsuario, PDO::PARAM_STR);
      $stmt->bindParam(":encriptar", $encriptar, PDO::PARAM_STR);
      $stmt->bindParam(":iptEstadoUsuario", $iptEstadoUsuario, PDO::PARAM_STR);
      $stmt->bindParam(":iptNumeroFono", $iptNumeroFono, PDO::PARAM_STR);
      $stmt->bindParam(":iptPerfilUsuario", $iptPerfilUsuario, PDO::PARAM_STR);
      $stmt->bindParam(":idUsuario", $idUsuario, PDO::PARAM_STR);
      //$stmt->bindParam(":categoria", $categoria, PDO::PARAM_STR);


      if ($stmt->execute()) {
        $resultado = "Se actualizó la categoría correctamente. ";
      } else {
        $resultado = "Error al actualizar la categoría";
      }
    }

    return $resultado;

    $stmt = null;
  }

  static public function mdlEliminarUsuario($codigo_usuario)
  {

    $stmt = Conexion::conectar()->prepare("DELETE FROM usuarios WHERE id_usuario = :codigo_usuario");

    $stmt->bindParam(":codigo_usuario", $codigo_usuario, PDO::PARAM_STR);

    if ($stmt->execute()) {
      $resultado = "Se elimino el Usuario correctamente. ";
    } else {
      $resultado = "Error al eliminar el Usuario";
    }

    return $resultado;
  }
}