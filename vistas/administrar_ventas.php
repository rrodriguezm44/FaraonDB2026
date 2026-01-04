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


<!-- Modal -->
<div class="modal fade" id="modalEditarVenta" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl " role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title fw-bold">Editar Venta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="btnCerrarModal">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <table id="tblDetalleVenta" class="table table-bordered table-striped w-100">
          <thead>
            <tr>
              <th>Id</th>
              <th>Boleta</th>
              <th>Codigo</th>
              <th>Categoria</th>
              <th>Producto</th>
              <th>Cantidad</th>
              <th>Total</th>
            </tr>
          </thead>
          <tbody></tbody>
        </table>
        <div class="card-footer pb-0">
          <h4 class="float-right">Total Venta Bs. <span id="spnTotalVenta">0.00</span></h4>
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
    //console.log("🚀 ~ file: administrar_ventas.php ~ line 99 ~ $ ~ ventas_hasta", ventas_hasta)

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
              '<td colspan="6" class="fs-6 fw-bold fst-italic bg-success text-white"> ' +
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
      //console.log(nroBoleta);

      if ($.fn.DataTable.isDataTable('#tblDetalleVenta')) {
        $('#tblDetalleVenta').DataTable().destroy();
      }

      $('#tblDetalleVenta tbody').empty();

      $('#tblDetalleVenta').DataTable({
        columns: [{
            data: 'detalle_venta_id'
          },
          {
            data: 'nro_boleta'
          },
          {
            data: 'codigo_producto'
          },
          {
            data: 'nombre_categoria'
          },
          {
            data: 'descripcion_producto'
          },
          {
            data: 'cantidad'
          },
          {
            data: 'total_venta'
          }
        ],
        processing: true,
        serverSide: true,
        paging: false,
        ajax: {
          url: 'ajax/EditTable/obtener_detalle_venta.php',
          type: 'POST',
          dataType: 'json',
          data: {
            'nro_boleta': nroBoleta
          },
          "dataSrc": function(output) {

            console.log("~ file: administrar_ventas.php ~ line 475 ~ $ ~ output", output)

            var TotalVenta = 0.00;

            for (let i = 0; i < output["data"].length; i++) {
              TotalVenta = (parseFloat(TotalVenta) + parseFloat(output["data"][i][6])).toFixed(2);
            }

            $("#spnTotalVenta").html(TotalVenta);

            return output["data"];
          }
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
      $("#modalEditarVenta").modal('show');
    })

    //EVENTO PARA ACTUALIZAR LA VENTANA MODAL
    $('#tblDetalleVenta').on('draw.dt', function() {

      $('#tblDetalleVenta').Tabledit({
        url: 'ajax/EditTable/acciones_datatable.php',
        dataType: 'json',
        columns: {
          identifier: [0, 'detalle_venta_id'],
          editable: [
            [2, 'codigo_producto'],
            [5, 'cantidad']
          ]
        },
        buttons: {
          edit: {
            class: 'btn btn-sm btn-default',
            html: '<span class="glyphicon glyphicon-pencil"></span>',
            html: '<i class="fas fa-edit text-warning fs-6"></i>',
            action: 'edit'
          },
          delete: {
            class: 'btn btn-sm btn-default',
            html: '<span class="glyphicon glyphicon-trash"></span>',
            html: '<i class="far fa-trash-alt text-danger fs-6"></i>',
            action: 'delete'
          }
        },
        // restoreButton: false, 
        onSuccess: function(data, textStatus, jqXHR) {
          if (data.action == 'delete') {
            $('#' + data.nro_boleta).remove();
            $('#tblDetalleVenta').DataTable().ajax.reload();
            table.ajax.reload();
            Toast.fire({
              icon: 'success',
              title: 'Se eliminó correctamente'
            });
          }

          if (data.action == 'edit') {
            Toast.fire({
              icon: 'success',
              title: 'Se actualizó correctamente'
            });

            $('#tblDetalleVenta').DataTable().ajax.reload();
            table.ajax.reload();
          }
        }
      });
    });

    /*EVENTO PARA CERRAR LA VENTANA MODAL*/
    $("#btnCerrarModal, #btnCloseModal").on("click", function() {
      $("#modalEditarVenta").modal('hide');
    });

  })
</script>