<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Administracion de Usuarios</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Inicio</a></li>
          <li class="breadcrumb-item active">Usuarios</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content pb-2">
  <div class="row p-0 m-0">
    <div class="col-md-9">
      <div class="card card-info card-outline shadow">
        <div class="card-header">
          <h3 class="card-title"><i class="fas fa-list"></i> Listado General de Usuarios</h3>
        </div>
        <div class="card-body">
          <table id="lstUsuarios" class="display nowrap table-striped w-100 shadow rounded">
            <thead class="bg-info text-left">
              <th>id</th>
              <th>Nombre Completo</th>
              <th>Usuario</th>
              <th>Password</th>
              <th>Perfil</th>
              <th>Estado</th>
              <th>Telefono</th>
              <th>Email</th>
              <th>F. Creacion</th>
              <th>Acciones</th>
              <th>IdPerfil</th>
              <th>IdEstado</th>
            </thead>

            <tbody class="small text left"></tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- DATOS PRINCIPALES DE USUARIOS -->
    <div class="col-md-3">
      <div class="card card-info card-outline shadow">
        <div class="card-header">
          <h3 class="card-title"><i class="fas fa-edit"></i> Registro/Modificacion <span>Usuarios</span></h3>
        </div>
        <div class="card-body">
          <form class="needs-validation" novalidate>
            <div class="row">

              <div class="col-md-12">

                <!-- INPUT fecha categoria -->
                <div class="form-group mb-2">

                  <label class="col-form-label" for="iptFechaRegistro">
                    <i class="fas fa-calendar fs-6"></i>
                    <span class="small">Fecha Registro</span>
                  </label>

                  <input type="text" class="form-control form-control-sm" id="iptFechaRegistro" value="" readonly>


                </div>

              </div>

              <div class="col-md-12">
                <div class="form-group mb-2">

                  <label class="col-form-label" for="iptNombreUsuario">
                    <i class="fas fa-user f-6"></i>
                    <span class="small">Nombre Usuario</span><span class="text-danger">*</span>
                  </label>

                  <input type="text" class="form-control form-control-sm" id="iptNombreUsuario" name="iptNombreUsuario"
                    placeholder="Ingrese la Nombres del Usuario"
                    onKeyUp="javascript:this.value=this.value.toUpperCase();" required>

                  <div class="invalid-feedback">Debe ingresar el Nombre Usuario</div>

                </div>
              </div>

              <div class="col-md-12">
                <div class="form-group mb-2">

                  <label class="col-form-label" for="iptEstadoUsuario">
                    <i class="fas fa-user f-6"></i>
                    <span class="small">Estado del Usuario</span><span class="text-danger">*</span>
                  </label>

                  <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="iptEstadoUsuario"
                    required>
                    <option value="">--Seleccion Estado--</option>
                    <option value="1">Activo</option>
                    <option value="2">Deasctivo</option>
                  </select>

                  <div class="invalid-feedback">Debe ingresar el Estado del Usuario</div>

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

                  <label class="col-form-label" for="iptUsuario">
                    <i class="fas fa-user f-6"></i>
                    <span class="small">Usuario</span><span class="text-danger">*</span>
                  </label>

                  <input type="text" class="form-control form-control-sm" id="iptUsuario" name="iptUsuario"
                    placeholder="Ingrese Usuario" onKeyUp="javascript:this.value=this.value.toLowerCase();" required>

                  <div class="invalid-feedback">Debe ingresar el Usuario</div>

                </div>
              </div>

              <div class="col-md-12">
                <div class="form-group mb-2">

                  <label class="col-form-label" for="iptPassword">
                    <i class="fas fa-key f-6"></i>
                    <span class="small">Password</span><span class="text-danger">*</span>
                  </label>

                  <input type="password" class="form-control form-control-sm" id="iptPassword" name="iptPassword"
                    placeholder="Ingrese el password">
                  <input type="hidden" id="passwordActual" name="passwordActual">
                  <div class="invalid-feedback">Debe ingresar el Password</div>

                </div>
              </div>

              <div class="col-md-12">
                <div class="form-group mb-2">

                  <label class="col-form-label" for="iptPerfilUsuario">
                    <i class="fas fa-users f-6"></i>
                    <span class="small">Perfil Usuario</span><span class="text-danger">*</span>
                  </label>

                  <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="iptPerfilUsuario"
                    required>
                    <option value="">---Seleccion Perfil--</option>
                    <option value="1">Administrador</option>
                    <option value="2">Vendedor</option>
                    <option value="3">Supervisor</option>
                    <option value="4">Distribuidor</option>
                  </select>

                  <div class="invalid-feedback">Debe ingresar el Perfil Usuario </div>

                </div>
              </div>

            </div>

            <div class="col-md-12">
              <div class="form-group m-0 mb-2">
                <a style="cursor:pointer;" class="btn btn-primary btn-sm w-100" id="btnRegistrarUsuario">
                  Registrar Usuario
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

  // Inicializar idUsuario en 0 para nuevos registros
  var idUsuario = 0;

  $(document).ready(function() {

    var tableUsuarios = $('#lstUsuarios').DataTable({
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
        url: 'ajax/usuarios.ajax.php',
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
          targets: 3,
          visible: false
        },
        {
          targets: 6,
          className: "text-center"
        },
        {
          targets: 7,
          visible: false
        },
        {
          targets: 8,
          className: "text-center"
        },
        {
          targets: 9,
          sortable: false,
          render: function(data, type, full, meta) {
            return "<center>" +
              "<span class='btnEditarUsuarios text-primary px-1' style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='Editar Categoria'>" +
              "<i class='fas fa-pencil-alt fs-5'></i> " +
              "</span> " +
              "<span class='btnEliminarUsuarios text-danger px-1' style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='Eliminar Categoria'>" +
              "<i class='fas fa-trash fs-5'> </i> " +
              "</span>" +
              "</center>";
          }
        },
        {
          targets: 10,
          visible: false
        },
        {
          targets: 11,
          visible: false
        },
      ],
      lengthMenu: [0, 5, 10, 15, 20, 50],
      "pageLength": 15,
      language: {
        "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
      }
    });

    $('#lstUsuarios tbody').on('click', '.btnEditarUsuarios', function() {

      let data = tableUsuarios.row($(this).parents('tr')).data();

      //console.log(data);
      if ($(this).parents('tr').hasClass('selected')) {

        $(this).parents('tr').removeClass('selected');

        idUsuario = 0;

        $("#iptNombreUsuario").val("");
        $("#iptEstadoUsuario").val("");
        $("#iptNumeroFono").val("");
        $("#iptUsuario").val("");
        $("#iptPassword").val("");
        $("#iptFechaRegistro").val("");
        $("#iptPerfilUsuario").val("");
        $("#passwordActual").val("");

      } else {

        tableUsuarios.$('tr.selected').removeClass('selected');

        $(this).parents('tr').addClass('selected')

        idUsuario = data[0];
        $("#iptFechaRegistro").val(data[8]);
        $("#iptNombreUsuario").val(data[1]);
        $("#iptEstadoUsuario").val(data[11]);
        $("#iptNumeroFono").val(data[6]);
        $("#iptUsuario").val(data[2]);
        //$("#iptPassword").val(data[3]);
        $("#iptPerfilUsuario").val(data[10]);
        $("#passwordActual").val(data[3]);

      }

    })

    document.getElementById("btnRegistrarUsuario").addEventListener("click", function() {
      // Get the forms we want to add validation styles to 
      var forms = document.getElementsByClassName('needs-validation');
      // Loop over them and prevent submission 
      var validation = Array.prototype.filter.call(forms, function(form) {

        if (form.checkValidity() === true) {

          iptFechaRegistro = $("#iptFechaRegistro").val();
          iptNombreUsuario = $("#iptNombreUsuario").val();
          iptEstadoUsuario = $("#iptEstadoUsuario").val();
          iptNumeroFono = $("#iptNumeroFono").val();
          iptUsuario = $("#iptUsuario").val();
          iptPassword = $("#iptPassword").val();
          iptPerfilUsuario = $("#iptPerfilUsuario").val();
          passwordActual = $("#passwordActual").val();

          let datos = new FormData();


          datos.append("idUsuario", idUsuario)
          datos.append("iptNombreUsuario", iptNombreUsuario)
          datos.append("iptEstadoUsuario", iptEstadoUsuario);
          datos.append("iptNumeroFono", iptNumeroFono)
          datos.append("iptUsuario", iptUsuario)
          datos.append("iptPassword", iptPassword)
          datos.append("iptPerfilUsuario", iptPerfilUsuario);
          datos.append("passwordActual", passwordActual);


          Swal.fire({
            title: 'Está seguro de guardar datos del usuario?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Aceptar!',
            cancelButtonText: 'Cancelar!',
          }).then((result) => {
            if (result.isConfirmed) {
              $.ajax({
                url: "ajax/usuarios.ajax.php",
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

                  idUsuario = 0;
                  iptNombreUsuario = "";
                  //subcategoria = "";

                  $("#iptNombreUsuario").val("");
                  $("#iptEstadoUsuario").val("");
                  $("#iptNumeroFono").val("");
                  $("#iptUsuario").val("");
                  $("#iptPassword").val("");
                  $("#iptFechaRegistro").val("");
                  $("#iptPerfilUsuario").val("");
                  $("#passwordActual").val("");

                  tableUsuarios.ajax.reload();
                  $(".needs-validation").removeClass("was-validated");
                }

              });

            }

          })

        }

        form.classList.add('was-validated');
      })
    });

    $('#lstUsuarios tbody').on('click', '.btnEliminarUsuarios', function() {

      var data = tableUsuarios.row($(this).parents('tr')).data();
      var codigo_usuario = data[0];

      Swal.fire({
        title: 'Está seguro de eliminar al Usuario ' + data[1] + '?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Aceptar!',
        cancelButtonText: 'Cancelar!',
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            url: "ajax/usuarios.ajax.php",
            type: "POST",
            data: {
              accion: '2',
              codigo_usuario: codigo_usuario
            },
            success: function(respuesta) {

              Toast.fire({
                icon: 'success',
                title: respuesta
              });

              tableUsuarios.ajax.reload();
            }

          });
        }
      })
    })
  })
</script>