<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Carga Productos</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Inicio</a></li>
          <li class="breadcrumb-item active">Carga Productos</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
  <div class="container-fluid">
    <!-- FILA PARA INPUT FILE -->
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Seleccionar Archivo de Productos (Excel)</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <form method="post" enctype="multiplart/form-data" id="form_carga_productos">
              <div class="row">
                <div class="col-10">
                  <input type="file" name="fileProductos" id="fileProductos" class="form-control" accept=".xls, .xlsx">
                </div>
                <div class="col-2">
                  <input type="submit" value="Cargar Productos" class="btn btn-primary" id="btnCargar">
                </div>
              </div>
            </form>
          </div>

        </div>
      </div>
    </div>

    <!-- FILA PARA GIF -->
    <div class="row mx-0">
      <div class="col-12 text-center">
        <img src="vistas/assets/imagenes/loading.gif" style="display:none;" id="img_carga">
      </div>
    </div>
  </div><!-- /.container-fluid -->
</div>
<!-- /.content -->

<script>
$(document).ready(function() {

  $("#form_carga_productos").on("submit", function(e) {

    e.preventDefault();

    //VALIDAR LA SELECCION DE UN ARCHIVO
    if ($("#fileProductos").get(0).files.length == 0) {
      Swal.fire({
        position: 'center',
        icon: 'warning',
        title: 'Debe seleccionar un archivo (Excel)!!',
        showConfirmButton: false,
        timer: 2500
      })
    } else {
      //VALIDAR QUE SOLO SEA XLS
      let extensiones_permitidas = [".xls", ".xlsx"];
      let input_file_productos = $("#fileProductos");
      let exp_reg = new RegExp("([a-zA-Z0-9\s_\\-.\:])+(" + extensiones_permitidas.join('|') + ")$");

      if (!exp_reg.test(input_file_productos.val().toLowerCase())) {
        Swal.fire({
          position: 'center',
          icon: 'warning',
          title: 'Debe seleccionar un archivo con extension .xls o .xlsx',
          showConfirmButton: false,
          timer: 2500
        })

        return false;

      }

      let datos = new FormData($(form_carga_productos)[0]);

      $("#btnCargar").prop("disabled", true);
      $("#img_carga").attr("style", "display:block")
      $("#img_carga").attr("style", "height:200px")
      $("#img_carga").attr("style", "width:200px")

      $.ajax({
        type: "POST",
        url: "ajax/productos.ajax.php",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(response) {
          console.log("respuesta", response);

          if (response['totalCategorias'] > 0 && response['totalProductos'] > 0) {
            Swal.fire({
              position: 'center',
              icon: 'success',
              title: 'Registro' + response['totalCategorias'] + ' categorias y' + response[
                'totalProductos'] + 'correctamente',
              showConfirmButton: false,
              timer: 2500
            })

            $("#btnCargar").prop("disabled", false);
            $("#img_carga").attr("style", "display:none");

          } else {
            Swal.fire({
              position: 'center',
              icon: 'error',
              title: 'se producjo un error de reistro de datos',
              showConfirmButton: false,
              timer: 2500
            })

            $("#btnCargar").prop("disabled", false);
            $("#img_carga").attr("style", "display:none");
          }
        }
      });

    }

  })
})
</script>