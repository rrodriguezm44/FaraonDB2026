<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Reportes / Inventario Fisico Productos</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Inicio</a></li>
          <li class="breadcrumb-item active">Inventarios</li>
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
            Seleccion de Datos
          </h5>

          <div class="card-body p-2">

            <!-- SELECCIONAR REPORTE O INVENTARIO -->
            <div class="form-group mb-2">

              <label class="col-form-label" for="selTipo">
                <i class="fas fa-check fs-6"></i>
                <span class="small">Reporte/Inventario</span>
              </label>

              <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="selTipo"
                name="selTipo" style="display: block;">
                <option value="0">---- Seleccione Tipo ----</option>
                <option value="1">Reporte</option>
                <option value="2">Inventario</option>
              </select>

              <span id="validate_Proveedor" class="text-danger small fst-italic" style="display:none">
                Debe Elegir Tipo
              </span>

            </div>
            <br>
            <hr style="border: 1px solid #ffffff;">
            <!-- SELECCIONAR FECHA DE INICIO OFERTA -->
            <div class="form-group mb-2">

              <label class="col-form-label" for="iptFechaDesde">
                <i class="fas fa-calendar fs-6"></i>
                <span class="small">Fecha Desde</span><span class="text-danger">*</span>
              </label>

              <input type="date" class="form-control form-control-sm" id="iptFechaDesde"
                name="iptFechaDesde" placeholder="Ingrese Fecha Inicio">


            </div>

            <!-- SELECCIONAR FECHA FINAL OFERTA -->
            <div class="form-group mb-2">

              <label class="col-form-label" for="iptFechaHasta">
                <i class="fas fa-calendar fs-6"></i>
                <span class="small">Fecha Hasta</span><span class="text-danger">*</span>
              </label>

              <input type="date" class="form-control form-control-sm" id="iptFechaHasta" name="iptFechaHasta"
                placeholder="Ingrese Fecha FinOferta">


            </div>
            <br>
            <hr style="border: 1px solid #ffffff;">

            <!-- SELECCIONAR PRODUCTO -->
            <div class="form-group mb-2" id="divSelProducto">

              <label class="col-form-label" for="selProducto">
                <i class="fas fa-dolly fs-6"></i>
                <span class="small">Producto</span><span class="text-danger">*</span>
              </label>

              <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="selProducto"
                name="selProducto" style="display: block;">
                <option value="0"> ---Producto--- </option>
              </select>

              <span id="validate_Proveedor" class="text-danger small fst-italic" style="display:none">
                Debe Ingresar Producto
              </span>

            </div>

            <!-- SELECCIONAR TIPO DE DESPLIEGUE -->
            <div class="form-group mb-2" id="divSelTipoInventario">

              <label class="col-form-label" for="selTipoInventario">
                <i class="fas fa-map fs-6"></i>
                <span class="small">Tipo</span><span class="text-danger">*</span>
              </label>

              <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="selTipoInventario"
                name="selTipoInventario" style="display: block;">
                <option value="0">---- Seleccione Tipo ----</option>
                    <option value="1">Inventario Inicial</option>
                    <option value="2">Salidas (Ventas)</option>
                    <option value="3">Entradas (Compras)</option>
              </select>

              <span id="validate_Proveedor" class="text-danger small fst-italic" style="display:none">
                Debe Elegir Tipo
              </span>

            </div>
            <br>
            <br>
            <button class="btn btn-danger" id="btnVaciarListado">
              <i class="far fa-trash-alt"></i> Limpiar Pantalla
            </button>

          </div><!-- ./ CARD BODY -->

        </div><!-- ./ CARD -->
      </div>

      <!-- LISTADO DE PRODUCTOS DE REPORTES / INVENTARIO -->
      <div class="col-md-9">
        <div class="row">

          <!-- ETIQUETA QUE MUESTRA LA SUMA TOTAL DE LOS PRODUCTOS AGREGADOS AL LISTADO -->
          <div class="col-md-4 mb-3">
            <h3 id="nProducto" style="display: none;"></h3>
            <span style="font-size: medium; color: white; display:none" id="nomProducto">__________________</span>
          </div>

          <!-- BOTONES PARA VACIAR LISTADO Y COMPLETAR LA VENTA -->
          <div class="col-md-8 text-right">
            <button class="btn btn-success" id="btnReporteVentas">
              <i class="fas fa-print"></i> Mostrar Reporte
            </button>
            <button class="btn btn-primary" id="btnMostrarInventario">
              <i class="fas fa-list-alt"></i> Mostrar Inventario
            </button>
            
          </div>
          <br>
          <br>
          <!--=====================================
          LA TABLA DE REPORTES GENERALES POR PRODUCTO
          ======================================-->

          <div class="col-lm-12 reportesGeneralesProductos" style="display: none;">

            <div class="card card-info card-outline shadow">
              <div class="card-header">
                <!-- <h3 class="card-title"><i class="fas fa-list"></i> Reporte de Ventas por Producto | <?php echo date("Y"); ?></h3> -->
                <br>
                <h3 style="font-size: medium;">Periodo | <span id="fdp"></span> - <span id="fhp"></span> |</h3>
                <input type="hidden" name="idProductoR" id="idProductoR" value="">
              </div>
              <div class="card-body">
                <table id="lstCategorias" class="display nowrap table-striped w-100 shadow rounded">
                  <thead class="bg-info text-left">
                    <th style="text-align: center;">N°Boleta</th>
                    <th style="text-align: center;">Fecha de Venta</th>
                    <th style="text-align: left;">Cliente</th>
                    <th style="text-align: left;">Vendedor</th>
                    <th style="text-align: center;">Cant.</th>
                    <th style="text-align: center;">Precio</th>
                    <th style="text-align: right;">Tot. Vent.</th>
                  </thead>

                  <tbody class="small text left" id="detalleReportesGeneralesProducto"></tbody>
                </table>
              </div>
            </div>

          </div>

          <!--=====================================
          LA TABLA DE INVENTARIOS POR PRODUCTO
          ======================================-->

          <div class="col-lm-12 inventarioProductos" style="display: none;">

            <div class="card card-info card-outline shadow">
              <div class="card-header">
                <!-- <h3 class="card-title"><i class="fas fa-list"></i> Inventario por Producto | <?php echo date("Y"); ?></h3> -->
                <br>
                <h3 style="font-size:smaller;">Periodo | <span id="fdip"></span> - <span id="fhip"></span> |</h3>
                <input type="hidden" name="idProductoR" id="idProductoR" value="">
              </div>
              <div class="card-body">
                <table id="lstCategorias" class="display nowrap table-striped w-100 shadow rounded">
                  <thead class="bg-info text-left">
                    <th style="text-align: center;">N°</th>
                    <th style="text-align: center;">Codigo</th>
                    <th style="text-align: center;">Producto</th>
                    <th style="text-align: left;">Fecha Registro</th>
                    <th style="text-align: center;">Cantidad</th>
                  </thead>

                  <tbody class="small text left" id="detalleInventarios"></tbody>
                </table>
              </div>
            </div>

          </div>

        </div>
      </div>


    </div>
  </div><!-- /.container-fluid -->
</div>
<!-- /.content -->

<script>
  var Toast = Swal.mixin({
    toast: true,
    position: 'top',
    showConfirmButton: false,
    timer: 3000
  });

  $(document).ready(function() {

    //ocultando botones y divs
    $("#btnReporteVentas").attr('style', 'display:none;');
    $("#btnMostrarInventario").attr('style', 'display:none;');
    $("#divSelProducto").attr('style', 'display:none;');
    $("#divSelTipoInventario").attr('style', 'display:none;');

    //MOSTRANDO DATOS DE PRODUCTOS
    $.post("ajax/busca_productos.php", function(data) {
      $("#selProducto").html(data);
    });

    // $('#selProducto').select2({
    //   placeholder: {
    //     id: '0', // the value of the option
    //     text: 'Seleccionar Producto'
    //   }
    // });

    
    //EVENTO PARA VACIAR EL LISTADO DE PRODUCTOS SELECCIONADOS
    $("#btnVaciarListado").on('click', function() {
      vaciarListado();
    })

    //ELEGIENDO UNA OPCION DEL SELECT
    $("#selTipo").on('change', function() {
      var opcion = $(this).val();
      
      if (opcion == 1) {

        $("#btnReporteVentas").attr('style', 'display:block;');
        $("#btnMostrarInventario").attr('style', 'display:none;');
        $("#divSelProducto").attr('style', 'display:block;');
        $("#divSelTipoInventario").attr('style', 'display:none;');

      } else if (opcion == 2) {

        $("#btnReporteVentas").attr('style', 'display:none;');
        $("#btnMostrarInventario").attr('style', 'display:block;');
        $("#divSelProducto").attr('style', 'display:none;');
        $("#divSelTipoInventario").attr('style', 'display:block;');
      } else {

        $("#btnReporteVentas").attr('style', 'display:none;');
        $("#btnMostrarInventario").attr('style', 'display:none;');
        $("#divSelProducto").attr('style', 'display:none;');
        $("#divSelTipoInventario").attr('style', 'display:none;');
      }
    })

    /* ======================================================================================
    EVENTO PARA MOSTRAR REPORTE DE VENTAS - FECHAS
    ====================================================================================== */
    $("#btnReporteVentas").on('click', function() {
      var fdesde = $('#iptFechaDesde').val();
      var fhasta = $('#iptFechaHasta').val();
      var codproducto = $('#selProducto').val();

      //alert(fdesde + ' - ' + fhasta + ' - ' + producto);
      reporteGeneralVentas(fdesde,fhasta,codproducto);
     
    })

    /* ======================================================================================
    EVENTO PARA MOSTRAR INVENTARIO - FECHAS
    ====================================================================================== */
    $("#btnMostrarInventario").on('click', function() {
      var fdesde = $('#iptFechaDesde').val();
      var fhasta = $('#iptFechaHasta').val();
      var tipo = $('#selTipoInventario').val();

      //alert(fdesde + ' - ' + fhasta + ' - ' + tipo);
      inventarioProductos(fdesde,fhasta,tipo);
      //console.log("mostrando inventario");
    })

  }); //FIN READY

  //FUNCION PARTA LIMPIAR TOTALMENTE EL LISTA DE PRODUCTOS ELEGIDOS
  function vaciarListado() {
    LimpiarInputs();
  }

  /*===================================================================*/
  //FUNCION PARA LIMPIAR LOS INPUTS DE LA BOLETA Y LABELS QUE TIENEN DATOS
  /*===================================================================*/
  function LimpiarInputs() {

    $("#iptFechaDesde").val("");
    $("#iptFechaHasta").val("");

    $('#selProducto').val('0').trigger('change');
    $('#selTipoInventario').val('0').trigger('change');
    $('#selTipo').val('0').trigger('change');

    $('.reportesGeneralesProductos').attr('style', 'display:none;');
    $('.inventarioProductos').attr('style', 'display:none;');
    $('#nProducto').attr('style', 'display:none;');
    $('#nomProducto').attr('style', 'display:none;');

  } /* FIN LimpiarInputs */

  /*FUNCION REPORTE DE VENTAS POR PRODUCTO*/
  function reporteGeneralVentas(fdesde,fhasta,codproducto){
    fd = fdesde;
    fh = fhasta;
    cp = codproducto;
    
    // Validar que las 3 variables no estén vacías o nulas
    if (!fd || fd.trim() === '') {
      Toast.fire({
        icon: 'warning',
        title: 'Debe ingresar la fecha desde'
      });
      return;
    }
    
    if (!fh || fh.trim() === '') {
      Toast.fire({
        icon: 'warning',
        title: 'Debe ingresar la fecha hasta'
      });
      return;
    }
    
    if (!cp || cp === '0') {
      Toast.fire({
        icon: 'warning',
        title: 'Debe seleccionar un producto'
      });
      return;
    }
    
    $('.reportesGeneralesProductos').attr('style', 'display:block;');
    $('.inventarioProductos').attr('style', 'display:none;');
    $.post("ajax/busca_unproducto.php", { idP:cp }, function(data){
      $("#nProducto").attr('style', 'display:block;');
      $("#nomProducto").attr('style', 'display:block;');
      document.getElementById('fdp').innerHTML = fd;
      document.getElementById('fhp').innerHTML = fh;
      document.getElementById('nProducto').innerHTML = 'Reporte del Producto:';
      $("#nomProducto").html(data);
        //console.log(data)
    });
    

    $.post("ajax/reporte_ventas_generales_producto.php", { fdesde:fd,fhasta:fh, idPr:cp }, function(data){

      $("#detalleReportesGeneralesProducto").html(data);

    });
  }

  /*FUNCION INVENTARIO POR PRODUCTO*/
  function inventarioProductos(fdesde,fhasta,tipo){
    fd = fdesde;
    fh = fhasta;
    tp = tipo;
    
    // Validar que las 3 variables no estén vacías o nulas
    if (!fd || fd.trim() === '') {
      Toast.fire({
        icon: 'warning',
        title: 'Debe ingresar la fecha desde'
      });
      return;
    }
    
    if (!fh || fh.trim() === '') {
      Toast.fire({
        icon: 'warning',
        title: 'Debe ingresar la fecha hasta'
      });
      return;
    }
    
    if (!tp || tp === '0') {
      Toast.fire({
        icon: 'warning',
        title: 'Debe seleccionar un tipo de inventario'
      });
      return;
    }
    
    $('.inventarioProductos').attr('style', 'display:block;');
    $('.reportesGeneralesProductos').attr('style', 'display:none;');
    document.getElementById('nProducto').innerHTML = 'Inventario General';
    document.getElementById('fdip').innerHTML = fd;
    document.getElementById('fhip').innerHTML = fh;

    $.post("ajax/inventario_productos.php", { fdesde:fd,fhasta:fh, tipo:tp }, function(data){
      $("#detalleInventarios").html(data);
    });

  }

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


</script>