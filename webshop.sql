-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Gegenereerd op: 15 jan 2019 om 00:00
-- Serverversie: 5.7.24-0ubuntu0.18.04.1
-- PHP-versie: 7.2.12-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webshop`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Categorie`
--

CREATE TABLE `Categorie` (
  `CategoryID` int(10) NOT NULL,
  `CategoryName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `Categorie`
--

INSERT INTO `Categorie` (`CategoryID`, `CategoryName`) VALUES
(1, 'Films'),
(2, 'games'),
(7, 'cd\'s');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Delivery`
--

CREATE TABLE `Delivery` (
  `DeliveryID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `Delivery`
--

INSERT INTO `Delivery` (`DeliveryID`, `UserID`) VALUES
(1, 13),
(7, 13);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Menu`
--

CREATE TABLE `Menu` (
  `MenuID` int(10) NOT NULL,
  `MenuName` varchar(50) NOT NULL,
  `MenuLink` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `Menu`
--

INSERT INTO `Menu` (`MenuID`, `MenuName`, `MenuLink`) VALUES
(1, 'Home', ''),
(2, 'Categories', 'category'),
(3, 'SubCategorie', 'subcategory'),
(4, 'Product', 'product'),
(6, 'menu', 'menu'),
(7, 'Winkelwagen', 'cart'),
(8, 'Order', 'order');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `OrderDetails`
--

CREATE TABLE `OrderDetails` (
  `OrderID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `Amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `OrderDetails`
--

INSERT INTO `OrderDetails` (`OrderID`, `ProductID`, `Amount`) VALUES
(1, 3, 2),
(1, 4, 1),
(7, 3, 2),
(7, 4, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Products`
--

CREATE TABLE `Products` (
  `ProductID` int(10) NOT NULL,
  `ProductName` varchar(50) NOT NULL,
  `ProductPrice` decimal(5,2) NOT NULL,
  `ProductImageLink` varchar(50) NOT NULL,
  `ProductDescription` text NOT NULL,
  `SubCategoryID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `Products`
--

INSERT INTO `Products` (`ProductID`, `ProductName`, `ProductPrice`, `ProductImageLink`, `ProductDescription`, `SubCategoryID`) VALUES
(3, 'Red dead redemption', '59.99', 'redDead.jpg', 'Red Dead Redemption is het nieuwste meesterwerk van Rockstar. Jij speelt cowboy John Marston, een voormalige crimineel die aan de grenzen van het Amerikaanse land zijn avonturen beleeft. In een volledig open spelwereld wordt het Wilde Westen op unieke wijze tot leven gebracht.', 1),
(4, 'Fallout 76', '20.00', 'fallout76.jpg', 'Fallout 76 is een multiplayer-actierollenspel ontwikkeld door Bethesda Game Studios. Het spel wordt uitgegeven door Bethesda Softworks en kwam op 14 november 2018 uit voor de PlayStation 4, Windows en de Xbox One. Het is het negende spel in de Fallout-serie en is de opvolger van Fallout 4.', 5);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `subcategorie`
--

CREATE TABLE `subcategorie` (
  `SubCategoryID` int(10) NOT NULL,
  `CategoryID` int(10) NOT NULL,
  `SubCategoryName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `subcategorie`
--

INSERT INTO `subcategorie` (`SubCategoryID`, `CategoryID`, `SubCategoryName`) VALUES
(1, 1, 'Avontuur'),
(2, 2, 'Actie'),
(3, 7, 'Rock\'n Roll'),
(5, 2, 'Avontuur'),
(6, 2, 'RTS'),
(7, 1, 'Drama');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `admin`) VALUES
(12, 'iiii', '123', '$2y$10$s8aNjwIcpwD53zqMjwf8C.AQQb0YSb5tYivQi7d0YVZ5v2PgfJ8t2', 0),
(13, 'Sagartje1993@gmail.com', 'sagar193', '$2y$10$QHbupl3gL/x/zi76Fqx6nuIaX2zPQiBpnO64UFyXI8GayE5kU7e5O', 1),
(16, 'c.mommersteeg@hotmail.com', 'casper', '$2y$10$Q6yj7JUKh551scLjGgWHFuLG4RhvCNLFi6zRzNGMimjuSMNgzXQfS', 0);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `Categorie`
--
ALTER TABLE `Categorie`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Indexen voor tabel `Delivery`
--
ALTER TABLE `Delivery`
  ADD PRIMARY KEY (`DeliveryID`);

--
-- Indexen voor tabel `Menu`
--
ALTER TABLE `Menu`
  ADD PRIMARY KEY (`MenuID`);

--
-- Indexen voor tabel `OrderDetails`
--
ALTER TABLE `OrderDetails`
  ADD PRIMARY KEY (`OrderID`,`ProductID`);

--
-- Indexen voor tabel `Products`
--
ALTER TABLE `Products`
  ADD PRIMARY KEY (`ProductID`),
  ADD KEY `SubCategoryID` (`SubCategoryID`),
  ADD KEY `SubCategoryID_2` (`SubCategoryID`);

--
-- Indexen voor tabel `subcategorie`
--
ALTER TABLE `subcategorie`
  ADD PRIMARY KEY (`SubCategoryID`),
  ADD KEY `CategoryID` (`CategoryID`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `Categorie`
--
ALTER TABLE `Categorie`
  MODIFY `CategoryID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT voor een tabel `Delivery`
--
ALTER TABLE `Delivery`
  MODIFY `DeliveryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT voor een tabel `Menu`
--
ALTER TABLE `Menu`
  MODIFY `MenuID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT voor een tabel `Products`
--
ALTER TABLE `Products`
  MODIFY `ProductID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT voor een tabel `subcategorie`
--
ALTER TABLE `subcategorie`
  MODIFY `SubCategoryID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
