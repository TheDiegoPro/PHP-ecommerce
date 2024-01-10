<?php

//include 'global/config.php';
include 'global/conexion.php';
include 'carrito.php';


//TODA ESTO QUE ESTA HASTA LA INCLUSION DE LA CABECERA CORRESPONDE A LA PORCION DE CODIGO QUE DA FUNCIONABILIDAD A LA PAGINACION  QUE ESTA AL FINAL DE LA PAGINA
//Y LAS CONSULTAS SQL QUE NECESITA PARA QUE FUNCIONE,TAMBIEN ESTAN LAS VALIDACIONES EN LOS IF DE LA PAGINACION PARA NO CAMBIAR LA RUTA URL Y ENTRAR A LA PAGINA 0
//O OTRA PAGINA QUE NO ESTE DENTRO DE LA PAGINACION,TAMBIEN ESTA EL ARTICULO POR PAGINA QUE ES EL NUMERO DE ARTICULOS QUE SE VA A MOSTRAR POR PAGINA.


$sentencia = $pdo->prepare("SELECT * FROM `tblproductos`");
$sentencia->execute();
$listaProductos = $sentencia->fetchALL(PDO::FETCH_ASSOC);
//print_r($listaProductos);

$total_articulos_db = $sentencia->rowCount();
//echo $total_articulos_db;
$paginas = $total_articulos_db / 16;
$paginas = ceil($paginas);
//echo $paginas;
$articulos_x_pagina = 16;

if (!$_GET) {
    header('Location:shop.php?pagina=1');
}

if ($_GET['pagina'] > $paginas || $_GET['pagina'] <= 0) {
    header('Location:shop.php?pagina=1');
}




$iniciar = ($_GET['pagina'] - 1) * $articulos_x_pagina;
//echo $iniciar;

$sql_articulos = 'SELECT * FROM tblproductos ORDER BY rand() LIMIT :inicar,:narticulos';
$sentencia_articulos = $pdo->prepare($sql_articulos);
$sentencia_articulos->bindParam(':inicar', $iniciar, PDO::PARAM_INT);
$sentencia_articulos->bindParam(':narticulos', $articulos_x_pagina, PDO::PARAM_INT);
$sentencia_articulos->execute();

$resultado_articulos = $sentencia_articulos->fetchAll();



include 'templates/cabecera.php';




?>


<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

<nav class="nav-menu mobile-menu">
    <ul>
        <li><a href="index.php">Home</a></li>
        <li class="active"><a href="shop.php">Tienda</a></li>
        <li><a href="shopping-cart.php">Carrito(<?php
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




<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="index.php"><i class="fa fa-home"></i> Home</a>
                    <span>Tienda</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section Begin -->

<!-- Product Shop Section Begin -->





<br>
<br>


<div class="container-fluid">
    <?php if ($mensaje != "") { ?>
        <center>
            <div class="alert alert-danger col-4">
                <?php echo ($mensaje); ?>

            <?php } ?>

            </div>
        </center>

        <style>
            .card {

                background-color: #252525;
                color: white;

            }


            .card:hover {

                background-color: gray;

            }
        </style>

        <div class="card-deck">
            <div class="card">
                <img class="card-img-top" src="img/section3.jpg" alt="Card image cap" height="600px">
                <div class="card-body">
                    <h5 class="card-title">Motores</h5>
                    <p class="card-text">¿ Problemas con tu motor ? en la sección de Motores tenemos los mejores repuestos y de la mejor calidad.</p>
                    <br>
                    <br>
                    <a href="showcategoryproduct.php?category=motores&pagina=1" <button class="btn btn-outline-warning" type="button">Sección de Motores</button> </a>
                </div>
            </div>



            <div class="card">
                <img class="card-img-top" src="img/section2.jpg" alt="Card image cap" height="600px">
                <div class="card-body">
                    <h5 class="card-title">Enfriamiento</h5>
                    <p class="card-text">Manten tu motor Refrigerado con nuestros productos y sistemas de Refrigeración.</p>
                    <br>
                    <br>
                    <a href="showcategoryproduct.php?category=enfriamiento&pagina=1"> <button class="btn btn-outline-warning" type="button">Sección de Refrigeración</button></a>
                </div>
            </div>


            <div class="card">
                <img class="card-img-top" src="img/section4.jpg" alt="Card image cap" height="600px">
                <div class="card-body">
                    <h5 class="card-title">Frenos</h5>
                    <p class="card-text">Sistema de Frenos,Liquidos,Pastillas y kit completo de la mejor calidad!.</p>
                    <br>
                    <br>
                    <a href="showcategoryproduct.php?category=frenos&pagina=1"> <button class="btn btn-outline-warning" type="button">Sección de Frenos</button></a>
                </div>
            </div>

        </div>

        <br>

        <div class="card-deck">
            <div class="card">
                <img class="card-img-top" src="img/section6.jpg" alt="Card image cap" height="600px">
                <div class="card-body">
                    <h5 class="card-title">Cauchos</h5>
                    <p class="card-text">Encuentra gran variedad de Cauchos para cualquier tipo de vehiculo y de diferentes tamaños y funciones en la sección de Cauhcos.</p>
                    <br>
                    <br>
                    <a href="showcategoryproduct.php?category=cauchos&pagina=1" <button class="btn btn-outline-warning" type="button">Sección de cauchos</button> </a>
                </div>
            </div>



            <div class="card">
                <img class="card-img-top" src="img/section7.jpg" alt="Card image cap" height="600px">
                <div class="card-body">
                    <h5 class="card-title">Rines</h5>
                    <p class="card-text">Descubre los Diseños profesionales y de tecnologia de punta de nuestras marcas aliadas expertas en Rines</p>
                    <br>
                    <br>
                    <a href="showcategoryproduct.php?category=rines&pagina=1"> <button class="btn btn-outline-warning" type="button">Sección de Rines</button></a>
                </div>
            </div>


            <div class="card">
                <img class="card-img-top" src="img/section8.jpg" alt="Card image cap" height="600px">
                <div class="card-body">
                    <h5 class="card-title">Transmisiones</h5>
                    <p class="card-text">Caja de Cambios,Transmisiones,aceite para hidromáticos,Discos de Embrague, y mas en la seccion de Transmisiones</p>
                    <br>
                    <br>
                    <a href="showcategoryproduct.php?category=transmision&pagina=1"> <button class="btn btn-outline-warning" type="button">Sección de Transmisiones.</button></a>
                </div>
            </div>

        </div>

        <br>

        <div class="card-deck">
            <div class="card">
                <img class="card-img-top" src="img/section9.jpg" alt="Card image cap" height="600px">
                <div class="card-body">
                    <h5 class="card-title">Interiores</h5>
                    <p class="card-text">Personaliza el interior de tu vehiculo a tu gusto con nuestra extensa lista de articulos de calidad,y diferentes marcas y materiales.</p>
                    <br>
                    <br>
                    <a href="showcategoryproduct.php?category=interiores&pagina=1" <button class="btn btn-outline-warning" type="button">Sección de Interiores</button> </a>
                </div>
            </div>



            <div class="card">
                <img class="card-img-top" src="img/car2.jpg" alt="Card image cap" height="600px">
                <div class="card-body">
                    <h5 class="card-title">Accesorios</h5>
                    <p class="card-text">Accesorios en general para diferentes tipos de vehiculos y marcas.</p>
                    <br>
                    <br>
                    <a href="showcategoryproduct.php?category=otros&pagina=1"> <button class="btn btn-outline-warning" type="button">Sección de Accesorios</button></a>
                </div>
            </div>


            <div class="card">
                <img class="card-img-top" src="img/section11.jpg" alt="Card image cap" height="600px">
                <div class="card-body">
                    <h5 class="card-title">Servicios</h5>
                    <p class="card-text">Contamos con diferentes servicios que le ofrecemos a nuestros clientes para asegurar la salud y la duración infraestructural de tu vehiculo.</p>
                    <br>
                    <br>
                    <a href="showcategoryproduct.php?category=servicios&pagina=1"> <button class="btn btn-outline-warning" type="button">Sección de Servicios</button></a>
                </div>
            </div>

        </div>

        <br>


        <!-- 

        <div class="row">


            <!- RECORRIDO DE LA BASE DE DATOS PARA MOSTRAR LOS PRODUCTOS-
            <?php foreach ($resultado_articulos as $producto) { ?>

                <div class="col-3 bg-dark">
                    <br>
                    <br>
                    <div class="card container-fluid">
                        <hr>
                        <img tittle="<?php echo $producto['nombre']; ?>" alt="<?php echo $producto['nombre']; ?>" class="card-img-top" src="<?php echo $producto['imagen']; ?>" data-toggle="popover" data-trigger="hover" data-content="<?php echo $producto['descripcion'];  ?>" height="317px">

                        <div class="card-body">
                            <span><?php echo $producto['nombre']; ?></span>
                            <h5 class="card-title">$<?php echo $producto['precio']; ?></h5>
                            <hr>
                            <center>
                                <h5>Disponible: <?php echo $producto['cantidad']; ?></h5>
                            </center>



                            ESTO ES IMPORTANTE! AQUI SE ENVIA POR METODO POST LOS VALORES DE LA BASE DE DATOS ENCRIPTADOS CON OPENSSL_ENCRYPT MEDIANTE EL BOTON
                        btn accion PARA PODER SER EVALUADO POR LAS CONDICIONES DE CARRITO.PHP DEL SWITCH Y LOS CASOS 
                            <form action="" method="post">

                                <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($producto['ID'], COD, KEY); ?>">
                                <input type="hidden" name="imagen" id="imagen" value="<?php echo openssl_encrypt($producto['imagen'], COD, KEY); ?>">
                                <input type="hidden" name="nombre" id="nombre" value="<?php echo openssl_encrypt($producto['nombre'], COD, KEY); ?>">
                                <input type="hidden" name="precio" id="precio" value="<?php echo openssl_encrypt($producto['precio'], COD, KEY); ?>">
                                <input type="hidden" name="tb" id="tb" value="<?php echo openssl_encrypt($producto['cantidad'], COD, KEY); ?>">
                                <div class="container">

                                    <input class="form-control col-md" type="number" name="cantidad" id="cantidad" placeholder="1" min="1" max="5" maxlength="5" value="1">

                                </div>

                                <div class="container">
                                    <br>
                                    <button class="btn btn-success" name="btnaccion" value="agregar" type="submit">
                                        Agregar al Carrito
                                    </button>
                                </div>

                            </form>
                        </div>
                    </div>
                    <br>
                    <br>
                </div>


            <?php } ?>


            <nav aria-label="Page navigation example">

        </div>

        -->


        <!-- JAVA SCRIPT PARA PONER EL MOUSE EN LOS PRODUCTOS Y QUE APAREZCA LA RESPECTIVA DESCRIPCION -->
        <script>
            $(function() {
                $('[data-toggle="popover"]').popover()
            });
        </script>

</div>

<br>
<br>

</section>
<!-- Product Shop Section End -->


<!-- PROCESO PARA DARLE FUNCIONABILIDAD A LA PAGINACION UTILIZANDO EL METODO GET 

    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item <?php echo $_GET['pagina'] <= 1 ? 'disabled' : '' ?>">
                <a class="page-link" href="shop.php?pagina=<?php echo $_GET['pagina'] - 1 ?>" tabindex="-1" aria-disabled="true">Anterior</a>
            </li>

            <?php for ($i = 0; $i < $paginas; $i++) : ?>

                <li class="page-item <?php echo $_GET['pagina'] == $i + 1 ? 'active' : '' ?>"><a class="page-link" href="shop.php?pagina=<?php echo $i + 1 ?>"><?php echo $i + 1 ?></a></li>

            <?php endfor ?>


            <li class="page-item <?php echo $_GET['pagina'] >= $paginas ? 'disabled' : '' ?>">
                <a class="page-link" href="shop.php?pagina=<?php echo $_GET['pagina'] + 1 ?>">Siguiente</a>
            </li>
        </ul>
    </nav>
    <br>

-->
<?php include 'templates/pie.php'; ?>

