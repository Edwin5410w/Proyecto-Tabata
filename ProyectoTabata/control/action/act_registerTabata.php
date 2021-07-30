<?php

    include("../../modelo/dao/conexion.php");

    session_start();

    if(isset($_SESSION['id'])){
       $idUser =  $_SESSION['id'];
    }

    $NombreTabata = $_POST['nametabata'];
    $TimePreparacion = $_POST['timep'];
    $TimeActividad = $_POST['timea'];
    $NumeroSeries = $_POST['numeroseries'];
    $CantidadEjercicio = $_POST['cantejer'];
    $TiempoDescanso = $_POST['timeDes'];

    $ConsultaSql = "INSERT INTO tabata (nombre,tiempo_preparacion,tiempo_actividad,numero_series,id_usuario,cantidad_ejercicios,tiempo_descanso)
    VALUES ('$NombreTabata','$TimePreparacion','$TimeActividad',$NumeroSeries,'$idUser','$CantidadEjercicio','$TiempoDescanso')";

    $ResultadoConsulta = mysqli_query($conex, $ConsultaSql);

    if($ResultadoConsulta){
        header("Location: ../../vista/welcome.php");
    }else{
        echo "Error: " . $ConsultaSql . "<br>" . mysqli_error($conex);
    }

?>