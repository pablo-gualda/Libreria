<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tienda de Libros Gualda</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body>
    <header>
        <h1>Tienda de Libros Gualda</h1>
    </header>
    <?php
        if (isset($_SESSION['usuario'])) {
            echo "<p>‎ ‎ ‎ ‎ ¡Bienvenido de nuevo, " . $_SESSION['nombre'] . "!";
            echo "<a href='cerrar_sesion.php' style='color: red; margin-left: 10px;'>Cerrar Sesión</a></p>";
        }
    ?>
    <nav>
        <a href="index.html">Inicio🏠</a>
        <a href="registro.html">⬆️Registrarse</a>
        <a href="login.html">✅Iniciar Sesión</a>
        <a href="catalogo.php">📚Catálogo de Libros</a>
        <a href="crear_tablas.php" target="_blank">👉Crear Base de Datos y Tablas👈</a>
        <a href="consultas.php">Consultas SQL⚙️🔧</a>
        <a href="carrito.php" style="float: right;">Ver Carro🛒</a>
        <a href="perfil.php" style="float: right;">Perfil👤</a>
    </nav>
    <main>
        <div class="grid-container">
            <div class="grid-item left">
                <h2>Presentación de nuestra tienda</h2>
                <p>Bienvenido a la tienda de libros online más humilde de Internet.<br>Aquí puedes encontrar una amplia variedad de libros para todos los gustos. Navega por nuestro catálogo y descubre tu próxima lectura.</p>
                <p><strong>😡😡COMPRA COMPRA COMPRA COMPRA <u><mark>👇¿NO 👇VES👇 EL 👇GATO?</mark></u>COMPRA COMPRA COMPRA</strong></p>
                <img src="7775CED0-269F-475F-90DA-4670B6C8921A.jpeg" width="700" height="500">
            </div>
            <div class="grid-item right">
                <h2>Búsqueda de libros</h2>
                <form action="buscar.php" method="get">
                    <input type="text" name="query" placeholder="Título, autor o categoría">
                    <input type="submit" value="Buscar">
                </form>
            </div>
        </div>
    </main>
    <footer>
        <p>© 2024 The Gualda Company</p>
    </footer>
</body>
</html>
