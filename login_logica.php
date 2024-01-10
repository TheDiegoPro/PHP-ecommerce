<?php


require 'global/conexion_login.php';




//sleep(2);

session_start();

    $usuarios = $mysqli->query("SELECT nombre, Tipo_usuario FROM tblusuarios WHERE Usuario = '".$_POST['usuariolg']."' 
    AND Password = '".$_POST['passlg']."' ");

if($usuarios->num_rows == 1):
    $datos = $usuarios->fetch_assoc();
    $_SESSION['usuario'] = $datos;
    echo json_encode(array('error' => false, 'tipo' => $datos['Tipo_usuario']));
else:

    echo json_encode(array('error' => true));
    

endif;

$mysqli->close();


	




/*
if(!empty($_server['HTTP_x_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){

    require 'global/conexion_login.php';
    sleep(2);

    $mysqli->set_charset('utf8');

    $usuario = $mysqli->real_escape_string($_POST['usuariolg']);
    $pas = $mysqli->real_escape_string($_POST['passlg']);

    if($nueva_consulta = $mysqli->prepare("SELECT nombre, Tipo_usuario FROM tblusuarios WHERE usuario = ? 
    AND password = ? ")){

        $nueva_consulta->bind_param('ss',$usuario,$pas);

        $nueva_consulta->execute();

        $resultado = $nueva_consulta->get_result();

        if($resultado->num_rows == 1){
            $datos= $resultados->fetch_assoc();
            echo json_encode(array('error' => false, 'tipo' => $datos['Tipo_usuario']));
        }else{
            echo json_encode(array('error' => true));

        }
        $nueva_consulta->close();
    }
}

$mysqli->close();
*/
?>