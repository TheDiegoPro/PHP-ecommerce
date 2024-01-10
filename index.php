<?php

//INCLUSIONES DE BASE DE DATOS Y FUNCIONAMIENTO DEL CARRITO

//include 'global/config.php';
include 'global/conexion.php';
include 'carrito.php';


if (isset($_SESSION['usuario'])) {
    if ($_SESSION['usuario']['Tipo_usuario'] != "2") {
        header("location: Vistapanel.php");
    }
} else {
    // header('location: login.php');

}


include 'templates/cabecera.php';



?>



<nav class="nav-menu mobile-menu">
    <ul>
        <li class="active"><a href="index.php">Home</a></li>
        <li><a href="shop.php">Tienda</a></li>

        <!-- PROCESO PARA CONTAR LOS PRODUCTOS DEL CARRITO-->
        <li><a href="shopping-cart.php">Carrito(<?php
                                                echo (empty($_SESSION['CARRITO'])) ? 0 : count($_SESSION['CARRITO']);
                                                ?>)</a>

        </li>

        <li><a href="./contacto.php">Contactanos</a></li>
        <li><a href="nosotros.php">Nosotros</a></li>

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

<!-- Hero Section Begin -->
<section class="hero-section">
    <div class="hero-items owl-carousel">
        <div class="single-hero-items set-bg" data-setbg="img/car5_2.png">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">

                        <!-- SHOW CATEGORY PRODUCT MUESTRA LAS CATEGORIAS DE CADA UNO DE LOS PRODUCTOS UTILIZANDO EL METODO GET (? ) -->
                        <span>Motores</span>
                        <h1>Motores</h1>
                        <p><b>Descubre la amplia galeria de Motores que tenemos para ofrecerte a un comodo precio.</b></p>
                        <a href="showcategoryproduct.php?category=motores&pagina=1" class="primary-btn">Seccion de Motores</a>
                    </div>
                </div>

            </div>
        </div>

        <div class="single-hero-items set-bg" data-setbg="img/car8.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">

                        <span>Rines</span>
                        <h1>Rines</h1>
                        <p><b>¿ Amante de los diseños de Rines? chequea nuestra lista de Rines.</b></p>
                        <a href="showcategoryproduct.php?category=rines&pagina=1" class="primary-btn">Seccion de Rines</a>
                    </div>
                </div>

            </div>
        </div>

        <div class="single-hero-items set-bg" data-setbg="img/car9.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">

                        <span>Cauchos</span>
                        <h1>Cauchos</h1>
                        <p><b>Chequea nuestra lista de cauchos Disponible de diversas Marcas.</b></p>
                        <a href="showcategoryproduct.php?category=cauchos&pagina=1" class="primary-btn">Seccion Cauchos</a>
                    </div>
                </div>

            </div>
        </div>

        <div class="single-hero-items set-bg" data-setbg="img/car7.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">

                        <span>Frenos</span>
                        <h1>Frenos</h1>
                        <p><b>¿ Necesitas cambiar o hacer mantenimiento a tus frenos ? tenemos la solucion!</b></p>
                        <a href="showcategoryproduct.php?category=frenos&pagina=1" class="primary-btn">Seccion de Frenos</a>
                    </div>
                </div>
            </div>

        </div>
        <div class="single-hero-items set-bg" data-setbg="img/car3.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <span>Interiores</span>
                        <h1>Interiores</h1>
                        <p><b>Ven a ver nuestra lista de interiores Disponibles en la seccion de Interiores.</b></p>
                        <a href="showcategoryproduct.php?category=interiores&pagina=1" class="primary-btn">Interiores</a>
                    </div>
                </div>

            </div>
        </div>
        <div class="single-hero-items set-bg" data-setbg="img/car6.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <span>Enfriamiento</span>
                        <h1>Sistema de Enfriamiento</h1>
                        <p><b>¿Problemas de temperatura? Ven y chequea nuestra lista de Sistema de Enfriamiento y Dispositivos refrigerantes inteligentes.</b></p>
                        <a href="showcategoryproduct.php?category=enframiento&pagina=1" class="primary-btn">Sistemas de Enfriamiento.</a>
                    </div>
                </div>

            </div>
        </div>

        <div class="single-hero-items set-bg" data-setbg="img/car2.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <span>Accesorios</span>
                        <h1>Accesorios</h1>
                        <p><b>¿Quieres mejorar la estetica externa de tu vehiculo? esta es la sección ideal para ti! </b></p>
                        <a href="showcategoryproduct.php?category=accesorios&pagina=1" class="primary-btn">Accesorios</a>
                    </div>
                </div>


            </div>

        </div>
    </div>
</section>
<!-- Hero Section End -->
<hr>
<br>

<!-- Banner Section Begin -->
<center>
    <h2>Categorias:</h2>
</center>
<div class="banner-section spad">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4">
                <div class="single-banner">
                    <img src="img/section3.jpg" alt="">
                    <div class="inner-text">
                        <a href="showcategoryproduct.php?category=motores&pagina=1" class="primary-btn">Motores</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="single-banner">
                    <img src="img/section2.jpg" alt="">
                    <div class="inner-text">
                        <a href="showcategoryproduct.php?category=enfriamiento&pagina=1" class="primary-btn">Enfriamiento</a>
                    </div>
                </div>
            </div>


            <div class="col-lg-4">
                <div class="single-banner">
                    <img src="img/section4.jpg" alt="">
                    <div class="inner-text">
                        <a href="showcategoryproduct.php?category=frenos&pagina=1" class="primary-btn">Frenos</a>
                    </div>
                </div>
            </div>


            <div class="col-lg-4">
                <div class="single-banner">
                    <img src="img/section6.jpg" alt="">
                    <div class="inner-text">
                        <a href="showcategoryproduct.php?category=cauchos&pagina=1" class="primary-btn">Cauchos</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="single-banner">
                    <img src="img/section7.jpg" alt="">
                    <div class="inner-text">
                        <a href="showcategoryproduct.php?category=rines&pagina=1" class="primary-btn">Rines</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">

                <div class="single-banner">
                    <img src="img/section8.jpg" alt="">
                    <div class="inner-text">
                        <a href="showcategoryproduct.php?category=transmision&pagina=1" class="primary-btn">Transmision</a>
                    </div>
                </div>

            </div>

            <div class="col-lg-4">

                <div class="single-banner">
                    <img src="img/section9.jpg" alt="">
                    <div class="inner-text">
                        <a href="showcategoryproduct.php?category=interiores&pagina=1" class="primary-btn">Interiores</a>
                    </div>
                </div>

            </div>

            <div class="col-lg-4">

                <div class="single-banner">
                    <img src="img/car2.jpg" alt="">
                    <div class="inner-text">
                        <a href="showcategoryproduct.php?category=otros&pagina=1" class="primary-btn">Accesorios</a>
                    </div>
                </div>

            </div>

            <div class="col-lg-4">

                <div class="single-banner">
                    <img src="img/section11.jpg" alt="">
                    <div class="inner-text">
                        <a href="showcategoryproduct.php?category=servicios&pagina=1" class="primary-btn">Servicios</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<hr>

<!-- Banner Section End -->


<!-- Women Banner Section Begin -->

<center>
    <h1>TENDENCIAS</h1>
</center>
<br>
<br>
<section class="women-banner spad">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">
                <div class="product-large set-bg" data-setbg="img/toyota2.jpg">
                    <h2><b>Toyota</b></h2>
                    <a href="#"><b>Corolla 2020</b></a>
                </div>
            </div>
            <div class="col-lg-8 offset-lg-1">
                <hr>
                <br>
                <br>
                <div class="product-slider owl-carousel">

                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="img/products/toyota3.jpg" alt="">
                            <div></div>

                        </div>
                        <div class="pi-text">
                            <div class="catagory-name">Motor</div>
                            <a href="#">
                                <h5>1987 cc 3ZR-FE I4</h5>
                                <h5>107 kW (145 PS) at 6,200 rpm</h5>
                            </a>

                        </div>
                    </div>


                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="img/products/toyota4.jpg" alt="">
                            <div></div>

                        </div>
                        <div class="pi-text">
                            <div class="catagory-name">Interior</div>
                            <a href="#">
                                <h5>Interior de Cuero</h5>
                                <h5>Pantalla Inteligente con GPS</h5>
                            </a>

                        </div>
                    </div>
                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="img/products/toyota5.jpg" alt="">
                            <div></div>
                        </div>
                        <div class="pi-text">
                            <div class="catagory-name">Diseño</div>
                            <a href="#">
                                <h5>Diseño Ergonomico y Aereodinamico</h5>
                            </a>

                        </div>
                    </div>
                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="img/products/toyota6.jpg" alt="">
                            <div></div>
                        </div>
                        <div class="pi-text">
                            <div class="catagory-name">Perfomance</div>
                            <a href="#">
                                <h5>Entradas de Aire frontales mejoradas</h5>
                                <h5>Ofreciendo un Mejor Rendimiento</h5>
                            </a>

                        </div>
                    </div>
                </div>

                <hr>
            </div>

        </div>


    </div>
</section>
<!-- Women Banner Section End -->


<!-- Deal Of The Week Section Begin-->
<section class="deal-of-week set-bg spad col-xs" data-setbg="img/mid.jpg">
    <div class="container-fluid">
        <div class="col-lg-6 text-center">
            <div class="section-title">
                <h2>Oferta!</h2>
                <p>Llevate un juego de llantas OFF-ROAD para tu vehiculo todo terreno. ¡ Aprovecha esta oferta ! </p>
                <div class="product-price">
                    $100.00
                    <span>/ OffRoad</span>
                </div>
            </div>
            <div class="countdown-timer" id="countdown">
                <div class="cd-item">
                    <span>56</span>
                    <p>Dias</p>
                </div>
                <div class="cd-item">
                    <span>12</span>
                    <p>Hrs</p>
                </div>
                <div class="cd-item">
                    <span>40</span>
                    <p>Mins</p>
                </div>
                <div class="cd-item">
                    <span>52</span>
                    <p>Segs</p>
                </div>


            </div>




            <a href="showcategoryproduct.php?category=cauchos&pagina=1" <button class="btn btn-outline-warning" name="btnaccion" value="agregar" type="button">
                Ver Sección
                </button></a>


            </form>



        </div>
    </div>
</section>
<!-- Deal Of The Week Section End -->


<!-- Man Banner Section Begin -->
<section class="man-banner spad">

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <br>
                <hr>
                <br>
                <div class="product-slider owl-carousel">


                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="img/products/fordcarousel1.jpg" alt="">
                            <div></div>
                        </div>
                        <div class="pi-text">
                            <div class="catagory-name">Interior</div>
                            <a href="#">
                                <h5>Interior de lujo con componentes de ultima generación.</h5>
                            </a>

                        </div>
                    </div>


                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="img/products/fordcarousel2.jpg" alt="">
                            <div></div>
                        </div>
                        <div class="pi-text">
                            <div class="catagory-name">Motor</div>
                            <a href="#">
                                <h5>7.3L (444 Ci) V8.</h5>
                            </a>

                        </div>
                    </div>


                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="img/products/fordcarousel3.jpg" alt="">
                            <div></div>
                        </div>
                        <div class="pi-text">
                            <div class="catagory-name">Diseño</div>
                            <a href="#">
                                <h5>Diseño Robusto todo Terreno.</h5>
                            </a>

                        </div>
                    </div>


                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="img/products/fordcarousel4.jpg" alt="">
                            <div></div>
                        </div>
                        <div class="pi-text">
                            <div class="catagory-name">Sistema</div>
                            <a href="#">
                                <h5>Sistema Inteligente de Navegación y ahorro de combustible.</h5>
                            </a>

                        </div>
                    </div>
                </div>
                <hr>
            </div>


            <div class="col-lg-3 offset-lg-1">
                <div class="product-large set-bg m-large" data-setbg="img/products/ford2.jpg">
                    <h2>Ford</h2>
                    <a href="#">f-150 2020</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Man Banner Section End -->


<!-- Latest Blog Section Begin -->
<section class="latest-blog spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>NOTICIAS</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="single-latest-blog">
                    <img src="img/tesla.jpg" alt="">
                    <div class="latest-text">
                        <div class="tag-list">
                            <div class="tag-item">
                                <i class="fa fa-calendar-o"></i>
                                Feb 28,2020
                            </div>
                            <div class="tag-item">


                            </div>
                        </div>
                        <a href="https://www.caranddriver.com/es/coches/planeta-motor/a31152275/tesla-confirma-rediseno-cybertruck-produccion/">
                            <h4>Tesla confirma un rediseño en el Cybertruck de producción</h4>
                        </a>
                        <p class="p1">Elon Musk ha confirmado cambios en la estética del pick-up eléctrico. </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-latest-blog">
                    <img src="img/electronico.jpg" alt="">
                    <div class="latest-text">
                        <div class="tag-list">
                            <div class="tag-item">
                                <i class="fa fa-calendar-o"></i>
                                Feb 28,2020
                            </div>
                            <div class="tag-item">

                            </div>
                        </div>
                        <a href="https://www.hibridosyelectricos.com/articulo/sector/coches-electricos-hibridos-enchufables-puntos-carga-baterias-menos-100-kwh/20200228125519033508.html">
                            <h4>Más coches eléctricos, híbridos enchufables y puntos de carga... y baterías por menos de 100 $/kWh</h4>
                        </a>
                        <p class="p1">Más coches eléctricos, híbridos enchufables y puntos de carga... y baterías por menos de 100 $/kWh </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-latest-blog">
                    <img src="img/inteligente.jpg" alt="">
                    <div class="latest-text">
                        <div class="tag-list">
                            <div class="tag-item">
                                <i class="fa fa-calendar-o"></i>
                                May 21,2019
                            </div>

                        </div>
                        <a href="https://www.marca.com/coches-y-motos/tecnologia/2020/02/21/5e501639ca474107108b456d.html">
                            <h4>Hyundai y Kia preparan un cambio de marchas automático 'inteligente'</h4>
                        </a>
                        <p class="p1">Las cajas de cambio automáticas son una realidad muy presente para las marcas y los conductores. Hasta hace unos años, en nuestro país eran una extravagancia que con el paso de los años ha ido ganando peso. </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="benefit-items">
            <div class="row">
                <div class="col-lg-4">
                    <div class="single-benefit">
                        <div class="sb-icon">
                            <img src="img/icon-1.png" alt="">
                        </div>
                        <div class="sb-text">
                            <h6>Envio Gratis</h6>
                            <p>De compras mayores a 5 articulos.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-benefit">
                        <div class="sb-icon">
                            <img src="img/icon-2.png" alt="">
                        </div>
                        <div class="sb-text">
                            <h6>Entregas Nacionales</h6>
                            <p>En Tiempo Record.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-benefit">
                        <div class="sb-icon">
                            <img src="img/icon-1.png" alt="">
                        </div>
                        <div class="sb-text">
                            <h6>Pago Seguro</h6>
                            <p>100% Seguridad en Pago y Cancelación.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</section>


<!-- Latest Blog Section End -->
<?php include 'templates/pie.php'; ?>