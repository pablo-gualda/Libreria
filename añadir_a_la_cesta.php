<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: login.html');
    exit();
}

$isbn = $_POST['isbn'];

if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = array();
}

array_push($_SESSION['carrito'], $isbn);
$_SESSION['mensaje_exito'] = 'Libro añadido con éxito!';
header('Location: carrito.php');
?>
