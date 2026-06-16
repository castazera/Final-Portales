-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-07-2025 a las 03:12:09
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `optifixagency_noticias`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `detalles` longtext NOT NULL,
  `categoria` varchar(255) NOT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `estado` enum('activo','inactivo') NOT NULL DEFAULT 'activo',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id`, `nombre`, `descripcion`, `detalles`, `categoria`, `precio`, `imagen`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'Desarrollo Web', 'Creamos sitios web modernos y responsivos', 'Ofrecemos desarrollo web completo incluyendo diseño, programación, testing y despliegue. Utilizamos las últimas tecnologías como React, Laravel, y Node.js para crear experiencias web excepcionales.', 'Desarrollo', 2500.00, 'servicios/Hf8OKK2NgMqJxr1vltcfRKV8xfGeHXk045ODn4gW.png', 'activo', '2025-06-28 22:33:26', '2025-07-03 02:21:31'),
(2, 'Aplicaciones Móviles', 'Desarrollo de apps nativas y multiplataforma', 'Especialistas en desarrollo de aplicaciones móviles para iOS y Android. Creamos apps nativas con Swift/Kotlin o multiplataforma con React Native y Flutter.', 'Desarrollo', 3500.00, NULL, 'activo', '2025-06-28 22:33:26', '2025-06-28 22:33:26'),
(4, 'Mantenimiento de Sistemas', 'Soporte técnico y mantenimiento continuo', 'Servicio de mantenimiento preventivo y correctivo para sistemas informáticos. Monitoreo 24/7, actualizaciones de seguridad y respaldos automáticos.', 'Soporte', 800.00, NULL, 'activo', '2025-06-28 22:33:26', '2025-06-28 22:33:26'),
(5, 'Diseño UX/UI', 'Diseño centrado en la experiencia del usuario', 'Creamos interfaces intuitivas y atractivas que mejoran la experiencia del usuario. Incluye investigación de usuarios, wireframes, prototipos y diseño visual.', 'Diseño', 1200.00, NULL, 'activo', '2025-06-28 22:33:26', '2025-06-28 22:33:26'),
(6, 'Diseño de interiores', 'Diseño para hogares y lugares cerrados.', 'Diseña como los mejores', 'Diseño', 2500.00, 'servicios/NNueIMbSrsZn9jmqGiGreeyAZJBqXjmR8SwbZZ4E.png', 'activo', '2025-07-03 16:06:48', '2025-07-03 16:06:48');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
