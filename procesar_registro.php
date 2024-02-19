<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado del Registro</title>
    <style>
        .center {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 100vh;
        }
        .block {
            margin: 20px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            text-align: center;
            background-color: #fff;
        }
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #e6bdac;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-image: url('1326364.png');
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>
<body>

<div class="center">
    <div class="block">

<?php
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

$sql_dni = "SELECT * FROM usuarios WHERE dni = '$dni'";
$resultado_dni = $conexion->query($sql_dni);

$sql_correo = "SELECT * FROM usuarios WHERE correo = '$correo'";
$resultado_correo = $conexion->query($sql_correo);

if ($resultado_dni->num_rows > 0) {
    echo "<div class='message-container error'>⚠️ Ya existe un usuario con este DNI. Prueba con otro / inicia sesión</div>";
} elseif ($resultado_correo->num_rows > 0) {
    echo "<div class='message-container error'>⚠️ Ese correo ya existe en nuestro servidor. Prueba con otro / inicia sesión.</div>";
} else {

    $sql = "INSERT INTO usuarios (nombre, apellidos, dni, correo, contraseña, fecha_nacimiento, direccion)
    VALUES ('$nombre', '$apellidos', '$dni', '$correo', '$contraseña', '$fecha_nacimiento', '$direccion')";

    if ($conexion->query($sql) === TRUE) {
        echo "<div class='message-container success'>✅ ¡Bienvenido! ¿Preparado para leer en la mejor librería?</div>";
    } else {
        echo "<div class='message-container error'>Error: " . $sql . "<br>" . $conexion->error . "</div>";
    }
}
$conexion->close();
?>

    </div>
    <div class="block">
        <a href="login.html">Iniciar sesión</a>
    </div>
</div>

</body>
</html>
