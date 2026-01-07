<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h2 class="m-0 fw-bold">Inventario / Productos</h2>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
          <li class="breadcrumb-item active">Inventario / Productos</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content mb-3">

  <div class="container-fluid">

    <!-- row para criterios de busqueda -->
    <div class="row">

      <div class="col-lg-12">

        <div class="card card-gray shadow">
          <div class="card-header">
            <h3 class="card-title">CRITERIOS DE BÚSQUEDA</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool text-warning" id="btnLimpiarBusqueda">
                <i class="fas fa-times"></i>
              </button>
            </div> <!-- ./ end card-tools -->
          </div> <!-- ./ end card-header -->
          <div class="card-body">

            <div class="row">

              <div class="d-none d-md-flex col-md-12 ">

                <div style="width: 20%;" class="form-floating mx-1">
                  <input type="text" id="iptCodigoBarras" class="form-control" data-index="3">
                  <label for="iptCodigoBarras">Código Producto</label>
                </div>

                <div style="width: 20%;" class="form-floating mx-1">
                  <select class="form-select select2" id="id_categoria_busqueda" data-index="14"
                    aria-label="Floating label select example">
                  </select>
                  <label for="floatingSelect">Categorías</label>
                </div>

                <div style="width: 20%;" class="form-floating mx-1">
                  <input type="text" id="iptProducto" class="form-control" data-index="4">
                  <label for="iptProducto">Producto</label>
                </div>

                <div style="width: 20%;" class="form-floating mx-1">
                  <input type="text" id="iptPrecioVentaDesde" class="form-control">
                  <label for="iptPrecioVentaDesde">P. Venta Desde</label>
                </div>

                <div style="width: 20%;" class="form-floating mx-1">
                  <input type="text" id="iptPrecioVentaHasta" class="form-control">
                  <label for="iptPrecioVentaHasta">P. Venta Hasta</label>
                </div>
              </div>

            </div>
          </div> <!-- ./ end card-body -->
        </div>

      </div>

    </div>

    <!-- row para listado de productos/inventario -->
    <div class="row">
      <div class="col-lg-12">
        <table id="tbl_inventario" class="table w-100 shadow border border-secondary">
          <thead class="bg-main">
            <tr style="font-size: 15px;">
              <th> </th> <!-- 0 -->
              <th class="text-cetner">Opciones</th> <!-- *1 -->
              <th>id</th> <!-- 2 -->
              <th>Codigo</th> <!-- *3 -->
              <th>Descripcion</th><!-- *4 -->
              <th>Categoria</th><!-- *5 -->
              <th>SubCateg.</th><!-- *6 -->
              <th>Stock</th><!-- *7 -->
              <th>P. Compra</th><!-- *8 -->
              <th>P. Venta</th><!-- *9 -->
              <th>Desct.%</th><!-- *10 -->
              <th>Proveedor</th><!-- *11 -->
              <th>P. Feria</th><!-- 12 -->
              <th>P. Oferta</th><!-- 13 -->
              <th>CategoriaId</th><!-- 14 -->
              <th>SubCategoriaId</th><!-- 15 -->
              <th>U.Medida</th><!-- 16 -->
              <th>DocuCompra</th><!-- 17 -->
              <th>ProvId</th><!-- 18 -->
            </tr>
          </thead>
          <tbody class="text-small">
          </tbody>
        </table>
      </div>
    </div>

  </div><!-- /.container-fluid -->

</div>
<!-- /.content -->

<!-- =============================================================================================================================
VENTA MODAL PARA REGISTRAR O ACTUALIZAR UN PRODUCTO 
===============================================================================================================================-->
<div class="modal fade" id="mdlGestionarProducto" role="dialog">

  <div class="modal-dialog modal-lg" role="document">

    <!-- contenido del modal -->
    <div class="modal-content">

      <!-- cabecera del modal -->
      <div class="modal-header bg-gray py-1">

        <h5 class="modal-title titulo-modal-productos">Agregar Producto</h5>

        <button type="button" class="btn btn-danger text-white border-0 fs-5" data-bs-dismiss="modal"
          id="btnCerrarModal">
          <i class="far fa-times-circle"></i>
        </button>

      </div>

      <!-- cuerpo del modal -->
      <div class="modal-body">

        <form id="frm-datos-producto" class="needs-validation" novalidate>

          <!-- Abrimos una fila -->
          <div class="row">

            <!-- CODIGO DE BARRAS -->
            <div class="col-12 col-lg-6">

              <div class="form-floating mb-2">

                <input type="text" id="codigo_producto" class="form-control"
                  onchange="validateJS(event, 'codigo_producto')" name="codigo_producto" required>
                
                  <label for="codigo_producto"><i class="fas fa-barcode fs-6"></i><span class="small"> Código del
                    Producto</span><span class="text-danger">*</span></label>

                <div class="invalid-feedback">Ingrese el código del Producto</div>

              </div>

            </div>

            <!-- CATEGORIAS -->
            <div class="col-12 col-lg-6">

              <div class="form-floating mb-2">

                <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="id_categoria"
                  name="id_categoria" placeholder="categoria" required>
                </select>

                <label for="id_categoria"><i class="fas fa-columns fs-6"></i><span class="small"> Categoria</span><span
                    class="text-danger">*</span></label>

                <div class="invalid-feedback">Seleccione la categoría</div>

              </div>

            </div>


            <!-- SUB-CATEGORIAS -->
            <div class="col-12 col-lg-6">

              <div class="form-floating mb-2">

                <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="id_subcategoria"
                  name="id_subcategoria" aria-label="Floating label select example" required>
                </select>
                <label for="id_subcategoria"><i class="fas fa-clone fs-6"></i><span class="small">
                    Sub-Categoria</span><span class="text-danger">*</span></label>

                <div class="invalid-feedback">Seleccione la Sub Categoría</div>

              </div>

            </div>

            <!-- DOCUMENTO COMPRA-->
            <div class="col-12 col-lg-6">

              <div class="form-floating mb-2">

                <input type="text" id="doc_producto" class="form-control" name="doc_producto" placeholder="Documento">
                <label for="doc_producto"><i class="fas fa-book fs-6"></i><span class="small"> Documento
                    Compra</span></label>
                <!-- <div class="invalid-feedback">Ingrese el codigo del Producto</div> -->

              </div>

            </div>

            <!-- DESCRIPCION DEL PRODUCTO -->
            <div class="col-8">

              <div class="form-floating mb-2">

                <input type="text" class="form-control text-uppercase" id="descripcion" name="descripcion" required>
                <label for="descripcion"><i class="fas fa-file-signature fs-6"></i><span class="small">
                    Descripcion</span><span class="text-danger">*</span></label>

                <div class="invalid-feedback">Ingrese la descripción</div>

              </div>

            </div>

            <!-- PRECIO DE COMPRA -->
            <div class="col-12 col-lg-4">

              <div class="form-floating mb-2">

                <input type="number" step="any" min="0" id="precio_compra" class="form-control" name="precio_compra"
                  required>
                <label for="precio_compra"><i class="fas fa-hand-holding-usd fs-6"></i><span class="small"> Precio de
                    Compra</span><span class="text-danger">*</span></label>

                <div class="invalid-feedback">Registre Precio de Compra</div>

              </div>

            </div>
            <!-- PORCENTAJE DE CALCULO -->
            <div class="col-12 col-lg-3">

              <div class="form-floating mb-2">

                <input type="number" min="0" id="porciento" class="form-control" name="porciento"
                  placeholder="Porcentaje de Calculo">
                <label for="porciento"><i class="fas fa-coins fs-6"></i><span class="small"> Porciento
                    Calculo</span></label>

              </div>

            </div>

            <!-- PRECIO DE VENTA -->
            <div class="col-12 col-lg-3">

              <div class="form-floating mb-2">

                <input type="number" step="any" min="0" id="precio_venta" class="form-control" name="precio_venta"
                  placeholder="Precio de Venta" required>
                <label for="precio_venta"><i class="fas fa-dollar-sign fs-6"></i><span class="small"> Precio de
                    Venta</span><span class="text-danger">*</span></label>

                <div class="invalid-feedback">Ingrese el Precio de Venta</div>

              </div>

            </div>
            <!-- PRECIO DE FERIA -->
            <div class="col-12 col-lg-3">

              <div class="form-floating mb-2">

                <input type="number" step="any" min="0" id="precio_feria" class="form-control" name="precio_feria"
                  placeholder="Precio de Feria" required>
                <label for="precio_feria"><i class="fas fa-comment-dollar fs-6"></i><span class="small"> Precio de
                    Feria</span><span class="text-danger">*</span></label>

                <div class="invalid-feedback">Ingrese el Precio de Feria</div>

              </div>

            </div>
            <!-- PRECIO DE OFERTA -->
            <div class="col-12 col-lg-3">

              <div class="form-floating mb-2">

                <input type="number" step="any" min="0" id="precio_oferta" class="form-control" name="precio_oferta"
                  placeholder="Precio de Oferta" required>
                <label for="precio_Oferta"><i class="fas fa-piggy-bank fs-6"></i><span class="small"> Precio de
                    Oferta</span><span class="text-danger">*</span></label>

                <div class="invalid-feedback">Ingrese el Precio de Oferta</div>

              </div>

            </div>

            <!-- DESCUENTO -->
            <div class="col-12 col-lg-3">

              <div class="form-floating mb-2">

                <input type="number" min="0" id="descuento_producto" class="form-control" name="descuento_producto"
                  placeholder="Descuento General" required>
                <label for="descuento_producto"><i class="fas fa-donate fs-6"></i><span class="small"> Descuento
                    General</span><span class="text-danger">*</span></label>
                <span id="validate_descuento" style="display: none;" class="text-danger small fst-italic">Debe Ingresar
                  el Descuento General</span>
                <div class="invalid-feedback">Registre Descuento</div>

              </div>

            </div>
            <!-- STOCK -->
            <div class="col-12 col-lg-3">

              <div class="form-floating mb-2">

                <input type="number" min="0" id="stock_producto" class="form-control" name="stock_producto"
                  placeholder="Cantidad Comprada" required>
                <label for="stock_producto"><i class="fas fa-layer-group fs-6"></i><span class="small"> Nuevo
                    Stock</span><span class="text-danger">*</span></label>

                <div class="invalid-feedback">Registre Stock</div>

              </div>

            </div>
            <!-- UNIDAD MEDIDA -->
            <div class="col-12 col-lg-3">

              <div class="form-floating mb-2">

                <input type="text" id="id_unidad_medida" class="form-control" name="id_unidad_medida"
                  placeholder="Unidad de Medida">
                <label for="id_unidad_medida"><i class="fas fa-eye-dropper fs-6"></i><span
                    class="small">Unidad/Medida</span></label>

                <!-- <div class="invalid-feedback">Seleccione la Unidad de Medida</div> -->

              </div>

            </div>
            <!-- PROVEEDOR -->
            <div class="col-12 col-lg-3">

              <div class="form-floating mb-2">

                <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="id_proveedor"
                  name="id_proveedor" required>
                </select>
                <label for="id_proveedor"><i class="fas fa-truck-moving fs-6"></i><span class="small">
                    Proveedor</span><span class="text-danger">*</span></label>

                <!-- <div class="invalid-feedback">Seleccione la categoría</div> -->

              </div>

            </div>
            <!-- BOTONERA -->
            <div class="col-12 text-right">
              <!-- <a type="button" class="btn btn-outline-danger mt-1 mx-1" style="width:170px;" data-bs-dismiss="modal" id="btnCancelarRegistro">Cancelar</a>
                            <a style="width:170px;" class="btn btn-outline-success mt-1 mx-1" id="btnGuardarProducto">Guardar Producto</a> -->

              <a class="btn btn-danger  fw-bold " id="btnCancelarRegistro" style="position: relative; width: 160px;">
                <span class="text-button">CANCELAR</span>
                <span class="btn fw-bold icon-btn-danger ">
                  <i class="fas fa-times fs-5 text-white m-0 p-0"></i>
                </span>
              </a>

              <a class="btn btn-success  fw-bold " id="btnGuardarProducto" style="position: relative; width: 160px;">
                <span class="text-button">GUARDAR</span>
                <span class="btn fw-bold icon-btn-success ">
                  <i class="fas fa-save fs-5 text-white m-0 p-0"></i>
                </span>
              </a>
            </div>


          </div>

        </form>

      </div>

    </div>
  </div>


</div>
<!-- /. End -->

<!-- =============================================================================================================================
VENTA MODAL PARA AUMENTAR O DISMINUIR EL STOCK DEL PRODUCTO
===============================================================================================================================-->
<!-- <div class="modal fade" id="mdlGestionarStock" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-header bg-gray py-2">
        <h6 class="modal-title" id="titulo_modal_stock">Adicionar Stock</h6>
        <button type="button" class="btn-close text-white fs-6" data-bs-dismiss="modal" aria-label="Close"
          id="btnCerrarModalStock">
        </button>
      </div>

      <div class="modal-body">

        <div class="row">

          <div class="col-12 mb-3">
            <label for="" class="form-label text-primary d-block">Codigo: <span id="stock_codigoProducto"
                class="text-secondary"></span></label>
            <label for="" class="form-label text-primary d-block">Producto: <span id="stock_Producto"
                class="text-secondary"></span></label>
            <label for="" class="form-label text-primary d-block">Stock: <span id="stock_Stock"
                class="text-secondary"></span></label>
          </div>

          <div class="col-12">
            <div class="form-group mb-2">
              <label class="" for="iptStockSumar">
                <i class="fas fa-plus-circle fs-6"></i> <span class="small" id="titulo_modal_label">Agregar al
                  Stock</span>
              </label>
              <input type="number" min="0" class="form-control form-control-sm" id="iptStockSumar"
                placeholder="Ingrese cantidad a agregar al Stock">
            </div>
          </div>

          <div class="col-12">
            <label for="" class="form-label text-danger">Nuevo Stock: <span id="stock_NuevoStock"
                class="text-secondary"></span></label><br>
          </div>

        </div>

      </div>

      <div class="modal-footer">
        <a class="btn btn-secondary btn-sm" data-bs-dismiss="modal" id="btnCancelarRegistroStock">Cancelar</a>
        <a class="btn btn-primary btn-sm" id="btnGuardarNuevorStock">Guardar</a>
      </div>

    </div>
  </div>
</div> -->
<!-- VENTANA MODAL PARA MODIFICAR STOCK -->
<div class="modal fade" id="mdlGestionarStock" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <div class="modal-header bg-gray py-2">
        <h6 class="modal-title" id="titulo_modal_stock"></h6>
        <span style="color: blue;"> | <?php echo date("d/m/Y"); ?>
          |</span>
        <button type="button" class="btn-close text-white fs-6" data-bs-dismiss="modal" aria-label="Close"
          id="btnCerrarModalStock">
        </button>
      </div>

      <div class="modal-body">

        <div class="box-body">

          <?php
          require('database.php');
          $query = "SELECT * FROM proveedores WHERE estado = 'activo' ORDER BY nombre_empresa";
          $result = mysqli_query($connection, $query);
          ?>

          <table class="table-responsive table-condensed tbl_datosStock">
            <tr>
              <td><label for="" class="form-label text-primary" style="display: block;">Id: <span id="stock_idProducto"
                    style="color: black;"></span></label></td>

              <td><label for="" class="form-label text-primary" style="display: block;">Precio Compra: <span
                    id="stock_precioProducto" style="color: black;"></span></label></td>
            </tr>

            <tr>
              <td><label for="" class="form-label text-primary" style="display: block;">Codigo: <span
                    id="stock_codigoProducto" style="color: black;"></span></label></td>

              <td><label for="" class="form-label text-primary" style="display: block;">Producto: <span
                    id="stock_Producto" style="color: black;"></span></label></td>
            </tr>

            <tr>
              <td><label for="" class="form-label text-primary" style="display: block;">Stock: <span id="stock_Stock"
                    style="color: black;"></span></label></td>
              <td><label for="" class="form-label text-danger">Nuevo Stock: <span id="stock_NuevoStock"
                    class="text-secondary"></span></label><br></td>
            </tr>
          </table>

          <table class="table-responsive table-condensed tbl_adicionaStock">
            <tr>
              <td><label class="" for="iptStockSumar">
                  <i class="fa fa-plus-circle fs-6"></i> <span class="small" id="titulo_modal_label"></span>
                </label>
                <input type="number" min="0" class="form-control form-control-sm" id="iptStockSumar" placeholder="">
              </td>

              <td><label class="" for="iptPrecioCompra">
                  <i class="fa fa-donate fs-6"></i> <span class="small">Precio Compra</span>
                </label>
                <input type="number" step="0.01" min="0" class="form-control form-control-sm" id="iptPrecioCompra"
                  placeholder="Precio Compra">
              </td>
              <td><label class="" for="iptPrecioVenta">
                  <i class="fa fa-donate fs-6"></i> <span class="small">Precio Venta</span>
                </label>
                <input type="number" step="0.01" min="0" class="form-control form-control-sm" id="iptPrecioVenta"
                  placeholder="Precio Venta">
              </td>
              <td><label class="" for="iptPrecioFeria">
                  <i class="fa fa-donate fs-6"></i> <span class="small">Precio Feria</span>
                </label>
                <input type="number" step="0.01" min="0" class="form-control form-control-sm" id="iptPrecioFeria"
                  placeholder="Precio Feria">
              </td>
            </tr>

            <tr>
              <td><label class="" for="iptDocumento">
                  <i class="fa fa-book fs-6"></i> <span class="small">N° Documento</span>
                </label>
                <input type="text" class="form-control form-control-sm" id="iptDocumento" placeholder="N° Doc. Compra.">
              </td>
              <td>
                <label class="" for="selProv">
                  <i class="fa fa-truck fs-6"></i> <span class="small">Agregar Proveedor</span>
                </label>
                <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="selProv"
                  name="selProv" style="width: 100%">
                  <option value="0"> -----Seleccione Proveedor-----</option>
                  <?php

                  while ($row = mysqli_fetch_assoc($result)) {
                    echo '<option value="' . $row['proveedor_id'] . '">' . $row['nombre_empresa'] . '</option>';
                  } ?>

                </select>
              </td>

              <td>
                <label class="" for="fechaRegistro">
                  <i class="fa fa-calendar fs-6"></i> <span class="small">Fecha de Registro</span>
                </label>
                <input type="date" class="form-control form-control-sm" id="fechaRegistro" placeholder="Fecha Registro">
              </td>
            </tr>

            <tr>
              <td colspan="3">
                <label class="" for="iptObserva">
                  <i class="fa fa-pencil fs-4"></i> <span class="small">Observaciones</span>
                </label>
                <input type="text" class="form-control form-control-sm"
                  onKeyUp="javascript:this.value=this.value.toUpperCase();" id="iptObserva"
                  placeholder="Registre Observaciones de la compra">
              </td>
            </tr>
          </table>

        </div>

      </div>

      <div class="modal-footer">
        <a class="btn btn-danger btn-sm" data-bs-dismiss="modal" id="btnCancelarRegistroStock"
          style="border-radius: 50rem;">Cancelar</a>
        <a class="btn btn-primary btn-sm" id="btnGuardarNuevorStock" style="border-radius: 50rem;">Guardar</a>
      </div>

    </div>
  </div>
</div>


<!-- /. End -->



<script>
var accion;
var operacion_stock = ''; // permitar definir si vamos a sumar o restar al stock (1: sumar, 2:restar)

// var Toast = Swal.mixin({
//   toast: true,
//   position: 'top',
//   showConfirmButton: false,
//   timer: 3000
// });

$(document).ready(function() {

  $('#iptFechaIngresoFE').datetimepicker({
    format: 'YYYY-MM-DD',
    locale: moment.lang('es', {
      months: 'Enero_Febrero_Marzo_Abril_Mayo_Junio_Julio_Agosto_Septiembre_Octubre_Noviembre_Diciembre'
        .split('_'),
      monthsShort: 'Enero._Feb._Mar_Abr._May_Jun_Jul._Ago_Sept._Oct._Nov._Dec.'.split('_'),
      weekdays: 'Domingo_Lunes_Martes_Miercoles_Jueves_Viernes_Sabado'.split('_'),
      weekdaysShort: 'Dom._Lun._Mar._Mier._Jue._Vier._Sab.'.split('_'),
      weekdaysMin: 'Do_Lu_Ma_Mi_Ju_Vi_Sa'.split('_')
    })
  });

  //Initialize Select2 Elements

  fnc_SelectCategorias();
  fnc_SelectSubCategorias();
  fnc_SelectProveedores();
  fnc_CargarDataTableInventario();
  $('.select2').select2()

  /*===================================================================*/
  // C R I T E R I O S   D E   B U S Q U E D A  (CODIGO, CATEGORIA Y PRODUCTO)
  /*===================================================================*/
  // BUSQUEDA POR CODIGO DE BARRAS
  $("#iptCodigoBarras").keyup(function() {
    $("#tbl_inventario").DataTable().column($(this).data('index')).search(this.value).draw();
  })

  // BUSQUEDA POR CATEGORIAS
  $("#id_categoria_busqueda").change(function() {

    if (this.value != 0) {
      $('#tbl_inventario').DataTable().column($(this).data('index')).search('^' + this.value + '$', true, false)
        .draw();
    } else {
      $('#tbl_inventario').DataTable().column($(this).data('index')).search("").draw();
    }

  })

  // BUSQUEDA POR DESCRIPCION DE PRODUCTO
  $("#iptProducto").keyup(function() {
    $("#tbl_inventario").DataTable().column($(this).data('index')).search(this.value).draw();
  })

  // BUSQUEDA POR RANGO DE PRECIOS
  $("#iptPrecioVentaDesde, #iptPrecioVentaHasta").keyup(function() {
    $("#tbl_inventario").DataTable().draw();
  })

  $.fn.dataTable.ext.search.push(

    function(settings, data, dataIndex) {

      var precioDesde = parseFloat($("#iptPrecioVentaDesde").val());
      var precioHasta = parseFloat($("#iptPrecioVentaHasta").val());

      var col_venta = parseFloat(data[9]);

      if ((isNaN(precioDesde) && isNaN(precioHasta)) ||
        (isNaN(precioDesde) && col_venta <= precioHasta) ||
        (precioDesde <= col_venta && isNaN(precioHasta)) ||
        (precioDesde <= col_venta && col_venta <= precioHasta)) {
        return true;
      }

      return false;
    }
  )

  // LIMPIAR CRITERIOS DE BUSQUEDA
  $("#btnLimpiarBusqueda").on('click', function() {

    $("#iptCodigoBarras").val('')
    CargarSelect(null, $("#id_categoria_busqueda"), "--Todas las categorías--", "ajax/categorias.ajax.php",
      'listar_categorias');
    $("#iptProducto").val('')
    $("#iptPrecioVentaDesde").val('')
    $("#iptPrecioVentaHasta").val('')

    $("#tbl_inventario").DataTable().search('').columns().search('').draw();
  })

  // LIMPIAR INPUT DE INGRESO DE STOCK AL CERRAR LA VENTANA MODAL
  $("#btnCancelarRegistroStock, #btnCerrarModalStock").on('click', function() {
    $("#iptStockSumar").val("")
    $("#iptPrecioCompra").val("")
    $("#iptPrecioVenta").val("")
    $("#iptPrecioFeria").val("")
    $("#iptDocumento").val("")
    $("#selProv").val("0")
    $("#fechaRegistro").val("")
    $("#iptObserva").val("")
    $("#stock_NuevoStock").html("")
  })

  /*===================================================================*/
  // R E G I S T R O   Y   A C T U A L I Z A C I O N   D E   P R O D U C T O S
  /*===================================================================*/
  $("#btnGuardarProducto").on('click', function() {
    fnc_registrarProducto();
  });

  $('#tbl_inventario tbody').on('click', '.btnEditarProducto', function() {
    fnc_ModalActualizarProducto($(this));
  })

  $("#btnCancelarRegistro, #btnCerrarModal").on('click', function() {
    fnc_limpiarFormulario();
  })

  $("#precio_compra, #porciento").keyup(function() {
    calcularPrecioVenta();
  });

  $("#precio_compra, #porciento").change(function() {
    calcularPrecioVenta();
  });

  /* ======================================================================================
  A U M E N T A R /  D I S M I N U I R   S T O C K   A L   P R O D U C T O
  =========================================================================================*/
  $('#tbl_inventario tbody').on('click', '.btnAumentarStock', function() {
    fnc_ModalAumentarStock($("#tbl_inventario").DataTable().row($(this).parents('tr')).data());
  })

  // $('#tbl_inventario tbody').on('click', '.btnDisminuirStock', function() {
  //   fnc_ModalDisminuirStock($("#tbl_inventario").DataTable().row($(this).parents('tr')).data());
  // })

  // CALCULAR NUEVO STOCK (AUMENTAR O DISMINUIR)
  $("#iptStockSumar").keyup(function() {
    fnc_CalcularNuevoStock();
  })

  $("#btnGuardarNuevorStock").on('click', function() {
    fnc_ActualizarStock();
  })

  /* ======================================================================================
  E L I M I N A R   P R O D U C T O
  =========================================================================================*/
  // DESACTIVAR UN PRODUCTO
  $('#tbl_inventario tbody').on('click', '.btnDesactivarProducto', function() {
    fnc_DesactivarProducto($('#tbl_inventario').DataTable().row($(this).parents('tr')).data());
  })

  // ACTIVAR UN PRODUCTO
  $('#tbl_inventario tbody').on('click', '.btnActivarProducto', function() {
    fnc_ActivarProducto($('#tbl_inventario').DataTable().row($(this).parents('tr')).data());
  })

  // $('#tbl_productos tbody').on('click', '.btnEliminarProducto', function() {
  //     fnc_eliminarProducto($("#tbl_productos").DataTable().row($(this).parents('tr')).data()[1]);
  // })


}); //find de ready

function calcularPrecioVenta() {

  let precioCompra = parseFloat(document.getElementById('precio_compra').value);
  let porcentaje = parseFloat(document.getElementById('porciento').value);

  // Validar valores
  if (isNaN(precioCompra) || isNaN(porcentaje)) {
    document.getElementById('precio_venta').value = "";
    return;
  }
  let ganancia = precioCompra * (porcentaje / 100);
  let precioVenta = precioCompra + ganancia;
  let pfinal = precioVenta.toFixed(2);

  document.getElementById('precio_venta').value = pfinal;
}


/*===================================================================*/
// C O N S U L T A   D E   P R O D U C T O S  (DATATABLE)
/*===================================================================*/
function fnc_CargarDataTableInventario() {

  if ($.fn.DataTable.isDataTable('#tbl_inventario')) {
    $('#tbl_inventario').DataTable().destroy();
    $('#tbl_inventario tbody').empty();
  }

  $("#tbl_inventario").DataTable({
    dom: 'Bfrtip',
    buttons: [{
        text: '<i class="fas fa-sync-alt"></i>',
        className: 'bg-secondary',
        action: function(e, dt, node, config) {
          fnc_CargarDataTableInventario();
        }
      },
      {
        text: 'Agregar Producto',
       // className: 'addNewRecord',
        className: 'btn btn-success',
        action: function(e, dt, node, config) {
          $("#codigo_producto").prop('readonly', false);
          $(".titulo-modal-productos").html("Registrar Producto")
          $("#mdlGestionarProducto").modal('show');

          accion = 'registrar_producto'; //registrar
          $(".needs-validation").removeClass("was-validated");
        }
      },
      {
        extend: 'excel',
        title: function() {
          var printTitle = 'LISTADO DE PRODUCTOS';
          return printTitle
        }
      },
      {
        extend: 'print',
        title: function() {
          var printTitle = 'LISTADO DE PRODUCTOS';
          return printTitle
        }
      }, 'pageLength'
    ],
    pageLength: [5, 10, 15, 30, 50, 100],
    pageLength: 10,
    ajax: {
      url: "ajax/productos_inventario.ajax.php",
      dataSrc: '',
      type: "POST",
      data: {
        'accion': 'listar_productos' //1: LISTAR PRODUCTOS
      },
    },
    responsive: {
      details: {
        type: 'column'
      }
    },
    columnDefs: [{
        targets: 0,
        orderable: false,
        className: 'control'
      },
      {
        targets: [2, 12, 13, 14, 15, 16, 17, 18],
        visible: false
      },
      {
        targets: 7,
        createdCell: function(td, cellData, rowData, row, col) {
          if (parseFloat(rowData['stock']) <= parseFloat(rowData['minimo_stock'])) {
            $(td).parent().css('background', '#F2D7D5')
            $(td).parent().css('color', 'black')
          }
        }
      },

      {
        targets: 1,
        orderable: false,
        createdCell: function(td, cellData, rowData, row, col) {
          $(td).html("<span class='btnEditarProducto text-primary px-1' style='cursor:pointer;'>" +
            "<i class='fas fa-pencil-alt fs-5'></i>" +
            "</span>")

          // Mostrar botón Aumentar solo si el producto está ACTIVO; quitar botón Disminuir
          var btnAumentar = "<span class='btnAumentarStock text-warning px-1' style='cursor:pointer;' title='Aumentar Stock'><i class='fas fa-plus-circle fs-5'></i></span>";

          var productoActivo = (rowData['estado'] != 'INACTIVO');

          if (productoActivo) {
            $(td).append(btnAumentar);
          }
          if (rowData['estado'] == 'INACTIVO') {

            $(td).append(
              "<span class='btnActivarProducto text-danger px-1' style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='Activar Producto'>" +
              "<i class='fas fa-toggle-off fs-5 text-danger'> </i> " +
              "</span>")
          } else {
            $(td).append(
              "<span class='btnDesactivarProducto text-danger px-1' style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='Desactivar Producto'>" +
              "<i class='fas fa-toggle-on fs-5 text-success'> </i> " +
              "</span>")
          }
        }
      }

    ],
    language: {
      //url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
      //url:"//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json"
      "processing": "Procesando...",
      "lengthMenu": "Mostrar _MENU_ registros",
      "zeroRecords": "No se encontraron resultados",
      "emptyTable": "Ningún dato disponible en esta tabla",
      "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
      "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
      "infoFiltered": "(filtrado de un total de _MAX_ registros)",
      "infoPostFix": "",
      "search": "Buscar:",
      "url": "",
      "thousands": ",",
      "loadingRecords": "Cargando...",
      "paginate": {
          "first": "Primero",
          "last": "Último",
          "next": "Siguiente",
          "previous": "Anterior"
      },
      "aria": {
          "sortAscending": ": Activar para ordenar la columna de manera ascendente",
          "sortDescending": ": Activar para ordenar la columna de manera descendente"
      }
    }
  });

}


/*===================================================================*/
// R E G I S T R O   Y   A C T U A L I Z A C I O N   D E   P R O D U C T O S
/*===================================================================*/
function fnc_ModalActualizarProducto(fila_actualizar) {
  accion = 'actualizar_producto'; //seteamos la accion para editar
  $(".titulo-modal-productos").html("Editar Producto")
  $("#mdlGestionarProducto").modal('show');

  var data = (fila_actualizar.parents('tr').hasClass('child')) ?
    $("#tbl_inventario").DataTable().row(fila_actualizar.parents().prev('tr')).data() :
    $("#tbl_inventario").DataTable().row(fila_actualizar.parents('tr')).data();

  console.log(data);

  $("#codigo_producto").prop('readonly', true);

  $("#codigo_producto").val(data[3]);
  $("#id_categoria").val(data[14]).change();
  $("#id_subcategoria").val(data[15]).change();
  $("#doc_producto").val(data[17]);
  $("#descripcion").val(data[4]);
  $("#precio_compra").val(data[8]);
  $("#precio_venta").val(data[9]);
  $("#precio_feria").val(data[12]);
  $("#precio_oferta").val(data[13]);
  $("#descuento_producto").val(data[10]);
  $("#stock_producto").val(data[7]);
  $("#id_unidad_medida").val(data[16]);
  $("#id_proveedor").val(data[18]).change();
  
  // var formData = new FormData();
  // formData.append('accion', accion)
  // response = SolicitudAjax('ajax/productos.ajax.php', 'POST', formData);

 
}

function fnc_registrarProducto() {


  var formData = new FormData();

  formData.append('detalle_producto', $("#frm-datos-producto").serialize());
  formData.append('accion', accion)

  //var imagen_valida = true;

  var forms = document.getElementsByClassName('needs-validation');

  var validation = Array.prototype.filter.call(forms, function(form) {

    if (form.checkValidity() === true) {


      Swal.fire({
        title: 'Está seguro de registrar el producto?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, deseo registrarlo!',
        cancelButtonText: 'Cancelar',
      }).then((result) => {

        if (result.isConfirmed) {

          response = SolicitudAjax("ajax/productos_inventario.ajax.php", "POST", formData);

          // mensajeToast(response["tipo_msj"], response["msj"])
          Swal.fire({
            position: 'top-center',
            icon: response["tipo_msj"],
            title: response["msj"],
            showConfirmButton: true,
            timer: 2000
          })

          if (response["tipo_msj"] == "success") {
            $("#tbl_inventario").DataTable().ajax.reload();
            fnc_limpiarFormulario();
          }

        }
      })
    } else {
      mensajeToast('warning', 'Complete los campos obligatorios.!')
    }

    form.classList.add('was-validated');

  });

}


/* ======================================================================================
E L I M I N A R   P R O D U C T O
=========================================================================================*/
function fnc_eliminarProducto(codigo_producto) {

  Swal.fire({
    title: 'Está seguro de eliminar el producto?',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Si, deseo eliminarlo!',
    cancelButtonText: 'Cancelar',
  }).then((result) => {

    if (result.isConfirmed) {
      var formData = new FormData();

      formData.append('accion', 'eliminar_producto')
      formData.append('codigo_producto', codigo_producto);

      response = SolicitudAjax("ajax/productos_inventario.ajax.php", "POST", formData);
      mensajeToast(response["tipo_msj"], response["msj"]);
      $("#tbl_inventario").DataTable().ajax.reload();
    }

  });


}

function fnc_DesactivarProducto(data) {

  var codigo_producto = data['codigo_producto'];
  Swal.fire({
    title: 'Está seguro de desactivar el Producto: ' + data['descripcion_producto'] + '?',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Aceptar!',
    cancelButtonText: 'Cancelar!',
  }).then((result) => {
    if (result.isConfirmed) {

      if (result.isConfirmed) {

        var datos = new FormData();

        datos.append('accion', 'desactivar_producto');
        datos.append('codigo_producto', codigo_producto);

        response = SolicitudAjax('ajax/productos_inventario.ajax.php', 'POST', datos)

        mensajeToast(response["tipo_msj"], response["msj"])
        $('#tbl_inventario').DataTable().ajax.reload(null, false);

      }

    }
  })
}

function fnc_ActivarProducto(data) {

  var codigo_producto = data['codigo_producto'];

  Swal.fire({
    title: 'Está seguro de activar el Producto: ' + data['descripcion_producto'] + '?',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Aceptar!',
    cancelButtonText: 'Cancelar!',
  }).then((result) => {
    if (result.isConfirmed) {

      if (result.isConfirmed) {

        var datos = new FormData();

        datos.append('accion', 'activar_producto');
        datos.append('codigo_producto', codigo_producto);

        response = SolicitudAjax('ajax/productos.ajax.php', 'POST', datos)

        mensajeToast(response["tipo_msj"], response["msj"])
        $('#tbl_inventario').DataTable().ajax.reload(null, false);

      }

    }
  })
}


/* ======================================================================================
A U M E N T A R /  D I S M I N U I R   S T O C K   A L   P R O D U C T O
=========================================================================================*/
function fnc_ModalAumentarStock(data) {

  operacion_stock = 'aumentar_stock'; //sumar stock
  accion = 3;

  $("#mdlGestionarStock").modal('show'); //MOSTRAR VENTANA MODAL

  $("#titulo_modal_stock").html('Aumentar Stock'); // CAMBIAR EL TITULO DE LA VENTANA MODAL
  $("#titulo_modal_label").html('Agregar al Stock'); // CAMBIAR EL TEXTO DEL LABEL DEL INPUT PARA INGRESO DE STOCK
  $("#iptStockSumar").attr("placeholder", "Ingrese cantidad a agregar al Stock"); //CAMBIAR EL PLACEHOLDER 

  // Los datos vienen como array: [0=control, 1=opciones, 2=id, 3=codigo, 4=descripcion, ..., 7=stock, 8=precio_compra, ...]
  var idProducto = data[2] || '';           // id del producto
  var codigo = data[3] || '';               // codigo_producto
  var producto = data[4] || '';             // descripcion/producto
  var stock = data[7] || 0;                 // stock actual
  var precioCompra = data[8] || 0;          // precio de compra

  $("#stock_idProducto").html(idProducto);
  $("#stock_codigoProducto").html(codigo);
  $("#stock_Producto").html(producto);
  $("#stock_precioProducto").html(precioCompra);
  $("#stock_Stock").html(stock);

  $("#iptPrecioCompra").val(precioCompra);  // Rellenar precio de compra en el input
  $("#stock_NuevoStock").html(parseFloat(stock));

}


function fnc_CalcularNuevoStock() {

  var stockActual = parseFloat($("#stock_Stock").html()) || 0;
  var cantidadIngresada = parseFloat($("#iptStockSumar").val()) || 0;
  
  if (cantidadIngresada <= 0) {
    mensajeToast('error', 'Ingrese un valor mayor a 0');
    $("#iptStockSumar").val("");
    $("#stock_NuevoStock").html(stockActual);
    return;
  }

  if (operacion_stock == 'aumentar_stock') {
    // Sumar al stock actual
    var nuevoStock = stockActual + cantidadIngresada;
    $("#stock_NuevoStock").html(nuevoStock.toFixed(2));
  } else if (operacion_stock == 'disminuir_stock') {
    // Restar del stock actual
    var nuevoStock = stockActual - cantidadIngresada;
    
    if (nuevoStock < 0) {
      mensajeToast('error', 'La cantidad a disminuir no puede ser mayor al stock actual');
      $("#iptStockSumar").val("");
      $("#stock_NuevoStock").html(stockActual);
      return;
    }
    
    $("#stock_NuevoStock").html(nuevoStock.toFixed(2));
  }
  // if (operacion_stock == 'aumentar_stock') {

  //   if ($("#iptStockSumar").val() != "" && $("#iptStockSumar").val() > 0) {

  //     var stockActual = parseFloat($("#stock_Stock").html());
  //     var cantidadAgregar = parseFloat($("#iptStockSumar").val());

  //     $("#stock_NuevoStock").html(stockActual + cantidadAgregar);

  //   } else {

  //     mensajeToast('error', 'Ingrese un valor mayor a 0');

  //     $("#iptStockSumar").val("")
  //     $("#stock_NuevoStock").html(parseFloat($("#stock_Stock").html()));

  //   }

  // } else {

  //   if ($("#iptStockSumar").val() != "" && $("#iptStockSumar").val() > 0) {

  //     var stockActual = parseFloat($("#stock_Stock").html());
  //     var cantidadAgregar = parseFloat($("#iptStockSumar").val());

  //     $("#stock_NuevoStock").html(stockActual - cantidadAgregar);

  //     if (parseInt($("#stock_NuevoStock").html()) < 0) {

  //       mensajeToast('error', 'La cantidad a disminuir no puede ser mayor al stock actual (Nuevo stock < 0)');

  //       $("#iptStockSumar").val("");
  //       $("#iptStockSumar").focus();
  //       $("#stock_NuevoStock").html(parseFloat($("#stock_Stock").html()));
  //     }
  //   } else {

  //     mensajeToast('error', 'Ingrese un valor mayor a 0');

  //     $("#iptStockSumar").val("")
  //     $("#stock_NuevoStock").html(parseFloat($("#stock_Stock").html()));
  //   }
  // }
}

// CALCULA LA UTILIDAD
function calcularUtilidad() {

  var iptPrecioCompraReg = $("#iptPrecioCompraReg").val();
  var iptPrecioVentaReg = $("#iptPrecioVentaReg").val();
  var Utilidad = iptPrecioVentaReg - iptPrecioCompraReg;

}

function fnc_ActualizarStock() {

  if ($("#iptStockSumar").val() == "" || $("#iptStockSumar").val() <= 0) {
    mensajeToast('error', 'Debe ingresar la cantidad a aumentar/disminuir');
    return false;
  }

  var nuevoStock = parseFloat($("#stock_NuevoStock").html()), codigo_producto = $("#stock_codigoProducto").html();
  let precioCompra = $("#iptPrecioCompra").val();
  let precioVenta = $("#iptPrecioVenta").val();
  let documentoCompra = $("#iptDocumento").val();
  let idProveedor = $("#selProv").val();
  let fechaRegistro = $("#fechaRegistro").val();
  let observaCompra = $("#iptObserva").val();
  let cantidadCompra = $("#iptStockSumar").val();

  console.log('Actualizando stock - Código:', codigo_producto, 'Nuevo Stock:', nuevoStock, 'Operación:', operacion_stock);

  var datos = new FormData();
  datos.append('accion', 'aumentar_disminuir_stock');
  datos.append('nuevoStock', nuevoStock);
  datos.append('codigo_producto', codigo_producto);
  datos.append('tipo_movimiento', 'aumentar_stock');
  datos.append('precioCompra', precioCompra);
  datos.append('precioVenta', precioVenta);
  datos.append('documentoCompra', documentoCompra);
  datos.append('idProveedor', idProveedor);
  datos.append('fechaRegistro', fechaRegistro);
  datos.append('observaCompra', observaCompra);
  datos.append('cantidadCompra', cantidadCompra);

  //Solicitud para actualizar el Stock del Producto
  response = SolicitudAjax("ajax/productos_inventario.ajax.php", "POST", datos);

  console.log('Respuesta del servidor rarm:', response);

  if (response["tipo_msj"] == "success") {

    $("#stock_NuevoStock").html("");
    $("#iptStockSumar").val("");

    $("#iptPrecioCompra").val("");
    $("#iptPrecioVenta").val("");
    $("#iptDocumento").val("");
    $("#selProv").val("");
    $("#fechaRegistro").val("");
    $("#iptObserva").val("");

    $("#mdlGestionarStock").modal('hide');
    $("#tbl_inventario").DataTable().ajax.reload();
    mensajeToast(response["tipo_msj"], response["msj"]);
  } else {
    mensajeToast(response["tipo_msj"], response["msj"]);
  }

  // if ($("#iptStockSumar").val() != "" && $("#iptStockSumar").val() > 0) {

  //   var nuevoStock = parseFloat($("#stock_NuevoStock").html()),
  //     codigo_producto = $("#stock_codigoProducto").html();

  //   var datos = new FormData();

  //   datos.append('accion', 'aumentar_disminuir_stock');
  //   datos.append('nuevoStock', nuevoStock);
  //   datos.append('codigo_producto', codigo_producto);
  //   datos.append('tipo_movimiento', operacion_stock);

  //   //Solicitud para verificar el Stock del Producto
  //   response = SolicitudAjax("ajax/productos_inventario.ajax.php", "POST", datos);

  //   if (response["tipo_msj"] == "success") {
  //     $("#stock_NuevoStock").html("");
  //     $("#iptStockSumar").val("");

  //     $("#mdlGestionarStock").modal('hide');

  //     $("#tbl_inventario").DataTable().ajax.reload();
  //     mensajeToast(response["tipo_msj"], response["msj"])
  //   }


  // } else {
  //   mensajeToast('error', 'Debe ingresar la cantidad a aumentar');
  //   return false;
  // }
}


/* ======================================================================================
G E N E R A L E S
=========================================================================================*/
// LIMPIAR INPUTS DEL FORMULARIO DE REGISTRO
function fnc_limpiarFormulario() {

  $("#mdlGestionarProducto").modal('hide');

  $("#codigo_producto").prop('readonly', false);

  $("#codigo_producto").val('');
  $("#id_categoria").val('');
  $("#id_subcategoria").val('');
  $("#doc_producto").val('');
  $("#descripcion").val('');
  $("#precio_compra").val("");
  $("#precio_venta").val("");
  $("#precio_feria").val("");
  $("#precio_oferta").val("");
  $("#porciento").val("");
  $("#descuento_producto").val("");
  $("#stock_producto").val("");
  $("#id_unidad_medida").val("");
  $("#id_proveedor").val("");

  fnc_SelectCategorias();
}

// PREVISUALIZAR LA IMAGEN
function previewFile(input) {

  var file = $("input[type=file]").get(0).files[0];

  if (file) {
    var reader = new FileReader();

    reader.onload = function() {
      $("#previewImg").attr("src", reader.result);
    }

    reader.readAsDataURL(file);
  }
}

// CARGAR SELECT DE CATEGORIAS
// function fnc_cargarSelectCategorias() {
//   CargarSelect(null, $("#id_categoria_busqueda"), "--Todas las categorías--", "ajax/categorias.ajax.php",
//     'obtener_categorias', null, 1);
//   CargarSelect(null, $("#id_categoria"), "--Seleccione una categoría--", "ajax/categorias.ajax.php",
//     'obtener_categorias');
//   $('.select2').select2()
// }

function fnc_SelectCategorias() {
  //SOLICITU DE PARA CARGAR CATEGORIA
  $.ajax({
    url: "ajax/categorias.ajax.php",
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(response) {

      let options = "<option selected value='0'>Seleccionar una categoria</option>";

      for (let index = 0; index < response.length; index++) {
        options = options + '<option value=' + response[index][0] + '>' + response[index][1] + '</option>';
      }

      $("#id_categoria").html(options);

    }
  });
}

function fnc_SelectProveedores() {
    //SOLICITU DE PARA CARGAR PROVEEDOR
  $.ajax({
    url: "ajax/proveedores.ajax.php",
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(response) {

      let options = "<option selected value='0'>Seleccionar Proveedor</option>";

      for (let index = 0; index < response.length; index++) {
        options = options + '<option value=' + response[index][0] + '>' + response[index][1] + '</option>';
      }

      $("#id_proveedor").html(options);

    }
  });
}

function fnc_SelectSubCategorias() {
//SOLICITUDE PARA CARGAR SUBCATEGORIAS
  $("#id_categoria").change(function() {

    let categoriaId = $(this).val();
    //alert(id_categoria);
    if (categoriaId) {
      // Habilitar y limpiar subcategorías
      $('#id_subcategoria').empty().append('<option value="">Cargando...</option>').prop('disabled', false);

      // Solicitud AJAX
      $.ajax({
        url: 'ajax/get_subcategories.php',
        type: 'POST',
        dataType: 'json',
        data: {
          categoria_id: categoriaId
        },
        success: function(data) {
          $('#id_subcategoria').empty();
          if (data.length > 0) {
            $('#id_subcategoria').append('<option value="">Seleccione una subcategoría</option>');
            $.each(data, function(key, value) {
              $('#id_subcategoria').append('<option value="' + value.subcategoria_id + '">' + value
                .nombre +
                '</option>');
            });
          } else {
            $('#id_subcategoria').append('<option value="">No hay subcategorías disponibles</option>');
          }
        },
        error: function() {
          $('#id_subcategoria').empty().append('<option value="">Error al cargar subcategorías</option>');
        }
      });
    } else {
      $('#id_subcategoria').empty().append('<option value="">Primero seleccione una categoría</option>').prop(
        'disabled', true);
    }

  })
}

</script>