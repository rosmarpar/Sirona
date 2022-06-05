-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 05-06-2022 a las 18:55:24
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `Sirona`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `description` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `category`
--

INSERT INTO `category` (`id`, `description`) VALUES
(1, 'Capsulas'),
(2, 'Jarabe'),
(3, 'Analgesicos'),
(4, 'Antiacidos'),
(5, 'Antialergicos'),
(6, 'Antiulcerosos'),
(7, 'Antidiarreicos'),
(8, 'Laxantes'),
(9, 'Antiinfecciosos'),
(10, 'Antiinflamatorios'),
(11, 'Antipireticos'),
(12, 'Antitusivos'),
(13, 'Mucoliticos'),
(14, 'Spray');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20220502173540', '2022-05-02 19:35:44', 198),
('DoctrineMigrations\\Version20220502173704', '2022-05-02 19:37:07', 34),
('DoctrineMigrations\\Version20220502173844', '2022-05-02 19:38:46', 39),
('DoctrineMigrations\\Version20220502174211', '2022-05-02 19:42:14', 82),
('DoctrineMigrations\\Version20220502174324', '2022-05-02 19:43:27', 154),
('DoctrineMigrations\\Version20220502180415', '2022-05-02 20:04:18', 112),
('DoctrineMigrations\\Version20220509181523', '2022-05-09 20:15:33', 94),
('DoctrineMigrations\\Version20220510160349', '2022-05-10 18:05:02', 121),
('DoctrineMigrations\\Version20220510161400', '2022-05-10 18:15:59', 34),
('DoctrineMigrations\\Version20220510161711', '2022-05-10 18:17:15', 71),
('DoctrineMigrations\\Version20220510170152', '2022-05-10 19:01:56', 33),
('DoctrineMigrations\\Version20220521171224', '2022-05-21 19:12:33', 119);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mailbox`
--

CREATE TABLE `mailbox` (
  `id` int(11) NOT NULL,
  `message` varchar(5000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `mailbox`
--

INSERT INTO `mailbox` (`id`, `message`, `date`, `title`) VALUES
(1, 'hola soy edu', '2022-05-10 18:18:11', 'fw4f4w'),
(2, 'akljdfhseuioalfhaweuiñFHJDOÑáeIJakljdfhseuioalfhaweuiñFHJDOÑáeIJakljdfhseuioalfhaweuiñFHJDOÑáeIJakljdfhseuioalfhaweuiñFHJDOÑáeIJakljdfhseuioalfhaweuiñFHJDOÑáeIJakljdfhseuioalfhaweuiñFHJDOÑáeIJakljdfhseuioalfhaweuiñFHJDOÑáeIJakljdfhseuioalfhaweuiñFHJDOÑáeIJakljdfhseuioalfhaweuiñFHJDOÑáeIJakljdfhseuioalfhaweuiñFHJDOÑáeIJakljdfhseuioalfhaweuiñFHJDOÑáeIJakljdfhseuioalfhaweuiñFHJDOÑáeIJakljdfhseuioalfhaweuiñFHJDOÑáeIJakljdfhseuioalfhaweuiñFHJDOÑáeIJakljdfhseuioalfhaweuiñFHJDOÑáeIJakljdfhseuioalfhaweuiñFHJDOÑáeIJakljdfhseuioalfhaweuiñFHJDOÑáeIJ', '2022-05-10 19:36:21', 'dwedwad'),
(3, 'akljdfhseuioalfhaweuiñFHJDOÑáeIJakljdfhseuioalfhaweuiñFHJDOÑáeIJakljdfhseuioalfhaweuiñFHJDOÑáeIJakljdfhseuioalfhaweuiñFHJDOÑáeIJakljdfhseuioalfhaweuiñFHJDOÑáeIJakljdfhseuioalfhaweuiñFHJDOÑáeIJakljdfhseuioalfhaweuiñFHJDOÑáeIJakljdfhseuioalfhaweuiñFHJDOÑáeIJakljdfhseuioalfhaweuiñFHJDOÑáeIJakljdfhseuioalfhaweuiñFHJDOÑáeIJakljdfhseuioalfhaweuiñFHJDOÑáeIJakljdfhseuioalfhaweuiñFHJDOÑáeIJakljdfhseuioalfhaweuiñFHJDOÑáeIJakljdfhseuioalfhaweuiñFHJDOÑáeIJakljdfhseuioalfhaweuiñFHJDOÑáeIJakljdfhseuioalfhaweuiñFHJDOÑáeIJakljdfhseuioalfhaweuiñFHJDOÑáeIJ', '2022-05-10 19:37:38', 'dwedwad'),
(4, 'hola caraculo', '2022-05-10 19:37:56', 'dwedwad'),
(5, 'hola caraculo', '2022-05-10 19:39:00', 'dwedwad'),
(6, 'han preguntado por otyro producto', '2022-05-11 11:50:06', 'envio otro mensaje'),
(7, 'han preguntado por otyro producto', '2022-05-11 11:51:50', 'envio otro mensaje'),
(8, 'xiqiiissss', '2022-05-11 11:52:37', 'te amo'),
(9, 'crc', '2022-05-12 20:28:03', 'fe'),
(10, 'awdwa', '2022-05-21 12:44:57', 'adfwd'),
(11, 'sfes', '2022-05-21 13:13:10', 'asfcs');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `payroll`
--

CREATE TABLE `payroll` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date` date NOT NULL,
  `salary` double NOT NULL,
  `file` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `payroll`
--

INSERT INTO `payroll` (`id`, `user_id`, `date`, `salary`, `file`) VALUES
(1, 3, '2022-05-02', 1000, 'nomina1-62937807caf29.jpg'),
(2, 3, '2022-05-02', 1000, 'nomina1-629378195d681.jpg'),
(27, 1, '2022-05-27', 1900, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `provider_id` int(11) DEFAULT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reference` int(100) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `description` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `product`
--

INSERT INTO `product` (`id`, `provider_id`, `name`, `reference`, `quantity`, `description`, `price`) VALUES
(1, NULL, 'ibuprofeno cinfa 600mg', 1005231054, 50, 'El ibuprofeno de venta libre se utiliza para reducir la fiebre y aliviar los dolores por de cefalea, dolor muscular, artritis, periodos menstruales, resfriado común, dolor de muelas y dolor de espalda', 1.2),
(2, NULL, 'paracetamol 1g', 234232342, 50, 'El paracetamol está indicado para la fiebre y el dolor. Este tipo de medicamento se utiliza para reducir la fiebre y aliviar el dolor.', 1.5),
(3, NULL, 'frenadol', 684612351, 60, 'Reduce la fiebre y alivia el dolor, dextrometorfano que es un antitusivo, clorfenamina que ayuda a reducir la secreción nasal y los estornudos', 1.33),
(6, NULL, 'BISOLVON MUCOLÍTICO 1,6 MG/ ML', 122323442, 20, 'Este medicamento está indicado para reducir la viscosidad de mocos y flemas, facilitando su expulsión, en resfriados y  gripes.', 2.3),
(7, NULL, 'orfidal 1 mg', 987897, 50, 'Es un tranquilizante-ansiolítico (evita el nerviosismo y la ansiedad) que actúa sin influenciar en las actividades normales del individuo.', 0.8),
(8, NULL, 'amoxicilina cinfa 500 mg', 68465465, 52, 'Es un antibiótico semisintético derivado de la penicilina. Se trata de una amino penicilina. Actúa contra un amplio espectro de bacterias, tanto Gram positivos como Gram-negativos.', 1.25);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product_category`
--

CREATE TABLE `product_category` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `product_category`
--

INSERT INTO `product_category` (`product_id`, `category_id`) VALUES
(8, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provider`
--

CREATE TABLE `provider` (
  `id` int(11) NOT NULL,
  `cif` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_enterprise` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `person_contact` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adress` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `provider`
--

INSERT INTO `provider` (`id`, `cif`, `name_enterprise`, `person_contact`, `email`, `adress`, `phone`) VALUES
(1, 'B65464452', 'deretil s.a.u', 'begoña martin', 'deretil@gmail.com', 'c/ barcelona n 25 valencia', '665 12 25 41'),
(2, 'b54654634', 'pharma s.l', 'andrés sanchez', 'pharma@gmail.com', 'c/ palau de la musica nº 101 valencia', '601 44 10 24'),
(3, 'b64465456', 'farmaquivir s.l', 'maria diez', 'farmaquivir@gmail.com', 'c/ fernando catolico nº 58 valencia', '610 58 65 10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adress` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `name`, `surname`, `adress`, `phone`, `photo`) VALUES
(1, 'admin@hotmail.com', '[\"ROLE_ADMIN\"]', '$2y$13$vwg2.A/8f/s.FHLiD7a2Ou6WtoouNE7gXhbw2vGHOQfsgw4Szeg42', 'Admin', 'Admin', 'Admin', 'Admin', '/tmp/phpwYODkO'),
(2, 'nuevousuario@gmail.com', '[\"ROLE_USER\"]', '$argon2id$v=19$m=65536,t=4,p=1$ibMRcGqFAwLa7eMo/vu6JQ$jIN5AzOA0ne9bvuWsAsN0BQhmcz4IBkU5TWiZHaT728', 'nuevo', 'usuario con apellido', 'c/ usuario nueva direccion', '96 111 22 22 33', NULL),
(3, 'paloma@gmail.com', '[\"ROLE_USER\"]', '$2y$13$/u1S0.sDe1exO5DDqBZB7eBkpiTh9pIvZrCcV8NimG4sE0TCV9LaK', 'paloma', 'garcia hoyos', 'C/ ribarroja n 16', '666 00 44 55', 'png-clipart-orange-and-white-logo-computer-icons-icon-design-person-person-miscellaneous-logo-6294d5208bdc5.png'),
(4, 'sergio@gmail.com', '[]', '$2y$13$QFB/n7xfxBvlN3P3Tbq3T.kVU6i..po531gIbx2KA9hFmcfJ6rO.S', 'sergio', 'saez sanchez', 'c/ ocho de julio nº 10 valencia', '661 00 55 44', NULL),
(5, 'jose@gmail.com', '[\"ROLE_USER\"]', '$argon2id$v=19$m=65536,t=4,p=1$czA3g1Us/eOqW3mWpdtgJQ$z0C0rTxWYiPux6ZjajJUxUcBdieOyZeaMfFbuX8k4ms', 'jose', 'miralles blanco', 'c/ garcia lorca 21 valencia', '961 52 03 41', NULL),
(7, 'prueba@hotmail.com', '[\"ROLE_USER\"]', '$argon2id$v=19$m=65536,t=4,p=1$JT6P/vLTEItQMCncTeeWaw$GPhKwJmdyyXNHJY5zRr2AAVGYYBlbbpgKrJlmCX5QZ8', 'prueba', 'prueba@hotmail.com', 'c/ pruebas', '1255', 'png-clipart-orange-and-white-logo-computer-icons-icon-design-person-person-miscellaneous-logo-6294d5208bdc5.png'),
(9, 'enrique@gmail.com', '[\"ROLE_USER\"]', '$argon2id$v=19$m=65536,t=4,p=1$KmmZLIO0LB+VU3vxcNvxxA$vpTrah62Nx5+JPQU+Yb9H7CykMBDrCxXk5yCIt8USDI', 'enrique', 'enrique', 'calle', '0000000ccc', 'young-brunette-woman-over-isolated-260nw-1668518491-62979f860fabe.webp'),
(11, 'carlos@gmail.com', '[]', '$2y$13$kFTTH8LfDBW6Cd3rp/dBW.MUvLBJVaZv88YTuHv12TaD1e2vOzNw.', 'carlos', 'jimenez sanchez', 'c/ alcaldia 6', '96 133 23 43', 'perfil3-629cdf0ad8d33.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_mailbox`
--

CREATE TABLE `user_mailbox` (
  `user_id` int(11) NOT NULL,
  `mailbox_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indices de la tabla `mailbox`
--
ALTER TABLE `mailbox`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `payroll`
--
ALTER TABLE `payroll`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_499FBCC6A76ED395` (`user_id`);

--
-- Indices de la tabla `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_D34A04ADA53A8AA` (`provider_id`);

--
-- Indices de la tabla `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`product_id`,`category_id`),
  ADD KEY `IDX_CDFC73564584665A` (`product_id`),
  ADD KEY `IDX_CDFC735612469DE2` (`category_id`);

--
-- Indices de la tabla `provider`
--
ALTER TABLE `provider`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`) USING BTREE;

--
-- Indices de la tabla `user_mailbox`
--
ALTER TABLE `user_mailbox`
  ADD PRIMARY KEY (`user_id`,`mailbox_id`),
  ADD KEY `IDX_FE92FC01A76ED395` (`user_id`),
  ADD KEY `IDX_FE92FC0166EC35CC` (`mailbox_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `mailbox`
--
ALTER TABLE `mailbox`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `payroll`
--
ALTER TABLE `payroll`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `provider`
--
ALTER TABLE `provider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `payroll`
--
ALTER TABLE `payroll`
  ADD CONSTRAINT `FK_499FBCC6A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Filtros para la tabla `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_D34A04ADA53A8AA` FOREIGN KEY (`provider_id`) REFERENCES `provider` (`id`);

--
-- Filtros para la tabla `product_category`
--
ALTER TABLE `product_category`
  ADD CONSTRAINT `FK_CDFC735612469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_CDFC73564584665A` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `user_mailbox`
--
ALTER TABLE `user_mailbox`
  ADD CONSTRAINT `FK_FE92FC0166EC35CC` FOREIGN KEY (`mailbox_id`) REFERENCES `mailbox` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_FE92FC01A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
