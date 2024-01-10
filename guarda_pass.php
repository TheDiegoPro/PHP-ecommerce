<?php
	
	require 'global/conexion_login.php';
	require 'global/funcs.php';
	$errors="Password modificada con exito.";
	
	$user_id = $mysqli->real_escape_string($_POST['user_id']);
	$token = $mysqli->real_escape_string($_POST['token']);
	$password = $mysqli->real_escape_string($_POST['password']);
	$con_password = $mysqli->real_escape_string($_POST['con_password']);
	
	
	if(validaPassword($password,$con_password)){
		$pass_hash=hashPassword($password);
		if(cambiaPassword($password,$user_id,$token)){
			
		

		}else{
			$errors="Error al modificar el Password.... Por cuestiones de seguridad para volver a intentarlo vuelva a acceder al link proporcionado";
		}
	}else{
		$errors="Las contraseña no coinciden.... Por cuestiones de seguridad para volver a intentarlo vuelva a acceder al link proporcionado";
	}

?>	


<!DOCTYPE html>
<html>

<head>
	<title>Sistema de Ingreso</title>
	<link rel="stylesheet" type="text/css" href="css/estilos_L.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>

	






	<script type="text/javascript" src="js/main2.js"></script>
	<script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>

</head>



<body>



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
				<h3><?php echo $errors?></h3>
				<br>
				
    <form class="login-form" action="login.php" method="" autocomplete="off">
	<button type="submit" id="btn-login">Ingresar</button>
	  
    </form>
  </div>
</div>












<!--
<style>
	body {

		background-image: url('img/section3.jpg');
		background-repeat: no-repeat;
		background-size: cover;
	}

	.login-content {

		padding-left: 10%;	
		padding-bottom: 1%;
		margin-top: 5%;
		
		margin-left: 27%;
		margin-right: 27%;
		
		border-style: ridge;
		
		
		background-color: whitesmoke;
		opacity: .9;
		
	}

	.btn{

background-image: linear-gradient(to right, #FFC90E, #FFC90E, #FFC90E);

}

	
	
</style>

<body>


		<div class="login-content">
		

			<form action="" method="" autocomplete="off">

				<div class="container-fluid">
					<img src="img/avatar.svg">
				</div>
<br>
<br>

				<h3><?php echo $errors?></h3>
				
				<br>
				<br>
			
				<br>

	

		</div>

		</form>

	</div>

	</div>
-->

	<script type="text/javascript" src="js/main2.js"></script>
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>

</body>




</html>		





