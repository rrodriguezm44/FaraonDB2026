<?php



require('database.php');


$query = "SELECT cliente_id,nombre,nombre_empresa FROM clientes";

$result = mysqli_query($connection, $query);

$numero_reg = mysqli_num_rows($result);



if ($numero_reg == 0) {

  $html = "<option value='0'>Clientes Sin Registros New</option>";

  echo $html;
} else {



  $html = "<option value='0'>--- Lista Clientes ---</option>";



  while ($row1 = mysqli_fetch_assoc($result)) {



    $html .= "<option value='" . $row1['cliente_id'] . "'>" . $row1['nombre_empresa'] . "</option>";
  }

  echo $html;
}
