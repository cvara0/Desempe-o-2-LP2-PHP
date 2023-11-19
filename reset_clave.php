<?php
session_start();
if(isset($_SESSION['id'])){
  header("Location: index.php");
  exit();
}
$nueva_clave =true;

if (!empty($_POST['button_clave_reset'])) {
  
  require_once 'servicios/bd/usuarios/update_clave_usuario.php';
  $nueva_clave = reiniciarClave($_POST['input_email_reset']);
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
        <form class="login-form" role="form" method="POST" >
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>Olvidaste la clave ?</h3>
          
          <?php if(is_array($nueva_clave)){?>
            <div class="bs-component">
              <div class="alert alert-dismissible alert-success">
                <strong>Listo <?php echo $nueva_clave['email']?> ! Ya puedes loguearte, tu nueva clave es: <?php echo $nueva_clave['clave']?></strong>
              </div>
            </div>
          <?php }?>

          <?php if($nueva_clave==true){?>
            <div class="bs-component">
              <div class="alert alert-dismissible alert-info">
                <strong>Tu clave será reseteada</strong>
              </div>
            </div>
          <?php }elseif($nueva_clave==false){?>
            <div class="bs-component">
              <div class="alert alert-dismissible alert-danger">
                <strong>El mail ingresado no existe</strong>
              </div>
            </div>
          <?php }?>
           
         
          <div class="form-group">
              <label class="control-label">Ingresa tu correo</label>
              <input class="form-control" placeholder="Email" name="input_email_reset">
          </div>
          <div class="form-group btn-container ">
            <button class="btn btn-primary btn-block" type='submit' name='button_clave_reset' value='reset_clave'><i class="fa fa-unlock fa-lg fa-fw"></i>RESET</button>
          </div>
          <div class="form-group mt-3">
            <p class="semibold-text mb-0"><a href="login_usuario.php" data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i> Ir al Login</a></p>
          </div>
        </form>
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