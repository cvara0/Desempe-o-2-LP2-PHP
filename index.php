<?php
session_start();
if(!isset($_SESSION['id'])){
  header("Location: login_usuario.php");
  exit();
}
require_once "servicios/bd/usuarios/count_usuarios.php";
require_once "servicios/bd/solicitudes/count_solicitudes.php";

$cantidad_solicitudes=countSolicitudesPorTipo();
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
          <h1><i class="fa fa-dashboard"></i> Bienvenidos</h1>
          <p>Este es nuestro panel de administración. 
            Por favor selecciona alguna opción del menú lateral izquierdo</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Inicio</a></li>
        </ul>
      </div>


      <div class="row">
        <div class="col-md-3">
          <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
            <div class="info">
              <h4>Usuarios</h4>
              <p><b><?php echo countUsuarios()?></b></p>
            </div>
          </div>
        </div>
        
        <div class="col-md-3">
          <div class="widget-small info coloured-icon"><i class="icon fa fa-thumbs-o-up fa-3x"></i>
            <div class="info">
              <h4>Solicitudes Desarrollo</h4>
              <p><b><?php echo $cantidad_solicitudes[1]?></b></p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="widget-small warning coloured-icon"><i class="icon fa fa-files-o fa-3x"></i>
            <div class="info">
              <h4>Solicitudes de Soporte Tecnico</h4>
              <p><b><?php echo $cantidad_solicitudes[3]?></b></p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="widget-small danger coloured-icon"><i class="icon fa fa-star fa-3x"></i>
            <div class="info">
              <h4>Reportes de errores</h4>
              <p><b><?php echo $cantidad_solicitudes[2]?></b></p>
            </div>
          </div>
        </div>
      </div>
     
    </main>


    <!-- Essential javascripts for application to work-->
  <?php require_once "componentes/scripts_footer.inc.php"?>

  </body>
</html>