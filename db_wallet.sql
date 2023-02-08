-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Czas generowania: 06 Lut 2023, 12:27
-- Wersja serwera: 10.4.27-MariaDB
-- Wersja PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `db_wallet`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `aktywa`
--

CREATE TABLE `aktywa` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nazwa_aktywa` varchar(50) NOT NULL,
  `dane_aktywa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Zrzut danych tabeli `aktywa`
--

INSERT INTO `aktywa` (`id`, `user_id`, `nazwa_aktywa`, `dane_aktywa`) VALUES
(1, 15, 'Samarkanda', 'Dom na Andersa');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kryptowaluty`
--

CREATE TABLE `kryptowaluty` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bitcoin` int(11) NOT NULL,
  `ethereum` int(11) NOT NULL,
  `reszta_coinow` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Zrzut danych tabeli `kryptowaluty`
--

INSERT INTO `kryptowaluty` (`id`, `user_id`, `bitcoin`, `ethereum`, `reszta_coinow`) VALUES
(1, 15, 167, 2, 7),
(2, 16, 67, 2, 13);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `smart_kontrakt`
--

CREATE TABLE `smart_kontrakt` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `id_kontraktu` varchar(255) NOT NULL,
  `kod_kontraktu` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Zrzut danych tabeli `smart_kontrakt`
--

INSERT INTO `smart_kontrakt` (`id`, `user_id`, `id_kontraktu`, `kod_kontraktu`) VALUES
(1, 15, 'sfagawcv', 'while($wiersz = $smartKontrakty->fetch_assoc())');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `stan_konta`
--

CREATE TABLE `stan_konta` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `hash_nick` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Zrzut danych tabeli `stan_konta`
--

INSERT INTO `stan_konta` (`id`, `user_id`, `hash_nick`) VALUES
(1, 14, '$2y$10$hsNMwOuejhwWkcoa8lE6QuoNd7LFTogtX3qPeD60BzQgIzC/C8V.u'),
(2, 15, '$2y$10$bfmvgjuJuQGojKvQWAU2ruPtVUY4BSN/3niIgwvqZvnZ0O7qTP7te'),
(3, 16, '$2y$10$vPL.6RGPMAZ4jnFkBIJeIeUx7vOwltmZCFxBG/visisbHj4gRLF.m');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `aktywa`
--
ALTER TABLE `aktywa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `aktywa_ibfk_1` (`user_id`);

--
-- Indeksy dla tabeli `kryptowaluty`
--
ALTER TABLE `kryptowaluty`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kryptowaluty_ibfk_1` (`user_id`);

--
-- Indeksy dla tabeli `smart_kontrakt`
--
ALTER TABLE `smart_kontrakt`
  ADD PRIMARY KEY (`id`),
  ADD KEY `smart_kontrakt_ibfk_1` (`user_id`);

--
-- Indeksy dla tabeli `stan_konta`
--
ALTER TABLE `stan_konta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stan_konta_ibfk_3` (`user_id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `aktywa`
--
ALTER TABLE `aktywa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `kryptowaluty`
--
ALTER TABLE `kryptowaluty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `smart_kontrakt`
--
ALTER TABLE `smart_kontrakt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `stan_konta`
--
ALTER TABLE `stan_konta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `aktywa`
--
ALTER TABLE `aktywa`
  ADD CONSTRAINT `aktywa_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `db_users`.`uzytkownicy` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `kryptowaluty`
--
ALTER TABLE `kryptowaluty`
  ADD CONSTRAINT `kryptowaluty_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `db_users`.`uzytkownicy` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `smart_kontrakt`
--
ALTER TABLE `smart_kontrakt`
  ADD CONSTRAINT `smart_kontrakt_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `db_users`.`uzytkownicy` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `stan_konta`
--
ALTER TABLE `stan_konta`
  ADD CONSTRAINT `stan_konta_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `db_users`.`uzytkownicy` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
