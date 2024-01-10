<?php


include 'global/conexion.php';
include 'carrito.php';
include 'templates/cabecera.php';

?>


<link rel="stylesheet" href="nosotros/css/open-iconic-bootstrap.min.css">
<link rel="stylesheet" href="nosotros/css/animate.css">

<link rel="stylesheet" href="nosotros/css/owl.carousel.min.css">
<link rel="stylesheet" href="nosotros/css/owl.theme.default.min.css">
<link rel="stylesheet" href="nosotros/css/magnific-popup.css">

<link rel="stylesheet" href="nosotros/css/aos.css">

<link rel="stylesheet" href="nosotros/css/ionicons.min.css">

<link rel="stylesheet" href="nosotros/css/bootstrap-datepicker.css">
<link rel="stylesheet" href="nosotros/css/jquery.timepicker.css">


<link rel="stylesheet" href="nosotros/css/flaticon.css">
<link rel="stylesheet" href="nosotros/css/icomoon.css">
<link rel="stylesheet" href="nosotros/css/estilos.css">


<style>
    .ftco-about:after {

        background-color: #FFC107;

    }

    body {

        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";

    }

    .overlay{

        background-color: #FFC107;

    }

    .ftco-section ftco-intro{

        background-repeat: no-repeat;
        background-size: auto;

    }

</style>

<!-- Page Preloder -->
<div id="preloder">
        <div class="loader"></div>
    </div>

<nav class="nav-menu mobile-menu">
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="shop.php">Tienda</a></li>
        <li><a href="shopping-cart.php">Carrito(<?php
                                                echo (empty($_SESSION['CARRITO'])) ? 0 : count($_SESSION['CARRITO']);
                                                ?>)</a>

        </li>

        <li><a href="./contacto.php">Contactanos</a></li>
        <li class="active"><a href="nosotros.php">Nosotros</a>
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
                    <a href="index.php"><i class="fa fa-home"></i> Home</a>
                    <a href="shop.php">Shop</a>
                    <span>Nosotros</span>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Breadcrumb Section Begin -->


<br>
<div class="container-fluid">

    <section class="ftco-section ftco-about bg-dark">
        <div class="container">
            <div class="row no-gutters">

                <div class="col-sm-6 p-sm-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url(img/luis_1.png);">
                </div>
                <div class="col-md-6 wrap-about ftco-animate fadeInUp ftco-animated">
                    <div class="heading-section heading-section-white pl-md-5">
                        <span class="subheading">Sobre Nosotros</span>
                        <h2 class="mb-4">Bienvenido a Company X!</h2>

                        <p><b>Somos un Equipo ampliamente conformado por profesionales en materia automovilistica, Con la capacidad de poder brindar diversos servicios de calidad destinado nuestra gran demanda de clientes en diferentes partes del mundo.</b></p>
                        <p><b>Nuestro Objetivo como empresa es brindar una gran variedad de productos importados o de fabricación nacional de la mejor calidad en el mercado a nuestros clientes, ademas de esto, contamos con una lista de servicios para el mantenimiento y un correcto funcionamiento de tu vehiculo. Con ayuda de nuestros proveedores y marcas asociadas,hacemos realidad lo que hoy somos como empresa.</b></p>

                    </div>
                </div>
            </div>
        </div>
    </section>



    
		<section class="ftco-section ftco-intro" style="background-image: url(img/car7.jpg);">
			<div class="overlay"></div>
			<div class="container">
				<div class="row justify-content-end">
					<div class="col-md-6 heading-section heading-section-white ftco-animate">
            <h2 class="mb-3">¿ Deseas Contactarnos ?</h2>
            <a href="contacto.php" class="btn btn-warning btn-lg">Contactanos</a>
          </div>
				</div>
			</div>
		</section>




</div>


<section class="ftco-section testimony-section bg-light">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center heading-section ftco-animate">
          	<span class="subheading">Aliados</span>
            <h2 class="mb-3">Proveedores y Socios</h2>
          </div>
        </div>
        <div class="row ftco-animate">
          <div class="col-md-12">
            <div class="carousel-testimony owl-carousel ftco-owl">
              <div class="item">
                <div class="testimony-wrap rounded text-center py-4 pb-5">
                  <div class="user-img mb-2" style="background-image: url(img/logo1.jpg)">
                  </div>
                  <div class="text pt-4">
                    
                  
                    <p class="name">PistoN Motorcraft</p>
                    <span class="position">Mécanica Deportiva</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap rounded text-center py-4 pb-5">
                  <div class="user-img mb-2" style="background-image: url(img/logo2.jpg)">
                  </div>
                  <div class="text pt-4">
                    
                    
                    <p class="name">Auto Service</p>
                    <span class="position">Servicio Profesional de Reparaciones</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap rounded text-center py-4 pb-5">
                  <div class="user-img mb-2" style="background-image: url(img/logo3.jpg)">
                  </div>
                  <div class="text pt-4">
                    
                    
                    <p class="name">Helper</p>
                    <span class="position">Servicio de Contact Center</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap rounded text-center py-4 pb-5">
                  <div class="user-img mb-2" style="background-image: url(img/logo4.jpg)">
                  </div>
                  <div class="text pt-4">
                    
                    
                    <p class="name">Digital Tech</p>
                    <span class="position">Electronica Automotriz</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap rounded text-center py-4 pb-5">
                  <div class="user-img mb-2" style="background-image: url(img/logo5.jpg)">
                  </div>
                  <div class="text pt-4">
                    
                    
                    <p class="name">Deal People Inc.</p>
                    <span class="position">Agente de Negocios</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

<br>





<script src="nosotros/js/jquery.min.js"></script>
<script src="nosotros/js/jquery-migrate-3.0.1.min.js"></script>
<script src="nosotros/js/popper.min.js"></script>
<script src="nosotros/js/bootstrap.min.js"></script>
<script src="nosotros/js/jquery.easing.1.3.js"></script>
<script src="nosotros/js/jquery.waypoints.min.js"></script>
<script src="nosotros/js/jquery.stellar.min.js"></script>
<script src="nosotros/js/owl.carousel.min.js"></script>
<script src="nosotros/js/jquery.magnific-popup.min.js"></script>
<script src="nosotros/js/aos.js"></script>
<script src="nosotros/js/jquery.animateNumber.min.js"></script>
<script src="nosotros/js/bootstrap-datepicker.js"></script>
<script src="nosotros/js/jquery.timepicker.min.js"></script>
<script src="nosotros/js/scrollax.min.js"></script>


<script src="nosotros/js/main.js"></script>



<!-- Latest Blog Section End -->
<?php include 'templates/pie.php'; ?>