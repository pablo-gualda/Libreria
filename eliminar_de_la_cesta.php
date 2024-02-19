<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: login.html');
    exit();
}

$index = $_POST['index'];

if (isset($_SESSION['carrito'])) {
    array_splice($_SESSION['carrito'], $index, 1);
}

header('Location: carrito.php');
?>
