<!-- Content Header (Page header) -->
<div class="content-header pb-1">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h2 class="m-0 fw-bold">Administrar Ofertas</h2>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
          <li class="breadcrumb-item active">Administrar Ofertas</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<div class="content">

  <div class="col-12 ">

    <div class="row">

      <!--LISTADO DE BOLETAS -->
      <div class="col-md-12">
        <table id="tbl_ofertas" class="table table-info w-100 shadow border border-secondary">
          <thead class="text-center">
            <th></th>
            <th>Id</th>
            <th>Nro. Oferta</th>
            <th>Id Proveedor</th>
            <th>Proveedor</th>
            <th>Fec. Inicio</th>
            <th>Fec. Final</th>
            <th>Codigo</th>
            <th>Descripcion</th>
            <th>Unidad Medida</th>
            <th>Id Categoria</th>
            <th>Categoria</th>
            <th>Fec. Registro</th>
            <th>Total Oferta</th>
            <th>Estado</th>
          </thead>
        </table>
      </div>

    </div>

  </div>

</div> <!-- //fin content -->

<!-- Modal -->
<div class="modal fade" id="modalEditarOferta" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl " role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title fw-bold">Editar Oferta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="btnCerrarModal">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <table id="tblDetalleOferta" class="table table-bordered table-striped w-100">
          <thead>
            <tr>
              <th>Id</th>
              <th>Boleta</th>
              <th>Cod. Producto</th>
              <th>Categoria</th>
              <th>Producto</th>
              <th>Cantidad</th>
              <th>Precio</th>
              <th>Total</th>
            </tr>
          </thead>
          <tbody></tbody>
        </table>
        <div class="card-footer pb-0">
          <h4 class="float-right">Total Oferta Bs. <span id="spnTotalOferta">0.00</span></h4>
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
  let itemProducto = 1;

  $(document).ready(function() {

    fnc_CargarDataTableListadoCompras();

    $('#tbl_ofertas tbody').on('click', '.btnConfirmarOferta', function() {
      fnc_ConfirmarOferta($("#tbl_ofertas").DataTable().row($(this).parents('tr')).data());
    })

    $('#tbl_ofertas tbody').on('click', '.btnEditarOferta', function() {
      fnc_EditarOferta($("#tbl_ofertas").DataTable().row($(this).parents('tr')).data());
    });

  }); //fin de ready

  /*===================================================================*/
  //CARGAR DATATABLE DE PRODUCTOS A COMPRAR
  /*===================================================================*/
  function fnc_CargarDataTableListadoCompras() {

    //alert('cargando datatable ofertas')

    /* if ($.fn.DataTable.isDataTable('#tbl_ofertas')) {
      $('#tbl_ofertas').DataTable().destroy();
    }
    $('#tbl_ofertas tbody').empty(); */

    try {
      const dtInstance = $('#tbl_ofertas').DataTable();
      dtInstance.clear().destroy();
    } catch (e) {
      console.error('Error en destrucción:', e);
    } finally {
      $('#tbl_ofertas').closest('.dataTables_wrapper').remove();
      $('#tbl_ofertas tbody').empty().off();
    }

    $("#tbl_ofertas").DataTable({
      dom: 'Bfrtip',
      buttons: [{
        extend: 'excel',
        title: function() {
          var printTitle = 'LISTADO DE OFERTAS';
          return printTitle
        }
      }, 'pageLength'],
      scrollX: true,
      scrollCollapse: true,
      fixedColumns: {
        left: 2,
        right: 1
      },
      initComplete: function() {
        this.api().columns.adjust();
      },
      ajax: {
        url: "ajax/admOfertas.ajax.php",
        dataSrc: '',
        type: "POST",
        data: {
          'accion': 'obtener_ofertas'
        },
      },
      columnDefs: [{
          "className": "dt-center",
          "targets": "_all"
        },
        {
          targets: [1, 3, 10],
          visible: false
        },
        {
          targets: 14,
          createdCell: function(td, cellData, rowData, row, col) {

            if (rowData[14] == 'CONFIRMADO') {
              $(td).html('<span class="bg-success px-2 py-1 rounded-pill fw-bold"> ' + rowData[14] + ' </span>')
            }

            if (rowData[14] == 'REGISTRADO') {
              $(td).html('<span class="bg-warning px-2 py-1 rounded-pill fw-bold text-white"> ' + rowData[14] +
                ' </span>')
            }
          }
        },
        {
          targets: 0,
          orderable: false,
          createdCell: function(td, cellData, rowData, row, col) {

            if (rowData[14] != 'CONFIRMADO') {
              $(td).html("<center>" +
                "<span class='btnMostrarOferta   px-1' style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='Mostrar Oferta'>" +
                "<i class='fas fa-eye fs-5 text-primary'></i>" +
                "</span>" +
                "<span class='btnEditarOferta   px-1' style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='Editar Oferta'>" +
                "<i class='fas fa-edit fs-5 text-warning'></i>" +
                "</span>" +
                "<span class='btnConfirmarOferta  px-1' style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='Confirmar Oferta / Actualizar Stock'>" +
                "<i class='fas fa-check-double fs-5 text-success'></i>" +
                "</span>" +
                "</center>");
            } else {
              $(td).html("<center>" +
                "<span class='btnMostrarOferta   px-1' style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='Mostrar Oferta'>" +
                "<i class='fas fa-eye fs-5 text-info'></i>" +
                "</span>" +
                "</center>");
            }

          }
        },
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

  /*==========================================================================================================================================
  C O N F I R M A R   C O M P R A
  *=========================================================================================================================================*/
  /* function fnc_ConfirmarOferta(data) {
    console.log("🚀 ~ file: compras.php:1831 ~ fnc_ConfirmarCompra ~ data:", data)

    Swal.fire({
      title: 'Está seguro(a) de confirmar la Oferta?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si, deseo confirmarla!',
      cancelButtonText: 'Cancelar',
    }).then((result) => {

      if (result.isConfirmed) {

        /* var formData = new FormData();
        formData.append('accion', 'confirmar_oferta');
        formData.append('serie', data["7"]);
        formData.append('correlativo', data["8"]);
        formData.append('id_compra', data["1"]);

        response = SolicitudAjax('ajax/compras.ajax.php', 'POST', formData);
        console.log("🚀 ~ file: compras.php:2033 ~ fnc_ConfirmarCompra ~ response:", response)

        Swal.fire({
          position: 'top-center',
          icon: response.tipo_msj,
          title: response.msj,
          showConfirmButton: true
        })

        fnc_CargarDataTableListadoCompras(); 

      }
    })
  }*/


  /*==========================================================================================================================================
  C A R G A R   D A T O S   P A R A   E D I C I O N
  *=========================================================================================================================================*/
  function fnc_EditarOferta(data) {

    console.log("🚀 ~ file: compras.php:1831 ~ fnc_EditarCompra ~ data:", data)
    nroBoletaOferta = data["1"];

    if ($.fn.DataTable.isDataTable('#tblDetalleOferta')) {
      $('#tblDetalleOferta').DataTable().destroy();
    }

    $('#tblDetalleOferta tbody').empty();

    $('#tblDetalleOferta').DataTable({
      columns: [{
          data: 'detalle_oferta_id'
        },
        {
          data: 'nro_oferta'
        },
        {
          data: 'codigo_producto'
        },
        {
          data: 'nombre_categoria'
        },
        {
          data: 'producto'
        },
        {
          data: 'cantidad'
        },
        {
          data: 'precio'
        },
        {
          data: 'total'
        }
      ],
      processing: true,
      serverSide: true,
      paging: false,
      ajax: {
        url: 'ajax/EditTable/obtener_detalle_oferta.php',
        type: 'POST',
        dataType: 'json',
        data: {
          'nro_oferta': nroBoletaOferta
        },
        "dataSrc": function(output) {

          console.log("~ file: administrar_ventas.php ~ line 475 ~ $ ~ output", output)

          var TotalOferta = 0.00;

          for (let i = 0; i < output["data"].length; i++) {
            TotalOferta = (parseFloat(output["data"][i][6]) + parseFloat(TotalOferta)).toFixed(2);
          }

          $("#spnTotalOferta").html(TotalOferta);

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
    $("#modalEditarOferta").modal('show');
  }

  //EVENTO PARA ACTUALIZAR LA VENTANA MODAL
  $('#tblDetalleOferta').on('draw.dt', function() {

    $('#tblDetalleOferta').Tabledit({
      url: 'ajax/EditTable/acciones_oferta_datatable.php',
      dataType: 'json',
      columns: {
        identifier: [0, 'detalle_oferta_id'],
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
          $('#' + data.nro_oferta).remove();
          $('#tblDetalleOferta').DataTable().ajax.reload();
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

          $('#tblDetalleOferta').DataTable().ajax.reload();
          table.ajax.reload();
        }
      }
    });

    /*EVENTO PARA CERRAR LA VENTANA MODAL*/
    $("#btnCerrarModal, #btnCloseModal").on("click", function() {
      $("#modalEditarOferta").modal('hide');
    });
  });
</script>