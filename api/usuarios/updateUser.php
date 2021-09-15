<?php 
include '../conexion.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {
    include_once('../../includes/variablePost.php');
                $query = "UPDATE `usuario` SET `nombre_usuario`= '$nombreUser' ,
                `apellidos`='$apellidosUser',
                `email`='$correoUser',
                `id_privilegio_usuario`='$typeUser'
                WHERE id_usuario=$id";
                $result = mysqli_query($con, $query);
                if ($result) {
                    echo json_encode(array('responce'=>'success'));
                } else {
                    echo json_encode(array('responce'=>'faill','error'=>$query));
                }
}
?>
