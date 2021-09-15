<?php 
@session_start();
if($_SESSION['pribilegio']!=1){
    header("location:./../horariosClases");
}
?>