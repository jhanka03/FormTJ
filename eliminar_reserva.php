<?php

session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.html");
    exit();
}


    include('conexion.php');

    if ( isset($_GET['id'])) {
        $id=$_GET['id'];
        $reserva= new basedatos();
        $resultado= $reserva->eliminar_reserva($id);

        if ($resultado==true) {
            header("location:listar.php");
        } else {
            echo "Error al eliminar";
        }
        
    }
?>