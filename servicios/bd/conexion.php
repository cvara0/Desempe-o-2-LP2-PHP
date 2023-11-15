<?php
function crearConexion($host='localhost',$user='root',$password='root', $database= 'panel') {
    $linkConexion = mysqli_connect($host,$user,$password,$database);
    if ($linkConexion) {
        return $linkConexion;
    }
    else { 
        die('No se pudo establecer la conexion');
    }
}
?>