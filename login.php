<?php


require 'global/conexion_registro.php';
require 'global/funcs.php';
$errors = array();
session_start();
if(!empty($_POST)){
	$usuario = $mysqli->real_escape_string($_POST['usuario']);
	$password = $mysqli->real_escape_string($_POST['password']);

	if(isNullLogin($usuario,$password)){
		$errors[]="Dede llenar todos los campos";
	}
$errors[]=login($usuario,$password);
}

if (isset($_SESSION['usuario'])) {
	if ($_SESSION['usuario']['Tipo_usuario'] == '1') {
		header('location: Vistapanel.php');
	} else if ($_SESSION['usuario']['Tipo_usuario'] == '2') {
		header('location: index.php');
	} else if ($_SESSION['usuario']['Tipo_usuario'] == '3') {
		header('location: Vistapanel.php');
	}
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Sistema de Ingreso</title>
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/login.css">
</head>

<style>


body{

  background-color: gray;
  background-repeat: no-repeat;
  background-size:cover;

}

.card-body{

  opacity: 0.8;
}

</style>

<body>
  <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
      <div class="card login-card">
        <div class="row no-gutters">
          <div class="col-md-5">
            <a href="index.php"><img src="img/dodge2.jpg" alt="login" class="login-card-img"></a>
          </div>
          <div class="col-md-7">
            <div class="card-body">
              <div class="brand-wrapper">
                <img src="img/avatar.svg" alt="logo" class="logo">
              </div>
              <p class="login-card-description">Sistema de Ingreso</p>
              
              

              <form id="loginform" class="form-horizontal" role="form" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off">
                  <div class="form-group">
                    <label for="email" class="sr-only">Email</label>
                    <input id="usuario" type="text" class="form-control" name="usuario" value="" placeholder="usuario o email" required>
                  </div>
                  <div class="form-group mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input id="password" type="password" class="form-control" name="password" placeholder="password" required>
                  </div>
                  <button type="submit" name="" id="botonlg" class="btn btn-warning btn-block">Ingresar</button>
                </form>



                <a href="recupera.php" class="forgot-password-link">Olvidaste Tu Contraseña?</a>
                <p class="login-card-footer-text">No estas Registrado? <a href="registro.php" class="text-reset"><b>Registrate Aqui</b></a></p>
                <a href="index.php"> Volver </a>
                <nav class="login-card-footer-nav">
                <br>
                <?php echo resultBlock($errors); ?>
                </nav>
            </div>
          </div>
        </div>
      </div>



   
    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>
