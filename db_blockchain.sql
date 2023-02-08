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
-- Baza danych: `db_blockchain`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `block`
--

CREATE TABLE `block` (
  `id` int(11) NOT NULL,
  `data` varchar(255) NOT NULL,
  `pop_hash` varchar(255) NOT NULL,
  `this_hash` varchar(255) NOT NULL,
  `user_hash1` varchar(255) NOT NULL,
  `user_hash2` varchar(255) NOT NULL,
  `transakcja` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Zrzut danych tabeli `block`
--

INSERT INTO `block` (`id`, `data`, `pop_hash`, `this_hash`, `user_hash1`, `user_hash2`, `transakcja`) VALUES
(1, '2', '3', '4', '5', '6', '7'),
(2, 'dzis', '3', '4', '5', '6', '7'),
(3, '2', '3', '4', '5', '6', '7'),
(4, '2', '3', '4', '5', '6', '7'),
(5, '[value-2]', '[value-3]', '[value-4]', '[value-5]', '[value-6]', '[value-7]'),
(6, '[value-2]', '[value-3]', '[value-4]', '[value-5]', '[value-6]', '[value-7]'),
(7, '[value-2]', '[value-3]', '[value-4]', '[value-5]', '[value-6]', 'trans'),
(8, '[value-2]', '[value-3]', '[value-4]', '[value-5]', '[value-6]', '$2y$10$bfmvgjuJuQGojKvQWAU2ruPtVUY4BSN/3niIgwvqZvnZ0O7qTP7te wysłał $2y$10$vPL.6RGPMAZ4jnFkBIJeIeUx7vOwltmZCFxBG/visisbHj4gRLF.m 1 bitcoin'),
(9, '[value-2]', '[value-3]', '[value-4]', '[value-5]', '$2y$10$vPL.6RGPMAZ4jnFkBIJeIeUx7vOwltmZCFxBG/visisbHj4gRLF.m', '$2y$10$bfmvgjuJuQGojKvQWAU2ruPtVUY4BSN/3niIgwvqZvnZ0O7qTP7te wysłał $2y$10$vPL.6RGPMAZ4jnFkBIJeIeUx7vOwltmZCFxBG/visisbHj4gRLF.m 1 bitcoin'),
(10, '[value-2]', '[value-3]', '[value-4]', '$2y$10$bfmvgjuJuQGojKvQWAU2ruPtVUY4BSN/3niIgwvqZvnZ0O7qTP7te', '$2y$10$vPL.6RGPMAZ4jnFkBIJeIeUx7vOwltmZCFxBG/visisbHj4gRLF.m', '$2y$10$bfmvgjuJuQGojKvQWAU2ruPtVUY4BSN/3niIgwvqZvnZ0O7qTP7te wysłał $2y$10$vPL.6RGPMAZ4jnFkBIJeIeUx7vOwltmZCFxBG/visisbHj4gRLF.m 1 bitcoin'),
(11, '[value-2]', '[value-3]', '[value-4]', '$2y$10$bfmvgjuJuQGojKvQWAU2ruPtVUY4BSN/3niIgwvqZvnZ0O7qTP7te', '$2y$10$vPL.6RGPMAZ4jnFkBIJeIeUx7vOwltmZCFxBG/visisbHj4gRLF.m', '$2y$10$bfmvgjuJuQGojKvQWAU2ruPtVUY4BSN/3niIgwvqZvnZ0O7qTP7te wysłał $2y$10$vPL.6RGPMAZ4jnFkBIJeIeUx7vOwltmZCFxBG/visisbHj4gRLF.m 2 bitcoin'),
(12, '[value-2]', '[value-3]', '$2y$10$vPL.6RGPMAZ4jnFkBIJeIeUx7vOwltmZCFxBG/visisbHj4gRLF.m', '$2y$10$bfmvgjuJuQGojKvQWAU2ruPtVUY4BSN/3niIgwvqZvnZ0O7qTP7te', '$2y$10$vPL.6RGPMAZ4jnFkBIJeIeUx7vOwltmZCFxBG/visisbHj4gRLF.m', '$2y$10$bfmvgjuJuQGojKvQWAU2ruPtVUY4BSN/3niIgwvqZvnZ0O7qTP7te wysłał $2y$10$vPL.6RGPMAZ4jnFkBIJeIeUx7vOwltmZCFxBG/visisbHj4gRLF.m 1 bitcoin'),
(13, '[value-2]', '$2y$10$bfmvgjuJuQGojKvQWAU2ruPtVUY4BSN/3niIgwvqZvnZ0O7qTP7te', '$2y$10$vPL.6RGPMAZ4jnFkBIJeIeUx7vOwltmZCFxBG/visisbHj4gRLF.m', '$2y$10$bfmvgjuJuQGojKvQWAU2ruPtVUY4BSN/3niIgwvqZvnZ0O7qTP7te', '$2y$10$vPL.6RGPMAZ4jnFkBIJeIeUx7vOwltmZCFxBG/visisbHj4gRLF.m', '$2y$10$bfmvgjuJuQGojKvQWAU2ruPtVUY4BSN/3niIgwvqZvnZ0O7qTP7te wysłał $2y$10$vPL.6RGPMAZ4jnFkBIJeIeUx7vOwltmZCFxBG/visisbHj4gRLF.m 1 bitcoin'),
(14, 'Monday 6th of February 2023 10:58:26 AM', '$2y$10$bfmvgjuJuQGojKvQWAU2ruPtVUY4BSN/3niIgwvqZvnZ0O7qTP7te', '$2y$10$vPL.6RGPMAZ4jnFkBIJeIeUx7vOwltmZCFxBG/visisbHj4gRLF.m', '$2y$10$bfmvgjuJuQGojKvQWAU2ruPtVUY4BSN/3niIgwvqZvnZ0O7qTP7te', '$2y$10$vPL.6RGPMAZ4jnFkBIJeIeUx7vOwltmZCFxBG/visisbHj4gRLF.m', '$2y$10$bfmvgjuJuQGojKvQWAU2ruPtVUY4BSN/3niIgwvqZvnZ0O7qTP7te wysłał $2y$10$vPL.6RGPMAZ4jnFkBIJeIeUx7vOwltmZCFxBG/visisbHj4gRLF.m 1 bitcoin');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `block`
--
ALTER TABLE `block`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `block`
--
ALTER TABLE `block`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
