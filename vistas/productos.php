<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Productos</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Inicio</a></li>
          <li class="breadcrumb-item active">Productos</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
  <div class="container-fluid">
    <!-- para citerios de busqueda -->
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">CRITERIOS DE BUSQUEDA</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool text-danger" id="btnLimpiarBusqueda">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-12 d-lg-flex">
                <div style="width: 20%" class="form-floating mx-1">
                  <input type="text" id="iptCodigoBarras" class="form-control" data-index="2">
                  <label for="iptCodigoBarras">Codigo Producto</label>
                </div>
                <div style="width: 20%" class="form-floating mx-1">
                  <input type="text" id="iptCategoria" class="form-control" data-index="4">
                  <label for="iptCategoria">Categoria</label>
                </div>
                <div style="width: 20%" class="form-floating mx-1">
                  <input type="text" id="iptProducto" class="form-control" data-index="3">
                  <label for="iptProducto">Producto</label>
                </div>
                <div style="width: 20%" class="form-floating mx-1">
                  <input type="text" id="iptPrecioVentaDesde" class="form-control">
                  <label for="iptPrecioVentaDesde">Precio Venta Desde</label>
                </div>
                <div style="width: 20%" class="form-floating mx-1">
                  <input type="text" id="iptPrecioVentaHasta" class="form-control">
                  <label for="iptPrecioVentaHasta">Precio Venta Hasta</label>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

    <!-- LISTADO DE PRODUCTOS -->
    <div class="row">
      <div class="col-12">

        <table id="tbl_productos" class="table table-striped table-dark table-hover w-100 shadow">
          <thead>
            <faraonbd>
              <th></th>
              <th>id</th>
              <th>Codigo</th>
              <th>Descripcion</th>
              <th>Categoria</th>
              <th>SubCateg.</th>
              <th>Stock</th>
              <th>P. Compra</th>
              <th>P. Venta</th>
              <th>Desct.%</th>
              <th>Proveedor</th>
              <th>Acciones</th>
              <th>P. Feria</th>
              <th>P. Oferta</th>
              <th>CategoriaId</th>
              <th>SubCategoriaId</th>
              <th>U.Medida</th>
              <th>DocuCompra</th>
              <th>ProvId</th>
            </faraonbd>
          </thead>
          <tbody>
            <tr>
              <td></td>
            </tr>
          </tbody>
        </table>

      </div>
    </div>
  </div><!-- /.container-fluid -->
</div>
<!-- /.content -->

<!-- VENTANA MODAL PARA REGISTRAR PRODUCTOS -->
<div class="modal fade" id="mdlGestionarProducto" role="dialog">

  <div class="modal-dialog modal-lg" role="document">
    <!-- contenido del modal -->
    <div class="modal-content">
      <!-- cabecera del modal -->
      <div class="modal-header bg-gray py-1 aling-items-center">
        <h5 class="modal-title titulo-modal-productos">Agregar Producto</h5>

        <button type="button" class="btn btn-danger text-white border-0 fs-5" data-bs-dismiss="modal"
          id="btnCerrarModal">
          <i class="far fa-times-circle"></i>
        </button>
      </div>

      <!-- cuerpo del modal -->
      <div class="modal-body">
        <form class="needs-validation" novalidate>

          <!-- Abrimos una fila -->
          <div class="row">

            <!-- CODIGO DE BARRAS -->
            <div class="col-12 col-lg-6">

              <div class="form-floating mb-2">

                <input type="text" id="codigo_producto" class="form-control" name="codigo_producto" placeholder="codigo"
                  required>
                <label for="codigo_producto"><i class="fas fa-barcode fs-6"></i><span class="small"> Código del
                    Producto</span><span class="text-danger">*</span></label>

                <div class="invalid-feedback">Ingrese el codigo del Producto</div>

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
                  name="id_subcategoria" required>
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

                <input type="text" class="form-control" id="descripcion" name="descripcion"
                  placeholder="Descripcion Producto" onKeyUp="javascript:this.value=this.value.toUpperCase();" required>

                <label for="descripcion"><i class="fas fa-file-signature fs-6"></i><span class="small">
                    Descripcion</span><span class="text-danger">*</span></label>

                <div class="invalid-feedback">Ingrese la descripción</div>

              </div>

            </div>
            
            <!-- PRECIO DE COMPRA -->
            <div class="col-12 col-lg-4">

              <div class="form-floating mb-2">

                <input type="number" step="any" min="0" id="precio_compra" class="form-control" name="precio_compra"
                  placeholder="Precio de Compra" required>
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
              <button type="button" class="btn btn-outline-danger" style="width:170px;border-radius: 50rem;"
                data-bs-dismiss="modal" id="btnCancelarRegistro">
                Cancelar
                <span class="btn fw-bold icon-btn-danger ">
                  <i class="fas fa-exclamation-circle fs-6 text-white "></i>
                </span></button>
              <!-- <button style="width:170px;" class="btn btn-outline-success mt-3 mx-2" id="btnGuardarProducto">Guardar
                Producto</button> -->

              <!-- <a class="btn btn-danger  fw-bold " id="btnCancelarRegistro" style="position: relative; width: 160px;">
                <span class="text-button">CANCELAR</span>
                <span class="btn fw-bold icon-btn-danger ">
                  <i class="fas fa-times fs-5 text-white m-0 p-0"></i>
                </span>
              </a>-->

              <a class="btn btn-success  fw-bold" id="btnGuardarProducto"
                style="position: relative; width: 170px; border-radius: 50rem;">
                <span class="text-button">GUARDAR</span>
                <span class="btn fw-bold icon-btn-success ">
                  <i class="fas fa-save fs-6 text-white "></i>
                </span>
              </a>

            </div>
          </div>

        </form>
      </div>

    </div>
  </div>
</div><!-- FIN VENTANA MODAL PRODUCTOS -->


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

<script>
let table;
let accion;
let validation = true;
let operacion_stock = 0; // 1sumar 2 restar

var Toast = Swal.mixin({
  toast: true,
  position: 'top',
  showConfirmButton: false,
  timer: 3000
});

$(document).ready(function() {

  fnc_CargarListaProductos();

  fnc_SelectCategorias();

  fnc_SelectProveedores();

  $('.select2').select2()

  fnc_SelectSubCategorias();
  
  fnc_CargarDataTableProductos();



  //EVENTOS PARA CRITERIOS DE BUSQUEDA 
  $("#iptCodigoBarras").keyup(function() {
    table.column($(this).data('index')).search(this.value).draw();
  })
  $("#iptCategoria").keyup(function() {
    table.column($(this).data('index')).search(this.value).draw();
  })
  $("#iptProducto").keyup(function() {
    table.column($(this).data('index')).search(this.value).draw();
  })

  $("#iptPrecioVentaDesde, #iptPrecioVentaHasta").keyup(function() {
    table.draw();
  })

  $.fn.dataTable.ext.search.push(
    function(settings, data, dataIndex) {
      var precioDesde = parseFloat($("#iptPrecioVentaDesde").val());
      var precioHasta = parseFloat($("#iptPrecioVentaHasta").val());

      //console.log(precioDesde)
      var col_venta = parseFloat(data[8]);

      if ((isNaN(precioDesde) && isNaN(precioHasta)) ||
        (isNaN(precioDesde) && col_venta <= precioHasta) ||
        (precioDesde <= col_venta && isNaN(precioHasta)) ||
        (precioDesde <= col_venta && col_venta <= precioHasta)) {
        return true;
      }
      return false;
    }
  )


  //EVENTO PARA LIMPIAR CRITERIOS DE BUSQUEDA
  $("#btnLimpiarBusqueda").on('click', function() {
    $("#iptCodigoBarras").val('');
    $("#iptCategoria").val('');
    $("#iptProducto").val('');
    $("#iptPrecioVentaDesde").val('');
    $("#iptPrecioVentaHasta").val('');

    table.search('').columns().search('').draw();
  })

  //EVENTO PARA CANCELAR EL REGISTRO O ACTUALIZACION DEL PRODUCTO
  $("#btnCancelarRegistro, #btnCerrarModal").on('click', function() {

    $("#codigo_producto").val("");
    $("#id_categoria").val(0);
    $("#id_subcategoria").val(0);
    $("#doc_producto").val("");
    $("#descripcion").val("");
    $("#precio_compra").val("");
    $("#precio_venta").val("");
    $("#precio_feria").val("");
    $("#precio_oferta").val("");
    $("#porciento").val("");
    $("#descuento_producto").val("");
    $("#stock_producto").val("");
    $("#id_unidad_medida").val("");
    $("#id_proveedor").val("");

  })

  $("#precio_compra, #porciento").keyup(function() {
    calcularPrecioVenta();
  });

  $("#precio_compra, #porciento").change(function() {
    calcularPrecioVenta();
  });

  //EDITAR PRODUCTO
  $('#tbl_productos tbody').on('click', '#btnEditarProducto', function() {

    accion = 4;

    $("#mdlGestionarProducto").modal("show");

    let data = table.row($(this).parents('tr')).data();

    console.log(data);


    $("#codigo_producto").val(data[2]);
    $("#descripcion").val(data[3]);
    /* $("#id_categoria").val(data[4]);
    $("#id_subcategoria").val(data[5]); */
    $("#stock_producto").val(data[6]);
    $("#precio_compra").val(data[7]);
    $("#precio_venta").val(data[8]);
    $("#descuento_producto").val(data[9]);
    $("#id_proveedor").val(data[10]);
    $("#precio_feria").val(data[12]);
    $("#precio_oferta").val(data[13]);
    $("#id_categoria").val(data[14]);
    $("#id_subcategoria").val(data[15]);
    $("#id_unidad_medida").val(data[16]);
    $("#doc_producto").val(data[17]);
    $("#id_proveedor").val(data[18]);

  });

  /* ======================================================================================
  A U M E N T A R /  D I S M I N U I R   S T O C K   A L   P R O D U C T O
  =========================================================================================*/
  $('#tbl_productos tbody').on('click', '.btnAumentarStock', function() {
    operacion_stock = 1; //sumar stock
    //accion = 3;

    $("#mdlGestionarStock").modal('show'); //MOSTRAR VENTANA MODAL

    $("#titulo_modal_stock").html('Aumentar Stock'); // CAMBIAR EL TITULO DE LA VENTANA MODAL
    $("#titulo_modal_label").html(
      'Agregar al Stock'); // CAMBIAR EL TEXTO DEL LABEL DEL INPUT PARA INGRESO DE STOCK
    $("#iptStockSumar").attr("placeholder", "Ingrese cantidad"); //CAMBIAR EL PLACEHOLDER 

    var data = table.row($(this).parents('tr'))
      .data(); //OBTENER EL ARRAY CON LOS DATOS DE CADA COLUMNA DEL DATATABLE

    $("#stock_idProducto").html(data[1]) //ID DEL PRODUCTO DEL DATATABLE
    $("#stock_codigoProducto").html(data[2]) //CODIGO DEL PRODUCTO DEL DATATABLE
    $("#stock_Producto").html(data[3]) //NOMBRE DEL PRODUCTO DEL DATATABLE
    $("#stock_precioProducto").html(data[7]) //PRECIO DEL PRODUCTO DEL DATATABLE
    $("#stock_Stock").html(data[6]) //STOCK ACTUAL DEL PRODUCTO DEL DATATABLE

    $("#stock_NuevoStock").html(parseFloat($("#stock_Stock").html()));
  })

  // $('#tbl_productos tbody').on('click', '.btnDisminuirStock', function() {

  //   operacion_stock = 2; //restar stock
  //   //accion = 3;
  //   $("#mdlGestionarStock").modal('show'); //MOSTRAR VENTANA MODAL

  //   $("#titulo_modal_stock").html('Disminuir Stock'); // CAMBIAR EL TITULO DE LA VENTANA MODAL
  //   $("#titulo_modal_label").html(
  //     'Disminuir al Stock'); // CAMBIAR EL TEXTO DEL LABEL DEL INPUT PARA INGRESO DE STOCK
  //   $("#iptStockSumar").attr("placeholder", "Ingrese cantidad a disminuir al Stock"); //CAMBIAR EL PLACEHOLDER 

  //   var data = table.row($(this).parents('tr'))
  //     .data(); //OBTENER EL ARRAY CON LOS DATOS DE CADA COLUMNA DEL DATATABLE
  //   $("#stock_codigoProducto").html(data[2]) //CODIGO DEL PRODUCTO DEL DATATABLE
  //   $("#stock_Producto").html(data[3]) //NOMBRE DEL PRODUCTO DEL DATATABLE
  //   $("#stock_precioProducto").html(data[7]) //PRECIO DEL PRODUCTO DEL DATATABLE
  //   $("#stock_Stock").html(data[6]) //STOCK ACTUAL DEL PRODUCTO DEL DATATABLE

  //   $("#stock_NuevoStock").html(parseFloat($("#stock_Stock").html()));
  // })

  /* ======================================================================================
    EVENTO AL DIGITAR LA CANTIDAD A AUMENTAR O DISMINUIR DEL STOCK
    =========================================================================================*/

  $("#iptStockSumar").keyup(function() {

    if (operacion_stock == 1) {

      if ($("#iptStockSumar").val() != "" && $("#iptStockSumar").val() > 0) {

        var stockActual = parseFloat($("#stock_Stock").html());
        var cantidadAgregar = parseFloat($("#iptStockSumar").val());

        $("#stock_NuevoStock").html(stockActual + cantidadAgregar);

      } else {

        //mensajeToast('error', 'Ingrese un valor mayor a 0');
        Toast.fire({
          icon: 'warning',
          title: 'Ingrese un valor mayor a 0'
        });

        $("#iptStockSumar").val("")
        $("#stock_NuevoStock").html(parseFloat($("#stock_Stock").html()));

      }

    } else {

      if ($("#iptStockSumar").val() != "" && $("#iptStockSumar").val() > 0) {

        var stockActual = parseFloat($("#stock_Stock").html());
        var cantidadAgregar = parseFloat($("#iptStockSumar").val());

        $("#stock_NuevoStock").html(stockActual - cantidadAgregar);

        if (parseInt($("#stock_NuevoStock").html()) < 0) {

          //mensajeToast('error', 'La cantidad a disminuir no puede ser mayor al stock actual (Nuevo stock < 0)');
          Toast.fire({
            icon: 'warning',
            title: 'La cantidad a disminuir no puede ser mayor al stock actual (Nuevo stock < 0)'
          });

          $("#iptStockSumar").val("");
          $("#iptStockSumar").focus();
          $("#stock_NuevoStock").html(parseFloat($("#stock_Stock").html()));
        }
      } else {

        //mensajeToast('error', 'Ingrese un valor mayor a 0');
        Toast.fire({
          icon: 'warning',
          title: 'Ingrese un valor mayor a 0'
        });

        $("#iptStockSumar").val("")
        $("#stock_NuevoStock").html(parseFloat($("#stock_Stock").html()));
      }
    }
  })


  $("#btnGuardarNuevorStock").on('click', function() {

    if ($("#iptStockSumar").val() != "" && $("#iptStockSumar").val() > 0) {

      var nuevoStock = parseFloat($("#stock_NuevoStock").html()),
        codigo_producto = $("#stock_codigoProducto").html();

      let precioCompra = $("#iptPrecioCompra").val();
      let precioVenta = $("#iptPrecioVenta").val();
      let precioFeria = $("#iptPrecioFeria").val();
      let documentoCompra = $("#iptDocumento").val();
      let idProveedor = $("#selProv").val();
      let fechaRegistro = $("#fechaRegistro").val();
      let observaCompra = $("#iptObserva").val();
      let cantidadCompra = $("#iptStockSumar").val();

      var datos = new FormData();

      datos.append('accion', 3);
      datos.append('nuevoStock', nuevoStock);
      datos.append('codigo_producto', codigo_producto);
      datos.append('precioCompra', precioCompra);
      datos.append('precioVenta', precioVenta);
      datos.append('precioFeria', precioFeria);
      datos.append('documentoCompra', documentoCompra);
      datos.append('idProveedor', idProveedor);
      datos.append('fechaRegistro', fechaRegistro);
      datos.append('observaCompra', observaCompra);
      datos.append('cantidadCompra', cantidadCompra);

      $.ajax({
        url: "ajax/productos.ajax.php",
        method: "POST",
        data: datos,
        processData: false,
        contentType: false,
        dataType: 'json',
        success: function(respuesta) {
          //console.log(respuesta)
          $("#stock_NuevoStock").html("");
          $("#iptStockSumar").val("");
          //$("#selProv").val(null).trigger('change');
          $("#mdlGestionarStock").modal('hide');
          table.ajax.reload();

          //swal("Correcto!", "Se actualiRzó el stock correctamente.!", "success");
          Toast.fire({
            position: 'center',
            icon: 'success',
            title: respuesta,
            timer: 1500
          });

        }

      });

    } else {

      Toast.fire({
        icon: 'warning',
        title: 'Debe ingresar la cantidad a aumentar'
      });

    }
  })

}) //final READY

//CARGADO DE FUNCIONES

function fnc_CargarListaProductos(){
    $.ajax({
    type: "POST",
    url: "ajax/productos.ajax.php",
    data: {
      'accion': 1
    }, //lista productos
    dataType: "json",
    success: function(response) {
      console.log(response);
    }
  });
}

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

function fnc_CargarDataTableProductos() {
    //CARGA DE LISTADO DE PRODUCTOS

  table = $('#tbl_productos').DataTable({
    dom: 'Bfrtip',
    buttons: [

      {
        text: '<i class="fas fa-sync-alt"></i>',
        className: 'bg-secondary',
        action: function(e, dt, node, config) {
          fnc_CargarDataTableProductos();
        }
      },
      {
        text: 'Agregar Producto',
        className: 'btn btn-success',
        action: function(e, dt, node, config) {
          $("#mdlGestionarProducto").modal('show');
          accion = 2; //registrar producto
        }
      },
      'excel', 'pdf', 'print', 'pageLength'
    ],
    ajax: {
      url: "ajax/productos.ajax.php",
      dataSrc: '',
      type: "POST",
      data: {
        'accion': 1
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
        targets: 1,
        visible: false
      },
      {
        targets: 12,
        visible: false
      },
      {
        targets: 13,
        visible: false
      },
      {
        targets: 14,
        visible: false
      },
      {
        targets: 15,
        visible: false
      },
      {
        targets: 16,
        visible: false
      },
      {
        targets: 17,
        visible: false
      },
      {
        targets: 18,
        visible: false
      },
      {
        targets: 11,
        orderable: false,
        render: function(data, type, full, meta) {
          return "<center>" +
            "<span id='btnEditarProducto' class='text-primary px-1' style='cursor:pointer;'>" +
            "<i class='fas fa-pencil-alt fs-5'></i>" +
            "</span>" +
            "<span class='btnAumentarStock text-success px-1' style='cursor:pointer;'>" +
            "<i class='fas fa-plus-circle fs-5'></i>" +
            "</span>" +
            //"<span class='btnDisminuirStock text-warning px-1' style='cursor:pointer;'>" +
            //"<i class='fas fa-minus-circle fs-5'></i>" +
            //"</span>" +
            "<span class='btnEliminarProducto text-danger px-1' style='cursor:pointer;'>" +
            "<i class='fas fa-trash fs-5'></i>" +
            "</span>" +
            "</center>"
        }
      }
    ],
    language: {
      "sProcessing": "Procesando...",
      "sLengthMenu": "Mostrar _MENU_ registros",
      "sZeroRecords": "No se encontraron resultados",
      "sEmptyTable": "Ningún dato disponible en esta tabla",
      "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
      "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
      "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
      "sInfoPostFix": "",
      "sSearch": "Buscar:",
      "sUrl": "",
      "sInfoThousands": ",",
      "sLoadingRecords": "Cargando...",
      "oPaginate": {
        "sFirst": "Primero",
        "sLast": "Último",
        "sNext": "Siguiente",
        "sPrevious": "Anterior"
      },
      "oAria": {
        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
      }
    }
  });
}

//function fnc_CargarDataTableProductos() {

  //alert('haciendo la prueba')

  /* if ($.fn.DataTable.isDataTable('#tbl_productos')) {
    $('#tbl_productos').DataTable().destroy();
    $('#tbl_productos tbody').empty();
  }

  table.ajax.reload(); */

  //$('#tbl_productos').DataTable().ajax.reload();
//}


//CALCULAR EL PRECIO DE VENTA
function calcularPrecioVenta() {

  let precioCompra = parseFloat(document.getElementById('precio_compra').value);
  let porcentaje = parseFloat(document.getElementById('porciento').value);

  // Validar valores
  if (isNaN(precioCompra) || isNaN(porcentaje)) {
    document.getElementById('precio_venta').value = "Ingrese valores válidos";
    return;
  }
  let ganancia = precioCompra * (porcentaje / 100);
  let precioVenta = precioCompra + ganancia;
  let pfinal = precioVenta.toFixed(2);

  $("#precio_venta").val(pfinal);
}

//REGISTRO DE PRODUCTOS 
document.getElementById("btnGuardarProducto").addEventListener("click", function() {

  var forms = document.getElementsByClassName('needs-validation')

  var validation = Array.prototype.filter.call(forms, function(form) {

    if (form.checkValidity() === true) {

      console.log("listo..........");

      Swal.fire({

        title: 'Está seguro de registrar  el Producto ?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, deceo registrar!',
        cancelButtonText: 'Cancelar!',
      }).then((result) => {

        if (result.isConfirmed) {

          var datos = new FormData();

          datos.append('accion', accion);
          datos.append('codigo_producto', $('#codigo_producto').val());
          datos.append('id_categoria', $("#id_categoria").val());
          datos.append('id_subcategoria', $("#id_subcategoria").val());
          datos.append('doc_producto', $("#doc_producto").val());
          datos.append('descripcion', $("#descripcion").val());
          datos.append('precio_compra', $("#precio_compra").val());
          datos.append('precio_venta', $("#precio_venta").val());
          datos.append('precio_feria', $("#precio_feria").val());
          datos.append('precio_oferta', $("#precio_oferta").val());
          datos.append('descuento_producto', $("#descuento_producto").val());
          datos.append('stock_producto', $("#stock_producto").val());
          datos.append('id_unidad_medida', $("#id_unidad_medida").val());
          datos.append('id_proveedor', $("#id_proveedor").val());

          if (accion == 2) {
            var titulo_msj = 'El producto se registro correctamente'
          }

          if (accion == 4) {
            var titulo_msj = 'El producto se actualizo correctamente'
          }

          $.ajax({
            url: "ajax/productos.ajax.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(response) {

              //console.log(response);

              if (response == "ok") {

                Toast.fire({
                  icon: "success",
                  title: titulo_msj
                });

                table.ajax.reload();

                $("#mdlGestionarProducto").modal('hide');

                $("#codigo_producto").val("");
                $("#id_categoria").val(0);
                $("#id_subcategoria").val(0);
                $("#doc_producto").val("");
                $("#descripcion").val("");
                $("#precio_compra").val("");
                $("#precio_venta").val("");
                $("#precio_feria").val("");
                $("#precio_oferta").val("");
                $("#porciento").val("");
                $("#descuento_producto").val("");
                $("#stock_producto").val("");
                $("#id_unidad_medida").val("");
                $("#id_proveedor").val("");

                $(".needs-validation").removeClass("was-validated");

              } else {

                Toast.fire({
                  icon: "error",
                  title: "El producto NO se registro correctamente"
                });

              }
            }
          });
        }
      })

    } else {
      console.log(" No listo");
    }

    form.classList.add('was-validated');

  });
});

document.getElementById("btnCancelarRegistro").addEventListener("click", function() {
  $(".needs-validation").removeClass("was-validated");
})
</script>