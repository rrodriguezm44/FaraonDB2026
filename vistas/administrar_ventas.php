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


<!-- Modal editar ventas-->
<div class="modal fade" id="modalEditarVenta" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl " role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title fw-bold">Editar Venta <span id="nro_Titventa"></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="btnCerrarModal">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <div class="row">
          <!-- CLIENTES -->
          <div class="col-12 col-md-5 col-lg-3">

            <div class="form-floating mb-2">

              <select class="form-select select2" id="selCliente" aria-label="Floating label select example" name="selCliente" required>
              </select>
              <label for="selCliente">Clientes</label>
              <div class="invalid-feedback">Seleccione al Cliente</div>

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
          
          <!-- INPUT OBSERVACION -->
          <div class="col-12 col-md-4 col-lg-7">
            <div class="form-floating mb-2">
              <input type="text" class="form-control form-control-sm" id="iptObservacion" name="iptObservacion"
                placeholder="Ingrese Observacion Venta" onKeyUp="javascript:this.value=this.value.toUpperCase();">
              <label for="iptObservacion">Observaciones </label>
            </div>
          </div>

          <div class="col-12 col-md-4 col-lg-3">
            <div class="form-floating mb-2">
              <div class="form-group m-0"><a href="#" class="btn btn-success" style="width:120px;"
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
        <div class="table-responsive">
        <table id="tblDetalleVenta" class="table table-bordered table-striped w-100">
          <thead>
            <tr>
              <th>Id</th>
              <th>Boleta</th>
              <th>Codigo</th>
              <th>Categoria</th>
              <th>Producto</th>
              <th>Cantidad</th>
              <th>Precio</th>
              <th>Desc.%</th>
              <th>Total</th>
              <th>Accion</th>
            </tr>
          </thead>
          <tbody id="resultv">
          </tbody>
        </table>
        </div>
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

<!-- Modal para agregar nuevo producto -->
 <!-- <div class="modal fade" id="modalAgregarProducto" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Añadir Producto a la Venta</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formNuevoProducto">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="select_producto">Buscar Producto (Código o Nombre)</label>
                            <select class="form-control" id="select_producto" style="width: 100%"></select>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label>Descripción</label>
                            <input type="text" id="m_descripcion" class="form-control" readonly>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label>Precio Venta</label>
                            <input type="number" id="m_precio" class="form-control" step="0.01">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label>Cantidad</label>
                            <input type="number" id="m_cantidad" class="form-control" value="1">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label>Descuento (%)</label>
                            <input type="number" id="m_descuento" class="form-control" value="0">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-success" onclick="procesarGuardadoModal()">
                    <i class="fas fa-plus"></i> Agregar al Detalle
                </button>
            </div>
        </div>
    </div>
</div> -->

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
      $("#modalEditarVenta").modal('show');
      $("#nro_Titventa").html(' | Nro. Boleta: '+nroBoleta);
      //alert(nroBoleta);
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
            var totalCell = $(this).find('td:eq(7)').text();
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
    });

    // $('#btnAgregarNuevoProducto').on('click', function() {
    //   //alert("Agregar nuevo producto");
    //   $("#modalAgregarProducto").modal('show');
    //   // $.ajax({
    //   //   url: 'ajax/EditTable/acciones_datatable.php',
    //   //   type: 'POST',
    //   //   data: {
    //   //     action: 'add',
    //   //     // Aquí puedes pasar valores por defecto o el ID de la venta actual
    //   //     id_venta: $('#id_venta_actual').val() 
    //   //   },
    //   //   dataType: 'json',
    //   //   success: function(response) {
    //   //     if (response.status == 'success') {
    //   //         // Recargamos DataTables
    //   //         $('#tblDetalleVenta').DataTable().ajax.reload(function() {
    //   //             // Re-aplicamos Tabledit a las nuevas filas
    //   //             inicializarTabledit();
    //   //         }, false);
              
    //   //         Toast.fire({
    //   //             icon: 'success',
    //   //             title: 'Fila agregada. Ya puedes editarla.'
    //   //         });
    //   //     }
    //   //   }
    //   // });
    // });

  }) //fin del ready

  $(document).on("blur", "#cantidad", function() {
    var id = $(this).data("id_cantidad");
    
  })
</script>