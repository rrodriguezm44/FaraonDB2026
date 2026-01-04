<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Generacion de Ofertas</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Inicio</a></li>
          <li class="breadcrumb-item active">Ofertas</li>
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

      <!-- FORMULARIO OFERTA -->
      <div class="col-md-3">

        <div class="card shadow">

          <h5 class="card-header py-1 bg-blue text-white text-center">
            Total Oferta: Bs. <span id="totalOfertaRegistrar">0.00</span>
          </h5>

          <div class="card-body p-2">

            <!-- SELECCIONAR FECHA DE INICIO OFERTA -->
            <div class="form-group mb-2">

              <label class="col-form-label" for="iptFechaInicioOferta">
                <i class="fas fa-calendar fs-6"></i>
                <span class="small">Fecha Inicio Oferta</span><span class="text-danger">*</span>
              </label>

              <input type="date" class="form-control form-control-sm" id="iptFechaInicioOferta"
                name="iptFechaInicioOferta" placeholder="Ingrese Fecha InicioOferta">


            </div>

            <!-- SELECCIONAR FECHA FINAL OFERTA -->
            <div class="form-group mb-2">

              <label class="col-form-label" for="iptFechaFinOferta">
                <i class="fas fa-calendar fs-6"></i>
                <span class="small">Fecha Fin Oferta</span><span class="text-danger">*</span>
              </label>

              <input type="date" class="form-control form-control-sm" id="iptFechaFinOferta" name="iptFechaFinOferta"
                placeholder="Ingrese Fecha FinOferta">


            </div>


            <!-- SELECCIONAR PROVEEDOR -->
            <div class="form-group mb-2">

              <label class="col-form-label" for="selProveedor">
                <i class="fas fa-dolly fs-6"></i>
                <span class="small">Proveedor</span><span class="text-danger">*</span>
              </label>

              <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="selProveedor"
                name="selProveedor" required>
                <option value="0"> ---Proveedor--- </option>
              </select>

              <span id="validate_Proveedor" class="text-danger small fst-italic" style="display:none">
                Debe Ingresar Proveedor
              </span>

            </div>


            <!-- INPUT CODIGO -->
            <div class="form-group mb-2">

              <label class="col-form-label" for="iptCodigoOferta">
                <i class="fas fa-qrcode fs-6"></i>
                <span class="small">Codigo Oferta</span>
              </label>

              <input type="text" class="form-control text-primary bg-black form-control-sm" id="iptCodigoOferta"
                name="iptCodigoOferta" placeholder="Ingrese Codigo Oferta"
                onKeyUp="javascript:this.value=this.value.toUpperCase();">

              <span id="validate_codigo" class="text-danger small fst-italic" style="display:none">
                Debe Ingresar Codigo
              </span>

            </div>

            <!-- INPUT DESCRIPCION -->
            <div class="form-group mb-2">

              <label class="col-form-label" for="iptDescripcion">
                <i class="fas fa-stream fs-6"></i>
                <span class="small">Descripcion</span>
              </label>

              <input type="text" class="form-control form-control-sm" id="iptDescripcion" name="iptDescripcion"
                placeholder="Ingrese Descripcion Oferta" onKeyUp="javascript:this.value=this.value.toUpperCase();">

              <span id="validate_descripcion" class="text-danger small fst-italic" style="display:none">
                Debe Ingresar Descripcion
              </span>

            </div>

            <!-- SELECCIONAR CATEGORIAS -->
            <div class="form-group mb-2">

              <label class="col-form-label" for="selCategorias">
                <i class="fas fa-project-diagram fs-6"></i>
                <span class="small">Categorias</span><span class="text-danger">*</span>
              </label>

              <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="selCategorias"
                name="selCategorias" required>
                <option value="0">---Categorias---</option>
              </select>

              <span id="validate_categorias" class="text-danger small fst-italic" style="display:none">
                Debe Ingresar Categorias
              </span>

            </div>

            <!-- INPUT CANTIDAD DE OFERTAS -->
            <div class="form-group mb-2">

              <label class="col-form-label" for="iptCantidadOferta">
                <i class="fas fa-marker fs-6"></i>
                <span class="small">Cantidad de Ofertas</span>
              </label>

              <input type="text" class="form-control form-control-sm" id="iptCantidadOferta" name="iptCantidadOferta"
                placeholder="Ingrese Cantidad de Ofertas">

              <span id="validate_cantidad" class="text-danger small fst-italic" style="display:none">
                Debe Ingresar Cantidad
              </span>

            </div>

            <!-- INPUT UNIDAD DE MEDIDA -->
            <div class="form-group mb-2">

              <label class="col-form-label" for="iptUnidadMedida">
                <i class="fas fa-balance-scale fs-6"></i>
                <span class="small">Unidad de Medida</span>
              </label>

              <input type="text" class="form-control form-control-sm" id="iptUnidadMedida" name="iptUnidadMedida"
                placeholder="Ingrese Codigo Oferta" onKeyUp="javascript:this.value=this.value.toUpperCase();">

              <span id="validate_medidad" class="text-danger small fst-italic" style="display:none">
                Debe Ingresar Unidad de Medida
              </span>

            </div>

            <!-- INPUT PRECIO DE CADA OFERTA -->
            <div class="form-group mb-2">

              <label class="col-form-label" for="iptPrecioOferta">
                <i class="fas fa-money-bill-alt fs-6"></i>
                <span class="small">Precio Oferta</span>
              </label>

              <input type="text" class="form-control form-control-sm" id="iptPrecioOferta" name="iptPrecioOferta"
                disabled>


            </div>

            <!-- GESTION Y NRO DE BOLETA -->
            <div class="form-group">

              <div class="row">

                <div class="col-md-4">

                  <label for="iptNroSerie">Gestion</label>

                  <input type="text" min="0" name="iptEfectivo" id="iptGestion" class="form-control form-control-sm"
                    placeholder="<?php echo date("Y"); ?>" disabled>
                </div>

                <div class="col-md-8">

                  <label for="iptNumeroOferta">Nro Oferta</label>

                  <input type="text" min="0" name="iptNumeroOferta" id="iptNumeroOferta"
                    class="form-control form-control-sm" placeholder="Nro Oferta" disabled>

                </div>

              </div>

            </div>


            <!-- MOSTRAR MONTO TOTAL PRODUCTO -->
            <div class="row mt-2">

              <div class="col-12">
                <h6 class="">Total Productos: Bs. <span id="TotalProductos">0.00</span></h6>
              </div>


            </div>

            <!-- MOSTRAR EL TOTAL OFERTA Y TOTAL GENERAL -->
            <div class="row">
              <!--               <div class="col-md-7">
                <span>TOTAL OFERTA</span>
              </div>
              <div class="col-md-5 text-right">
                Bs. <span class="" id="total_oferta">0.00</span>
              </div> -->


              <div class="col-md-7">
                <span class="text-start fw-bold">Total Oferta</span>
              </div>
              <div class="col-md-5 text-right">
                Bs. <span class="text-start fw-bold" id="total_general">0.00</span>
              </div>
            </div>

          </div><!-- ./ CARD BODY -->

        </div><!-- ./ CARD -->
      </div>

      <!-- LISTADO DE PRODUCTOS DE OFERTA -->
      <div class="col-md-9">
        <div class="row">

          <!-- INPUT PARA INGRESO DEL CODIGO DE BARRAS O DESCRIPCION DEL PRODUCTO -->
          <div class="col-md-12 mb-3">
            <div class="form-group mb-2 ui-widget">

              <label class="col-form-label" for="iptCodigoProductoOferta">
                <i class="fas fa-barcode fs-6"></i>
                <span class="small">Productos</span>
              </label>

              <input type="text" class="form-control form-control-sm shadow" id="iptCodigoProductoOferta"
                placeholder="Ingrese el nombre del producto">
            </div>
          </div>

          <!-- ETIQUETA QUE MUESTRA LA SUMA TOTAL DE LOS PRODUCTOS AGREGADOS AL LISTADO -->
          <div class="col-md-6 mb-3">
            <h3>Total Oferta: Bs. <span id="totalOferta">0.00</span></h3>
          </div>

          <!-- BOTONES PARA VACIAR LISTADO Y COMPLETAR LA VENTA -->
          <div class="col-md-6 text-right">
            <button class="btn btn-success" id="btnIniciarRegistro">
              <i class="fas fa-book"></i> Realizar Registro
            </button>
            <button class="btn btn-danger" id="btnVaciarListado">
              <i class="far fa-trash-alt"></i> Vaciar Listado
            </button>
          </div>

          <!-- LISTADO QUE CONTIENE LOS PRODUCTOS QUE SE VAN AGREGANDO PARA LA COMPRA -->
          <div class="col-md-12">

            <table id="lstProductosOferta" class="display nowrap table-striped w-100 shadow ">
              <thead class="bg-blue text-left fs-6">
                <tr>
                  <th>Item</th>
                  <th>Codigo</th>
                  <th>Producto</th>
                  <th>Cantidad</th>
                  <th>P. Venta</th>
                  <th>Desc.%</th>
                  <th>SubTotal</th>
                  <th class="text-center">Acciones</th>
                  <th class="text-center">Precios</th>
                  <th>P. Feria</th>
                  <th>P. Oferta</th>
                  <th>SubTot.Prod.</th>
                </tr>
              </thead>
              <tbody class="small text-left fs-6">
              </tbody>
            </table>
            <!-- / table -->
          </div>
          <!-- /.col -->

        </div>
      </div>


    </div>
  </div><!-- /.container-fluid -->
</div>
<!-- /.content -->

<script>
  let table;

  let items = [];

  window.itemProducto = 1

  var Toast = Swal.mixin({
    toast: true,
    position: 'top',
    showConfirmButton: false,
    timer: 3000
  });

  $(document).ready(function() {

    CargarNroOferta();

    //MOSTRANDO DATOS DE PROVEEDORES
    $.post("ajax/busca_proveedor.php", function(data) {
      $("#selProveedor").html(data);
    });

    //MOSTRANDO DATOS DE CATEGORIAS
    $.post("ajax/busca_categoria.php", function(data) {
      $("#selCategorias").html(data);
    });

    //EVENTO PARA VACIAR EL LISTADO DE PRODUCTOS SELECCIONADOS

    $("#btnVaciarListado").on('click', function() {
      vaciarListado();
    })

    /* ======================================================================================
    INICIALIZAR LA TABLA DE PRODUCTOS
    ======================================================================================*/
    table = $('#lstProductosOferta').DataTable({
      "columns": [{
          "data": "producto_id"
        },
        {
          "data": "codigo_producto"
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
          "data": "subtotal"
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
        },
        {
          'data': "subtotalproductos"
        }
      ],
      columnDefs: [{
          targets: 0,
          visible: false
        },
        {
          targets: 9,
          visible: false
        },
        {
          targets: 10,
          visible: false
        },
        {
          targets: 11,
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
      TRAER LISTADO DE PRODUCTOS PARA INPUT DE AUTOCOMPLETAR PARA OFERTAS
      ======================================================================================*/
    $.ajax({
      async: false,
      url: "ajax/productosOfertas.ajax.php",
      method: "POST",
      data: {
        'accion': 1
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

        $("#iptCodigoProductoOferta").autocomplete({

          source: items,
          select: function(event, ui) {

            //console.log(ui.item.value)

            CargarProductosOfertas(ui.item.value);

            // $("#iptCodigoVenta").val("");

            // $("#iptCodigoVenta").focus();

            return false;
          }
        })
      }
    });

    //EVENTO PARA ELIMINAR UN PRODUCTO DE LA LISTA DE LA OFERTA
    $('#lstProductosOferta').on('click', '.btnEliminarproductoOferta', function() {

      table.row($(this).parents('tr')).remove().draw();

      recalcularTotales();

    });

    /* ======================================================================================
    EVENTO PARA MODIFICAR LA CANTIDAD DE PRODUCTOS A COMPRAR
    ======================================================================================*/
    $('#lstProductosOferta tbody').on('change', '.iptCantidad', function() {

      var data = table.row($(this).parents('tr')).data();

      cantidad_actual = $(this)[0]['value'];
      cod_producto_actual = $(this)[0]['attributes'][2]['value'];

      // console.log("cantidad", $(this)[0]['value'])
      // console.log("codigo Producto", $(this)[0]['attributes'][2]['value'])

      if (!$.isNumeric($(this)[0]['value']) || $(this)[0]['value'] <= 0) {

        mensajeToast('error', 'INGRESE UN VALOR NUMERICO Y MAYOR A 0');

        $(this)[0]['value'] = "1";

        $("#iptCodigoProductoOferta").val("");
        $("#iptCodigoProductoOferta").focus();
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
            url: "ajax/productosOfertas.ajax.php",
            method: "POST",
            data: {
              'accion': 3,
              'codigo_producto': cod_producto_actual,
              'cantidad_a_comprar': cantidad_actual
            },
            dataType: 'json',
            success: function(respuesta) {

              if (parseInt(respuesta['existe']) == 0) {

                mensajeToast('error', ' El producto ' + data['descripcion_producto'] +
                  ' ya no tiene stock');

                table.cell(index, 3).data(
                  '<input type="text" style="width:40px;font-size:12px;" codigoProducto = "' +
                  cod_producto_actual +
                  '" class="form-control text-center iptCantidad m-0 p-0" value="1">').draw();

                $("#iptCodigoVenta").val("");
                $("#iptCodigoVenta").focus();

                // ACTUALIZAR EL NUEVO PRECIO DEL ITEM DEL LISTADO DE VENTA
                NuevoPrecio = (parseFloat(1) * data['precio_venta'].replaceAll("Bs. ", "")).toFixed(2);
                NuevoPrecio = "Bs. " + NuevoPrecio;
                table.cell(index, 6).data(NuevoPrecio).draw();

                // RECALCULAMOS TOTALES
                recalcularTotales();

              } else {

                // AUMENTAR EN 1 EL VALOR DE LA CANTIDAD
                table.cell(index, 3).data(
                  '<input type="text" style="margin: auto;width:40px;height:25px;font-size:12px;" codigoProducto = "' +
                  cod_producto_actual +
                  '" class="form-control text-center iptCantidad p-0" value="' + cantidad_actual +
                  '">').draw();


                // ACTUALIZAR EL NUEVO PRECIO DEL ITEM DEL LISTADO DE VENTA
                //NuevoPrecio = (parseFloat(cantidad_actual) * data['precio_venta'].replaceAll("Bs. ", "")).toFixed(2);
                NuevoPrecio = ((data['precio_venta'].replaceAll("Bs. ", "") - (data['precio_venta']
                  .replaceAll(
                    "Bs. ", "") * desc_act) / 100) * parseFloat(cantidad_actual)).toFixed(2);
                NuevoPrecio = "Bs. " + NuevoPrecio;
                //console.log('cantidad' + NuevoPrecio)
                table.cell(index, 6).data(NuevoPrecio).draw();

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
    $('#lstProductosOferta tbody').on('change', '.iptDescuento', function() {

      var data = table.row($(this).parents('tr')).data();

      descuento_actual = $(this)[0]['value'];
      cod_producto_actual = $(this)[0]['attributes'][2]['value'];

      //alert('descuento....' + descuento_actual + cod_producto_actual + cod)

      if (!$.isNumeric($(this)[0]['value']) || $(this)[0]['value'] <= 0) {

        mensajeToast('error', 'INGRESE UN VALOR NUMERICO Y MAYOR A 0');

        $(this)[0]['value'] = "0";

        $("#iptCodigoProductoOferta").val("");
        $("#iptCodigoProductoOferta").focus();
        return;
      }

      table.rows().eq(0).each(function(index) {

        var row = table.row(index);

        var data = row.data();

        var cant_act = $('.iptCantidad').val();

        // console.log(cantidad2)

        if (data['codigo_producto'] == cod_producto_actual) {
          //     AUMENTAR EL VALOR DEL DESCUENTO
          table.cell(index, 5).data(
            '<input type="text" style="margin: auto;width:40px;height:25px;font-size:12px;" codigoProducto = "' +
            cod_producto_actual +
            '" class="form-control text-center iptDescuento p-0" value="' + descuento_actual +
            '">').draw();


          //     ACTUALIZAR EL NUEVO PRECIO DEL ITEM DEL LISTADO DE VENTA
          NuevoPrecio = ((data['precio_venta'].replaceAll("Bs. ", "") - (data['precio_venta'].replaceAll(
            "Bs. ", "") * parseFloat(descuento_actual)) / 100) * cant_act).toFixed(2);

          NuevoPrecio2 = ((data['precio_venta'].replaceAll("Bs. ", "") - (data['precio_venta'].replaceAll(
            "Bs. ", "") * parseFloat(descuento_actual)) / 100) * 1).toFixed(2);

          NuevoPrecio = "Bs. " + NuevoPrecio;
          //     console.log("descuento..." + NuevoPrecio)
          table.cell(index, 6).data(NuevoPrecio).draw();
          table.cell(index, 11).data(NuevoPrecio2).draw();

          //     RECALCULAMOS TOTALES
          recalcularTotales();
        }
      })
    });

    /* ======================================================================================
      EVENTO PARA   MODIFICAR EL PRECIO DE VENTA
      ====================================================================================== */
    $('#lstProductosOferta tbody').on('change', '#selTipoPrecio', function() {

      const opcionSeleccionada = $(this).find('option:selected');
      const opcionCodigo = opcionSeleccionada.data('codigo');
      //const opcionPrecio = opcionSeleccionada.data('precio'); // Usar data-attributes
      const opcionPrecio = parseFloat(opcionSeleccionada.data('precio').replaceAll("Bs. ", "")).toFixed(
        2); // Usar data-attributes
      //alert(opcionCodigo + opcionPrecio)
      // const nuevoPrecio = calcularPrecio(codigoDescuento, precioOriginal);

      recalcularMontos(opcionCodigo, opcionPrecio);
    });

    /* ======================================================================================
    EVENTO PARA INICIAR EL REGISTRO DE LA VENTA
    ====================================================================================== */
    $("#btnIniciarRegistro").on('click', function() {
      realizarVenta();
    })


  }); //FIN READY

  function recalcularMontos(opcionCodigo, opcionPrecio) {

    table.rows().eq(0).each(function(index) {

      var row = table.row(index);

      var data = row.data();


      if (data['codigo_producto'] == opcionCodigo) {


        table.cell(index, 4).data("Bs. " + parseFloat(opcionPrecio).toFixed(2)).draw();

        cantidad_actual = parseFloat($.parseHTML(data['cantidad'])[0]['value']);

        descuento_actual = parseFloat($.parseHTML(data['descuento'])[0]['value']);

        //nuevoPrecio = (parseFloat(cantidad_actual) * data['precio_venta'].replace("Bs. ", "")).toFixed(2);

        nuevoPrecio = ((data['precio_venta'].replaceAll("Bs. ", "") - (data['precio_venta'].replaceAll(
          "Bs. ", "") * parseFloat(descuento_actual)) / 100) * cantidad_actual).toFixed(2);

        nuevoPrecio2 = ((data['precio_venta'].replaceAll("Bs. ", "") - (data['precio_venta'].replaceAll(
          "Bs. ", "") * parseFloat(descuento_actual)) / 100) * 1).toFixed(2);

        nuevoPrecio = "Bs. " + nuevoPrecio;

        table.cell(index, 6).data(nuevoPrecio).draw();
        table.cell(index, 11).data(nuevoPrecio2).draw();
      }
    });

    recalcularTotales();
  }

  /*===================================================================*/
  //FUNCION PARA CARGAR EL NRO DE BOLETA
  /*===================================================================*/
  function CargarNroOferta() {

    $.ajax({
      async: false,
      url: "ajax/ofertas.ajax.php",
      method: "POST",
      data: {
        'accion': 1
      },
      dataType: 'json',
      success: function(respuesta) {

        gestion_oferta = respuesta["gestion_oferta"];
        nro_ofertas = respuesta["nro_ofertas"];

        //$("#iptNroSerie").val(serie_boleta);
        $("#iptNumeroOferta").val(nro_ofertas);
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
    $("#totalOferta").html("0.00");
    $("#totalOfertaRegistrar").html("0.00");
    $("#total_general").html("0.00");
    $("#TotalProductos").html("0.00");
    $("#iptPrecioOferta").val("");

    $("#iptFechaInicioOferta").val("");
    $("#iptFechaFinOferta").val("");
    $("#selProveedor").val(0);
    $("#selCategorias").val(0);
    $("#iptCodigoOferta").val("");

    $("#iptDescripcion").val("");
    $("#iptCantidadOferta").val("");
    $("#iptUnidadMedida").val("");

  } /* FIN LimpiarInputs */

  /*FUNCION PARA RECALCULAR TOTALES PRODUCTOS - TOTAL OFERTA*/
  function recalcularTotales() {

    var TotalOferta = 0.00; //calculo de la cantidad necesitada y el precio, descuento

    let TotalOfertaProductos = 0.00; //calculo de la cantidad inicial y el precio, descuento

    table.rows().eq(0).each(function(index) {
      var row = table.row(index);

      var data = row.data();

      TotalOferta = parseFloat(TotalOferta) + parseFloat(data['subtotal'].replace("Bs. ", ""));

      TotalOfertaProductos = parseFloat(TotalOfertaProductos) + parseFloat(data['subtotalproductos'].replace("Bs. ",
        ""));

    });

    $("#totalOferta").html("");
    $("#totalOferta").html(TotalOferta.toFixed(2));

    $("#iptCodigoProductoOferta").val("");

    var igv = parseFloat(TotalOferta) * 0.18;
    var subtotal = parseFloat(TotalOferta) - parseFloat(igv);

    $("#TotalProductos").html(parseFloat(TotalOfertaProductos).toFixed(2));
    $("#iptPrecioOferta").val(parseFloat(TotalOfertaProductos).toFixed(2));


    $("#totalOfertaRegistrar").html(TotalOferta.toFixed(2));
    $("#total_general").html(TotalOferta.toFixed(2));

    //limpiamos el input de efectivo exacto; desmarcamos el check de efectivo exacto
    //borramos los datos de efectivo entregado y vuelto


    $("#iptCodigoProductoOferta").val("");
    $("#iptCodigoProductoOferta").focus();
  }




  //FUNCION PARA CARGAR PRODUCTOS EN EL DATATABLE DE OFERTAS
  function CargarProductosOfertas(producto = "") {

    if (producto != "") {
      var codigo_producto = producto;

    } else {
      var codigo_producto = $("#iptCodigoProductoOferta").val();
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
          url: "ajax/productosOfertas.ajax.php",
          method: "POST",
          data: {
            'accion': 3,
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

              $("#iptCodigoProductoOferta").val("");
              $("#iptCodigoProductoOferta").focus();


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

              $("#iptCodigoProductoOferta").val("");
              $("#iptCodigoProductoOferta").focus();
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
      url: "ajax/productosOfertas.ajax.php",
      method: "POST",
      data: {
        'accion': 2, //BUSCAR PRODUCTOS POR SU CODIGO DE BARRAS
        'codigo_producto': codigo_producto
      },
      dataType: 'json',
      success: function(respuesta) {

        /*===================================================================
        SI LA RESPUESTA ES VERDADERO, TRAE ALGUN DATO
        ===================================================================*/

        if (respuesta) {

          var TotalOferta = 0.00;

          table.row.add({
            'producto_id': itemProducto,
            'codigo_producto': respuesta['codigo_producto'],
            'nombre_p': respuesta['nombre_p'],
            'cantidad': '<input type="text" style="margin: auto;width:40px; height:25px;font-size:12px;" codigoProducto = "' +
              respuesta[
                'codigo_producto'] + '" class="form-control text-center iptCantidad " value="1">',
            'precio_venta': respuesta['precio_venta'],
            'descuento': '<input type="text" style="margin: auto; width:55px; height:25px;font-size:12px;" codigoProducto = "' +
              respuesta[
                'codigo_producto'] + '" class="form-control text-center iptDescuento " value="' + respuesta[
                'descuento'] + '">',
            'subtotal': respuesta['subtotal'],
            'acciones': "<center>" +
              "<span class='btnEliminarproductoOferta text-danger px-1'style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='Eliminar producto'> " +
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
            'precio_oferta': respuesta['precio_oferta'],
            'subtotalproductos': respuesta['subtotalproductos']
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

          $("#iptCodigoProductoOferta").val("");
          $("#iptCodigoProductoOferta").focus();

        }

      }
    });

  } /* FIN CargarProductos */

  function realizarVenta() {

    var count = 0;
    //totales de ofertas, productos
    var totalOfertaRegistrar = $("#totalOfertaRegistrar").html();
    var nro_boleta = $("#iptNumeroOferta").val();

    //datos formulario
    var fechaInicio = $("#iptFechaInicioOferta").val();
    var fechaFinal = $("#iptFechaFinOferta").val();
    var proveedor = $("#selProveedor").val();
    var categoria = $("#selCategorias").val();
    var codigoOferta = $("#iptCodigoOferta").val();

    var descProducto = $("#iptDescripcion").val();
    var cantOferta = $("#iptCantidadOferta").val();
    var unidadMedida = $("#iptUnidadMedida").val();
    var precioOfertaUnidad = $("#iptPrecioOferta").val();

    table.rows().eq(0).each(function(index) {
      count = count + 1;
    });

    if (count > 0) {

      if ($("#iptPrecioOferta").val() > 0 && $("#iptPrecioOferta").val() != "") {

        if ($("#iptPrecioOferta").val() == 0 || $("#iptPrecioOferta").val() == "") {

          Toast.fire({
            icon: 'warning',
            title: 'No existe productos seleccionados'
          });

          return false;
        }

        var formData = new FormData();
        var arr = [];

        table.rows().eq(0).each(function(index) {

          var row = table.row(index);

          var data = row.data();

          var cantidad_fila = parseFloat($.parseHTML(data['cantidad'])[0]['value']);

          arr[index] = data['codigo_producto'] + "," + parseFloat(cantidad_fila) + "," + data['subtotalproductos'].replace(
            "Bs. ", "") + "," + data['producto_id'];

          formData.append('arr[]', arr[index]);

        });

        formData.append('fecha_inicio', fechaInicio);
        formData.append('fecha_fin', fechaFinal);
        formData.append('codigo_oferta', codigoOferta);
        formData.append('descripcion', descProducto);
        formData.append('cantidad_oferta', parseFloat(cantOferta));
        formData.append('unidad_medida', unidadMedida);
        formData.append('precio_venta_oferta', parseFloat(precioOfertaUnidad));
        formData.append('id_categoria', categoria);
        formData.append('id_proveedor', proveedor);
        formData.append('nro_oferta', nro_boleta);
        formData.append('total_oferta', parseFloat(totalOfertaRegistrar));

        $.ajax({
          url: "ajax/ofertas.ajax.php",
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

            table.clear().draw();

            LimpiarInputs();

            CargarNroOferta();

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

    $("#iptCodigoProductoOferta").focus();

  } /* FIN realizarVenta */
</script>