<?php
require 'db_connection.php'; // Incluir la conexión a la base de datos

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $usuario = $_POST['username'];
        $contrasena = $_POST['password'];

        // Consulta preparada para verificar las credenciales
        $stmt = mysqli_prepare($Enlace, "SELECT password_hash FROM users WHERE username = ?");
        mysqli_stmt_bind_param($stmt, "s", $usuario);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $password_hash);
        mysqli_stmt_fetch($stmt);

        if ($password_hash !== null) { // Verificar si el usuario existe
            if (password_verify($contrasena, $password_hash)) {
                session_start();
                $_SESSION['username'] = $usuario;
                http_response_code(200); // Código de éxito
                echo json_encode(["status" => "success", "redirect" => "home.html"]);
                exit();
            } else {
                http_response_code(401); // Código de error de autenticación
                echo json_encode(["status" => "error", "message" => "Contraseña incorrecta"]);
                exit();
            }
        } else {
            http_response_code(404); // Código de error de recurso no encontrado
            echo json_encode(["status" => "error", "message" => "Usuario no encontrado"]);
            exit();
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
