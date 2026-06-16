-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-07-2025 a las 03:11:38
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
-- Estructura de tabla para la tabla `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_05_24_211337_create_noticias_table', 1),
(5, '2025_05_25_213353_modify_estado_length_in_noticias_table', 2),
(6, '2025_06_28_192327_create_servicios_table', 3),
(7, '2025_07_02_233608_create_servicio_user_table', 4);

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio_user`
--

CREATE TABLE `servicio_user` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `servicio_id` bigint(20) UNSIGNED NOT NULL,
  `fecha_adquisicion` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `servicio_user`
--

INSERT INTO `servicio_user` (`user_id`, `servicio_id`, `fecha_adquisicion`, `created_at`, `updated_at`) VALUES
(1, 1, '2025-07-02 23:56:12', '2025-07-03 02:56:12', '2025-07-03 02:56:12'),
(2, 2, '2025-07-02 23:56:12', '2025-07-03 02:56:12', '2025-07-03 02:56:12'),
(4, 1, '2025-07-02 23:56:12', '2025-07-03 02:56:12', '2025-07-03 02:56:12'),
(5, 1, '2025-07-03 00:16:36', '2025-07-03 03:16:36', '2025-07-03 03:16:36'),
(5, 4, '2025-07-03 00:16:45', '2025-07-03 03:16:45', '2025-07-03 03:16:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('EFd63OgdVsPTDw8fpAipsEEUs5CGfOcB0cGDdIVC', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoidzAyQUtlc2ZnMmJ4VlphakhFRVI3M1JhYkhDWFdsdTFLRDJ3NzVJUiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zZXJ2aWNpb3MvbGlzdGEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO3M6ODoiZmVlZGJhY2siO2E6MDp7fX0=', 1751566364),
('HU6amCdO1VtstkB3UQJRM7F08EpDCgpDul7YseYo', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiM0xRQTA3R2VHV3pRMjhxUGt2Sjl3bXUxN3ZHWmxzU0xBeFU2RDVUcSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6ODoiZmVlZGJhY2siO2E6MDp7fX0=', 1751591170),
('wl8wxAvo4zp9CcMEyrBPkrcqQfzy4e2A9PwQdlOw', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiakZTTHU2Zmt6VVRkU1dvMkx0dERERWVOWllKVWhGR3ZNN0p3TU9raCI7czo4OiJmZWVkYmFjayI7YTowOnt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7fQ==', 1751550535);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Test User', 'test@example.com', '2025-05-25 01:46:03', '$2y$12$dghFGeN6bMPrEGfh6NmI9e9VQLxWGtwezALdt9eBZjCARpRV1RPra', 'IH8U5NJomF', '2025-05-25 01:46:03', '2025-05-25 01:46:03'),
(2, 'Admin', 'admin@gmail.com', NULL, '$2y$12$dOx9foDZmo6dnVfApVx0c.YJzUyzNBzK2QiB7B65Ji4qPf9UfUeKK', NULL, '2025-05-26 06:37:53', '2025-05-26 06:37:53'),
(4, 'Brian', 'brian@gmail.com', NULL, '$2y$12$0NOwiec3yNWWjqIDL44uf.JaV9Anttwd82QXlp0GbLbLgY6krV5..', NULL, '2025-06-28 23:34:11', '2025-06-28 23:34:11'),
(5, 'Brian Gabriel Fernandez', 'briandrew@gmail.com', NULL, '$2y$12$tZoFltSh9LLyrCwu76/97uO7QcyGM/mknUImr9vF6zObq4U2S3ufm', NULL, '2025-07-03 03:16:17', '2025-07-03 03:16:17');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indices de la tabla `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `servicio_user`
--
ALTER TABLE `servicio_user`
  ADD PRIMARY KEY (`user_id`,`servicio_id`),
  ADD KEY `servicio_user_servicio_id_foreign` (`servicio_id`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `servicio_user`
--
ALTER TABLE `servicio_user`
  ADD CONSTRAINT `servicio_user_servicio_id_foreign` FOREIGN KEY (`servicio_id`) REFERENCES `servicios` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `servicio_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
