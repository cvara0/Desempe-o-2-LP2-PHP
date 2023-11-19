<?php
//sin uso pero que quede aca apra recordar
function countSolicitudesPorTipo() {
    $solicitudes=array();
    require_once "servicios/bd/conexion.php";
    $conexion=crearConexion();

    $query="SELECT id_tipo, COUNT(id) AS conteo FROM Solicitudes GROUP BY id_tipo";
    // i d s b
    $stmt = $conexion->prepare($query);
    $stmt->execute();
    $resultado = $stmt->get_result();

    while ($data = $resultado->fetch_assoc()) {
        // Almacena los conteos en el array asociativo usando el id_tipo como clave
        $solicitudes[$data['id_tipo']] = $data['conteo'];
    }

    // Cierra la conexión y devuelve el resultado
    $stmt->close();
    //$conexion->close();
    
    return $solicitudes;
}
?>