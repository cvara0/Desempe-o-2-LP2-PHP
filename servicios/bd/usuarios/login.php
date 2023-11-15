<?php
function crearLogin($usuario,$clave){
    require_once "servicios/bd/conexion.php";
    $conexion=crearConexion();
    $usuario_array=array();
    $QUERY="SELECT id,id_rol,nombre,apellido,foto,esta_activo FROM Usuarios WHERE email=? AND clave = MD5(?)";
    //stmt hace referencia a una sentencia preparada
    $stmt = $conexion->prepare($QUERY);
    $stmt->bind_param("ss", $usuario, $clave);
    $stmt->execute();
    //$request = mysqli_query($conexion, $QUERY);
    $resultado = $stmt->get_result();
    $data = $resultado->fetch_assoc();
    $stmt->close();

    //$data = mysqli_fetch_array($request);
    if (!empty($data)) {
        $usuario_array['id'] = $data['id'];
        $usuario_array['id_rol'] = $data['id_rol'];
        $usuario_array['nombre'] = $data['nombre'];
        $usuario_array['apellido'] = $data['apellido'];
        
        if (empty( $data['foto'])) {
            $data['foto'] = 'images/team/user.png'; 
        }
        $usuario_array['foto'] = $data['foto'];
        $usuario_array['esta_activo'] = $data['esta_activo'];
        
        $id=$usuario_array['id'];
        $QUERY2="UPDATE Usuarios SET fecha_ultimo_acceso=CURDATE() WHERE id=$id";
        mysqli_query($conexion, $QUERY2); 
    }

    return $usuario_array;
}
/*
$QUERY = "SELECT id, id_rol, nombre, apellido, foto, esta_activo FROM Usuarios WHERE email=? AND clave = MD5(?)";
// Preparar la consulta
$stmt = $conexion->prepare($QUERY);
// Vincular parámetros
$stmt->bind_param("ss", $usuario, $clave);
// Ejecutar la consulta preparada
$stmt->execute();
// Obtener el resultado
$resultado = $stmt->get_result();
// Obtener datos como array asociativo
$data = $resultado->fetch_assoc();
// Liberar recursos
$stmt->close();


i: Integer (entero)
d: Double (flotante)
s: String (cadena)
b: Blob (datos binarios)
*/
?>