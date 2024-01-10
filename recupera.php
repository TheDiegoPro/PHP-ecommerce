<?php
require 'global/conexion_login.php';
require 'global/funcs.php';

$errors = array();
if(!empty($_POST))
{
	
		$email = $mysqli->real_escape_string($_POST['email']);

    if(!isEmail($email))
    { 
	$errors[]="Debe ingresar un correo electronico valido";}

	 if(emailExiste($email))
	 {  
	$user_id= getValor('id','correo',$email);
	$nombre= getValor('nombre','correo',$email);


	$token=generaTokenPass($user_id);

	$asunto='Recupera Password - Sistema de usuarios';
	$url= 'http://'.$_SERVER["SERVER_NAME"].
	'/proyectodegrado/cambia_pass.php?user_id='.$user_id.'&token='.$token;
	$cuerpo =" Estimado $nombre: <br /><br /> Se ha solicitado un reinicio 
	de contraseña. <br /><br /> Para restaurar la contraseña,
	visita la siguiente direccion: <a href='$url'>cambiar password<a/>";

if(enviarEmail($email,$nombre,$asunto,$cuerpo)){
	
	header('location: correo_enviado.php');

}else{
	$errors[]="Error al enviar Email";
     }
	


	 }else{
		 $errors[]="No existe el correo electronico";
	       }

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

	
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>





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
				<h3>Recuperar Contraseña</h3>
				<br>
				
    <form class="login-form" action="<?php $_SERVER['PHP_SELF'] ?>" method="post" autocomplete="off">
	<p><b> Para recuperar tu contraseña,escribe tu correo electronico para enviarte un link especial para el cambio de contraseña.</b></p>

	<input type="email" id="email" name="email" class="input" autofocus required placeholder="Correo Electronico">

	  <button type="submit" id="btn-login">Enviar</button>
	  <?php echo resultBlock($errors); ?>
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









<div class="container-fluid col-sm">

		<div class="login-content">
		

			<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" autocomplete="off">

				<div class="container-fluid">
					<img src="img/avatar.svg">
				</div>

				<h3>Recuperar Contraseña</h3>
				<br>

				<h5>Para recuperar tu contraseña,escribe tu correo electronico para enviarte un link especial para el cambio de contraseña.</h5>
				<br>
				<br>
				<div class="input-div one">


					<div class="i">
						<i class="fas fa-user"></i>
					</div>
					<div class="div">
	
						<h5></h5>
						
						<input type="email" id="email" name="email" class="input" autofocus required placeholder="Correo Electronico">
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


				<?php echo resultBlock($errors); ?>
				

		</div>

		</form>

	</div>

	</div>
	
	</div>
-->

	<script type="text/javascript" src="js/main2.js"></script>
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>





</body>




</html>							