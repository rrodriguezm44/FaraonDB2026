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
        <h1 class="m-0">Ventas</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Inicio</a></li>
          <li class="breadcrumb-item active">Ventas</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
  <div class="container-fluid">
    <div class="row mb-3">

      <!-- lista de productos -->
      <div class="col-md-9">
        <div class="row">

          <!-- INPUT PARA INGRESO DEL CODIGO DE BARRAS O DESCRIPCION DEL PRODUCTO -->
          <div class="col-md-12 mb-3">
            <div class="form-group mb-2 ui-widget">

              <label class="col-form-label" for="iptCodigoVenta">
                <i class="fas fa-barcode fs-6"></i>
                <span class="small">Productos</span>
              </label>

              <input type="text" class="form-control form-control-sm" id="iptCodigoVenta"
                placeholder="Ingrese el código de barras o el nombre del producto">
            </div>
          </div>

          <!-- ETIQUETA QUE MUESTRA LA SUMA TOTAL DE LOS PRODUCTOS AGREGADOS AL LISTADO -->
          <div class="col-md-6 mb-3">
            <h3>Total Venta: Bs. <span id="totalVenta">0.00</span></h3>
          </div>

          <!-- BOTONES PARA VACIAR LISTADO Y COMPLETAR LA VENTA -->
          <div class="col-md-6 text-right">
            <button class="btn btn-primary" id="btnIniciarVenta">
              <i class="fas fa-shopping-cart"></i> Realizar Venta
            </button>
            <button class="btn btn-danger" id="btnVaciarListado">
              <i class="far fa-trash-alt"></i> Vaciar Listado
            </button>
          </div>

          <!-- LISTADO QUE CONTIENE LOS PRODUCTOS QUE SE VAN AGREGANDO PARA LA COMPRA -->
          <div class="col-md-12">

            <table id="lstProductosVenta" class="display nowrap table-striped w-100 shadow ">
              <thead class="bg-info text-left fs-6">
                <tr>
                  <th>Item</th>
                  <th>Codigo</th>
                  <th>Id Categoria</th>
                  <th>Categoria</th>
                  <th>Producto</th>
                  <th>Cantidad</th>
                  <th>P. Venta</th>
                  <th>Desc.%</th>
                  <th>Total</th>
                  <th class="text-center">Acciones</th>
                  <th class="text-center">Precios</th>
                  <th>P. Feria</th>
                  <th>P. Oferta</th>
                </tr>
              </thead>
              <tbody class="small text-left fs-6">
              </tbody>
            </table>
            <!-- / table -->
          </div>
          <!-- /.col -->

        </div>
      </div><!-- termina columan de ventas 9 -->

      <div class="col-md-3">

        <div class="card shadow">

          <h5 class="card-header py-1 bg-primary text-white text-center">
            Total Venta: Bs. <span id="totalVentaRegistrar">0.00</span>
          </h5>

          <div class="card-body p-2">

            <!-- SELECCIONAR CLIENTE -->
            <div class="form-group mb-2">

              <label class="col-form-label" for="selCliente">
                <i class="fas fa-users fs-6"></i>
                <span class="small">Clientes</span><span class="text-danger">*</span>
              </label>

              <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="selCliente"
                name="selCliente" required>
                <option value="0"> ---Clientes--- </option>
              </select>

              <span id="validate_cliente" class="text-danger small fst-italic" style="display:none">
                Debe Ingresar Cliente
              </span>

            </div>

            <!-- SELECCIONAR TIPO DE DOCUMENTO -->
            <div class="form-group mb-2">

              <label class="col-form-label" for="selDocumentoVenta">
                <i class="fas fa-file-alt fs-6"></i>
                <span class="small">Documento</span><span class="text-danger">*</span>
              </label>

              <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="selDocumentoVenta">
                <option value="0">Seleccione Documento</option>
                <option value="1" selected="true">Nota de Pago</option>
                <option value="2">Factura</option>
              </select>

              <!-- <span id="validate_categoria" class="text-danger small fst-italic" style="display:none">
                Debe Seleccione documento
              </span> -->

            </div>

            <!-- SELECCIONAR TIPO DE PAGO -->
            <div class="form-group mb-2">

              <label class="col-form-label" for="selTipoPago">
                <i class="fas fa-money-bill-alt fs-6"></i>
                <span class="small">Tipo Pago</span><span class="text-danger">*</span>
              </label>

              <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="selTipoPago">
                <option value="0">Seleccione Tipo Pago</option>
                <option value="1" selected="true">Contado</option>
                <option value="2">Credito</option>
                <option value="3">Transferencia</option>
              </select>

              <span id="validate_categoria" class="text-danger small fst-italic" style="display:none">
                Debe Ingresar tipo de pago
              </span>

            </div>

            <!-- SELECCIONAR FECHA DE ENTREGA -->
            <div class="form-group mb-2">

              <label class="col-form-label" for="iptFechaEntrega">
                <i class="fas fa-calendar fs-6"></i>
                <span class="small">Fecha Entrega</span><span class="text-danger">*</span>
              </label>

              <input type="date" class="form-control form-control-sm" id="iptFechaEntrega" name="iptFechaEntrega"
                placeholder="Ingrese Fecha Entrega">
              <input type="hidden" name="codUsuario" id="codUsuario" value="<?php echo $usuarioID; ?>">


            </div>

            <!-- SELECCIONAR VENDEDOR -->
            <div class="form-group mb-2">

              <label class="col-form-label" for="selVendedor">
                <i class="fas fa-user-plus fs-6"></i>
                <span class="small">Vendedor</span><span class="text-danger">*</span>
              </label>

              <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="selVendedor"
                name="selVendedor" required>
                <option value="0">---Vendedores---</option>
              </select>

              <span id="validate_vendedor" class="text-danger small fst-italic" style="display:none">
                Debe Ingresar Vendedor
              </span>

            </div>

            <!-- INPUT OBSERVACION -->
            <div class="form-group mb-2">

              <label class="col-form-label" for="iptObservacion">
                <i class="fas fa-book fs-6"></i>
                <span class="small">Observaciones</span>
              </label>

              <input type="text" class="form-control form-control-sm" id="iptObservacion" name="iptObservacion"
                placeholder="Ingrese Observacion Venta" onKeyUp="javascript:this.value=this.value.toUpperCase();">

            </div>

            <!-- SERIE Y NRO DE BOLETA -->
            <div class="form-group">

              <div class="row">

                <div class="col-md-4">

                  <label for="iptNroSerie">Gestion</label>

                  <input type="text" min="0" name="iptEfectivo" id="iptNroSerie" class="form-control form-control-sm"
                    placeholder="<?php echo date("Y"); ?>" disabled>
                </div>

                <div class="col-md-8">

                  <label for="iptNroVenta">Nro Venta</label>

                  <input type="text" min="0" name="iptEfectivo" id="iptNroVenta" class="form-control form-control-sm"
                    placeholder="Nro Venta" disabled>

                </div>

              </div>

            </div>

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

            <!-- MOSTRAR EL SUBTOTAL, IGV Y TOTAL DE LA VENTA -->
            <div class="row">
              <div class="col-md-7">
                <span>TOTAL DESC.%</span>
              </div>
              <div class="col-md-5 text-right">
                Bs. <span class="" id="boleta_descuento">0.00</span>
              </div>

              <!-- <div class="col-md-7">
                <span>IVA (13%)</span>
              </div>
              <div class="col-md-5 text-right">
                Bs. <span class="" id="boleta_igv">0.00</span>
              </div> -->

              <div class="col-md-7">
                <span>TOTAL</span>
              </div>
              <div class="col-md-5 text-right">
                Bs. <span class="" id="boleta_total">0.00</span>
              </div>
            </div>

          </div><!-- ./ CARD BODY -->

        </div><!-- ./ CARD -->
      </div>

    </div>
  </div><!-- /.container-fluid -->
</div>
<!-- /.content -->

<script>
var table;

var items = [];

window.itemProducto = 1

var Toast = Swal.mixin({
  toast: true,
  position: 'top',
  showConfirmButton: false,
  timer: 3000
});

$(document).ready(function() {

  CargarNroBoleta();

  //MOSTRANDO DATOS DE CLIENTES
  $.post("ajax/busca_cliente.php", function(data) {
    $("#selCliente").html(data);
  });

  //MOSTRANDO DATOS DEL VENDEDOR
  $.post("ajax/busca_vendedor.php", function(data) {
    $("#selVendedor").html(data);
  });

  //EVENTO PARA VACIAR EL LISTADO DE PRODUCTOS SELECCIONADOS

  $("#btnVaciarListado").on('click', function() {
    vaciarListado();
  })

  /* ======================================================================================
  INICIALIZAR LA TABLA DE VENTAS
  ======================================================================================*/
  table = $('#lstProductosVenta').DataTable({
    "columns": [{
        "data": "producto_id"
      },
      {
        "data": "codigo_producto"
      },
      {
        "data": "categoria_id"
      },
      {
        "data": "nombre"
      },
      {
        "data": "nombre_p"
      },
      {
        "data": "cantidad"
      },
      {
        "data": "precio_venta"
      },
      {
        "data": "descuento"
      },
      {
        "data": "total"
      },
      {
        "data": "acciones"
      },
      {
        "data": "precios"
      },
      {
        "data": "precio_feria"
      },
      {
        "data": "precio_oferta"
      }
    ],

    columnDefs: [{
        targets: 0,
        visible: false
      },
      {
        targets: 1,
        className: 'text-center'
      },
      {
        targets: 2,
        visible: false
      },
      {
        targets: 3,
        visible: false
      },
      {
        targets: 5,
        className: 'text-center'
      },
      {
        targets: 6,
        orderable: false
      },
      {
        targets: 7,
        className: 'text-center'
      },
      {
        targets: 11,
        visible: false
      },
      {
        targets: 12,
        visible: false
      }
    ],
    "order": [
      [0, 'desc']
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

  /* ======================================================================================
  TRAER LISTADO DE PRODUCTOS PARA INPUT DE AUTOCOMPLETAR
  ======================================================================================*/
  $.ajax({
    async: false,
    url: "ajax/productos.ajax.php",
    method: "POST",
    data: {
      'accion': 6
    },
    dataType: 'json',
    success: function(respuesta) {

      // Verificar tipo de dato
      console.log("Tipo de dato:", Array.isArray(respuesta) ? "Array" : typeof respuesta);

      // Mostrar contenido
      console.log("Contenido:", respuesta);

      console.log(typeof respuesta) // Debe mostrar "object" o "array"
      console.log(respuesta.length)

      for (let i = 0; i < respuesta.length; i++) {
        items.push(respuesta[i]['descripcion_producto'])
      }

      $("#iptCodigoVenta").autocomplete({

        source: items,
        select: function(event, ui) {

          //console.log(ui.item.value)

          CargarProductos(ui.item.value);

          // $("#iptCodigoVenta").val("");

          // $("#iptCodigoVenta").focus();

          return false;
        }
      })
    }
  });

  //EVENTO QUE REGISTRA EL PRODUCTO EN EL LISTADO CUANDO INGRESA EL CODIGO DE BARRAS

  $("#iptCodigoVenta").change(function() {
    //console.log('cambio');
    CargarProductos();
  })

  //EVENTO PARA ELIMINAR UN PRODUCTO
  $('#lstProductosVenta').on('click', '.btnEliminarproducto', function() {

    table.row($(this).parents('tr')).remove().draw();

    recalcularTotales();

  });


  /* ======================================================================================
    EVENTO PARA MODIFICAR LA CANTIDAD DE PRODUCTOS A COMPRAR
    ======================================================================================*/
  $('#lstProductosVenta tbody').on('change', '.iptCantidad', function() {

    var data = table.row($(this).parents('tr')).data();

    cantidad_actual = $(this)[0]['value'];
    cod_producto_actual = $(this)[0]['attributes'][2]['value'];


    if (!$.isNumeric($(this)[0]['value']) || $(this)[0]['value'] <= 0) {

      mensajeToast('error', 'INGRESE UN VALOR NUMERICO Y MAYOR A 0');

      $(this)[0]['value'] = "1";

      $("#iptCodigoVenta").val("");
      $("#iptCodigoVenta").focus();
      return;
    }

    //console.log(cantidad_actual)

    table.rows().eq(0).each(function(index) {

      var row = table.row(index);

      var data = row.data();

      var desc_act = $('.iptDescuento').val();

      if (data['codigo_producto'] == cod_producto_actual) {

        $.ajax({
          async: false,
          url: "ajax/productos.ajax.php",
          method: "POST",
          data: {
            'accion': 8,
            'codigo_producto': cod_producto_actual,
            'cantidad_a_comprar': cantidad_actual
          },
          dataType: 'json',
          success: function(respuesta) {

            if (parseInt(respuesta['existe']) == 0) {

              mensajeToast('error', ' El producto ' + data['descripcion_producto'] +
                ' ya no tiene stock');

              table.cell(index, 5).data(
                '<input type="text" style="width:40px;font-size:12px;" codigoProducto = "' +
                cod_producto_actual +
                '" class="form-control text-center iptCantidad m-0 p-0" value="1">').draw();

              $("#iptCodigoVenta").val("");
              $("#iptCodigoVenta").focus();

              // ACTUALIZAR EL NUEVO PRECIO DEL ITEM DEL LISTADO DE VENTA
              NuevoPrecio = (parseFloat(1) * data['precio_venta'].replaceAll("Bs. ", "")).toFixed(2);
              NuevoPrecio = "Bs. " + NuevoPrecio;
              table.cell(index, 8).data(NuevoPrecio).draw();

              // RECALCULAMOS TOTALES
              recalcularTotales();

            } else {

              // AUMENTAR EN 1 EL VALOR DE LA CANTIDAD
              table.cell(index, 5).data(
                '<input type="text" style="margin: auto;width:40px;height:25px;font-size:12px;" codigoProducto = "' +
                cod_producto_actual +
                '" class="form-control text-center iptCantidad p-0" value="' + cantidad_actual +
                '">').draw();


              // ACTUALIZAR EL NUEVO PRECIO DEL ITEM DEL LISTADO DE VENTA

              NuevoPrecio = ((data['precio_venta'].replaceAll("Bs. ", "") - (data['precio_venta']
                .replaceAll(
                  "Bs. ", "") * desc_act) / 100) * parseFloat(cantidad_actual)).toFixed(2);
              NuevoPrecio = "Bs. " + NuevoPrecio;
              //console.log('cantidad' + NuevoPrecio)
              table.cell(index, 8).data(NuevoPrecio).draw();

              // RECALCULAMOS TOTALES
              recalcularTotales();
            }
          }
        });

      }

    });

  });

  /* ======================================================================================
  EVENTO PARA MODIFICAR EL DESCUENTO DE PRODUCTOS A VENDER
  ======================================================================================*/
  $('#lstProductosVenta tbody').on('change', '.iptDescuento', function() {

    var data = table.row($(this).parents('tr')).data();

    descuento_actual = $(this)[0]['value'];
    cod_producto_actual = $(this)[0]['attributes'][2]['value'];

    //alert('descuento....' + descuento_actual + cod_producto_actual + cod)

    if (!$.isNumeric($(this)[0]['value']) || $(this)[0]['value'] <= 0) {

      mensajeToast('error', 'INGRESE UN VALOR NUMERICO Y MAYOR A 0');

      $(this)[0]['value'] = "0";

      $("#iptCodigoVenta").val("");
      $("#iptCodigoVenta").focus();
      return;
    }

    table.rows().eq(0).each(function(index) {

      var row = table.row(index);

      var data = row.data();

      var cant_act = $('.iptCantidad').val();

      // console.log(cantidad2)

      if (data['codigo_producto'] == cod_producto_actual) {
        //     AUMENTAR EL VALOR DEL DESCUENTO
        table.cell(index, 7).data(
          '<input type="text" style="margin: auto;width:40px;height:25px;font-size:12px;" codigoProducto = "' +
          cod_producto_actual +
          '" class="form-control text-center iptDescuento p-0" value="' + descuento_actual +
          '">').draw();


        //     ACTUALIZAR EL NUEVO PRECIO DEL ITEM DEL LISTADO DE VENTA
        NuevoPrecio = ((data['precio_venta'].replaceAll("Bs. ", "") - (data['precio_venta'].replaceAll(
          "Bs. ", "") * parseFloat(descuento_actual)) / 100) * cant_act).toFixed(2);

        NuevoPrecio = "Bs. " + NuevoPrecio;
        //     console.log("descuento..." + NuevoPrecio)
        table.cell(index, 8).data(NuevoPrecio).draw();

        //     RECALCULAMOS TOTALES
        recalcularTotales();
      }
    })
  });


  /* =======================================================================================
    EVENTO QUE PERMITE CHECKEAR EL EFECTIVO CUANDO ES EXACTO
    =========================================================================================*/
  $("#chkEfectivoExacto").change(function() {

    if ($("#chkEfectivoExacto").is(':checked')) {

      var vuelto = 0;
      var totalVenta = $("#totalVenta").html();

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
  EVENTO PARA INICIAR EL REGISTRO DE LA VENTA
  ====================================================================================== */
  $("#btnIniciarVenta").on('click', function() {
    realizarVenta();
  })

  /* ======================================================================================
  EVENTO PARA MODIFICAR EL PRECIO DE VENTA
  ====================================================================================== */
  $('#lstProductosVenta tbody').on('change', '#selTipoPrecio', function() {

    const opcionSeleccionada = $(this).find('option:selected');
    const opcionCodigo = opcionSeleccionada.data('codigo');
    //const opcionPrecio = opcionSeleccionada.data('precio'); // Usar data-attributes
    const opcionPrecio = parseFloat(opcionSeleccionada.data('precio').replaceAll("Bs. ", "")).toFixed(
      2); // Usar data-attributes
    //alert(opcionCodigo + opcionPrecio)
    // const nuevoPrecio = calcularPrecio(codigoDescuento, precioOriginal);

    recalcularMontos(opcionCodigo, opcionPrecio);
  });


}); //fin ready

function recalcularMontos(opcionCodigo, opcionPrecio) {

  table.rows().eq(0).each(function(index) {

    var row = table.row(index);

    var data = row.data();


    if (data['codigo_producto'] == opcionCodigo) {


      table.cell(index, 6).data("Bs. " + parseFloat(opcionPrecio).toFixed(2)).draw();

      cantidad_actual = parseFloat($.parseHTML(data['cantidad'])[0]['value']);

      descuento_actual = parseFloat($.parseHTML(data['descuento'])[0]['value']);

      //nuevoPrecio = (parseFloat(cantidad_actual) * data['precio_venta'].replace("Bs. ", "")).toFixed(2);

      nuevoPrecio = ((data['precio_venta'].replaceAll("Bs. ", "") - (data['precio_venta'].replaceAll(
        "Bs. ", "") * parseFloat(descuento_actual)) / 100) * cantidad_actual).toFixed(2);

      nuevoPrecio = "Bs. " + nuevoPrecio;

      table.cell(index, 8).data(nuevoPrecio).draw();
    }
  });

  recalcularTotales();
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

//FUNCION PARTA LIMPIAR TOTALMENTE EL LISTA DE PRODUCTOS ELEGIDOS
function vaciarListado() {
  table.clear().draw();
  LimpiarInputs();
}

/*===================================================================*/
//FUNCION PARA LIMPIAR LOS INPUTS DE LA BOLETA Y LABELS QUE TIENEN DATOS
/*===================================================================*/
function LimpiarInputs() {
  $("#totalVenta").html("0.00");
  $("#totalVentaRegistrar").html("0.00");
  $("#boleta_total").html("0.00");
  $("#iptEfectivoRecibido").val("");
  $("#EfectivoEntregado").html("0.00");
  $("#Vuelto").html("0.00");
  $("#chkEfectivoExacto").prop('checked', false);
  $("#boleta_descuento").html("0.00");
  $("#boleta_igv").html("0.00")
} /* FIN LimpiarInputs */

/*===================================================================*/
//FUNCION PARA ACTUALIZAR EL VUELTO
/*===================================================================*/
function actualizarVuelto() {

  var totalVenta = $("#totalVenta").html();

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

//FUNCION PARA RECALCULAR TOTALES DE VENTAS
function recalcularTotales() {

  var TotalVenta = 0.00;

  table.rows().eq(0).each(function(index) {
    var row = table.row(index);

    var data = row.data();

    TotalVenta = parseFloat(TotalVenta) + parseFloat(data['total'].replace("Bs. ", ""));

  });

  $("#totalVenta").html("");
  $("#totalVenta").html(TotalVenta.toFixed(2));

  $("#iptCodigoVenta").val("");


  $("#totalVentaRegistrar").html(TotalVenta.toFixed(2));
  $("#boleta_total").html(TotalVenta.toFixed(2));

  //limpiamos el input de efectivo exacto; desmarcamos el check de efectivo exacto
  //borramos los datos de efectivo entregado y vuelto
  $("#iptEfectivoRecibido").val("");
  $("#chkEfectivoExacto").prop('checked', false);
  $("#EfectivoEntregado").html("0.00");
  $("#Vuelto").html("0.00");

  $("#iptCodigoVenta").val("");
  $("#iptCodigoVenta").focus();
}

//FUNCION PARA CARGAR PRODUCTOS EN EL DATATABLE
function CargarProductos(producto = "") {

  if (producto != "") {
    var codigo_producto = producto;

  } else {
    var codigo_producto = $("#iptCodigoVenta").val();
  }

  //console.log("🚀 ~ file: ventas.php ~ line 335 ~ CargarProductos ~ codigo_producto", codigo_producto)

  var producto_repetido = 0;

  /*===================================================================*/
  // AUMENTAMOS LA CANTIDAD SI EL PRODUCTO YA EXISTE EN EL LISTADO
  /*===================================================================*/
  table.rows().eq(0).each(function(index) {

    var row = table.row(index);
    var data = row.data();

    if (parseInt(codigo_producto) == data['codigo_producto']) {

      producto_repetido = 1;

      $.ajax({
        async: false,
        url: "ajax/productos.ajax.php",
        method: "POST",
        data: {
          'accion': 8,
          'codigo_producto': data['codigo_producto'],
          'cantidad_a_comprar': data['cantidad']
        },
        dataType: 'json',
        success: function(respuesta) {

          if (parseInt(respuesta['existe']) == 0) {

            Toast.fire({
              icon: 'error',
              title: ' El producto ' + data['nombre_p'] + ' ya no tiene stock'
            })

            $("#iptCodigoVenta").val("");
            $("#iptCodigoVenta").focus();


          } else {

            // AUMENTAR EN 1 EL VALOR DE LA CANTIDAD
            //table.cell(index, 5).data(parseFloat(data['cantidad']) + 1).draw();

            // ACTUALIZAR EL NUEVO PRECIO DEL ITEM DEL LISTADO DE VENTA
            // NuevoPrecio = (parseInt(data['cantidad']) * data['precio_venta'].replace("Bs. ", "")).toFixed(2);
            // NuevoPrecio = "Bs. " + NuevoPrecio;
            // table.cell(index, 7).data(NuevoPrecio).draw();

            // RECALCULAMOS TOTALES
            //recalcularTotales();

            Toast.fire({
              icon: 'warning',
              title: ' El producto ' + data['nombre_p'] + ' ya esta en lista'
            })

            $("#iptCodigoVenta").val("");
            $("#iptCodigoVenta").focus();
          }
        }
      });

    }
  });

  if (producto_repetido == 1) {
    return;
  }

  //anterior codigo

  $.ajax({
    url: "ajax/productos.ajax.php",
    method: "POST",
    data: {
      'accion': 7, //BUSCAR PRODUCTOS POR SU CODIGO DE BARRAS
      'codigo_producto': codigo_producto
    },
    dataType: 'json',
    success: function(respuesta) {

      /*===================================================================
      SI LA RESPUESTA ES VERDADERO, TRAE ALGUN DATO
      ===================================================================*/

      if (respuesta) {

        var TotalVenta = 0.00;

        table.row.add({
          'producto_id': itemProducto,
          'codigo_producto': respuesta['codigo_producto'],
          'categoria_id': respuesta['categoria_id'],
          'nombre': respuesta['nombre'],
          'nombre_p': respuesta['nombre_p'],
          'cantidad': '<input type="text" style="margin: auto;width:40px; height:25px;font-size:12px;" codigoProducto = "' +
            respuesta[
              'codigo_producto'] + '" class="form-control text-center iptCantidad " value="1">',
          'precio_venta': respuesta['precio_venta'],
          'descuento': '<input type="text" style="margin: auto; width:55px; height:25px;font-size:12px;" codigoProducto = "' +
            respuesta[
              'codigo_producto'] + '" class="form-control text-center iptDescuento " value="' + respuesta[
              'descuento'] + '">',
          'total': respuesta['total'],
          'acciones': "<center>" +
            "<span class='btnEliminarproducto text-danger px-1'style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='Eliminar producto'> " +
            "<i class='fas fa-trash fs-5'> </i> " +
            "</span>" +
            "</center>",
          'precios': "<center>" +
            "<div class='form-group mb-2'>" +
            "<select class='form-select form-select-sm mt-2 mb-2' id='selTipoPrecio' style='font-size: 12px; width: 75px; padding: 0; text-align: center;'>" +
            "<option data-codigo='" + respuesta['codigo_producto'] + "' data-precio='" +
            respuesta['precio_venta'] + "' selected='true'>N. " +
            respuesta['precio_venta'] + "</option>" +
            "<option data-codigo='" + respuesta['codigo_producto'] + "'data-precio='" +
            respuesta['precio_feria'] + "'>F. " + respuesta[
              'precio_feria'] + "</option>" +
            "<option data-codigo='" + respuesta['codigo_producto'] + "' data-precio='" +
            respuesta['precio_oferta'] + "'>O. " + respuesta[
              'precio_oferta'] + "</option>" +
            "</select>" +
            "</div>" +
            "</center>",
          'precio_feria': respuesta['precio_feria'],
          'precio_oferta': respuesta['precio_oferta']
        }).draw();

        itemProducto = itemProducto + 1;

        //Recalculamos el total de la venta

        recalcularTotales();


        /*===================================================================
        SI LA RESPUESTA ES FALSO, NO TRAE ALGUN DATO
        /*===================================================================*/
      } else {

        Toast.fire({
          icon: 'error',
          title: ' El producto no existe o no tiene stock'
        });

        $("#iptCodigoVenta").val("");
        $("#iptCodigoVenta").focus();

      }

    }
  });

} /* FIN CargarProductos */

/*===================================================================*/
//REALIZAR LA VENTA
/*===================================================================*/
function realizarVenta() {

  var count = 0;
  var totalVenta = $("#totalVenta").html();
  var nro_boleta = $("#iptNroVenta").val();

  var id_cliente = $("#selCliente").val();
  var vendedor = $("#selVendedor").val();
  var fecha_entrega = $("#iptFechaEntrega").val();
  var obs_venta = $("#iptObservacion").val();

  var docVenta = $("#selDocumentoVenta").val();
  var tipoPago = $("#selTipoPago").val();

  var usuario = $("#codUsuario").val();;

  table.rows().eq(0).each(function(index) {
    count = count + 1;
  });

  if (count > 0) {

    if ($("#iptEfectivoRecibido").val() > 0 && $("#iptEfectivoRecibido").val() != "") {

      if ($("#iptEfectivoRecibido").val() < parseFloat(totalVenta)) {

        Toast.fire({
          icon: 'warning',
          title: 'El efectivo es menor al costo total de la venta'
        });

        return false;
      }

      var formData = new FormData();
      var arr = [];

      table.rows().eq(0).each(function(index) {

        var row = table.row(index);

        var data = row.data();

        var cantidad_fila = parseFloat($.parseHTML(data['cantidad'])[0]['value']);

        var precio_fila = data['precio_venta'].replaceAll("Bs. ", "");

        var descuento_fila = parseFloat($.parseHTML(data['descuento'])[0]['value']);

        arr[index] = data['codigo_producto'] + "," + parseFloat(cantidad_fila) + "," + data['total'].replace(
          "Bs. ", "") + "," + data['producto_id'] + "," + parseFloat(precio_fila) + "," + parseFloat(
          descuento_fila);

        formData.append('arr[]', arr[index]);
        //console.log(arr[index]);
      });

      formData.append('nro_boleta', nro_boleta);
      formData.append('descripcion_venta', 'Venta realizada con Nro Boleta: ' + nro_boleta);
      formData.append('total_venta', parseFloat(totalVenta));
      formData.append('id_cliente', id_cliente);
      formData.append('vendedor', vendedor);
      formData.append('fechaEntrega', fecha_entrega);
      formData.append('obs_venta', obs_venta);
      formData.append('tipoPago', tipoPago);
      formData.append('docVenta', docVenta);
      formData.append('usuarioID', usuario);

      $.ajax({
        url: "ajax/ventas.ajax.php",
        method: "POST",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta) {

          console.log(respuesta);
          Swal.fire({
            position: 'center',
            icon: 'success',
            title: respuesta,
            showConfirmButton: false,
            timer: 1500
          })

          //consulta para imprimir la boleta
           Swal.fire({

            title: 'Decea IMPRIMIR la nota de Venta?',
            icon: 'success',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, deceo imprimir!',
            cancelButtonText: 'Cancelar!',
          }).then((result) => {
            if (result.isConfirmed) {

                           
                  window.open("http://localhost/faraonbd//ajax/extensiones/fpdf/boleta_venta.php?codigo=" + nro_boleta);
                
              LimpiarInputs();
              /* Toast.fire({
                icon: 'success',
                title: 'Imprimiendo Nota de Venta'+ nro_boleta
              }); */
            }
          })

          table.clear().draw();

          LimpiarInputs();

          CargarNroBoleta();

        }
      });

    } else {

      Toast.fire({
        icon: 'warning',
        title: 'Ingrese el monto en efectivo'
      });
    }

  } else {

    Toast.fire({
      icon: 'warning',
      title: 'No hay productos en el listado.'
    });

  }

  $("#iptCodigoVenta").focus();

} /* FIN realizarVenta */
</script>