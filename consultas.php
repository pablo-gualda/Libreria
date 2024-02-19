<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: login.html');
    exit();
}

$db = new PDO('mysql:host=localhost;dbname=tienda_libros;charset=utf8', 'administrador', 'qwe_123');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $orden = $_POST['orden'];

    $stmt = $db->query("SELECT * FROM libros ORDER BY precio $orden");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Consultas SQL</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body>
    <header>
        <h1>Consultas SQL</h1>
    </header>
    <main>
        <form action="consultas.php" method="post">
            <select name="orden">
                <option value="ASC">Precio ascendente</option>
                <option value="DESC">Precio descendente</option>
            </select>
            <input type="submit" value="Ejecutar">
        </form>
        <?php if (isset($results)): ?>
            <table>
                <?php foreach ($results as $row): ?>
                    <tr>
                        <?php foreach ($row as $column): ?>
                            <td><?php echo htmlspecialchars($column); ?></td>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </main>
</body>
</html>
