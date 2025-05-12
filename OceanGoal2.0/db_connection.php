<?php
$host = 'localhost';
$user = 'root';
$password = ''; // Cambiar si tienes una contraseña configurada
$database = 'ocean_goal';

$Enlace = mysqli_connect($host, $user, $password, $database);

if (!$Enlace) {
    die('Error de conexión: ' . mysqli_connect_error());
}
?>
