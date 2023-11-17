<?php
function selectSolicitudPorRolUsuario() {
    $solicitudes = array();

    require_once "servicios/bd/conexion.php";
    $conexion=crearConexion();
    $query="SELECT 
                    S.*,
                    S.id AS id_solicitud, 
                    T.id AS id_tipo,
                    T.nombre AS nombre_tipo,
                    U.nombre AS nombre_usuario, 
                    U.apellido AS apellido_usuario,
                    R.nombre AS nombre_rol,
                    DATE_FORMAT(S.fecha_carga,'%d/%m/%Y <br> %h:%i:%s') AS fecha_carga,
                    DATE_FORMAT(S.fecha_estimada_resolucion,'%d/%m/%Y <br> %h:%i:%s') AS fecha_estimada_resolucion
                FROM 
                    Solicitudes AS S JOIN Tipos AS T ON S.id_tipo=T.id 
                JOIN 
                    Usuarios AS U ON S.id_usuario=U.id
                JOIN 
                    Roles AS R ON U.id_rol=R.id
                WHERE ?=1 
                    OR (?=2 AND ?=U.id)
                    OR (?=3 AND T.id=3)
                    OR (?=4 AND (T.id=1 OR T.id=2))
                ORDER BY fecha_carga ASC";
    // i d s b
    $stmt = $conexion->prepare($query);
    $stmt->bind_param("iiiii",$_SESSION['id_rol'],$_SESSION['id_rol'],$_SESSION['id'],$_SESSION['id_rol'],$_SESSION['id_rol'] );
    $stmt->execute();
    $resultado = $stmt->get_result();
    
    $i=0;
    while ($data = $resultado->fetch_assoc()) {
        $solicitudes[$i]['id_solicitud'] = $data['id_solicitud'];
        //$solicitudes[$i]['id_tipo'] = $data['id_tipo'];
        $solicitudes[$i]['nombre_tipo'] = $data['nombre_tipo'];
        $solicitudes[$i]['nombre_rol'] = $data['nombre_rol'];
        $solicitudes[$i]['nombre_usuario'] = $data['nombre_usuario'];
        $solicitudes[$i]['apellido_usuario'] = $data['apellido_usuario'];
        $solicitudes[$i]['titulo'] = $data['titulo'];
        $solicitudes[$i]['descripcion'] = $data['descripcion'];
        $solicitudes[$i]['fecha_carga'] = $data['fecha_carga'];
        $solicitudes[$i]['fecha_estimada_resolucion'] = $data['fecha_estimada_resolucion'];
        $solicitudes[$i]['color'] = $data['id_tipo']==1?'info':($data['id_tipo']==2?'warning':'danger');
        $i++;
    };
    $stmt->close();
    return $solicitudes;
}
?>