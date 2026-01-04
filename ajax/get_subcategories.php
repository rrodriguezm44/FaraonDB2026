<?php
// Conexión a la base de datos (ajusta con tus credenciales)
$conn = new mysqli('localhost', 'root', '12345678', 'faraondb');

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$categoriaId = $_POST['categoria_id'];

$query = "SELECT subcategoria_id, nombre FROM subcategorias WHERE categoria_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $categoriaId);
$stmt->execute();
$result = $stmt->get_result();

$subcategorias = array();
while($row = $result->fetch_assoc()) {
    $subcategorias[] = $row;
}

echo json_encode($subcategorias);

$stmt->close();
$conn->close();
?>