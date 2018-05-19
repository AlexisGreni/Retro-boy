-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 19, 2018 at 04:39 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_login_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `foro`
--

CREATE TABLE `foro` (
  `ID` int(7) UNSIGNED NOT NULL,
  `autor` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `titulo` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `mensaje` text COLLATE utf8_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `respuestas` int(11) NOT NULL DEFAULT '0',
  `identificador` int(7) NOT NULL DEFAULT '0',
  `ult_respuesta` date DEFAULT NULL,
  `ID_U` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `foro`
--

INSERT INTO `foro` (`ID`, `autor`, `titulo`, `mensaje`, `fecha`, `respuestas`, `identificador`, `ult_respuesta`, `ID_U`) VALUES
(1, 'Jorge', 'Salan', 'Este es mi alias', '2001-06-15', 2, 0, '2001-06-15', NULL),
(2, 'Alexi', 'Lahio', 'Bodom Beach Terror', '2001-06-15', 0, 0, '2001-06-15', NULL),
(4, 'Alberto', 'Vivaldi', 'Solo de violines', '2001-06-15', 0, 1, '2001-06-15', NULL),
(5, 'Julius', 'Gibert', 'Bart esta bien', '2001-06-15', 1, 1, '2001-06-15', NULL),
(6, 'dr nick', 'bart', 'bart esta bien pero arrastra multiples rallauras y sintomas de estrepitosas craneales, por dios esa mujer se ha tragado un bebe', '2001-06-15', 0, 5, '2001-06-15', NULL),
(7, 'Alexis', 'Matematicas', 'jevbfjvbekvkjdjncksnckckjsjckc ODIO', '2003-05-18', 1, 0, '2003-05-18', NULL),
(8, 'Yo', 'LALAL', 'LAS ODIO', '2003-05-18', 0, 7, '2003-05-18', NULL),
(9, 'mario', 'lolis', 'its a me mario', '2004-05-18', 0, 0, '2004-05-18', NULL),
(10, 'mario@mail.com', 'dinosaurios', 'son geniales y murieron :D', '2004-05-18', 1, 0, '2004-05-18', 3),
(11, 'asd', 'comida', 'asdsafaaddabd', '2005-05-18', 0, 0, '2005-05-18', NULL),
(12, 'star@mail.com', 'hhhjbjhbj', 'no se hablar', '2010-05-18', 0, 10, '2010-05-18', 4);

-- --------------------------------------------------------

--
-- Table structure for table `Foro_RB`
--

CREATE TABLE `Foro_RB` (
  `ID` int(7) UNSIGNED NOT NULL,
  `ID_autor` int(11) NOT NULL,
  `titulo` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `mensaje` text COLLATE utf8_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `respuestas` int(11) NOT NULL DEFAULT '0',
  `identificador` int(7) NOT NULL DEFAULT '0',
  `ult_respuesta` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Foro_RB`
--

INSERT INTO `Foro_RB` (`ID`, `ID_autor`, `titulo`, `mensaje`, `fecha`, `respuestas`, `identificador`, `ult_respuesta`) VALUES
(1, 6, 'metroid zero mission', 'es increiblemente intrincado y molesto, pero al menos ridley es facil de matar', '2007-05-18', 0, 0, '2007-05-18'),
(2, 7, 'Mario y Luigi SuperStar Saga', 'Me encanta por que es muy divertido y colorido y porque yo soy el prota', '2007-05-18', 0, 0, '2007-05-18'),
(3, 7, '', 'Este juego esta sobrevalorado', '2010-05-18', 0, 1, '2010-05-18'),
(4, 8, '', '&iquest;Puedo capturar un metroid?', '2010-05-18', 0, 1, '2010-05-18'),
(5, 8, '', 'Yo prefiero el tercer juego :p', '2016-05-18', 0, 2, '2016-05-18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(1, 'alexis@mail.com', '$2y$10$OYKs1GMllZN0f0szROmH/.DCI2omQZmf5dk5d2VIwKgJRsoHhv.Da'),
(2, 'test3@mail.com', '$2y$10$Fh3S78jlGcQ6KGRw1wWJJ.4qpd3Yd3udD.Dv1vsM1a5GoJHsPgeIG'),
(3, 'mario@mail.com', '$2y$10$9WzbFMshlYYFLjIJiLHemuw8jbKwwFs/djT5Cuo824AldQcsMIUhC'),
(4, 'star@mail.com', '$2y$10$vN3bj3z7xK8/sAmvuUhPv.u/fnawGVycv13TyR.kyU3RbKFcvK4xS');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `contrasenha` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `interes` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `contrasenha`, `correo`, `interes`) VALUES
(1, 'Alexisgreni', '$2y$10$ZhYq6UKcJjDuGt56Il', '', ''),
(6, 'samus', '$2y$10$i2EaqcEAoBVT34YwdLdr7uMYezTpkn8zkhmDGSuTJWqneI4a1jFWW', '', ''),
(7, 'Luigi', '$2y$10$QoSR4mRK63qSTr1XhC/bXOl7DzKuOmdIF7CK1wpyXoCY5iTt7Alim', 'Mario@mail.com', 'Ser el mejor. 2ndP '),
(8, 'Ketchup', '$2y$10$03wQAaalD4XfwjF1u/m0U.c3yjKiq0S3GEPz4WYAoE44twQtfskvC', 'ash@mail.com', 'Quiero ser el mejor entrenador pokÃ©mon.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `foro`
--
ALTER TABLE `foro`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `IdFK` (`ID_U`);

--
-- Indexes for table `Foro_RB`
--
ALTER TABLE `Foro_RB`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_autor` (`ID_autor`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `foro`
--
ALTER TABLE `foro`
  MODIFY `ID` int(7) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `Foro_RB`
--
ALTER TABLE `Foro_RB`
  MODIFY `ID` int(7) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `foro`
--
ALTER TABLE `foro`
  ADD CONSTRAINT `IdFK` FOREIGN KEY (`ID_U`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Foro_RB`
--
ALTER TABLE `Foro_RB`
  ADD CONSTRAINT `Foro_RB_ibfk_1` FOREIGN KEY (`ID_autor`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
