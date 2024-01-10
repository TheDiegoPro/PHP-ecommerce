<?php

include("modulos/panel.php");
include 'cabecera_admin.php';



session_start();
if (isset($_SESSION['usuario'])) {
  if ($_SESSION['usuario']['Tipo_usuario'] != "1") {
    header("location: index.php");
  }
} else {
  header('location: login.php');
}

?>

<style>

  .content{

    background-color: #FFC107;

  }

  .content-header{

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
          <a href="Vistapanel.php" class="nav-link active">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Inicio
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>

          <br>

        <li class="nav-item has-treeview menu-open">
          <a href="Vistaproductos.php" class="nav-link ">
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
          <a href="Vistaventas.php" class="nav-link ">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Usuarios Registrados
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>


          <br>



        <li class="nav-item has-treeview menu-open">
          <a href="Vistaventas.php" class="nav-link ">
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




<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Inicio</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">

        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->





  <!-- TARJETAS PRINCIPALES -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <br>
      <div class="row">
        
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              
              <h3><?php echo $totalVentas; ?></h3>

              <p><b>VENTAS CONCRETADAS</b></p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="Vistaventas.php" class="small-box-footer">Ver<i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3><?php
              $contador = 0 + $total_v;
              echo $contador; ?><sup style="font-size: 20px"></sup>$</h3>

              <p><b>INGRESO TOTAL</b></p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="Vistaventas.php" class="small-box-footer">Ver <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-dark">
            <div class="inner">
              <h3><?php echo $totalusuarios; ?></h3>

              <p>Usuarios Registrados</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="Vistausuarios.php" class="small-box-footer">Ver<i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3><?php echo $comentarios; ?></h3>

              <p>Comentarios</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="Vistacomentarios.php" class="small-box-footer">Ver <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>









      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title"></h5>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <div class="btn-group">

                  <div class="dropdown-menu dropdown-menu-right" role="menu">
                    <a href="#" class="dropdown-item">Action</a>
                    <a href="#" class="dropdown-item">Another action</a>
                    <a href="#" class="dropdown-item">Something else here</a>
                    <a class="dropdown-divider"></a>
                    <a href="#" class="dropdown-item">Separated link</a>
                  </div>
                </div>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">
                <div class="col-md-8">
                  <p class="text-center">
                    <strong>Ventas Enero - Julio</strong>
                  </p>

                  <div class="chart">
                    <div class="chartjs-size-monitor">
                      <div class="chartjs-size-monitor-expand">
                        <div class=""></div>
                      </div>
                      <div class="chartjs-size-monitor-shrink">
                        <div class=""></div>
                      </div>
                    </div>
                    <!-- Sales Chart Canvas -->
                    <canvas id="salesChart" height="180" style="height: 180px; display: block; width: 622px;" width="622" class="chartjs-render-monitor"></canvas>
                  </div>
                  <!-- /.chart-responsive -->
                </div>
                <!-- /.col -->
                <div class="col-md-4">
                  <!-- Info Boxes Style 2 -->
                  <div class="info-box mb-3 bg-warning">
                    <span class="info-box-icon"><i class="fas fa-tag"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Inventario</span>
                      <span class="info-box-number"><?php echo $totalproductos; ?></span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->

                  <!-- /.info-box -->

                  <!-- /.info-box -->
                  <div class="info-box mb-3 bg-info">
                    <span class="info-box-icon"><i class="far fa-comment"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Mensajes</span>
                      <span class="info-box-number"><?php echo $comentarios; ?></span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->

                  <!-- /.card -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
           
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>




      <!-- PAGE SCRIPTS -->
      <script src="dist/js/pages/dashboard2.js"></script>









      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->




<?php include("piePagina.php"); ?>


</body>