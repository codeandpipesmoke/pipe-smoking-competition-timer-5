-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2025. Sze 18. 10:06
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
-- Tábla szerkezet ehhez a táblához `clubs`
--

CREATE TABLE `clubs` (
  `id` int(10) UNSIGNED NOT NULL,
  `country_id` int(10) UNSIGNED NOT NULL,
  `lang_id` int(10) UNSIGNED NOT NULL,
  `chairman_id` int(10) UNSIGNED NOT NULL COMMENT 'Elnök',
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `web` varchar(250) NOT NULL,
  `visible` tinyint(1) UNSIGNED NOT NULL DEFAULT 1,
  `pos` int(11) NOT NULL DEFAULT 1000,
  `user_count` int(10) UNSIGNED NOT NULL,
  `competition_count` int(10) UNSIGNED NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci COMMENT='Clubs table';

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `countries`
--

CREATE TABLE `countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `continent` varchar(50) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `iso` varchar(10) NOT NULL,
  `visible` tinyint(1) UNSIGNED NOT NULL DEFAULT 1,
  `pos` int(11) NOT NULL DEFAULT 1000,
  `last_used` datetime DEFAULT NULL,
  `user_count` int(11) NOT NULL DEFAULT 0,
  `club_count` int(10) UNSIGNED NOT NULL,
  `competition_count` int(10) UNSIGNED NOT NULL,
  `competitor_count` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci COMMENT='Countries table';

--
-- A tábla adatainak kiíratása `countries`
--

INSERT INTO `countries` (`id`, `continent`, `name`, `iso`, `visible`, `pos`, `last_used`, `user_count`, `club_count`, `competition_count`, `competitor_count`) VALUES
(1, 'Asia', 'China', 'CN', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(2, 'Asia', 'India', 'IN', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(3, 'North America', 'United States', 'US', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(4, 'Asia', 'Indonesia', 'ID', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(5, 'Asia', 'Pakistan', 'PK', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(6, 'Africa', 'Nigeria', 'NG', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(7, 'South America', 'Brazil', 'BR', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(8, 'Asia', 'Bangladesh', 'BD', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(9, 'Europe', 'Russia', 'RU', 1, 100, '0000-00-00 00:00:00', 0, 0, 0, 0),
(10, 'North America', 'Mexico', 'MX', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(11, 'Asia', 'Japan', 'JP', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(12, 'Africa', 'Ethiopia', 'ET', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(13, 'Asia', 'Philippines', 'PH', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(14, 'Africa', 'Democratic Republic of the Congo', 'CD', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(15, 'Africa', 'Egypt', 'EG', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(16, 'Asia', 'Vietnam', 'VN', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(17, 'Asia', 'Iran', 'IR', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(18, 'Europe', 'Germany', 'DE', 1, 900, '0000-00-00 00:00:00', 0, 0, 0, 0),
(19, 'Asia', 'Turkey', 'TR', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(20, 'Asia', 'Thailand', 'TH', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(21, 'Europe', 'France', 'FR', 1, 100, '0000-00-00 00:00:00', 0, 0, 0, 0),
(22, 'Europe', 'United Kingdom', 'GB', 1, 100, '0000-00-00 00:00:00', 0, 0, 0, 0),
(23, 'Africa', 'Tanzania', 'TZ', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(24, 'Europe', 'Italy', 'IT', 1, 100, '0000-00-00 00:00:00', 0, 0, 0, 0),
(25, 'Africa', 'South Africa', 'ZA', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(26, 'Asia', 'Myanmar', 'MM', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(27, 'Africa', 'Kenya', 'KE', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(28, 'Asia', 'South Korea', 'KR', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(29, 'South America', 'Colombia', 'CO', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(30, 'Africa', 'Sudan', 'SD', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(31, 'Africa', 'Uganda', 'UG', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(32, 'Europe', 'Spain', 'ES', 1, 100, '0000-00-00 00:00:00', 0, 0, 0, 0),
(33, 'South America', 'Argentina', 'AR', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(34, 'Africa', 'Algeria', 'DZ', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(35, 'Europe', 'Ukraine', 'UA', 1, 100, '0000-00-00 00:00:00', 0, 0, 0, 0),
(36, 'Asia', 'Iraq', 'IQ', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(37, 'Asia', 'Afghanistan', 'AF', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(38, 'North America', 'Canada', 'CA', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(39, 'Europe', 'Poland', 'PL', 1, 100, '0000-00-00 00:00:00', 0, 0, 0, 0),
(40, 'Africa', 'Morocco', 'MA', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(41, 'Africa', 'Angola', 'AO', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(42, 'Asia', 'Saudi Arabia', 'SA', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(43, 'Asia', 'Malaysia', 'MY', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(44, 'Africa', 'Ghana', 'GH', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(45, 'Africa', 'Mozambique', 'MZ', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(46, 'South America', 'Peru', 'PE', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(47, 'Asia', 'Yemen', 'YE', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(48, 'Asia', 'Uzbekistan', 'UZ', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(49, 'Asia', 'Nepal', 'NP', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(50, 'South America', 'Venezuela', 'VE', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(51, 'Africa', 'Cameroon', 'CM', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(52, 'Africa', 'Ivory Coast', 'CI', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(53, 'Africa', 'Madagascar', 'MG', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(54, 'Oceania', 'Australia', 'AU', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(55, 'Asia', 'North Korea', 'KP', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(56, 'Africa', 'Niger', 'NE', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(57, 'Asia', 'Taiwan', 'TW', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(58, 'Asia', 'Sri Lanka', 'LK', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(59, 'Asia', 'Syria', 'SY', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(60, 'Africa', 'Burkina Faso', 'BF', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(61, 'Africa', 'Mali', 'ML', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(62, 'Africa', 'Malawi', 'MW', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(63, 'Africa', 'Zambia', 'ZM', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(64, 'Asia', 'Kazakhstan', 'KZ', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(65, 'South America', 'Chile', 'CL', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(66, 'Africa', 'Chad', 'TD', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(67, 'Africa', 'Senegal', 'SN', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(68, 'Europe', 'Romania', 'RO', 1, 100, '0000-00-00 00:00:00', 0, 0, 0, 0),
(69, 'North America', 'Guatemala', 'GT', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(70, 'South America', 'Ecuador', 'EC', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(71, 'Europe', 'Netherlands', 'NL', 1, 100, '0000-00-00 00:00:00', 0, 0, 0, 0),
(72, 'Asia', 'Cambodia', 'KH', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(73, 'Africa', 'Zimbabwe', 'ZW', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(74, 'Africa', 'Benin', 'BJ', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(75, 'Africa', 'Guinea', 'GN', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(76, 'Africa', 'Rwanda', 'RW', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(77, 'Africa', 'Burundi', 'BI', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(78, 'Africa', 'Somalia', 'SO', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(79, 'South America', 'Bolivia', 'BO', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(80, 'Africa', 'South Sudan', 'SS', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(81, 'Africa', 'Tunisia', 'TN', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(82, 'Europe', 'Belgium', 'BE', 1, 100, '0000-00-00 00:00:00', 0, 0, 0, 0),
(83, 'North America', 'Haiti', 'HT', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(84, 'Asia', 'Jordan', 'JO', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(85, 'North America', 'Cuba', 'CU', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(86, 'North America', 'Dominican Republic', 'DO', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(87, 'Europe', 'Czech Republic', 'CZ', 1, 10, '0000-00-00 00:00:00', 0, 0, 0, 0),
(88, 'Europe', 'Sweden', 'SE', 1, 100, '0000-00-00 00:00:00', 0, 0, 0, 0),
(89, 'Europe', 'Greece', 'GR', 1, 900, '0000-00-00 00:00:00', 0, 0, 0, 0),
(90, 'Asia', 'Azerbaijan', 'AZ', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(91, 'Europe', 'Portugal', 'PT', 1, 100, '0000-00-00 00:00:00', 0, 0, 0, 0),
(92, 'Asia', 'United Arab Emirates', 'AE', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(93, 'Oceania', 'Papua New Guinea', 'PG', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(94, 'Europe', 'Hungary', 'HU', 1, 100, '0000-00-00 00:00:00', 0, 0, 0, 0),
(95, 'North America', 'Honduras', 'HN', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(96, 'Europe', 'Belarus', 'BY', 1, 900, '0000-00-00 00:00:00', 0, 0, 0, 0),
(97, 'Asia', 'Tajikistan', 'TJ', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(98, 'Asia', 'Israel', 'IL', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(99, 'Europe', 'Austria', 'AT', 1, 100, '0000-00-00 00:00:00', 0, 0, 0, 0),
(100, 'Africa', 'Sierra Leone', 'SL', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(101, 'Africa', 'Togo', 'TG', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(102, 'Europe', 'Switzerland', 'CH', 1, 100, '0000-00-00 00:00:00', 0, 0, 0, 0),
(103, 'Asia', 'Laos', 'LA', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(104, 'South America', 'Paraguay', 'PY', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(105, 'Asia', 'Hong Kong', 'HK', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(106, 'Africa', 'Libya', 'LY', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(107, 'Europe', 'Bulgaria', 'BG', 1, 100, '0000-00-00 00:00:00', 0, 0, 0, 0),
(108, 'Europe', 'Serbia', 'RS', 1, 100, '0000-00-00 00:00:00', 0, 0, 0, 0),
(109, 'North America', 'El Salvador', 'SV', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(110, 'North America', 'Nicaragua', 'NI', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(111, 'Africa', 'Eritrea', 'ER', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(112, 'Asia', 'Kyrgyzstan', 'KG', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(113, 'Asia', 'Singapore', 'SG', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(114, 'Europe', 'Denmark', 'DK', 1, 900, '0000-00-00 00:00:00', 0, 0, 0, 0),
(115, 'Asia', 'Turkmenistan', 'TM', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(116, 'Africa', 'Republic of the Congo', 'CG', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(117, 'Europe', 'Finland', 'FI', 1, 900, '0000-00-00 00:00:00', 0, 0, 0, 0),
(118, 'Europe', 'Norway', 'NO', 1, 100, '0000-00-00 00:00:00', 0, 0, 0, 0),
(119, 'Africa', 'Central African Republic', 'CF', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(120, 'Africa', 'Liberia', 'LR', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(121, 'Europe', 'Slovakia', 'SK', 1, 100, '0000-00-00 00:00:00', 0, 0, 0, 0),
(122, 'Asia', 'Lebanon', 'LB', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(123, 'Europe', 'Ireland', 'IE', 1, 900, '0000-00-00 00:00:00', 0, 0, 0, 0),
(124, 'North America', 'Costa Rica', 'CR', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(125, 'Oceania', 'New Zealand', 'NZ', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(126, 'Asia', 'Georgia', 'GE', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(127, 'North America', 'Panama', 'PA', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(128, 'Africa', 'Mauritania', 'MR', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(129, 'Europe', 'Croatia', 'HR', 1, 100, '0000-00-00 00:00:00', 0, 0, 0, 0),
(130, 'Asia', 'Oman', 'OM', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(131, 'Europe', 'Bosnia and Herzegovina', 'BA', 1, 100, '0000-00-00 00:00:00', 0, 0, 0, 0),
(132, 'South America', 'Uruguay', 'UY', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(133, 'Asia', 'Mongolia', 'MN', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(134, 'Europe', 'Moldova', 'MD', 1, 100, '0000-00-00 00:00:00', 0, 0, 0, 0),
(135, 'Asia', 'Kuwait', 'KW', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(136, 'Europe', 'Albania', 'AL', 1, 900, '0000-00-00 00:00:00', 0, 0, 0, 0),
(137, 'North America', 'Puerto Rico', 'PR', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(138, 'Asia', 'Armenia', 'AM', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(139, 'Asia', 'West Bank', 'XW', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(140, 'North America', 'Jamaica', 'JM', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(141, 'Africa', 'Namibia', 'NA', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(142, 'Europe', 'Lithuania', 'LT', 1, 100, '0000-00-00 00:00:00', 0, 0, 0, 0),
(143, 'Asia', 'Qatar', 'QA', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(144, 'Africa', 'The Gambia', 'GM', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(145, 'Africa', 'Botswana', 'BW', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(146, 'Africa', 'Gabon', 'GA', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(147, 'Africa', 'Lesotho', 'LS', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(148, 'Europe', 'North Macedonia', 'MK', 1, 900, '0000-00-00 00:00:00', 0, 0, 0, 0),
(149, 'Europe', 'Slovenia', 'SI', 1, 100, '0000-00-00 00:00:00', 0, 0, 0, 0),
(150, 'Africa', 'Guinea-Bissau', 'GW', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(151, 'Europe', 'Kosovo', 'XK', 1, 100, '0000-00-00 00:00:00', 0, 0, 0, 0),
(152, 'Europe', 'Latvia', 'LV', 1, 100, '0000-00-00 00:00:00', 0, 0, 0, 0),
(153, 'Africa', 'Equatorial Guinea', 'GQ', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(154, 'Asia', 'Bahrain', 'BH', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(155, 'Asia', 'Timor-Leste', 'TL', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(156, 'North America', 'Trinidad and Tobago', 'TT', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(157, 'Seven seas (open ocean)', 'Mauritius', 'MU', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(158, 'Asia', 'Cyprus', 'CY', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(159, 'Europe', 'Estonia', 'EE', 1, 900, '0000-00-00 00:00:00', 0, 0, 0, 0),
(160, 'Africa', 'Eswatini', 'SZ', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(161, 'Africa', 'Djibouti', 'DJ', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(162, 'Oceania', 'Fiji', 'FJ', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(163, 'Africa', 'Comoros', 'KM', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(164, 'Asia', 'Bhutan', 'BT', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(165, 'South America', 'Guyana', 'GY', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(166, 'Oceania', 'Solomon Islands', 'SB', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(167, 'Europe', 'Luxembourg', 'LU', 1, 100, '0000-00-00 00:00:00', 0, 0, 0, 0),
(168, 'Asia', 'Macau', 'MO', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(169, 'South America', 'Suriname', 'SR', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(170, 'Africa', 'Cape Verde', 'CV', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(171, 'Europe', 'Montenegro', 'ME', 1, 100, '0000-00-00 00:00:00', 0, 0, 0, 0),
(172, 'Africa', 'Western Sahara', 'EH', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(173, 'Seven seas (open ocean)', 'Maldives', 'MV', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(174, 'Asia', 'Brunei', 'BN', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(175, 'Europe', 'Malta', 'MT', 1, 100, '0000-00-00 00:00:00', 0, 0, 0, 0),
(176, 'North America', 'Belize', 'BZ', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(177, 'North America', 'Guadeloupe', 'GP', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(178, 'Europe', 'Iceland', 'IS', 1, 900, '0000-00-00 00:00:00', 0, 0, 0, 0),
(179, 'North America', 'The Bahamas', 'BS', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(180, 'Oceania', 'Vanuatu', 'VU', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(181, 'North America', 'Barbados', 'BB', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(182, 'Oceania', 'French Polynesia', 'PF', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(183, 'Oceania', 'New Caledonia', 'NC', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(184, 'Africa', 'SĆo Tom‚ and Prˇncipe', 'ST', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(185, 'Oceania', 'Samoa', 'WS', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(186, 'Oceania', 'Guam', 'GU', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(187, 'North America', 'Saint Lucia', 'LC', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(188, 'North America', 'Cura‡ao', 'CW', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(189, 'North America', 'Aruba', 'AW', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(190, 'Oceania', 'Kiribati', 'KI', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(191, 'North America', 'Grenada', 'GD', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(192, 'Oceania', 'Tonga', 'TO', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(193, 'North America', 'United States Virgin Islands', 'VI', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(194, 'Europe', 'Jersey', 'JE', 1, 900, '0000-00-00 00:00:00', 0, 0, 0, 0),
(195, 'North America', 'Antigua and Barbuda', 'AG', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(196, 'North America', 'Saint Vincent and the Grenadines', 'VC', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(197, 'Oceania', 'Federated States of Micronesia', 'FM', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(198, 'Seven seas (open ocean)', 'Seychelles', 'SC', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(199, 'Europe', 'Isle of Man', 'IM', 1, 900, '0000-00-00 00:00:00', 0, 0, 0, 0),
(200, 'Europe', 'Andorra', 'AD', 1, 900, '0000-00-00 00:00:00', 0, 0, 0, 0),
(201, 'Oceania', 'Marshall Islands', 'MH', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(202, 'North America', 'Dominica', 'DM', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(203, 'North America', 'Bermuda', 'BM', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(204, 'Europe', 'Guernsey', 'GG', 1, 900, '0000-00-00 00:00:00', 0, 0, 0, 0),
(205, 'North America', 'Cayman Islands', 'KY', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(206, 'North America', 'Turks and Caicos Islands', 'TC', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(207, 'North America', 'Greenland', 'GL', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(208, 'North America', 'Saint Kitts and Nevis', 'KN', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(209, 'Europe', 'Faroe Islands', 'FO', 1, 900, '0000-00-00 00:00:00', 0, 0, 0, 0),
(210, 'Oceania', 'Northern Mariana Islands', 'MP', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(211, 'North America', 'Sint Maarten', 'SX', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(212, 'Oceania', 'American Samoa', 'AS', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(213, 'Europe', 'Liechtenstein', 'LI', 1, 100, '0000-00-00 00:00:00', 0, 0, 0, 0),
(214, 'North America', 'British Virgin Islands', 'VG', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(215, 'Europe', 'San Marino', 'SM', 1, 900, '0000-00-00 00:00:00', 0, 0, 0, 0),
(216, 'North America', 'Saint-Martin', 'MF', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(217, 'Europe', 'Monaco', 'MC', 1, 100, '0000-00-00 00:00:00', 0, 0, 0, 0),
(218, 'North America', 'Caribbean Netherlands', 'BQ', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(219, 'Europe', 'Gibraltar', 'GI', 1, 900, '0000-00-00 00:00:00', 0, 0, 0, 0),
(220, 'Oceania', 'Palau', 'PW', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(221, 'North America', 'Anguilla', 'AI', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(222, 'Oceania', 'Wallis and Futuna', 'WF', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(223, 'Oceania', 'Tuvalu', 'TV', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(224, 'Oceania', 'Nauru', 'NR', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(225, 'Oceania', 'Cook Islands', 'CK', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(226, 'Seven seas (open ocean)', 'Saint Helena, Ascension and Tristan da Cunha', 'SH', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(227, 'North America', 'Saint Barth‚lemy', 'BL', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(228, 'North America', 'Montserrat', 'MS', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(229, 'North America', 'Saint Pierre and Miquelon', 'PM', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(230, 'South America', 'Falkland Islands', 'FK', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(231, 'Europe', 'Svalbard and Jan Mayen', 'SJ', 1, 100, '0000-00-00 00:00:00', 0, 0, 0, 0),
(232, 'Asia', 'Christmas Island', 'CX', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(233, 'Oceania', 'Niue', 'NU', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(234, 'Oceania', 'Norfolk Island', 'NF', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(235, 'Insular Oceania', 'Tokelau', 'TK', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(236, 'Europe', 'Vatican City', 'VA', 1, 100, '0000-00-00 00:00:00', 0, 0, 0, 0),
(237, 'Oceania', 'Cocos (Keeling) Islands', 'CC', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(238, 'North America', 'United States Minor Outlying Islands', 'UM', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(239, 'Oceania', 'Pitcairn Islands', 'PN', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(240, '', 'Akrotiri', 'QZ', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(241, 'Seven seas (open ocean)', 'British Indian Ocean Territory', 'IO', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(242, '', 'Dhekelia', 'XD', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(243, 'South America', 'French Guiana', 'GF', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(244, 'Seven seas (open ocean)', 'French Southern and Antarctic Lands', 'TF', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(245, 'Asia', 'Gaza Strip', 'XG', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(246, 'North America', 'Martinique', 'MQ', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(247, 'Africa', 'Mayotte', 'YT', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(248, '', 'Paracel Islands', 'XP', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(249, 'Africa', 'R‚union', 'RE', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(250, 'Seven seas (open ocean)', 'South Georgia and the South Sandwich Islands', 'GS', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(251, 'Seven seas (open ocean)', 'Heard Island and McDonald Islands', 'HM', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(252, 'Antarctica', 'Bouvet Island', 'BV', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0),
(253, 'Antarctica', 'Antarctica', 'AQ', 0, 1000, '0000-00-00 00:00:00', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `i18n`
--

CREATE TABLE `i18n` (
  `id` int(11) NOT NULL,
  `locale` varchar(6) NOT NULL,
  `model` varchar(255) NOT NULL,
  `foreign_key` int(10) NOT NULL,
  `field` varchar(255) NOT NULL,
  `content` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `langs`
--

CREATE TABLE `langs` (
  `id` int(11) NOT NULL,
  `pos` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `lang` varchar(6) NOT NULL,
  `visible` tinyint(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Languages table';

--
-- A tábla adatainak kiíratása `langs`
--

INSERT INTO `langs` (`id`, `pos`, `name`, `lang`, `visible`) VALUES
(1, 1, 'Magyar', 'hu', 1),
(2, 500, 'English UK', 'en_UK', 1),
(3, 500, 'Italian', 'it', 1),
(4, 500, 'Deutsch', 'de', 1),
(5, 600, 'Croatian', 'hr', 1),
(6, 500, 'Slovak', 'SK', 1),
(7, 500, 'English US', 'en_US', 1);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `setups`
--

CREATE TABLE `setups` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` varchar(36) NOT NULL DEFAULT 'init',
  `name` varchar(200) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `value` longtext NOT NULL,
  `type` varchar(10) NOT NULL DEFAULT 'string',
  `editable` tinyint(1) UNSIGNED NOT NULL DEFAULT 1,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci COMMENT='Setups table';

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `tables`
--

CREATE TABLE `tables` (
  `id` int(10) UNSIGNED NOT NULL,
  `tableleader_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(200) NOT NULL,
  `chairs` int(10) UNSIGNED NOT NULL,
  `visible` tinyint(1) UNSIGNED NOT NULL,
  `pos` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci COMMENT='Tables table';

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `id` char(36) NOT NULL,
  `country_id` int(10) UNSIGNED NOT NULL,
  `lang_id` int(10) UNSIGNED NOT NULL,
  `club_id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `description` text NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `token_expires` datetime DEFAULT NULL,
  `api_token` varchar(255) DEFAULT NULL,
  `activation_date` datetime DEFAULT NULL,
  `secret` varchar(32) DEFAULT NULL,
  `secret_verified` tinyint(1) DEFAULT NULL,
  `tos_date` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `is_superuser` tinyint(1) NOT NULL DEFAULT 0,
  `role` varchar(255) DEFAULT 'user',
  `enabled` tinyint(1) NOT NULL DEFAULT 1,
  `visible` tinyint(1) UNSIGNED NOT NULL DEFAULT 1,
  `pos` int(11) NOT NULL DEFAULT 1000,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `additional_data` text DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `lockout_time` datetime DEFAULT NULL,
  `competitor_count` int(10) UNSIGNED NOT NULL,
  `table_count` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `country_id`, `lang_id`, `club_id`, `username`, `email`, `password`, `first_name`, `last_name`, `description`, `token`, `token_expires`, `api_token`, `activation_date`, `secret`, `secret_verified`, `tos_date`, `active`, `is_superuser`, `role`, `enabled`, `visible`, `pos`, `created`, `modified`, `additional_data`, `last_login`, `lockout_time`, `competitor_count`, `table_count`) VALUES
('57eae983-e4a6-44ee-a382-b44f9fb70a07', 0, 0, 0, NULL, 'ibafapipaklub@gmail.com', '$2y$10$sBnJ86nvBqn8GYE79hl2eenu9dmxZwTIV7Odk7d.G/Au1OUb2vJAO', 'Csaba', 'Borbély', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 'admin', 1, 1, 1000, '2025-03-03 08:44:31', '2025-03-03 08:44:31', NULL, '2025-03-05 09:38:16', NULL, 0, 0),
('eab26308-3ba1-4fe6-b91a-25d53153288e', 0, 0, 0, 'superadmin', 'zsfoto@gmail.com', '$2y$10$R0mimoA6WzghMUJGVUcN9eD/kpdkyqBMMq4xgogyovdmSeyE.wFDG', 'Jeff', 'Shoemaker', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 'admin', 1, 1, 1000, '2025-02-28 12:56:56', '2025-02-28 12:56:56', NULL, '2025-03-03 14:50:06', NULL, 0, 0);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `clubs`
--
ALTER TABLE `clubs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country_id` (`country_id`),
  ADD KEY `lang_id` (`lang_id`),
  ADD KEY `name` (`name`),
  ADD KEY `chairman_id` (`chairman_id`),
  ADD KEY `email` (`email`),
  ADD KEY `visible` (`visible`),
  ADD KEY `pos` (`pos`);

--
-- A tábla indexei `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `visible` (`visible`),
  ADD KEY `pos` (`pos`),
  ADD KEY `name` (`name`),
  ADD KEY `short` (`iso`),
  ADD KEY `continent` (`continent`),
  ADD KEY `user_count` (`user_count`),
  ADD KEY `last_used` (`last_used`);

--
-- A tábla indexei `i18n`
--
ALTER TABLE `i18n`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `I18N_LOCALE_FIELD` (`locale`,`model`,`foreign_key`,`field`),
  ADD KEY `I18N_FIELD` (`model`,`foreign_key`,`field`);

--
-- A tábla indexei `langs`
--
ALTER TABLE `langs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `lang` (`lang`),
  ADD UNIQUE KEY `Unique_Languages` (`name`,`lang`),
  ADD KEY `pos` (`pos`);

--
-- A tábla indexei `setups`
--
ALTER TABLE `setups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `user_id` (`user_id`);

--
-- A tábla indexei `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tableleader_id` (`tableleader_id`),
  ADD KEY `name` (`name`),
  ADD KEY `visible` (`visible`),
  ADD KEY `pos` (`pos`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `visible` (`visible`),
  ADD KEY `pos` (`pos`),
  ADD KEY `country_id` (`country_id`),
  ADD KEY `lang_id` (`lang_id`),
  ADD KEY `club_id` (`club_id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `clubs`
--
ALTER TABLE `clubs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=254;

--
-- AUTO_INCREMENT a táblához `i18n`
--
ALTER TABLE `i18n`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `langs`
--
ALTER TABLE `langs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT a táblához `setups`
--
ALTER TABLE `setups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `tables`
--
ALTER TABLE `tables`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
