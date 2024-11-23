-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-11-2024 a las 00:14:30
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `rest_api_demo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacts`
--

CREATE TABLE `contacts` (
  `contact_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `contacts`
--

INSERT INTO `contacts` (`contact_id`, `name`, `email`, `message`, `created`) VALUES
(1, 'Pedro', 'pedro@gmail.com', 'Quisiera saber más sobre la cámara Canon EOS 1500D.', '2024-11-18 10:00:00'),
(2, 'María', 'maria@gmail.com', 'Estoy interesada en las zapatillas Nike Air Max, ¿tienen talla 38?', '2024-11-18 10:30:00'),
(3, 'Juan', 'juan@gmail.com', '¿El smartwatch Samsung Galaxy Watch 6 es compatible con Android?', '2024-11-18 11:00:00'),
(4, 'Carla', 'carla@gmail.com', 'Me gustaría saber el precio de la lámpara LED regulable.', '2024-11-18 11:30:00'),
(5, 'Jorge', 'jorge@gmail.com', '¿Venden el vino Rioja por botellas individuales?', '2024-11-18 12:00:00'),
(6, 'Laura', 'laura@gmail.com', '¿Puedo pedir la mochila de senderismo online?', '2024-11-18 12:30:00'),
(7, 'Ana', 'ana@gmail.com', 'Quiero comprar la cámara Canon EOS 1500D, ¿cómo hago el pago?', '2024-11-18 13:00:00'),
(8, 'Luis', 'luis@gmail.com', '¿Es posible recibir el perfume Dior Sauvage en 48 horas?', '2024-11-18 13:30:00'),
(9, 'Pablo', 'pablo@gmail.com', '¿Tienen descuento en la tableta Samsung Galaxy Tab A8 para estudiantes?', '2024-11-18 14:00:00'),
(10, 'Elena', 'elena@gmail.com', '¿El cargador rápido funciona con todos los modelos de iPhone?', '2024-11-18 14:30:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `items`
--

INSERT INTO `items` (`id`, `name`, `description`, `price`, `category_id`, `created`, `modified`) VALUES
(1, 'Café Orgánico', 'Café de grano 100% orgánico, ideal para comenzar el día con energía', 35, 1, '2024-11-18 10:00:00', '2024-11-18 10:00:00'),
(2, 'Zapatillas Nike Air Max', 'Zapatillas deportivas Nike Air Max, con tecnología Air para máxima comodidad', 120, 2, '2024-11-18 10:30:00', '2024-11-18 10:30:00'),
(3, 'Camisa de Cuello Mao', 'Camisa de lino con cuello mao, perfecta para el clima cálido', 50, 3, '2024-11-18 11:00:00', '2024-11-18 11:00:00'),
(4, 'Silla Ergonomica', 'Silla ergonómica con soporte lumbar, ideal para largas jornadas de trabajo', 180, 4, '2024-11-18 11:30:00', '2024-11-18 11:30:00'),
(5, 'Auriculares Sony WH-1000XM5', 'Auriculares inalámbricos con cancelación de ruido, sonido de alta fidelidad', 350, 5, '2024-11-18 12:00:00', '2024-11-18 12:00:00'),
(6, 'Smartwatch Samsung Galaxy Watch 6', 'Reloj inteligente Samsung con monitorización de salud y notificaciones', 250, 6, '2024-11-18 12:30:00', '2024-11-18 12:30:00'),
(7, 'Lámpara LED Regulable', 'Lámpara LED con brillo regulable, ideal para oficinas o salas de estudio', 40, 7, '2024-11-18 13:00:00', '2024-11-18 13:00:00'),
(8, 'Mochila de Senderismo', 'Mochila resistente y cómoda para excursiones y caminatas largas', 75, 8, '2024-11-18 13:30:00', '2024-11-18 13:30:00'),
(9, 'Vino Tinto Rioja Reserva', 'Vino tinto de la mejor cosecha de Rioja, con notas de frutos rojos y madera', 25, 9, '2024-11-18 14:00:00', '2024-11-18 14:00:00'),
(10, 'Cámara Digital Canon EOS 1500D', 'Cámara digital Canon EOS 1500D, perfecta para principiantes en fotografía', 450, 4, '2024-11-18 14:30:00', '2024-11-18 14:30:00'),
(11, 'Tableta Samsung Galaxy Tab A8', 'Tableta Samsung Galaxy Tab A8 de 10 pulgadas, ideal para entretenimiento y trabajo', 200, 6, '2024-11-18 15:00:00', '2024-11-18 15:00:00'),
(12, 'Perfume Dior Sauvage', 'Perfume masculino Dior Sauvage, un aroma fresco y elegante', 90, 10, '2024-11-18 15:30:00', '2024-11-18 15:30:00'),
(13, 'Cargador Rápido para iPhone', 'Cargador rápido de 20W para iPhone 12 y modelos posteriores', 25, 11, '2024-11-18 16:00:00', '2024-11-18 16:00:00'),
(14, 'Juego de Sábanas King Size', 'Juego de sábanas de algodón 100%, para cama King Size', 60, 3, '2024-11-18 16:30:00', '2024-11-18 16:30:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(60) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_email`, `user_status`) VALUES
(1, 'pedro', 'pedro@gmail.com', 1),
(2, 'maria', 'maria@gmail.com', 1),
(3, 'juan', 'juan@gmail.com', 1),
(4, 'carla', 'carla@gmail.com', 1),
(5, 'jorge', 'jorge@gmail.com', 1),
(6, 'laura', 'laura@gmail.com', 1),
(7, 'ana', 'ana@gmail.com', 1),
(8, 'luis', 'luis@gmail.com', 1),
(9, 'pablo', 'pablo@gmail.com', 1),
(10, 'elena', 'elena@gmail.com', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indices de la tabla `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `contacts`
--
ALTER TABLE `contacts`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
