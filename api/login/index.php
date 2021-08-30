<?php 
include '../conexion.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {
    $user= $con ->real_escape_string(htmlentities($_POST['email']));
    $pass= $con ->real_escape_string(htmlentities($_POST['pass']));
    $error = '';
    $sql = "SELECT * FROM usuario WHERE email = '$user' and PASSWORD ='$pass'";
            $result=$con->query($sql);
            $rows = $result->num_rows;
            if($rows > 0) {
                $row = $result->fetch_assoc();
                $_SESSION["logueado"] = TRUE;
                $_SESSION['id'] = $row['id_usuario'];			
                $_SESSION['pribilegio'] = $row['id_privilegio_usuario'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['nombre'] = $row['nombre_usuario'];
                    echo json_encode(array('responce'=>'success'));
                } else {
                $error = "faill";
                echo  $error;
            }
}else{
    header("location:../../index.php");
}
?>


