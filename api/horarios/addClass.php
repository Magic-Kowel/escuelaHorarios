<?php 
include '../conexion.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {
    include_once('../../includes/variablePost.php');
    $sqlClass = "SELECT * FROM clase WHERE salon = '$clasRoom' ";
    $sqlTime = "SELECT * FROM `clase` WHERE
        salon ='$clasRoom' 
        and horario_inicio >='$timeStart' and horario_fin <= '$timeEnd'";
            $result=$con->query($sqlClass);
            $rows = $result->num_rows;
            //if($rows<1) {
                $result=$con->query($sqlTime);
                $rows = $result->num_rows;
                if($rows<1) {
                    $query = "INSERT INTO `clase`(`id_usuario_clase`, `salon`, `horario_inicio`, `horario_fin`) 
                    VALUES ('$teacher','$clasRoom','$timeStart','$timeEnd')";
                    $result = mysqli_query($con, $query);
                    if ($result) {
                        echo json_encode(array('responce'=>'success'));
                    } else {
                        echo json_encode(array('responce'=>'faill','error'=>$query));
                    }
                }else {
                    echo json_encode(array('error'=>'Tiempo Ocupado'));
                }
            /*} else {
                echo json_encode(array('error'=>'Clase ya existe'));
            }*/
}else{
    header("location:../../index.php");
}
?>

