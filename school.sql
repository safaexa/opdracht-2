-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3308
-- Gegenereerd op: 28 jun 2024 om 10:38
-- Serverversie: 10.4.28-MariaDB
-- PHP-versie: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `docent`
--

CREATE TABLE `docent` (
  `docentID` int(11) NOT NULL,
  `Naam` varchar(55) NOT NULL,
  `Achternaam` varchar(55) NOT NULL,
  `Aantal_leerlingen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gebruikers`
--

CREATE TABLE `gebruikers` (
  `id` int(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `wachtwoord` varchar(255) DEFAULT NULL,
  `rol` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gesprek`
--

CREATE TABLE `gesprek` (
  `GesprekID` int(11) NOT NULL,
  `Naam_leerling` varchar(55) NOT NULL,
  `Achternaam_leerling` varchar(55) NOT NULL,
  `Gesprek` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `gesprek`
--

INSERT INTO `gesprek` (`GesprekID`, `Naam_leerling`, `Achternaam_leerling`, `Gesprek`) VALUES
(7, 'Souhaib', 'Abattouy', 'Op school ben ik meestal rustig en let goed op tijdens de lessen. Ik probeer altijd mijn huiswerk op tijd af te hebben en meld het als ik hulp nodig heb. Soms praat ik wat te veel met vrienden, maar ik zorg ervoor dat het mijn werk niet in de weg staat. O'),
(9, 'mohamed ', 'el yakoubi', 'gaat goed tijdens de lessen'),
(10, 'safae', 'abattouy', 'alles gaat top');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `klas`
--

CREATE TABLE `klas` (
  `klasID` int(11) NOT NULL,
  `klas_naam` varchar(55) NOT NULL,
  `aantal_leerlingen` int(11) NOT NULL,
  `Mentor` varchar(55) NOT NULL,
  `niveau` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `klas`
--

INSERT INTO `klas` (`klasID`, `klas_naam`, `aantal_leerlingen`, `Mentor`, `niveau`) VALUES
(4, 'SDO2A', 30, 'Mark', 'niveau 3');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `lyceum`
--

CREATE TABLE `lyceum` (
  `id` int(11) NOT NULL,
  `docent_id` int(11) DEFAULT NULL,
  `vak_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `manager`
--

CREATE TABLE `manager` (
  `docentID` int(11) NOT NULL,
  `naam` varchar(55) NOT NULL,
  `achternaam` varchar(55) NOT NULL,
  `vak` varchar(55) NOT NULL,
  `aantal_leerlingen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `manager`
--

INSERT INTO `manager` (`docentID`, `naam`, `achternaam`, `vak`, `aantal_leerlingen`) VALUES
(1, 'jeff', 'zwijsen', 'uml', 34),
(2, 'osman', 'os', 'database', 50),
(3, 'marjolein', '-', 'nederlands', 40),
(4, 'jeff', 'zwijsen', 'uml', 34),
(5, 'safa', 'abattouy', 'rekenen', 20),
(6, 'koen', 'top', 'wiskunde', 60);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `naam` varchar(55) DEFAULT NULL,
  `achternaam` varchar(55) DEFAULT NULL,
  `geboortedatum` date DEFAULT NULL,
  `telefoonnummer` int(11) DEFAULT NULL,
  `email` varchar(55) DEFAULT NULL,
  `wachtwoord` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `docent`
--
ALTER TABLE `docent`
  ADD PRIMARY KEY (`docentID`);

--
-- Indexen voor tabel `gebruikers`
--
ALTER TABLE `gebruikers`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `gesprek`
--
ALTER TABLE `gesprek`
  ADD PRIMARY KEY (`GesprekID`);

--
-- Indexen voor tabel `klas`
--
ALTER TABLE `klas`
  ADD PRIMARY KEY (`klasID`);

--
-- Indexen voor tabel `lyceum`
--
ALTER TABLE `lyceum`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`docentID`);

--
-- Indexen voor tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `docent`
--
ALTER TABLE `docent`
  MODIFY `docentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `gebruikers`
--
ALTER TABLE `gebruikers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `gesprek`
--
ALTER TABLE `gesprek`
  MODIFY `GesprekID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT voor een tabel `klas`
--
ALTER TABLE `klas`
  MODIFY `klasID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT voor een tabel `lyceum`
--
ALTER TABLE `lyceum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `manager`
--
ALTER TABLE `manager`
  MODIFY `docentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT voor een tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
