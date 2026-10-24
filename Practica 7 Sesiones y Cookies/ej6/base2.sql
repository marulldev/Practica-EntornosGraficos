CREATE DATABASE IF NOT EXISTS base2 CHARACTER SET utf8mb4;
USE base2;

CREATE TABLE IF NOT EXISTS alumnos (
  codigo INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(60) NOT NULL,
  codigocurso INT NOT NULL,
  mail VARCHAR(80) NOT NULL UNIQUE
);

INSERT INTO alumnos (nombre, codigocurso, mail) VALUES
('Lucía Fernández', 1, 'lucia@mail.com'),
('Martín Gómez', 1, 'martin@mail.com'),
('Sofía Pérez', 2, 'sofia@mail.com');
