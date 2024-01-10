<?php 

include 'modulos/panel.php';

    $id = $_POST['id'];

  $sql = $pdo->prepare("SELECT Tipo_usuario FROM `tblusuarios` WHERE id=$id");
  $sql -> execute();

  $muestra = $sql ->fetch();



 if ($muestra['Tipo_usuario'] == 1) {
     
    $privilegio_admin = $pdo->prepare("UPDATE `tblusuarios` SET `Tipo_usuario`= '2' WHERE id=$id");
    $privilegio_admin ->execute();

 }else{
    
        if ($muestra['Tipo_usuario'] == 2) {
            $privilegio_usuario = $pdo->prepare("UPDATE `tblusuarios` SET `Tipo_usuario`= '1' WHERE id=$id");
            $privilegio_usuario ->execute();
        }

 }
   

header('location: Vistausuarios.php')
?>