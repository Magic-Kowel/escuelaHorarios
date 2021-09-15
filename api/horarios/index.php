<?php 
include '../conexion.php';
$temporal = array();
$resultado = array();
$sel = $con->query("SELECT 
    `id_clase`, privilegio,nombre_usuario, `salon`, `horario_inicio`, `horario_fin` 
    FROM `clase` 
    INNER JOIN usuario 
    on id_usuario_clase = id_usuario 
    INNER JOIN privilegio 
    on id_privilegio_usuario = id_privilegio
");
while ($fila = $sel->fetch_assoc()) {
    $temporal = $fila;
    array_push($resultado, $temporal);
}
echo json_encode($resultado);
$sel->close();
$con->close();
?>