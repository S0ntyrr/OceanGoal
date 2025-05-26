<?php
require 'db_connection.php';
session_start();

if (!isset($_SESSION['username'])) {
    http_response_code(401);
    echo 'No autenticado';
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['descripcion'])) {
    $usuario = $_SESSION['username'];
    $descripcion = mysqli_real_escape_string($Enlace, $_POST['descripcion']);
    $stmt = mysqli_prepare($Enlace, "UPDATE users SET descripcion = ? WHERE username = ?");
    mysqli_stmt_bind_param($stmt, "ss", $descripcion, $usuario);
    if (mysqli_stmt_execute($stmt)) {
        echo 'Descripción guardada correctamente';
    } else {
        echo 'Error al guardar la descripción';
    }
    mysqli_stmt_close($stmt);
} else {
    echo 'Solicitud inválida';
}
mysqli_close($Enlace);
?>
