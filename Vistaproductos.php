<?php

include 'modulos/panel.php';


$txtID = (isset($_POST['txtID'])) ? $_POST['txtID'] : "";

$txtProducto = (isset($_POST['txtProducto'])) ? $_POST['txtProducto'] : "";
$txtPrecio = (isset($_POST['txtPrecio'])) ? $_POST['txtPrecio'] : "";
$txtCategoria = (isset($_POST['txtCategoria'])) ? $_POST['txtCategoria'] : "";
$txtCantidad = (isset($_POST['txtCantidad'])) ? $_POST['txtCantidad'] : "";
$txtDescripcion = (isset($_POST['txtDescripcion'])) ? $_POST['txtDescripcion'] : "";
$foto = (isset($_FILES['foto']['name'])) ? $_FILES['foto']['name'] : "";
$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";
$error=array();

$accionAgregar = "";
$accionModificar = $accionEliminar = $accionCancelar = "disabled";
$mostrarModal = false;

switch ($accion) {

  case "btnAgregar":

    if($txtProducto==""){
      $error['Nombre']="Escribe el nombre";
    }
    if(count($error)>0){
      $mostrarModal=true;
    break;
    }



    $sentencia = $pdo->prepare("INSERT INTO tblproductos (`nombre`, `precio`, `categoria`, `cantidad`, `descripcion`, `imagen`) 
      VALUES (:nombre,  :precio,  :categoria, :cantidad,  :descripcion, 'img/cart_img/' :foto)");

    $sentencia->bindParam(':nombre', $txtProducto);
    $sentencia->bindParam(':precio', $txtPrecio);
    $sentencia->bindParam(':categoria', $txtCategoria);
    $sentencia->bindParam(':cantidad', $txtCantidad);
    $sentencia->bindParam(':descripcion', $txtDescripcion);

    $Fecha = new DateTime();
    $nombreArchivo = ($foto != "") ? $Fecha->getTimestamp() . "_" . $_FILES["foto"]["name"] : "imagen.jpg";

    $tmpFoto = $_FILES["foto"]["tmp_name"];

    if ($tmpFoto != "") {
      move_uploaded_file($tmpFoto, "img/cart_img/" . $nombreArchivo);
    }

    $sentencia->bindParam(':foto', $nombreArchivo);
    $sentencia->execute();

    header("location: Vistaproductos.php");
    break;


  case "btnEliminar":

    $sentencia = $pdo->prepare("SELECT imagen FROM tblproductos WHERE id=:id");
    $sentencia->bindParam(':id', $txtID);
    $sentencia->execute();
    $producto = $sentencia->fetch(PDO::FETCH_LAZY);


    if (isset($producto["imagen"]) && ($item['imagen'] != "imagen.jpg")) {
      if (file_exists($producto["imagen"])) {
        unlink($producto["imagen"]);
      }
    }


    $sentencia = $pdo->prepare("DELETE FROM tblproductos WHERE id=:id");
    $sentencia->bindParam(':id', $txtID);
    $sentencia->execute();

    header("location: Vistaproductos.php");

    echo $txtID;
    echo "precionaste btn agregar3";
    break;

  case "btnCancelar":

    header("location: Vistaproductos.php");
    break;

   
}



include 'cabecera_admin.php';



session_start();

?>
<style>
  .card-header {

    background-color: #FFC107;

  }

  .content-header {

    background-color: #FFC107;

  }

  .row {

    background-color: #FFC107;

  }
</style>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="Vistapanel.php" class="brand-link">
    <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Panel Administrativo</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
      <img src="img/avatar.svg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block"><?php echo $_SESSION['usuario']['nombre']; ?></a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item  menu-open">
          <a href="Vistapanel.php" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Inicio
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>

          <br>

        <li class="nav-item has-treeview menu-open">
          <a href="Vistaproductos.php" class="nav-link active">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Productos
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>

          <br>


        <li class="nav-item has-treeview menu-open">
          <a href="Vistaventas.php" class="nav-link ">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Ventas
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>

          <br>

        <li class="nav-item has-treeview menu-open">
          <a href="Vistausuarios.php" class="nav-link ">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Usuarios Registrados
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>


          <br>



        <li class="nav-item has-treeview menu-open">
          <a href="Vistacomentarios.php" class="nav-link ">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Comentarios
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>




        </li>

      </ul>



    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>



<!--
  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Tabla de Productos</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">

        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->





  <div class="container-fluid">

    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title"></h3>

            <form action="" method="post" enctype="multipart/form-data">

              <!-- Modal -->
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Agregar Producto</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="form-row">

                        <input type="hidden" name="txtID" class="form-control" id="<?php echo $txtID; ?>" required>

                        <div class="form-group col-md-4">
                          <label for="">Producto</label>
                          <input type="text" class="form-control <?php echo (isset($error['Nombre']))?"is-invalid":""; ?>" id="<?php echo $txtProducto; ?>" name="txtProducto" required>
                          <div class="invalid-feedback">

                        <?php echo (isset($error['Nombre']))?$error['Nombre']:";" ?>
                          </div>
                        </div>

                        <div class="form-group col-md-4">
                          <label for="">Precio</label>
                          <input type="number" class="form-control" id="<?php echo $txtPrecio; ?>" name="txtPrecio" min="1" required>
                        </div>

                        <div class="form-group col-md-4">
                          <label for="">Categoria</label>
                          <input type="text" class="form-control" id="<?php echo $txtCantidad; ?>" name="txtCategoria" required>
                        </div>

                        <div class="form-group col-md-4">
                          <label for="">Cantidad</label>
                          <input type="number" class="form-control" id="<?php echo $txtCantidad; ?>" name="txtCantidad" min="1" required>
                        </div>

                        <div class="form-group col-md-12">
                          <label for="">Descripción</label>
                          <input type="text" class="form-control" id="<?php echo $txtDescripcion; ?>" name="txtDescripcion" required>
                        </div>

                        <div class="form-group col-md-12">
                          <label for="">Foto:</label>
                          <?php
                          
                              if($foto!=""){?>

                         <br>
                         <img class="img-thumbnail rounded mx-auto d-block" width="100px" src="<?php echo $foto;?>" alt="">
                         <br>
                         <br>

                              <?php } ?>

                      
                          <input type="file" accept="image/*" class="form-control" id="<?php echo $foto; ?>" name="foto">
                        </div>


                      </div>
                    </div>
                    <div class="modal-footer">
                      <button class="btn btn-outline-success" <?php echo $accionAgregar; ?> value="btnAgregar" type="submit" name="accion">Agregar</button>
        
                    </div>
                  </div>
                </div>
              </div>
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Agregar Producto
              </button>

            </form>



            <div class="card-tools">
                <form action="vistaproductos_busqueda.php" method="$_GET">
              <div class="input-group input-group-sm" style="width: 150px;">
                <input type="text" name="table_search" id="busqueda" class="form-control float-right" placeholder="Buscar">

                <div class="input-group-append">

                  <button type="submit" value="Buscar" class="btn btn-default"><i class="fas fa-search"></i></button>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
              <thead>
                <tr>
                  <th>NO.</th>
                  <th>Nombre</th>
                  <th>
                    <center>Precio</center>
                  </th>

                  <th>Imagen</th>
                  <th>Categoria</th>
                  <th>
                    <center>Cantidad Disponible</center>
                  </th>

                  <th>
                    <center>Acción</center>
                  </th>
                </tr>
              </thead>
              <tbody>

                <?php foreach ($listaProductos as $producto) { ?>
                  <tr>
                    <td><?php echo $producto['ID']; ?></td>
                    <td><?php echo $producto['nombre']; ?></td>
                    <td>
                      <center><?php echo $producto['precio']; ?>$</center>
                    </td>
                    <td><img src="<?php echo $producto['imagen']; ?>" height="100px" width="100px" alt=""></td>
                    <td><?php echo $producto['categoria']; ?></td>
                    <td>
                      <center><?php echo $producto['cantidad']; ?></center>
                    </td>
                    <td>
                    <form class="form-inline" action="modificar.php" method="get">
                       
                    <input type="hidden" name="modificar" value="<?php echo $producto['ID']; ?>">
                        <input class="btn_search btn btn-outline-warning my-2 my-sm-0" value="modificar" type="submit"></button>
                    </form>


                      <form action="" method="post">
                        <input type="hidden" name="txtID" value="<?php echo $producto['ID']; ?>">
                        

                        <button class="btn btn-outline-danger" value="btnEliminar" type="submit" name="accion">Eliminar</button>
                      </form>
                    </td>
                  </tr>

                <?php } ?>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>


    <!-- /.row (main row) -->
  </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
</div>

<?php

if ($mostrarModal) {
?>

  <script>
    $('#exampleModal').modal('show');
  </script>

<?php } ?>


<?php include("piePagina.php"); ?>