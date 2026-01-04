<?php



require('database.php');


$query = "SELECT proveedor_id,nombre_empresa FROM proveedores";

$result = mysqli_query($connection, $query);

$numero_reg = mysqli_num_rows($result);


if ($numero_reg == 0) {

  $html = "<option value='0'>Proveedores Sin Registros New</option>";

  echo $html;
} else {

  $html = "<option value='0'>--- Lista Proveedores ---</option>";

  while ($row1 = mysqli_fetch_assoc($result)) {

    $html .= "<option value='" . $row1['proveedor_id'] . "'>" . $row1['nombre_empresa'] . "</option>";
  }

  echo $html;
}
