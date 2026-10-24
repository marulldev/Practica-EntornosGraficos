CREATE DATABASE IF NOT EXISTS Compras CHARACTER SET utf8mb4;
USE Compras;

CREATE TABLE IF NOT EXISTS catalogo (
  id INT AUTO_INCREMENT PRIMARY KEY,
  producto VARCHAR(100) NOT NULL,
  precio DECIMAL(9,2) NOT NULL
);

INSERT INTO catalogo (producto, precio) VALUES
('Teclado mecánico', 45999.90),
('Mouse inalámbrico', 18500.00),
('Monitor 24 pulgadas', 189999.99),
('Auriculares con micrófono', 32750.50),
('Pendrive 64 GB', 9800.00),
('Webcam HD', 27300.00);
