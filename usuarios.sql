CREATE TABLE usuarios (
    nombre VARCHAR(255),
    apellidos VARCHAR(255),
    dni VARCHAR(9) PRIMARY KEY ,
    correo VARCHAR(255),
    contraseña VARCHAR(255),
    fecha_nacimiento date,
    direccion VARCHAR(255)
);
