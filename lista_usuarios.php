<?php
session_start();
if(!isset($_SESSION['id']) || $_SESSION['id_rol']!=1){
  header("Location: login_usuario.php");
  exit();
} 

?>

<!DOCTYPE html>
<html lang="en">
  <!-- Head-->
  <?php require_once "componentes/head.inc.php"?>

  <body class="app sidebar-mini">
    <!-- Navbar-->
    <?php require_once 'componentes/header.inc.php'; ?>
    <!-- Sidebar menu-->
    <?php require_once "componentes/sidebar_menu.inc.php"?>
    <!-- fin Sidebar menu-->
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Listados</h1>
          <!-- si es administrador vera este titulo-->
          <p>Listado total de usuarios</p>
          
          <!-- si es usuario normal vera este titulo-
          <p>Listado de mis solicitudes cargadas</p> -->

          <!-- si es analista o tecnico vera este titulo
          <p>Listado de solicitudes cargadas</p> -->


        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Listado</li>
          <li class="breadcrumb-item active"><a href="#">Listado de Usuarios</a></li>
        </ul>
      </div>
      <div class="row">
        
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Usuarios (Nro Total)</h3>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Foto</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <th>Clave</th>
                    <th>Último Acceso</th>
                    <th>¿Está Activo?</th>
                    <th>Opciones</th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="table-danger">
                    <td>1</td>
                    <td><img class="app-sidebar__user-avatar" src="images/team/sue.png" alt="Sue Palacios"></td>
                    <td>sue</td>
                    <td>palacios</td>
                    <td>email@fdsfds</td>
                    <td>fdsfdsfsdf</td>
                    <td>01/01/23</td>
                    <td>Si</td>
                    <td>
                      <!--<a href="#">Ver detalles...</a>-->
                      <a href="#"><i class="app-menu__icon fa fa-cog"></i>Eliminar...</a>
                    </td>
                  </tr>

                  <tr class="table-info">
                    <td>1</td>
                    <td><img class="app-sidebar__user-avatar" src="images/team/sue.png" alt="Sue Palacios"></td>
                    <td>sue</td>
                    <td>palacios</td>
                    <td>email@fdsfds</td>
                    <td>fdsfdsfsdf</td>
                    <td>01/01/23</td>
                    <td>Si</td>
                    <td>
                      <a href="#"><i class="app-menu__icon fa fa-cog"></i>Eliminar...</a>
                    </td>
                  </tr>

                  <tr class="table-warning">
                    <td>1</td>
                    <td><img class="app-sidebar__user-avatar" src="images/team/sue.png" alt="Sue Palacios"></td>
                    <td>sue</td>
                    <td>palacios</td>
                    <td>email@fdsfds</td>
                    <td>fdsfdsfsdf</td>
                    <td>01/01/23</td>
                    <td>Si</td>
                    <td>
                      <a href="#"><i class="app-menu__icon fa fa-cog"></i>Eliminar...</a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="clearfix"></div>
        
      </div>
    </main>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    
  </body>
</html>