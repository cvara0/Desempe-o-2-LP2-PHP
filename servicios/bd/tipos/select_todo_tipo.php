<?php
function selectTodoTipo(){
    $tipos=array();
    require_once "servicios/bd/conexion.php";
    $conexion=crearConexion();
    $QUERY="SELECT * FROM Tipos";
    $request=mysqli_query($conexion, $QUERY);
    $i=0;
    while ($data = mysqli_fetch_array($request)) {
        $tipos[$i]['id'] = $data['id'];
        $tipos[$i]['nombre'] = $data['nombre'];
        $i++;
    }
    return $tipos;
}

?>