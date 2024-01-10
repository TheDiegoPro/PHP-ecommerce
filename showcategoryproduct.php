<?php

//include 'global/config.php';
include 'global/conexion.php';
include 'carrito.php';


/*$sentencia = $pdo->prepare("SELECT * FROM `tblproductos`");
$sentencia->execute();
$listaProductos = $sentencia->fetchALL(PDO::FETCH_ASSOC);
//print_r($listaProductos);*/


$category = $_GET["category"];
$sentencia = $pdo->prepare("SELECT * FROM tblproductos WHERE categoria='$category'");
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

$sql_articulos = "SELECT * FROM tblproductos WHERE categoria='$category' LIMIT :inicar,:narticulos";
$sentencia_articulos = $pdo->prepare($sql_articulos);
$sentencia_articulos->bindParam(':inicar', $iniciar, PDO::PARAM_INT);
$sentencia_articulos->bindParam(':narticulos', $articulos_x_pagina, PDO::PARAM_INT);
$sentencia_articulos->execute();

$resultado_articulos = $sentencia_articulos->fetchAll();



include 'templates/cabecera.php';


?>


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

<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>


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
            <div class="alert alert-warning col-4">
                <?php echo ($mensaje);


                ?>

                <a href="shopping-cart.php" class="badge badge-success">Ver Carrito</a>

            </div>
        </center>
    <?php } ?>


    <style>
        .card:hover {

            background-color: gray;
        }
    </style>

    <div class="row">


        <?php foreach ($resultado_articulos as $producto) { ?>


            <div class="col-sm-3 bg-light">
                <br>
                <br>
                <div class="card container-fluid">
                    <hr>
                    <img tittle="<?php echo $producto['nombre']; ?>" alt="<?php echo $producto['nombre']; ?>" class="card-img-top" src="<?php echo $producto['imagen']; ?>" data-toggle="popover" data-trigger="hover" data-content="<?php echo $producto['descripcion'];  ?>" height="317px">

                    <div class="card-body">
                        <span><b><?php echo $producto['nombre']; ?></b></span>
                        <h5 class="card-title">$<?php echo $producto['precio']; ?></h5>
                        <hr>

                        <?php

                        if ($producto['cantidad'] == 0) {

                        ?>
                            <center>
                                <h5>Disponible: <b>AGOTADO</b></h5>
                            </center>
                        <?php } else { ?>
                            <center>
                                <h5>Disponible: <?php echo $producto['cantidad']; ?></h5>
                            </center>

                        <?php } ?>

                        <!-- ESTO ES IMPORTANTE! AQUI SE ENVIA POR METODO POST LOS VALORES DE LA BASE DE DATOS ENCRIPTADOS CON OPENSSL_ENCRYPT MEDIANTE EL BOTON
            btn accion PARA PODER SER EVALUADO POR LAS CONDICIONES DE CARRITO.PHP DEL SWITCH Y LOS CASOS -->
                        <form action="" method="post">

                            <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($producto['ID'], COD, KEY); ?>">
                            <input type="hidden" name="imagen" id="imagen" value="<?php echo openssl_encrypt($producto['imagen'], COD, KEY); ?>">
                            <input type="hidden" name="nombre" id="nombre" value="<?php echo openssl_encrypt($producto['nombre'], COD, KEY); ?>">
                            <input type="hidden" name="precio" id="precio" value="<?php echo openssl_encrypt($producto['precio'], COD, KEY); ?>">
                            <input type="hidden" name="tb" id="tb" value="<?php echo openssl_encrypt($producto['cantidad'], COD, KEY); ?>">

                            <div class="container">

                                <input class="form-control col-md" type="number" name="cantidad" id="cantidad" placeholder="1" min="1" value="1">

                            </div>


                            <div class="container">
                                <br>
                                <?php

                                if ($producto['cantidad'] == 0) { ?>

                                    <button class="btn btn-success disabled" name="btnaccion" value="agregar" type="submit" disabled>
                                        Agregar al Carrito
                                    </button>
                                <?php } else { ?>

                                    <button class="btn btn-success" name="btnaccion" value="agregar" type="submit">
                                        Agregar al Carrito
                                    </button>
                                <?php } ?>
                            </div>

                        </form>
                    </div>
                </div>
                <br>
                <br>
            </div>


        <?php } ?>






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
    <?php

if($category == $category){

    $resultado = $category;
}

?>

    <!-- PROCESO PARA DARLE FUNCIONABILIDAD A LA PAGINACION UTILIZANDO EL METODO GET -->
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item <?php echo $_GET['pagina'] <= 1 ? 'disabled' : '' ?>">
                <a class="page-link" href="showcategoryproduct.php?category=<?php echo $resultado ?>&pagina=<?php echo $_GET['pagina'] - 1 ?>" tabindex="-1" aria-disabled="true">Anterior</a>
            </li>

            <?php for ($i = 0; $i < $paginas; $i++) : ?>

                <li class="page-item <?php echo $_GET['pagina'] == $i + 1 ? 'active' : '' ?>"><a class="page-link" href="showcategoryproduct.php?category=<?php echo $resultado ?>&pagina=<?php echo $i + 1 ?>"><?php echo $i + 1 ?></a></li>

            <?php endfor ?>


            <li class="page-item <?php echo $_GET['pagina'] >= $paginas ? 'disabled' : '' ?>">
                <a class="page-link" href="showcategoryproduct.php?category=<?php echo $resultado ?>&pagina=<?php echo $_GET['pagina'] + 1 ?>">Siguiente</a>
            </li>
        </ul>
    </nav>
    <br>

    <?php include 'templates/pie.php'; ?>

 
    </body>

    </html>