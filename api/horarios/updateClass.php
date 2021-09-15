<?php 
include '../conexion.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {
    include_once('../../includes/variablePost.php');
                $query = "UPDATE `clase` SET `id_usuario_clase`= '$teacher',`salon`='$clasRoom',`horario_inicio`='$timeStart',`horario_fin`='$timeEnd' 
                WHERE id_clase=$id";
                $result = mysqli_query($con, $query);
                if ($result) {
                    echo json_encode(array('responce'=>'success'));
                } else {
                    echo json_encode(array('responce'=>'faill','error'=>$query));
                }
}
?>
