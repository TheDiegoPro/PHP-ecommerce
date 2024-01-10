<?php

require 'global/conexion_login.php';
require 'global/funcs.php';

$user_id = null;
$token = null;
	
if(empty($_GET['user_id'])){
 header('Location: index.php');
}
if(empty($_GET['token'])){
	header('Location: index.php');
}
	$user_id = $mysqli->real_escape_string($_GET['user_id']);
	$token = $mysqli->real_escape_string($_GET['token']);

	if(!verificaTokenPass($user_id,$token)){
echo'no se pudo verificar los datos ';
exit;
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
		body {

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
			<h3>Recuperar Contraseña</h3>
			<br>

			<form class="login-form" action="guarda_pass.php" method="post" autocomplete="off">
				<input type="hidden" id="user_id" name="user_id" value="<?php echo $user_id; ?>" />
				<input type="hidden" id="token" name="token" value ="<?php echo $token; ?>" />


				<h5>Escribe una contraseña Nueva.</h5>

				<input type="password" id="email" name="password" class="input" autofocus required placeholder="Nueva Contraseña">
<input type="password" id="email" name="con_password" class="input" autofocus required placeholder="Confirmar Contraseña">


				<button type="submit" id="btn-login">Enviar</button>
				
				<p class="message"> <a href="login.php">Volver</a></p>
				<a href="registro.php">¿No tiene una cuenta? </a>
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
		

			<form action="guarda_pass.php" method="post" autocomplete="off">
			<input type="hidden" id="user_id" name="user_id" value ="<?php echo $user_id; ?>" />
							
							<input type="hidden" id="token" name="token" value ="<?php echo $token; ?>" />

				<div class="container-fluid">
					<img src="img/avatar.svg">
				</div>

				<h3>Recuperar Contraseña</h3>
				<br>

				<h5>Escribe una contraseña Nueva.</h5>
				<br>
				<br>

				<div class="input-div one">
					<div class="i">
						<i class="fas fa-user"></i>
					</div>
					<div class="div">
	
						<h5></h5>
						
						<input type="password" id="email" name="password" class="input" autofocus required placeholder="Nueva Contraseña">

					</div>
				</div>

				<div class="input-div one">
					<div class="i">
						<i class="fas fa-user"></i>
					</div>
					<div class="div">
	
						<h5></h5>
						
						<input type="password" id="email" name="con_password" class="input" autofocus required placeholder="Confirmar Contraseña">

					</div>
				</div>



				<div class="container-fluid"></div>

				<button type="submit" id="btn-login" class="btn btn-danger btn-block">Enviar</button>
				
				
				<a class="volver" href="login.php"><- Volver</a>
				<br>
				<div class="form-group">
								<div class="col-md-12 control">
									<div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
										¿No tiene una cuenta? 
										<a href="registro.php"><center>Registrate aquí</center></a>
									</div>
								</div>
							</div>


				
				

		</div>

		</form>

	</div>

	</div>
-->

	<script type="text/javascript" src="js/main2.js"></script>
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>





</body>

</html>


</html>