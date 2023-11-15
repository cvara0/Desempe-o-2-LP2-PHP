<?php
function reiniciarClave($usuario){
    require_once "servicios/bd/conexion.php";
    $conexion=crearConexion();
    $nueva_calve=array();
    $QUERY="UPDATE Usuarios SET clave=LEFT(UUID(), 4) WHERE email='$usuario'";
    mysqli_query($conexion, $QUERY);
    $QUERY2="SELECT clave,email FROM Usuarios WHERE email='$usuario'";
    $request2 = mysqli_query($conexion, $QUERY2);
    $data = mysqli_fetch_array($request2);
    if(!$data['email']){
        return false;
    }
    if (!empty($data)) {
        $nueva_calve['clave'] = $data['clave']; 
        $nueva_calve['email'] = $data['email']; 
    }
    $QUERY3="UPDATE Usuarios SET clave=MD5(clave) WHERE email='$usuario'";
    mysqli_query($conexion, $QUERY3);
    
    return $nueva_calve;
}

?>