<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content=".">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no,maximun-scale=1.0,minimun-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Venta de Repuestos Automotrices</title>



    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->

    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</head>

<body>

   

    <nav class="navbar navbar-expand-sm navbar-light bg-light">


        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-sm">

                <?php
                if (isset($_SESSION['usuario'])) { ?>
                    <a class=""><i class=""></i>
                        <center>Bienvenido!,<b><?php echo $_SESSION['usuario']['nombre']; ?></b></center>
                    </a>
            </ul>
           

        <?php } ?>

            
          


        </div>
    </nav>




    </div>
    </div>




    <div class="container">

        <div class="inner-header">
            <div class="row">
                <div class="col-lg-2 col-md-2" id="logo">
                    <div class="logo">
                        <a href="./index.php">
                            <img src="img/LUIS.png" alt="">
                        </a>
                    </div>
                </div>


                <div class="col-sm-7">

                    <br>
                    <br>

                    <form class="form-inline" action="buscador.php" method="get">
                        <input class="form-control col-md-8 mr-sm-4" type="search" name="busqueda" id="busqueda" placeholder="¿ Que Necesitas ?" aria-label="Search">
                        <input class="btn_search btn btn-outline-warning my-2 my-sm-0" value="Buscar" type="submit"></button>
                    </form>

                    <style>
                        
                        #cerrar{

                            margin-left: 83%;

}
            
                        #logo {

                            padding-bottom: 0%;

                        }
                    </style>

                </div>


                <div class="col-lg-3 text-right col-md-3">
                    <ul class="nav-right">

                        <li class="cart-icon">
                            <a href="shopping-cart.php">
                                <i class="icon_bag_alt"></i>
                                <span><?php
                                        echo (empty($_SESSION['CARRITO'])) ? 0 : count($_SESSION['CARRITO']);
                                        ?></span>
                            </a>

                            <div class="cart-hover container-fluid">
                                <div class="select-items col-xs-1">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <?php $total = 0; ?>



                                                <?php

                                                if (isset($_SESSION['CARRITO'])) {

                                                    foreach ($_SESSION['CARRITO'] as $indice => $productos) { ?>
                                                        <td class="si-pic"><img src="<?php echo $productos['imagen'] ?>"></td>
                                                        <td class="si-text">
                                                            <div class="product-selected">
                                                                <p>$<?php echo $productos['precio'] ?> x <?php echo $productos['cantidad'] ?></p>
                                                                <h6><?php echo $productos['nombre'] ?></h6>
                                                            </div>
                                                        </td>
                                                        <form action="" method="post">
                                                            <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($productos['ID'], COD, KEY); ?>">

                                                            <td class="close-td first-row"><button class="btn btn-danger sm" type="submit" name="btnaccion" value="eliminar">X</button></td>
                                            </tr>
                                            </form>
                                            <tr>
                                                <?php $total = $total + ($productos['precio'] * $productos['cantidad']); ?>


                                            </tr>
                                        </tbody>
                                <?php }
                                                } ?>
                                    </table>

                                </div>
                                <div class="select-total">

                                    <span>total:</span>
                                    <h5>$<?php echo number_format($total, 2); ?></h5>

                                </div>
                                <div class="select-button">
                                    <a href="shopping-cart.php" class="primary-btn view-card">VER CARRITO</a>

                                </div>
                            </div>
                        </li>
                        <li class="cart-price">$<?php echo number_format($total, 2); ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <div class="nav-item">
        <div class="container col-sm-12">
            <div class="nav-depart">
                <div class="depart-btn">
                    <i class="ti-menu"></i>
                    <span>Productos</span>
                    <ul class="depart-hover">
                        <li><a href="showcategoryproduct.php?category=motores&pagina=1">Motores</a></li>
                        <li><a href="showcategoryproduct.php?category=enfriamiento&pagina=1">Sistema de Refrigeración</a></li>
                        <li><a href="showcategoryproduct.php?category=frenos&pagina=1">Sistema de Frenos</a></li>
                        <li><a href="showcategoryproduct.php?category=cauchos&pagina=1">Cauchos</a></li>
                        <li><a href="showcategoryproduct.php?category=rines&pagina=1">Rines</a></li>
                        <li><a href="showcategoryproduct.php?category=transmision&pagina=1">Transmisiones</a></li>
                        <li><a href="showcategoryproduct.php?category=interiores&pagina=1">Interiores</a></li>
                        <li><a href="showcategoryproduct.php?category=servicios&pagina=1">Servicios</a></li>
                        <li><a href="showcategoryproduct.php?category=otros&pagina=1">Miscelaneos</a></li>
                    </ul>
                </div>
            </div>


            <!-- Header End -->