<?php
session_start();
if(!isset($_SESSION['id']) || $_SESSION['id_rol']!=1){
  header("Location: login_usuario.php");
  exit();
} 

require_once "servicios/bd/usuarios/select_todo_usuario.php";
$usaurios=selectTodoUsuario();
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
          <h1><i class="fa fa-th-list"></i> Usuarios</h1>
        
          <p>Listado total de usuarios</p>
          
        


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
                    <th>Último Acceso</th>
                    <th>¿Está Activo?</th>
                    <th>Opciones</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($usaurios as $i=> $usuario){?>
                    <tr class="table-<?php echo($usuario['color'])?>">
                      <td><?php echo($i+1)?></td>
                      <td><img class="app-sidebar__user-avatar" src="<?php echo($usuario['foto'])?>" alt="<?php echo($usuario['nombre'])?>"></td>
                      <td><?php echo($usuario['nombre']);?></td>
                      <td><?php echo($usuario['apellido'])?></td>
                      <td><?php echo($usuario['email'])?></td><!--01/11/2023 10:23:56-->
                      <td><?php echo($usuario['fecha_ultimo_acceso'])?></td>
                      <td><?php echo($usuario['esta_activo'])?><br> 
                      <td>
                        <!-- Button trigger modal -->
                        <a  data-toggle="modal" data-target="#detalles_modal<?php echo($i+1)?>" type="button">Ver detalles...</a>
    
                        <a href="#"><i class="app-menu__icon fa fa-cog"></i>Eliminar...</a>
                        
                      </td>
                    </tr>
                        <!-- Modal -->
                        <div class="modal fade" id="detalles_modal<?php echo($i+1)?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Detalle de Usuario</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>

                              <div class="modal-body">
                                <ul class="list-group list-group-flush">
                                  <li class="list-group-item"><b>#</b><?php echo($i+1)?></li>
                                  <li class="list-group-item"><b>ID de Usuario:<br></b><?php echo($usuario['id_usuario'])?></li>
                                  <li class="list-group-item" style="word-wrap: break-word;"><b>Rol:<br></b><?php echo($usuario['nombre_rol'])?></li>
                                  <li class="list-group-item" style="word-wrap: break-word;"><b>Nombre:<br></b><?php echo($usuario['nombre'])?></li>
                                  <li class="list-group-item"><b>Apellido:<br></b><?php echo($usuario['apellido'])?></li>
                                  <li class="list-group-item"><b>Email:<br></b><?php echo($usuario['email'])?></li>
                                  <li class="list-group-item"><b>Último Acceso:<br></b><?php echo($usuario['fecha_ultimo_acceso'])?></li>
                                  <li class="list-group-item"><b>¿Activo?:<br></b><?php echo($usuario['esta_activo'])?></li>
                                  <li class="list-group-item"><b>Foto:<br></b><img width="200px" height="200px" src="<?php echo(substr($usuario['foto'],0,-3)."jpg")?>" class="rounded mx-auto d-block" alt="<?php echo($usuario['nombre'])?>"></li>
                                  
                                </ul>

                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                              </div>
                            </div>
                          </div>
                        </div>
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