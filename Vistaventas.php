<?php
include 'modulos/panel.php';
include 'cabecera_admin.php';

session_start();
?>

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
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="vistaPanel.php" class="brand-link">
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
          <a href="Vistaventas.php" class="nav-link active">
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






    <!-- TARJETAS PRINCIPALES -->
    <section class="content">
     
      









        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Ventas</h3>

                <div class="card-tools">
                <form action="vistaventas_busqueda.php" method="$_GET">
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
                      <th>Clave Transaccion</th>
                      <th><center>Fecha</center></th>
                      <th>Total</th>
                      <th>Status</th>
                      <th>Productos</th>


                      
                    </tr>
                  </thead>
                  <tbody>

                  <?php foreach($listaVentas as $producto) { ?>
                    <tr>
                      <td><?php echo $producto['ID'];?></td>
                      <td><?php echo $producto['nombre'];?></td>
                      <td><?php echo $producto['ClaveTransaccion'];?></td>
                      <td><center><?php echo $producto['Fecha'];?></center></td>
                      <td><?php echo $producto['Total'];?></td>
                      <td><?php echo $producto['status'];?></td>
                      <td><button type="button" class="btn btn-md btn-outline-info" data-toggle="popover" title="Detalle de Productos" data-content="<?php echo $producto['producto'];?>">Detalle</button></td>
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

        <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="toast-header">
    <img src="..." class="rounded mr-2" alt="...">
    <strong class="mr-auto">Bootstrap</strong>
    <small class="text-muted">11 mins ago</small>
    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="toast-body">
    Hello, world! This is a toast message.
  </div>
</div>

<script>$('#element').toast('show')</script>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <script>$(function () {
  $('[data-toggle="popover"]').popover()
})</script>
  
  <?php include("piePagina.php"); ?>
