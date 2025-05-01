-- Eliminamos la base de datos si existe
DROP DATABASE IF EXISTS proyecto_ronal;

-- Creamos la base de datos y la usamos
CREATE DATABASE proyecto_ronal;
USE proyecto_ronal;

-- Eliminamos tablas si ya existen (en orden correcto)
DROP TABLE IF EXISTS usuario;
DROP TABLE IF EXISTS roles;

-- Creamos la tabla 'roles'
CREATE TABLE roles (
    rol_id INT PRIMARY KEY AUTO_INCREMENT,
    rol VARCHAR(50) NOT NULL,
    descripcion VARCHAR(255),
    creado_en TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    actualizado_en TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Insertamos datos en 'roles'
INSERT INTO roles (rol, descripcion) VALUES
("ADMINISTRADOR", "SE ENCARGA DE ADMINISTRAR LA PLATAFORMA"),
("EMPLEADO", "SE ENCARGA DE ATENDER A LOS CLIENTES"),
("LIMPIADOR", "SE ENCARGA DE MANTENER EL LUGAR LIMPIO");

-- Creamos la tabla 'usuario' (incluye 'rol_id' como clave foránea y la columna 'contraseña')
CREATE TABLE usuario (
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(50) NOT NULL,
    apellido VARCHAR(50) NOT NULL,
    telefono VARCHAR(20),
    email VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,  -- Columna para la contraseña
    fecha_de_ingreso TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    rol_id INT,
    FOREIGN KEY (rol_id) REFERENCES roles(rol_id)
        ON DELETE SET NULL
        ON UPDATE CASCADE
);

-- Insertamos datos en 'usuario'
INSERT INTO usuario (nombre, apellido, telefono, email, password, rol_id) VALUES
("R", "RODRIGUEZ", "718-17426", "r@gmail.com", "c1", 1),
("PAUL", "FUENTES", "718-17430", "paul@mail.com", "contraseña2", 2),
("ROBERTO", "GUTIERREZ", "715-74626", "roberto@mail.com", "contraseña3", 3);
