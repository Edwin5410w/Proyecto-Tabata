<?php

    include("../../modelo/dao/conexion.php");

    $Usuario = $_POST['nombreUsuario'];
    $Email = $_POST['email'];
    $Password = md5($_POST['password']);
    $PasswordC = md5($_POST['Rpassword']);
    $Telefono = $_POST['telefono'];
    $Fecha = $_POST['Fecha'];
    $Sexo = $_POST['sexo'];
    $Peso = $_POST['peso'];

    if($Password == $PasswordC){
        
        if(empty($Usuario)){
            header("Location: ../../vista/register.php?error=Nombre de usuario requerido");
        }else if(empty($Email)){
            header("Location: ../../vista/register.php?error=Correo requerido");
        }else if(empty($Password)){
            header("Location: ../../vista/register.php?error=Contraseña requerida");
        }else if(empty($PasswordC)){
            header("Location: ../../vista/register.php?error=Contraseña de confimacion requerida");
        }else if(empty($Telefono)){
            header("Location: ../../vista/register.php?error=Telefono requerido");
        }else if(empty($Fecha)){
            header("Location: ../../vista/register.php?error=Fecha de nacimiento requerida");
        }else if(empty($Sexo)){
            header("Location: ../../vista/register.php?error=Sexo requerido");
        }else if(empty($Peso)){
            header("Location: ../../vista/register.php?error=Peso requerido");
        }else{
            $ConsultaSql = "INSERT INTO usuarios (nombre,correo,contrasenia,telefono,fecha_nacimiento,sexo,peso_kg) 
            VALUES ('$Usuario','$Email','$Password','$Telefono','$Fecha','$Sexo','$Peso')";

            $ResultadoConsulta = mysqli_query($conex, $ConsultaSql);

            if($ResultadoConsulta){
                header("Location: ../../vista/login.php");
            }else{
                echo "Error: " . $ConsultaSql . "<br>" . mysqli_error($conex);
            }
        }
    }else{
        header("Location: ../../vista/register.php?error=Error en las contraseñas");
    }
?>