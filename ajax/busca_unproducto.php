<?php

require_once "../modelos/conexion.php";

try {
    $idp = $_POST['idP'];
    $connection = Conexion::conectar();
    
    $query = "SELECT codigo_producto, nombre FROM productos WHERE estado = 1 AND codigo_producto = :idp LIMIT 1";
    
    $stmt = $connection->prepare($query);
    $stmt->bindParam(':idp', $idp, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetchAll();
    
    if (count($result) == 0) {
        $html = "No hay productos activos";
    } else {
        $html = $result[0]['nombre'];
    }
    
    echo $html;
    
} catch (Exception $e) {
    echo "Error al buscar producto: " . $e->getMessage();
}
?>