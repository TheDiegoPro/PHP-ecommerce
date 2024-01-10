<?php


if (isset($_POST["btnLogin"])) {

    include("global/conexion_login.php");

    $txtEmail = ($_POST['txtEmail']);
    $txtPassword = ($_POST['txtPassword']);

    $sentenciaSQL = $pdo->prepare("SELECT * FROM tblusuarios where correo=:correo AND password=:password");

    $sentenciaSQL->bindParam("correo", $txtEmail, PDO::PARAM_STR);
    $sentenciaSQL->bindParam("password", $txtPassword, PDO::PARAM_STR);
    $sentenciaSQL->execute();

    $registro=$sentenciaSQL->fetch();

    $numeroRegistros = $sentenciaSQL->rowCount(PDO::FETCH_ASSOC);
    //print_r($registro);
    

    if ($numeroRegistros >= 1) {

        session_start();
         $_SESSION['usuario']=$registro;
        
        header('location:Vistapanel.php');
    } else {

        echo "<script>alert('Usuario Incorrecto')</script>";
    }

}
?>