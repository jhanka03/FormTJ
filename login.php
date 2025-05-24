<?php
include('conexion.php');
session_start();
$usuario= $_POST['usuario'];
$clave= $_POST['clave'];

$datos= new basedatos();
$resultado= $datos->login($usuario,$clave);
$array= mysqli_fetch_array($resultado);

if ($array['registros']>=1) {
    session_start();
    $_SESSION['username']=$usuario;
    header("location:index.php");

} else {
    echo "Datos Incorrectos";
}



?>