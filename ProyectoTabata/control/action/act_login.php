<?php 

    include("../../modelo/dao/conexion.php");

    $Email = $_POST['email'];
    $pdw = $_POST['password'];
    $Password = md5($pdw);


    $ConsultaSql = "SELECT * FROM usuarios WHERE correo = '$Email' AND contrasenia = '$Password'";

    $ResultadoConsulta = mysqli_query($conex, $ConsultaSql);

    if(mysqli_num_rows($ResultadoConsulta) > 0){

        while($row = mysqli_fetch_assoc($ResultadoConsulta)){
            $id = $row['id_usuario'];
            $email = $row['correo'];
	        $Usuario = $row['nombre'];	
            
            session_start();

            $_SESSION['id'] = $id;
            $_SESSION['email'] = $email;
            $_SESSION['usuario'] = $Usuario;
        }

        header("Location: ../../vista/welcome.php");
    }else{
        header("Location: ../../vista/login.php?error=Usuario o contraseña incorrectos");
    }
?>