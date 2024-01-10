<?php

//include 'global/config.php';


include 'global/conexion.php';
include 'carrito.php';


//RECEPCION DE VARIABLES POR METODO $_GET

$variable = $_GET['ult_p'];
//$total_base = $_GET['totalbd'];
//$descuento = $_GET['descontar'];


//PROCESO PARA REALIZAR UN UPDATE MEDIANTE $_GET
$sql = $pdo->prepare("UPDATE `tblventas` SET `status`= 'APROBADO' WHERE ID=:ultimo");
$sql->bindParam(":ultimo", $variable);
 $sql->execute();


 //SENTENCIA PARA DESCONTAR PRODUCTOS DE LA BASE DE DATOS UTILIZANDO DATOS RECEPCINADOS CON $_GET
   
 foreach ($_SESSION['CARRITO'] as $indice => $producto) {
            $totalbd= $producto['tb'];
            $descontar= $producto['cantidad'];
            
            $sentencia = $pdo->prepare("UPDATE tblproductos SET cantidad = ".$totalbd." - ".$descontar." WHERE id=".$producto['ID']." ");
          $sentencia->execute();
 }
include 'templates/cabecera.php';


?>

<nav class="nav-menu mobile-menu">
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="shop.php">Tienda</a></li>
        <li class="active"><a href="shopping-cart.php">Carrito(<?php
                                                                echo (empty($_SESSION['CARRITO'])) ? 0 : count($_SESSION['CARRITO']);
                                                                ?>)</a>

        <li><a href="./contacto.php">Contactanos</a></li>
        <li><a href="nosotros.php">Nosotros</a>
        <?php
        if (isset($_SESSION['usuario'])) { ?>
            <li><a href="salir.php">Cerrar Sesion</a></li>
        <?php } else { ?>
            <li><a href="login.php">Ingresar</a></li>
        <?php } ?>
    </ul>
</nav>
<div id="mobile-menu-wrap"></div>
</div>
</div>
</header>

<!-- Page Preloder -->
<div id="preloder">
        <div class="loader"></div>
    </div>

<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text product-more">
                    <a href="./home.html"><i class="fa fa-home"></i> Home</a>
                    <a href="./shop.html">Shop</a>
                    <span>Carrito</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section Begin -->


<div class="container">
    <div class="jumbotron bg-info">

        <center>
            <h1 class="display-4">Compra Realizada!</h1>
            <div class="containter">

                <img src="img\cart-success.png" alt="" height="250px">
                <br>
                <br>

                <?php if (!empty($_SESSION['CARRITO'])) { ?>

                    

                    <!-- Shopping Cart Section Begin -->
                    <section class="shopping-cart spad">
                        <div class="container bg-light col-sm-11">
                            <div class="row">
                                <div class="col-lg-12">
                                    <br>
                                    <center>
                                        <h3>Compra:</h3>
                                    </center>
                                    <br>
                                    <div class="cart-table">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th>Imagen</th>
                                                    <th class="p-name">Producto</th>
                                                    <th>Precio</th>
                                                    <th>Cantidad</th>
                                                    <th>Total</th>

                                                </tr>
                                            </thead>
                                           

                                            <?php $total = 0; ?>
                                            <?php foreach ($_SESSION['CARRITO'] as $indice => $productos) { ?>
                                                 
                                               

                                                <tbody>
                                                    <tr>
                                                        <td class="cart-pic first-row"><img class="img-thumbnail" src="<?php echo $productos['imagen'] ?>"></td>
                                                        <td class=" cart-title first-row">
                                                            <h5><?php echo $productos['nombre']; ?></h5>
                                                        </td>
                                                        <td class="p-price first-row">$<?php echo $productos['precio'] ?></td>
                                                        <td class="qua-col first-row">
                                                            <div><?php echo $productos['cantidad']; ?></div>
                                                        </td>
                                                        <td class="total-price first-row">$<?php echo number_format($productos['precio'] * $productos['cantidad'], 2);  ?></td>


                                                </tbody>


                                                <?php $total = $total + ($productos['precio'] * $productos['cantidad']); 

                                               
                                                 
                                               
                                            
                                                
                                               // $sentencia = $pdo->prepare("UPDATE tblproductos SET cantidad = ".$totalbd." - ".$descontar." ");
                                               // $sentencia->execute();
                                                
                                                
                                                ?>

                                                


                                            <?php 
                                                
                                            
                                            //foreach($_SESSION['CARRITO'] as $indice=>$producto){
                                                //unset($_SESSION['CARRITO'][$indice]);} 
                                                }?>

                                            


                                            
                                                
                                        </table>
                                    </div>

                                    <a href="imprimir.php">Imprimir Factura</a>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            
                                            <div class="cart-buttons">


                                                <a href="shop.php" class="primary-btn up-cart">
                                                    << Volver a la Tienda</a> </div> <div class="discount-coupon">
                                                        <h6></h6>
                                                        <form action="#" class="coupon-form">
                                                            <input type="hidden" placeholder="Enter your codes">
                                                            <button type="hidden" class="site-btn coupon-btn"></button>
                                                            
                                                        </form>
                                                        
                                            </div>
                                            
                                        </div>
                                        <div class="col-lg-4 offset-lg-4">
                                            <div class="proceed-checkout">
                                                <ul>

                                                    <li class="cart-total">Total <span>$<?php echo number_format($total, 2); ?></span></li>
                                                </ul>

                                                <br>





                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                <?php }    ?>

            </div>

            <p class="lead">Gracias por preferirnos como su proveedor de repuestos automotrices.</p>
            <hr class="my-4">
        </center>

        <style>
            .alert p {

                color: black;
            }
        </style>

        <div class="alert alert-warning" id="alerta" role="alert">
            <h4 class="alert-heading">Aviso!</h4>
            <p>Para finalizar con el proceso de Pago y retirar los productos del Carrito,Haga click en <b>"Imprimir Factura"</b>. Para cualquier tipo de Reclamos puede enviar un correo a la siguiente direccion: repuestos.accesorioscompany@gmail.com</p>
            <hr>
            <p class="mb-0">Tambien puede dejarnos un comentario en la seccion "Contactanos"</p>
        </div>


    </div>
</div>



<?php include 'templates/pie.php';  ?>