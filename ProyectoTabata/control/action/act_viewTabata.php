<?php
    include("../../modelo/dao/conexion.php");

    session_start();
    $IdUsuario = $_SESSION['id'];

    //$IdTabata = $_REQUEST['IdTabata'];

    $ConsultaSql = "SELECT * FROM tabata WHERE id_usuario = '$IdUsuario'";

    $ResultadoConsulta = mysqli_query($conex, $ConsultaSql);

    if(mysqli_num_rows($ResultadoConsulta) > 0) {
        while($row = mysqli_fetch_assoc($ResultadoConsulta)) {
            $nameTabata = $row['nombre'];
            $TiempoPreparacion = $row['tiempo_preparacion'];
            $TiempoActividad = $row['tiempo_actividad'];
            $NumeroSeries = $row['numero_series'];
            $TiempoDescanso = $row['tiempo_descanso'];
            //header("Location: ../../vista/tabata.php");
        }
    }

    $datos = array(
        array(
            $nameTabata
        ),
        array(
            $TiempoPreparacion
        ),
        array(
            $TiempoActividad
        ),
        array(
            $NumeroSeries
        ),
        array(
            $TiempoDescanso
        )
    );

    
    echo json_encode($datos);
    
?>