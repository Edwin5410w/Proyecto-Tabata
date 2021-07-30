<?php

    include("../modelo/dao/conexion.php");

    session_start();

    if(isset($_SESSION['id'])){
        $idUser = $_SESSION['id'];
    }

    $Consulta = "SELECT * FROM tabata WHERE id_usuario = $idUser";

?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/stylepopup.css">
    <script src="./assets/js/cronometro.js" defer></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600|Open+Sans" rel="stylesheet"> 

    <title>Home</title>
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
                    <a class="nav-link" id="btn-abrir-popup">
                        Crear tabata
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
                    </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-2">
        <h3 class="text-center">Mis Tabatas</h3>
        <?php $Resultado = mysqli_query($conex, $Consulta); while($row=mysqli_fetch_assoc($Resultado)) { ?>
        <div class="card text-white bg-dark mb-3 mt-2 text-start" style="width: 18rem; display: inline-block; margin: 0 30px;">
            <div class="card-body">
              <h5 class="card-title text-center"><?php echo $row['nombre'] ?></h5>
            </div>
            <div class="card-body text-center">
                <a href="tabata.php" class="btn btn-primary">Mostrar</a>
                <a class="btn btn-warning" id="btn_editar"onclick = "EditarTabata()">Editar</a>
                <button type="button" class="btn btn-danger" id="BtEliminar" onclick="Id(<?php echo $row['id_tabata'] ?>)">Eliminar</button>
            </div>
        </div>
        <?php } ?>
    </div>

    <div class="overlay" id="overlay">
        <div class="popup" id="popup">
            <a id="btn-cerrar-popup" class="btn-cerrar-popup"> <i class="fas fa-times"></i> </a>
            <h3 id="NombrePupup">Crear Tabata</h3>
            <form action="../control/action/act_registerTabata.php" method="POST">
                <div class="contenedor-inputs">
                    <div class="row g-3 align-items-center mb-4 mt-4">
                        <div class="col-auto">
                            <label for="inputPassword6" class="col-form-label">Nombre tabata: </label>
                        </div>
                        <div class="col-auto input3">
                            <input type="text" name="nametabata" class="form-control" aria-describedby="passwordHelpInline" required>
                        </div>
                    </div>
                    <div class="row g-3 align-items-center mb-4">
                        <div class="col-auto">
                            <label for="inputPassword6" class="col-form-label">Tiempo preparacion: </label>
                        </div>
                        <div class="col-auto ms-3">
                            <input type="number" name="timep" class="form-control" aria-describedby="passwordHelpInline" placeholder="En segundos" id="inputPreparacion" required>
                        </div>
                    </div>
                    <div class="row g-3 align-items-center mb-4">
                        <div class="col-auto">
                            <label for="inputPassword6" class="col-form-label">Tiempo actividad: </label>
                        </div>
                        <div class="col-auto input">
                            <input type="number" name="timea" class="form-control" aria-describedby="passwordHelpInline" placeholder="En segundos" id="inputActividad" required>
                        </div>
                    </div>
                    <div class="row g-3 align-items-center mb-4">
                        <div class="col-auto">
                            <label for="inputPassword6" class="col-form-label">Numeros series: </label>
                        </div>
                        <div class="col-auto input1">
                            <input type="number" name="numeroseries" class="form-control" aria-describedby="passwordHelpInline" placeholder="0" id="inputSeries" required>
                        </div>
                    </div>
                    <div class="row g-3 align-items-center mb-4">
                        <div class="col-auto">
                            <label for="inputPassword6" class="col-form-label">Cantidad de ejercicios: </label>
                        </div>
                        <div class="col-auto">
                            <input type="number" name="cantejer" class="form-control" aria-describedby="passwordHelpInline" placeholder="0" required>
                        </div>
                    </div>
                    <div class="row g-3 align-items-center mb-4">
                        <div class="col-auto">
                            <label for="inputPassword6" class="col-form-label">Tiempo de descanso: </label>
                        </div>
                        <div class="col-auto input2">
                            <input type="number" name="timeDes" class="form-control" aria-describedby="passwordHelpInline" placeholder="En segundos" id="inputDescanso" required>
                        </div>
                    </div>
                    <p class="text-start" id="Parrafo"></p>
                </div>
                <button type="submit" class="btn btn-primary" id="BAgregar">Agregar</button>
            </form>
        </div>
    </div>

    <!-- Js -->
    <script src="./assets/js/pupup.js"></script>
    <script src="./assets/js/eliminarTabata.js"></script>
    <script src="./assets/js/Tabata.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>