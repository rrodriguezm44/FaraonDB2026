<?php
session_start();

$routesArray = explode("/", $_SERVER['REQUEST_URI']);

$routesArray = array_filter($routesArray);

if (count(array_filter($routesArray)) > 1) {
  echo '
    <script>

      window.location = "http://localhost/faraonbd/"
    </script>
  ';
  # code...
}

if (isset($_GET["cerrar_sesion"]) && $_GET["cerrar_sesion"] == 1) {

  session_destroy();

  echo '
    <script>

      window.location = "http://localhost/faraonbd/"
    </script>
  ';
}
?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>FaraonDb | Distribuidor</title>

  <link rel="shortcut icon" href="vistas/assets/dist/img/AdminLTELogo.png" type="image/x-icon">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Young+Serif&display=swap" rel="stylesheet">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kalam:wght@300;400;700&display=swap" rel="stylesheet">


  <!-- Bootstrap 5 -->
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"> -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous"> -->

  <!-- Select2 -->
  <!-- <link rel="stylesheet" href="vistas/assets/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="vistas/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css"> -->
  <!-- Styles -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
  <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />


  <!-- JSTREE -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/themes/default/style.min.css" />
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="vistas/assets/plugins/fontawesome-free/css/all.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="vistas/assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
     <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="vistas/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

 <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="vistas/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

  <!-- Jquery CSS -->
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.3/css/responsive.bootstrap5.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.2.1/css/buttons.bootstrap5.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/fixedcolumns/4.3.0/css/fixedColumns.dataTables.min.css">

  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/datejs/1.0/date.min.js"></script> -->

  <!-- toogle switch -->
  <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">

  <link rel="stylesheet" href="vistas/assets/dist/css/plantilla.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="vistas/assets/dist/css/adminlte.min.css">


  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->

  <!-- Versión estable probada -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>

  <!-- ChartJS -->
  <script src="vistas/assets/plugins/chart.js/chart.min.js"></script>
  <!-- InputMask -->
  <script src="vistas/assets/plugins/moment/moment.min.js"></script>
  <script src="vistas/assets/plugins/inputmask/jquery.inputmask.min.js"></script>
  <!-- SweetAlert2 -->
  <script src="vistas/assets/plugins/sweetalert2/sweetalert2.min.js"></script>


  <!-- Jquery UI -->

  <!-- JS Bootstrap 5 -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
  </script> -->

  <!-- Bootstrap Switch -->
  <script src="https://unpkg.com/bootstrap-switch"></script>
  <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>

  <!-- date-range-picker -->
  <script src="vistas/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

  <!-- Select2 -->
  <script src="vistas/assets/plugins/select2/js/select2.full.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
  <script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js"></script>
  <script src="https://cdn.datatables.net/responsive/3.0.3/js/dataTables.responsive.js"></script>
  <script src="https://cdn.datatables.net/responsive/3.0.3/js/responsive.bootstrap5.js"></script>
  <script src="https://cdn.datatables.net/buttons/3.2.1/js/dataTables.buttons.js"></script>
  <script src="https://cdn.datatables.net/buttons/3.2.1/js/buttons.bootstrap5.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/3.2.1/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/3.2.1/js/buttons.print.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/3.2.1/js/buttons.colVis.min.js"></script>
  <script src="https://cdn.datatables.net/fixedcolumns/4.3.0/js/dataTables.fixedColumns.min.js"></script>

  <!-- JSTREE -->
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.1/jquery.min.js"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/jstree.min.js"></script>



  <!-- AdminLTE App -->
  <script src="vistas/assets/dist/js/adminlte.min.js"></script>
  <script src="vistas/assets/dist/js/plantilla.js"></script>
  <script src="vistas/assets/dist/js/funciones_globales.js"></script>

</head>

<?php if (isset($_SESSION["usuario"])): ?>

<body class="hold-transition dark-mode sidebar-mini">
  <div class="wrapper">

    <?php
      include "modulos/navbar.php";
      include "modulos/aside.php";
      ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

      <?php include "vistas/" . $_SESSION['usuario']->vista ?>

    </div>
    <!-- /.content-wrapper -->

    <?php
      include "modulos/footer.php";
      ?>

  </div>
  <!-- ./wrapper -->
  <script>
  // Corrige el orden de los parámetros y permite selectores flexibles
  function CargarContenido(contenedor, pagina_php) {
    // Si el contenedor inicia con . o #, úsalo directamente como selector
    if (contenedor.startsWith('.') || contenedor.startsWith('#')) {
      $(contenedor).load(pagina_php);
    } else {
      $('.' + contenedor).load(pagina_php);
    }
  }
  </script>

</body>

<?php else: ?>

<body>
  <?php include "vistas/login.php" ?>
</body>

<?php endif; ?>

</html>