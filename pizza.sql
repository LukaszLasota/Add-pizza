-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 25 Lip 2020, 14:57
-- Wersja serwera: 10.4.11-MariaDB
-- Wersja PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `pizza`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pizzas`
--

CREATE TABLE `pizzas` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `ingredients` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `pizzas`
--

INSERT INTO `pizzas` (`id`, `title`, `ingredients`, `email`, `created_at`) VALUES
(21, 'Relax', 'sos carbonara, ser mozzarella, szynka, boczek, oregano', 'lukaszlasota89r@gmail.com', '2020-07-25 12:48:42'),
(22, 'Klubowa', 'sos, ser, salami, cebulka, oliwki', 'lukaszlasota89r@gmail.com', '2020-07-25 12:52:39'),
(24, 'Robotnicza', 'sos, ser mozzarella, gyros drobiowy, boczek, cebula, czosnek, oregano', 'lukaszlasota89r@gmail.com', '2020-07-25 12:56:47');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `pizzas`
--
ALTER TABLE `pizzas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `pizzas`
--
ALTER TABLE `pizzas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
