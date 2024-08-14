-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 14, 2024 at 06:52 PM
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
-- Table structure for table `komentar`
--

DROP TABLE IF EXISTS `komentar`;
CREATE TABLE IF NOT EXISTS `komentar` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_teme` int NOT NULL,
  `tekst_komentara` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_korisnika` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_tema` (`id_teme`),
  KEY `FK_komentar_korisnik` (`id_korisnika`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id`, `id_teme`, `tekst_komentara`, `id_korisnika`) VALUES
(1, 1, 'Preporučujem korišćenje root varijabli kako bi sve teme bile centralizovane i lako dostupne.', 1),
(2, 2, 'Jenkins je veoma moćan alat za CI/CD. Preporučujem integraciju sa git-om i drugim alatima za maksimalnu efikasnost.', 3),
(3, 2, 'Automatizacija testova u CI/CD pipeline-u može značajno smanjiti broj grešaka u produkciji.', 5),
(8, 1, 'CSS varijable su sjajan alat za tematizaciju. Omogućavaju brze promene i poboljšavaju održavanje koda.', 8),
(9, 3, '2FA je jednostavna, ali veoma efikasna mera koja može značajno poboljšati sigurnost korisničkih naloga. Preporučujem je za sve aplikacije koje upravljaju osetljivim podacima!!!', 8),
(10, 12, 'Preporučljivo je da korisnici koriste cheatsheet-ove kao dopunu učenju HTML-a. Ovi vodiči pružaju pregled osnovnih elemenata, atributa i struktura koje su često korišćene u HTML-u.', 9),
(11, 10, 'Bilo bi pozeljno rukovati sa Linux-om, jer nikada ne znate kada ce vam zatrebati.', 9),
(12, 10, 'Linux može biti izazovan za početnike, ali sa strpljenjem i praksom, možete postati veštiji u korišćenju ovog operativnog sistema. Isprobavanje različitih funkcionalnosti, eksperimentisanje sa komandama i rešavanje problema su ključni koraci u učenju Linux-a. Otpornost na izazove i postepeno napredovanje će vam pomoći da postanete udobniji i sigurniji u svom radu sa Linuxom. ', 3),
(14, 12, 'Korišćenje cheatsheet-ova može značajno ubrzati proces učenja i pisanja HTML-a, omogućavajući brzu referencu za često korišćene elemente i njihove atribute. Preporučljivo je da korisnici koriste cheatsheet-ove kao dopunu učenju HTML-a. Ovi vodiči pružaju pregled osnovnih elemenata, atributa i struktura koje su često korišćene u HTML-u. Korisno je koristiti online resurse', 3),
(15, 7, 'Dinamičko učitavanje modula po potrebi omogućava efikasnije korišćenje resursa i bolje performanse u velikim aplikacijama, smanjujući ukupno vreme pokretanja i opterećenje memorije. Ova praksa je posebno korisna kada radite sa modularnim arhitekturama gde ne želite da učitate sve module unapred, već samo one koje su potrebne u datom trenutku.', 3),
(16, 8, 'Implementacija full-text pretrage omogućava efikasno pretraživanje teksta u velikim bazama podataka, poboljšavajući performanse i brzinu pretrage. Ovo je posebno korisno kada radite sa velikim količinama tekstualnih podataka i kada je potrebno brzo i precizno pretraživanje.', 4),
(17, 9, 'Programeri bi trebali da obrate paznju na ovo!! SQL Injection je čest i opasan napad koji može uzrokovati ozbiljne probleme sa sigurnošću web aplikacija. Prevencija ovog napada je ključna za očuvanje integriteta podataka i zaštitu korisničkih informacija.\r\n', 7);

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

DROP TABLE IF EXISTS `korisnik`;
CREATE TABLE IF NOT EXISTS `korisnik` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ime` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `prezime` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mail` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `korisnicko_ime` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `lozinka` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `ime`, `prezime`, `mail`, `korisnicko_ime`, `lozinka`) VALUES
(1, 'Jelena', 'Petrovic', 'jelena@gmail', 'jelena', '594f803b380a41396ed63dca39503542'),
(3, 'Jovana', 'Ivkovic', 'jovana76@gmail', 'Jovana76', '652b2e2b7133229a89650de27ad7fc41'),
(4, 'Marina', 'Ostojic', 'marina@gmail.com', 'Marina55', 'ce5225d01c39d2567bc229501d9e610d'),
(5, 'Djordje', 'Spijunovic', 'djordje@gmail.com', 'dordje', 'ae630f503bf6ab8e30781607a5a99629'),
(6, 'Ivan', 'Dinic', 'Dinic@gmail.com', 'Ivan', '2c42e5cf1cdbafea04ed267018ef1511'),
(7, 'Milena', 'Arsic', 'Milena@hotmail.com', 'Milena.Arsicc', '1b52a583020088fad8cc06fd0e67910e'),
(8, 'Sinisa', 'Petrovic', 'Petrovic@gmail.com', 'Sinisa.Petrovic', 'dd5501ca0d6403a5510aae13235bd345'),
(9, 'Sava', 'Stankovic', 'sava.stankovic@gmail.com', 'Sava.Stankovic', '9cbdac81135e956ea0415a1d201147d9'),
(10, 'Petar', 'Petrovic', 'pera@petar.com', 'pera', 'a7be72d58029707f81b90ef7177b1418'),
(11, 'miwica', 'Stankovic', 'mmiwimiwi@gmail.com', 'miwica', '977b98c9f8803851611f38a9cf94ddbc');

-- --------------------------------------------------------

--
-- Table structure for table `resenja`
--

DROP TABLE IF EXISTS `resenja`;
CREATE TABLE IF NOT EXISTS `resenja` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_teme` int NOT NULL,
  `id_korisnika` int NOT NULL,
  `opis_resenja` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_resenje_tema` (`id_teme`),
  KEY `FK_resenje_korisnik` (`id_korisnika`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `resenja`
--

INSERT INTO `resenja` (`id`, `id_teme`, `id_korisnika`, `opis_resenja`) VALUES
(2, 1, 8, 'Definisanje CSS varijabli za boje, fontove i druge stilove, i njihova upotreba u CSS kodu. Na ovaj način, promena teme može biti izvršena promenom samo nekoliko varijabli.'),
(3, 2, 5, 'Implementacija CI/CD pipeline-a koristeći Jenkins. Automatizacija build, test i deploy procesa kako bi se osigurala brza i pouzdana isporuka koda.'),
(6, 8, 3, 'Umesto korišćenja tradicionalnih metoda pretrage poput LIKE upita, možete implementirati full-text pretragu za efikasnije pretraživanje teksta u velikim bazama podataka. Ova tehnika omogućava brže pretraživanje i bolje performanse u poređenju sa standardnim SQL upitima.Kreiranje Indeksa: Prvo, kreirajte full-text indeks na kolonama koje želite da pretražujete. Ovi indeksi se koriste za ubrzavanje pretrage.Korišćenje Full-Text Funkcija: Koristite full-text funkcije poput MATCH() AGAINST() za izvršavanje pretrage.'),
(7, 9, 7, 'Pravo rešenje problema uključuje korišćenje parametrizovanih upita ili sprečavanje injekcija korišćenjem SQL sanitizacije. Parametrizovani upiti koriste bind varijable umesto konkatenacije stringova, što sprečava SQL Injection napade. Takođe je važno redovno ažurirati softver, primenjivati princip minimalnih privilegija, i koristiti WAF (Web Application Firewall) za dodatnu zaštitu od ovog tipa napada.'),
(8, 3, 6, 'Implementacija dvofaktorske autentifikacije (2FA), koja zahteva dodatni faktor verifikacije pored lozinke, kao što je kod generisan mobilnom aplikacijom ili SMS porukom. Ovo značajno povećava sigurnost korisničkih naloga.'),
(10, 12, 9, 'Ovo su neki cheatsheeetovi koji su meni bili od pomoci, lako cete se snaci u koriscenju istih:\r\nJavaScript Cheat Sheet\r\nDOM Manipulation Cheat Sheet\r\nES6 Cheat Sheet\r\nFetch API Cheat Sheet\r\nReact Cheat Sheet'),
(12, 10, 8, 'Osnove Terminala: Naučite osnovne komande poput ls, cd, mkdir i rm za navigaciju i upravljanje fajlovima u terminalu.\r\n\r\nPristup Administrativnim Pravima: Koristite komandu sudo za izvršavanje administrativnih komandi i operacija koje zahtevaju administratorska prava.\r\n\r\nPaketni Menadžeri: Upoznajte se sa paketnim menadžerima poput apt (za Debian bazirane distribucije) i yum (za Red Hat bazirane distribucije) za instalaciju, ažuriranje i uklanjanje softvera.\r\n\r\nRazličitost Desktop Okruženja: Istražite različita desktop okruženja kao što su GNOME, KDE, XFCE i odaberite ono koje vam najviše odgovara.\r\n\r\nPraćenje Dokumentacije i Tutorials: Redovno pratite dokumentaciju i tutorijale dostupne u Linux zajednici kako biste unapredili svoje znanje i rešavali probleme.\r\n\r\nBackup i Bezbednost: Koristite alate poput rsync za backup podataka i ufw za upravljanje sigurnošću kako biste zaštitili svoje podatke i sistem.\r\n\r\nStrpljenje i Praksa: Budite strpljivi i redovno vežbajte. Linux zahteva praksu'),
(13, 7, 3, 'Umesto da učitavate sve module odjednom, možete koristiti dinamičko učitavanje modula po potrebi koristeći refleksiju ili posebne biblioteke kao što je java.lang.reflect ili ClassLoader. Na primer, možete koristiti ClassLoader za dinamičko učitavanje klasa u Javi.'),
(14, 8, 5, 'Za poboljšanje performansi pretrage teksta u velikim bazama podataka, može se implementirati full-text pretraga. Ova tehnika omogućava efikasnije pretraživanje teksta koristeći optimizovane algoritme i strukture podataka. Full-text pretraga omogućava indeksiranje tekstualnih sadržaja i pruža napredne metode pretrage, kao što su ponderisane pretrage, frazna pretraga, i puni tekstualni pretraga. Implementacija full-text pretrage omogućava brže i efikasnije pretraživanje teksta u bazama podataka, što dovodi do poboljšanja performansi sistema.');

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
-- Constraints for table `resenja`
--
ALTER TABLE `resenja`
  ADD CONSTRAINT `FK_resenje_korisnik` FOREIGN KEY (`id_korisnika`) REFERENCES `korisnik` (`id`),
  ADD CONSTRAINT `FK_resenje_tema` FOREIGN KEY (`id_teme`) REFERENCES `tema` (`id`);

--
-- Constraints for table `tema`
--
ALTER TABLE `tema`
  ADD CONSTRAINT `FK_tema_korisnik` FOREIGN KEY (`id_korisnika`) REFERENCES `korisnik` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
