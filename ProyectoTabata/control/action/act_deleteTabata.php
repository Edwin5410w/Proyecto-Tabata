<?php

    include("../../modelo/dao/conexion.php");

    $IdTabata = $_REQUEST['IdTabataEliminar'];

    $Consulta = "DELETE FROM tabata WHERE id_tabata = '$IdTabata'";

    $ResultadoConsulta = mysqli_query($conex, $Consulta);

    if($ResultadoConsulta){
        header("Location: ../../vista/welcome.php");
    }else{
        echo "Error: " . $ConsultaSql . "<br>" . mysqli_error($conex);
    }
?>