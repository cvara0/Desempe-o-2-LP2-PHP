<?php
function selectTodoUsuario() {
    $usuarios = array();
    
    require_once "servicios/bd/conexion.php";
    $conexion=crearConexion();
    $query="SELECT 
                U.*,R.nombre AS nombre_rol,
                    DATE_FORMAT(U.fecha_ultimo_acceso,'%d/%m/%Y <br> %h:%i:%s') AS fecha_ultimo_acceso
                FROM 
                    Usuarios AS U JOIN Roles AS R ON U.id_rol=R.id
                ORDER BY fecha_ultimo_acceso DESC";
    // i d s b
    $stmt = $conexion->prepare($query);
    //$stmt->bind_param();
    $stmt->execute();
    $resultado = $stmt->get_result();
   
    $i=0;
    while ($data = $resultado->fetch_assoc()) {
        $usuarios[$i]['id_usuario'] = $data['id'];
        $usuarios[$i]['nombre_rol'] = $data['nombre_rol'];
        $usuarios[$i]['id_rol'] = $data['id_rol'];
        $usuarios[$i]['nombre'] = $data['nombre'];
        $usuarios[$i]['apellido'] = $data['apellido'];
        $usuarios[$i]['foto'] = $data['foto'];
        $usuarios[$i]['email'] = $data['email'];
        $usuarios[$i]['fecha_ultimo_acceso'] = $data['fecha_ultimo_acceso'];
        $usuarios[$i]['esta_activo'] = $data['esta_activo'];
        $usuarios[$i]['color'] = $data['esta_activo']==1?'info':'danger';
        $i++;
    };
    $stmt->close();
    return $usuarios;
}
?>