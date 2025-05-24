<?php


session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: index.html");
    exit();
}



session_start();
$usuario= $_SESSION['username'];

if (isset($usuario)) {
    echo "Bienvenido $usuario";
    echo "<a href='salir.php'>salir</a>";
} else {
    header("location:index.html");
}




?>

