<?php
require 'db_connection.php';
session_start();

if (!isset($_SESSION['username'])) {
    http_response_code(401);
    echo 'No autenticado';
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_SESSION['username'];
    $tipo = $_POST['tipo-reporte'] ?? '';
    $fecha = $_POST['fecha-reporte'] ?? '';
    $descripcion = $_POST['descripcion-reporte'] ?? '';
    $imagen_url = '';

    // Validación básica
    if ($tipo && $fecha && $descripcion && isset($_FILES['imagen-reporte'])) {
        $img = $_FILES['imagen-reporte'];
        if ($img['error'] === 0 && $img['size'] <= 2.5 * 1024 * 1024) {
            $ext = strtolower(pathinfo($img['name'], PATHINFO_EXTENSION));
            $permitidas = ['jpg','jpeg','png','gif','webp'];
            if (in_array($ext, $permitidas)) {
                $nombre_archivo = uniqid('reporte_', true) . '.' . $ext;
                $ruta_destino = 'uploads/' . $nombre_archivo;
                if (!is_dir('uploads')) mkdir('uploads');
                if (move_uploaded_file($img['tmp_name'], $ruta_destino)) {
                    $imagen_url = $ruta_destino;
                } else {
                    echo 'Error al guardar la imagen.';
                    exit();
                }
            } else {
                echo 'Formato de imagen no permitido.';
                exit();
            }
        } else {
            echo 'Imagen demasiado grande o error al subir.';
            exit();
        }
        $stmt = mysqli_prepare($Enlace, "INSERT INTO reportes (usuario, tipo, fecha, descripcion, imagen_url) VALUES (?, ?, ?, ?, ?)");
        mysqli_stmt_bind_param($stmt, "sssss", $usuario, $tipo, $fecha, $descripcion, $imagen_url);
        if (mysqli_stmt_execute($stmt)) {
            echo 'Reporte guardado correctamente';
        } else {
            echo 'Error al guardar el reporte';
        }
        mysqli_stmt_close($stmt);
    } else {
        echo 'Datos incompletos';
    }
}
mysqli_close($Enlace);
?>
