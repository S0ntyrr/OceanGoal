<?php
require 'db_connection.php'; // Incluir la conexión a la base de datos

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $usuario = $_POST['username'];
        $contrasena_original = $_POST['password'];
        $contrasena = password_hash($contrasena_original, PASSWORD_DEFAULT); // Encriptar contraseña

        // Consulta preparada para evitar inyección SQL
        $stmt = mysqli_prepare($Enlace, "INSERT INTO users (username, password_hash) VALUES (?, ?)");
        mysqli_stmt_bind_param($stmt, "ss", $usuario, $contrasena);

        if (mysqli_stmt_execute($stmt)) {
            echo "Registro exitoso";
            exit(); // Detener la ejecución para evitar contenido adicional
        } else {
            echo "Error en el registro: " . mysqli_error($Enlace);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Error: Datos incompletos.";
    }
} else {
    echo "Método no permitido.";
}

mysqli_close($Enlace);
?>