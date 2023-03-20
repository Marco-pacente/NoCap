-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mar 20, 2023 alle 17:35
-- Versione del server: 10.4.27-MariaDB
-- Versione PHP: 8.1.12

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
  `descrizione` varchar(50) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `materiale` varchar(15) NOT NULL,
  `id_fornitore` int(11) NOT NULL,
  `path_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `cappelli`
--

INSERT INTO `cappelli` (`id_cap`, `nome`, `descrizione`, `tipo`, `materiale`, `id_fornitore`, `path_img`) VALUES
(1, 'Cappo', 'Un cappello per tutte le occasioni', 'Cappello di lana', 'Amianto', 1, 'https://m.media-amazon.com/images/W/IMAGERENDERING_521856-T1/images/I/81FTHplsagL._AC_UX679_.jpg');

-- --------------------------------------------------------

--
-- Struttura della tabella `carrello`
--

CREATE TABLE `carrello` (
  `id_user` int(11) NOT NULL,
  `id_storage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `carrello`
--

INSERT INTO `carrello` (`id_user`, `id_storage`) VALUES
(9, 1),
(9, 2);

-- --------------------------------------------------------

--
-- Struttura della tabella `fornitore`
--

CREATE TABLE `fornitore` (
  `id_fornitore` int(11) NOT NULL,
  `nome` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `fornitore`
--

INSERT INTO `fornitore` (`id_fornitore`, `nome`) VALUES
(1, 'Capponi'),
(2, 'Jesse'),
(3, 'Trim');

-- --------------------------------------------------------

--
-- Struttura della tabella `storage`
--

CREATE TABLE `storage` (
  `id_storage` int(11) NOT NULL,
  `id_cap` int(11) NOT NULL,
  `taglia` varchar(6) NOT NULL,
  `colore` varchar(15) NOT NULL,
  `quantità` int(11) NOT NULL,
  `prezzo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `storage`
--

INSERT INTO `storage` (`id_storage`, `id_cap`, `taglia`, `colore`, `quantità`, `prezzo`) VALUES
(1, 1, 'M', 'Rossone', 1000, 1299),
(2, 1, 'L', 'Grigio', 123, 3000);

-- --------------------------------------------------------

--
-- Struttura della tabella `tipo`
--

CREATE TABLE `tipo` (
  `tipo` varchar(50) NOT NULL,
  `path_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `tipo`
--

INSERT INTO `tipo` (`tipo`, `path_img`) VALUES
('Berretto', 'https://newlupetto.com/2608-amazon/cappello-basic-con-visiera-unisex-uomo-donna-.jpg'),
('Cappello di lana', 'https://www.cappelleriamelegari.com/bmz_cache/0/0351f3debaf97502f556011c46411781.image.750x750.jpg'),
('Fedora', 'https://www.bon-clic-bon-genre.it/photo/px1844-noir-1_20221026111212.jpg');

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(30) NOT NULL,
  `birthdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `email`, `birthdate`) VALUES
(6, 'admin', '$2y$10$bbiePahbHxur30dJSh.urOovphUQPl4TMZCZop5/0kq0myifm5ai6', 'admin@nocap.com', '1970-01-01'),
(8, 'marcopacente', '$2y$10$W8JygRXiMWEbrPA2FjAWi.g2jCv.PCyXpW78VZQfl83GZoyc7z8bS', 'paxmarco7122@gmail.com', '2004-01-01'),
(9, 'username', '$2y$10$kg0/vnsiA/BEemmsfXKRXevB3Cn8qDOQi4GPXsd80hm4BaJK6Icy.', 'aa@gmail.com', '2004-12-12');

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
-- Indici per le tabelle `carrello`
--
ALTER TABLE `carrello`
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_storage` (`id_storage`);

--
-- Indici per le tabelle `fornitore`
--
ALTER TABLE `fornitore`
  ADD PRIMARY KEY (`id_fornitore`);

--
-- Indici per le tabelle `storage`
--
ALTER TABLE `storage`
  ADD PRIMARY KEY (`id_storage`),
  ADD KEY `id_cap` (`id_cap`);

--
-- Indici per le tabelle `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`tipo`);

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `cappelli`
--
ALTER TABLE `cappelli`
  MODIFY `id_cap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT per la tabella `fornitore`
--
ALTER TABLE `fornitore`
  MODIFY `id_fornitore` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT per la tabella `storage`
--
ALTER TABLE `storage`
  MODIFY `id_storage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
