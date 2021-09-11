<?php 
include '../conexion.php';
$temporal = array();
$resultado = array();
$sel = $con->query("SELECT `id_privilegio`, `privilegio` FROM privilegio");
while ($fila = $sel->fetch_assoc()) {
    $temporal = $fila;
    array_push($resultado, $temporal);
}
echo json_encode($resultado);
$sel->close();
$con->close();
?>