<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Administracion de Proveedores</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Inicio</a></li>
          <li class="breadcrumb-item active">Proveedores</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content pb-2">
  <div class="row p-0 m-0">

    <!-- LISTADO DE PROVEEDORES -->
    <div class="col-md-9">
      <div class="card card-info card-outline shadow">
        <div class="card-header">
          <h3 class="card-title"><i class="fas fa-list"></i> Listado General de Proveedores</h3>
        </div>
        <div class="card-body">
          <table id="lstProveedores" class="display nowrap table-striped w-100 shadow rounded">
            <thead class="bg-info text-left">
              <th>id</th>
              <th>Empresa</th>
              <th>NIT</th>
              <th>Telefono</th>
              <th>Direccion</th>
              <th>Estado</th>
              <th>Opciones</th>
              <th>R. Social</th>
              <th>F. Registro</th>
            </thead>

            <tbody class="small text left"></tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- DATOS PRINCIPALES DE PROVEEDORES -->
    <div class="col-md-3">
      <div class="card card-info card-outline shadow">
        <div class="card-header">
          <h3 class="card-title"><i class="fas fa-edit"></i> Registro/Modificacion <span>Proveedores</span></h3>
        </div>
        <div class="card-body">
          <form class="needs-validation" novalidate>
            <div class="row">

              <div class="col-md-12">

                <!-- INPUT fecha categoria -->
                <div class="form-group mb-2">

                  <label class="col-form-label" for="iptFecha">
                    <i class="fas fa-calendar fs-6"></i>
                    <span class="small">Fecha Registro</span>
                  </label>

                  <input type="text" class="form-control form-control-sm" id="iptFecha" value="" readonly>


                </div>

              </div>

              <div class="col-md-12">
                <div class="form-group mb-2">

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

              <div class="col-md-12">
                <div class="form-group mb-2">

                  <label class="col-form-label" for="iptNombreEmpresa">
                    <i class="fas fa-user f-6"></i>
                    <span class="small">Nombre de la Empresa</span><span class="text-danger">*</span>
                  </label>

                  <input type="text" class="form-control form-control-sm" id="iptNombreEmpresa" name="iptNombreEmpresa"
                    placeholder="Ingrese Nombre de la Empresa" onKeyUp="javascript:this.value=this.value.toUpperCase();"
                    required>

                  <div class="invalid-feedback">Debe ingresar la Nombre de la Empresa</div>

                </div>
              </div>

              <div class="col-md-12">
                <div class="form-group mb-2">

                  <label class="col-form-label" for="iptNumeroFono">
                    <i class="fas fa-phone f-6"></i>
                    <span class="small">Numero Telefono</span><span class="text-danger">*</span>
                  </label>

                  <input type="text" class="form-control form-control-sm" id="iptNumeroFono" name="iptNumeroFono"
                    placeholder="Ingrese Numero de Telefono" required>

                  <div class="invalid-feedback">Debe ingresar Numero Telefono</div>

                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group mb-2">

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

              <div class="col-md-12">
                <div class="form-group mb-2">

                  <label class="col-form-label" for="iptNumeroNit">
                    <i class="fas fa-book f-6"></i>
                    <span class="small">Numero de NIT</span><span class="text-danger">*</span>
                  </label>

                  <input type="text" class="form-control form-control-sm" id="iptNumeroNit" name="iptNumeroNit"
                    placeholder="Ingrese la Numero de NIT" required>

                  <div class="invalid-feedback">Debe ingresar el NIT</div>

                </div>
              </div>

            </div>

            <div class="col-md-12">
              <div class="form-group m-0 mb-2">
                <a style="cursor:pointer;" class="btn btn-primary btn-sm w-100" id="btnRegistrarProveedor">
                  Registrar Proveedor
                </a>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group m-0 mb-2">
                <a style="cursor:pointer;" class="btn btn-success btn-sm w-100" id="btnRegistrarDatosProveedor">
                  Datos Proveedor
                </a>
              </div>
            </div>
          </form>

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

    idProveedor = 0;

    var tableProveedores = $('#lstProveedores').DataTable({
      dom: 'Bfrtip',
      buttons: [{
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
        url: 'ajax/proveedores.ajax.php',
        dataSrc: ""
      },
      responsive: {
        details: {
          type: 'column'
        }
      },
      "autoWidth": false,
      columnDefs: [{
          "className": "dt-center",
          "targets": "_all"
        },
        {
          targets: [7, 8],
          visible: false
        },
        {
          targets: 6,
          sortable: false,
          render: function(data, type, full, meta) {
            return "<center>" +
              "<span class='btnEditarProveedores text-primary px-1' style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='Editar Proveedor'>" +
              "<i class='fas fa-pencil-alt fs-5'></i> " +
              "</span> " +
              "<span class='btnEliminarProveedores text-danger px-1' style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='Eliminar Proveedor'>" +
              "<i class='fas fa-trash fs-5'> </i> " +
              "</span>" +
              "</center>";
          }
        }
      ],
      "order": [
        [0, 'desc']
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

    $('#lstProveedores tbody').on('click', '.btnEditarProveedores', function() {

      let data = tableProveedores.row($(this).parents('tr')).data();

      //console.log(data);
      if ($(this).parents('tr').hasClass('selected')) {

        $(this).parents('tr').removeClass('selected');

        idProveedor = 0;

        $("#iptRazonSocial").val("");
        $("#iptNombreEmpresa").val("");
        $("#iptNumeroFono").val("");
        $("#iptDireccion").val("");
        $("#iptNumeroNit").val("");
        $("#iptFecha").val("");

      } else {

        tableProveedores.$('tr.selected').removeClass('selected');

        $(this).parents('tr').addClass('selected')

        idProveedor = data[0];
        $("#iptRazonSocial").val(data[7]);
        $("#iptNombreEmpresa").val(data[1]);
        $("#iptNumeroFono").val(data[3]);
        $("#iptDireccion").val(data[4]);
        $("#iptNumeroNit").val(data[2]);
        $("#iptFecha").val(data[8]);

      }

    })

    /*   $('#lstClientes tbody').on('click', '.btnEliminarClientes', function() {

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
      })*/

    document.getElementById("btnRegistrarProveedor").addEventListener("click", function() {
      // Get the forms we want to add validation styles to 
      var forms = document.getElementsByClassName('needs-validation');
      // Loop over them and prevent submission 
      var validation = Array.prototype.filter.call(forms, function(form) {

        if (form.checkValidity() === true) {

          razonSocial = $("#iptRazonSocial").val();
          nombreEmpresa = $("#iptNombreEmpresa").val();
          telefono = $("#iptNumeroFono").val();
          direccion = $("#iptDireccion").val();
          nit = $("#iptNumeroNit").val();
          //fechaAct = date("Y-m-d");

          let datos = new FormData();

          datos.append("idProveedor", idProveedor);
          datos.append("razonSocial", razonSocial);
          datos.append("nombreEmpresa", nombreEmpresa);
          datos.append("telefono", telefono);
          datos.append("direccion", direccion);
          datos.append("nit", nit);
          //datos.append("fechaRegistro", fechaAct);

          Swal.fire({
            title: 'Está seguro de guardar al proveedor?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Aceptar!',
            cancelButtonText: 'Cancelar!',
          }).then((result) => {
            if (result.isConfirmed) {
              $.ajax({
                url: "ajax/proveedores.ajax.php",
                type: "POST",
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(respuesta) {
                  console.log("respuesta", respuesta);
                  Toast.fire({
                    icon: 'success',
                    title: respuesta
                  });

                  idProveedor = 0;

                  $("#iptRazonSocial").val("");
                  $("#iptNombreEmpresa").val("");
                  $("#iptNumeroFono").val("");
                  $("#iptDireccion").val("");
                  $("#iptNumeroNit").val("");
                  $("#iptFecha").val("");

                  tableProveedores.ajax.reload();
                  $(".needs-validation").removeClass("was-validated");
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