<?php
session_start();
if(!isset($_SESSION['id'])){
  header("Location: login_usuario.php");
  exit();
} 
require_once "servicios/bd/solicitudes/select_solicitud_por_rol_usuario.php";
$solicitudes=selectSolicitudPorRolUsuario();


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
       
          <p><?php echo($_SESSION['id_rol']==1?'Listado total de solicitudes':($_SESSION['id_rol']==2?'Listado de mis solicitudes cargadas':'Listado de solicitudes cargadas'))?></p>
        
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Listado</li>
          <li class="breadcrumb-item active"><a href="#">Listado de Solicitudes</a></li>
        </ul>
      </div>
      <div class="row">
        
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Solicitudes (<?php echo(count($solicitudes))?>)</h3>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Título</th>
                    <th>Descripción</th>
                    <th>Tipo</th>
                    <th>Registro</th>
                    <th>Fecha estimada</th>
                    <th>Solicitante</th>
                    <th>Opciones</th>

                  </tr>
                </thead>
                <tbody>
                  <?php foreach($solicitudes as $i=> $solicitud){?>
                    <tr class="table-<?php echo($solicitud['color'])?>">
                      <td><?php echo($i+1)?></td>
                      <td><?php echo($solicitud['titulo'])?></td>
                      <td><?php echo(substr($solicitud['descripcion'],1,20))?></td>
                      <td><?php echo($solicitud['nombre_tipo'])?></td>
                      <td><?php echo($solicitud['fecha_carga'])?></td><!--01/11/2023 10:23:56-->
                      <td><?php echo($solicitud['fecha_estimada_resolucion'])?></td>
                      <td><?php echo($solicitud['nombre_usuario'])?><br> 
                          <?php echo($solicitud['apellido_usuario'])?></td>
                      <td>
                        <a href="#">Ver detalles...</a>
                        <a href="#"><i class="app-menu__icon fa fa-cog"></i>Eliminar...</a>
                      </td>
                    </tr>
                  <?php }?>
                 

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