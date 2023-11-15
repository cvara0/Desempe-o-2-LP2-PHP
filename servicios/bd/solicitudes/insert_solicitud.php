<?php
function insertSolicitud($input_titulo, $textarea_descripcion,$radio_tipo) {
    $estado_solicitud = array();
    
    if(strlen($input_titulo) < 5) {
        $estado_solicitud['info'].= "Debes ingresar 5 caracteres como mínimo en título.<br>";
    }
    if(strlen($textarea_descripcion) < 5) {
        $estado_solicitud['info'].= "Debes ingresar 5 caracteres como mínimo en descripción.<br>";
    }
    if(!$radio_tipo) {
        $estado_solicitud['info'].= "Selecciona un tipo de solicitud.<br>";
    }
    if(strlen($estado_solicitud['info'])!=0){
        $estado_solicitud['color']='danger';
        return $estado_solicitud;
    }
    require_once "servicios/bd/conexion.php";
    $conexion=crearConexion();
    $QUERY="INSERT INTO Solicitudes(id_tipo,id_usuario,titulo,descripcion,fecha_carga,fecha_estimada_resolucion) 
    VALUES (?,?,?,?,CURDATE(),
    IF (?=1,DATE_ADD(CURDATE(),INTERVAL 7 DAY),
        IF (?=2,DATE_ADD(CURDATE(),INTERVAL 3 DAY),
            IF (?=3,DATE_ADD(CURDATE(),INTERVAL 1 DAY),NULL)
            )
        )
    )";
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