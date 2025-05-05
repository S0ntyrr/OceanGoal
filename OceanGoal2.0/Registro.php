<?php
require 'Index.php'

$usuario = $_POST['username'];
$contrasena = password_hash($_POST['password'], PASSWORD_DEFAULT); // Encriptar contraseña

// Consulta preparada para evitar inyección SQL
$stmt = mysqli_prepare($Enlace, "INSERT INTO users (username, `password_hash`) VALUES (?, ?)");
mysqli_stmt_bind_param($stmt, "ss", $usuario, $contrasena);

if (mysqli_stmt_execute($stmt)) {
    echo "Registro exitoso";
} else {
    echo "Error en el registro: " . mysqli_error($conexion);
}

mysqli_stmt_close($stmt);
mysqli_close($Enlace);
?>