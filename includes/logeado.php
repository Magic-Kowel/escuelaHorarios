<?php 
    @session_start();
    if ($_SESSION['logueado'] != TRUE) {
        header("location:../index.php");
    }
?>