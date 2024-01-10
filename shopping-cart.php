<?php

//INCLUSIONES REQUERIDAS PARA EL FUNCIONAMIENTO DEL CARRITO
//include 'global/config.php';
include 'global/conexion.php';
include 'carrito.php';
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
                    <a href="index.php"><i class="fa fa-home"></i> Home</a>
                    <a href="shop.php">Shop</a>
                    <span>Carrito</span>
                </div>
            </div>
        </div>
    </div>
</div>






<!--CONDICION QUE DICE QUE SI EL CARRITO NO ESTA VACIO MUESTRA LOS PRODUCTOS SELECCIONADOS EN SHOP.PHP-->
<?php if (!empty($_SESSION['CARRITO'])) {   ?>



    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container col-sm-11">
            <div class="row">
                <div class="col-lg-12">


                    <center>
                        <h3>Lista del Carrito</h3>
                    </center>

                    <div class="container-fluid">
                        <?php if ($mensaje != "") { ?>
                            <center>
                                <div class="alert alert-danger col-4">
                                    <?php echo ($mensaje); ?>

                                <?php } ?>

                                </div>
                            </center>

                            <div class="cart-table">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Imagen</th>

                                            <th class="p-name">Producto</th>

                                            <th>Precio</th>
                                            <th>Cantidad</th>
                                            <th>Total</th>
                                            <th><i class="ti-close"></i></th>
                                        </tr>
                                    </thead>



                                    <?php $total = 0; ?>
                                    <!--RECORRIDO DE CADA UNO DE LOS PRODUCTOS PARA DESPUES SER REPETIDOS-->
                                    <?php foreach ($_SESSION['CARRITO'] as $indice => $productos) { ?>




                                        <tbody>
                                            <tr>
                                                <td class="cart-pic first-row"><img class="img-thumbnail" src="<?php echo $productos['imagen'] ?>"></td>
                                                <td class=" cart-title first-row">
                                                    <h5><?php echo $productos['nombre']; ?></h5>
                                                </td>
                                                <td class="p-price first-row">$<?php echo $productos['precio'] ?></td>
                                                <td class="qua-col first-row">
                                                    <div class="quantity">
                                                        <div class="container col-6">
                                                            <label for=""><?php echo $productos['cantidad'] ?></label>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="total-price first-row">$<?php echo number_format($productos['precio'] * $productos['cantidad'], 2);  ?></td>

                                                <form action="" method="post">

                                                    <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($productos['ID'], COD, KEY); ?>">

                                                    <td class="close-td first-row"><button class="btn btn-danger sm" type="submit" name="btnaccion" value="eliminar">X</button></td>
                                            </tr>
                                            </form>
                                        </tbody>

                                        <!--PROCESO PARA CALCULAR EL TOTAL-->
                                        <?php $total = $total + ($productos['precio'] * $productos['cantidad']); ?>

                                    <?php } ?>



                                </table>
                            </div>
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



                                        <!-- ESTO ES IMPORTANTE,YA QUE ES EL BOTON DE ACCION,BOTON QUE ACCIONA LOS VALORES QUE ESTAN EN CARRITO.PHP
                                    LOS ARTICULOS SELECCIONADOS SON ENVIADOS POR EL METODO POST,AL SER name="btnaccion", ES EVALUADO POR LOS CASOS DEL SWITCH
                                    DEL CARRITO.PHP
                                     -->

                                        <?php 
                                        
                                        if(!isset($_SESSION['usuario'])){
                                                ?>
                                            <div class="alert alert-warning">
                                            <?php echo 'Para proceder a Pagar, Tiene que Ingresar un Usuario o Registrarse.';?>
                                            </div>
                                            <?php }else{
                                        
                                        ?>

                                <form action="pagar.php" method="post">

                                <button class="proceed-btn" name="btnaccion" type="submit" value="">Proceder a Pagar >>

                                </form>
                                            <?php }?>
                                        


                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
    </section>

<?php } else { ?>

    <!--SI EL CARRITO ESTA VACIO,VA A MOSTRAR EL SIGUIENTE AVISO-->
    <style>
        .alert p {

            color: black;
        }
    </style>

    <div class="container">
        <div class="alert alert-warning" role="alert">
            <h4 class="alert-heading">NO HAY PRODUCTOS AGREGADOS!</h4>
            <p>Para proceder con la compra de algun producto, primero tiene que agregar productos al carrito para posteriormente pasar a la seccion se Pagos.</p>

        </div>
    </div>
    <br>

<?php } ?>
<!-- Shopping Cart Section End -->

<?php include 'templates/pie.php'; ?>



</body>

</html>