<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado de la búsqueda</title>
    <link rel="stylesheet" href="estilos.css">
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
<?php
$query = $_GET['query'];

$conexion = new mysqli('localhost', 'administrador', 'qwe_123', 'tienda_libros');
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

$sql = "SELECT * FROM libros WHERE titulo LIKE '%$query%' OR autor LIKE '%$query%' OR categoria LIKE '%$query%'";
$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {
    echo "<div class='catalogo'>";
    while($libro = $resultado->fetch_assoc()) {
        echo "<div class='libro'>";
        echo "<h3>" . $libro['titulo'] . "</h3>";
        echo "<p>Autor: <a href='buscar.php?query=" . urlencode($libro['autor']) . "'>" . $libro['autor'] . "</a></p>";
        echo "<p>Categoría: <a href='buscar.php?query=" . urlencode($libro['categoria']) . "'>" . $libro['categoria'] . "</a></p>";
        echo "<p>ISBN: " . $libro['isbn'] . "</p>";
        echo "<p>Precio: " . $libro['precio'] . "</p>";
        echo '<form action="añadir_a_la_cesta.php" method="post">
                <input type="hidden" name="isbn" value="' . $libro["isbn"] . '">
                <input type="submit" value="Añadir a la cesta">
              </form>';
        echo "</div>";
    }
    echo "</div>";
} else {
    echo "<p>No se encontraron libros que coincidan con tu búsqueda.</p>";
}

$conexion->close();
?>
</body>
</html>
