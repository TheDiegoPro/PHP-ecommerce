<?php


include("global/conexion.php");


//suma de cada uno de las ventas realizadas
$sentenciaSQL = $pdo->prepare("SELECT count(*) totalVentas FROM `tblventas`");
$sentenciaSQL->execute();

$registro = $sentenciaSQL->fetch();

$numeroRegistros = $sentenciaSQL->rowCount(PDO::FETCH_ASSOC);
$totalVentas = $registro['totalVentas'];



//total de usuarios

$sentenciaSQL2 = $pdo->prepare("SELECT count(*) usuarios FROM `tblusuarios`");
$sentenciaSQL2->execute();

$registro2 = $sentenciaSQL2->fetch();

$numeroRegistros2 = $sentenciaSQL2->rowCount(PDO::FETCH_ASSOC);
$totalusuarios = $registro2['usuarios'];


//suma del total de fondos obtenidos

$sentenciaSQL3 = $pdo->prepare("SELECT SUM(Total) as total FROM `tblventas`");
$sentenciaSQL3->execute();

$registro3 = $sentenciaSQL3->fetch();


$total_v = $registro3['total'];

//comentarios

$sentenciaSQL4 = $pdo->prepare("SELECT count(*) comentarios FROM `tblcomentarios`");
$sentenciaSQL4->execute();

$registro4 = $sentenciaSQL4->fetch();

$numeroRegistros4 = $sentenciaSQL4->rowCount(PDO::FETCH_ASSOC);
$comentarios = $registro4['comentarios'];


//seleccion de todos los productos
$sentencia = $pdo->prepare("SELECT * FROM `tblproductos`");
$sentencia->execute();
$listaProductos = $sentencia->fetchALL(PDO::FETCH_ASSOC);
//print_r($listaProductos);

//total de productos

$sentenciaSQL5 = $pdo->prepare("SELECT count(*) productos FROM `tblproductos`");
$sentenciaSQL5->execute();

$registro5 = $sentenciaSQL5->fetch();

$numeroRegistros5 = $sentenciaSQL5->rowCount(PDO::FETCH_ASSOC);
$totalproductos = $registro5['productos'];


//ventas

$sentencia2 = $pdo->prepare("SELECT * FROM `tblventas`");
$sentencia2->execute();
$listaVentas = $sentencia2->fetchALL(PDO::FETCH_ASSOC);

//usuarios

$sentencia3 = $pdo->prepare("SELECT * FROM `tblusuarios`");
$sentencia3->execute();
$listaUsuarios = $sentencia3->fetchALL(PDO::FETCH_ASSOC);

//comentarios

$sentencia4 = $pdo->prepare("SELECT * FROM `tblcomentarios`");
$sentencia4->execute();
$listaComentarios = $sentencia4->fetchALL(PDO::FETCH_ASSOC);