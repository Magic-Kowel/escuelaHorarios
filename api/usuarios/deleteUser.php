<?php 
include '../conexion.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {
    include_once('../../includes/variablePost.php');
        $query = "DELETE FROM `usuario` WHERE `id_usuario` ='$id'";
        $result = mysqli_query($con, $query);
        if ($result) {
            echo json_encode(array('responce'=>'success'));
        } else {
            echo json_encode(array('responce'=>'faill','error'=>$query));
        }
}else{
    header("location:../../index.php");
}
?>

