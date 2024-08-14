-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 14, 2024 at 06:41 PM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `programerski_forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `tema`
--

DROP TABLE IF EXISTS `tema`;
CREATE TABLE IF NOT EXISTS `tema` (
  `id` int NOT NULL AUTO_INCREMENT,
  `naziv` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `oblast` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `opis` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_korisnika` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_tema_korisnik` (`id_korisnika`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tema`
--

INSERT INTO `tema` (`id`, `naziv`, `oblast`, `opis`, `id_korisnika`) VALUES
(1, 'CSS', 'Korišćenje CSS Varijabli za Tema', 'Promena teme sajta može biti komplikovana i zahtevati mnogo promena u CSS kodu. CSS varijable omogućavaju jednostavnije i efikasnije upravljanje temama.', 3),
(2, 'DevOps', 'Kontinuirana Integracija', 'Ručna integracija i isporuka koda može biti podložna greškama i neefikasna. Potrebno je rešenje koje automatizuje ove procese i osigurava doslednost.', 5),
(3, 'Implementacija Dvofaktorske Autentifikacije (2FA)', 'cyber security', 'Samo korišćenje lozinki za autentifikaciju nije dovoljno sigurno, jer lozinke mogu biti ukradene, provaljene ili zloupotrebljene. Ovo može dovesti do neovlašćenog pristupa korisničkim nalozima i osetljivim podacima.', 1),
(7, 'JavaScript', 'Učitavanje Modula u Javi', 'U velikim aplikacijama, učitavanje svih modula odjednom može negativno uticati na performanse. Potrebno je rešenje koje omogućava dinamičko učitavanje modula po potrebi.', 3),
(8, 'Implementacija Full-Text Pretrage', 'Baze podataka', 'Za poboljšanje performansi pretrage teksta u velikim bazama podataka, može se implementirati full-text pretraga. Ova tehnika omogućava efikasnije pretraživanje teksta koristeći optimizovane algoritme i strukture podataka. Full-text pretraga omogućava indeksiranje tekstualnih sadržaja i pruža napredne metode pretrage, kao što su ponderisane pretrage, frazna pretraga, i puni tekstualni pretraga. Implementacija full-text pretrage omogućava brže i efikasnije pretraživanje teksta u bazama podataka, što dovodi do', 3),
(9, 'Cyber Security', 'Zaštita Web Aplikacija od SQL Injection-a', 'SQL Injection je bitan jer može omogućiti napadačima da izvrše zlonamerne SQL upite, što može rezultirati neovlašćenim pristupom podacima, modifikacijom ili brisanjem podataka u bazi, ili čak potpunim preuzimanjem kontrole nad web aplikacijom. Prevencija SQL Injection-a je ključna za očuvanje sigurnosti web aplikacija i integriteta podataka.', 6),
(10, 'Linux', 'Operativni sistemi', 'Linux nudi mnoge prednosti, ali za neiskusne korisnike može biti izazovan zbog razlika u odnosu na Windows okruženje i potrebe za radom u terminalu.', 6),
(12, 'Cheatsheet-ovi za HTML', 'HTML', 'Kako koristiti cheatsheet-ove za HTML da bi se ubrzalo učenje i pisanje HTML koda.', 3);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tema`
--
ALTER TABLE `tema`
  ADD CONSTRAINT `FK_tema_korisnik` FOREIGN KEY (`id_korisnika`) REFERENCES `korisnik` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
