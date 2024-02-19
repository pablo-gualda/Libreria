<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: login.html');
    exit();
}

$correo = $_SESSION['usuario'];

$conexion = new mysqli('localhost', 'administrador', 'qwe_123', 'tienda_libros');
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

$sql = "SELECT * FROM usuarios WHERE correo = '$correo'";
$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {
    $usuario = $resultado->fetch_assoc();
} else {
    echo "<p>No existe una cuenta con este correo.</p>";
    exit();
}

$conexion->close();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Perfil - Tienda de Libros Gualda</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body>
<header>
        <h1>Tienda de Libros Gualda</h1>
    </header>
    <nav>
        <a href="index.html">Inicio🏠</a>
        <a href="registro.html">⬆️Registrarse</a>
        <a href="login.html">✅Iniciar Sesión</a>
        <a href="catalogo.php">📚Catálogo de Libros</a>
        <a href="carrito.php" style="float: right;">Ver Carro🛒</a>
        <a href="perfil.php" style="float: right;">Perfil👤</a>
    </nav>
    <main>
        <h2>Perfil de <?php echo $usuario['nombre']; ?></h2>
        <form action="actualizar_perfil.php" method="post">
            <label for="nombre">Nombre:</label><br>
            <input type="text" id="nombre" name="nombre" value="<?php echo $usuario['nombre']; ?>"><br>
            <label for="apellidos">Apellidos:</label><br>
            <input type="text" id="apellidos" name="apellidos" value="<?php echo $usuario['apellidos']; ?>"><br>
            <label for="dni">DNI:</label><br>
            <input type="text" id="dni" name="dni" value="<?php echo $usuario['dni']; ?>"><br>
            <label for="correo">Correo:</label><br>
            <input type="email" id="correo" name="correo" value="<?php echo $usuario['correo']; ?>"><br>
            <label for="contraseña">Contraseña:</label><br>
            <input type="password" id="contraseña" name="contraseña" value="<?php echo $usuario['contraseña']; ?>"><br>
            <label for="fecha_nacimiento">Fecha de Nacimiento:</label><br>
            <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="<?php echo $usuario['fecha_nacimiento']; ?>"><br>
            <label for="direccion">Dirección:</label><br>
            <input type="text" id="direccion" name="direccion" value="<?php echo $usuario['direccion']; ?>"><br><br>
            <input type="submit" value="Actualizar Perfil">
        </form>
        <form action="cerrar_sesion.php" method="post">
            <input type="submit" value="Cerrar Sesión">
        </form>
    </main>
    <footer>
        <p>© 2024 The Gualda Company</p>
    </footer>
</body>
</html>
