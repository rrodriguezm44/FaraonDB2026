<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Reporte de Ventas</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Inicio</a></li>
          <li class="breadcrumb-item active">Reporte Ventas</li>
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
              <button type="button" class="btn btn-tool text-warning" id="btnLimpiarBusqueda" title="Limipiar Búsqueda">
                <i class="fas fa-times"></i>
              </button>
            </div> <!-- ./ end card-tools -->
          </div> <!-- ./ end card-header -->
          <div class="card-body">

            <div class="row">

              <div class="d-none d-md-flex col-md-12 ">

                <div style="width: 20%;" class="form-floating mx-1">
                  <input type="text" id="iptCliente" class="form-control" data-index="6">
                  <label for="iptCliente">Cliente</label>
                </div>

                <div style="width: 20%;" class="form-floating mx-1">
                  <input type="text" id="iptVendedor" class="form-control" data-index="8">
                  <label for="iptVendedor">Vendedor</label>
                </div>

                <div style="width: 20%;" class="form-floating mx-1">
                  <input type="text" id="iptNroBoleta" class="form-control" data-index="3">
                  <label for="iptNroBoleta">Nro. Boleta</label>
                </div>

                <div style="width: 20%;" class="form-floating mx-1">

                  <input type="date" class="form-control" id="iptFechaVentaDesde" placeholder="desde" data-index="4">
                  <label for="iptFechaVentaDesde">F. Venta Desde</label>
                </div>


                <div style="width: 20%;" class="form-floating mx-1">

                  <input type="date" class="form-control" id="iptFechaVentaHasta" placeholder="hasta" data-index="5">
                  <label for="iptFechaVentaHasta">F. Venta Hasta</label>
                </div>

                <div style="width: 20%;" class="form-floating mx-1">
                  <input type="text" id="iptProveedor" class="form-control" data-index="12">
                  <label for="iptProveedor">Proveedor</label>
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
        <table id="tbl_ventas" class="table w-100 table-dark shadow border border-secondary">
          <thead class="bg-main">
            <tr style="font-size: 15px;">
              <th> </th> <!-- 0 -->
              <th class="text-center">Opciones</th> <!-- 1 -->

              <th>Id Venta</th> <!-- 2 -->

              <th>Nro. Boleta</th> <!-- 3 -->

              <th>Fecha Venta</th> <!-- 4 -->

              <th>Id. Cliente</th> <!-- 5 -->

              <th>Cliente</th> <!-- 6 -->

              <th>Id. Vendedor</th> <!-- 7 -->

              <th>Vendedor</th> <!-- 8 -->

              <th>Total Venta</th> <!-- 9 -->

              <th>Id. Usuario</th> <!-- 10 -->

              <th>Estado</th> <!-- 11 -->

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
<script>
var accion;

var Toast = Swal.mixin({
  toast: true,
  position: 'top',
  showConfirmButton: false,
  timer: 3000
});


let table;

$(document).ready(function() {


  table = fnc_CargarDataTableVentas();
  $('.select2').select2()

  // BUSQUEDA POR CLIENTE
  $("#iptCliente").keyup(function() {
    $("#tbl_ventas").DataTable().column($(this).data('index')).search(this.value).draw();
  })

  // BUSQUEDA POR VENDEDOR
  $("#iptVendedor").keyup(function() {

    $("#tbl_ventas").DataTable().column($(this).data('index')).search(this.value).draw();

  })

  // BUSQUEDA POR NUMERO BOLETA
  $("#iptNroBoleta").keyup(function() {
    $("#tbl_ventas").DataTable().column($(this).data('index')).search(this.value).draw();
  })

  // BUSQUEDA POR PROVEEDOR
  $("#iptProveedor").keyup(function() {
    $("#tbl_ventas").DataTable().column($(this).data('index')).search(this.value).draw();
  })

  // BUSQUEDA POR RANGO DE FECHAS Y PROVEEDOR
  $.fn.dataTable.ext.search.push(
    function(settings, data, dataIndex) {
      var inicio = $("#iptFechaVentaDesde").val();
      var fin = $("#iptFechaVentaHasta").val();
      var proveedor = $("#iptProveedor").val().toLowerCase();
      var fecha = data[4]; // Fecha de la tabla
      var proveedorTabla = data[12] ? data[12].toLowerCase() : '';

      // Si no hay fechas ni proveedor, mostrar todo
      if (!inicio && !fin && !proveedor) return true;

      // Normalizar formato de fecha de la tabla a YYYY-MM-DD
      var fechaParts = fecha.split(/[\/\-]/);
      var fechaTabla;
      if (fechaParts[2] && fechaParts[1] && fechaParts[0]) {
        // Si es DD/MM/YYYY
        if (fechaParts[0].length === 2 && fechaParts[1].length === 2 && fechaParts[2].length === 4) {
          fechaTabla = new Date(fechaParts[2] + '-' + fechaParts[1] + '-' + fechaParts[0]);
        } else {
          // Si ya es YYYY-MM-DD
          fechaTabla = new Date(fecha);
        }
      } else {
        fechaTabla = new Date(fecha);
      }

      var fechaInicio = inicio ? new Date(inicio) : null;
      var fechaFin = fin ? new Date(fin) : null;

      // Filtro de fechas
      if (fechaInicio && fechaTabla < fechaInicio) return false;
      if (fechaFin) {
        var fechaFinCopia = new Date(fechaFin);
        fechaFinCopia.setHours(23, 59, 59, 999);
        if (fechaTabla > fechaFinCopia) return false;
      }
      // Filtro de proveedor
      if (proveedor && proveedorTabla.indexOf(proveedor) === -1) return false;
      return true;
    }
  );

  $("#iptFechaVentaDesde, #iptFechaVentaHasta, #iptProveedor").on('change keyup', function() {
    $("#tbl_ventas").DataTable().draw();
  })
  /* ======================================================================================
    E L I M I N A R   V E N T A S 
    =========================================================================================*/
  // DESACTIVAR UN VENTAS
  $('#tbl_ventas tbody').on('click', '.btnDesactivarVenta', function() {
    fnc_DesactivarVenta($('#tbl_ventas').DataTable().row($(this).parents('tr')).data());
  })

  // ACTIVAR UN VENTAS
  $('#tbl_ventas tbody').on('click', '.btnActivarVenta', function() {
    fnc_ActivarVenta($('#tbl_ventas').DataTable().row($(this).parents('tr')).data());
  })

  // LIMPIAR CRITERIOS DE BUSQUEDA
  $("#btnLimpiarBusqueda").on('click', function() {

    $("#iptCliente").val('')
    $("#iptVendedor").val('')
    $("#iptNroBoleta").val('')
    $("#iptFechaVentaDesde").val('')
    $("#iptFechaVentaHasta").val('')
    $("#iptProveedor").val('')

    $("#tbl_ventas").DataTable().search('').columns().search('').draw();
  })

}); //FIN DE READY



/*===================================================================*/
// C O N S U L T A   D E   V E N T A S  (DATATABLE)
/*===================================================================*/
function fnc_CargarDataTableVentas() {
  // Solo inicializar si no existe
  if ($.fn.DataTable.isDataTable('#tbl_ventas')) {
    return $('#tbl_ventas').DataTable();
  }
  return $("#tbl_ventas").DataTable({
    dom: 'Bfrtip',
    buttons: [{
        text: '<i class="fas fa-sync-alt"></i>',
        className: 'btn btn-warning',
        action: function(e, dt, node, config) {
          // Refrescar la tabla de ventas de forma segura
          $('#tbl_ventas').DataTable().ajax.reload(null, false);
        }
      },
      //'excel', 'pdf', 'print', 'pageLength '
      {
        text: 'Proveedor',
        className: 'btn btn-outline-warning',
        action: function(e, dt, node, config) {
          // Mostrar el modal de búsqueda por proveedor
          $('#mdlBusquedaProveedor').modal('show');
          cargarProveedoresModal();
        }
      },
      {
        extend: 'excelHtml5',
        text: '<i class="fas fa-file-excel"></i> ',
        titleAttr: 'Exportar a Excel',
        className: 'btn btn-success',
        exportOptions: {
          columns: function(idx, data, node) {
            // Exportar solo columnas visibles
            return $(node).is(':visible');
          }
        },
        filename: 'Reporte_ventas_<?php echo date('Y-m-d_H-i-s') ?>'
      },
      {
        extend: 'pdfHtml5',
        text: '<i class="fas fa-file-pdf"></i> ',
        titleAttr: 'Exportar a PDF',
        className: 'btn btn-danger',
        orientation: 'landscape',
        exportOptions: {
          columns: function(idx, data, node) {
            return $(node).is(':visible');
          }
        },
        filename: 'Reporte_ventas_<?php echo date('Y-m-d_H-i-s') ?>'
      },
      {
        extend: 'print',
        text: '<i class="fa fa-print"></i> ',
        titleAttr: 'Imprimir',
        className: 'btn btn-info',
        exportOptions: {
          columns: function(idx, data, node) {
            return $(node).is(':visible');
          }
        },
        filename: 'Reporte_ventas_<?php echo date('Y-m-d_H-i-s') ?>'
      },

    ],
    pageLength: [5, 10, 15, 30, 50, 100],
    pageLength: 10,
    ajax: {
      url: "ajax/vendedores.ajax.php",
      dataSrc: '',
      type: "POST",
      data: {
        'accion': 'listar_ventas' //1: LISTAR VENTAS
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
        targets: [2, 5, 7, 10],
        visible: false
      },
      {
        targets: 3,
        className: 'text-center'
      },
      {
        targets: 4,
        type: 'date-eu'
      },
      {
        targets: 11,
        className: 'text-center'
      },
      {
        targets: 1,
        orderable: false,
        createdCell: function(td, cellData, rowData, row, col) {
          /* $(td).html("<span class='btnEditarProducto text-primary px-1' style='cursor:pointer;'>" +
            "<i class='fas fa-pencil-alt fs-5'></i>" +
            "</span>") */

          if (rowData['estado'] == 'anulado') {

            $(td).html(
              "<span class='btnActivarVenta text-danger px-1' style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='Activar Producto'>" +
              "<i class='fas fa-toggle-off fs-5 text-danger'> </i> " +
              "</span>")
          } else {
            $(td).html(
              "<span class='btnDesactivarVenta text-danger px-1' style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='Desactivar Producto'>" +
              "<i class='fas fa-toggle-on fs-5 text-success'> </i> " +
              "</span>")
          }
        },
        className: "text-center"

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

// CARGAR SELECT DE CATEGORIAS
/* function fnc_cargarSelectVendedores() {

  CargarSelect(null, $("#id_vendedor_busqueda"), "--Todos los vendedores--", "ajax/vendedores.ajax.php",
    'obtener_vendedores', null, 1);
  $('.select2').select2();
} */




function fnc_DesactivarVenta(data) {

  var nro_boleta = data[3];


  Swal.fire({
    title: 'Está seguro de desactivar la Venta con Nro. de Boleta: ' + data[3] + '?',
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

        datos.append('accion', 'desactivar_venta');
        datos.append('nro_boleta', nro_boleta);

        response = SolicitudAjax('ajax/vendedores.ajax.php', 'POST', datos)

        tipo = response["tipo_msj"];
        mensaje = response["msj"];

        Toast.fire({
          icon: tipo,
          title: mensaje
        });

        $('#tbl_ventas').DataTable().ajax.reload(null, false);

      }

    }
  })
}

function fnc_ActivarVenta(data) {

  var nro_boleta = data[3];

  Swal.fire({
    title: 'Está seguro de activar la Venta Nro. de Boleta: ' + data[3] + '?',
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

        datos.append('accion', 'activar_venta');
        datos.append('nro_boleta', nro_boleta);

        response = SolicitudAjax('ajax/vendedores.ajax.php', 'POST', datos)

        tipo = response["tipo_msj"];
        mensaje = response["msj"];

        Toast.fire({
          icon: tipo,
          title: mensaje
        });

        $('#tbl_ventas').DataTable().ajax.reload(null, false);


      }

    }
  })
}

// Cargar proveedores en el select del modal
function cargarProveedoresModal() {
  $.ajax({
    url: 'ajax/vendedores.ajax.php',
    type: 'POST',
    data: {
      accion: 'obtener_proveedores'
    },
    dataType: 'json',
    success: function(res) {
      console.log(res);
      var $select = $('#slcProveedorModal');
      $select.empty();
      $select.append('<option value="">-- Seleccione --</option>');
      $.each(res, function(i, proveedor) {
        $select.append('<option value="' + proveedor.proveedor_id + '">' + proveedor.nombre_proveedor +
          '</option>');
      });
    }
  });
}

// Manejar búsqueda en el modal
$('#formBusquedaProveedor').on('submit', function(e) {
  e.preventDefault();
  var idProveedor = $('#slcProveedorModal').val();
  var fechaDesde = $('#fechaDesdeModal').val();
  var fechaHasta = $('#fechaHastaModal').val();

  // alert('Buscando ventas para el proveedor: ' + idProveedor + ' desde: ' + fechaDesde + ' hasta: ' + fechaHasta);
  if (!idProveedor || !fechaDesde || !fechaHasta) {
    Swal.fire('Complete todos los campos', '', 'warning');
    return;
  }
  $.ajax({
    url: 'ajax/vendedores.ajax.php',
    type: 'POST',
    data: {
      accion: 'buscar_ventas_proveedor',
      idProveedor: idProveedor,
      fechaDesde: fechaDesde,
      fechaHasta: fechaHasta
    },
    dataType: 'json',
    success: function(res) {

      //console.log('respuesta array' + res);
      var html = '';
      if (res.length > 0) {
        html +=
          '<table class="table table-sm table-dark shadow border border-secondary"><thead><tr style="text-align:center">';
        html +=
          '<th>Nro. Boleta</th><th>Fecha Venta</th><th>Total Venta</th><th>Proveedor</th>';
        html += '</tr></thead><tbody>';
        $.each(res, function(i, venta) {
          html += '<tr>';
          html += '<td style="text-align:center">' + venta.nro_boleta + '</td>';
          // Formatear fecha a d/m/Y
          var fecha = venta.fecha_venta;
          if (fecha && fecha.length >= 10) {
            var partes = fecha.split('-');
            if (partes.length === 3) {
              fecha = partes[2].substring(0, 2) + '/' + partes[1] + '/' + partes[0];
            }
          }
          html += '<td style="text-align:center">' + fecha + '</td>';
          html += '<td style="text-align:right"> Bs. ' + venta.total_venta + '</td>';
          html += '<td style="text-align:center">' + venta.proveedor + '</td>';
          html += '</tr>';
        });
        html += '</tbody></table>';
      } else {
        html =
          '<div class="alert alert-warning">No se encontraron ventas para ese proveedor y rango de fechas.</div>';
      }
      $('#resultadosProveedor').html(html);
      // Guardar los datos para exportar
      window._ventasProveedorExport = res;
    }
  });
});

// Exportar a Excel el resultado del modal
$('#btnExportarExcelModal').on('click', function() {
  var datos = window._ventasProveedorExport;
  if (!datos || datos.length === 0) {
    Swal.fire('No hay datos para exportar', '', 'warning');
    return;
  }
  // Crear una tabla temporal para exportar
  var tabla =
    '<table><thead><tr><th>Nro. Boleta</th><th>Fecha Venta</th><th>Total Venta</th><th>Proveedor</th></tr></thead><tbody>';
  $.each(datos, function(i, venta) {
    tabla += '<tr>';
    tabla += '<td>' + venta.nro_boleta + '</td>';
    tabla += '<td>' + venta.fecha_venta + '</td>';
    tabla += '<td>' + venta.total_venta + '</td>';
    tabla += '<td>' + venta.proveedor + '</td>';
    tabla += '</tr>';
  });
  tabla += '</tbody></table>';
  // Exportar como archivo Excel
  var uri = 'data:application/vnd.ms-excel;base64,';
  var base64 = function(s) {
    return window.btoa(unescape(encodeURIComponent(s)))
  };
  var link = document.createElement('a');
  link.href = uri + base64(tabla);
  link.download = 'VentasProveedor_' + new Date().toISOString().slice(0, 10) + '.xls';
  document.body.appendChild(link);
  link.click();
  document.body.removeChild(link);
});

// Limpiar búsqueda en el modal
$('#btnLimpiarBusquedaModal').on('click', function() {
  $('#slcProveedorModal').val('');
  $('#fechaDesdeModal').val('');
  $('#fechaHastaModal').val('');
  $('#resultadosProveedor').html('');
  window._ventasProveedorExport = [];
});

// Botón para abrir el modal de resumen de proveedor
document.getElementById('btnResumenProveedorModal').addEventListener('click', function() {
  var fechaDesde = $('#fechaDesdeModal').val();
  var fechaHasta = $('#fechaHastaModal').val();

  if (!fechaDesde || !fechaHasta) {
    Swal.fire('Complete todos los campos', '', 'warning');
    return;
  }

  // Solicitud AJAX para obtener el resumen del proveedor SOLO con fechas
  $.ajax({
    url: 'ajax/vendedores.ajax.php',
    type: 'POST',
    data: {
      accion: 'resumen_proveedor',
      fechaDesde: fechaDesde,
      fechaHasta: fechaHasta
    },
    dataType: 'json',
    success: function(res) {
      var html = '';
      if (res && res.length > 0) {
        // Botón de exportar a Excel
        html += '<div class="mb-2 text-end">';
        html += '<button type="button" class="btn btn-success btn-sm" id="btnExportarResumenExcel"><i class="fas fa-file-excel"></i> Exportar a Excel</button>';
        html += '</div>';
        html += '<table id="tblResumenProveedor" class="table table-dark table-bordered table-striped"><thead><tr>';
        Object.keys(res[0]).forEach(function(key) {
          html += '<th>' + key.replace(/_/g, ' ').toUpperCase() + '</th>';
        });
        html += '</tr></thead><tbody>';
        res.forEach(function(row) {
          html += '<tr>';
          Object.values(row).forEach(function(val) {
            html += '<td>' + val + '</td>';
          });
          html += '</tr>';
        });
        html += '</tbody></table>';
      } else {
        html = '<div class="alert alert-warning">No se encontraron datos para el resumen del proveedor.</div>';
      }
      $('#mdlResumenProveedor .modal-body').html(html);
      $('#mdlResumenProveedor').modal('show');
      // Guardar los datos para exportar
      window._resumenProveedorExport = res;
    },
    error: function() {
      $('#mdlResumenProveedor .modal-body').html(
        '<div class="alert alert-danger">Error al obtener el resumen del proveedor.</div>');
      $('#mdlResumenProveedor').modal('show');
    }
  });
});

// Exportar a Excel el resumen del proveedor
$(document).on('click', '#btnExportarResumenExcel', function() {
  var datos = window._resumenProveedorExport;
  if (!datos || datos.length === 0) {
    Swal.fire('No hay datos para exportar', '', 'warning');
    return;
  }
  var tabla = '<table><thead><tr>';
  Object.keys(datos[0]).forEach(function(key) {
    tabla += '<th>' + key.replace(/_/g, ' ').toUpperCase() + '</th>';
  });
  tabla += '</tr></thead><tbody>';
  datos.forEach(function(row) {
    tabla += '<tr>';
    Object.values(row).forEach(function(val) {
      tabla += '<td>' + val + '</td>';
    });
    tabla += '</tr>';
  });
  tabla += '</tbody></table>';
  var uri = 'data:application/vnd.ms-excel;base64,';
  var base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) };
  var link = document.createElement('a');
  link.href = uri + base64(tabla);
  link.download = 'ResumenProveedores_' + new Date().toISOString().slice(0, 10) + '.xls';
  document.body.appendChild(link);
  link.click();
  document.body.removeChild(link);
});
</script>

<!-- Modal Busqueda por Proveedor -->
<div class="modal fade" id="mdlBusquedaProveedor" tabindex="-1" aria-labelledby="mdlBusquedaProveedorLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="mdlBusquedaProveedorLabel">Búsqueda por Proveedor</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body">
        <form id="formBusquedaProveedor">
          <div class="row mb-3">
            <div class="col-md-6">
              <label for="slcProveedorModal" class="form-label">Proveedor</label>
              <select id="slcProveedorModal" class="form-select" required></select>
            </div>
            <div class="col-md-3">
              <label for="fechaDesdeModal" class="form-label">Fecha Desde</label>
              <input type="date" id="fechaDesdeModal" class="form-control" required>
            </div>
            <div class="col-md-3">
              <label for="fechaHastaModal" class="form-label">Fecha Hasta</label>
              <input type="date" id="fechaHastaModal" class="form-control" required>
            </div>
          </div>
          <div class="d-flex justify-content-end mb-2">
            <button type="button" class="btn btn-success me-2" id="btnExportarExcelModal"><i
                class="fas fa-file-excel"></i> Exportar a Excel</button>
            <button type="button" class="btn btn-warning me-2" id="btnLimpiarBusquedaModal"><i
                class="fas fa-eraser"></i>
              Limpiar</button>
            <button type="button" class="btn btn-info me-2" id="btnResumenProveedorModal"><i
                class="fas fa-list-alt"></i> Resumen Proveedor</button>
            <button type="submit" class="btn btn-primary">Buscar</button>
          </div>
        </form>
        <hr>
        <div id="resultadosProveedor">
          <!-- Aquí se mostrarán los resultados -->
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Modal Resumen Proveedor -->
<div class="modal fade" id="mdlResumenProveedor" tabindex="-1" aria-labelledby="mdlResumenProveedorLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="mdlResumenProveedorLabel">Resumen de Proveedor</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body">
        <!-- Aquí irá el contenido del resumen del proveedor -->
      </div>
    </div>
  </div>
</div>