<?php

require_once "../controladores/productosOfertas.controlador.php";
require_once "../modelos/productosOfertas.modelo.php";
require_once "../vendor/autoload.php";

class ajaxProductosOfertas
{

  public $codigo_producto;
  public $cantidad_a_comprar;
  /*   public $fileProductos;

  public $id_categoria;
  public $id_subcategoria;
  public $doc_producto;
  public $descripcion;
  public $precio_compra;
  public $precio_venta;
  public $precio_feria;
  public $precio_oferta;
  public $descuento_producto;
  public $stock_producto;
  public $id_unidad_medida;
  public $id_proveedor;

   */

  public function ajaxListarNombreProductosOfertas()
  {

    $NombreProductos = ProductosControladorOfertas::ctrListarNombreProductosOfertas();

    echo json_encode($NombreProductos);
  }

  public function ajaxGetDatosProductoOfertas()
  {

    $producto = ProductosControladorOfertas::ctrGetDatosProductoOfertas($this->codigo_producto);

    echo json_encode($producto);
  }

  public function ajaxVerificaStockProductoOfertas()
  {

    $respuesta = ProductosControladorOfertas::ctrVerificaStockProductoOfertas($this->codigo_producto, $this->cantidad_a_comprar);

    echo json_encode($respuesta);
  }

  /*public function ajaxListarProductos()
  {

    $productos = ProductosControlador::ctrListarProductos();

    echo json_encode($productos);
  }

  public function ajaxRegistrarProducto()
  {
    $producto = ProductosControlador::ctrRegistrarProducto($this->codigo_producto, $this->id_categoria, $this->id_subcategoria, $this->doc_producto, $this->descripcion, $this->precio_compra, $this->precio_venta, $this->descuento_producto, $this->stock_producto, $this->id_unidad_medida, $this->id_proveedor, $this->precio_feria, $this->precio_oferta);
    echo json_encode($producto);
  }

  public function ajaxActualizarProducto($data)
  {

    $table = "productos";
    $id = $_POST["codigo_producto"];
    $nameId = "codigo_producto";

    $respuesta = ProductosControlador::ctrActualizarProducto($table, $data, $id, $nameId);

    echo json_encode($respuesta);
  }

  public function ajaxGetDatosProducto()
  {

    $producto = ProductosControlador::ctrGetDatosProducto($this->codigo_producto);

    echo json_encode($producto);
  }

  public function ajaxVerificaStockProducto()
  {

    $respuesta = ProductosControlador::ctrVerificaStockProducto($this->codigo_producto, $this->cantidad_a_comprar);

    echo json_encode($respuesta);
  } */
}

if (isset($_POST['accion']) && $_POST['accion'] == 1) {

  $nombreProductos = new ajaxProductosOfertas();
  $nombreProductos->ajaxListarNombreProductosOfertas();
} else if (isset($_POST['accion']) && $_POST['accion'] == 2) { //OBTENER PRODUCTOS POR SU CODIGO

  $listaProducto = new ajaxProductosOfertas();

  $listaProducto->codigo_producto = $_POST['codigo_producto'];

  $listaProducto->ajaxGetDatosProductoOfertas();
} else if (isset($_POST['accion']) && $_POST['accion'] == 3) { //VERIFICAR STOCK DEL PRODUCTO

  $verificaStock = new ajaxProductosOfertas();

  $verificaStock->codigo_producto = $_POST['codigo_producto'];
  $verificaStock->cantidad_a_comprar = $_POST['cantidad_a_comprar'];

  $verificaStock->ajaxVerificaStockProductoOfertas();
}

/* if (isset($_POST['accion']) && $_POST['accion'] == 1) { // parametro para listar productos

  $productos = new ajaxProductos();
  $productos->ajaxListarProductos();
} else if (isset($_POST['accion']) && $_POST['accion'] == 2) { //parametro para registrar productos

  $registrarProducto = new ajaxProductos();
  $registrarProducto->codigo_producto = $_POST["codigo_producto"];
  $registrarProducto->id_categoria = $_POST["id_categoria"];
  $registrarProducto->id_subcategoria = $_POST["id_subcategoria"];
  $registrarProducto->doc_producto = $_POST["doc_producto"];
  $registrarProducto->descripcion = $_POST["descripcion"];
  $registrarProducto->precio_compra = $_POST["precio_compra"];
  $registrarProducto->precio_venta = $_POST["precio_venta"];
  $registrarProducto->precio_feria = $_POST["precio_feria"];
  $registrarProducto->precio_oferta = $_POST["precio_oferta"];
  $registrarProducto->descuento_producto = $_POST["descuento_producto"];
  $registrarProducto->stock_producto = $_POST["stock_producto"];
  $registrarProducto->id_unidad_medida = $_POST["id_unidad_medida"];
  $registrarProducto->id_proveedor = $_POST["id_proveedor"];
  $registrarProducto->ajaxRegistrarProducto();
} else if (isset($_POST['accion']) && $_POST['accion'] == 4) { // ACCION PARA ACTUALIZAR UN PRODUCTO

  $actualizarProducto = new ajaxProductos();

  $data = array(

    "codigo_producto" => $_POST["codigo_producto"],
    "nombre" => $_POST["descripcion"],
    "unidad_medida" => $_POST["id_unidad_medida"],
    "stock" => $_POST["stock_producto"],
    "precio_venta" => $_POST["precio_venta"],
    "precio_feria" => $_POST["precio_feria"],
    "precio_oferta" => $_POST["precio_oferta"],
    "precio_compra" => $_POST["precio_compra"],
    "descuento" => $_POST["descuento_producto"],
    "categoria_id" => $_POST["id_categoria"],
    "subcategoria_id" => $_POST["id_subcategoria"],
    "proveedor_id" => $_POST["id_proveedor"],
    "documento" => $_POST["doc_producto"],

  );

  $actualizarProducto->ajaxActualizarProducto($data);
} else if (isset($_POST['accion']) && $_POST['accion'] == 6) {

  $nombreProductos = new ajaxProductos();
  $nombreProductos->ajaxListarNombreProductos();
} else if (isset($_POST['accion']) && $_POST['accion'] == 7) { //OBTENER PRODUCTOS POR SU CODIGO

  $listaProducto = new ajaxProductos();

  $listaProducto->codigo_producto = $_POST['codigo_producto'];

  $listaProducto->ajaxGetDatosProducto();
} else if (isset($_POST['accion']) && $_POST['accion'] == 8) { //VERIFICAR STOCK DEL PRODUCTO

  $verificaStock = new ajaxProductos();

  $verificaStock->codigo_producto = $_POST['codigo_producto'];
  $verificaStock->cantidad_a_comprar = $_POST['cantidad_a_comprar'];

  $verificaStock->ajaxVerificaStockProducto();
} else if (isset($_FILES)) {

  $archivo_productos = new ajaxProductos();
  $archivo_productos->fileProductos = $_FILES['fileProductos'];
  $archivo_productos->ajaxCargaMasivaProductos();
} */