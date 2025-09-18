-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2025. Sze 18. 13:18
-- Kiszolgáló verziója: 10.4.32-MariaDB
-- PHP verzió: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `smoking`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `langs`
--

CREATE TABLE `langs` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `english_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `lang` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_count` int(10) UNSIGNED NOT NULL,
  `club_count` int(10) UNSIGNED NOT NULL,
  `visible` tinyint(1) UNSIGNED NOT NULL DEFAULT 1,
  `pos` int(11) NOT NULL DEFAULT 1000
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci COMMENT='Languages table';

--
-- A tábla adatainak kiíratása `langs`
--

INSERT INTO `langs` (`id`, `name`, `english_name`, `lang`, `user_count`, `club_count`, `visible`, `pos`) VALUES
(1, 'Magyar', 'Hungarian', 'hu', 0, 0, 1, 1),
(2, 'English', 'English', 'en', 0, 0, 1, 500),
(3, 'Italiano', 'Italian', 'it', 0, 0, 1, 500),
(4, 'Deutsch', 'German', 'de', 0, 0, 1, 500),
(5, 'Hrvatski', 'Croatian', 'hr', 0, 0, 1, 500),
(6, 'Slovák', 'Slovak', 'sk', 0, 0, 1, 500),
(8, 'Српски', 'Serbian', 'sr', 0, 0, 1, 500),
(9, 'Русский', 'Russian', 'ru', 0, 0, 1, 500),
(10, 'Yкраїнська', 'Ukrainian', 'ua', 0, 0, 1, 500),
(11, 'Čeština', 'Czech', 'cz', 0, 0, 1, 500),
(12, 'Română', 'Romanian', 'ro', 0, 0, 1, 500),
(13, 'Slovenščina', 'Slovenian', 'sl', 0, 0, 1, 500),
(14, 'Polski', 'Polish', 'pl', 0, 0, 1, 500),
(15, 'Nederlands', 'Dutch', 'nl', 0, 0, 1, 500),
(16, 'Français', 'French', 'fr', 0, 0, 1, 500),
(18, 'Español', 'Spanish', 'es', 0, 0, 1, 500);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `langs`
--
ALTER TABLE `langs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `lang` (`lang`),
  ADD UNIQUE KEY `Unique_Languages` (`name`,`lang`),
  ADD KEY `pos` (`pos`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `langs`
--
ALTER TABLE `langs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
