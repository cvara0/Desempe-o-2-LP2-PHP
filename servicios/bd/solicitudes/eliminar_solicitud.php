<?php
function eliminarSolicitud($input_id_eliminar) {
    $usuarios = array();
    
    require_once "servicios/bd/conexion.php";
    $conexion=crearConexion();
    if (isset($input_id_eliminar)) {
        $query="DELETE FROM Usuarios WHERE id=?";
        // i d s b
        $stmt = $conexion->prepare($query);
        $stmt->bind_param("i",$input_id_eliminar);
        $stmt->execute();
        //$resultado = $stmt->get_result();
      
        $stmt->close();
        //return $usuarios;
    }
   
}
?>