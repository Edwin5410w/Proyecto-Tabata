<?php
    include("../modelo/dao/conexion.php");
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cronómetro</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@100&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600|Open+Sans" rel="stylesheet"> 
    <link rel="stylesheet" href="assets/css/temporizador.css">
    <script src="assets/js/cronometro.js"></script>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Tabata</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a href="welcome.php" class="nav-link" id="btn-abrir-popup">
                        Mostrar tabatas
                    </a>
                    </li>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php 
                            echo $_SESSION['usuario'];
                        ?>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Mi cuenta</a></li>
                        <li><a class="dropdown-item" href="../control/action/act_CloseSesion.php">Cerrar sesión</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Ayuda / comentarios</a></li>
                    </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="contenedor">
            <h1 style="color: #FC0505;" id="NombreTabata">Nombre Tabata</h1>

            <div class="contenedor-maquina">
                <div class="row mt-4">
                    <div class="col-3 text-center">
                        <h6 class="font-weight-bold fs-5">Preparación:</h6>
                        <h6 id="Preparacion" class="fs-6">0</h6>
                    </div>
                    <div class="col-3 text-center">
                        <h6 class="font-weight-bold fs-5">Actividad</h6>
                        <h6 id="Actividad" class="fs-6">0</h6>
                    </div>
                    <div class="col-3 text-center">
                        <h6 id="aceptado" class="fs-5">Descanso</h6>
                        <h6 id="Descanso" class="fs-6">0</h6>
                    </div>
                    <div class="col-3 text-center">
                        <h6 class="font-weight-bold fs-5">Series</h6>
                        <h6 id="Ronda" class="fs-6">0</h6>
                    </div>
                </div>

                <div class="contenedor-temporizador">

                    <div class="bloque">
                        <div class="minutos" id="minutos">00</div>
                        <p>MINUTOS</p>
                    </div>
                    <div class="bloque">
                        <div class="segundos" id="segundos">00</div>
                        <p>SEGUNDOS</p>
                    </div>
                </div>

                <div class="contenedor-botones">
                    <button type="button" class="btn btn-primary" style="font-weight: bold; margin: 0 40px;" id="Biniciar">Iniciar</button>
                    <button type="button" class="btn btn-primary" style="font-weight: bold;" id="Bpausar" disabled>Pausar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
</body>
</html>