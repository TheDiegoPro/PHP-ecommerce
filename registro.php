<?php

require 'global/conexion_registro.php';
require 'global/funcs.php';

$errors = array();

if (!empty($_POST)) {
	$nombre = $mysqli->real_escape_string($_POST['nombre']);

	$usuario = $mysqli->real_escape_string($_POST['usuario']);
	$password = $mysqli->real_escape_string($_POST['password']);
	$con_password = $mysqli->real_escape_string($_POST['con_password']);
	$email = $mysqli->real_escape_string($_POST['email']);

	$activo = 0;
	$id_tipo = 2;



	if (isNull($nombre, $usuario, $password, $con_password, $email)) {
		$errors[] = "debe llenar todos los campos ";
	}
	if (!isEmail($email)) {
		$errors[] = "Direccion de correo invalida ";
	}
	if (!validaPassword($password, $con_password)) {
		$errors[] = "Las contraseñas no coinciden  ";
	}
	if (emailExiste($email)) {
		$errors[] = "El correo electronico ya existe ";
	}
	if (usuarioExiste($usuario)) {
		$errors[] = "El nombre de usuario ya existe ";
	}

	if (count($errors) == 0) {


		$token = generateToken();

		$registro = registraUsuario($usuario, $password, $nombre, $email, $activo, $token, $id_tipo);

		if ($registro > 0) {

			$asunto = 'Activar Cuenta- sistema de usuario';
			$url = 'http://' . $_SERVER["SERVER_NAME"] .
				'/proyectodegrado/activar.php?id=' . $registro . '&val=' . $token;
			$cuerpo = " Estimado $nombre: <br /><br /> Para continuar con el proceso
		de registro , Haga click en: <a href='$url'> Activar Cuenta <a/>";


			if (enviarEmail($email, $nombre, $asunto, $cuerpo)) {

				header('Location:abrir_correo.php');
				exit;
			} else {
				$errors[] = "Error al enviar Email email $email, nombre $nombre ,asunto $asunto ,cuerpo $cuerpo";
			}
		} else {
			$errors[] = "error al Registrar";
		}
	}
}
?>

<!DOCTYPE html>
<html>

<head>
	<title>Sistema de Registro</title>
	<link rel="stylesheet" type="text/css" href="css/estilos_L.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>




	<script type="text/javascript" src="js/main2.js"></script>
	<script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>

</head>

<style>

body{

	background-image: url('img/section3.jpg');
	background-repeat: no-repeat;
	background-size: cover;
}


	
</style>


<div class="login-page">
  <div class="form">
  <div class="container-fluid">
					<img src="img/avatar.svg" width="100px">
				</div>
				<br>
    <form class="login-form" action="<?php $_SERVER['PHP_SELF'] ?>" method="post" autocomplete="off">
      
	<input type="text" value="<?php if (isset($nombre)) echo $nombre; ?>" name="nombre" class="input" autofocus required placeholder="Nombre">
	<input type="email" placeholder="Correo Electronico" name="email" class="input" autofocus required value="<?php if (isset($email)) echo $email; ?>">
	<input type="text" placeholder="Usuario" pattern="[A-Za-z0-9_-]{1,15}" name="usuario" class="input" value="<?php if (isset($usuario)) echo $usuario; ?>" autofocus required>
	<input type="password" placeholder="Contraseña" pattern="[A-Za-z0-9_-]{1,15}" name="password" class="input" required>
	<input type="password" placeholder="Repetir Contraseña" pattern="[A-Za-z0-9_-]{1,15}" name="con_password" class="input" required>

	  <button type="submit" id="btn-signup">Registrarse</button>
	  <?php echo resultBlock($errors); ?>
      <p class="message"> <a href="login.php">Volver</a></p>
    </form>
  </div>
</div>

<body>




	<script type="text/javascript" src="js/main2.js"></script>
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>





</body>

</html>