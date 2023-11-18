<?php
//sin uso pero que quede aca apra recordar
function countUsuarios() {
    require_once "servicios/bd/conexion.php";
    $conexion=crearConexion();
    $query="SELECT COUNT(id) AS conteo FROM Usuarios";
    // i d s b
    $stmt = $conexion->prepare($query);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $data = $resultado->fetch_assoc();

    // Cierra la conexión y devuelve el resultado
    $stmt->close();
    //$conexion->close();
    
    return $data['conteo'];
}
?>