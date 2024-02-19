<?php
session_start();
$isbn = $_POST['isbn'];
if (($key = array_search($isbn, $_SESSION['carrito'])) !== false) {
    unset($_SESSION['carrito'][$key]);
}
header('Location: carrito.php');
?>
