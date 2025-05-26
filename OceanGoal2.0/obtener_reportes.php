<?php
require 'db_connection.php';
session_start();

// Asegúrate de que el usuario esté autenticado
if (!isset($_SESSION['username'])) {
    echo json_encode([]);
    exit();
}

$usuario = $_SESSION['username'];

// Suponiendo que tienes una tabla 'reportes' con los campos: id, usuario, tipo, fecha, descripcion
$result = mysqli_query($Enlace, "SELECT tipo, fecha, descripcion, imagen_url FROM reportes WHERE usuario = '".mysqli_real_escape_string($Enlace, $usuario)."' ORDER BY fecha DESC");
$reportes = [];
while ($row = mysqli_fetch_assoc($result)) {
    // Obtener la imagen si existe
    $row['imagen_url'] = isset($row['imagen_url']) && $row['imagen_url'] ? $row['imagen_url'] : '';
    $reportes[] = $row;
}
echo json_encode($reportes);
mysqli_close($Enlace);
?>
