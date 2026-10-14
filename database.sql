-- ===================================================
-- SCRIPT DE BASE DE DATOS - CRUD PHP (MVC + DAO)
-- ===================================================

-- 1. BASE DE DATOS Y TABLA DE LA ASIGNACIÓN (PARQUEO / AUTO)
CREATE DATABASE IF NOT EXISTS parqueo CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE parqueo;

CREATE TABLE IF NOT EXISTS auto (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    placa VARCHAR(20) NOT NULL,
    color VARCHAR(50) NOT NULL,
    modelo VARCHAR(100) NOT NULL,
    tipoauto VARCHAR(50) NOT NULL,
    fotografia VARCHAR(255) DEFAULT ''
);

INSERT INTO auto (placa, color, modelo, tipoauto, fotografia) VALUES
('ABC-123', 'Rojo Carmesí', 'Toyota Corolla 2024', 'Sedán', 'https://images.unsplash.com/photo-1621007947382-bb3c3994e3fb?w=400'),
('XYZ-789', 'Negro Metalizado', 'Ford Explorer 2023', 'SUV', 'https://images.unsplash.com/photo-1533473359331-0135ef1b58bf?w=400'),
('MNP-456', 'Blanco Perla', 'Nissan Navara 2022', 'Camioneta', 'https://images.unsplash.com/photo-1559416523-140ddc3d238c?w=400');

-- 2. BASE DE DATOS Y TABLA DE LA GUÍA (TIENDA1 / PRODUCTO)
CREATE DATABASE IF NOT EXISTS tienda1 CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE tienda1;

CREATE TABLE IF NOT EXISTS producto (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    precio DOUBLE NOT NULL,
    stock INT(11) NOT NULL
);

INSERT INTO producto (nombre, precio, stock) VALUES
('Teclado Mecánico RGB', 49.99, 15),
('Mouse Inalámbrico Ergonómico', 24.50, 30),
('Monitor Gamer 27 pulgadas 165Hz', 219.00, 8);
