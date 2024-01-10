<?php


/*VALIDACION DEL HEADER DE LA PAGINA PARA IMPEDIR QUE SE ESCRIBA PAGAR.PHP DESDE EL BUSCADOR */
if (isset($_POST['btnaccion'])) {
} else {

    header('Location:shop.php?pagina=1');
}

/*----*/

//include 'global/config.php';
include 'global/conexion.php';
include 'carrito.php';
include 'templates/cabecera.php';


?>

<!-- Page Preloder -->
<div id="preloder">
        <div class="loader"></div>
    </div>
    
<nav class="nav-menu mobile-menu">
<ul>
        <li class=""><a href="index.php">Home</a></li>
        <li><a href="shop.php">Tienda</a></li>

        <!-- PROCESO PARA CONTAR LOS PRODUCTOS DEL CARRITO-->
        <li class="active"><a href="shopping-cart.php">Carrito(<?php
                                                echo (empty($_SESSION['CARRITO'])) ? 0 : count($_SESSION['CARRITO']);
                                                ?>)</a>

        </li>

        <li><a href="contacto.php">Contactanos</a></li>
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

    <?php



    if ($_POST) {

        $producto1="";
        $total = 0;
        $SID = session_id();
        //$Correo=$_POST['email'];
        
        foreach ($_SESSION['CARRITO'] as $indice => $producto) {

            $producto1 .= $producto['nombre']." , Nro: ";
            $producto1 .=$producto['cantidad']." . ";
           


            $total = $total + ($producto['precio'] * $producto['cantidad']);
        }

        $sentencia = $pdo->prepare("INSERT INTO `tblventas` 
                (`ID`,`nombre`,`producto`, `ClaveTransaccion`, `Fecha`, `Total`, `status`) 
        VALUES (NULL,:nombre, :producto,:ClaveTransaccion, NOW(), :Total, 'PENDIENTE');");
       
       
      
       $sentencia->bindParam(":nombre", $_SESSION['usuario']['nombre']);
        $sentencia->bindParam(":producto", $producto1);
        $sentencia->bindParam(":ClaveTransaccion", $SID);
        //$sentencia->bindParam(":Correo",$Correo);
        $sentencia->bindParam(":Total", $total);
        // $sentencia->execute();
        $sentencia->execute();
        $idVenta = $pdo->lastInsertId();



        foreach ($_SESSION['CARRITO'] as $indice => $producto) {


            $sentencia = $pdo->prepare("INSERT INTO 
        `tbldetalleventa` (`ID`, `IDVENTA`, `IDPRODUCTO`, `PRECIOUNITARIO`, `CANTIDAD`) 
        VALUES (NULL, :IDVENTA, :IDPRODUCTO, :PRECIOUNITARIO, :CANTIDAD);");

            $sentencia->bindParam(":IDVENTA", $idVenta);
            $sentencia->bindParam(":IDPRODUCTO", $producto['ID']);
            $sentencia->bindParam(":PRECIOUNITARIO", $producto['precio']);
            $sentencia->bindParam(":CANTIDAD", $producto['cantidad']);
            $sentencia->execute();

           // $totalbd= $producto['tb'];
           // $descontar= $producto['cantidad'];
           // $sentencia = $pdo->prepare("UPDATE tblproductos SET cantidad = ".$totalbd." - ".$descontar." WHERE id=".$producto['ID']." ");
          //$sentencia->execute();


        }
  
    }


    ?>
    <!-- Include the PayPal JavaScript SDK -->
    <script src="https://www.paypal.com/sdk/js?client-id=sb&currency=USD"></script>

    <style>
        /* Media query for mobile viewport */
        @media screen and (max-width: 400px) {
            #paypal-button-container {
                width: 100%;

            }
        }

        /* Media query for desktop viewport */
        @media screen and (min-width: 400px) {
            #paypal-button-container {
                width: 250px;
            }
        }
    </style>
    <br>

    <div class="container">
        <div class="jumbotron text-center bg-info">
            <h1 class="display-4">¡Paso Final!</h1>
            <hr class="my-4">
            <p class="lead"> Estas a punto de pagar con paypal la cantidad de:
                <h4>$<?php echo number_format($total, 2); ?></h4>
                <!-- Set up a container element for the button -->

                <center>
                    <div id="paypal-button-container"></div>
                </center>


            </p>
            <p></br>
                <strong>(para Aclaraciones: repuestos.accesorioscompany@gmail.com)</strong>
            </p>
        </div>
    </div>

    <script>
        
        // Render the PayPal button into #paypal-button-container
        paypal.Buttons({

            // Set up the transaction
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '<?php echo $total; ?>',
                            description: "Compra de Productos: $<?php number_format($total, 2); ?>",
                            reference_id: "<?php echo $SID; ?>#<?php echo openssl_encrypt($idVenta, COD, KEY); ?>"

                        }
                    }]
                });
            },

            // Finalize the transaction
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    // Show a success message to the buyer
                    //alert('Transaction completed by ' + details.payer.name.given_name + '!');
                    console.log(data);
                    window.location = "verificador.php?ult_p=<?php echo $idVenta;?>" //+ data.paymentToken
                });
            }


        }).render('#paypal-button-container');
    </script>

    <?php
  
        
    
    include 'templates/pie.php'; ?>