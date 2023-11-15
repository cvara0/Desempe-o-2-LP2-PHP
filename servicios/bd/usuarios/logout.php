<?php

function logout($vLogout){
    
if(isset($_POST[$vLogout])) {
    
    // Destruir todas las variables de sesión
  session_unset();
  // Destruir la sesión
  session_destroy();

  // Redirigir a otra página después de cerrar sesión (opcional)
  header("Location: login_usuario.php");
  exit();
  
    }

        


}
?>