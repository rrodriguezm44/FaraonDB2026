<?php
require("database.php");

if (isset($_POST['codigo_producto'])) {
    $codigo_producto = mysqli_real_escape_string($connection, $_POST['codigo_producto']);
    
    // Consultar los detalles del producto
    $query = "SELECT p.nombre as descripcion_producto, 
                     c.nombre as nombre_categoria, 
                     p.precio_venta 
              FROM productos p 
              INNER JOIN categorias c ON p.categoria_id = c.categoria_id 
              WHERE p.codigo_producto = '$codigo_producto'";
    
    $result = mysqli_query($connection, $query);
    
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        
        $response = array(
            'descripcion_producto' => $row['descripcion_producto'],
            'nombre_categoria' => $row['nombre_categoria'],
            'precio_venta' => $row['precio_venta']
        );
        
        echo json_encode($response);
    } else {
        $response = array(
            'error' => 'Producto no encontrado'
        );
        
        echo json_encode($response);
    }
} else {
    $response = array(
        'error' => 'Código de producto no proporcionado'
    );
    
    echo json_encode($response);
}
?>