<?php
session_start();
if(!isset($_SESSION['id'])){
  header("Location: login_usuario.php");
  exit();
} 
$estado_solicitud ="";
if (!empty($_POST['button_registrar'])) {
    
  require_once 'servicios/bd/solicitudes/insert_solicitud.php';
  
  $estado_solicitud = insertSolicitud($_POST['input_titulo'], $_POST['textarea_descripcion'],$_POST['radio_tipo']);

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
          <h1><i class="fa fa-edit"></i> Registra aqui tu solicitud</h1>
          <p>Detalla lo mas que puedas para que un encargado pueda asesorarte.</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Inicio</li>
          <li class="breadcrumb-item"><a href="#">Registro</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <form role="form" method="POST" class="tile">
            <h3 class="tile-title">Ingresa los datos solicitados</h3>
            
            <div class="bs-component">
              <div class="alert alert-dismissible alert-<?php echo($estado_solicitud['color'])?>">
                  <strong><?php echo($estado_solicitud['info'])?></strong>
                </div>
            </div>

              <div class="bs-component">
                <div class="alert alert-dismissible alert-info">
                  <strong>Los campos con <i class="fa fa-asterisk" aria-hidden="true"></i> son obligatorios</strong>
                </div>
              </div>


            <div class="tile-body">
              
                <div class="form-group">
                  <label class="control-label">Título</label> <i class="fa fa-asterisk" aria-hidden="true"></i>
                  <input class="form-control" name="input_titulo" value="<?php echo($_POST['input_titulo'])?>" >
                </div>
                
                <div class="form-group">
                  <label class="control-label">Descripción de solicitud <i class="fa fa-asterisk" aria-hidden="true"></i></label>
                  <textarea class="form-control" rows="4" name="textarea_descripcion" placeholder="Ingresa los detalles..."><?php echo($_POST['textarea_descripcion'])?></textarea>
                </div>
                <div class="form-group">
                  <label class="control-label">Tipo de solicitud</label> <i class="fa fa-asterisk" aria-hidden="true"></i>
                  <?php 
                    require_once "servicios/bd/tipos/select_todo_tipo.php";
                    $tipos=selectTodoTipo();
                    foreach($tipos as $tipo){?>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="form-check-input" <?php echo($tipo["id"]==$_POST['radio_tipo']?'checked':'')?> type="radio" name="radio_tipo" value=<?php echo($tipo["id"])?>> <?php echo($tipo["nombre"])?>
                      </label>
                    </div>
                  <?php };?>
            
                  
                </div>
                <!--
                <div class="form-group">
                  <label class="control-label">Puedes subir una captura de pantalla</label>
                  <input class="form-control" type="file">
                </div>
                -->
                <div class="tile-footer">
              <button class="btn btn-primary" type="submit" value="Registrar" name="button_registrar" ><i class="fa fa-fw fa-lg fa-check-circle"></i>Registrar</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="index.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
            </div>
            </div>
          </form>
        </div>
        
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