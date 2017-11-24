--
-- Base de datos: `db_parking`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `apellido` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `clave` longtext COLLATE utf8_spanish2_ci NOT NULL,
  `mail` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `turno` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `perfil` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_creacion` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `foto` varchar(130) COLLATE utf8_spanish2_ci NOT NULL,
  `suspendido` varchar(2) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id`, `nombre`, `apellido`, `clave`, `mail`, `turno`, `perfil`, `fecha_creacion`, `foto`, `suspendido`) VALUES
(1, 'Juan', 'Peralta', '1234', 'admin', 'noche', 'admin', '2017-11-02', 'emp1.jpg', 'no'),
(2, 'Pepe', 'Rodriguez', '1234', 'empleado1', 'tarde', 'empleado', '2017-11-13', 'emp1.jpg', 'no'),
(3, 'pepe', 'apellido', '1111', 'pepe0221', 'Mañana', 'empleado', '2017-11-10', 'C:fakepathauto5.png', 'no'),
(4, 'junior', 'apellido', '2222', 'junior', 'NOCHE', 'empleado', '2017-11-11', 'C:fakepath65ce3bd80a5ea59ae1c9299cf6ca0d32.pn', 'si'),
(7, 'qeqwe', 'apellido', '4411', 'rrt', 'TARDE', 'empleado', '2017-11-07', 'C:fakepathaward_winning_hair_salon_mens_hair_', 'no'),
(8, 'gaga', 'apellido', '4433', 'fafa', 'MAÑANA', 'empleado', '2017-09-28', 'C:fakepatha29b4d4db6b893ae1893e11dfba027ff--hairstyles.jpg', 'no');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingresos_empleados`
--

CREATE TABLE `ingresos_empleados` (
  `id` int(11) NOT NULL,
  `fecha_hora_ingreso` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `id_empleado` varchar(45) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `ingresos_empleados`
--

INSERT INTO `ingresos_empleados` (`id`, `fecha_hora_ingreso`, `id_empleado`) VALUES
(2, '2017-11-13', '2'),
(3, '2017-11-07 / 17:47:07', '2'),
(4, '2017-11-07 / 17:47:34', '2'),
(5, '2017-11-07 / 17:47:35', '2'),
(6, '2017-11-07 / 17:47:35', '2'),
(7, '2017-11-07 / 17:47:35', '2'),
(8, '2017-11-07 / 17:50:36', '2'),
(9, '2017-11-07 / 19:10:20', '2'),
(10, '2017-11-07 / 19:26:33', '2'),
(11, '2017-11-07 / 20:17:16', '2'),
(12, '2017-11-08 / 17:50:38', '2'),
(13, '2017-11-08 / 18:41:32', '2'),
(14, '2017-11-08 / 18:48:20', '2'),
(15, '2017-11-08 / 18:48:55', '2'),
(16, '2017-11-08 / 18:54:30', '2'),
(17, '2017-11-08 / 18:59:29', '2'),
(18, '2017-11-08 / 19:02:03', '2'),
(19, '2017-11-08 / 19:06:05', '2'),
(20, '2017-11-08 / 19:31:28', '2'),
(21, '2017-11-08 / 19:34:42', '2'),
(22, '2017-11-08 / 19:37:09', '2'),
(23, '2017-11-08 / 19:45:26', '2'),
(24, '2017-11-08 / 20:06:01', '2'),
(25, '2017-11-09 / 11:15:59', '2'),
(26, '2017-11-09 / 11:17:51', '2'),
(27, '2017-11-09 / 12:54:43', '2'),
(28, '2017-11-09 / 12:55:19', '2'),
(29, '2017-11-09 / 12:57:54', '2'),
(30, '2017-11-09 / 12:58:13', '2'),
(31, '2017-11-09 / 13:05:25', '2'),
(32, '2017-11-09 / 13:57:20', '2'),
(33, '2017-11-09 / 15:04:37', '2'),
(34, '2017-11-09 / 15:07:38', '2'),
(35, '2017-11-09 / 15:12:03', '2'),
(36, '2017-11-09 / 15:24:50', '2'),
(37, '2017-11-09 / 18:26:14', '2'),
(38, '2017-11-09 / 18:29:25', '2'),
(39, '2017-11-09 / 18:30:23', '2'),
(40, '2017-11-09 / 19:07:07', '2'),
(41, '2017-11-09 / 19:10:23', '2'),
(42, '2017-11-09 / 19:12:17', '2'),
(43, '2017-11-09 / 19:40:21', '2'),
(44, '2017-11-09 / 19:42:50', '2'),
(45, '2017-11-09 / 19:43:10', '2'),
(46, '2017-11-09 / 19:43:35', '2'),
(47, '2017-11-09 / 19:44:31', '2'),
(48, '2017-11-09 / 19:45:05', '2'),
(49, '2017-11-09 / 19:49:13', '2'),
(50, '2017-11-09 / 19:52:36', '2'),
(51, '2017-11-09 / 19:53:04', '2'),
(52, '2017-11-09 / 20:03:15', '2'),
(53, '2017-11-09 / 21:32:38', '2'),
(54, '2017-11-10 / 15:07:20', '2'),
(55, '2017-11-10 / 15:15:44', '2'),
(56, '2017-11-10 / 19:55:45', '2'),
(57, '2017-11-23 / 00:03:00', '2'),
(58, '2017-11-23 / 00:03:34', '2'),
(59, '2017-11-23 / 00:05:32', '2'),
(60, '2017-11-23 / 00:07:27', '3'),
(61, '2017-11-23 / 01:19:35', '2'),
(62, '2017-11-24 / 16:35:19', '2'),
(63, '2017-11-24 / 18:00:58', '2'),
(64, '2017-11-24 / 18:20:04', '3'),
(65, '2017-11-24 / 18:26:01', '3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operaciones`
--

CREATE TABLE `operaciones` (
  `numCochera` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `esDisca` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `ocupada` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `marca` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `patente` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `color` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `foto` varchar(130) COLLATE utf8_spanish2_ci NOT NULL,
  `id_empleado_ingreso` int(11) NOT NULL,
  `fecha_hora_ingreso` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `id_empleado_salida` int(11) DEFAULT NULL,
  `fecha_hora_salida` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `tiempo` int(11) DEFAULT NULL,
  `importe` float DEFAULT NULL,
  `tipo` varchar(50) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `operaciones`
--

INSERT INTO `operaciones` (`numCochera`, `esDisca`, `ocupada`, `marca`, `patente`, `color`, `foto`, `id_empleado_ingreso`, `fecha_hora_ingreso`, `id_empleado_salida`, `fecha_hora_salida`, `tiempo`, `importe`, `tipo`) VALUES
('2-1', 'no', 'si', 'chevrolet', 'www111', 'verde', 'img1.jpg', 2, '24/11/2017', 0, '', 0, 0, 'empleado'),
('2-1', 'no', 'si', 'chevrolet', 'www111', 'verde', 'img1.jpg', 2, '24/11/2017', 0, '', 0, 0, 'empleado');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ingresos_empleados`
--
ALTER TABLE `ingresos_empleados`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `ingresos_empleados`
--
ALTER TABLE `ingresos_empleados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
