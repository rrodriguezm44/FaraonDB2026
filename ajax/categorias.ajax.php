<?php

require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";

class AjaxCategorias
{

  public $idCategoria;
  public $categoria;
  public $subcategoria;


  public function ajaxListarCategorias()
  {

    $categorias = CategoriasControlador::ctrListarCategorias();

    echo json_encode($categorias, JSON_UNESCAPED_UNICODE);
  }

  public function ajaxGuardarCategoria($accion)
  {

    $guardarCategorias = CategoriasControlador::ctrGuardarCategoria($accion, $this->idCategoria, $this->categoria, $this->subcategoria);

    echo json_encode($guardarCategorias, JSON_UNESCAPED_UNICODE);
  }

  public function ajaxEliminarCategoria($idCategoria)
  {

    $respuesta = CategoriasControlador::ctrEliminarCategoria($idCategoria);

    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
  }
}

if (isset($_POST['idCategoria']) && $_POST['idCategoria'] > 0) { //EDITAR

  $editarCategoria = new AjaxCategorias();
  $editarCategoria->idCategoria = $_POST['idCategoria'];
  $editarCategoria->categoria = $_POST['categoria'];
  $editarCategoria->subcategoria = $_POST['subcategoria'];
  $editarCategoria->ajaxGuardarCategoria(0);
} else if (isset($_POST['idCategoria']) && $_POST['idCategoria'] == 0) { //REGISTRAR

  $registrarCategoria = new AjaxCategorias();
  $registrarCategoria->idCategoria = $_POST['idCategoria'];
  $registrarCategoria->categoria = $_POST['categoria'];
  $registrarCategoria->subcategoria = $_POST['subcategoria'];
  $registrarCategoria->ajaxGuardarCategoria(1);
} else if (isset($_POST['accion']) && $_POST['accion'] == 2) {

  $eliminarCategoria = new AjaxCategorias();
  $eliminarCategoria->ajaxEliminarCategoria($_POST['cod_categoria']);
} else {

  $listaCategorias = new AjaxCategorias();
  $listaCategorias->ajaxListarCategorias();
}
