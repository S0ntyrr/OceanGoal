<?php
    $servidor = "localhost";
    $Usuario = "root";
    $clave = "";
    $basededatos = "oceangoal";

    $Enlace = new mysqli($servidor,$Usuario,$clave,$basededatos);

    if ($Enlace->connect_error) {
        die("Error de conexión: " . $Enlace->connect_error);
    } else {
        echo "Conexión exitosa a la base de datos";
    }

?>