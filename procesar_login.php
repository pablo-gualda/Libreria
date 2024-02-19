<?php
session_start();
$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];

$conexion = new mysqli('localhost', 'administrador', 'qwe_123', 'tienda_libros');
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

$sql = "SELECT * FROM usuarios WHERE correo = '$correo'";
$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {
    $usuario = $resultado->fetch_assoc();
    if ($usuario['contraseña'] == $contrasena) {
        $_SESSION['usuario'] = $correo;
        $_SESSION['nombre'] = $usuario['nombre'];
        $_SESSION['apellidos'] = $usuario['apellidos'];
        $_SESSION['dni'] = $usuario['dni'];
        
        header('Location: index.php');
    } else {
        echo "<p>Contraseña incorrecta. Por favor, inténtalo de nuevo.</p>";
    }
} else {
    echo "<p>No existe una cuenta con este correo. Por favor, <a href='registro.html'>regístrate</a> primero.</p>";
}

$conexion->close();
?>
