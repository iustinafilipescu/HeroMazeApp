-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2021 at 10:30 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `heromaze`
--

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `character_id` varchar(45) DEFAULT NULL,
  `question` varchar(400) DEFAULT NULL,
  `A_answer` varchar(45) DEFAULT NULL,
  `B_answer` varchar(45) DEFAULT NULL,
  `C_answer` varchar(45) DEFAULT NULL,
  `correct_answer` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `character_id`, `question`, `A_answer`, `B_answer`, `C_answer`, `correct_answer`) VALUES
(1, '1', 'Cum il cheama pe Aquaman in viata reala?', 'Bruce Wayne', 'Arthur Curry', 'Red Robin', 'B'),
(2, '1', 'În ce an s-a scufundat Titanicul?', '1915', '1904', '1912', 'C'),
(3, '1', 'Ce metal a fost descoperit de Hans Christian Oersted în 1825?', 'aluminiu', 'plumb', 'zinc', 'A'),
(4, '1', 'Ce culoare au ochii lui Aquaman?', 'albastri', 'verzi', 'negri', 'A'),
(5, '1', 'Câte respirații are corpul uman zilnic?', '15000', '18000', '20000', 'C'),
(6, '1', 'Care este durata de viață a unei libelule?', 'o saptamana', '1 zi', '10 zile', 'B'),
(7, '1', 'Ce culoare are parul lui Aquaman?', 'alb', 'bleumarin', 'blond', 'C'),
(8, '1', ' În ce an a fost lansat pentru prima dată The Godfather?', '1961', '1972', '1993', 'B'),
(9, '1', 'Care este cel mai înalt munte de pe Glob?', 'Himalaya', 'Omu', 'Everest', 'C'),
(10, '1', 'In ce an a aparut caracterul Aquaman?', '1941', '1939', '1945', 'A'),
(11, '2', 'Ce culoare au ochii lui Batman?', 'negri', 'albastri', 'verzi', 'B'),
(12, '2', 'In ce an a avut loc Nașterea lui Buddha?', '486 î.Hr', ' 385 î.Hr', '289 î.Hr', 'A'),
(13, '2', 'Ce culoare are parul lui Batman?', 'saten', 'bleumarin', 'negru', 'C'),
(14, '2', 'Dacă Pământul ar fi făcut într-o gaură neagră, care ar fi diametrul orizontului său de eveniment?', '15mm', '20mm', '35mm', 'B'),
(15, '2', 'În 1930, Albert Einstein și un coleg au primit un brevet american 1781541. Pentru ce a fost?', 'aragaz', 'cuptor', 'frigider', 'C'),
(16, '2', 'Câte floarea-soarelui au existat în cea de-a treia versiune a lui Van Gogh din tabloul „Floarea-soarelui”?', '12', '5', '17', 'A'),
(17, '2', 'In ce an a aparut caracterul Batman?', '1941', '1939', '1945', 'B'),
(18, '2', 'Unde se afla Podul portului Sydney?', 'UK', 'SUA', 'Australia', 'C'),
(19, '2', 'In ce an a fost fondata prima universitate?', '1088', '977', '1123', 'A'),
(20, '2', 'Care este identitatea secreta a lui Batman?', 'Bruce Wayne', 'Arthur Curry', 'Red Robin', 'A'),
(21, '3', 'Games of Thrones: Cum a murit copilul lui Cersi, Myrcella?', 'sufocat in somn', 'in razboi', 'otravit', 'C'),
(22, '3', 'Ce culoare au ochii lui Captain America?', 'albastri', 'verzi', 'negri', 'A'),
(23, '3', 'Ce artist a pictat „Iazul cu lac de apă” în 1899?', 'Rembrandt', 'Monet', 'Picasso', 'B'),
(24, '3', 'Cum il cheama pe Captain America in viata reala?', 'Peter Parker', 'Thor Odinson', 'Steven Rogers', 'C'),
(25, '3', 'In ce tara se afla  Colosseum?', 'Spania', 'Grecia', 'Italia', 'C'),
(26, '3', 'Ce culoare are parul lui Captain America?', 'negru', 'blond', 'alb', 'B'),
(27, '3', 'In ce an s-a născut William Shakespeare?', '1564', '1643', '1489', 'A'),
(28, '3', 'Unde au fost produse primele animații computerizate?', 'Laboratorul Walt Disney ', 'Laboratorul Rutherford Appleton', 'Laboratorul Karl Jacob', 'B'),
(29, '3', 'In ce an a aparut caracterul Captain America?', '1945', '1948', '1950', 'C'),
(30, '3', 'Dacă ați putea procesa un miliard de atomi pe secundă, cât de mult timp ar fi nevoie pentru a teleporta o ființă umană tipică?', '200 mld ani', '150 mld ani', '500 mld ani', 'A'),
(31, '4', 'Care este cel mai lung fluviu din Europa?', 'Dunarea', 'Volga', 'Nilul', 'B'),
(32, '4', 'Ce culoare au ochii lui Spriderman ?', 'negri', 'albastri', 'caprui', 'C'),
(33, '4', 'In ce tara se afla Taj Mahal?', 'India', 'China', 'Iran', 'A'),
(34, '4', 'In ce an Martin Luther lansează Reforma?', '1517', '1523', '1498', 'A'),
(35, '4', 'Ce culoare are parul lui Spriderman ?', 'negru', 'blond', 'saten', 'C'),
(36, '4', 'Care cântăreț era cunoscut printre altele sub numele de „Regele popului” și „The Gloved One”?', 'Elvis Presley', 'Michael Jackson', 'Billy Joe', 'B'),
(37, '4', 'În ce an Beatles a plecat prima dată în SUA?', '1959', '1964', '1989', 'B'),
(38, '4', 'In ce an a aparut caracterul Spriderman ?', '1959', '1961', '1962', 'C'),
(39, '4', 'Care este temperatura medie a suprafeței pe Venus?', '460 ° C', '60 ° C', '20000 ° C', 'A'),
(40, '4', 'Care este identitatea secreta a lui Spiderman?', 'Peter Parker', 'James Howlett', 'Bruce Wayne', 'A'),
(41, '5', 'In ce an a avut loc Sfârșitul Primului Război Mondial?', '1916', '1923', '1918', 'C'),
(42, '5', 'Ce culoare au ochii lui Superman?', 'albastri', 'verzi', 'negri', 'A'),
(43, '5', 'Unde se afla Monumentul Azadi?', 'Irak', 'Iran', 'Iordania', 'B'),
(44, '5', 'Ce culoare are parul lui Superman?', 'negru', 'albastru', 'saten', 'A'),
(45, '5', 'In ce tara se afla Juche Tower?', 'China', 'Japonia', 'Coreea', 'B'),
(46, '5', 'Unde în lume este expusă Mona Lisa a lui Leonardo da Vinci?', 'Londra', 'Berlin', 'Paris', 'C'),
(47, '5', 'In ce an a aparut caracterul Superman?', '1985', '1984', '1986', 'C'),
(48, '5', 'Ce vedetă pop americană a avut succes în topul din 2015 cu single-urile „Sorry” și „Love Yourself”?', 'Beyonce', 'Justin Bieber', 'Bruno Mars', 'B'),
(49, '5', 'Ce club a câștigat finala Cupei FA din 1986?', 'Liverpool ', 'Manchester', 'FC Barcelona', 'A'),
(50, '5', 'Care este identitatea secreta a lui Superman?', 'Clark Kent', 'Red Robin', 'Thor Odinson', 'A'),
(51, '6', 'Câte continente există pe Pământ?', '7', '6', '5', 'A'),
(52, '6', 'Ce culoare au ochii lui Thor?', 'verzi', 'albastri', 'negri', 'B'),
(53, '6', 'Games of Thrones: Daenerys are 3 dragoni. Care dintre urmatoarele nume nu este al unuia dintre ei?', 'Viserion', 'Rhaegal', 'Draco', 'C'),
(54, '6', 'In ce an a avut loc Sfârșitul celui de-al doilea război mondial?', '1942', '1945', '1948', 'B'),
(55, '6', 'Ce culoare are parul lui  Thor?', 'blond', 'negru', 'alb', 'C'),
(56, '6', 'In ce an a fost inființată China comunistă?', '1949', '1951', '1956', 'A'),
(57, '6', 'Unde se afla Statuia Libertăţii?', 'Canada', 'UK', 'SUA', 'C'),
(58, '6', 'In ce an a aparut caracterul Thor?', '1940', '1941', '1948', 'B'),
(59, '6', 'In ce tara se afla  Piramida Giza și Sfinxul Mare?', 'Egipt', 'Iordania', 'Arabia Saudita', 'A'),
(60, '6', 'Care este numele complet a lui Thor?', 'Thor Parker', 'Thor Jacob', 'Thor Odinson', 'C'),
(61, '7', 'Câți ani avea Michael când a murit în 2009?', '50', '49', '59', 'A'),
(62, '7', 'Ce culoare au ochii lui Timothy Drake?', 'negri', 'verzi', 'albastri', 'B'),
(63, '7', 'Ce film Bond a fost lansat în 2006?', 'Moonraker', 'Casino Royale', 'Live and Let Die', 'C'),
(64, '7', 'Care este cel mai estic oraș al României?', 'Iasi', 'Constanta', 'Sulina', 'C'),
(65, '7', 'Ce culoare are parul lui Timothy Drake?', 'alb', 'negru', 'gri', 'B'),
(66, '7', ' În ce țară s-a născut Adolf Hitler?', 'Austria', 'Germania', 'Olanda', 'A'),
(67, '7', 'În ce oraș au fost executați soții Ceaușescu?', 'Iasi', 'Targiviste', 'Slatina', 'B'),
(68, '7', 'In ce an a aparut caracterul Timothy Drake?', '1941', '1965', '1989', 'C'),
(69, '7', 'Ce naționalitate are Papa Francisc I?', 'argentiniana', 'spaniola', 'italiana', 'A'),
(70, '7', 'Ce porecla are Tim Drake?', 'Red Robin', 'Robin Hood', 'Robin Robbe', 'A'),
(71, '8', 'Game of Thrones:  Cine a fost responsabil pentru crearea regelui de noapte?', 'copiii Padurii', 'familia Stark', 'dragonii', 'A'),
(72, '8', 'Ce culoare au ochii lui Wolverine?', 'verzi', 'albastri', 'negri', 'B'),
(73, '8', 'Care actor a fost James Bond înaintea lui Daniel Craig, realizând patru filme ca 007?', 'George Lazenby', 'Richard Kiel', 'Pierce Brosnan', 'C'),
(74, '8', 'Cum se numea autobiografia lui Michael, lansată în 1988?', 'King of Pop', 'Moonwalk', 'The Legend', 'B'),
(75, '8', 'Ce culoare are parul lui Wolverine?', 'negru', 'gri', 'saten', 'A'),
(76, '8', 'Ce țară din America de Sud are cea mai mare suprafață?', 'Canada', 'Mexic', 'Brazilia', 'C'),
(77, '8', 'Care este capitala Islandiei?', 'Oslo', 'Copenhaga', 'Reykjavik', 'C'),
(78, '8', 'In ce an a aparut caracterul Wolverine?', '1939', '1974', '1993', 'B'),
(79, '8', 'Câte state are Statele Unite ale Americii?', '50', '48', '51', 'A'),
(80, '8', 'Cum il cheama pe Wolverine in viata reala?', 'Arthur Curry', 'James Howlett', 'Bruce Wayne', 'B');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
