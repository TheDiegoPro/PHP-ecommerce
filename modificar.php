<?php

include 'global/conexion.php';


$errors = array();
$id = $_GET["modificar"];


$sentencia = $pdo->prepare("SELECT * FROM tblproductos WHERE id=:id");
$sentencia->bindParam(':id', $id);
$sentencia->execute();
$producto = $sentencia->fetch(PDO::FETCH_LAZY);
$txtProducto =$producto['nombre'];
$txtPrecio =$producto['precio'];
$txtCantidad =$producto['cantidad'];
$txtDescripcion =$producto['descripcion'];
$txtCategoria=$producto['categoria'];
$foto =$producto['imagen'];


?>

<!DOCTYPE html>
<html>

<head>
	<title>Sistema de Registro</title>
	<link rel="stylesheet" type="text/css" href="css/estilos.L.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>






	<script type="text/javascript" src="js/main2.js"></script>
	<script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>

</head>

<style>
	body {

		background-image: url('img/section3.jpg');
		background-repeat: no-repeat;
		background-size: cover;
	}

	.login-content {

		padding-left: 10%;	
		padding-bottom: 1%;
		margin-top: 1%;
		
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

<!DOCTYPE html>
<html>

<head>
	<title>Modificar Producto</title>
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
<

<div class="login-page">
  <div class="form">
  <div class="container-fluid">
					<img src="img/avatar.svg" width="100px">
        </div>
        <br>
        <h2>Modificar Producto</h2>
				<br>
				
    <form class="login-form" action="modificar2.php" method="post" autocomplete="off" enctype="multipart/form-data">
      
    <input type="hidden" name="txtID" id="id" class="form-control" value="<?php echo $id; ?>" required>

    <label for="">NOMBRE</label>
<input type="text" id="producto" class="form-control <?php echo (isset($error['Nombre']))?"is-invalid":""; ?>" value="<?php echo $txtProducto; ?>" name="txtProducto" required>
 <?php echo (isset($error['Nombre']))?$error['Nombre']:"" ?>

 <label for="">PRECIO</label>
 <input type="number" id="precio" class="form-control" value="<?php echo $txtPrecio; ?>" name="txtPrecio" min="1" required>
<label for="">CATEGORIA</label>
 <input type="text" id="categoria"class="form-control" value="<?php echo $txtCategoria; ?>" name="txtCategoria" required>
<label for="">CANTIDAD</label>
 <input type="number" id="cantidad "class="form-control" value="<?php echo $txtCantidad; ?>" name="txtCantidad" min="1" required>
<label for="">DESCRIPCIÓN</label>
 <input type="text" id="descripcion" class="form-control" value="<?php echo $txtDescripcion; ?>" name="txtDescripcion" required>
 <?php
            
                if($foto!=""){?>

           <br>
           <img class="img-thumbnail rounded mx-auto d-block" width="100px" src="<?php echo $foto;?>" alt="">
           <br>
           <br>

                <?php } ?>
<input type="file" id="foto" accept="image/*" class="form-control" value="<?php echo $foto; ?>" name="foto">
	  <button type="submit" id="">Modificar</button>
	  
      <p class="message"> <a href="Vistaproductos.php">Volver</a></p>
    </form>
  </div>
</div>








  



	<script type="text/javascript" src="js/main2.js"></script>
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>





</body>

</html>