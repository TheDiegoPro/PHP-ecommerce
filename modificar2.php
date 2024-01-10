<?php
include 'global/conexion.php';

$txtID = (isset($_POST['txtID'])) ? $_POST['txtID'] : "";

$txtProducto = (isset($_POST['txtProducto'])) ? $_POST['txtProducto'] : "";
$txtPrecio = (isset($_POST['txtPrecio'])) ? $_POST['txtPrecio'] : "";
$txtCategoria = (isset($_POST['txtCategoria'])) ? $_POST['txtCategoria'] : "";
$txtCantidad = (isset($_POST['txtCantidad'])) ? $_POST['txtCantidad'] : "";
$txtDescripcion = (isset($_POST['txtDescripcion'])) ? $_POST['txtDescripcion'] : "";
$foto = (isset($_FILES['foto']['name'])) ? $_FILES['foto']['name'] : "";

$sentencia = $pdo->prepare("UPDATE tblproductos SET nombre=:nombre, precio=:precio, categoria=:categoria, cantidad=:cantidad, descripcion=:descripcion WHERE id=:id ");

    $sentencia->bindParam(':nombre', $txtProducto);
    $sentencia->bindParam(':precio', $txtPrecio);
    $sentencia->bindParam(':categoria', $txtCategoria);
    $sentencia->bindParam(':cantidad', $txtCantidad);
    $sentencia->bindParam(':descripcion', $txtDescripcion);

    $sentencia->bindParam(':id', $txtID);
    $sentencia->execute();


    $Fecha = new DateTime();
    $nombreArchivo = ($foto != "") ? $Fecha->getTimestamp() . "_" . $_FILES["foto"]["name"] : "imagen.jpg";

    $tmpFoto = $_FILES["foto"]["tmp_name"];

    if ($tmpFoto != "") {
      move_uploaded_file($tmpFoto, "img/cart_img/" . $nombreArchivo);


      $sentencia = $pdo->prepare("SELECT imagen FROM tblproductos WHERE id=:id");
      $sentencia->bindParam(':id', $txtID);
      $sentencia->execute();
      $producto = $sentencia->fetch(PDO::FETCH_LAZY);


      if (isset($producto["imagen"])) {
        if (file_exists($producto["imagen"])) {

          if ($item['imagen'] != "imagen.jpg") {
            unlink($producto["imagen"]);
          }
        }
      }

      $sentencia = $pdo->prepare("UPDATE tblproductos SET imagen= 'img/cart_img/' :foto WHERE id=:id ");
      $sentencia->bindParam(':foto', $nombreArchivo);
      $sentencia->bindParam(':id', $txtID);
      $sentencia->execute();
    }
   header('location: vistaProductos.php');
echo $txtCantidad;
echo $txtCategoria;
echo $txtID;
echo $txtPrecio;
echo $txtProducto;
echo $txtDescripcion;
echo $foto; 


?>

