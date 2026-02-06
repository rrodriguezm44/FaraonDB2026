<?php
require_once "../../modelos/conexion.php";

if (isset($_POST['detalle_venta_id'])) {
    $detalle_venta_id = $_POST['detalle_venta_id'];

    // Preparar la consulta SQL para eliminar el detalle de venta
    $sql = "DELETE FROM detalle_ventas WHERE detalle_venta_id = :detalle_venta_id";
    $stmt = Conexion::conectar()->prepare($sql);
    
    $stmt->bindParam(':detalle_venta_id', $detalle_venta_id, PDO::PARAM_INT);
    
    if ($stmt->execute()) {
        // Eliminación exitosa
        $response = array(
            'status' => 'success',
            'message' => 'Producto eliminado correctamente'
        );
        echo json_encode($response);
    } else {
        // Error en la eliminación
        $response = array(
            'status' => 'error',
            'message' => 'Error al eliminar el producto'
        );
        echo json_encode($response);
    }
} else {
    // Parámetro no recibido
    $response = array(
        'status' => 'error',
        'message' => 'Parámetro detalle_venta_id no recibido'
    );
    echo json_encode($response);
}
?>