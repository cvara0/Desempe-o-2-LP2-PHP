<?php
function selectNombreRol($id_rol){
    $nombre_rol='';
    require_once "servicios/bd/conexion.php";
    $conexion=crearConexion();
    $query="SELECT nombre FROM Roles WHERE id=$id_rol";
    $request=mysqli_query($conexion, $query);
    $data = mysqli_fetch_array($request);
    
    if (!empty($data)) {
        $nombre_rol = $data['nombre'];
    }
    
    return $nombre_rol;
}

?>