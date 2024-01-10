<?php
include 'modulos/panel.php';
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
            <a href="Vistausuarios.php" class="nav-link active">
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
            <h3 class="card-title">Usuarios Registrados</h3>
            <br>
            <br>
            <div class="containe">
              <p><b>Privilegios:</b></p>
              <ul>
                <l1><b>Administrador</b> = 1  - </l1>

                <l1><b>Usuario</b> = 2  - </l1>

                <l1><b>Administrador+</b> = 3  </l1>
              </ul>

            </div>
            <div class="card-tools">
              <form action="vistausuarios_busqueda.php" method="$_GET">
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
                <center>Correo</center>
              </th>

              <th>Usuario</th>
              <th>Contraseña</th>
              <th>Privilegio</th>
              <th>Fecha de Registro</th>
              <th>Privilegio</th>


            </tr>
          </thead>
          <tbody>

            <?php foreach ($listaUsuarios as $producto) { ?>
              <tr>
                <form action="privilegio.php" method="post">
                  <input type="hidden" name="id" value="<?php echo $producto['id']; ?>">
                  <td><?php echo $producto['id']; ?></td>
                  <td><?php echo $producto['nombre']; ?></td>
                  <td>
                    <center><?php echo $producto['correo']; ?></center>
                  </td>
                  <td><?php echo $producto['usuario']; ?></td>
                  <td><?php echo $producto['password']; ?></td>
                  <td><?php echo $producto['Tipo_usuario']; ?></td>
                  <td><?php echo $producto['fecha_Registro']; ?></td>

                  <?php if ($producto['Tipo_usuario'] == '3') { ?>
                    <td>
                      <center>-</center>
                    </td>
                  <?php } else { ?>
                    <td><button type="submit" class="btn btn-md btn-outline-info">Cambiar</button></td>
                  <?php } ?>
                </form>
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