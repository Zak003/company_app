
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Zbirka podatkov: `companies_app`
--

-- --------------------------------------------------------

--
-- Struktura tabele `popravila`
--

CREATE TABLE `popravila` (
  `id` int(11) NOT NULL,
  `ime` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `datum` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `lokacija_cord_x` text COLLATE utf8_slovenian_ci NOT NULL,
  `lokacija_cord_y` text COLLATE utf8_slovenian_ci NOT NULL,
  `podjetje` varchar(255) COLLATE utf8_slovenian_ci NOT NULL,
  `opombe` text COLLATE utf8_slovenian_ci DEFAULT NULL,
  `uporabnik_id` int(11) DEFAULT NULL,
  `slika` text COLLATE utf8_slovenian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Odloži podatke za tabelo `popravila`
--

INSERT INTO `popravila` (`id`, `ime`, `datum`, `lokacija_cord_x`, `lokacija_cord_y`, `podjetje`, `opombe`, `uporabnik_id`, `slika`) VALUES
(21, 'AC', '2021-10-01 12:40:23', '35.8913058', '14.4965289', 'eBussines', 'Done', 1, 'pictures/Posnetek zaslona (512).png');

-- --------------------------------------------------------

--
-- Struktura tabele `uporabniki`
--

CREATE TABLE `uporabniki` (
  `id` int(11) NOT NULL,
  `imePriimek` varchar(255) COLLATE utf8_slovenian_ci NOT NULL,
  `mail` text COLLATE utf8_slovenian_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8_slovenian_ci NOT NULL,
  `tel` int(11) NOT NULL,
  `rang` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Odloži podatke za tabelo `uporabniki`
--

INSERT INTO `uporabniki` (`id`, `imePriimek`, `mail`, `pass`, `tel`, `rang`) VALUES
(1, 'Zak Lubej', 'zak.l@g.com', 'Zak', 31456324, 0),
(2, 'Jaka', 'jaka.j@g.com', '1234', 41578231, 0),
(3, 'Admin', 'admin.admin@admin', 'Admin', 0, 1),
(4, 'Urh Rosar', 'urh.r@g.com', 'Urh', 41232786, 0),
(5, 'Zan', 'zan.artic@g.com', '1234', 32435321, 0);

--
-- Indeksi zavrženih tabel
--

--
-- Indeksi tabele `popravila`
--
ALTER TABLE `popravila`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IX_Relationship1` (`uporabnik_id`);

--
-- Indeksi tabele `uporabniki`
--
ALTER TABLE `uporabniki`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT zavrženih tabel
--

--
-- AUTO_INCREMENT tabele `popravila`
--
ALTER TABLE `popravila`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT tabele `uporabniki`
--
ALTER TABLE `uporabniki`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Omejitve tabel za povzetek stanja
--

--
-- Omejitve za tabelo `popravila`
--
ALTER TABLE `popravila`
  ADD CONSTRAINT `Relationship1` FOREIGN KEY (`uporabnik_id`) REFERENCES `uporabniki` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
