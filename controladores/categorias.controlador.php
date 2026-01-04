<?php

class CategoriasControlador
{

  static public function ctrListarCategorias()
  {

    $categorias = CategoriasModelo::mdlListarCategorias();

    return $categorias;
  }

  static public function ctrGuardarCategoria($accion, $idCategoria, $categoria, $subcategoria)
  {

    $guardarCategoria = CategoriasModelo::mdlGuardarCategoria($accion, $idCategoria, $categoria, $subcategoria);
    return $guardarCategoria;
  }

  static public function ctrEliminarCategoria($idCategoria)
  {

    $respuesta = CategoriasModelo::mdlEliminarCategoria($idCategoria);

    return $respuesta;
  }
}
