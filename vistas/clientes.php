<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Administracion de Clientes</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Inicio</a></li>
          <li class="breadcrumb-item active">Clientes</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content pb-2">
  <div class="row p-0 m-0">
    <div class="col-md-12">
      <div class="card card-info card-outline shadow">
        <div class="card-header">
          <h3 class="card-title"><i class="fas fa-list"></i> Listado General de Clientes</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-primary btn-sm" id="btnNuevoCliente">
              <i class="fas fa-plus"></i> Nuevo Cliente
            </button>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table id="lstClientes" class="display nowrap table-striped w-100 shadow rounded">
            <thead class="bg-info text-left">
              <th>id</th> <!--0 -->
              <th>Razon Social</th> <!--1 -->
              <th>NIT</th> <!-- 2 -->
              <th>Telefono</th> <!--3 -->
              <th>Direccion</th> <!--4 -->
              <th>Zona</th> <!--5 --> 
              <th>Cate.</th> <!--6 -->
              <th>Opciones</th> <!--7 -->
              <th>Titular</th> <!--8 -->
              <th>Tipo</th> <!--9 -->
              <th>Fecha</th> <!--10 -->
            </thead>

            <tbody class="small text left"></tbody>
          </table>
          </div>
        </div>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</div>
<!-- /.content -->

<!-- Modal Registro/Modificacion Clientes -->
<div class="modal fade" id="modalCliente" tabindex="-1" role="dialog" aria-labelledby="modalClienteLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-info text-white">
        <h5 class="modal-title" id="modalClienteLabel">
          <i class="fas fa-user-plus"></i> Registro/Modificación de Clientes
        </h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="needs-validation" novalidate>
          <div class="row">

            <div class="col-md-6">
              <div class="form-group mb-3">
                <label class="col-form-label" for="iptFecha">
                  <i class="fas fa-calendar fs-6"></i>
                  <span class="small">Fecha Registro</span>
                </label>
                <input type="text" class="form-control form-control-sm" id="iptFecha" value="" readonly>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group mb-3">
                <label class="col-form-label" for="iptSelCategoria">
                  <i class="fas fa-check fs-6"></i>
                  <span class="small">Categoria</span><span class="text-danger">*</span>
                </label>
                <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="iptSelCategoria" required>
                  <option value="" selected="true">Seleccione Categoria</option>
                  <option value="A">A</option>
                  <option value="B">B</option>
                  <option value="C">C</option>
                </select>
                <div class="invalid-feedback">Debe ingresar Categoria</div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group mb-3">
                <label class="col-form-label" for="iptRazonSocial">
                  <i class="fas fa-building f-6"></i>
                  <span class="small">Razon Social</span><span class="text-danger">*</span>
                </label>
                <input type="text" class="form-control form-control-sm" id="iptRazonSocial" name="iptRazonSocial"
                  placeholder="Ingrese la Razon Social" onKeyUp="javascript:this.value=this.value.toUpperCase();"
                  required>
                <div class="invalid-feedback">Debe ingresar la Razon Social</div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group mb-3">
                <label class="col-form-label" for="iptNitEmpresa">
                  <i class="fas fa-id-card f-6"></i>
                  <span class="small">Nit Empresa</span><span class="text-danger">*</span>
                </label>
                <input type="text" class="form-control form-control-sm" id="iptNitEmpresa" name="iptNitEmpresa"
                  placeholder="Ingrese Nit de la Empresa" required>
                <div class="invalid-feedback">Debe ingresar la Nit de la Empresa</div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group mb-3">
                <label class="col-form-label" for="iptNombreEmpresa">
                  <i class="fas fa-user f-6"></i>
                  <span class="small">Nombre Cliente</span><span class="text-danger">*</span>
                </label>
                <input type="text" class="form-control form-control-sm" id="iptNombreEmpresa" name="iptNombreEmpresa"
                  placeholder="Ingrese Nombre de la Empresa" onKeyUp="javascript:this.value=this.value.toUpperCase();"
                  required>
                <div class="invalid-feedback">Debe ingresar la Nombre del Cliente</div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group mb-3">
                <label class="col-form-label" for="iptNumeroFono">
                  <i class="fas fa-phone f-6"></i>
                  <span class="small">Numero Telefono</span><span class="text-danger">*</span>
                </label>
                <input type="text" class="form-control form-control-sm" id="iptNumeroFono" name="iptNumeroFono"
                  placeholder="Ingrese Numero de Telefono" required>
                <div class="invalid-feedback">Debe ingresar Numero Telefono</div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group mb-3">
                <label class="col-form-label" for="iptDireccion">
                  <i class="fas fa-map-marker f-6"></i>
                  <span class="small">Direccion</span><span class="text-danger">*</span>
                </label>
                <input type="text" class="form-control form-control-sm" id="iptDireccion" name="iptDireccion"
                  placeholder="Ingrese la Direccion" onKeyUp="javascript:this.value=this.value.toUpperCase();"
                  required>
                <div class="invalid-feedback">Debe ingresar la Direccion</div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group mb-3">
                <label class="col-form-label" for="iptZona">
                  <i class="fas fa-map-marker f-6"></i>
                  <span class="small">Zona</span><span class="text-danger">*</span>
                </label>
                <input type="text" class="form-control form-control-sm" id="iptZona" name="iptZona"
                  placeholder="Ingrese la Zona" onKeyUp="javascript:this.value=this.value.toUpperCase();"
                  required>
                <div class="invalid-feedback">Debe ingresar la Zona</div>
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group mb-3">
                <label class="col-form-label" for="iptTipoEmpresa">
                  <i class="fas fa-bars f-6"></i>
                  <span class="small">Tipo Empresa</span><span class="text-danger">*</span>
                </label>
                <input type="text" class="form-control form-control-sm" id="iptTipoEmpresa" name="iptTipoEmpresa"
                  placeholder="Ingrese Tipo Empresa" onKeyUp="javascript:this.value=this.value.toUpperCase();"
                  required>
                <div class="invalid-feedback">Debe ingresar el Tipo</div>
              </div>
            </div>

          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
          <i class="fas fa-times"></i> Cancelar
        </button>
        <button type="button" class="btn btn-primary" id="btnRegistrarCliente">
          <i class="fas fa-save"></i> Guardar Cliente
        </button>
      </div>
    </div>
  </div>
</div>

<script>
  var Toast = Swal.mixin({
    toast: true,
    position: 'top',
    showConfirmButton: false,
    timer: 3000
  });

  $(document).ready(function() {
    
    idCliente = 0;
    
    // Reset form when modal is hidden
    $('#modalCliente').on('hidden.bs.modal', function () {
      idCliente = 0;
      $("#iptRazonSocial").val("");
      $("#iptNitEmpresa").val("");
      $("#iptNombreEmpresa").val("");
      $("#iptNumeroFono").val("");
      $("#iptDireccion").val("");
      $("#iptZona").val("");
      $("#iptTipoEmpresa").val("");
      $("#iptFecha").val("");
      $("#iptSelCategoria").val("");
      $(".needs-validation").removeClass("was-validated");
      $('#lstClientes tbody tr.selected').removeClass('selected');
    });
    
    // Open modal for new client
    $('#btnNuevoCliente').on('click', function() {
      idCliente = 0;
      $("#iptRazonSocial").val("");
      $("#iptNitEmpresa").val("");
      $("#iptNombreEmpresa").val("");
      $("#iptNumeroFono").val("");
      $("#iptDireccion").val("");
      $("#iptZona").val("");
      $("#iptTipoEmpresa").val("");
      $("#iptFecha").val("");
      $("#iptSelCategoria").val("");
      $(".needs-validation").removeClass("was-validated");
      $('#lstClientes tbody tr.selected').removeClass('selected');
      $('#modalCliente').modal('show');
    });

    var tableClientes = $('#lstClientes').DataTable({
      dom: 'Bfrtip',
      buttons: [
        {
          extend: "excelHtml5",
          text: '<i class="fas fa-file-excel"></i> ',
          titleAttr: "Exportar a Excel",
          className: "btn btn-success",
        },
        {
          extend: "pdfHtml5",
          text: '<i class="fas fa-file-pdf"></i> ',
          titleAttr: "Exportar a PDF",
          className: "btn btn-danger",
          orientation: "landscape",
          pageSize: "LEGAL",
        },
        'pageLength',
      ],
      ajax: {
        url: 'ajax/clientes.ajax.php',
        dataSrc: ""
      },
      responsive: {
        details: {
          type: 'column'
        }
      },
      "autoWidth": false,
      columnDefs: [{
          targets: 0, // your case first column
          className: "text-center"
        },
        {
          targets: 2, // your case first column
          className: "text-center"
        },
        {
          targets: 3, // your case first column
          className: "text-center"
        },
         {
          targets: 6, // your case first column
          className: "text-center"
        },
        {
          targets: 8,
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
          targets: 7,
          sortable: false,
          render: function(data, type, full, meta) {
            return "<center>" +
              "<span class='btnEditarClientes text-primary px-1' style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='Editar Categoria'>" +
              "<i class='fas fa-pencil-alt fs-5'></i> " +
              "</span> " +
              "<span class='btnEliminarClientes text-danger px-1' style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='Eliminar Categoria'>" +
              "<i class='fas fa-trash fs-5'> </i> " +
              "</span>" +
              "</center>";
          }
        }
      ],
      "order": [
        [0, 'asc']
      ],
      lengthMenu: [0, 5, 10, 15, 20, 50],
      "pageLength": 15,
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

    $('#lstClientes tbody').on('click', '.btnEditarClientes', function() {

      let data = tableClientes.row($(this).parents('tr')).data();

      //console.log(data);
      if ($(this).parents('tr').hasClass('selected')) {

        $(this).parents('tr').removeClass('selected');

        idCliente = 0;

        $("#iptRazonSocial").val("");
        $("#iptNitEmpresa").val("");
        $("#iptNombreEmpresa").val("");
        $("#iptNumeroFono").val("");
        $("#iptDireccion").val("");
        $("#iptZona").val("");
        $("#iptTipoEmpresa").val("");
        $("#iptFecha").val("");
        $("#iptSelCategoria").val("");

      } else {

        tableClientes.$('tr.selected').removeClass('selected');

        $(this).parents('tr').addClass('selected')

        idCliente = data[0];
        $("#iptRazonSocial").val(data[1]);
        $("#iptNitEmpresa").val(data[2]);
        $("#iptNombreEmpresa").val(data[8]);
        $("#iptNumeroFono").val(data[3]);
        $("#iptDireccion").val(data[4]);
        $("#iptZona").val(data[5]);
        $("#iptSelCategoria").val(data[6]);
        $("#iptTipoEmpresa").val(data[9]);
        $("#iptFecha").val(data[10]);
        
        // Open modal when editing
        $('#modalCliente').modal('show');

      }

    })

    $('#lstClientes tbody').on('click', '.btnEliminarClientes', function() {

      var data = tableClientes.row($(this).parents('tr')).data();
      var cod_cliente = data[0];

      Swal.fire({
        title: 'Está seguro de eliminar el cliente ' + data[1] + '?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Aceptar!',
        cancelButtonText: 'Cancelar!',
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            url: "ajax/clientes.ajax.php",
            type: "POST",
            data: {
              accion: '2',
              cod_cliente: cod_cliente
            },
            success: function(respuesta) {

              Toast.fire({
                icon: 'success',
                title: respuesta
              });

              tableClientes.ajax.reload();
            }

          });
        }
      })
    })

    document.getElementById("btnRegistrarCliente").addEventListener("click", function() {
      // Get the forms we want to add validation styles to 
      var forms = document.getElementsByClassName('needs-validation');
      // Loop over them and prevent submission 
      var validation = Array.prototype.filter.call(forms, function(form) {

        if (form.checkValidity() === true) {

          razonSocial = $("#iptRazonSocial").val();
          nombreEmpresa = $("#iptNombreEmpresa").val();
          nitEmpresa = $("#iptNitEmpresa").val();
          telefono = $("#iptNumeroFono").val();
          direccion = $("#iptDireccion").val();
          zona = $("#iptZona").val();
          tipoEmpresa = $("#iptTipoEmpresa").val();
          categoria = $("#iptSelCategoria").val();
          //fechaAct = date("Y-m-d");

          let datos = new FormData();

          datos.append("idCliente", idCliente);
          datos.append("razonSocial", razonSocial);
          datos.append("nombreEmpresa", nombreEmpresa);
          datos.append("telefono", telefono);
          datos.append("direccion", direccion);
          datos.append("tipoEmpresa", tipoEmpresa);
          datos.append("categoria", categoria);
          datos.append("nitEmpresa", nitEmpresa);
          datos.append("zona", zona);
          //datos.append("fechaRegistro", fechaAct);

          Swal.fire({
            title: 'Está seguro de guardar al cliente?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Aceptar!',
            cancelButtonText: 'Cancelar!',
          }).then((result) => {
            if (result.isConfirmed) {
              $.ajax({
                url: "ajax/clientes.ajax.php",
                type: "POST",
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(respuesta) {
                  //console. log("respuesta", respuesta) ;
                  Toast.fire({
                    icon: 'success',
                    title: respuesta
                  });

                  idCliente = 0;
                  // categoria = "";
                  // subcategoria = "";

                  $("#iptRazonSocial").val("");
                  $("#iptNombreEmpresa").val("");
                  $("#iptNitEmpresa").val("");
                  $("#iptNumeroFono").val("");
                  $("#iptDireccion").val("");
                  $("#iptZona").val("");
                  $("#iptTipoEmpresa").val("");
                  $("#iptFecha").val("");
                  $("#iptSelCategoria").val("");

                  tableClientes.ajax.reload();
                  $(".needs-validation").removeClass("was-validated");
                  
                  // Close modal after saving
                  $('#modalCliente').modal('hide');
                  
                  // Remove selected row
                  $('#lstClientes tbody tr.selected').removeClass('selected');
                }

              });

            }

          })

        }

        form.classList.add('was-validated');
      })
    });

  }) //final ready
</script>