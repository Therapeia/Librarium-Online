-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2024 at 05:03 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `libreria_mafe`
--

-- --------------------------------------------------------

--
-- Table structure for table `compra_descarga`
--

CREATE TABLE `compra_descarga` (
  `id_transaccion` int(11) NOT NULL,
  `id_libro` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `tipo` enum('libre','pago') DEFAULT NULL,
  `metodo_pago` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `compra_descarga`
--

INSERT INTO `compra_descarga` (`id_transaccion`, `id_libro`, `id_usuario`, `tipo`, `metodo_pago`) VALUES
(5, 16, 89, 'pago', 'paypal'),
(6, 20, 89, 'pago', 'paypal'),
(8, 16, 92, 'pago', 'paypal'),
(9, 20, 92, 'pago', 'paypal'),
(10, NULL, NULL, '', NULL),
(11, NULL, NULL, '', NULL),
(12, NULL, NULL, '', NULL),
(13, NULL, NULL, '', NULL),
(14, NULL, NULL, '', NULL),
(15, NULL, NULL, '', NULL),
(16, NULL, NULL, '', NULL),
(17, NULL, NULL, '', NULL),
(18, 20, 0, '', 'paypal'),
(19, 16, 0, '', 'paypal'),
(20, 16, 0, '', 'paypal'),
(21, 16, 0, '', 'paypal'),
(22, 20, 0, 'pago', 'paypal'),
(23, 20, 0, 'pago', 'paypal'),
(24, 20, 0, 'pago', 'paypal'),
(25, 20, 0, 'pago', 'paypal'),
(26, 16, 0, 'pago', 'paypal'),
(27, 16, 0, 'pago', 'tarjeta'),
(28, 16, 0, 'pago', 'descarga'),
(29, 16, 0, 'libre', 'descarga'),
(30, 20, 0, 'pago', 'descarga'),
(31, 20, 0, 'libre', 'descarga'),
(32, 16, 0, 'pago', 'paypal'),
(33, 20, 0, 'pago', 'paypal'),
(34, 16, 0, 'pago', 'paypal'),
(35, 22, 0, 'libre', 'descarga'),
(36, 16, 0, 'pago', 'paypal'),
(37, 22, 0, 'libre', 'descarga'),
(38, 22, 0, 'libre', 'descarga'),
(39, 16, 0, 'pago', 'paypal'),
(40, 16, 0, 'pago', 'paypal'),
(41, 22, 0, 'libre', 'descarga'),
(42, 22, 0, 'libre', 'descarga'),
(43, 22, 0, 'libre', 'descarga'),
(44, 22, 0, 'libre', 'descarga'),
(45, 16, 0, 'pago', 'paypal'),
(46, 16, 0, 'pago', 'paypal'),
(47, 16, 0, 'pago', 'paypal'),
(48, 22, 0, 'libre', 'descarga'),
(49, 16, 0, 'pago', 'paypal'),
(50, 16, 0, 'pago', 'paypal'),
(51, 22, 0, 'libre', 'descarga'),
(52, 16, 0, 'pago', 'paypal'),
(53, 22, 0, 'libre', 'descarga'),
(54, 16, 0, 'pago', 'paypal'),
(55, 16, 0, 'pago', 'paypal'),
(56, 16, 0, 'pago', 'paypal'),
(57, 16, 98, 'pago', 'paypal'),
(58, 16, 98, 'pago', 'paypal'),
(59, 16, 98, 'pago', 'paypal'),
(60, 16, 98, 'pago', 'paypal'),
(61, 22, 98, 'libre', 'descarga'),
(62, 16, 99, 'pago', 'paypal'),
(63, 16, 100, 'pago', 'paypal'),
(64, 16, 101, 'pago', 'tarjeta'),
(65, 22, 101, 'libre', 'descarga'),
(66, 22, 101, 'libre', 'descarga'),
(67, 16, 0, 'pago', 'paypal'),
(68, 16, 0, 'pago', 'paypal'),
(69, 16, 0, 'pago', 'paypal'),
(70, 16, 0, 'pago', 'paypal'),
(71, 16, 0, 'pago', 'paypal'),
(72, 16, 0, 'pago', 'paypal'),
(73, 16, 0, 'pago', 'paypal'),
(74, 16, 0, 'pago', 'paypal'),
(75, 16, 0, 'pago', 'paypal'),
(76, 16, 0, 'pago', 'paypal'),
(77, 16, 0, 'pago', 'paypal'),
(78, 16, 0, 'pago', 'paypal'),
(79, 16, 0, 'pago', 'paypal'),
(80, 16, 0, 'pago', 'paypal'),
(81, 16, 0, 'pago', 'paypal'),
(82, 16, 0, 'pago', 'paypal'),
(83, 16, 0, 'pago', 'paypal'),
(84, 16, 0, 'pago', 'paypal'),
(85, 16, 0, 'pago', 'paypal'),
(86, 16, 0, 'pago', 'paypal'),
(87, 16, 0, 'pago', 'paypal'),
(88, 16, 0, 'pago', 'paypal'),
(89, 16, 0, 'pago', 'paypal'),
(90, 16, 0, 'pago', 'paypal'),
(91, 16, 0, 'pago', 'paypal'),
(92, 16, 0, 'pago', 'paypal'),
(93, 16, 0, 'pago', 'paypal'),
(94, 16, 0, 'pago', 'paypal'),
(95, 16, 0, 'pago', 'paypal'),
(96, 16, 0, 'pago', 'paypal'),
(97, 16, 0, 'pago', 'paypal'),
(98, 16, 0, 'pago', 'paypal'),
(99, 16, 0, 'pago', 'paypal'),
(100, 16, 0, 'pago', 'paypal'),
(101, 16, 0, 'pago', 'paypal'),
(102, 16, 0, 'pago', 'paypal'),
(103, 16, 0, 'pago', 'paypal'),
(104, 16, 0, 'pago', 'paypal'),
(105, 16, 0, 'pago', 'paypal'),
(106, 16, 0, 'pago', 'paypal'),
(107, 16, 0, 'pago', 'paypal'),
(108, 16, 0, 'pago', 'paypal'),
(109, 16, 0, 'pago', 'paypal'),
(110, 16, 0, 'pago', 'paypal'),
(111, 16, 0, 'pago', 'paypal'),
(112, 16, 0, 'pago', 'paypal'),
(113, 16, 0, 'pago', 'paypal'),
(114, 16, 0, 'pago', 'paypal'),
(115, 16, 0, 'pago', 'paypal'),
(116, 16, 0, 'pago', 'paypal'),
(117, 16, 0, 'pago', 'paypal'),
(118, 16, 0, 'pago', 'paypal'),
(119, 16, 0, 'pago', 'paypal'),
(120, 16, 0, 'pago', 'paypal'),
(121, 16, 0, 'pago', 'paypal'),
(122, 16, 0, 'pago', 'paypal'),
(123, 16, 0, 'pago', 'paypal'),
(124, 16, 0, 'pago', 'paypal'),
(125, 16, 108, 'pago', 'paypal'),
(126, 24, 109, 'libre', 'descarga'),
(127, 20, 109, 'pago', 'tarjeta'),
(128, 20, 109, 'pago', 'tarjeta'),
(129, 24, 109, 'libre', 'descarga'),
(130, 24, 109, 'libre', 'descarga'),
(131, 24, 109, 'libre', 'descarga'),
(132, 20, 109, 'pago', 'paypal'),
(133, 20, 109, 'pago', 'paypal'),
(134, 16, 0, 'pago', 'paypal'),
(135, 16, 0, 'pago', 'paypal'),
(136, 20, 0, 'pago', 'paypal'),
(137, 16, 0, 'pago', 'paypal'),
(138, 25, 0, 'pago', 'paypal'),
(139, 20, 110, 'pago', 'paypal'),
(140, 24, 111, 'libre', 'descarga'),
(141, 20, 111, 'pago', 'paypal'),
(142, 24, 111, 'libre', 'descarga'),
(143, 24, 111, 'libre', 'descarga'),
(144, 24, 111, 'libre', 'descarga'),
(145, 20, 111, 'pago', 'paypal'),
(146, 24, 111, 'libre', 'descarga'),
(147, 20, 111, 'pago', 'paypal'),
(148, 20, 111, 'pago', 'paypal'),
(149, 20, 111, 'pago', 'paypal'),
(150, 20, 111, 'pago', 'paypal'),
(151, 20, 111, 'pago', 'paypal'),
(152, 20, 111, 'pago', 'paypal'),
(153, 20, 111, 'pago', 'paypal'),
(154, 20, 111, 'pago', 'paypal'),
(155, 20, 111, 'pago', 'paypal'),
(156, 20, 111, 'pago', 'paypal'),
(157, 20, 111, 'pago', 'paypal'),
(158, 20, 111, 'pago', 'paypal'),
(159, 20, 111, 'pago', 'paypal'),
(160, 24, 111, 'libre', 'descarga'),
(161, 20, 111, 'pago', 'paypal'),
(162, 20, 111, 'pago', 'paypal'),
(163, 20, 111, 'pago', 'paypal'),
(164, 24, 111, 'libre', 'descarga'),
(165, 20, 111, 'pago', 'paypal'),
(166, 20, 111, 'pago', 'paypal'),
(167, 20, 111, 'pago', 'paypal'),
(168, 24, 111, 'libre', 'descarga'),
(169, 20, 111, 'pago', 'paypal'),
(170, 20, 111, 'pago', 'paypal'),
(171, 20, 111, 'pago', 'paypal'),
(172, 20, 111, 'pago', 'paypal'),
(173, 20, 111, 'pago', 'paypal'),
(174, 20, 111, 'pago', 'paypal'),
(175, 20, 111, 'pago', 'paypal'),
(176, 20, 111, 'pago', 'paypal'),
(177, 20, 111, 'pago', 'paypal'),
(178, 20, 111, 'pago', 'paypal'),
(179, 20, 111, 'pago', 'paypal'),
(180, 20, 111, 'pago', 'paypal'),
(181, 20, 111, 'pago', 'paypal'),
(182, 20, 111, 'pago', 'pago'),
(183, 20, 111, 'pago', 'paypal'),
(184, 24, 111, 'libre', 'descarga'),
(185, 20, 111, 'pago', 'paypal'),
(186, 20, 111, 'pago', 'paypal'),
(187, 20, 111, 'pago', 'pago'),
(188, 20, 111, 'pago', 'paypal'),
(189, 20, 111, 'pago', 'paypal'),
(190, 20, 111, 'pago', 'pago'),
(191, 20, 111, 'pago', 'pago'),
(192, 20, 111, 'pago', ''),
(193, 20, 111, 'pago', ''),
(194, 20, 111, 'pago', ''),
(195, 20, 111, 'pago', ''),
(196, 20, 111, 'pago', ''),
(197, 20, 111, 'pago', ''),
(198, 20, 111, 'pago', 'pago'),
(199, 0, 111, 'pago', 'tarjeta'),
(200, 0, 111, 'pago', 'paypal'),
(201, 0, 111, 'pago', 'paypal'),
(202, 20, 111, 'pago', ''),
(203, 20, 111, 'pago', ''),
(204, 20, 111, 'pago', 'pago'),
(205, 0, 111, 'pago', 'tarjeta'),
(206, 0, 111, 'pago', 'tarjeta'),
(207, 20, 111, 'pago', 'pago'),
(208, 20, 111, 'pago', 'pago'),
(209, 20, 111, 'pago', 'pago'),
(210, 20, 111, 'pago', 'pago'),
(211, 20, 111, 'pago', 'pago'),
(212, 24, 111, 'libre', 'descarga'),
(213, 20, 111, 'pago', 'pago'),
(214, 24, 111, 'libre', 'descarga'),
(215, 20, 111, 'pago', 'pago'),
(216, 20, 111, 'pago', 'pago'),
(217, 20, 111, 'pago', 'pago'),
(218, 20, 111, 'pago', 'pago'),
(219, 20, 111, 'pago', 'pago'),
(220, 20, 111, 'pago', 'pago'),
(221, 20, 111, 'pago', 'pago'),
(222, 24, 111, 'libre', 'descarga'),
(223, 20, 111, 'pago', 'pago'),
(224, 20, 111, 'pago', 'pago'),
(225, 20, 111, 'pago', 'pago'),
(226, 20, 111, 'pago', 'pago'),
(227, 20, 111, 'pago', 'pago'),
(228, 24, 111, 'libre', 'descarga'),
(229, 20, 111, 'pago', 'pago'),
(230, 20, 111, 'pago', 'pago'),
(231, 24, 111, 'libre', 'descarga'),
(232, 20, 111, 'pago', 'pago'),
(233, 24, 111, 'libre', 'descarga'),
(234, 24, 111, 'pago', 'descarga'),
(235, 20, 111, 'pago', 'pago'),
(236, 20, 111, 'pago', 'paypal'),
(237, 20, 111, 'pago', 'paypal'),
(238, 20, 111, 'pago', 'paypal'),
(239, 20, 111, 'pago', 'paypal'),
(240, 20, 111, 'pago', 'paypal'),
(241, 20, 111, 'pago', 'paypal'),
(242, 20, 111, 'pago', 'paypal'),
(243, 24, 111, 'libre', 'descarga'),
(244, 20, 111, 'pago', 'paypal'),
(245, 20, 111, 'pago', 'paypal'),
(246, 24, 111, 'libre', 'descarga'),
(247, 20, 111, 'pago', 'paypal'),
(248, 20, 111, 'pago', 'paypal'),
(249, 24, 111, 'libre', 'descarga'),
(250, 20, 111, 'pago', 'paypal'),
(251, 20, 111, 'pago', 'paypal'),
(252, 20, 111, 'pago', 'paypal'),
(253, 24, 111, 'libre', 'descarga'),
(254, 20, 111, 'pago', 'paypal'),
(255, 20, 111, 'pago', 'paypal'),
(256, 20, 111, 'pago', 'pago'),
(257, 20, 111, 'pago', 'paypal'),
(258, 20, 111, 'pago', 'pago'),
(259, 20, 111, 'pago', 'pago'),
(260, 24, 111, 'libre', 'descarga'),
(261, 20, 111, 'pago', 'pago'),
(262, 24, 111, 'libre', 'descarga'),
(263, 20, 111, 'pago', 'pago'),
(264, 24, 111, 'libre', 'descarga'),
(265, 24, 111, 'libre', 'descarga'),
(266, 24, 111, 'libre', 'descarga'),
(267, 24, 111, 'libre', 'descarga'),
(268, 20, 111, 'pago', 'pago'),
(269, 20, 111, 'pago', 'pago'),
(270, 24, 111, 'libre', 'descarga'),
(271, 20, 111, 'pago', 'pago'),
(272, 20, 111, 'pago', 'pago'),
(273, 20, 111, 'pago', 'pago'),
(274, 20, 0, 'pago', 'pago'),
(275, 20, 111, 'pago', 'pago'),
(276, 20, 111, 'pago', 'pago'),
(277, 24, 111, 'libre', 'descarga'),
(278, 20, 111, 'pago', 'pago'),
(279, 20, 111, 'pago', 'pago'),
(280, 20, 111, 'pago', 'pago'),
(281, 20, 111, 'pago', 'pago'),
(282, 20, 111, 'pago', 'pago'),
(283, 20, 111, 'pago', 'pago'),
(284, 20, 111, 'pago', 'pago'),
(285, 20, 111, 'pago', 'pago'),
(286, 16, 111, 'pago', 'pago'),
(287, 25, 111, 'pago', 'pago'),
(288, 20, 111, 'pago', 'pago'),
(289, 20, 111, 'pago', 'pago'),
(290, 20, 111, 'pago', 'pago'),
(291, 24, 111, 'libre', 'descarga'),
(292, 20, 111, 'pago', 'pago'),
(293, 16, 111, 'pago', 'pago'),
(294, 25, 111, 'pago', 'pago'),
(295, 20, 111, 'pago', 'pago'),
(296, 24, 111, 'libre', 'descarga'),
(297, 24, 111, 'libre', 'descarga'),
(298, 20, 0, 'pago', 'pago'),
(299, 20, 0, 'pago', 'pago'),
(300, 20, 0, 'pago', 'pago'),
(301, 16, 0, 'pago', 'pago'),
(302, 25, 0, 'pago', 'pago'),
(303, 20, 0, 'pago', 'pago'),
(304, 20, 0, 'pago', 'pago'),
(305, 20, 0, 'pago', 'pago'),
(306, 20, 0, 'pago', 'pago'),
(307, 20, 0, 'pago', 'pago'),
(308, 20, 0, 'pago', 'pago'),
(309, 20, 0, 'pago', 'pago'),
(310, 25, 0, 'pago', 'pago'),
(311, 20, 0, 'pago', 'pago'),
(312, 20, 0, 'pago', 'pago'),
(313, 20, 0, 'pago', 'pago'),
(314, 20, 0, 'pago', 'pago'),
(315, 20, 0, 'pago', 'pago'),
(316, 20, 0, 'pago', 'pago'),
(317, 20, 0, 'pago', 'pago'),
(318, 20, 0, 'pago', 'pago'),
(319, 20, 0, 'pago', 'pago'),
(320, 20, 0, 'pago', 'pago'),
(321, 24, 0, 'libre', 'descarga'),
(322, NULL, 0, 'pago', 'pago'),
(323, 20, 0, 'pago', 'pago'),
(324, 20, 0, 'pago', 'pago'),
(325, 20, 0, 'pago', 'pago'),
(326, 20, 0, 'pago', 'pago'),
(327, 20, 0, 'pago', 'pago'),
(328, 20, 0, 'pago', 'pago'),
(329, 20, 0, 'pago', 'pago'),
(330, 20, 0, 'pago', 'pago'),
(331, 20, 0, 'pago', 'pago'),
(332, 24, 0, 'libre', 'descarga'),
(333, 24, 0, 'libre', 'descarga'),
(334, 24, 0, 'libre', 'descarga'),
(335, 24, 0, 'libre', 'descarga'),
(336, 0, 0, 'pago', 'paypal'),
(337, 24, 0, 'libre', 'descarga'),
(338, 24, 0, 'libre', 'descarga'),
(339, 0, 0, 'pago', 'paypal'),
(340, 0, 0, 'pago', 'paypal'),
(341, 24, 0, 'libre', 'descarga'),
(342, 24, 0, 'libre', 'descarga'),
(343, 20, 0, 'pago', 'pago'),
(344, 20, 0, 'pago', 'paypal'),
(345, 20, 0, 'pago', 'paypal'),
(346, 24, 0, 'libre', 'descarga'),
(347, 24, 0, 'libre', 'descarga'),
(348, 24, 0, 'libre', 'descarga'),
(349, 16, 0, 'pago', 'pago'),
(350, 20, 0, 'pago', 'paypal'),
(351, 20, 0, 'pago', 'paypal'),
(352, 20, 0, 'pago', 'paypal'),
(353, 20, 0, 'pago', 'paypal'),
(354, 20, 0, 'pago', 'paypal'),
(355, 20, 0, 'pago', 'paypal'),
(356, 24, 0, 'libre', 'descarga'),
(357, 20, 112, 'pago', 'paypal'),
(358, 24, 112, 'libre', 'descarga'),
(359, 24, 113, 'libre', 'descarga'),
(360, 20, 113, 'pago', 'tarjeta'),
(361, 26, 113, 'libre', 'descarga'),
(362, 31, 113, 'pago', 'paypal'),
(363, 28, 113, 'libre', 'descarga'),
(364, 20, 113, 'pago', 'tarjeta'),
(365, 26, 113, 'libre', 'descarga'),
(366, 20, 114, 'pago', 'tarjeta'),
(367, 26, 114, 'libre', 'descarga'),
(368, 20, 0, 'pago', 'tarjeta'),
(369, 20, 0, 'pago', 'efectivo'),
(370, 26, 0, 'libre', 'descarga');

-- --------------------------------------------------------

--
-- Table structure for table `descarga`
--

CREATE TABLE `descarga` (
  `id_transaccion` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_libro` int(11) NOT NULL,
  `tipo` enum('libre','pago') NOT NULL,
  `metodo_pago` varchar(350) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `libro`
--

CREATE TABLE `libro` (
  `id_libro` int(11) NOT NULL,
  `titulo` varchar(150) DEFAULT NULL,
  `autor` varchar(150) DEFAULT NULL,
  `image` varchar(350) DEFAULT NULL,
  `genero` varchar(150) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `tipo` enum('libre','pago') DEFAULT NULL,
  `precio` int(15) DEFAULT NULL,
  `ruta_pdf` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Dumping data for table `libro`
--

INSERT INTO `libro` (`id_libro`, `titulo`, `autor`, `image`, `genero`, `descripcion`, `tipo`, `precio`, `ruta_pdf`) VALUES
(20, 'La odisea', 'Homero', '../carpeta_imagenes/661ea8a1902602.79040657.jpg', 'Aventura', 'La Odisea narra la historia del héroe griego Odiseo, Ulises, el viaje de regreso a su reino de Ítaca donde le esperan su esposa Penélope, rodeada de pretendiente, y su hijo Telémaco. Un trayecto de aproximadamente un mes de navegación que se alarga aproxi', 'pago', 9000, '../carpeta_pdf/661ea8a1909265.19546423.pdf'),
(26, 'Leviatán', 'Thomas Hobbes', '../carpeta_imagenes/66271ed2708e16.43714962.jpg', 'Tratado', 'El Leviatán es más que una mera teoría de Estado. Es una obra filosófica integral que explica a los hombres desde sus percepciones, pero también desde sus sueños y objetivos, al tiempo que trata de establecer en qué medida existe un ser capaz de vivir en ', 'libre', 0, '../carpeta_pdf/66271ed2711d83.40930937.pdf'),
(27, 'Cien Años de Soledad', 'Gabriel García Márquez', '../carpeta_imagenes/66271fdec49050.19645041.jpg', 'Novela, Realismo mágico, Ficción, Alta fantasía, Saga familiar', 'Entre la boda de José Arcadio Buendía con Amelia Iguarán hasta la maldición de Aureliano Babilonia transcurre todo un siglo. Cien años de soledad para una estirpe única, fantástica, capaz de fundar una ciudad tan especial como Macondo y de engendrar niños', 'pago', 98000, '../carpeta_pdf/66271fdec4bfc1.48387871.pdf'),
(28, 'Alicia en el País de las Maravillas', 'Lewis Carroll', '../carpeta_imagenes/662720418f6df4.48136913.png', 'Literatura fantástica, Nonsense', 'Alicia es una niña que ve a un conejo trajeado que consulta un reloj de bolsillo y parece que va con prisa. Intrigada, lo sigue y cae por un agujero. Su caída la llevará a un mundo fantástico y extraño, en el cual nada parece desentonar: un gato que apare', 'libre', 0, '../carpeta_pdf/662720418f8f86.85876631.pdf'),
(29, 'El Principito', 'Antoine De Saint - Exupéry', '../carpeta_imagenes/662720c09bf0f0.39427429.jpg', 'Literatura infantil, Novela corta, Fábula, Ficción especulativa', 'El Principito narra la historia de un piloto que, mientras intenta reparar su avión averiado en medio del desierto del Sahara, se topa con un pequeño príncipe proveniente del asteroide B 612. Él le pide insistentemente que le dibuje un cordero y que nunca', 'pago', 10000, '../carpeta_pdf/662720c09c1129.13128922.pdf'),
(30, 'Divina Comedia', 'Dante Alighieri', '../carpeta_imagenes/6627212aa49bd7.68893746.png', 'Poesía, Ficción', 'La divina comedia es la obra italiana más famosa de la literatura mundial. El poeta medieval Dante Alighieri lleva al lector de esta, su obra principal, por un viaje de aventuras de un tipo particular: al lado del poeta romano Virgilio, Dante atraviesa, c', 'libre', 0, '../carpeta_pdf/6627212aa4bcf5.58460319.pdf'),
(31, 'Orgullo Y Prejuicio', 'Jane Austen', '../carpeta_imagenes/6627218eb2fc92.74124941.jpg', 'Ficción, Novela rosa, Sátira, Novela costumbrista', 'El matrimonio Bennet tiene cinco hijas casaderas de entre 15 y 23 años. Conseguir colocarlas con un buen casamiento es la única esperanza que puede albelgar la madre, sabedora de que sus hijas perderán su escasa fortuna cuando fallezcan sus padres. La lle', 'pago', 99999, '../carpeta_pdf/6627218eb31b49.78398301.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL,
  `descripcion` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id_rol`, `descripcion`) VALUES
(1, 'Administrador'),
(2, 'Usuario');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(150) DEFAULT NULL,
  `correo` varchar(150) DEFAULT NULL,
  `clave` varchar(12) DEFAULT NULL,
  `fecha_registro` timestamp NULL DEFAULT current_timestamp(),
  `id_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `correo`, `clave`, `fecha_registro`, `id_rol`) VALUES
(90, 'mafes', 'mafe@gmail.com', 'ZJ9moWU=', '2024-04-17 02:16:04', 1),
(94, 'jo', 'jo@gmail.com', 'ZJ9m', '2024-04-17 01:28:12', 2),
(95, 'wq', 'wq@gmail.com', 'ZJ9moWU=', '2024-04-17 01:52:46', 2),
(96, 'po', 'po@gmail.com', 'ZJ9m', '2024-04-17 01:59:53', 2),
(97, 'je', 'je@gmail.com', 'ZJ9m', '2024-04-17 02:04:18', 2),
(98, 'we', 'we@gmail.com', 'ZJ9m', '2024-04-17 02:05:19', 2),
(99, 'qw', 'qw@gmail.com', 'ZqBm', '2024-04-17 02:14:08', 2),
(100, 'c', 'c@gmail.com', 'ZJ9moWU=', '2024-04-17 02:19:14', 2),
(101, 'pepe', 'pepes@gmail.com', 'ZJ9moWWZ', '2024-04-17 05:00:09', 2),
(102, 'ot', 'ot@gmail.com', 'ZJ9m', '2024-04-17 05:56:47', 2),
(103, 'Pepe', 'peep@gmail.com', 'ZJ9m', '2024-04-17 07:47:13', 1),
(104, 'epe', 'epe@gmail.com', 'ZJ9m', '2024-04-17 08:01:28', 2),
(105, 'epe', 'epe@gmail.com', 'ZJ9m', '2024-04-17 08:02:16', 2),
(107, 'epe', 'epe@gmail.com', 'ZJ9m', '2024-04-17 08:03:45', 2),
(108, 'y', 'y@gmail.com', 'ZJ9m', '2024-04-17 08:10:18', 2),
(109, 'q', 'q@gmail.com', 'ZJ9m', '2024-04-17 09:33:43', 2),
(111, 'a', 'a@gmail.com', 'Y51j', '2024-04-21 21:03:15', 2),
(112, 'r', 'r@gmail.com', 'ZJ9m', '2024-04-23 02:22:48', 2),
(113, 'Maria', 'maria@gmail.com', 'Y55jng==', '2024-04-23 02:49:22', 2),
(114, 'Flor', 'flor@gmail.com', 'ZJ9m', '2024-04-23 19:50:37', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `compra_descarga`
--
ALTER TABLE `compra_descarga`
  ADD PRIMARY KEY (`id_transaccion`);

--
-- Indexes for table `descarga`
--
ALTER TABLE `descarga`
  ADD PRIMARY KEY (`id_transaccion`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `libro`
--
ALTER TABLE `libro`
  ADD PRIMARY KEY (`id_libro`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_rol` (`id_rol`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `compra_descarga`
--
ALTER TABLE `compra_descarga`
  MODIFY `id_transaccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=371;

--
-- AUTO_INCREMENT for table `descarga`
--
ALTER TABLE `descarga`
  MODIFY `id_transaccion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `libro`
--
ALTER TABLE `libro`
  MODIFY `id_libro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
