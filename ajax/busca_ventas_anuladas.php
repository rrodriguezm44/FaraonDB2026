<?php

require('database.php');

if (isset($_POST['nroBoleta'])) {

  $codigo = $_POST['nroBoleta'];

  $query = "SELECT * FROM ventas WHERE nro_boleta = '$codigo' AND estado = 'activo'";
  $result = mysqli_query($connection, $query);
  $row1 = mysqli_num_rows($result);
  if ($row1 > 0) {
    echo 1;
  } else {
    echo 0;
  }
}