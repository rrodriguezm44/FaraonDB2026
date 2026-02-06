<?php
require_once "../../modelos/conexion.php";

if (isset($_POST['detalle_venta_id'])) {
    $detalle_venta_id = $_POST['detalle_venta_id'];

    // Primero obtenemos el número de boleta antes de eliminar
    $sql_select = "SELECT nro_boleta FROM detalle_ventas WHERE detalle_venta_id = :detalle_venta_id";
    $stmt_select = Conexion::conectar()->prepare($sql_select);
    $stmt_select->bindParam(':detalle_venta_id', $detalle_venta_id, PDO::PARAM_INT);
    $stmt_select->execute();
    $venta_data = $stmt_select->fetch(PDO::FETCH_ASSOC);

    if (!$venta_data) {
        $response = array(
            'status' => 'error',
            'message' => 'Registro no encontrado'
        );
        echo json_encode($response);
        exit;
    }

    $nro_boleta = $venta_data['nro_boleta'];

    // Preparar la consulta SQL para eliminar el detalle de venta
    $sql = "DELETE FROM detalle_ventas WHERE detalle_venta_id = :detalle_venta_id";
    $stmt = Conexion::conectar()->prepare($sql);
    
    $stmt->bindParam(':detalle_venta_id', $detalle_venta_id, PDO::PARAM_INT);
    
    if ($stmt->execute()) {
        // Eliminación exitosa
        $response = array(
            'status' => 'success',
            'message' => 'Producto eliminado correctamente',
            'nro_boleta' => $nro_boleta
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