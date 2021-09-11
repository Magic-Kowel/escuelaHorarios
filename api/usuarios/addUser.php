<?php 
include '../conexion.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {
    include_once('../../includes/variablePost.php');
    $sql = "SELECT * FROM usuario WHERE email = '$correoUser' ";
            $result=$con->query($sql);
            $rows = $result->num_rows;
            if($rows<1) {
                $query = "INSERT INTO `usuario`(nombre_usuario, apellidos, email,PASSWORD,id_privilegio_usuario)
                VALUES ('$nombreUser','$apellidosUser','$correoUser','$passwordUser','$typeUser')";
                $result = mysqli_query($con, $query);
                if ($result) {
                    echo json_encode(array('responce'=>'success'));
                } else {
                    echo json_encode(array('responce'=>'faill','error'=>$query));
                }
                
            } else {
                echo json_encode(array('error'=>'Usuario ya existe'));
            }
}else{
    header("location:../../index.php");
}
?>

