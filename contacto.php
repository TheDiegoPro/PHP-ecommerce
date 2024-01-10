<?php

//include 'global/config.php';
include 'global/conexion.php';
include 'carrito.php';
include 'templates/cabecera.php';

?>
<nav class="nav-menu mobile-menu">
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="shop.php">Tienda</a></li>
        <li><a href="shopping-cart.php">Carrito(<?php
                                                echo (empty($_SESSION['CARRITO'])) ? 0 : count($_SESSION['CARRITO']);
                                                ?>)</a>

        </li>

        <li class="active"><a href="./contacto.php">Contactanos</a></li>
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

<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text product-more">
                    <a href="./home.html"><i class="fa fa-home"></i> Home</a>
                    <a href="./shop.html">Shop</a>
                    <span>Contacto</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section Begin -->

<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>


<!-- Map Section Begin -->
<div class="map spad">
    <div class="container">
        <div class="map-inner">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3353.887908900391!2d-71.6365204857136!3d10.693813063638546!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e899ecd22a1b721%3A0xd2cfab5751fcd5cc!2sUniversidad%20Privada%20Dr.%20Rafael%20Belloso%20Chac%C3%ADn!5e1!3m2!1ses-419!2sve!4v1587564009373!5m2!1ses-419!2sve" height="610" style="border:0" allowfullscreen="">
            </iframe>
            <div class="icon">
                <i class="fa fa-map-marker"></i>
            </div>
        </div>
    </div>
</div>
<!-- Map Section Begin -->




<!-- Contact Section Begin -->
<section class="contact-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="contact-title">
                    <h4>Contactanos</h4>

                </div>
                <div class="contact-widget">
                    <div class="cw-item">
                        <div class="ci-icon">
                            <i class="ti-location-pin"></i>
                        </div>
                        <div class="ci-text">
                            <span>Direccion:</span>
                            <p>Troncal6, Maracaibo 4005, Zulia</p>
                        </div>
                    </div>
                    <div class="cw-item">
                        <div class="ci-icon">
                            <i class="ti-mobile"></i>
                        </div>
                        <div class="ci-text">
                            <span>Telefono:</span>
                            <p>+58 261 200.8723</p>
                        </div>
                    </div>
                    <div class="cw-item">
                        <div class="ci-icon">
                            <i class="ti-email"></i>
                        </div>
                        <div class="ci-text">
                            <span>Email:</span>
                            <p>contactcenter@urbe.edu</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 offset-lg-1">
                <div class="contact-form">
                    <div class="leave-comment">
                        <h4>Deja tu Comentario</h4>

                        <form action="" method="POST" class="comment-form">
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="text" name="nombre1" placeholder="Nombre" required>
                                </div>
                                <div class="col-lg-6">
                                    <input type="email" name="correo1" placeholder="Correo" required>
                                </div>
                                <div class="col-lg-12">
                                    <textarea name="mensaje" placeholder="Mensaje" required></textarea>
                                    <button type="submit" name="Enviar" value="enviar" class="site-btn">Enviar Mensaje</button>
                                </div>
                            </div>
                        </form>
                        <?php

                        if (
                            isset($_POST['nombre1']) && !empty($_POST['nombre1']) &&
                            isset($_POST['correo1']) && !empty($_POST['correo1']) &&
                            isset($_POST['mensaje']) && !empty($_POST['mensaje'])
                        ) {


                            $sentencia = $pdo->prepare("INSERT INTO tblcomentarios 
                (`nombre`, `correo`, `mensaje`) 
    VALUES ('$_POST[nombre1]','$_POST[correo1]','$_POST[mensaje]');");
                            $sentencia->execute();
                            echo "<script>alert('Mensaje Enviado!')</script>";
                        }


                        ?>



                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Section End -->





<!-- Latest Blog Section End -->
<?php include 'templates/pie.php'; ?>