-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-07-2025 a las 03:12:19
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
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `resumen` text NOT NULL,
  `contenido` longtext NOT NULL,
  `autor` varchar(255) NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `categoria` varchar(255) DEFAULT NULL,
  `estado` enum('publicado','borrador') NOT NULL DEFAULT 'publicado',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`id`, `titulo`, `resumen`, `contenido`, `autor`, `imagen`, `categoria`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'La inteligencia artificial revolucionará la medicina en 2025', 'Expertos predicen que la IA permitirá diagnósticos más precisos y tratamientos personalizados en el próximo año.', 'La inteligencia artificial está marcando un antes y un después en la historia de la tecnología médica. Herramientas como AlphaFold han permitido avances en biología molecular y el diseño de nuevos fármacos. En 2025, se espera que la IA sea fundamental para diagnósticos médicos y la personalización de tratamientos, siempre con el humano en el centro de la decisión.', 'Francisco Herrera Triguero', NULL, 'Salud e IA', 'publicado', '2025-05-26 06:13:16', '2025-05-26 06:13:16'),
(2, 'Meta lanza Llama 3: el modelo de IA que arrasa en benchmarks', 'Meta presenta Llama 3, un modelo de IA de código abierto que supera a sus competidores en velocidad y eficiencia.', 'Meta ha lanzado Llama 3 en versiones de 8 y 70 mil millones de parámetros, logrando un rendimiento superior a modelos como Gemini y Mistral. Llama 3 es accesible en plataformas como Messenger, WhatsApp e Instagram, y representa un avance clave en la democratización de la IA.', 'Javier Ruiz', NULL, 'Tecnología', 'publicado', '2025-05-26 06:13:16', '2025-05-26 06:13:16'),
(3, 'Google Workspace integra IA para crear videos y automatizar tareas', 'Google presenta nuevas funciones de IA en Workspace, incluyendo Google Vids y agentes personalizados para empresas.', 'Google Workspace incorpora Google Vids, una herramienta que permite crear videos a partir de documentos y diapositivas, además de nuevas funciones de IA para automatizar tareas y mejorar la productividad. Estas innovaciones buscan facilitar la vida laboral y aumentar la eficiencia en empresas de todo el mundo.', 'Redacción El País', 'noticias/yn3oJkWkQzV5YPN2uJWzVzTNTs1qKfwfaUussZbR.png', 'Automatización', 'publicado', '2025-05-26 06:13:16', '2025-07-03 02:21:13'),
(4, 'Desarrollan técnica para reducir el sesgo social en sistemas de IA', 'Investigadores de Oregon State University y Adobe crean FairDeDup, una técnica para entrenar IA de forma más justa.', 'FairDeDup es una nueva técnica de deduplicación de datos que permite entrenar sistemas de inteligencia artificial reduciendo los sesgos sociales. El método, presentado en la IEEE/CVF Conference on Computer Vision and Pattern Recognition, busca que la IA sea más justa y representativa, abordando problemas de diversidad y equidad.', 'Steve Lundeberg', NULL, 'Ética y Sociedad', 'publicado', '2025-05-26 06:13:16', '2025-05-26 06:13:16'),
(5, 'OpenAI y Jony Ive se unen para crear dispositivos de IA', 'OpenAI adquiere la startup io, fundada por el diseñador del iPhone, para desarrollar nuevos productos de inteligencia artificial.', 'OpenAI ha comprado la empresa io, fundada por Jony Ive, el legendario diseñador del iPhone, por 6.500 millones de dólares. El objetivo es crear dispositivos innovadores que integren inteligencia artificial en la vida cotidiana, sumándose a la tendencia de grandes tecnológicas como Meta y Google.', 'Miguel Jiménez', NULL, 'Innovación', 'publicado', '2025-05-26 06:13:16', '2025-05-26 06:13:16');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
