<?php
/*
CREATE USER 'administrador'@'localhost' IDENTIFIED BY 'qwe_123';
GRANT ALL PRIVILEGES ON *.* TO 'administrador'@'localhost';
FLUSH PRIVILEGES;
*/

$servername = "localhost";
$username = "administrador";
$password = "qwe_123";
$dbname = "tienda_libros";

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}


$sql_create_db = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql_create_db) === TRUE) {
    echo "Base de datos creada correctamente.<br>";
} else {
    echo "Error al crear la base de datos: " . $conn->error . "<br>";
}

$conn->close();


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}


$sql_create_table_libros = "CREATE TABLE IF NOT EXISTS libros (
    isbn VARCHAR(255) PRIMARY KEY,
    titulo VARCHAR(255),
    autor VARCHAR(255),
    categoria VARCHAR(255),
    precio VARCHAR(255)
)";
if ($conn->query($sql_create_table_libros) === TRUE) {
    echo "Tabla 'libros' creada correctamente.<br>";
} else {
    echo "Error al crear la tabla 'libros': " . $conn->error . "<br>";
}

$sql_insert_libros = "INSERT INTO libros (isbn, titulo, autor, categoria, precio)
VALUES 
('978316484100', 'Don Quijote de la Mancha', 'Miguel de Cervantes', 'Novela', '19.99'),
('9781402894623', 'Cien años de soledad', 'Gabriel García Márquez', 'Novela', '24.99'),
('9780140449136', 'En busca del tiempo perdido', 'Marcel Proust', 'Novela', '29.99'),
('9788437604947', 'Ulises', 'James Joyce', 'Novela', '34.99'),
('9788420652067', 'La Odisea', 'Homero', 'Epopeya', '14.99'),
('9788420688436', 'Guerra y paz', 'León Tolstói', 'Novela', '39.99'),
('9788437606286', 'Moby-Dick', 'Herman Melville', 'Novela', '24.99'),
('9788420673887', 'Divina Comedia', 'Dante Alighieri', 'Poesía épica', '29.99'),
('9788420652050', 'La Ilíada', 'Homero', 'Epopeya', '14.99'),
('9788437604923', 'Madame Bovary', 'Gustave Flaubert', 'Novela', '19.99'),
('9788420689792', 'Crimen y castigo', 'Fiódor Dostoyevski', 'Novela', '24.99'),
('9788420689778', 'Anna Karénina', 'León Tolstói', 'Novela', '29.99'),
('9788420689785', 'Los hermanos Karamázov', 'Fiódor Dostoyevski', 'Novela', '34.99'),
('9788420652074', 'Las mil y una noches', 'Anónimo', 'Cuento', '14.99'),
('9788420652081', 'Las metamorfosis', 'Ovidio', 'Poesía épica', '19.99'),
('9788420689761', 'El idiota', 'Fiódor Dostoyevski', 'Novela', '24.99'),
('9788420689754', 'El jugador', 'Fiódor Dostoyevski', 'Novela', '29.99'),
('9788420652098', 'Eneida', 'Virgilio', 'Poesía épica', '34.99'),
('9788420689459', 'Dune', 'Frank Herbert', 'Ciencia Ficción', '39.99'),
('9788420684596', 'El Señor de los Anillos', 'J.R.R Tolkien', 'Fantasía', '44.99'),
('9788420452898', 'Como ligar como yo', 'Marcos Simón', 'Ciencia Ficción', '14.99'),
('9788420642012', 'Hitler, ¿tenía razón?', 'Brian Cutanda', 'Histórico', '19.99'),
('9788420645241', 'F1 y sus consecuencias en la sociedad', 'Alejandro Román', 'Filosofía', '24.99'),
('9788420612455', 'Aplaudir como forma de vida', 'Pablo Gualda', 'Autoayuda', '29.99'),
('9788420645201', 'Cuidar de nuestro cáñamo en el hogar', 'Francisco Romero', 'Jardinería', '34.99'),
('9788421143200', '11-S. La mayor mentira de los EUA', 'Andrés Moraga', 'Conspiraciones', '39.99'),
('9788420689045', 'El maestro y Margarita', 'Mijaíl Bulgákov', 'Novela', '44.99'),
('9788420689845', 'El ruido y la furia', 'William Faulkner', 'Novela', '49.99');";


if ($conn->query($sql_insert_libros) === TRUE) {
    echo "Libros insertados correctamente.<br>";
} else {
    echo "Error al insertar libros: " . $conn->error . "<br>";
}


$sql_create_table_usuarios = "CREATE TABLE IF NOT EXISTS usuarios (
    nombre VARCHAR(255),
    apellidos VARCHAR(255),
    dni VARCHAR(255) PRIMARY KEY,
    correo VARCHAR(255) UNIQUE,
    contraseña VARCHAR(255),
    fecha_nacimiento DATE,
    direccion VARCHAR(255)
)";
if ($conn->query($sql_create_table_usuarios) === TRUE) {
    echo "Tabla 'usuarios' creada correctamente.<br>";
} else {
    echo "Error al crear la tabla 'usuarios': " . $conn->error . "<br>";
}


$sql_create_table_cestas = "CREATE TABLE IF NOT EXISTS cestas (
    correo VARCHAR(255),
    isbn VARCHAR(255),
    FOREIGN KEY (correo) REFERENCES usuarios(correo),
    FOREIGN KEY (isbn) REFERENCES libros(isbn)
)";
if ($conn->query($sql_create_table_cestas) === TRUE) {
    echo "Tabla 'cestas' creada correctamente.<br>";
} else {
    echo "Error al crear la tabla 'cestas': " . $conn->error . "<br>";
}
$conn->close();
?>

