<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

// Verificar si el usuario está autenticado
if (isset($_SESSION['usuario'])) {
  $nombre_usuario = $_SESSION["usuario"]->nombre_usuario;
  $usuarioID = $_SESSION["usuario"]->id_usuario;
} else {
  //header("Location: login.php");
  exit();
}
?>
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Ingresos | Ventas</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Inicio</a></li>
          <li class="breadcrumb-item active">Ingresos-Ventas</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<div class="content">

  <div class="row">

    <div class="col-lg-12">

      <div class="row">

        <!-- --------------------------------------------------------- -->
        <!-- COMPROBANTE DE VENTAS -->
        <!-- --------------------------------------------------------- -->
        <form id="frm-datos-registro-compras" class="needs-validation-registro-compras" novalidate>

          <input type="hidden" name="id_compra" id="id_compra" value="0">

          <div class="row mb-2">

            <!-- CLIENTES -->
            <div class="col-12 col-md-5 col-lg-3">

              <div class="form-floating mb-2">

                <select class="form-select select2" id="selCliente" aria-label="Floating label select example" name="selCliente" required>
                </select>
                <label for="selCliente">Clientes</label>
                <div class="invalid-feedback">Seleccione al Cliente</div>

              </div>

            </div>

            <!-- SELECCIONAR TIPO DE DOCUMENTO -->
            <div class="col-12 col-md-7 col-lg-3">
              <div class="form-floating mb-2">

                <select class="form-select select2" aria-label="Floating label select example" id="selDocumentoVenta" name="selDocumentoVenta">
                  <option value="0" selected="true">Seleccione Documento</option>
                  <option value="1">Nota de Pago</option>
                  <option value="2">Factura</option>
                </select>
                <label for="selDocumentoVenta">Tipo de Documento</label>
                <div class="invalid-feedback">Seleccione Tipo de Documento</div>

              </div>
            </div>

            <!-- SELECCIONAR TIPO DE PAGO -->
            <div class="col-12 col-md-7 col-lg-3">
              <div class="form-floating mb-2">
                <select class="form-select select2" aria-label="Floating label select example" id="selTipoPago" name="selTipoPago">
                  <option value="0" selected="true">Seleccione Tipo Pago</option>
                  <option value="1">Contado</option>
                  <option value="2">Credito</option>
                  <option value="3">Transferencia</option>
                </select>
                <label for="selTipoPago">Tipo de Pago</label>
                <div class="invalid-feedback">Seleccione Tipo de Pago</div>

              </div>
            </div>

            <!-- SELECCIONAR VENDEDOR -->
            <div class="col-12 col-md-7 col-lg-3">
              <div class="form-floating mb-2">
                <select class="form-select select2" aria-label="Floating label select example" id="selVendedor"
                  name="selVendedor" required>
                  <option value="0">---Vendedores---</option>
                </select>

                <label for="selVendedor">Seleccionar Vendedor</label>
                <div class="invalid-feedback">Seleccione al Vendedor</div>

              </div>

            </div>


            <!-- FECHA DE ENTREGA -->
            <div class="col-12 col-md-4 col-lg-2">
              <div class="input-group mb-3">

                <div class="form-floating flex-grow-1">
                  <input type="text" class="form-control form-control-sm etimepicker-input" id="iptFechaEntrega" name="iptFechaEntrega">
                  <label for="iptFechaEntrega"> Fecha Entrega</label>
                  <input type="hidden" name="codUsuario" id="codUsuario" value="<?php echo $usuarioID; ?>">
                </div>
                <span class="input-group-text my-bg">
                  <i class=" fas fa-calendar-alt text-white fs-5" data-toggle="datetimepicker"
                    data-target="#iptFechaEntrega"></i>
                </span>
              </div>
            </div>


            <!-- SERIE -->
            <div class="col-12 col-md-4 col-lg-1">
              <div class="form-floating mb-2">
                <input type="text" name="iptNroSerie" id="iptNroSerie" class="form-control" maxlength="4"
                  value="<?php echo date("Y"); ?>" disabled>

                <label for="iptNroSerie"> Gestion</label>

              </div>
            </div>

            <div class="col-12 col-md-4 col-lg-2">
              <div class="form-floating mb-2">
                <input type="text" min="0" name="iptNroVenta" id="iptNroVenta" class="form-control form-control-sm"
                  placeholder="Nro Venta" readonly>

                <label for="iptNroVenta">Nro Venta</label>

              </div>

            </div>

            <!-- INPUT OBSERVACION -->
            <div class="col-12 col-md-4 col-lg-7">
              <div class="form-floating mb-2">
                <input type="text" class="form-control form-control-sm" id="iptObservacion" name="iptObservacion"
                  placeholder="Ingrese Observacion Venta" onKeyUp="javascript:this.value=this.value.toUpperCase();">
                <label for="iptObservacion">Observaciones </label>
              </div>
            </div>


            <!-- BUSCAR PRODUCTO -->
            <div class="col-12 col-md-6 col-lg-3 my-lg-3">
              <a class="btn btn-info w-100 fw-bold btnBuscarProducto rounded-pill">
                <i class="fas fa-search me-2"></i>BUSCAR PRODUCTOS
              </a>
            </div>

            <!-- BOTONES: CANCELAR - GUARDAR -->
            <div class="col-lg-9 text-right mt-3 ">
              <a class="btn btn-danger w-25 fw-bold btn-sm rounded-pill" id="btnCancelarCompra">
                <i class="fas fa-times-circle me-2"></i>CANCELAR
              </a>

              <a class="btn btn-success w-25 fw-bold btn-sm rounded-pill" id="btnGuardarCompra">
                <i class="fas fa-save me-2"></i>GUARDAR
              </a>
            </div>

          </div>

        </form>

        <!-- --------------------------------------------------------- -->
        <!--LISTADO DE PRODUCTOS -->
        <!-- --------------------------------------------------------- -->
        <div class="row mb-3">

          <!--LISTADO DE PRODUCTOS COMPRADOS -->
          <div class="col-md-12">
            <table id="tbl_ListadoProductos" class="table table-striped w-100 shadow border border-secondary">
              <thead class="bg-main text-white">
                <tr style="font-size: 14px;">
                  <th></th>
                  <th>Cod Producto</th>
                  <th>Producto</th>
                  <th>Cantidad</th>
                  <th>Cantidad Temp</th>
                  <th>Precio Venta</th>
                  <th>Precio Vta. Temp</th>
                  <th>Descuento</th>
                  <th>Descuento Temp</th>
                  <th>SubTotal</th>
                  <th>Total</th>
                </tr>
              </thead>
            </table>
          </div>

        </div>

        <!-- --------------------------------------------------------- -->
        <!--RESUMEN DE LA COMPRA -->
        <!-- --------------------------------------------------------- -->
        <div class="row">

          <div class="col-12 offset-md-6 col-md-6 offset-lg-8 col-lg-4">

            <div class="card card-gray shadow float-right">

              <div class="card-header">
                <h3 class="card-title fs-6">RESUMEN</h3>
              </div> <!-- ./ end card-header -->

              <div class="card-body py-2">

                <!-- INPUT DE EFECTIVO ENTREGADO -->
                <div class="form-group">
                  <label for="iptEfectivoRecibido">Efectivo recibido</label>
                  <input type="number" min="0" name="iptEfectivo" id="iptEfectivoRecibido"
                    class="form-control form-control-sm" placeholder="Cantidad de efectivo recibida">
                </div>

                <!-- INPUT CHECK DE EFECTIVO EXACTO -->
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="chkEfectivoExacto">
                  <label class="form-check-label" for="chkEfectivoExacto">
                    Efectivo Exacto
                  </label>
                </div>

                <!-- MOSTRAR MONTO EFECTIVO ENTREGADO Y EL VUELTO -->
                <div class="row mt-2">

                  <div class="col-12">
                    <h6 class="text-start fw-bold">Monto Efectivo: Bs. <span id="EfectivoEntregado">0.00</span></h6>
                  </div>

                  <div class="col-12">
                    <h6 class="text-start text-danger fw-bold">Vuelto: Bs. <span id="Vuelto">0.00</span>
                    </h6>
                  </div>

                </div>
                <hr>
                <br>
                <div class="row fw-bold">


                  <!-- SUBTOTAL -->
                  <div class="col-12">
                    <span>SUBTOTAL</span>
                    <span class="float-right" id="resumen_subtotal">0.00</span>
                  </div>


                  <!-- DESCUENTO -->
                  <div class="col-12 text-danger">
                    <span>DESCUENTO</span>
                    <span class="float-right" id="resumen_total_descuento">0.00</span>
                    <hr class="m-1" />
                  </div>

                  <!-- TOTAL -->
                  <div class="col-12 fs-5">
                    <span>TOTAL</span>
                    <span class="float-right" id="resumen_total_venta">0.00</span>
                  </div>

                </div>

              </div>

            </div>

          </div>

        </div>

      </div>
    </div>

  </div>

</div>
<!-- /.content -->


<!-- =============================================================================================================================
MODAL LISTADO DE PRODUCTOS
===============================================================================================================================-->
<div class="modal fade" id="mdlListadoProductos" role="dialog" tabindex="-1">

  <div class="modal-dialog modal-lg" role="document">

    <!-- contenido del modal -->
    <div class="modal-content">

      <!-- cabecera del modal -->
      <div class="modal-header bg-gray py-1">

        <h5 class="modal-title">Listado de Productos | Seleccionar</h5>

        <button type="button" class="btn btn-danger text-white border-0 fs-5" data-bs-dismiss="modal">
          <i class="far fa-times-circle"></i>
        </button>

      </div>

      <!-- cuerpo del modal -->
      <div class="modal-body">

        <div class="row">

          <div class="col-12">
            <!--LISTADO DE PRODUCTOS -->
            <table id="tbl_productos" class="table table-striped table-dark table-hover w-100 shadow fs-6">
              <thead class="bg-main text-white">
                <tr style="font-size: 18px; font-weight: 600;">
                  <th class="text-center"></th> <!-- 0 -->
                  <th class="text-center"><i class="fas fa-check me-1"></i>Seleccionar</th> <!-- 1 -->
                  <th>id</th> <!-- 2 -->
                  <th>Codigo</th> <!-- *3 -->
                  <th>Descripcion</th><!-- *4 -->
                  <th>Categoria</th><!-- *5 -->
                  <th>SubCateg.</th><!-- *6 -->
                  <th>Stock</thstyle=><!-- *7 -->
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
              <tbody class="text-sm">
              </tbody>
            </table>
          </div>

        </div>

      </div>

    </div>

  </div>

</div>
<!-- /. End -->

<script>
  var itemProducto = 1;
  $(document).ready(function() {

    fnc_CargarDataTableListadoProductos(); //listado de productos elegidos
    fnc_CargarDataTableProductos(); //productos por elegir

    // $('#selCliente').select2({ width : 'resolve'}); // es necesario anular el valor predeterminado modificado 

    $('#iptFechaEntrega').datetimepicker({
      format: 'YYYY-MM-DD',
      locale: moment.lang('es', {
        months: 'Enero_Febrero_Marzo_Abril_Mayo_Junio_Julio_Agosto_Septiembre_Octubre_Noviembre_Diciembre'
          .split('_'),
        monthsShort: 'Enero._Feb._Mar_Abr._May_Jun_Jul._Ago_Sept._Oct._Nov._Dec.'.split(
          '_'),
        weekdays: 'Domingo_Lunes_Martes_Miercoles_Jueves_Viernes_Sabado'.split('_'),
        weekdaysShort: 'Dom._Lun._Mar._Mier._Jue._Vier._Sab.'.split('_'),
        weekdaysMin: 'Do_Lu_Ma_Mi_Ju_Vi_Sa'.split('_')
      }),
      defaultDate: moment(),
    });

    CargarNroBoleta();

    //MOSTRANDO DATOS DE CLIENTES
    $.post("ajax/busca_cliente.php", function(data) {
      $("#selCliente").html(data);
    });
    //MOSTRANDO DATOS DEL VENDEDOR
    $.post("ajax/busca_vendedor.php", function(data) {
      $("#selVendedor").html(data);
    });

    /* ======================================================================================
    EVENTO PARA MODIFICAR LA CANTIDAD DEL PRODUCTOS A COMPRAR
    ======================================================================================*/
    $('#tbl_ListadoProductos tbody').on('change', '.iptCantidad', function() {

      cantidad_actual = $(this)[0]['value'];
      cod_producto_actual = $(this)[0]['attributes']['codigoproducto']['value'];


      $('#tbl_ListadoProductos').DataTable().rows().eq(0).each(function(index) {

        var row = $('#tbl_ListadoProductos').DataTable().row(index);

        var data = row.data();

        if (data['codigo_producto'] == cod_producto_actual) {

          // cantidad_actual
          $('#tbl_ListadoProductos').DataTable().cell(index, 4).data(cantidad_actual)

        }
      })

      fnc_ActualizarDatos();

    })

    /* ======================================================================================
    EVENTO PARA MODIFICAR EL COSTO UNITARIO DEL PRODUCTO A COMPRAR
    ======================================================================================*/
    $('#tbl_ListadoProductos tbody').on('change', '.iptCostoUnitario', function() {

      $costo_actual = $(this)[0]['value'];
      $cod_producto_actual = $(this)[0]['attributes']['codigoproducto']['value'];


      $('#tbl_ListadoProductos').DataTable().rows().eq(0).each(function(index) {

        var row = $('#tbl_ListadoProductos').DataTable().row(index);

        var data = row.data();

        if (data['codigo_producto'] == $cod_producto_actual) {

          $('#tbl_ListadoProductos').DataTable().cell(index, 6).data($costo_actual)

          // // obtener cantidad
          // $cantidad = $('#tbl_ListadoProductos').DataTable().cell(index, 4).data()

        }
      })

      fnc_ActualizarDatos();

    })

    /* ======================================================================================
    EVENTO PARA MODIFICAR EL DESCUENTO DEL PRODUCTOS A COMPRAR
    ======================================================================================*/
    $('#tbl_ListadoProductos tbody').on('change', '.iptDescuento', function() {

      $descuento_actual = $(this)[0]['value'];
      $cod_producto_actual = $(this)[0]['attributes']['codigoproducto']['value'];

      $('#tbl_ListadoProductos').DataTable().rows().eq(0).each(function(index) {

        var row = $('#tbl_ListadoProductos').DataTable().row(index);

        var data = row.data();

        if (data['codigo_producto'] == $cod_producto_actual) {

          $('#tbl_ListadoProductos').DataTable().cell(index, 8).data($descuento_actual)

          // // obtener cantidad
          // $cantidad = $('#tbl_ListadoProductos').DataTable().cell(index, 4).data()

          // //obtener costo unitario
          // $costo_unitario = $('#tbl_ListadoProductos').DataTable().cell(index, 6).data()

        }
      })

      fnc_ActualizarDatos();

    })

    $('#tbl_productos tbody').on('click', '.btnSeleccionarProducto', function() {
      fnc_SeleccionarProducto($("#tbl_productos").DataTable().row($(this).parents('tr')).data());
    })

    $(".btnBuscarProducto").on('click', function() {
      fnc_CargarDataTableProductos();
      $("#mdlListadoProductos").modal('show');
    })

    $("#btnCancelarCompra").on('click', function() {
      fnc_LimpiarFomulario();
    });

    $("#btnGuardarCompra").on('click', function() {
      fnc_GuardarCompra();
    })

    /* =======================================================================================
      EVENTO QUE PERMITE CHECKEAR EL EFECTIVO CUANDO ES EXACTO
      =========================================================================================*/
    $("#chkEfectivoExacto").change(function() {

      if ($("#chkEfectivoExacto").is(':checked')) {

        var vuelto = 0;
        var totalVenta = $("#resumen_total_venta").html().replace('Bs. ', '').trim().replace(',', '.');

        $("#iptEfectivoRecibido").val(totalVenta);

        $("#EfectivoEntregado").html(totalVenta);

        var EfectivoRecibido = parseFloat($("#EfectivoEntregado").html().replace("Bs. ", ""));

        vuelto = parseFloat(totalVenta) - parseFloat(EfectivoRecibido);

        $("#Vuelto").html(vuelto.toFixed(2));

      } else {

        $("#iptEfectivoRecibido").val("")
        $("#EfectivoEntregado").html("0.00");
        $("#Vuelto").html("0.00");

      }
    })

    /* ======================================================================================
    EVENTO QUE SE DISPARA AL DIGITAR EL MONTO EN EFECTIVO ENTREGADO POR EL CLIENTE
    =========================================================================================*/
    $("#iptEfectivoRecibido").keyup(function() {
      actualizarVuelto();
    });

    /* ======================================================================================
  EVENTO PARA ELIMINAR UN PRODUCTO DEL LISTADO
  ======================================================================================*/
    $('#tbl_ListadoProductos tbody').on('click', '.btnEliminarproducto', function() {
      $('#tbl_ListadoProductos').DataTable().row($(this).parents('tr')).remove().draw();
      fnc_ActualizarDatos();
    });

  }); //fin document ready

  /*===================================================================*/
  // C O N S U L T A   D E   P R O D U C T O S  (DATATABLE)
  /*===================================================================*/
  function fnc_CargarDataTableProductos() {

    //alert("dentro la funcion busqueda productos");

    if ($.fn.DataTable.isDataTable('#tbl_productos')) {
      $('#tbl_productos').DataTable().destroy();
      $('#tbl_productos tbody').empty();
    }

    $("#tbl_productos").DataTable({
      dom: 'Bfrtip',
      buttons: [{
          text: '<i class="fas fa-plus me-2"></i>Agregar Producto',
          className: 'btn btn-success btn-sm fw-bold rounded-pill addNewRecord',
          action: function(e, dt, node, config) {
            $("#mdlGestionarProducto").modal('show')
          }
        },
        {
          extend: 'pageLength',
          className: 'btn btn-info btn-sm fw-bold rounded-pill'
        }
      ],
      pageLength: [5, 10, 15, 30, 50, 100],
      pageLength: 10,
      ajax: {
        url: "ajax/productos_inventario.ajax.php",
        dataSrc: '',
        type: "POST",
        data: {
          'accion': 'listar_productos'
        },
      },
      scrollX: true,
      autoWidth: true,
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
          targets: [0, 2, 5, 6, 8, 10, 11, 12, 13, 14, 15, 16, 17, 18],
          visible: false
        },
        {
          targets: 1,
          orderable: false,
          className: 'text-center',
          createdCell: function(td, cellData, rowData, row, col) {
            $(td).html(
              "<span class='btnSeleccionarProducto' style='cursor:pointer; padding: 5px 10px; border-radius: 5px; transition: all 0.3s ease;'>" +
              "<i class='fas fa-check-circle fs-5 text-success'></i>" +
              "</span>")
          }
        }
      ],
      language: {
        url: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json"
      },
      createdRow: function(row, data, dataIndex) {
        $(row).css('vertical-align', 'middle');
      },
      initComplete: function(settings, json) {
        // Mejorar botones de DataTables
        $('.dt-buttons').addClass('mb-3 d-flex gap-2');
        if (!$("#mdlListadoProductos").hasClass('show')) {
          $("#mdlListadoProductos").modal('show');
        }
      }
    })

    ajustarHeadersDataTables($("#tbl_productos"))

  }

  function ajustarHeadersDataTables(element) {

    var observer = window.ResizeObserver ? new ResizeObserver(function(entries) {
      entries.forEach(function(entry) {
        $(entry.target).DataTable().columns.adjust();
      });
    }) : null;

    // Function to add a datatable to the ResizeObserver entries array
    resizeHandler = function($table) {
      if (observer)
        observer.observe($table[0]);
    };

    // Initiate additional resize handling on datatable
    resizeHandler(element);

  }

  /*===================================================================*/
  //FUNCION PARA CARGAR EL NRO DE BOLETA
  /*===================================================================*/
  function CargarNroBoleta() {

    $.ajax({
      async: false,
      url: "ajax/ventas.ajax.php",
      method: "POST",
      data: {
        'accion': 1
      },
      dataType: 'json',
      success: function(respuesta) {

        serie_boleta = respuesta["serie_boleta"];
        nro_boleta = respuesta["nro_venta"];

        //$("#iptNroSerie").val(serie_boleta);
        $("#iptNroVenta").val(nro_boleta);
      }
    });
  }

  /*===================================================================*/
  //FUNCION PARA ACTUALIZAR EL VUELTO
  /*===================================================================*/
  function actualizarVuelto() {

    var totalVenta = $("#resumen_total_venta").html().replace('Bs. ', '').trim().replace(',', '.');

    $("#chkEfectivoExacto").prop('checked', false);

    var efectivoRecibido = $("#iptEfectivoRecibido").val();

    if (efectivoRecibido > 0) {

      $("#EfectivoEntregado").html(parseFloat(efectivoRecibido).toFixed(2));

      vuelto = parseFloat(efectivoRecibido) - parseFloat(totalVenta);

      $("#Vuelto").html(vuelto.toFixed(2));

    } else {

      $("#EfectivoEntregado").html("0.00");
      $("#Vuelto").html("0.00");

    }
  }

  /*===================================================================*/
  //CARGAR DATATABLE DE PRODUCTOS A COMPRAR
  /*===================================================================*/
  function fnc_CargarDataTableListadoProductos() {

    if ($.fn.DataTable.isDataTable('#tbl_ListadoProductos')) {
      $('#tbl_ListadoProductos').DataTable().destroy();
      $('#tbl_ListadoProductos tbody').empty();
    }

    $('#tbl_ListadoProductos').DataTable({
      dom: 'Bfrtip',
      buttons: ['pageLength'],
      pageLength: [5, 10, 15, 30, 50, 100],
      pageLength: 10,
      columnDefs: [{
          targets: [4, 6, 8],
          visible: false
        },
        {
          targets: [0],
          orderable: false
        }
      ],

      "columns": [{
          "data": "acciones"
        },
        {
          "data": "codigo_producto"
        },
        {
          "data": "producto"
        },
        {
          "data": "cantidad"
        },
        {
          "data": "cantidad_temp"
        },
        {
          "data": "precio_venta"
        },
        {
          "data": "precio_venta_temp"
        },
        {
          "data": "descuento"
        },
        {
          "data": "descuento_temp"
        },
        {
          "data": "subTotal"
        },
        {
          "data": "total"
        }
      ],
      // "order": [
      //     [1, 'desc']
      // ],

      fixedColumns: {
        left: 2,
        right: 1
      },
      scrollX: true,
      "language": {
        "url": "https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json"
      }
    });

    ajustarHeadersDataTables($("#tbl_ListadoProductos"))
  }

  function CargarProductos(producto = "") {

    /*===================================================================*/
    // AUMENTAMOS LA CANTIDAD SI EL PRODUCTO YA EXISTE EN EL LISTADO
    /*===================================================================*/
    $('#tbl_ListadoProductos').DataTable().rows().eq(0).each(function(index) {

      var row = $('#tbl_ListadoProductos').DataTable().row(index);
      var data = row.data();

      if (producto == data['codigo_producto']) {
        mensajeToast("warning", "El producto la fue agregado al listado");
        exit;
      }
    })


    $.ajax({
      url: "ajax/productos_inventario.ajax.php",
      method: "POST",
      data: {
        'accion': 'obtener_producto', //BUSCAR PRODUCTOS POR SU CODIGO DE BARRAS
        'codigo_producto': producto
      },
      dataType: 'json',
      success: function(respuesta) {

        /*===================================================================*/
        //SI LA RESPUESTA ES VERDADERO, TRAE ALGUN DATO
        /*===================================================================*/
        if (respuesta) {

          $('#tbl_ListadoProductos').DataTable().row.add({
            'acciones': "<center>" +
              "<span class='btnEliminarproducto text-danger px-1'style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='Eliminar producto'> " +
              "<i class='fas fa-trash fs-6'> </i> " +
              "</span>" +
              "</center>",
            'codigo_producto': respuesta['codigo_producto'],
            'producto': respuesta['nombre'],
            'cantidad': '<input min="0" type="number" step="0.01" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : (event.charCode >= 46 && event.charCode <= 57) || event.charCode == 13" style="width:80px; height:28px;" codigoProducto = "' +
              respuesta['codigo_producto'] +
              '" class="form-control text-center iptCantidad p-0 m-0 px-2" value="1">',
            'cantidad_temp': 1,
            'precio_venta': '<input min="0" type="number" step="0.01" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : (event.charCode >= 46 && event.charCode <= 57) || event.charCode == 13" style="width:80px; height:28px;" codigoProducto = "' +
              respuesta['codigo_producto'] +
              '" class="form-control text-center iptCostoUnitario p-0 m-0 px-2" value="' +
              respuesta['precio_venta'] + '">',
            'precio_venta_temp': respuesta['precio_venta'],
            'descuento': '<input min="0" type="number" step="0.01" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : (event.charCode >= 46 && event.charCode <= 57) || event.charCode == 13" style="width:80px; height:28px;" codigoProducto = "' +
              respuesta['codigo_producto'] +
              '" class="form-control text-center iptDescuento p-0 m-0 px-2" value="0">',
            'descuento_temp': 0,
            'subTotal': 0,
            'total': 0


          }).draw();

          fnc_ActualizarDatos();
          mensajeToast("success", "Producto agregado")

        } else {
          mensajeToast('error', 'EL PRODUCTO NO EXISTE O NO TIENE STOCK');
        }



      }
    });
  }

  /*==========================================================================================================================================
  L I M P I A R   I N P U T 'S   D E L   F O R M U L A R I O
  *=========================================================================================================================================*/
  function fnc_LimpiarFomulario() {

    // LIMPIAR MENSAJES DE VALIDACIÓN
    $(".needs-validation-registro-compras").removeClass("was-validated");
    $(".form-floating").removeClass("was-validated");

    // RESETEAR TODOS LOS INPUTS DEL FORMULARIO
    $("#id_compra").val('0');
    $("#iptNroVenta").val('');
    $("#iptObservacion").val('');
    $("#iptEfectivoRecibido").val('');
    $("#chkEfectivoExacto").prop('checked', false);

    // RESETEAR SELECT2 (con trigger para actualizar visual)
    $("#selCliente").val('0').trigger('change');
    $("#selDocumentoVenta").val('0').trigger('change');
    $("#selTipoPago").val('1').trigger('change');
    $("#selVendedor").val('0').trigger('change');

    // LIMPIAR EFECTIVO Y VUELTO
    $("#EfectivoEntregado").html('0.00');
    $("#Vuelto").html('0.00');

    // RESETEAR RESUMEN
    $("#resumen_subtotal").html('Bs. 0.00');
    $("#resumen_total_descuento").html('Bs. 0.00');
    $("#resumen_total_venta").html('Bs. 0.00');

    // LIMPIAR DATATABLE DE PRODUCTOS AGREGADOS
    if ($.fn.DataTable.isDataTable('#tbl_ListadoProductos')) {
      $('#tbl_ListadoProductos').DataTable().clear().draw();
    }

    // RECARGAR EL NRO DE BOLETA
    CargarNroBoleta();

    // RECARGAR LA TABLA DE LISTADO DE COMPRAS
    fnc_CargarDataTableListadoCompras();

  }

  function fnc_ActualizarDatos() {

    $total_subtotal = 0;
    $total_impuesto = 0;
    $total_descuento = 0.00;
    $total_compra = 0.00;

    $('#tbl_ListadoProductos').DataTable().rows().eq(0).each(function(index) {

      var row = $('#tbl_ListadoProductos').DataTable().row(index);

      var data = row.data();

      // obtener cantidad
      $cantidad = $('#tbl_ListadoProductos').DataTable().cell(index, 4).data()

      //obtener precio venta
      $precio_venta = $('#tbl_ListadoProductos').DataTable().cell(index, 6).data()

      //obtener costo unitario
      $descuento = $('#tbl_ListadoProductos').DataTable().cell(index, 8).data()

      $subtotal = ($precio_venta * $cantidad);
      $total = $subtotal - $descuento;

      $total_subtotal = $total_subtotal + $subtotal;
      $total_compra = $total_compra + $total;
      $total_descuento = $total_descuento + parseFloat($descuento)
      console.log("🚀 ~ file: compras.php:1495 ~ $ ~ $total_descuento:", $total_descuento)

      $('#tbl_ListadoProductos').DataTable().cell(index, 9).data(parseFloat($subtotal).toFixed(2))
      $('#tbl_ListadoProductos').DataTable().cell(index, 10).data(parseFloat($total).toFixed(2));

    })

    $("#resumen_subtotal").html('Bs. ' + parseFloat($total_subtotal).toLocaleString('es-BO', {minimumFractionDigits: 2, maximumFractionDigits: 2}));
    $("#resumen_total_descuento").html('Bs. ' + parseFloat($total_descuento).toLocaleString('es-BO', {minimumFractionDigits: 2, maximumFractionDigits: 2}));
    $("#resumen_total_venta").html(parseFloat($total_compra).toLocaleString('es-BO', {minimumFractionDigits: 2, maximumFractionDigits: 2}));

  }

  function fnc_SeleccionarProducto(data) {
    //alert("Producto seleccionado: " + data["codigo_producto"]);
    CargarProductos(data["codigo_producto"])
  }

  /*==========================================================================================================================================
G U A R D A R   VENTA ADQUSICION
*=========================================================================================================================================*/
  function fnc_GuardarCompra() {

    let count = 0;
    let valores_en_cero = 0;
    form_registro_compras_validate = validarFormulario('needs-validation-registro-compras');

    // VALIDACIONES
    if (!form_registro_compras_validate) {
      mensajeToast("error", "complete los datos obligatorios");
      return;
    }

    // Validar que cliente sea válido (no sea 0)
    if ($("#selCliente").val() == 0 || $("#selCliente").val() == "") {
      mensajeToast("error", "Debe seleccionar un cliente válido");
      return;
    }

    // Validar que vendedor sea válido (no sea 0)
    if ($("#selVendedor").val() == 0 || $("#selVendedor").val() == "") {
      mensajeToast("error", "Debe seleccionar un vendedor válido");
      return;
    }

    $('#tbl_ListadoProductos').DataTable().rows().eq(0).each(function(index) {
      count = count + 1;

      var row = $('#tbl_ListadoProductos').DataTable().row(index);

      var data = row.data();


      if (data['cantidad_temp'] == 0 || data["costo_unitario_temp"] == 0 || data['cantidad_temp'] == '' ||
        data["costo_unitario_temp"] == '') {
        valores_en_cero = 1;
        // exit;
      }
    });

    if (count == 0) {
      mensajeToast("error", "Ingrese los productos de la compra");
      return;
    }

    if (valores_en_cero == 1) {
      mensajeToast("error", "Los valores de cantidad o costo unitario no pueden ser 0");
      return;
    }
    //FIN DE LAS VALIDACIONES

    Swal.fire({
      title: 'Está seguro(a) de registrar la Venta?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si, deseo registrarla!',
      cancelButtonText: 'Cancelar',
    }).then((result) => {

      if (result.isConfirmed) {

        detalle_productos = $("#tbl_ListadoProductos").DataTable().rows().data().toArray();

        //$ope_gravadas = $("#resumen_opes_gravadas").html().replace('S/ ', '').trim();
        //$ope_exoneradas = $("#resumen_opes_exoneradas").html().replace('S/ ', '').trim();
        //$ope_inafectas = $("#resumen_opes_inafectas").html().replace('S/ ', '').trim();
        //$total_igv = $("#resumen_total_igv").html().replace('S/ ', '').trim();
        $total_descuento = $("#resumen_total_descuento").html().replace('Bs. ', '').trim().replace(',', '.');
        $total = $("#resumen_total_venta").html().replace('Bs. ', '').trim().replace(',', '.');

        var formData = new FormData();
        if ($("#id_compra").val() > 0) formData.append('accion', 'actualizar_compra');
        else formData.append('accion', 'registrar_compra');

        formData.append('id_compra', $("#id_compra").val());
        formData.append('datos_compra', $("#frm-datos-registro-compras").serialize());
        formData.append('arr_detalle_productos', JSON.stringify(detalle_productos));
        formData.append('total_descuento', $total_descuento);
        formData.append('total', $total);

        console.log("Enviando datos a compras.ajax.php:", {
          action: formData.get('accion'),
          id_compra: formData.get('id_compra'),
          total_descuento: formData.get('total_descuento'),
          total: formData.get('total')
        });
        
        response = SolicitudAjax('ajax/compras.ajax.php', 'POST', formData);
        
        console.log("Respuesta recibida:", response);
        
        // Protección: si la respuesta no existe o no tiene el formato esperado
        if (typeof response === 'undefined' || response === null) {
          console.error('SolicitudAjax returned undefined or null');
          console.error('FormData enviado:', Array.from(formData.entries()));
          Swal.fire({
            position: 'top',
            icon: 'error',
            title: 'Error en la solicitud. No se recibió respuesta del servidor.',
            text: 'Revise la consola para más detalles.',
            showConfirmButton: true
          });
          return;
        }

        // Asegurar propiedades por defecto
        var tipo = response.tipo_msj ? response.tipo_msj : 'error';
        var msj = response.msj ? response.msj : 'Respuesta inválida del servidor.';

        Swal.fire({
          position: 'top',
          icon: tipo,
          title: msj,
          showConfirmButton: true
        })

        var nro_boleta = $("#iptNroVenta").val();

        if (response.tipo_msj == "success") {
          
           //consulta para imprimir la boleta
           Swal.fire({

            title: 'Decea IMPRIMIR la nota de Venta?',
            icon: 'success',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, deceo imprimir!',
            cancelButtonText: 'No, deceo imprimir por ahora!',
          }).then((result) => {
            if (result.isConfirmed) {

                           
                  window.open("http://localhost/faraonbd//ajax/extensiones/fpdf/boleta_venta.php?codigo=" + nro_boleta);
                
             
            }
          })

          fnc_LimpiarFomulario();

          CargarNroBoleta();


        }

      }

    })
  }
</script>