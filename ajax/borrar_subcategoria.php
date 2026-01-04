<?php

include('database.php');

$id = $_POST['codsub'];

//ELIMINANDO EN MASTER
$querym = "DELETE FROM subcategorias WHERE subcategoria_id = '$id'";
$result = mysqli_query($connection, $querym);

if (!$result) {
  die('Consulta vacia');
}

echo 'ok';
