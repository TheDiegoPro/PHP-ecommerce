

            <?php foreach ($resultado_articulos as $producto) { ?>

                <div class="col-3">
                    <div class="card">

                        <img tittle="<?php echo $producto['nombre']; ?>" alt="<?php echo $producto['nombre']; ?>" class="card-img-top" src="<?php echo $producto['imagen']; ?>" data-toggle="popover" data-trigger="hover" data-content="<?php echo $producto['descripcion'];  ?>" height="317px"> 

                        <div class="card-body">
                            <span><?php echo $producto['nombre']; ?></span>
                            <h5 class="card-title">$<?php echo $producto['precio']; ?></h5>
                            <p class="card-text">Descripcion</p>

                            <form action="" method="post">

                                <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($producto['ID'],COD,KEY); ?>">
                                <input type="hidden" name="nombre" id="nombre" value="<?php echo openssl_encrypt($producto['nombre'],COD,KEY); ?>">
                                <input type="hidden" name="precio" id="precio" value="<?php echo openssl_encrypt($producto['precio'],COD,KEY); ?>">
                                <input type="hidden" name="cantidad" id="cantidad" value="<?php echo openssl_encrypt(1,COD,KEY); ?>">
                                <button class="btn btn-primary" name="btnaccion" value="agregar" type="submit">
                                    Agregar al Carrito
                                </button>


                            </form>
                        </div>
                    </div>
                    <br>
                    <br>
                </div>
                

            <?php } ?>


        </div>