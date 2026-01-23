<?php



require('database.php');


$query = "SELECT codigo_producto,nombre FROM productos WHERE estado = 1";

$result = mysqli_query($connection, $query);

$numero_reg = mysqli_num_rows($result);


if ($numero_reg == 0) {

  $html = "<option value='0'>Productos Sin Registros New</option>";

  echo $html;
} else {

  $html = "<option value='0'>----Seleccion Producto----</option>";

  while ($row1 = mysqli_fetch_assoc($result)) {

    $html .= "<option value='" . $row1['codigo_producto'] . "'>" . $row1['nombre'] . "</option>";
  }

  echo $html;
}
