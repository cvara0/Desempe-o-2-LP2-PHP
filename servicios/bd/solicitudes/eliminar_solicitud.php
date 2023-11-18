<?php
function eliminarSolicitud($input_id_eliminar) {
    $usuarios = array();
    
    require_once "servicios/bd/conexion.php";
    $conexion=crearConexion();
    if (isset($input_id_eliminar)) {
        $conexion->query("SET foreign_key_checks = 0");
        $query="DELETE FROM Solicitudes WHERE id=?";
        // i d s b
        $stmt = $conexion->prepare($query);
        $stmt->bind_param("i",$input_id_eliminar);
        $stmt->execute();
        //$resultado = $stmt->get_result();
      
        $stmt->close();
        //return $usuarios;
        $conexion->query("SET foreign_key_checks = 1");
    }
   
}
?>