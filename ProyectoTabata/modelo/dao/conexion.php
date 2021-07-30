<?php

    $server = "localhost";
    $user = "root";
    $password = "";
    $database = "tabata";
    
    $conex = new mysqli($server,$user,$password,$database);
    
    /* Comprobar la conexion */
    if(mysqli_connect_errno()){
        printf("Fallo la conexión: %s\n", mysqli_connect_error());
        exit();
    }

?>


