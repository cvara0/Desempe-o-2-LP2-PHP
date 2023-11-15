<?php
function selectSolicitudPorRolUsuario() {
    $estado_solicitud = array();
    $_SESSION['id_rol'];
    $_SESSION['id'];
    require_once "servicios/bd/conexion.php";
    $conexion=crearConexion();
    $QUERY="SELECT S.*
                FROM 
                    Solicitudes AS S JOIN Tipos AS T ON S.id_tipo=T.id 
                JOIN 
                    Usuarios AS U ON S.id_usuario=U.id
                JOIN 
                    Roles AS R ON U.id_rol=R.id
                WHERE @rol=1 
                    OR (@rol=2 AND @id_u=U.id)
                    OR (@rol=3 AND T.id=3)
                    OR (@rol=4 AND (T.id=1 OR T.id=2))";
    // i d s b
    $stmt = $conexion->prepare($QUERY);
    $stmt->bind_param("iissiii", $radio_tipo,$_SESSION['id'] ,$input_titulo,$textarea_descripcion,$radio_tipo,$radio_tipo,$radio_tipo);
    $stmt->execute();
    if($stmt){
        $estado_solicitud['info'] = "Solicitud almacenada!";
        $estado_solicitud['color']='success';
        unset($_POST);
    }else{
        $estado_solicitud['info'] = "Error al guardar los datos.";
        $estado_solicitud['color']='danger';
    }
    //$request = mysqli_query($conexion, $QUERY);
    //$resultado = $stmt->get_result();
    //$data = $resultado->fetch_assoc();
    $stmt->close();

    return $estado_solicitud;
    //$request=mysqli_query($conexion, $QUERY);
}
?>