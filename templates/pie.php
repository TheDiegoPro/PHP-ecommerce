</div>
<!-- Footer Section Begin -->
<footer class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="footer-left">
                        <div class="footer-logo">
                            <a href="https://www.urbe.edu/"><img src="img/logo-urbe.jpg" alt=""></a>
                        </div>
                        <ul>
                            <li>Dirección: Prolongacion Circunvalacion no.2 av.16 guaijra.</li>
                            <li>Telefono: +58 261 200.8723</li>
                            
                        </ul>
                        <div class="footer-social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="https://www.instagram.com/infourbe/?hl=es-la"><i class="fa fa-instagram"></i></a>
                            <a href="https://twitter.com/infourbe?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor"><i class="fa fa-twitter"></i></a>
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-1">
                    <div class="footer-widget">
                        <h5>Información</h5>
                        <ul>
                            <li><a href="nosotros.php">Sobre Nosotros</a></li>
                            
                            <li><a href="./contacto.php">Contacto</a></li>
                           
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="footer-widget">
                        <h5>Tienda</h5>
                        <ul>
                            
                            <li><a href="shopping-cart.php">Shopping Cart</a></li>
                            <li><a href="shop.php">Tienda</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="newslatter-item">
                        <h5>Sugerencias?</h5>
                        <p>Envianos Ideas o aportes, Criticas o Comentarios que desees.</p>
                        
                  

                        <form action="" method="POST" class="subscribe-form">
                            <input type="text" name="mensaje" placeholder="Mensaje" required>
                            <button type="submit" name="Enviar">Enviar</button>
                        </form>
                    
                        <?php 
                        

if(isset($_POST['mensaje']) && !empty($_POST['mensaje'])){


    $sentencia=$pdo->prepare("INSERT INTO tblcomentarios 
    ( `mensaje`) 
VALUES ('$_POST[mensaje]');");
    $sentencia->execute();
    echo "<script>alert('Mensaje Enviado!')</script>";
}


?>
                    
                    
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-reserved">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright-text">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>
                                document.write(new Date().getFullYear());
                            </script> |Todos los Derechos Reservados| ESTA PAGINA WEB ES UTILIZADA PARA LA DEFENSA DE PROYECTO DE GRADO.
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </div>
                        <div class="payment-pic">
                            <img src="img/payment-method.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

     <!-- Js Plugins -->
     <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.zoom.min.js"></script>
    <script src="js/jquery.dd.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>