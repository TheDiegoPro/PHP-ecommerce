<?php

    $mysqli = new mysqli('localhost','root','','tienda');
        if($mysqli->connect_errno):
            echo "error al conectarse con Mysql debido al error".$mysqli->connect_error;
        endif;



?>


