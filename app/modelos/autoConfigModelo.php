<?php
require_once __DIR__ . '/../../config.php'; 

class Model {
    protected $db;

    public function __construct() {
        $this->db = new PDO(
            "mysql:host=".MYSQL_HOST .
            ";dbname=".MYSQL_DB.";charset=utf8",
            MYSQL_USER, MYSQL_PASS
        );
        $this->_deploy();
    }

    private function _deploy() {
        $query = $this->db->query('SHOW TABLES');
        $tables = $query->fetchAll();
        
        if(count($tables) == 0) {
            $sql =<<<END
            -- phpMyAdmin SQL Dump
            -- version 5.2.1
            -- https://www.phpmyadmin.net/
            
            SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
            START TRANSACTION;
            SET time_zone = "+00:00";

            -- Estructura de tabla para la tabla `administradores`
            CREATE TABLE `administradores` (
              `id_admin` int(11) NOT NULL,
              `nombre` varchar(50) NOT NULL,
              `correo` varchar(100) NOT NULL,
              `contrasenia` varchar(255) NOT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

            -- Volcado de datos para la tabla `administradores`
            INSERT INTO `administradores` (`id_admin`, `nombre`, `correo`, `contrasenia`) VALUES
            (1, 'webadmin', 'admin@gmail.com', 'admin');

            -- Estructura de tabla para la tabla `clientes`
            CREATE TABLE `clientes` (
              `id_cliente` int(11) NOT NULL,
              `nombre` varchar(100) NOT NULL,
              `ciudad` varchar(100) NOT NULL,
              `direccion` varchar(100) NOT NULL,
              `2dadireccion` varchar(100) DEFAULT NULL,
              `telefono` varchar(20) NOT NULL,
              `email` varchar(100) NOT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

            -- Volcado de datos para la tabla `clientes`
            INSERT INTO `clientes` (`id_cliente`, `nombre`, `ciudad`, `direccion`, `2dadireccion`, `telefono`, `email`) VALUES
            (4, 'Juan Pérez', 'Tandil', 'Calle Falsa 123', NULL, '2494123456', 'juan.perez@email.com'),
            (5, 'María Gómez', 'Mar del Plata', 'Av. Colón 456', 'Piso 2, Depto B', '2234987654', 'maria.g@email.com'),
            (6, 'Muebles San Martín S.A.', 'Buenos Aires', 'Av. Corrientes 1000', 'Galpón 4', '1145678901', 'logistica@sanmartin.com.ar'),
            (7, 'Distribuidora El Sol', 'Rosario', 'Bv. Oroño 234', NULL, '3415678912', 'envios@elsol.com'),
            (101, 'Juan Pérez', 'Tandil', 'Calle Falsa 123', NULL, '2494123456', 'juan.perez@email.com'),
            (102, 'María Gómez', 'Mar del Plata', 'Av. Colón 456', 'Piso 2, Depto B', '2234987654', 'maria.g@email.com'),
            (103, 'Muebles San Martín S.A.', 'Buenos Aires', 'Av. Corrientes 1000', 'Galpón 4', '1145678901', 'logistica@sanmartin.com.ar'),
            (104, 'Distribuidora El Sol', 'Rosario', 'Bv. Oroño 234', NULL, '3415678912', 'envios@elsol.com');

            -- Estructura de tabla para la tabla `pedidos`
            CREATE TABLE `pedidos` (
              `id_pedido` int(11) NOT NULL,
              `estado` enum('Pendiente','En transito','Enviado') NOT NULL DEFAULT 'Pendiente',
              `origen` varchar(100) NOT NULL,
              `destino` varchar(100) NOT NULL,
              `fechaentrega` date NOT NULL,
              `precio` int(11) NOT NULL,
              `id_cliente` int(11) NOT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

            -- Volcado de datos para la tabla `pedidos`
            INSERT INTO `pedidos` (`id_pedido`, `estado`, `origen`, `destino`, `fechaentrega`, `precio`, `id_cliente`) VALUES
            (10, 'Pendiente', 'Mar del Plata', 'Miramar', '2026-05-25', 8500, 102),
            (11, 'En transito', 'Buenos Aires', 'Córdoba', '2026-05-22', 120000, 103),
            (12, 'Pendiente', 'Rosario', 'Mendoza', '2026-06-05', 350000, 104),
            (13, 'En transito', 'Tandil', 'Buenos Aires', '2026-05-21', 85000, 101);

            -- Indices de la tabla `administradores`
            ALTER TABLE `administradores`
              ADD PRIMARY KEY (`id_admin`);

            -- Indices de la tabla `clientes`
            ALTER TABLE `clientes`
              ADD PRIMARY KEY (`id_cliente`);

            -- Indices de la tabla `pedidos`
            ALTER TABLE `pedidos`
              ADD PRIMARY KEY (`id_pedido`),
              ADD KEY `id_cliente` (`id_cliente`);

            -- AUTO_INCREMENT de la tabla `administradores`
            ALTER TABLE `administradores`
              MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

            -- AUTO_INCREMENT de la tabla `clientes`
            ALTER TABLE `clientes`
              MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

            -- AUTO_INCREMENT de la tabla `pedidos`
            ALTER TABLE `pedidos`
              MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

            -- Filtros para la tabla `pedidos`
            ALTER TABLE `pedidos`
              ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`);
              
            COMMIT;
END;
            $this->db->query($sql);
        }
    }
}