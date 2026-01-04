<?php

include('database.php');

$idCategoria = $_POST['idCategoriaS'];
$categoriaSub = $_POST['categoriaSub'];


$query = "INSERT INTO subcategorias (categoria_id,nombre) VALUES ('$idCategoria','$categoriaSub')";
$result = mysqli_query($connection, $query);

if (!$result) {
  die('Consulta vacia');
} else {
  echo 'ok';
}
