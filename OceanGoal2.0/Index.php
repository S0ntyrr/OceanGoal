<?php
    $servidor = "localhost";
    $Usuario = "root";
    $clave = "";
    $basededatos = "ocean_goal"; // Corregido para coincidir con el archivo SQL

    $Enlace = new mysqli($servidor,$Usuario,$clave,$basededatos);

    if ($Enlace->connect_error) {
        die("Error de conexión: " . $Enlace->connect_error);
    } else {
        echo "Conexión exitosa a la base de datos";
    }

?>