CREATE USER 'administrador'@'localhost' IDENTIFIED BY 'qwe_123';

GRANT ALL PRIVILEGES ON *.* TO 'administrador'@'localhost';

FLUSH PRIVILEGES;


CREATE TABLE libros (
    isbn VARCHAR(255) PRIMARY KEY,
    titulo VARCHAR(255),
    autor VARCHAR(255),
    categoria VARCHAR(255)
);



INSERT INTO libros (isbn, titulo, autor, categoria)
VALUES 
('978316484100', 'Don Quijote de la Mancha', 'Miguel de Cervantes', 'Novela'),
('9781402894623', 'Cien años de soledad', 'Gabriel García Márquez', 'Novela'),
('9780140449136', 'En busca del tiempo perdido', 'Marcel Proust', 'Novela'),
('9788437604947', 'Ulises', 'James Joyce', 'Novela'),
('9788420652067', 'La Odisea', 'Homero', 'Epopeya'),
('9788420688436', 'Guerra y paz', 'León Tolstói', 'Novela'),
('9788437606286', 'Moby-Dick', 'Herman Melville', 'Novela'),
('9788420673887', 'Divina Comedia', 'Dante Alighieri', 'Poesía épica'),
('9788420652050', 'La Ilíada', 'Homero', 'Epopeya'),
('9788437604923', 'Madame Bovary', 'Gustave Flaubert', 'Novela'),
('9788420689792', 'Crimen y castigo', 'Fiódor Dostoyevski', 'Novela'),
('9788420689778', 'Anna Karénina', 'León Tolstói', 'Novela'),
('9788420689785', 'Los hermanos Karamázov', 'Fiódor Dostoyevski', 'Novela'),
('9788420652074', 'Las mil y una noches', 'Anónimo', 'Cuento'),
('9788420652081', 'Las metamorfosis', 'Ovidio', 'Poesía épica'),
('9788420689761', 'El idiota', 'Fiódor Dostoyevski', 'Novela'),
('9788420689754', 'El jugador', 'Fiódor Dostoyevski', 'Novela'),
('9788420652098', 'Eneida', 'Virgilio', 'Poesía épica'),
('9788420689808', 'El maestro y Margarita', 'Mijaíl Bulgákov', 'Novela'),
('9788420689815', 'El ruido y la furia', 'William Faulkner', 'Novela');
