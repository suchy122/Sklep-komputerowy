-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 02 Cze 2020, 13:48
-- Wersja serwera: 10.4.11-MariaDB
-- Wersja PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `sklep_komputerowy`
--
CREATE DATABASE IF NOT EXISTS `sklep_komputerowy` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `sklep_komputerowy`;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE `cart` (
  `idUser` int(11) NOT NULL,
  `idItem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `idCategory` int(11) NOT NULL,
  `nazwa` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `category`
--

INSERT INTO `category` (`idCategory`, `nazwa`) VALUES
(1, 'procesor'),
(2, 'karta graficzna'),
(3, 'ram'),
(4, 'dysk hdd'),
(5, 'dysk ssd'),
(6, 'zasilacz'),
(7, 'płyta główna');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `items`
--

DROP TABLE IF EXISTS `items`;
CREATE TABLE `items` (
  `idItem` int(11) NOT NULL,
  `nazwa` text NOT NULL,
  `cena` decimal(10,2) NOT NULL,
  `idCategory` int(11) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `items`
--

INSERT INTO `items` (`idItem`, `nazwa`, `cena`, `idCategory`, `image`) VALUES
(1, 'Procesor AMD Ryzen 5 3600, 3.6GHz, 32 MB, BOX (100-100000031BOX)', '585.00', 1, '5938599_0_i1064.jpg'),
(2, 'Procesor Intel Core i5-9400F, 2.9GHz, 9 MB, BOX (BX80684I59400F)', '819.00', 1, '5668892_0_i1064.jpg'),
(3, 'Dysk SSD Western Digital Blue 500 GB 2.5\' SATA III (WDS500G2B0A)', '318.00', 5, '1456977_0_i1064.jpg'),
(4, 'Dysk SSD Kingston A2000 500 GB M.2 2280 PCI-E x4 Gen3 NVMe (SA2000M8/500G)', '365.00', 5, '5939304_0_i1064.jpg'),
(5, 'Pamięć ADATA XPG GAMMIX D10, DDR4, 16 GB,3200MHz, CL16 (AX4U320038G16-DB10) ', '369.00', 3, '5550777_0_i1064.jpg'),
(6, 'Pamięć Corsair Vengeance RGB PRO, DDR4, 16 GB,3200MHz, CL16 (CMW16GX4M2C3200C16)', '469.00', 3, '4596109_0_i1064.jpg'),
(7, 'Zasilacz SilentiumPC Supremo L2 V2 550W (SPC139)', '281.00', 6, '774136_18_i1064.jpg'),
(8, 'Zasilacz Chieftec GPS-500A8 500W', '209.00', 6, '536571_0_i1064.jpg'),
(9, 'Karta graficzna Gigabyte GeForce GTX 1660 Gaming OC 6GB GDDR5 (GV-N1660GAMING OC-6GD)', '1169.00', 2, '4144582_0_i1064.jpg'),
(10, 'Karta graficzna Gigabyte Radeon RX 570 Gaming 4GB GDDR5 (GV-RX570GAMING-4GD)', '699.00', 2, '976905_6_i1064.jpg'),
(11, 'Płyta główna Gigabyte B450 AORUS ELITE', '529.00', 7, '5628067_0_i1064.jpg'),
(12, 'Płyta główna MSI MPG X570 GAMING EDGE WIFI', '999.00', 7, '5938606_8_i1064.jpg'),
(13, 'Dysk Toshiba 4 TB 3.5\" SATA III X300 (HDWE140UZSVA)', '606.00', 4, '930692_0_i1064.jpeg'),
(14, 'Dysk Toshiba P300 1 TB 3.5\" SATA III (HDWD110UZSVA)', '192.00', 4, '860921_0_i1064.jpeg');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `idOrder` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idItem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `idUser` int(11) NOT NULL,
  `login` text NOT NULL,
  `haslo` text NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`idUser`, `login`, `haslo`, `email`) VALUES
(1, 'admin', '$2y$10$zqqLqOJ/xo/kiuJXcVrbGufkGwg90WFUPqL5vrbNHmthZ7Me4av1q', 'admin@admin.com'),
(2, 'karol', '$2y$10$j0OJh7/S2z5t/mbPV7iJc./qwtsCqm1Bxcsw0py7bdy0n8dcd8do2', 'karolsuchysuchta@gmail.com');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`idCategory`);

--
-- Indeksy dla tabeli `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`idItem`),
  ADD KEY `kategoria` (`idCategory`);

--
-- Indeksy dla tabeli `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`idOrder`),
  ADD KEY `idItem` (`idItem`),
  ADD KEY `idUser` (`idUser`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `category`
--
ALTER TABLE `category`
  MODIFY `idCategory` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT dla tabeli `items`
--
ALTER TABLE `items`
  MODIFY `idItem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT dla tabeli `orders`
--
ALTER TABLE `orders`
  MODIFY `idOrder` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`idCategory`) REFERENCES `category` (`idCategory`);

--
-- Ograniczenia dla tabeli `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`idItem`) REFERENCES `items` (`idItem`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
