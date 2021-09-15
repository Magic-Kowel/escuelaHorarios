<?php 
    @session_start();
    if ($_SESSION['logueado'] != TRUE) {
        header("location:../login");
    }
?>