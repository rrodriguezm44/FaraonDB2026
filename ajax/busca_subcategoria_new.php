<?php



require('database.php');



if (isset($_POST['idCategoria'])) {

  $id = $_POST['idCategoria'];

  $query = "SELECT * FROM subcategorias WHERE categoria_id = '$id'";

  $result = mysqli_query($connection, $query);

  $numero_reg = mysqli_num_rows($result);



  if ($numero_reg == 0) {

    $html = "<option value='0'>Categoria Sin Registros New</option>";

    echo $html;
  } else {



    $html = "<option value='0'>Listar Categorías</option>";



    while ($row1 = mysqli_fetch_assoc($result)) {



      $html .= "<option value='" . $row1['subcategoria_id'] . "'>" . $row1['nombre'] . "</option>";
    }

    echo $html;
  }
}
