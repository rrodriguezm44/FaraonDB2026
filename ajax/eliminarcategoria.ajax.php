<?php

include('database.php');

$id = $_POST['codigo_cate'];

//ELIMINANDO EN MASTER
$querym = "DELETE FROM categorias WHERE id = '$id'";
$result = mysqli_query($connection, $querym);

if (!$result) {
  die('Consulta vacia');
}

echo 'ok';