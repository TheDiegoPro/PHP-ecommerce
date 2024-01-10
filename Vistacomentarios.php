<?php
include 'modulos/panel.php';
include 'cabecera_admin.php';
$txtID = (isset($_POST['txtID'])) ? $_POST['txtID'] : "";
$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";
$accionAgregar = "";
$accionModificar = $accionEliminar = $accionCancelar = "disabled";
switch ($accion) {
case "btnEliminar":

  $sentencia = $pdo->prepare("DELETE FROM tblcomentarios WHERE id_comentario=:id");
  $sentencia->bindParam(':id', $txtID);
  $sentencia->execute();

  header("location: vistacomentarios.php");

  echo $txtID;
  echo "precionaste btn agregar3";
  break;}

session_start();
?>
<style>



.card-header{

  background-color: #FFC107;

}

.content-header{

  background-color: #FFC107;

}

.row{

  background-color: #FFC107;
  
}

</style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"></h1>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->




<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="Vistapanel.php" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
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
          <a href="#" class="d-block"><?php echo $_SESSION['usuario']['nombre'];?></a>
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
          <a href="Vistaproductos.php" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Productos
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>

          <br>


        <li class="nav-item has-treeview menu-open">
          <a href="Vistaventas.php" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Ventas
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>

          <br>

        <li class="nav-item has-treeview menu-open">
          <a href="Vistausuarios.php" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Usuarios Registrados
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>


          <br>



        <li class="nav-item has-treeview menu-open">
          <a href="Vistacomentarios.php" class="nav-link active">
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






    <!-- TARJETAS PRINCIPALES -->
    <section class="content">
     
      









        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Comentarios</h3>

                <div class="card-tools">
                <form action="vistacomentarios_busqueda.php" method="$_GET">
              <div class="input-group input-group-sm" style="width: 150px;">
                <input type="text" name="table_search" id="busqueda" class="form-control float-right" placeholder="Buscar">

                <div class="input-group-append">

                  <button type="submit" value="Buscar" class="btn btn-default"><i class="fas fa-search"></i></button>
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
                      <th><center>Correo</center></th>
                      
                      <th>Comentario</th>
                      
                      
                    </tr>
                  </thead>
                  <tbody>

                  <?php foreach($listaComentarios as $comentarios) { ?>
                    <tr>
                      <td><?php echo $comentarios['id_comentario'];?></td>
                      <td><?php echo $comentarios['nombre'];?></td>
                      <td><center><?php echo $comentarios['correo'];?></center></td>
                      <td><?php echo $comentarios['mensaje'];?></td>
                      <td>

                      <form action="" method="post">
                        <input type="hidden" name="txtID" value="<?php echo $comentarios['id_comentario']; ?>">
                  
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


  
  
  <?php include("piePagina.php"); ?>
