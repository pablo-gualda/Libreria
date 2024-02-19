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
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Carrito - Tienda de Libros Gualda</title>
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
        <h2>Carrito de Compras</h2>
        <div class="catalogo">
            <?php
            if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) > 0) {
                $total = 0;
                foreach ($_SESSION['carrito'] as $index => $isbn) {
                    $sql = "SELECT isbn, titulo, autor, categoria, precio FROM libros WHERE isbn = '$isbn'";
                    $result = $conexion->query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $total += $row["precio"];
                            echo "<div class='libro'>";
                            echo "<h3>" . $row["titulo"]. "</h3>";
                            echo "<p>Autor: " . $row["autor"]. "</p>";
                            echo "<p>Categoría: " . $row["categoria"]. "</p>";
                            echo "<p>ISBN: " . $row["isbn"]. "</p>";
                            echo "<p>Precio: " . $row["precio"]. "</p>";
                            echo '<form action="eliminar_de_la_cesta.php" method="post">
                                    <input type="hidden" name="index" value="' . $index . '">
                                    <input type="submit" value="Eliminar de la cesta" style="background-color: red;">
                                  </form>';
                            echo "</div>";
                        }
                    }
                }
                echo "<p>Total (IVA incluido): " . $total . "€</p>";
            } else {
                echo "<p>Tu carrito está vacío.</p>";
            }
            $conexion->close();
            ?>
        </div>
    </main>
    <footer>
        <p>© 2024 The Gualda Company</p>
    </footer>
</body>
</html>
