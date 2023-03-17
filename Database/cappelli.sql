-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mar 17, 2023 alle 11:54
-- Versione del server: 10.4.21-MariaDB
-- Versione PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cappelli`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `cappelli`
--

CREATE TABLE `cappelli` (
  `id_cap` int(11) NOT NULL,
  `nome` varchar(15) NOT NULL,
  `descrizione` varchar(140) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `materiale` varchar(15) NOT NULL,
  `id_fornitore` int(11) NOT NULL,
  `path_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `cappelli`
--

INSERT INTO `cappelli` (`id_cap`, `nome`, `descrizione`, `tipo`, `materiale`, `id_fornitore`, `path_img`) VALUES
(2, 'Cappo', 'Un bel cappello', 'Cappello di lana', 'Lana', 1, 'https://www.cappelleria.it/pic/cappello-di-lana-a-righe-con-ganitura-di-velluto.46548a.jpg');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `cappelli`
--
ALTER TABLE `cappelli`
  ADD PRIMARY KEY (`id_cap`),
  ADD KEY `id_fornitore` (`id_fornitore`),
  ADD KEY `tipo` (`tipo`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `cappelli`
--
ALTER TABLE `cappelli`
  MODIFY `id_cap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
