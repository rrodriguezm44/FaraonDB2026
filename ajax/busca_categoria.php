<?php



require('database.php');


$query = "SELECT categoria_id,nombre FROM categorias";

$result = mysqli_query($connection, $query);

$numero_reg = mysqli_num_rows($result);


if ($numero_reg == 0) {

  $html = "<option value='0'>Categorias Sin Registros New</option>";

  echo $html;
} else {

  $html = "<option value='0'>--- Lista Categorias ---</option>";

  while ($row1 = mysqli_fetch_assoc($result)) {

    $html .= "<option value='" . $row1['categoria_id'] . "'>" . $row1['nombre'] . "</option>";
  }

  echo $html;
}
