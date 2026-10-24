CREATE DATABASE IF NOT EXISTS prueba CHARACTER SET utf8mb4;
USE prueba;

CREATE TABLE IF NOT EXISTS buscador (
  canciones VARCHAR(100) NOT NULL
);

INSERT INTO buscador (canciones) VALUES
('Yesterday'),
('Imagine'),
('Hotel California'),
('Bohemian Rhapsody'),
('Stairway to Heaven'),
('Wonderwall'),
('De música ligera'),
('Persiana Americana'),
('Muchacha ojos de papel'),
('Flaca');
