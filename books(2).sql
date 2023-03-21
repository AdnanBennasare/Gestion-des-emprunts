-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2023 at 02:02 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `books`
--

-- --------------------------------------------------------

--
-- Table structure for table `adherent`
--

CREATE TABLE `adherent` (
  `code_adherent` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` int(11) NOT NULL,
  `cin` varchar(50) NOT NULL,
  `date_birth` date NOT NULL,
  `type` varchar(255) NOT NULL,
  `penaltie` int(11) NOT NULL,
  `nickname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_creation` date NOT NULL,
  `admin` int(50) DEFAULT NULL,
  `banned` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adherent`
--

INSERT INTO `adherent` (`code_adherent`, `nome`, `adresse`, `email`, `phone`, `cin`, `date_birth`, `type`, `penaltie`, `nickname`, `password`, `date_creation`, `admin`, `banned`) VALUES
(30, 'adnan', 'Hay haj kadouur ', 'adnanbennasare@gmail.com', 620301458, 'adnan1234', '2023-03-15', 'Employe', 0, 'adnan20066', '$2y$10$3IQDq0.5oPfieaXdLyPytOTBSxmPg3g0G1pde/NdlU6OpGsSwXTfK', '2023-03-11', 1, 0),
(31, 'sofian', 'hay haj kaddour', 'sofian133@gmail.com', 650230214, 'sofian1234', '2023-03-15', 'Fonctionnaire', 2, 'sofian1234', '$2y$10$oBGJgdd7Yd4he3CJ8lqtdOnH/D.JZbG.xIokEw0ZcRc7OlyEKwLxq', '2023-03-11', 0, 0),
(32, 'akram', 'hay haj akaddor', 'akram@gmail.com', 620154879, 'kb223366', '2023-03-21', 'Etudiant', 0, 'akram1122', '$2y$10$BlHbvAB1a64xNOmOJkUZZOT494xdQgl2imEIbDu7NQ6HUxNEY0cmW', '2023-03-16', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `emprunt`
--

CREATE TABLE `emprunt` (
  `code_emprunt` int(11) NOT NULL,
  `date_emprunt` date NOT NULL,
  `date_retour` date DEFAULT NULL,
  `code_ouvrage` int(11) NOT NULL,
  `code_reservation` int(11) NOT NULL,
  `code_adherent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `emprunt`
--

INSERT INTO `emprunt` (`code_emprunt`, `date_emprunt`, `date_retour`, `code_ouvrage`, `code_reservation`, `code_adherent`) VALUES
(26, '2023-03-11', '2023-03-11', 73, 22, 30),
(27, '2023-03-11', '2023-03-12', 74, 23, 30),
(28, '2023-03-11', '2023-03-12', 75, 24, 30),
(29, '2023-01-11', '0000-00-00', 93, 28, 31),
(30, '2023-01-11', '0000-00-00', 94, 29, 31),
(31, '2023-01-11', '2023-03-12', 98, 30, 31),
(32, '2023-01-11', '2023-03-12', 88, 34, 30),
(33, '2023-03-12', '2023-03-12', 73, 50, 30),
(34, '2023-03-12', '0000-00-00', 75, 51, 30),
(35, '2023-03-12', '0000-00-00', 73, 54, 31),
(36, '2023-03-16', '0000-00-00', 78, 58, 32),
(37, '2023-03-16', '2023-03-19', 80, 57, 32),
(38, '2023-03-16', '0000-00-00', 77, 56, 32);

-- --------------------------------------------------------

--
-- Table structure for table `ouvrage`
--

CREATE TABLE `ouvrage` (
  `code_ouvrage` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `nom_lauteur` varchar(220) NOT NULL,
  `image` varchar(220) NOT NULL,
  `status` varchar(220) NOT NULL,
  `type` varchar(220) NOT NULL,
  `date_edition` date NOT NULL,
  `date_purchase` date NOT NULL,
  `num_pages` int(11) NOT NULL,
  `ouvrage_state` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ouvrage`
--

INSERT INTO `ouvrage` (`code_ouvrage`, `titre`, `nom_lauteur`, `image`, `status`, `type`, `date_edition`, `date_purchase`, `num_pages`, `ouvrage_state`) VALUES
(73, 'Hensley nerty', 'Jolene Hensley', 'IMG-640cfb08ba0da8.05296269.jpg', 'Acceptable', 'des cassettes', '1986-11-21', '2018-03-17', 7, 'empruntez'),
(74, 'Hensley nerty', 'Jolene Hensley', 'IMG-640cfb08ba0da8.05296269.jpg', 'Acceptable', 'des cassettes', '1986-11-21', '2018-03-17', 7, 'reserved'),
(75, 'Hensley nerty', 'Jolene Hensley', 'IMG-640cfb08ba0da8.05296269.jpg', 'Acceptable', 'des cassettes', '1986-11-21', '2018-03-17', 7, 'empruntez'),
(76, 'Hensley nerty', 'Jolene Hensley', 'IMG-640cfb08ba0da8.05296269.jpg', 'Acceptable', 'des cassettes', '1986-11-21', '2018-03-17', 7, 'available'),
(77, 'Hensley nerty', 'Jolene Hensley', 'IMG-640cfb08ba0da8.05296269.jpg', 'Acceptable', 'des cassettes', '1986-11-21', '2018-03-17', 7, 'empruntez'),
(78, 'Hensley nerty', 'Jolene Hensley', 'IMG-640cfb08ba0da8.05296269.jpg', 'Acceptable', 'des cassettes', '1986-11-21', '2018-03-17', 7, 'empruntez'),
(79, 'Hensley nerty', 'Jolene Hensley', 'IMG-640cfb08ba0da8.05296269.jpg', 'Acceptable', 'des cassettes', '1986-11-21', '2018-03-17', 7, 'available'),
(80, 'Hensley nerty', 'Jolene Hensley', 'IMG-640cfb08ba0da8.05296269.jpg', 'Acceptable', 'des cassettes', '1986-11-21', '2018-03-17', 7, 'available'),
(81, 'Hensley nerty', 'Jolene Hensley', 'IMG-640cfb08ba0da8.05296269.jpg', 'Acceptable', 'des cassettes', '1986-11-21', '2018-03-17', 7, 'available'),
(82, 'Hensley nerty', 'Jolene Hensley', 'IMG-640cfb08ba0da8.05296269.jpg', 'Acceptable', 'des cassettes', '1986-11-21', '2018-03-17', 7, 'available'),
(83, 'Hensley nerty', 'Jolene Hensley', 'IMG-640cfb08ba0da8.05296269.jpg', 'Acceptable', 'des cassettes', '1986-11-21', '2018-03-17', 7, 'available'),
(84, 'Hensley nerty', 'Jolene Hensley', 'IMG-640cfb08ba0da8.05296269.jpg', 'Acceptable', 'des cassettes', '1986-11-21', '2018-03-17', 7, 'available'),
(85, 'Hensley nerty', 'Jolene Hensley', 'IMG-640cfb08ba0da8.05296269.jpg', 'Acceptable', 'des cassettes', '1986-11-21', '2018-03-17', 7, 'available'),
(86, 'Hensley nerty', 'Jolene Hensley', 'IMG-640cfb08ba0da8.05296269.jpg', 'Acceptable', 'des cassettes', '1986-11-21', '2018-03-17', 7, 'available'),
(87, 'Hensley nerty', 'Jolene Hensley', 'IMG-640cfb08ba0da8.05296269.jpg', 'Acceptable', 'des cassettes', '1986-11-21', '2018-03-17', 7, 'available'),
(88, 'Hensley nerty', 'Jolene Hensley', 'IMG-640cfb08ba0da8.05296269.jpg', 'Acceptable', 'des cassettes', '1986-11-21', '2018-03-17', 7, 'available'),
(89, 'Hensley nerty', 'Jolene Hensley', 'IMG-640cfb08ba0da8.05296269.jpg', 'Acceptable', 'des cassettes', '1986-11-21', '2018-03-17', 7, 'available'),
(90, 'Hensley nerty', 'Jolene Hensley', 'IMG-640cfb08ba0da8.05296269.jpg', 'Acceptable', 'des cassettes', '1986-11-21', '2018-03-17', 7, 'available'),
(91, 'Hensley nerty', 'Jolene Hensley', 'IMG-640cfb08ba0da8.05296269.jpg', 'Acceptable', 'des cassettes', '1986-11-21', '2018-03-17', 7, 'available'),
(93, 'Hannah Kinney', 'Hannah Kinney', 'IMG-640cfb2d3c8232.16715216.jpg', 'Bon état', 'Livres', '2006-02-24', '1979-10-20', 92, 'empruntez'),
(94, 'Hannah Kinney', 'Hannah Kinney', 'IMG-640cfb2d3c8232.16715216.jpg', 'Bon état', 'Livres', '2006-02-24', '1979-10-20', 92, 'empruntez'),
(95, 'Hannah Kinney', 'Hannah Kinney', 'IMG-640cfb2d3c8232.16715216.jpg', 'Bon état', 'Livres', '2006-02-24', '1979-10-20', 92, 'available'),
(96, 'Hannah Kinney', 'Hannah Kinney', 'IMG-640cfb2d3c8232.16715216.jpg', 'Bon état', 'Livres', '2006-02-24', '1979-10-20', 92, 'available'),
(97, 'Hannah Kinney', 'Hannah Kinney', 'IMG-640cfb2d3c8232.16715216.jpg', 'Bon état', 'Livres', '2006-02-24', '1979-10-20', 92, 'available'),
(98, 'Hannah Kinney', 'Hannah Kinney', 'IMG-640cfb2d3c8232.16715216.jpg', 'Bon état', 'Livres', '2006-02-24', '1979-10-20', 92, 'available'),
(99, 'Hannah Kinney', 'Hannah Kinney', 'IMG-640cfb2d3c8232.16715216.jpg', 'Bon état', 'Livres', '2006-02-24', '1979-10-20', 92, 'available'),
(100, 'Hannah Kinney', 'Hannah Kinney', 'IMG-640cfb2d3c8232.16715216.jpg', 'Bon état', 'Livres', '2006-02-24', '1979-10-20', 92, 'available'),
(101, 'Hannah Kinney', 'Hannah Kinney', 'IMG-640cfb2d3c8232.16715216.jpg', 'Bon état', 'Livres', '2006-02-24', '1979-10-20', 92, 'available'),
(102, 'Hannah Kinney', 'Hannah Kinney', 'IMG-640cfb2d3c8232.16715216.jpg', 'Bon état', 'Livres', '2006-02-24', '1979-10-20', 92, 'available'),
(103, 'Hannah Kinney', 'Hannah Kinney', 'IMG-640cfb2d3c8232.16715216.jpg', 'Bon état', 'Livres', '2006-02-24', '1979-10-20', 92, 'available'),
(104, 'Hannah Kinney', 'Hannah Kinney', 'IMG-640cfb2d3c8232.16715216.jpg', 'Bon état', 'Livres', '2006-02-24', '1979-10-20', 92, 'available'),
(105, 'Hannah Kinney', 'Hannah Kinney', 'IMG-640cfb2d3c8232.16715216.jpg', 'Bon état', 'Livres', '2006-02-24', '1979-10-20', 92, 'available'),
(106, 'Hannah Kinney', 'Hannah Kinney', 'IMG-640cfb2d3c8232.16715216.jpg', 'Bon état', 'Livres', '2006-02-24', '1979-10-20', 92, 'available'),
(107, 'Hannah Kinney', 'Hannah Kinney', 'IMG-640cfb2d3c8232.16715216.jpg', 'Bon état', 'Livres', '2006-02-24', '1979-10-20', 92, 'available'),
(108, '11-Nov-1999', 'Xenos Lawrence', 'IMG-640d6e13a761f5.25679534.jpg', 'Assez usé', 'DVDs', '2006-08-17', '1989-02-09', 23, 'available'),
(109, '11-Nov-1999', 'Xenos Lawrence', 'IMG-640d6e13a761f5.25679534.jpg', 'Assez usé', 'DVDs', '2006-08-17', '1989-02-09', 23, 'available'),
(110, '11-Nov-1999', 'Xenos Lawrence', 'IMG-640d6e13a761f5.25679534.jpg', 'Assez usé', 'DVDs', '2006-08-17', '1989-02-09', 23, 'available'),
(111, '11-Nov-1999', 'Xenos Lawrence', 'IMG-640d6e13a761f5.25679534.jpg', 'Assez usé', 'DVDs', '2006-08-17', '1989-02-09', 23, 'available'),
(112, '11-Nov-1999', 'Xenos Lawrence', 'IMG-640d6e13a761f5.25679534.jpg', 'Assez usé', 'DVDs', '2006-08-17', '1989-02-09', 23, 'available'),
(113, '11-Nov-1999', 'Xenos Lawrence', 'IMG-640d6e13a761f5.25679534.jpg', 'Assez usé', 'DVDs', '2006-08-17', '1989-02-09', 23, 'available'),
(114, '11-Nov-1999', 'Xenos Lawrence', 'IMG-640d6e13a761f5.25679534.jpg', 'Assez usé', 'DVDs', '2006-08-17', '1989-02-09', 23, 'available'),
(115, '27-Apr-1987', 'Athena Nash', 'IMG-640d6eb8b45ca6.44700534.jpg', 'Acceptable', 'DVDs', '1982-06-20', '2007-10-09', 67, 'available'),
(116, '27-Apr-1987', 'Athena Nash', 'IMG-640d6eb8b45ca6.44700534.jpg', 'Acceptable', 'DVDs', '1982-06-20', '2007-10-09', 67, 'available'),
(117, '27-Apr-1987', 'Athena Nash', 'IMG-640d6eb8b45ca6.44700534.jpg', 'Acceptable', 'DVDs', '1982-06-20', '2007-10-09', 67, 'available'),
(118, '27-Apr-1987', 'Athena Nash', 'IMG-640d6eb8b45ca6.44700534.jpg', 'Acceptable', 'DVDs', '1982-06-20', '2007-10-09', 67, 'available'),
(119, '27-Apr-1987', 'Athena Nash', 'IMG-640d6eb8b45ca6.44700534.jpg', 'Acceptable', 'DVDs', '1982-06-20', '2007-10-09', 67, 'available'),
(120, '27-Apr-1987', 'Athena Nash', 'IMG-640d6eb8b45ca6.44700534.jpg', 'Acceptable', 'DVDs', '1982-06-20', '2007-10-09', 67, 'available'),
(121, '27-Apr-1987', 'Athena Nash', 'IMG-640d6eb8b45ca6.44700534.jpg', 'Acceptable', 'DVDs', '1982-06-20', '2007-10-09', 67, 'available'),
(122, '27-Apr-1987', 'Athena Nash', 'IMG-640d6eb8b45ca6.44700534.jpg', 'Acceptable', 'DVDs', '1982-06-20', '2007-10-09', 67, 'available'),
(123, '27-Apr-1987', 'Athena Nash', 'IMG-640d6eb8b45ca6.44700534.jpg', 'Acceptable', 'DVDs', '1982-06-20', '2007-10-09', 67, 'available'),
(124, '27-Apr-1987', 'Athena Nash', 'IMG-640d6eb8b45ca6.44700534.jpg', 'Acceptable', 'DVDs', '1982-06-20', '2007-10-09', 67, 'available'),
(125, '27-Apr-1987', 'Athena Nash', 'IMG-640d6eb8b45ca6.44700534.jpg', 'Acceptable', 'DVDs', '1982-06-20', '2007-10-09', 67, 'available'),
(126, '27-Apr-1987', 'Athena Nash', 'IMG-640d6eb8b45ca6.44700534.jpg', 'Acceptable', 'DVDs', '1982-06-20', '2007-10-09', 67, 'available'),
(127, '27-Apr-1987', 'Athena Nash', 'IMG-640d6eb8b45ca6.44700534.jpg', 'Acceptable', 'DVDs', '1982-06-20', '2007-10-09', 67, 'available'),
(128, '27-Apr-1987', 'Athena Nash', 'IMG-640d6eb8b45ca6.44700534.jpg', 'Acceptable', 'DVDs', '1982-06-20', '2007-10-09', 67, 'available'),
(129, '27-Apr-1987', 'Athena Nash', 'IMG-640d6eb8b45ca6.44700534.jpg', 'Acceptable', 'DVDs', '1982-06-20', '2007-10-09', 67, 'available'),
(130, '27-Apr-1987', 'Athena Nash', 'IMG-640d6eb8b45ca6.44700534.jpg', 'Acceptable', 'DVDs', '1982-06-20', '2007-10-09', 67, 'available'),
(131, '27-Apr-1987', 'Athena Nash', 'IMG-640d6eb8b45ca6.44700534.jpg', 'Acceptable', 'DVDs', '1982-06-20', '2007-10-09', 67, 'available'),
(132, '27-Apr-1987', 'Athena Nash', 'IMG-640d6eb8b45ca6.44700534.jpg', 'Acceptable', 'DVDs', '1982-06-20', '2007-10-09', 67, 'available'),
(133, '27-Apr-1987', 'Athena Nash', 'IMG-640d6eb8b45ca6.44700534.jpg', 'Acceptable', 'DVDs', '1982-06-20', '2007-10-09', 67, 'available'),
(134, '27-Apr-1987', 'Athena Nash', 'IMG-640d6eb8b45ca6.44700534.jpg', 'Acceptable', 'DVDs', '1982-06-20', '2007-10-09', 67, 'available'),
(135, '27-Apr-1987', 'Athena Nash', 'IMG-640d6eb8b45ca6.44700534.jpg', 'Acceptable', 'DVDs', '1982-06-20', '2007-10-09', 67, 'available'),
(136, '27-Apr-1987', 'Athena Nash', 'IMG-640d6eb8b45ca6.44700534.jpg', 'Acceptable', 'DVDs', '1982-06-20', '2007-10-09', 67, 'available'),
(137, '27-Apr-1987', 'Athena Nash', 'IMG-640d6eb8b45ca6.44700534.jpg', 'Acceptable', 'DVDs', '1982-06-20', '2007-10-09', 67, 'available'),
(138, '31-Dec-1985', 'TaShya Bentley', 'IMG-640d6efad6d723.69320412.jpg', 'Assez usé', 'CDs', '2010-01-13', '2013-02-09', 29, 'available'),
(139, '31-Dec-1985', 'TaShya Bentley', 'IMG-640d6efad6d723.69320412.jpg', 'Assez usé', 'CDs', '2010-01-13', '2013-02-09', 29, 'available'),
(140, '31-Dec-1985', 'TaShya Bentley', 'IMG-640d6efad6d723.69320412.jpg', 'Assez usé', 'CDs', '2010-01-13', '2013-02-09', 29, 'available'),
(141, '31-Dec-1985', 'TaShya Bentley', 'IMG-640d6efad6d723.69320412.jpg', 'Assez usé', 'CDs', '2010-01-13', '2013-02-09', 29, 'available'),
(142, '31-Dec-1985', 'TaShya Bentley', 'IMG-640d6efad6d723.69320412.jpg', 'Assez usé', 'CDs', '2010-01-13', '2013-02-09', 29, 'available'),
(143, '31-Dec-1985', 'TaShya Bentley', 'IMG-640d6efad6d723.69320412.jpg', 'Assez usé', 'CDs', '2010-01-13', '2013-02-09', 29, 'available'),
(144, '31-Dec-1985', 'TaShya Bentley', 'IMG-640d6efad6d723.69320412.jpg', 'Assez usé', 'CDs', '2010-01-13', '2013-02-09', 29, 'available'),
(145, '31-Dec-1985', 'TaShya Bentley', 'IMG-640d6efad6d723.69320412.jpg', 'Assez usé', 'CDs', '2010-01-13', '2013-02-09', 29, 'available'),
(146, '31-Dec-1985', 'TaShya Bentley', 'IMG-640d6efad6d723.69320412.jpg', 'Assez usé', 'CDs', '2010-01-13', '2013-02-09', 29, 'available'),
(147, '31-Dec-1985', 'TaShya Bentley', 'IMG-640d6efad6d723.69320412.jpg', 'Assez usé', 'CDs', '2010-01-13', '2013-02-09', 29, 'available'),
(148, '09-Apr-1981', 'Bo Kinney', 'IMG-640d6f3c8511e3.85208277.jpg', 'Assez usé', 'des revues', '2004-07-03', '2013-11-17', 86, 'available'),
(149, '04-Sep-1993', 'Lars Hutchinson', 'IMG-640d6fd25dbca4.83233698.jpg', 'Acceptable', 'CDs', '2019-06-10', '2002-12-26', 14, 'available'),
(150, '02-Dec-1994', 'Stephanie Poole', 'IMG-640d708f7ec107.03226457.jpg', 'Bon état', 'des revues', '1986-02-11', '2008-12-28', 21, 'available'),
(151, '14-Jun-2004', 'Elmo Knowles', 'IMG-640d709a508800.42739968.jpg', 'Déchiré', 'CDs', '2002-08-09', '2015-10-15', 44, 'available'),
(152, '14-Jun-2004', 'Elmo Knowles', 'IMG-640d709a508800.42739968.jpg', 'Déchiré', 'CDs', '2002-08-09', '2015-10-15', 44, 'available'),
(153, '14-Jun-2004', 'Elmo Knowles', 'IMG-640d709a508800.42739968.jpg', 'Déchiré', 'CDs', '2002-08-09', '2015-10-15', 44, 'available'),
(154, '14-Jun-2004', 'Elmo Knowles', 'IMG-640d709a508800.42739968.jpg', 'Déchiré', 'CDs', '2002-08-09', '2015-10-15', 44, 'available'),
(155, '14-Jun-2004', 'Elmo Knowles', 'IMG-640d709a508800.42739968.jpg', 'Déchiré', 'CDs', '2002-08-09', '2015-10-15', 44, 'available'),
(156, '14-Jun-2004', 'Elmo Knowles', 'IMG-640d709a508800.42739968.jpg', 'Déchiré', 'CDs', '2002-08-09', '2015-10-15', 44, 'available'),
(157, '14-Jun-2004', 'Elmo Knowles', 'IMG-640d709a508800.42739968.jpg', 'Déchiré', 'CDs', '2002-08-09', '2015-10-15', 44, 'available'),
(158, '14-Jun-2004', 'Elmo Knowles', 'IMG-640d709a508800.42739968.jpg', 'Déchiré', 'CDs', '2002-08-09', '2015-10-15', 44, 'available'),
(159, '14-Jun-2004', 'Elmo Knowles', 'IMG-640d709a508800.42739968.jpg', 'Déchiré', 'CDs', '2002-08-09', '2015-10-15', 44, 'available'),
(160, '23-Dec-2020', 'Sopoline Nielsen', 'IMG-640d70ee6bca00.09998311.jpeg', 'Assez usé', 'CDs', '2015-09-25', '2017-04-20', 18, 'available'),
(161, '23-Dec-2020', 'Sopoline Nielsen', 'IMG-640d70ee6bca00.09998311.jpeg', 'Assez usé', 'CDs', '2015-09-25', '2017-04-20', 18, 'available'),
(162, '23-Dec-2020', 'Sopoline Nielsen', 'IMG-640d70ee6bca00.09998311.jpeg', 'Assez usé', 'CDs', '2015-09-25', '2017-04-20', 18, 'available'),
(163, '23-Dec-2020', 'Sopoline Nielsen', 'IMG-640d70ee6bca00.09998311.jpeg', 'Assez usé', 'CDs', '2015-09-25', '2017-04-20', 18, 'available'),
(164, '23-Dec-2020', 'Sopoline Nielsen', 'IMG-640d70ee6bca00.09998311.jpeg', 'Assez usé', 'CDs', '2015-09-25', '2017-04-20', 18, 'available'),
(165, '23-Dec-2020', 'Sopoline Nielsen', 'IMG-640d70ee6bca00.09998311.jpeg', 'Assez usé', 'CDs', '2015-09-25', '2017-04-20', 18, 'available'),
(166, '23-Dec-2020', 'Sopoline Nielsen', 'IMG-640d70ee6bca00.09998311.jpeg', 'Assez usé', 'CDs', '2015-09-25', '2017-04-20', 18, 'available'),
(167, '23-Dec-2020', 'Sopoline Nielsen', 'IMG-640d70ee6bca00.09998311.jpeg', 'Assez usé', 'CDs', '2015-09-25', '2017-04-20', 18, 'available'),
(168, '23-Dec-2020', 'Sopoline Nielsen', 'IMG-640d70ee6bca00.09998311.jpeg', 'Assez usé', 'CDs', '2015-09-25', '2017-04-20', 18, 'available'),
(169, '23-Dec-2020', 'Sopoline Nielsen', 'IMG-640d70ee6bca00.09998311.jpeg', 'Assez usé', 'CDs', '2015-09-25', '2017-04-20', 18, 'available'),
(170, '23-Dec-2020', 'Sopoline Nielsen', 'IMG-640d70ee6bca00.09998311.jpeg', 'Assez usé', 'CDs', '2015-09-25', '2017-04-20', 18, 'available'),
(171, '23-Dec-2020', 'Sopoline Nielsen', 'IMG-640d70ee6bca00.09998311.jpeg', 'Assez usé', 'CDs', '2015-09-25', '2017-04-20', 18, 'available'),
(172, '11-Jan-1997', 'Josiah Wooten', 'IMG-640d70fb0c27a0.42011496.jpeg', 'Assez usé', 'CDs', '1998-11-20', '1982-01-11', 24, 'available'),
(173, '11-Jan-1997', 'Josiah Wooten', 'IMG-640d70fb0c27a0.42011496.jpeg', 'Assez usé', 'CDs', '1998-11-20', '1982-01-11', 24, 'available'),
(174, '11-Jan-1997', 'Josiah Wooten', 'IMG-640d70fb0c27a0.42011496.jpeg', 'Assez usé', 'CDs', '1998-11-20', '1982-01-11', 24, 'available'),
(175, '11-Jan-1997', 'Josiah Wooten', 'IMG-640d70fb0c27a0.42011496.jpeg', 'Assez usé', 'CDs', '1998-11-20', '1982-01-11', 24, 'available'),
(176, '11-Jan-1997', 'Josiah Wooten', 'IMG-640d70fb0c27a0.42011496.jpeg', 'Assez usé', 'CDs', '1998-11-20', '1982-01-11', 24, 'available'),
(177, '11-Jan-1997', 'Josiah Wooten', 'IMG-640d70fb0c27a0.42011496.jpeg', 'Assez usé', 'CDs', '1998-11-20', '1982-01-11', 24, 'available'),
(178, '11-Jan-1997', 'Josiah Wooten', 'IMG-640d70fb0c27a0.42011496.jpeg', 'Assez usé', 'CDs', '1998-11-20', '1982-01-11', 24, 'available'),
(179, '11-Jan-1997', 'Josiah Wooten', 'IMG-640d70fb0c27a0.42011496.jpeg', 'Assez usé', 'CDs', '1998-11-20', '1982-01-11', 24, 'available'),
(180, '12-May-2017', 'Edan York', 'IMG-640d7135104665.22046660.jpeg', 'Acceptable', 'CDs', '1995-09-17', '1989-05-01', 58, 'available'),
(181, '12-May-2017', 'Edan York', 'IMG-640d7135104665.22046660.jpeg', 'Acceptable', 'CDs', '1995-09-17', '1989-05-01', 58, 'available'),
(182, '12-May-2017', 'Edan York', 'IMG-640d7135104665.22046660.jpeg', 'Acceptable', 'CDs', '1995-09-17', '1989-05-01', 58, 'available'),
(183, '12-May-2017', 'Edan York', 'IMG-640d7135104665.22046660.jpeg', 'Acceptable', 'CDs', '1995-09-17', '1989-05-01', 58, 'available'),
(184, '21-Feb-1989', 'Holly Abbott', 'IMG-640d7141532887.67250636.jpg', 'Bon état', 'des revues', '2019-04-21', '1977-06-13', 15, 'available'),
(185, '21-Feb-1989', 'Holly Abbott', 'IMG-640d7141532887.67250636.jpg', 'Bon état', 'des revues', '2019-04-21', '1977-06-13', 15, 'available'),
(186, '21-Feb-1989', 'Holly Abbott', 'IMG-640d7141532887.67250636.jpg', 'Bon état', 'des revues', '2019-04-21', '1977-06-13', 15, 'available'),
(187, '21-Feb-1989', 'Holly Abbott', 'IMG-640d7141532887.67250636.jpg', 'Bon état', 'des revues', '2019-04-21', '1977-06-13', 15, 'available'),
(188, '21-Feb-1989', 'Holly Abbott', 'IMG-640d7141532887.67250636.jpg', 'Bon état', 'des revues', '2019-04-21', '1977-06-13', 15, 'available'),
(189, '21-Feb-1989', 'Holly Abbott', 'IMG-640d7141532887.67250636.jpg', 'Bon état', 'des revues', '2019-04-21', '1977-06-13', 15, 'available');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `code_reservation` int(11) NOT NULL,
  `date_reservation` datetime NOT NULL,
  `date_expiration` datetime NOT NULL,
  `code_ouvrage` int(11) NOT NULL,
  `code_adherent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`code_reservation`, `date_reservation`, `date_expiration`, `code_ouvrage`, `code_adherent`) VALUES
(59, '2023-03-19 02:20:10', '2023-03-20 02:20:10', 74, 32);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adherent`
--
ALTER TABLE `adherent`
  ADD PRIMARY KEY (`code_adherent`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `cin` (`cin`),
  ADD UNIQUE KEY `nickname` (`nickname`);

--
-- Indexes for table `emprunt`
--
ALTER TABLE `emprunt`
  ADD PRIMARY KEY (`code_emprunt`),
  ADD UNIQUE KEY `code_reservation` (`code_reservation`),
  ADD KEY `code_ouvrage` (`code_ouvrage`),
  ADD KEY `code_adherent` (`code_adherent`);

--
-- Indexes for table `ouvrage`
--
ALTER TABLE `ouvrage`
  ADD PRIMARY KEY (`code_ouvrage`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`code_reservation`),
  ADD KEY `code_ouvrage` (`code_ouvrage`),
  ADD KEY `code_adherent` (`code_adherent`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adherent`
--
ALTER TABLE `adherent`
  MODIFY `code_adherent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `emprunt`
--
ALTER TABLE `emprunt`
  MODIFY `code_emprunt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `ouvrage`
--
ALTER TABLE `ouvrage`
  MODIFY `code_ouvrage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=190;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `code_reservation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `emprunt`
--
ALTER TABLE `emprunt`
  ADD CONSTRAINT `emprunt_ibfk_1` FOREIGN KEY (`code_ouvrage`) REFERENCES `ouvrage` (`code_ouvrage`),
  ADD CONSTRAINT `emprunt_ibfk_2` FOREIGN KEY (`code_reservation`) REFERENCES `reservation` (`code_reservation`),
  ADD CONSTRAINT `emprunt_ibfk_3` FOREIGN KEY (`code_adherent`) REFERENCES `adherent` (`code_adherent`);

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`code_ouvrage`) REFERENCES `ouvrage` (`code_ouvrage`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`code_adherent`) REFERENCES `adherent` (`code_adherent`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
