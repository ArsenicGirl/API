-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-12-2023 a las 23:50:15
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `api_clase`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `use_mail` varchar(150) NOT NULL,
  `use_pss` varchar(150) NOT NULL,
  `use_dateCreate` varchar(150) NOT NULL,
  `us_identifier` varchar(150) NOT NULL,
  `us_key` varchar(150) NOT NULL,
  `us_status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`user_id`, `use_mail`, `use_pss`, `use_dateCreate`, `us_identifier`, `us_key`, `us_status`) VALUES
(6, 'lulo@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'gfcbcgdf', 'nulo', '123', '1'),
(7, 'mine@gmail.com', '202cb962ac59075b964b07152d234b70', '26/11/2023', 'reu4yhjZB102A', 'unsSY4GsL1.1Q', '1'),
(8, 'mm@gmail.com', '202cb962ac59075b964b07152d234b70', '', 'reESfnzDKqgrI', 'unsSY4GsL1.1Q', '1'),
(9, 'like@gmail.com', '202cb962ac59075b964b07152d234b70', '12/04/2024', 'nulo', '123', '1'),
(10, 'fault@gmail.com', '75496dbfbebb296508150e41a03f5788', '12/24/5', 'regc50jAaiy4E', 'unWVCJUdcZfvI', '1'),
(11, 'polarBear@gmail.com', '202cb962ac59075b964b07152d234b70', '26/11/2023', 'reiKab9LJiNrI', 'unsSY4GsL1.1Q', '1'),
(12, 'lauraGomez6@gmail.com', '202cb962ac59075b964b07152d234b70', '', 're4tBa33g5S7g', 'unsSY4GsL1.1Q', '1'),
(13, 'laurdfsdfds@gmail.com', 'c1fe00a6eb746a8d557eace4d024aaf1', '01/12/2023', 'rejiAiihCClDg', 'unWFhHEXMFQa6', '1'),
(14, 'laufdsfff@gmail.com', 'a52b383cbd6fc159cb892c0dbe50cece', '01/12/2023', 're5ZCSUflG20I', 'unejXODqRVhUM', '1'),
(15, 'laudanffo@gmail.com', '80e603d4765d277feda9c2463c3abb15', '01/12/2023', 'reCIBCZRNQdDY', 'un00OFxKboN76', '1'),
(16, 'laffffff@gmail.com', 'd7d2f36883cb5f94aa9291e5a9b838b5', '01/12/2023', 're2Fr.qTSHqbE', 'unV0oc4cRSp42', '1'),
(17, 'pruebasss@gmail.com', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', '01/12/2023', 'res48aX0IVztc', 'unJKGcXHZjMxc', '1'),
(18, 'prueba123@gmail.com', '202cb962ac59075b964b07152d234b70', '01/12/2023', 're1TfN9bkfjFE', 'unsSY4GsL1.1Q', '1'),
(19, 'estudiante@gmail.com', '9335a50de5f1fa299b01bba76ec7561f', '01/12/2023', 're0VcKDwMbsh6', 'unGVLxgYy0R.g', '1'),
(20, 'estudiantes2@gmail.com', '4116b49ef06f0c1ee6510139e35963b8', '01/12/2023', 're0VcKDwMbsh6', 'un5iJ5jQ86XF.', '1'),
(21, 'prueba33@gmail.com', '202cb962ac59075b964b07152d234b70', '01/12/2023', 'res8o8uv/wGTw', 'unsSY4GsL1.1Q', '1'),
(22, 'prueba333@gmail.com', '202cb962ac59075b964b07152d234b70', '01/12/2023', 'res8o8uv/wGTw', 'unsSY4GsL1.1Q', '1'),
(23, 'esttudiante3@gmail.com', '202cb962ac59075b964b07152d234b70', '01/12/2023', 're9dM4/kY09es', 'unsSY4GsL1.1Q', '1'),
(24, 'esttudiante5@gmail.com', '202cb962ac59075b964b07152d234b70', '01/12/2023', 're9dM4/kY09es', 'unsSY4GsL1.1Q', '1'),
(25, 'esttudiante88@gmail.com', '202cb962ac59075b964b07152d234b70', '01/12/2023', 're9dM4/kY09es', 'unsSY4GsL1.1Q', '1'),
(26, 'esttudi8@gmail.com', '64aa6d5732addcd8c2e57a5b8f9c544a', '01/12/2023', 're/q.tnbfMvw.', 'unTpoLhRIzP8Y', '1'),
(27, 'pruebasHoy@gmail.com', '202cb962ac59075b964b07152d234b70', '01/12/2023', 'reNP/Rz.Lphaw', 'unsSY4GsL1.1Q', '1'),
(28, 'holaddddd@gmail.com', '202cb962ac59075b964b07152d234b70', '01/12/2023', 'regsj84ennyc6', 'unsSY4GsL1.1Q', '1'),
(29, 'userdpdd@gmail.com', '202cb962ac59075b964b07152d234b70', '01/12/2023', 're3SXpwXvpSLo', 'unsSY4GsL1.1Q', '0');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
