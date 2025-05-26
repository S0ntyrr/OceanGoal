<?php
require 'db_connection.php';
session_start();

// Verifica si el usuario está autenticado
if (!isset($_SESSION['username'])) {
    http_response_code(401);
    echo json_encode(["status" => "error", "message" => "No autenticado"]);
    exit();
}

$usuario = $_SESSION['username'];

$stmt = mysqli_prepare($Enlace, "SELECT username, descripcion, password_hash, CHAR_LENGTH(password_hash) as pass_length FROM users WHERE username = ?");
mysqli_stmt_bind_param($stmt, "s", $usuario);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $username, $descripcion, $password_hash, $pass_length);

if (mysqli_stmt_fetch($stmt)) {
    echo json_encode([
        "status" => "success",
        "usuario" => $username,
        "descripcion" => $descripcion,
        "contrasena" => $password_hash, // hash (no se muestra)
        "contrasena_longitud" => $pass_length // longitud del hash
    ]);
} else {
    http_response_code(404);
    echo json_encode(["status" => "error", "message" => "Usuario no encontrado"]);
}

mysqli_stmt_close($stmt);
mysqli_close($Enlace);
?>
