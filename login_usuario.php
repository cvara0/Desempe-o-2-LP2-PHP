<?php
session_start();
if(isset($_SESSION['id'])){
  header("Location: index.php");
  exit();
} 
$mensaje_error='';
$esta_inactivo= false;
if (!empty($_POST['button_login'])) {
    
    require_once 'servicios/bd/usuarios/login.php';
    $usuarioLogueado = crearLogin($_POST['input_email'], $_POST['input_clave']);

    //la consulta con la BD para que encuentre un usuario registrado con el usuario y clave brindados
    if ( !empty($usuarioLogueado)) {
        if($usuarioLogueado['esta_activo']==1){
            
            require_once 'servicios/bd/usuarios/sesion.php';
            crearSesion($usuarioLogueado);
            header('Location: index.php');
            exit();
        }else{
          $mensaje_error='Su cuenta no esta activa.';
        }
        
    }
    else{
      $mensaje_error='Datos incorrectos.';
    }
}


?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->   
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Login - 2do desempeño</title>  
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
        <h1>Panel de administración</h1>
      </div>
      <div class="login-box">
        <form class="login-form" role="form" method="POST">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>INGRESA AL PANEL</h3>

         <!-- *******************************************
           esto se debe mostrar solo si hay errores en el logueo,
            y no mostrar la otra de Ingresa tus datos -->
         
            <?php if(!empty($mensaje_error)){?>
                <div class="bs-component">
                  <div class="alert alert-dismissible alert-danger">
                    <strong><?php echo($mensaje_error)?></strong>
                  </div>
                </div>
          <?php }
              else{?> 
                <div class="bs-component">
                  <div class="alert alert-dismissible alert-info">
                    <strong>Ingresa tus datos</strong>
                  </div>
                </div>
          <?php }?>

          <div class="form-group" >
            <label class="control-label">Usuario (*)</label>
            <input class="form-control" placeholder="Email" name="input_email" autofocus>
          </div>
          <div class="form-group">
            <label class="control-label">Clave (*)</label>
            <input class="form-control" placeholder="Password" name="input_clave">
          </div>
          <div class="form-group">
            <div class="utility">
              <p class="semibold-text mb-2"><a href="reset_clave.php" data-toggle="flip" >Olvidaste la clave ?</a></p>
            </div>
          </div>
          <div class="form-group btn-container">
            <button type="submit" name="button_login" value="Login" class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>INGRESAR</button>
          </div>

      </div>
    </section>
    <!-- Essential javascripts for application to work-->
    <?php require_once "componentes/scripts_footer.inc.php"?>

    <script type="text/javascript">
      // Login Page Flipbox control
      $('.login-content [data-toggle="flip"]').click(function() {
      	$('.login-box').toggleClass('flipped');
      	return true;
      });
    </script>
  </body>
</html>