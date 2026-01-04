<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Administrar categorías | Sub Categorias</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Inicio</a></li>
          <li class="breadcrumb-item">Productos</li>
          <li class="breadcrumb-item active">Categorias</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content pb-2">
  <div class="row p-0 m-0">

    <!-- LISTADO DE CATEGORIAS -->
    <div class="col-md-8">
      <div class="card card-info card-outline shadow">
        <div class="card-header">
          <h3 class="card-title"><i class="fas fa-list"></i> Listado de Categorías</h3>
        </div>
        <div class="card-body">
          <table id="lstCategorias" class="display nowrap table-striped w-100 shadow rounded">
            <thead class="bg-info text-left">
              <th>id</th>
              <th>Categoria</th>
              <th>SubCategorias</th>
              <th>F. Actualizacion</th>
              <th>Opciones</th>
            </thead>

            <tbody class="small text left"></tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- REGISTRO/ACTUALIZACION DE CATEGORIAS -->
    <div class="col-md-4">
      <div class="card card-info card-outline shadow">
        <div class="card-header">
          <h3 class="card-title"><i class="fas fa-edit"></i> Registro/Modificacion <span>Categorias</span></h3>
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

                  <label class="col-form-label" for="iptCategoria">
                    <i class="fas fa-dumpster f-6"></i>
                    <span class="small">Categoria</span><span class="text-danger">*</span>
                  </label>

                  <input type="text" class="form-control form-control-sm" id="iptCategoria" name="iptCategoria"
                    placeholder="Ingrese la Categoria" onKeyUp="javascript:this.value=this.value.toUpperCase();"
                    required>

                  <input type="hidden" id="auxiliarFecha" value="<?php echo date('Y-m-d'); ?>">

                  <div class="invalid-feedback">Debe ingresar la categoria</div>

                </div>
              </div>

              <div class="col-md-12">
                <div class="form-group m-0 mb-2">
                  <a style="cursor:pointer;" class="btn btn-primary btn-sm w-100" id="btnRegistrarCategoria">
                    Registrar Categoria
                  </a>
                </div>
              </div>

            </div>
          </form>
        </div>

      </div>

      <!-- REGISTRO DE SUBCATEGORIAS -->
      <div class="panel panel-success" id="subCategorias">
        <div class="panel-heading text-center">
          <i class="fa fa-edit"></i> Registro/Modificacion <span>Sub Categorias</span>
        </div>
        <div class="panel-body">
          <form class="needs-validation" novalidate>
            <div class="col-md-12">

              <!-- INPUT nombre categoria -->
              <div class="form-group mb-2">

                <label class="col-form-label" for="iptCategoriaP">
                  <i class="fas fa-dumpster fs-6"></i>
                  <span class="small">Categoria</span><span class="text-danger">*</span>
                </label>

                <input type="text" class="form-control form-control-sm" id="iptCategoriaP" name="iptCategoriaP"
                  readonly>

                <!-- <div class="invalid-feedback">Debe ingresar la categoría</div> -->

              </div>

            </div>

            <div class="col-md-12">
              <div class="form-group mb-2">
                <label for="SubCategoriaProd"><i class="fa fa-book fs-6"></i><span class="small"> <b>Mostrar
                      SubCategoria</b></span></label>
                <select class="form-control input-sm" id="SubCategoriaProd" name="SubCategoriaProd" required>
                  <option value="0">Sub Categorías</option>
                </select>

                <a style="cursor:pointer;" class="btn btn-danger btn-xs btnBorraSub" title="Borrar SubCategoria"><i
                    class="fa fa-trash fs-6"></i> </a>
              </div>
            </div>


            <div class="col-md-12">
              <!-- INPUT nombre Subcategoria -->
              <div class="form-group mb-2">

                <label class="col-form-label" for="iptSubCategoria">
                  <i class="fas fa-dumpster fs-6"></i>
                  <span class="small">Sub Categoria</span>
                </label>

                <input type="text" class="form-control form-control-sm" id="iptSubCategoria" name="iptSubCategoria"
                  placeholder="Ingrese Nombre de la Sub-Categoría"
                  onKeyUp="javascript:this.value=this.value.toUpperCase();" required>
                <input type="hidden" id="codSubC" value="">

              </div>

            </div>

            <div class="col-md-12">
              <div class="form-group m-0 mt-2">
                <a style="cursor:pointer;" class="btn btn-success btn-sm w-100" id="btnRegistrarSubCategoria">Registrar
                  Sub Categoría
                </a>
              </div>
            </div>

          </form>

          <!-- </div> FINAL DE PANEL BODY -->
        </div>


      </div>
    </div>
  </div>
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

    $('#subCategorias').hide();

    var idCategoria = 0;
    var categoria = "";
    var medida = "";
    //alert('como es')
    var tableCategorias = $('#lstCategorias').DataTable({

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
        url: 'ajax/categorias.ajax.php',
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
          className: "text-center",
          width: "4%"
        },
        {
          targets: 2,
          sortable: false,
          createdCell: function(td, cellData, rowData, row, col) {

            if (parseInt(rowData[2]) == 0 || rowData[2] == null) {
              $(td).html("Sin SubCat.")
            } else {
              $(td).html("Registrados <b>" + rowData[2] + "</b> SubCate")
            }

          }
        },
        {
          targets: 3, // your case first column
          className: "text-center"
        },
        {
          targets: 4,
          sortable: false,
          render: function(data, type, full, meta) {
            return "<center>" +
              "<span class='btnEditarCategoria text-primary px-1' style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='Editar Categoria'>" +
              "<i class='fas fa-pencil-alt fs-5'></i> " +
              "</span> " +
              "<span class='btnEliminarCategoria text-danger px-1' style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='Eliminar Categoria'>" +
              "<i class='fas fa-trash fs-5'> </i> " +
              "</span>" +
              "<span class='btnHabilitaSub text-success px-1'style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='Habilitar Sub-Categoría'> " +
              "<i class='fa fa-check fs-5' style='font-size:20px;'> </i> " +
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

    $('#lstCategorias tbody').on('click', '.btnEditarCategoria', function() {

      let data = tableCategorias.row($(this).parents('tr')).data();

      if ($(this).parents('tr').hasClass('selected')) {

        $(this).parents('tr').removeClass('selected');

        idCategoria = 0;
        $("#iptCategoria").val("");
        $("#iptFecha").val("");

      } else {

        tableCategorias.$('tr.selected').removeClass('selected');

        $(this).parents('tr').addClass('selected')

        idCategoria = data[0];
        $("#iptCategoria").val(data[1]);
        $("#iptFecha").val(data[3]);

      }
    })

    $('#lstCategorias tbody').on('click', '.btnEliminarCategoria', function() {

      var data = tableCategorias.row($(this).parents('tr')).data();
      var codigo_cate = data[0];

      Swal.fire({
        title: 'Está seguro de eliminar la categoría ' + data[1] + '?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Aceptar!',
        cancelButtonText: 'Cancelar!',
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            url: "ajax/categorias.ajax.php",
            type: "POST",
            data: {
              accion: '2',
              cod_categoria: codigo_cate
            },
            success: function(respuesta) {

              Toast.fire({
                icon: 'success',
                title: respuesta
              });

              tableCategorias.ajax.reload();
            }

          });
        }
      })
    })

    $('#lstCategorias tbody').on('click', '.btnHabilitaSub', function() {

      var data = tableCategorias.row($(this).parents('tr')).data();

      if ($(this).parents('tr').hasClass('selected')) {

        $(this).parents('tr').removeClass('selected');
        $('#subCategorias').hide();
        idCategoria = 0;
        $("#iptCategoria").val("");
        $("#iptFecha").val("");

      } else {

        tableCategorias.$('tr.selected').removeClass('selected');

        $(this).parents('tr').addClass('selected')
        $('#subCategorias').show();

        idCategoria = data[0];
        $("#iptCategoriaP").val(data[1]);
        $.post("ajax/busca_subcategoria_new.php", {
          idCategoria
        }, function(data) {
          $("#SubCategoriaProd").html(data);
        });

      }
    })


    document.getElementById("btnRegistrarCategoria").addEventListener("click", function() {
      // Get the forms we want to add validation styles to 
      var forms = document.getElementsByClassName('needs-validation');
      // Loop over them and prevent submission 
      var validation = Array.prototype.filter.call(forms, function(form) {

        if (form.checkValidity() === true) {

          categoria = $("#iptCategoria").val();
          subcategoria = $("#selSubcategoria").val();

          let datos = new FormData();

          datos.append("idCategoria", idCategoria);
          datos.append("categoria", categoria);
          datos.append("subcategoria", subcategoria);

          Swal.fire({
            title: 'Está seguro de guardar la categoría?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Aceptar!',
            cancelButtonText: 'Cancelar!',
          }).then((result) => {
            if (result.isConfirmed) {
              $.ajax({
                url: "ajax/categorias.ajax.php",
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

                  idCategoria = 0;
                  categoria = "";
                  subcategoria = "";

                  $("#iptCategoria").val("");
                  $("#iptFecha").val("");

                  tableCategorias.ajax.reload();
                  $(".needs-validation").removeClass("was-validated");
                }

              });

            }

          })

        }

        form.classList.add('was-validated');
      })
    });

    document.getElementById("btnRegistrarSubCategoria").addEventListener("click", function() {

      varificaS = $("#iptSubCategoria").val();

      if (varificaS == "") {

        Toast.fire({
          icon: 'warning',
          title: "No existe registro de datos | Llene el campo con datos"
        });

      } else {

        categoriaSub = $("#iptSubCategoria").val();
        idCategoriaS = idCategoria;

        Swal.fire({
          title: 'Está seguro de guardar en la Categoría?' + idCategoriaS + '?',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Aceptar!',
          cancelButtonText: 'Cancelar!',
        }).then((result) => {

          if (result.value) {

            $.ajax({
              url: "ajax/insertar_subcategorias.php",
              type: "POST",
              data: {
                categoriaSub: categoriaSub,
                idCategoriaS: idCategoriaS
              },

              success: function(respuesta) {
                //console.log(respuesta)
                if (respuesta == "ok") {
                  Toast.fire({
                    icon: 'success',
                    title: "Insercion realizada Subcategoria " + categoriaSub +
                      " Registro realizado!!!"
                  });

                  $('#subCategorias').hide();
                  tableCategorias.ajax.reload();

                  idCategoria = 0;
                  categoriaSub = "";

                  $("#iptSubCategoria").val("");
                  $("#SubCategoriaProd").val(0);
                }


              }
            });
          }
        })
      }

    });

    $('#SubCategoriaProd').change(function() {
      $("#SubCategoriaProd option:selected").each(function() {

        var idsubcate = $(this).val();

        //alert(idsubcate)
        document.getElementById('codSubC').value = idsubcate;

      });
    })

    $('.btnBorraSub').on('click', function() {

      var codsub = $('#codSubC').val();

      $.post("ajax/borrar_subcategoria.php", {
        codsub
      }, function(data) {
        if (data == 'ok') {
          Toast.fire({
            icon: 'success',
            title: "La Sub categoria fue eliminada correctamente | Eliminacion Exitosa!!!"
          });

          $('#subCategorias').hide();
          tableCategorias.ajax.reload();
          $('#SubCategoriaProd').val(0);

        } else {
          Toast.fire({
            icon: 'warning',
            title: "La Sub categoria NO fue eliminada | Error de Eliminacion !!!"
          });
        }
      });
    })


  }) //end ready
</script>