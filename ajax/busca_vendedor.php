<?php



require('database.php');


$query = "SELECT * FROM usuarios WHERE id_perfil_usuario = 2";

$result = mysqli_query($connection, $query);

$numero_reg = mysqli_num_rows($result);



if ($numero_reg == 0) {

  $html = "<option value='0'>Vendedores Sin Registros New</option>";

  echo $html;
} else {



  $html = "<option value='0'>--- Listar Vendedores ---</option>";



  while ($row1 = mysqli_fetch_assoc($result)) {



    $html .= "<option value='" . $row1['id_usuario'] . "'>" . $row1['nombre_usuario'] . " " . $row1['apellido_usuario'] . "</option>";
  }

  echo $html;
}
