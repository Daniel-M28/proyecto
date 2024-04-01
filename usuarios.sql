-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-04-2024 a las 17:26:30
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
-- Base de datos: `usuarios`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `cedula` varchar(255) NOT NULL,
  `fecha` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`id`, `nombre`, `cedula`, `fecha`, `created_at`, `updated_at`, `user_id`) VALUES
(93, 'daniel murillo lopera', '1152478966', '2024-04-01 10:00:00', '2024-04-01 18:46:31', '2024-04-01 18:51:43', 2),
(94, 'daniel murillo lopera', '1152478966', '2024-04-02 12:00:00', '2024-04-01 18:50:40', '2024-04-01 18:50:40', 2),
(95, 'administrador', '1152478966', '2024-04-01 11:00:00', '2024-04-01 20:14:54', '2024-04-01 20:14:54', 1),
(96, 'administrador', '1152478966', '2024-04-01 14:00:00', '2024-04-01 20:16:15', '2024-04-01 20:16:15', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE `facturas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userName` varchar(255) NOT NULL,
  `idFactura` int(11) NOT NULL,
  `rutaFactura` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
-- Estructura de tabla para la tabla `inventarios`
--

CREATE TABLE `inventarios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `existencias` varchar(255) NOT NULL,
  `entradas` varchar(255) NOT NULL,
  `salidas` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `producto_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `inventarios`
--

INSERT INTO `inventarios` (`id`, `existencias`, `entradas`, `salidas`, `created_at`, `updated_at`, `producto_id`) VALUES
(3, '200', '10', '0', '2024-03-19 19:02:32', '2024-03-19 19:02:32', 3),
(4, '120', '10', '10', '2024-03-19 19:02:42', '2024-03-26 01:08:58', 4),
(5, '160', '150', '10', '2024-03-19 19:02:55', '2024-03-19 19:02:55', 5),
(6, '500', '160', '20', '2024-03-19 19:03:06', '2024-03-19 19:03:06', 6),
(7, '300', '10', '0', '2024-03-19 19:03:19', '2024-03-19 19:03:19', 7),
(8, '250', '50', '20', '2024-03-19 19:03:30', '2024-03-19 19:03:30', 8),
(9, '100', '20', '10', '2024-03-19 19:03:42', '2024-03-19 19:03:42', 9),
(10, '420', '20', '0', '2024-03-19 19:03:53', '2024-03-19 19:03:53', 10),
(11, '350', '20', '10', '2024-03-19 19:04:10', '2024-03-19 19:04:10', 11),
(12, '240', '30', '5', '2024-03-19 19:04:22', '2024-03-19 19:04:22', 12),
(13, '50', '0', '2', '2024-03-19 19:04:35', '2024-03-19 19:04:35', 13),
(14, '350', '60', '10', '2024-03-19 19:04:47', '2024-03-19 19:04:47', 14),
(15, '190', '20', '10', '2024-03-19 19:05:00', '2024-03-19 19:05:00', 15),
(16, '260', '12', '30', '2024-03-19 19:05:11', '2024-03-19 19:05:11', 16),
(17, '160', '20', '20', '2024-03-19 19:15:08', '2024-03-19 19:15:08', 17),
(18, '140', '10', '0', '2024-03-19 19:15:20', '2024-03-19 19:15:20', 18),
(19, '60', '20', '0', '2024-03-19 19:15:35', '2024-03-19 19:15:35', 20),
(20, '40', '20', '0', '2024-03-19 19:15:52', '2024-03-19 19:15:52', 22),
(21, '30', '0', '0', '2024-03-19 19:16:06', '2024-03-19 19:16:06', 23),
(22, '60', '5', '0', '2024-03-19 19:16:30', '2024-03-19 19:16:30', 24),
(23, '40', '40', '0', '2024-03-19 19:16:58', '2024-03-19 19:16:58', 25),
(24, '100', '20', '50', '2024-03-19 19:17:09', '2024-03-19 19:17:09', 26),
(25, '125', '30', '5', '2024-03-19 19:17:22', '2024-03-19 19:17:22', 27),
(26, '90', '20', '10', '2024-03-19 19:17:31', '2024-03-19 19:17:31', 28),
(27, '40', '20', '5', '2024-03-19 19:17:42', '2024-03-19 19:17:42', 29),
(28, '40', '20', '3', '2024-03-19 19:17:53', '2024-03-19 19:17:53', 30),
(29, '100', '50', '4', '2024-03-19 19:18:16', '2024-03-19 19:18:16', 31),
(30, '135', '20', '8', '2024-03-19 19:18:28', '2024-03-19 19:18:28', 32),
(31, '320', '25', '42', '2024-03-19 19:18:40', '2024-03-19 19:18:40', 33),
(32, '140', '25', '41', '2024-03-19 19:18:52', '2024-03-19 19:18:52', 34),
(33, '135', '22', '2', '2024-03-19 19:19:04', '2024-03-19 19:19:04', 35),
(34, '120', '12', '36', '2024-03-19 19:20:37', '2024-03-19 19:20:37', 19),
(36, '150', '20', '5', '2024-03-25 08:11:46', '2024-03-25 08:11:46', 21),
(37, '200', '10', '5', '2024-03-26 01:08:47', '2024-03-26 01:08:47', 1),
(39, '150', '150', '5', '2024-04-01 20:01:06', '2024-04-01 20:01:06', 2);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_09_24_222231_inventarios', 1),
(7, '2023_09_25_145613_citas', 1),
(8, '2023_10_25_164357_usuarios', 1),
(9, '2023_11_03_173525_cambiar_propiedades_to_citas_table copy', 1),
(10, '2023_11_03_173525_cambiar_propiedades_to_citas_usuarios_table', 1),
(11, '2023_11_07_120502_create_permission_tables', 1),
(12, '2023_11_10_204903_add_user_id_to_citas', 1),
(13, '2024_03_07_212230_create_productos_table', 1),
(14, '2024_03_09_204430_add_existencias_to_productos_table', 1),
(15, '2024_03_09_205637_add_producto_id_to_inventarios_table', 1),
(16, '2024_03_12_132357_remove_producto_from_inventarios_table', 1),
(17, '2024_03_12_134801_remove_codigo_from_inventarios_table', 1),
(18, '2024_03_14_013726_prueba', 1),
(19, '2024_03_18_172413_cambiar_fecha', 2),
(20, '2024_03_18_234730_editar_usuarios', 3),
(21, '2024_03_19_000429_cambiar_propiedades_usuario', 4),
(22, '2024_03_19_001143_telefono_users', 5),
(23, '2024_03_22_194834_create_facturas_table', 6),
(24, '2024_03_25_002854_modificar_telefono_usuarios', 7),
(25, '2024_03_27_145316_create_facturas_table', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('danielmurillo82@hotmail.com', '$2y$10$DhInG5XNiK66.sm28vw/weMf/WYnCBiI.WklgBWXlSBvpshO2oRzm', '2024-03-28 02:27:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'usuario.index', 'web', '2024-03-14 06:41:57', '2024-03-14 06:41:57'),
(2, 'usuario.create', 'web', '2024-03-14 06:41:57', '2024-03-14 06:41:57'),
(3, 'usuario.edit', 'web', '2024-03-14 06:41:57', '2024-03-14 06:41:57'),
(4, 'usuario.destroy', 'web', '2024-03-14 06:41:57', '2024-03-14 06:41:57'),
(5, 'citas.index', 'web', '2024-03-14 06:41:58', '2024-03-14 06:41:58'),
(6, 'citas.create', 'web', '2024-03-14 06:41:58', '2024-03-14 06:41:58'),
(7, 'citas.edit', 'web', '2024-03-14 06:41:58', '2024-03-14 06:41:58'),
(8, 'citas.destroy', 'web', '2024-03-14 06:41:58', '2024-03-14 06:41:58'),
(9, 'inventario.index', 'web', '2024-03-14 06:41:58', '2024-03-14 06:41:58'),
(10, 'inventario.create', 'web', '2024-03-14 06:41:58', '2024-03-14 06:41:58'),
(11, 'inventario.edit', 'web', '2024-03-14 06:41:58', '2024-03-14 06:41:58'),
(12, 'inventario.destroy', 'web', '2024-03-14 06:41:58', '2024-03-14 06:41:58'),
(13, 'ver-pdf', 'web', '2024-03-14 06:41:58', '2024-03-14 06:41:58'),
(14, 'descargar-pdf', 'web', '2024-03-14 06:41:58', '2024-03-14 06:41:58'),
(15, 'eliminar-pdf', 'web', '2024-03-14 06:41:58', '2024-03-14 06:41:58'),
(16, 'cargar-pdf', 'web', '2024-03-14 06:41:59', '2024-03-14 06:41:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `existencias` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `titulo`, `precio`, `created_at`, `updated_at`, `existencias`) VALUES
(1, 'Dolex gripa', 4500.00, NULL, '2024-03-26 01:08:47', 200),
(2, 'Amoxicilina', 3500.00, NULL, '2024-04-01 20:01:06', 150),
(3, 'Trimebutina', 5000.00, NULL, '2024-03-23 05:19:19', 200),
(4, 'Dolex', 2000.00, NULL, '2024-03-26 01:08:58', 120),
(5, 'Ibuprofeno', 3000.00, NULL, '2024-03-23 05:19:35', 160),
(6, 'Naproxeno', 6000.00, NULL, '2024-03-23 05:19:42', 500),
(7, 'Hidrocodona', 4000.00, NULL, '2024-03-23 05:19:46', 300),
(8, 'Diclofenaco', 8500.00, NULL, '2024-03-23 05:19:53', 250),
(9, 'Meloxican', 5000.00, NULL, '2024-03-23 05:19:57', 100),
(10, 'Dolex gripa', 2500.00, NULL, '2024-03-23 05:20:01', 420),
(11, 'Noraver', 4000.00, NULL, '2024-03-23 05:20:18', 350),
(12, 'Agrifen', 3000.00, NULL, '2024-03-23 05:20:25', 240),
(13, 'Sudagrip', 2500.00, NULL, '2024-03-23 05:20:29', 50),
(14, 'Mieltertos', 7000.00, NULL, '2024-03-23 05:20:33', 350),
(15, 'Noraver-gripa', 4000.00, NULL, '2024-03-23 05:20:44', 190),
(16, 'Noraver-jarabe', 9000.00, NULL, '2024-03-23 05:20:48', 260),
(17, 'Condones Duo', 8000.00, NULL, '2024-03-23 05:20:54', 160),
(18, 'Condones Durex', 10000.00, NULL, '2024-03-23 05:21:12', 140),
(19, 'Condones Durex', 7000.00, NULL, '2024-03-23 05:24:15', 120),
(20, 'Test embarazo', 15000.00, NULL, '2024-03-23 05:21:17', 60),
(21, 'test embarazo', 12000.00, NULL, '2024-03-25 08:11:46', 150),
(22, 'Lubricante D', 15000.00, NULL, '2024-03-23 05:21:22', 40),
(23, 'Lubriderm R', 13000.00, NULL, '2024-03-23 05:21:55', 30),
(24, 'Lubriderm Mom', 10000.00, NULL, '2024-03-23 05:22:38', 60),
(25, 'Lubriderm S', 9000.00, NULL, '2024-03-23 05:22:44', 40),
(26, 'Cerave', 12000.00, NULL, '2024-03-23 05:22:49', 100),
(27, 'Facial 5', 18000.00, NULL, '2024-03-23 05:22:55', 125),
(28, 'Colgate ', 8000.00, NULL, '2024-03-23 05:23:23', 90),
(29, 'Fortident', 7000.00, NULL, '2024-03-23 05:23:30', 40),
(30, 'Seda dental ', 4000.00, NULL, '2024-03-23 05:23:13', 40),
(31, 'Shampoo 750ml ', 15000.00, NULL, '2024-03-23 05:23:45', 100),
(32, 'Shampoo 400ml', 10000.00, NULL, '2024-03-23 05:23:51', 135),
(33, 'Gillette x3', 8000.00, NULL, '2024-03-23 05:23:57', 320),
(34, 'Copitos MK', 4000.00, NULL, '2024-03-23 05:24:03', 140),
(35, 'Cepillo colgate ', 5000.00, NULL, '2024-03-23 05:24:09', 135);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2024-03-14 06:41:57', '2024-03-14 06:41:57'),
(2, 'usuario', 'web', '2024-03-14 06:41:57', '2024-03-14 06:41:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(5, 2),
(6, 1),
(6, 2),
(7, 1),
(7, 2),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(13, 2),
(14, 1),
(14, 2),
(15, 1),
(15, 2),
(16, 1),
(16, 2);

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `telefono` bigint(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `telefono`) VALUES
(1, 'administrador', 'usuario@admin.com', NULL, '$2y$10$dYQZalnX6NpG.DyQJDGWTuDAQB0Bab68jn5ZIyEawvCZKmrqSFIY6', NULL, '2024-03-14 06:41:59', '2024-03-14 06:41:59', NULL),
(2, 'daniel murillo lopera', 'danielmurillo82@hotmail.com', NULL, '$2y$10$87M2YrZ9C4liWGG5w8OVxuO/VJQs9hkDQ1AtdX.1u/OlmXJ0SZ/pK', NULL, '2024-03-14 19:56:25', '2024-03-14 19:56:25', NULL),
(3, 'mariana rodriguez', 'mariana@hotmail.com', NULL, '$2y$10$mMfhPvAkkK8ZfSRvTGNgYO.dBTb57hNyL4.nTCr5qiQm2N5QUTgMy', NULL, '2024-03-14 20:31:31', '2024-03-14 20:31:31', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `CorreoElectronico` varchar(255) NOT NULL,
  `Telefono` varchar(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `Nombre`, `CorreoElectronico`, `Telefono`, `created_at`, `updated_at`) VALUES
(7, 'daniel murillo lopera', 'danielmurillo82@hotmail.com', '3017690958', '2024-03-25 05:33:30', '2024-03-25 05:33:30');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `citas_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `inventarios`
--
ALTER TABLE `inventarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inventarios_producto_id_foreign` (`producto_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT de la tabla `facturas`
--
ALTER TABLE `facturas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inventarios`
--
ALTER TABLE `inventarios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `citas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `inventarios`
--
ALTER TABLE `inventarios`
  ADD CONSTRAINT `inventarios_producto_id_foreign` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`);

--
-- Filtros para la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
