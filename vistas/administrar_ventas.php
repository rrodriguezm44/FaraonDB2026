<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Administrar Ventas</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Inicio</a></li>
          <li class="breadcrumb-item active">Administrar Ventas</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
  <div class="container-fluid">
    <div class="content pb-2">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Criterios de Busqueda</h3>
                <div class="card-tools"><button class="btn btn-tool" type="button" data-card-widget="collapse"><i
                      class="fas fa-minus"></i></button></div>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="">Ventas desde:</label>
                      <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text"><i
                              class="far fa-calendar-alt"></i></span></div>
                        <input type="text" class="form-control" data-inputmask-alias="datetime"
                          data-inputmask-inputformat="dd/mm/yyyy" id="ventas_desde">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="">Ventas hasta:</label>
                      <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text"><i
                              class="far fa-calendar-alt"></i></span></div>
                        <input type="text" class="form-control" data-inputmask-alias="datetime"
                          data-inputmask-inputformat="dd/mm/yyyy" id="ventas_hasta">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-8 d-flex flex-row align-items-center justify-content-end">
                    <div class="form-group m-0"><a href="#" class="btn btn-primary" style="width:120px;"
                        id="btnFiltrar">Buscar</a></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-md-12">
            <h4>Total venta: Bs. <span id="totalVenta">0.00</span></h4>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <table class="display nowrap table-striped w-100 shadow" id="lstVentas">
              <thead class="bg-dark">
                <tr>
                  <th>Nro Boleta</th>
                  <th>Codigo Producto</th>
                  <th>Categoria</th>
                  <th>Producto</th>
                  <th>Cantidad</th>
                  <th>Total Venta</th>
                  <th>Fecha Venta</th>
                  <th>Cliente</th>
                </tr>
              </thead>
              <tbody class="small"></tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</div>
<!-- /.content -->


<!-- Modal editar ventas-->
<div class="modal fade" id="modalEditarVenta" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title fw-bold fs-5">Editar Venta <span id="nro_Titventa"></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="btnCerrarModal">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form id="frm-datos-venta" class="needs-validation" novalidate>
          <div class="row">

            <!-- CLIENTES -->
            <div class="col-12 col-sm-6 col-md-3">

              <div class="form-floating mb-2">

                <select class="form-select select2 fs-sm" id="selCliente" aria-label="Floating label select example" name="selCliente" required>
                </select>
                <label for="selCliente" class="fs-sm">Clientes</label>
                <div class="invalid-feedback">Seleccione al Cliente</div>

              </div>

            </div>

            <!-- SELECCIONAR VENDEDOR -->
            <div class="col-12 col-sm-6 col-md-3">
              <div class="form-floating mb-2">
                <select class="form-select select2 fs-sm" aria-label="Floating label select example" id="selVendedor"
                  name="selVendedor" required>
                  <option value="0">---Vendedores---</option>
                </select>

                <label for="selVendedor" class="fs-sm">Seleccionar Vendedor</label>
                <div class="invalid-feedback">Seleccione al Vendedor</div>

              </div>

            </div>

            <!-- SELECCIONAR TIPO DE DOCUMENTO -->
            <div class="col-12 col-sm-6 col-md-3">
              <div class="form-floating mb-2">

                <select class="form-select select2 fs-sm" aria-label="Floating label select example" id="selDocumentoVenta" name="selDocumentoVenta">
                  <option value="0" selected="true">Seleccione Documento</option>
                  <option value="1">Nota de Pago</option>
                  <option value="2">Factura</option>
                </select>
                <label for="selDocumentoVenta" class="fs-sm">Tipo de Documento</label>
                <div class="invalid-feedback">Seleccione Tipo de Documento</div>

              </div>
            </div>

            <!-- SELECCIONAR TIPO DE PAGO -->
            <div class="col-12 col-sm-6 col-md-3">
              <div class="form-floating mb-2">
                <select class="form-select select2 fs-sm" aria-label="Floating label select example" id="selTipoPago" name="selTipoPago">
                  <option value="0" selected="true">Seleccione Tipo Pago</option>
                  <option value="1">Contado</option>
                  <option value="2">Credito</option>
                  <option value="3">Transferencia</option>
                </select>
                <label for="selTipoPago" class="fs-sm">Tipo de Pago</label>
                <div class="invalid-feedback">Seleccione Tipo de Pago</div>

              </div>
            </div>

            <!-- FECHA DE ENTREGA -->
            <div class="col-12 col-sm-6 col-md-3">
              <div class="input-group mb-3">

                <div class="form-floating flex-grow-1">
                  <input type="text" class="form-control form-control-sm etimepicker-input fs-sm" id="iptFechaEntrega" name="iptFechaEntrega">
                  <label for="iptFechaEntrega" class="fs-sm"> Fecha Entrega</label>
                  <input type="hidden" name="codUsuario" id="codUsuario" value="<?php echo $usuarioID; ?>">
                </div>
                <span class="input-group-text my-bg">
                  <i class=" fas fa-calendar-alt text-white fs-5" data-toggle="datetimepicker"
                    data-target="#iptFechaEntrega"></i>
                </span>
              </div>
            </div>
            
            <!-- INPUT OBSERVACION -->
            <div class="col-12 col-sm-12 col-md-6">
              <div class="form-floating mb-2">
                <input type="text" class="form-control form-control-sm fs-sm" id="iptObservacion" name="iptObservacion"
                  placeholder="Ingrese Observacion Venta" onKeyUp="javascript:this.value=this.value.toUpperCase();">
                <label for="iptObservacion" class="fs-sm">Observaciones </label>
              </div>
            </div>

            <div class="col-12 col-sm-12 col-md-3">
              <div class="form-floating mb-2">
                <div class="form-group m-0"><a href="#" class="btn btn-success w-100 fs-sm"
                  id="btnGuardarModificacion">Guardar</a>
                </div>
              </div>
              <!-- <button type="button" class="btn btn-primary mb-3" id="btnAgregarNuevoProducto">
                <i class="fas fa-plus"></i> Agregar Producto
              </button> -->
            </div>
            
            <!-- <div class="col-md-8 d-flex flex-row align-items-center justify-content-end">
              <div class="form-group m-0"><a href="#" class="btn btn-success" style="width:120px;"
                  id="btnGuardarModificacion">Guardar</a></div>
            </div> -->
          </div>
        </form>
        <div class="table-responsive">
          <table id="tblDetalleVenta" class="table table-bordered table-striped w-100 small">
            <thead class="thead-light">
              <tr>
                <th class="text-center">Id</th>
                <th class="text-center">Boleta</th>
                <th class="text-center">Codigo</th>
                <th class="d-none d-md-table-cell text-center">Categoria</th>
                <th class="text-center">Producto</th>
                <th class="text-center">Cantidad</th>
                <th class="text-center">Precio</th>
                <th class="text-center">Desc.%</th>
                <th class="text-center">Total</th>
                <th class="text-center">Accion</th>
              </tr>
            </thead>
            <tbody id="resultv" class="small">
            </tbody>
          </table>
        </div>
        <div class="card-footer pb-0">
          <div class="d-flex justify-content-end">
            <h5 class="mb-0 fs-6">Total Venta Bs. <span id="spnTotalVenta">0.00</span></h5>
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btnCloseModal">Cerrar</button>
      </div>
    </div>
  </div>
</div>


<!-- <script src="//datatables.net/download/build/nightly/jquery.dataTables.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://markcell.github.io/jquery-tabledit/assets/js/tabledit.min.js"></script>
<!-- <script src="../vistas/assets/plugins/jquery-tabledit/jquery.tabledit.min.js"></script> -->

<style>
  .bg-light-green {
    background-color:rgb(100, 156, 113) !important; /* Verde más oscuro para mejor contraste */
    color: white !important;
    font-size: small;
  }
  
  /* Estilos para el modal de edición de ventas */
  #modalEditarVenta .modal-dialog {
    max-width: 95vw; /* Más responsive */
    margin: 1.75rem auto;
  }
  
  #modalEditarVenta .modal-content {
    font-size: 0.85rem; /* Tamaño de fuente más pequeño */
  }
  
  #modalEditarVenta .form-control,
  #modalEditarVenta .form-select {
    font-size: 0.8rem; /* Inputs más pequeños */
    padding: 0.25rem 0.5rem; /* Padding reducido */
  }
  
  #modalEditarVenta .form-label,
  #modalEditarVenta label {
    font-size: 0.75rem; /* Labels más pequeños */
  }
  
  #modalEditarVenta .btn {
    font-size: 0.8rem; /* Botones más pequeños */
    padding: 0.25rem 0.5rem;
  }
  
  #modalEditarVenta h5.modal-title {
    font-size: 1rem; /* Título más pequeño */
  }
  
  /* Tabla de productos */
  #tblDetalleVenta {
    font-size: 0.75rem; /* Tabla más compacta */
  }
  
  #tblDetalleVenta th,
  #tblDetalleVenta td {
    padding: 0.25rem 0.5rem; /* Padding reducido en celdas */
  }
  
  /* Select2 específico */
  #modalEditarVenta .select2-selection {
    font-size: 0.8rem !important;
    min-height: calc(1.5em + 0.5rem + 2px) !important;
  }
  
  #modalEditarVenta .select2-selection__rendered {
    line-height: 1.2 !important;
    padding: 0.25rem 0.5rem !important;
  }
</style>

<script>
  var Toast = Swal.mixin({
    toast: true,
    position: 'top',
    showConfirmButton: false,
    timer: 3000
  });

  $(document).ready(function() {

    let table, ventas_desde, ventas_hasta;
    let groupColumn = 0;

    // Cargar clientes en el select
    $.ajax({
      url: 'ajax/clientes.ajax.php',
      method: 'GET',
      dataType: 'json',
      success: function(clientes) {
        $("#selCliente").empty();
        $("#selCliente").append('<option value="0">---Seleccione Cliente---</option>');
        $.each(clientes, function(index, cliente) {
          $("#selCliente").append('<option value="' + cliente.id + '">' + cliente.nombre + '</option>');
        });
        $("#selCliente").select2();
      },
      error: function(xhr, status, error) {
        console.error('Error al cargar clientes:', error);
      }
    });

    // Cargar vendedores en el select
    $.ajax({
      url: 'ajax/vendedores.ajax.php',
      method: 'POST',
      data: {'accion': 'obtener_vendedores'},
      dataType: 'json',
      success: function(vendedores) {
        $("#selVendedor").empty();
        $("#selVendedor").append('<option value="0">---Seleccione Vendedor---</option>');
        $.each(vendedores, function(index, vendedor) {
          $("#selVendedor").append('<option value="' + vendedor.id_usuario + '">' + vendedor.nombre_usuario + '</option>');
        });
        $("#selVendedor").select2();
      },
      error: function(xhr, status, error) {
        console.error('Error al cargar vendedores:', error);
      }
    });

    $('#ventas_desde, #ventas_hasta').inputmask('dd/mm/yyyy', {
      'placeholder': 'dd/mm/yyyy'
    })

    $("#ventas_desde").val(moment().startOf('month').format('DD/MM/YYYY'));
    $("#ventas_hasta").val(moment().format('DD/MM/YYYY'));

    ventas_desde = $("#ventas_desde").val();
    ventas_hasta = $("#ventas_hasta").val();

    ventas_desde = ventas_desde.substr(6, 4) + '-' + ventas_desde.substr(3, 2) + '-' + ventas_desde.substr(0, 2);
    //console.log("🚀 ~ file: administrar_ventas.php ~ line 97 ~ $ ~ ventas_desde", ventas_desde)
    ventas_hasta = ventas_hasta.substr(6, 4) + '-' + ventas_hasta.substr(3, 2) + '-' + ventas_hasta.substr(0, 2);


    table = $('#lstVentas').DataTable({
      "columnDefs": [{
          visible: false,
          targets: groupColumn
        },
        {
          targets: 2,
          className: "text-center"
        },
        {
          targets: 4,
          className: "text-center"
        },
        {
          targets: 5,
          className: "text-right"
        },
        {
          targets: 6,
          className: "text-center"
        },
        {
          targets: [1, 2, 3, 4, 5],
          orderable: false
        }
      ],
      "order": [
        [6, 'desc']
      ],
      dom: 'Bfrtip',
      buttons: [
        'excel', 'print', 'pageLength',

      ],
      lengthMenu: [0, 5, 10, 15, 20, 50],
      "pageLength": 15,
      ajax: {
        url: 'ajax/ventas.ajax.php',
        type: 'POST',
        dataType: 'json',
        "dataSrc": function(respuesta) {
          //console.log(respuesta);
          var TotalVenta = 0.00;
          for (let i = 0; i < respuesta.length; i++) {
            TotalVenta = parseFloat(respuesta[i][5].replace('Bs. ', '')) + parseFloat(TotalVenta);
          }

          $("#totalVenta").html(TotalVenta.toFixed(2));
          return respuesta;
        },
        data: {
          'accion': 2,
          'fechaDesde': ventas_desde,
          'fechaHasta': ventas_hasta
        }
      },
      drawCallback: function(settings) {

        var api = this.api();
        var rows = api.rows({
          page: 'current'
        }).nodes();
        var last = null;

        api.column(groupColumn, {
          page: 'current'
        }).data().each(function(group, i) {

          if (last !== group) {

            const data = group.split("-");
            var nroBoleta = data[0];
            nroBoleta = nroBoleta.split(":")[1].trim();
            console.log("🚀 ~ file: administrar_ventas.php ~ line 134 ~ nroBoleta", nroBoleta)

            $(rows).eq(i).before(
              '<tr class="group">' +
              '<td colspan="7" class="fs-6 fw-bold fst-italic bg-success text-white"> ' +
              '  <i nroBoleta = ' + nroBoleta +
              ' class="fas fa-print fs-6 text-blue mx-2 btnImprimirVenta" style="cursor:pointer;" title="Imprimir Venta"> </i> <i nroBoleta = ' +
              nroBoleta +
              ' class="fas fa-edit fs-6 text-warning mx-2 btnEditarVenta" style="cursor:pointer;" title="Editar Venta"></i>' +
              group + '<i nroBoleta = ' + nroBoleta +
              ' class="fas fa-trash fs-6 text-danger mx-2 btnEliminarVenta" style="cursor:pointer;" title="Anular|Borrar Venta"></i> ' +
              '</td>' +
              '</tr>'
            );

            last = group;
          }
        });
      },
      language: {
        "sProcessing": "Procesando...",
        "sLengthMenu": "Mostrar _MENU_ registros",
        "sZeroRecords": "No se encontraron resultados",
        "sEmptyTable": "Ningún dato disponible en esta tabla",
        "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ Registros",
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

    //EVENTO QUE PERMITE IMPRIMIR LA NOTA DE VENTA
    $('#lstVentas tbody').on('click', '.btnImprimirVenta', function() {

      let nroBoleta = $(this).attr("nroBoleta");
      //alert('impresiones' + nroBoleta)
      $.post("ajax/busca_ventas_anuladas.php", {
        nroBoleta
      }, function(data) {
        if (data == 0) {
          Toast.fire({
            icon: 'warning',
            title: 'Venta anulada | Sin datos'
          });
        } else {
          //window.open("extensiones/fpdf/boleta_venta.php?codigo=" + nroBoleta);
          window.open("http://localhost/faraonbd//ajax/extensiones/fpdf/boleta_venta.php?codigo=" +
            nroBoleta);
          //window.open("https://faraonv2.infinitassoluciones.net//ajax/extensiones/fpdf/boleta_venta.php?codigo=" +nroBoleta);
        }
      })

    });

    //EVENTO PRA ELIMINAR UNA VENTA
    $('#lstVentas tbody').on('click', '.btnEliminarVenta', function() {
      let nroBoleta = $(this).attr("nroBoleta");

      $.ajax({
        url: "ajax/ventas.ajax.php",
        type: "POST",
        data: {
          accion: '3',
          Boleta: String(nroBoleta)
        },
        dataType: 'json',
        success: function(respuesta) {
          Swal.fire({
            position: 'center',
            icon: 'success',
            title: respuesta[0],
            showConfirmButton: false,
            timer: 1500
          })

          table.ajax.reload();
        }
      });
    })

    //EVETON PARA FILTRAR VENTAS SEGUN RANGO DE FECHAS

    $("#btnFiltrar").on('click', function() {

      table.destroy();

      if ($("#ventas_desde").val() == '') {
        ventas_desde = '01/01/2025';

      } else {
        ventas_desde = $("#ventas_desde").val();

      }

      if ($("#ventas_hasta").val() == '') {
        ventas_hasta = '31/12/2025';

      } else {
        ventas_hasta = $("#ventas_hasta").val();

      }

      ventas_desde = ventas_desde.substr(6, 4) + '-' + ventas_desde.substr(3, 2) + '-' + ventas_desde.substr(0,
        2);
      //console.log("🚀 ~ file: administrar_ventas.php ~ line 97 ~ $ ~ ventas_desde", ventas_desde)
      ventas_hasta = ventas_hasta.substr(6, 4) + '-' + ventas_hasta.substr(3, 2) + '-' + ventas_hasta.substr(0,
        2);
      //console.log("🚀 ~ file: administrar_ventas.php ~ line 99 ~ $ ~ ventas_hasta", ventas_hasta)

      let groupColumn = 0;
      table = $('#lstVentas').DataTable({
        "columnDefs": [{
            visible: false,
            targets: groupColumn
          },
          {
            targets: [1, 2, 3, 4, 5],
            orderable: false
          }
        ],
        "order": [
          [6, 'desc']
        ],
        dom: 'Bfrtip',
        buttons: [
          'excel', 'print', 'pageLength',

        ],
        lengthMenu: [0, 5, 10, 15, 20, 50],
        "pageLength": 15,
        ajax: {
          url: 'ajax/ventas.ajax.php',
          type: 'POST',
          dataType: 'json',
          "dataSrc": function(respuesta) {
            //console.log(respuesta);
            var TotalVenta = 0.00;
            for (let i = 0; i < respuesta.length; i++) {
              TotalVenta = parseFloat(respuesta[i][5].replace('Bs. ', '')) + parseFloat(TotalVenta);
            }

            $("#totalVenta").html(TotalVenta.toFixed(2));
            return respuesta;
          },
          data: {
            'accion': 2,
            'fechaDesde': ventas_desde,
            'fechaHasta': ventas_hasta
          }
        },
        drawCallback: function(settings) {

          var api = this.api();
          var rows = api.rows({
            page: 'current'
          }).nodes();
          var last = null;

          api.column(groupColumn, {
            page: 'current'
          }).data().each(function(group, i) {

            if (last !== group) {

              const data = group.split("-");
              var nroBoleta = data[0];
              nroBoleta = nroBoleta.split(":")[1].trim();
              console.log("🚀 ~ file: administrar_ventas.php ~ line 134 ~ nroBoleta", nroBoleta)

              $(rows).eq(i).before(
                '<tr class="group">' +
                '<td colspan="6" class="fs-6 fw-bold fst-italic bg-success text-white"> ' +
                '  <i nroBoleta = ' + nroBoleta +
                ' class="fas fa-trash fs-6 text-danger mx-2 btnEliminarVenta" style="cursor:pointer;" title="Anular|Borrar Venta"></i> <i nroBoleta = ' +
                nroBoleta +
                ' class="fas fa-edit fs-6 text-warning mx-2 btnEditarVenta" style="cursor:pointer;" title="Editar Venta"></i>' +
                group + '<i nroBoleta = ' + nroBoleta +
                ' class="fas fa-print fs-6 text-blue mx-2 btnImprimirVenta" style="cursor:pointer;" title="Imprimir Venta">  ' +
                '</td>' +
                '</tr>'
              );

              last = group;
            }
          });
        },
        language: {
          "sProcessing": "Procesando...",
          "sLengthMenu": "Mostrar _MENU_ registros",
          "sZeroRecords": "No se encontraron resultados",
          "sEmptyTable": "Ningún dato disponible en esta tabla",
          "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ Registros",
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

    })

    

    /*>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> EVENTOS PARA EDITAR UNA VENTA <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
    >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>                                <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<*/

    $('#lstVentas tbody').on('click', '.btnEditarVenta', function() {
      
      nroBoleta = $(this).attr("nroBoleta");
      $("#modalEditarVenta").modal('show');
      $("#nro_Titventa").html(' | Nro. Boleta: '+nroBoleta);
      
      // Cargar los datos principales de la venta
      $.ajax({
        url: 'ajax/ventas.ajax.php',
        method: 'POST',
        data: {
          'accion': 4,
          'nroBoleta': nroBoleta
        },
        dataType: 'json',
        success: function(ventaData) {
          if(ventaData) {
            // Llenar los campos del formulario con los datos de la venta
            $("#selCliente").val(ventaData.cliente_id).trigger('change');
            $("#selVendedor").val(ventaData.vendedorID).trigger('change');
            $("#selDocumentoVenta").val(ventaData.docuVenta).trigger('change');
            $("#selTipoPago").val(ventaData.tipoPago).trigger('change');
            $("#iptFechaEntrega").val(ventaData.fecha_entrega);
            $("#iptObservacion").val(ventaData.observa_venta);
          }
        },
        error: function(xhr, status, error) {
          console.error('Error al cargar los datos de la venta:', error);
        }
      });
      
      // Cargar el detalle de la venta
      $.ajax({
        url: 'ajax/TableEdit/obtener_detalle_venta.php',
        method: 'POST',
        data: {
          'nro_boleta': nroBoleta
        },
        success: function(data) {
          console.log(data);
          $('#resultv').html(data);
          
          // Calcular el total de la venta
          var totalVenta = 0.00;
          $('#resultv tr').each(function() {
            var totalCell = $(this).find('td:eq(8)').text(); // Columna total
            if(totalCell && !isNaN(totalCell)) {
              totalVenta += parseFloat(totalCell);
            }
          });
          
          $("#spnTotalVenta").html(totalVenta.toFixed(2));
        }
      });
        
    })
      

    /*EVENTO PARA CERRAR LA VENTANA MODAL*/
    $("#btnCerrarModal, #btnCloseModal").on("click", function() {
      $("#modalEditarVenta").modal('hide');
      // Actualizar la tabla principal de ventas al cerrar el modal
      table.ajax.reload();
    });


  }) //fin del ready

  function actualizar_datos(id, texto, campo) {
    $.ajax({
      url: 'ajax/TableEdit/actualizar_producto_detalle_venta.php',
      method: 'POST',
      data: {
        'detalle_venta_id': id,
        'valor': texto,
        'campo': campo
      },
      dataType: 'json',
      success: function(response) {
        if(response.status === 'success') {
          // Actualizar la tabla del modal con los datos nuevos
          $('#resultv').html(response.html);
          
          // Actualizar el total de la venta en el modal
          $('#spnTotalVenta').html(response.total_venta);
          
          // Mostrar mensaje de éxito
          Toast.fire({
            icon: 'success',
            title: response.mensaje
          });
        } else {
          // Mostrar mensaje de error
          Toast.fire({
            icon: 'error',
            title: response.error
          });
        }
      },
      error: function(xhr, status, error) {
        console.error('Error en la actualización:', error);
        Toast.fire({
          icon: 'error',
          title: 'Error al actualizar el producto'
        });
      }
    });
  }

  //Evento para actualizar los campos de la tabla detalle de ventas
  $(document).on("blur", ".cantidad", function() {
    var id = $(this).data("id_cantidad");
    var cantNew = $(this).text().trim();

    actualizar_datos(id, cantNew,"cantidad");
    
  })
  
  //Evento para actualizar el precio
  $(document).on("blur", ".precio", function() {
    var id = $(this).data("id_precio");
    var precioNew = $(this).text().trim();

    actualizar_datos(id, precioNew,"precio");
    
  })
  
  //Evento para actualizar el descuento porcentual
  $(document).on("blur", ".descuento", function() {
    var id = $(this).data("id_descuento");
    var descNew = $(this).text().trim();

    actualizar_datos(id, descNew,"descuento_porcentual");
    
  })

  //Evento para insertar registro en la tabla de detalles de la venta
  $(document).on("click", ".btnAgregar", function() {
    var nro_boleta = $("#nro_Titventa").text().replace(' | Nro. Boleta: ', '').trim();
    var codpro_add = $("#codigo_producto_add").val().trim();
    var cant_add = $("#cantidad_add").text().trim();
    var desc_add = $("#descuento_add").text().trim();
    
    // Validar que los campos requeridos no estén vacíos
    if (!codpro_add) {
      alert('Por favor ingrese un código de producto');
      $("#codigo_producto_add").focus();
      return;
    }
    
    if (!cant_add || isNaN(cant_add) || parseFloat(cant_add) <= 0) {
      alert('Por favor ingrese una cantidad válida');
      $("#cantidad_add").focus();
      return;
    }
    
    if (!desc_add || isNaN(desc_add)) {
      desc_add = 0; // Si no hay descuento, usar 0 por defecto
    }
    
    $.ajax({
      url: 'ajax/TableEdit/insertar_producto_venta_detalle.php',
      method: 'POST',
      data: {
        'nro_boleta': nro_boleta,
        'codpro_add': codpro_add,
        'cant_add': cant_add,
        'desc_add': desc_add
      },
      dataType: 'json',
      success: function(response) {
        if(response.status === 'success') {
          // Actualizar la tabla del modal con los datos nuevos
          $('#resultv').html(response.html);
          
          // Actualizar el total de la venta en el modal
          $('#spnTotalVenta').html(response.total_venta);
          
          // Mostrar mensaje de éxito
          Toast.fire({
            icon: 'success',
            title: response.mensaje
          });
        } else {
          // Mostrar mensaje de error
          Toast.fire({
            icon: 'error',
            title: response.error
          });
        }
      },
      error: function(xhr, status, error) {
        console.error('Error al agregar producto:', error);
        Toast.fire({
          icon: 'error',
          title: 'Error al agregar el producto'
        });
      }
    });
  })
    
  // Evento para cuando se selecciona un producto, cargar sus datos
  $(document).on('change', '#codigo_producto_add', function() {
    var selectedProductCode = $(this).val();
    
    if(selectedProductCode) {
      // Hacer una llamada AJAX para obtener los detalles del producto
      $.post('ajax/get_producto_detalle.php', { codigo_producto: selectedProductCode }, function(response) {
        var data = JSON.parse(response);
        if(!data.error) {
          // Llenar los campos correspondientes con la información del producto
          $('#descripcion_producto_add').text(data.descripcion_producto);
          $('#nombre_categoria_add').text(data.nombre_categoria);
          $('#precio_add').text(data.precio_venta);
        } else {
          console.log('Error al obtener detalles del producto:', data.error);
        }
      });
    } else {
      // Limpiar los campos si no hay producto seleccionado
      $('#descripcion_producto_add').text('');
      $('#nombre_categoria_add').text('');
      $('#precio_add').text('');
    }
  });

  //Evento para eliminar producto de la tabla de detalle de ventas
  $(document).on("click", ".btnEliminar", function() {
    var id = $(this).data("id_codigo");
        
    // Confirmar la eliminación con SweetAlert
    Swal.fire({
      title: '¿Está seguro?',
      text: "¿Desea eliminar este producto del detalle de venta?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Sí, eliminar!',
      cancelButtonText: 'Cancelar'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: "ajax/TableEdit/eliminar_producto_venta_detalle.php",
          method: "POST",
          data: {detalle_venta_id: id},
          dataType: "json",
          success: function(response) {
            if(response.status == 'success') {
              // Usar directamente la respuesta HTML y total del backend
              $('#resultv').html(response.html);
              $('#spnTotalVenta').html(response.total_venta);
              
              Toast.fire({
                icon: 'success',
                title: response.mensaje
              });
            } else {
              Toast.fire({
                icon: 'error',
                title: response.error
              });
            }
          },
          error: function(xhr, status, error) {
            console.error("Error en la eliminación:", error);
            Swal.fire({
              icon: 'error',
              title: 'Error',
              text: 'Error al procesar la solicitud de eliminación'
            });
          }
        });
      }
    });
  })
      
  // Evento para guardar las modificaciones de la venta
  $("#btnGuardarModificacion").on("click", function(e) {
    e.preventDefault();
        
    // Obtener los valores de los campos
    var nroBoleta = $("#nro_Titventa").text().replace(' | Nro. Boleta: ', '').trim();
    var descripcionVenta = "Venta modificada"; // Descripción predeterminada o puede tomar el valor del número de boleta
    var idCliente = $("#selCliente").val();
    var obsVenta = $("#iptObservacion").val();
    var fechaEntrega = $("#iptFechaEntrega").val();
    var vendedor = $("#selVendedor").val();
    var tipoPago = $("#selTipoPago").val();
    var docVenta = $("#selDocumentoVenta").val();
        
    // Validar que los campos requeridos no estén vacíos
    if (!idCliente || idCliente == 0) {
      Toast.fire({
        icon: 'error',
        title: 'Seleccione un cliente'
      });
      return;
    }
        
    if (!vendedor || vendedor == 0) {
      Toast.fire({
        icon: 'error',
        title: 'Seleccione un vendedor'
      });
      return;
    }
        
    if (!tipoPago || tipoPago == 0) {
      Toast.fire({
        icon: 'error',
        title: 'Seleccione un tipo de pago'
      });
      return;
    }
        
    if (!docVenta || docVenta == 0) {
      Toast.fire({
        icon: 'error',
        title: 'Seleccione un documento de venta'
      });
      return;
    }
        
    if (!fechaEntrega) {
      Toast.fire({
        icon: 'error',
        title: 'Ingrese una fecha de entrega'
      });
      return;
    }
        
    // Confirmar la actualización con SweetAlert
    Swal.fire({
      title: '¿Está seguro?',
      text: "¿Desea guardar las modificaciones de la venta?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Sí, guardar!',
      cancelButtonText: 'Cancelar'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: "ajax/ventas.ajax.php",
          method: "POST",
          data: {
            accion: 5,
            nro_boleta: nroBoleta,
            descripcion_venta: descripcionVenta,
            id_cliente: idCliente,
            obs_venta: obsVenta,
            fechaEntrega: fechaEntrega,
            vendedor: vendedor,
            tipoPago: tipoPago,
            docVenta: docVenta
          },
          dataType: "json",
          success: function(response) {
            if(response == "ok") {
              Toast.fire({
                icon: 'success',
                title: 'Venta actualizada correctamente'
              });
                  
              // Cerrar el modal
              $("#modalEditarVenta").modal('hide');
                  
              // Actualizar la tabla principal de ventas
              table.ajax.reload();
            } else {
              Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Hubo un problema al actualizar la venta'
              });
            }
          },
          error: function(xhr, status, error) {
            console.error("Error al actualizar la venta:", error);
            Swal.fire({
              icon: 'error',
              title: 'Error',
              text: 'Error al procesar la solicitud de actualización'
            });
          }
        });
      }
    });
  });

</script>