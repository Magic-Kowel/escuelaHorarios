<?php 
include '../conexion.php';
$temporal = array();
$resultado = array();
$sel = $con->query("SELECT id_usuario, nombre_usuario, apellidos, email, privilegio FROM `usuario` INNER JOIN privilegio on id_privilegio_usuario = id_privilegio");
while ($fila = $sel->fetch_assoc()) {
    $temporal = $fila;
    array_push($resultado, $temporal);
}
echo json_encode($resultado);
$sel->close();
$con->close();
?>