<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Catálogo - Tienda de Libros Gualda</title>
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
        <h2>Catálogo de Libros</h2>
        <div class="catalogo">
            <?php
            $servername = "localhost";
            $username = "administrador";
            $password = "qwe_123";
            $dbname = "tienda_libros";

            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT isbn, titulo, autor, categoria, precio FROM libros";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                echo "<div class='libro'>";
                echo "<h3>" . $row["titulo"]. "</h3>";
                echo "<p>Autor: <a href='buscar.php?query=" . urlencode($row["autor"]) . "'>" . $row["autor"]. "</a></p>";
                echo "<p>Categoría: <a href='buscar.php?query=" . urlencode($row["categoria"]) . "'>" . $row["categoria"]. "</a></p>";
                echo "<p>ISBN: " . $row["isbn"]. "</p>";
                echo "<p>Precio: " . $row["precio"]. "</p>";
                echo '<form action="añadir_a_la_cesta.php" method="post">
                        <input type="hidden" name="isbn" value="' . $row["isbn"] . '">
                        <input type="submit" value="Añadir a la cesta">
                      </form>';
                echo "</div>";
              }
            } else {
              echo "0 resultados";
            }
            $conn->close();
            ?>
        </div>
    </main>
    <footer>
        <p>© 2024 The Gualda Company</p>
    </footer>
</body>
</html>
