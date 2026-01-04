<?php

class ModuloControlador
{

  static public function ctrObtenerModulos()
  {

    $modulos = ModuloModelo::mdlObtenerModulos();

    return $modulos;
  }

  static public function ctrObtenerModulosPorPerfil($id_perfil)
  {

    $modulosPerfil = ModuloModelo::mdlObtenerModulosPorPerfil($id_perfil);

    return $modulosPerfil;
  }
}