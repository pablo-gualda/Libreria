<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: login.html');
    exit();
}

$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$dni = $_POST['dni'];
$correo = $_POST['correo'];
$contraseña = $_POST['contraseña'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$direccion = $_POST['direccion'];

$conexion = new mysqli('localhost', 'administrador', 'qwe_123', 'tienda_libros');
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

$sql = "UPDATE usuarios SET nombre = '$nombre', apellidos = '$apellidos', dni = '$dni', correo = '$correo', contraseña = '$contraseña', fecha_nacimiento = '$fecha_nacimiento', direccion = '$direccion' WHERE correo = '$correo'";

if ($conexion->query($sql) === TRUE) {
    echo "<p>Perfil actualizado con éxito.</p>";
} else {
    echo "<p>Error al actualizar el perfil: " . $conexion->error . "</p>";
}

$conexion->close();
?>
