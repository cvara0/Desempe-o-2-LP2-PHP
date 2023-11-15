<?php
function crearSesion($usuarioLogueado){
    $_SESSION['id'] = $usuarioLogueado['id'];
    $_SESSION['id_rol'] = $usuarioLogueado['id_rol'];
    $_SESSION['nombre'] = $usuarioLogueado['nombre'];
    $_SESSION['apellido'] = $usuarioLogueado['apellido'];
    $_SESSION['foto'] = $usuarioLogueado['foto'];
}
?>