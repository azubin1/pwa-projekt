-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jun 19, 2025 at 10:53 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `formula1`
--
CREATE DATABASE IF NOT EXISTS `formula1` DEFAULT CHARACTER SET latin2 COLLATE latin2_croatian_ci;
USE `formula1`;

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id` int(11) NOT NULL,
  `ime` varchar(32) NOT NULL,
  `prezime` varchar(32) NOT NULL,
  `korisnicko_ime` varchar(32) NOT NULL,
  `lozinka` varchar(255) NOT NULL,
  `razina` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin2 COLLATE=latin2_croatian_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `ime`, `prezime`, `korisnicko_ime`, `lozinka`, `razina`) VALUES
(1, 'Moje ime', 'Moje prezime', 'admin', '$2y$10$G8CWg5uPM0S08v90GLuxzOhZdnp1lxJYuAmU9t3EFLmLH1Yzj3HUq', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vijesti`
--

CREATE TABLE `vijesti` (
  `id` int(11) NOT NULL,
  `datum` varchar(32) NOT NULL,
  `naslov` varchar(150) NOT NULL,
  `sazetak` text NOT NULL,
  `sadrzaj` text NOT NULL,
  `slika` varchar(64) NOT NULL,
  `kategorija` varchar(64) NOT NULL,
  `arhiva` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin2 COLLATE=latin2_croatian_ci;

--
-- Dumping data for table `vijesti`
--

INSERT INTO `vijesti` (`id`, `datum`, `naslov`, `sazetak`, `sadrzaj`, `slika`, `kategorija`, `arhiva`) VALUES
(14, '19.06.2025', 'Silence is generally complicit: Six F1 drivers choose not to kneel at Austrian Grand Prix', 'Valtteri Bottas kneeled holding the winners trophy at Formula Ones season-opening Austrian Grand Prix, where the podium trio held up a black T-shirt with End Racism written on it.', 'That message was said before the race, too, when all drivers wore the T-shirt on the grid.\r\n<br>\r\nEnd Racism. One cause. One commitment, the F1 said in a statement.\r\n<br>\r\nAs individuals, we choose our own way to support the cause. As a group of drivers and a wider F1 family, we are united in its goal.\r\nWorld champion Lewis Hamilton, the only black driver in F1, had Black Lives Matter on the front and End Racism on the back of his.\r\n<br>\r\nBut six drivers did not join Hamilton and 13 others in taking the knee pre-race: Kimi Raikkonen, Max Verstappen, Daniil Kvyat, Antonio Giovinazzi, Carlos Sainz Jr. and Charles Leclerc - who finished in second place.\r\n<br>\r\nLeclerc explained his decision not to kneel, saying: I believe that what matters are facts and behaviours in our daily life rather than formal gestures that could be seen as controversial in some countries. I will not take the knee but this does not mean at all that I am less committed than others in the fight against racism.', 'politika1.jpg', 'politika', 0),
(15, '19.06.2025', 'Kamala Harris hits back at motives behind Lewis Hamilton support after Donald Trump endorsed F1 rival', 'Kamala Harris has rejected claims that her love for Formula One is a campaign thing after sharing her support for Lewis Hamilton.    promjena', 'Motorsports elite has finally seemed to have cracked America in recent years, thanks, in part, to Netflix sensation Drive to Survive.\r\n<br>\r\nUSA now have three tracks on the 2024 grid, with the next round of the season taking place at the Circuit of the Americas this month.\r\n<br>\r\nSpeaking on a Howard Stern broadcast, Harris explained: Its so good. We love it. Our whole family does.\r\n<br>\r\nThe US Grand Prix is set to take place in Austin, Texas - a state Republicans have carried in each of the last 11 presidential elections.\r\n<br>\r\nThe last Democrat to win the Lone Star State was Jimmy Carter in 1976, with Donald Trump carrying the torch in 2016 and 2020.\r\n<br>\r\nThis years F1 return to Texas is on October 20, a mere 16 days before the 2024 United States presidential election.\r\n<br>\r\nHowever, Harris hit back at jibes that her newfound love of car racing was a campaign thing, saying: No. God no! No.\r\n<br>\r\nActually, I havent been able to watch a lot lately because I am campaigning because you know depending on where theyre driving, the time of day, youve got to wake up early.    ', 'politika2.jpg', 'politika', 0),
(16, '11.06.2025', 'Briatore delighted by return of \"super motivated\" Alonso', 'Former Formula 1 team boss Flavio Briatore says that he is delighted to see a revitalised Fernando Alonso returning to the sport in 2021.', 'As principal of Renault in 2003, Briatore was instrumental in giving Alonso his big break in F1. Together they went on score back-to-back driver and team titles in 2005 and 2006.\r\n<br>\r\n?I liked Fernando because hes very quick, he was incredible, I hadnt seen anything like it,\" Briatore told Spanish terrestrial television channel Antena 3 this week.\r\n<br>\r\nRead also: Massa says age could be a problemo for F1 returnee Alonso\r\n?He was so young back then. I watched him, we spoke and I put a contract in front of him after that conversation. You see that kind of talent and react quickly.\"\r\n<br>\r\nBriatore also managed Alonsos career and the two of them grew close together over their years in F1. \"Fernando and I are family,\" he stated.\r\n<br>\r\n?We did something incredible together, what memories,\" he added. \"Everyone experienced that. Hes unique. Hes honourable, strong, solid.\"\r\n<br>\r\nAlonso went on to drive for McLaren and Ferrari, but quit the sport at the end of 2018 to pursue his dream of clinching the unofficial Triple Crown of Motorsport by targeting wins at Le Mans and Indianapolis to go with his two F1 victories at Monaco.\r\n<br>\r\nBut after two years away the 39-year-old is to make his Grand Prix comeback in familiar surroundings at Renault - and Briatore couldnt be happier.\r\n?Im delighted hes returned,\" he said. \"He?s one of the best and were going to see that next year. Hes in super form and very motivated.\"\r\n<br>\r\nAnd Briatore confirmed that hed had a hand in the comeback. ?We work together, yes. We have worked together for his return to F1.\"\r\n<br>\r\nBriatore contracted coronavirus over the summer and was briefly hospitalised in Milan, but the 70-year-old insisted that the whole thing had been blown up out of proportion by the media.\r\n<br>\r\n?There was a lot of talk about it in the press,? he acknowledged. ?I recovered, but if you followed the press it seemed I had died! But I havent died, I am feeling phenomenal.\r\n<br>\r\n?Covid-19 is terrible but for me it was like a mild pneumonia,\" he added. \"I was admitted to the hospital for five days, and then had to quarantine for three weeks at home to recover.\"', 'politika3.jpg', 'politika', 0),
(17, '11.06.2025', 'Hamilton praying for end of Azerbaijan F1 GP with back pain in Mercedes', 'Lewis Hamilton said he \"cannot express the pain\" suffered due to bouncing in his Mercedes Formula 1 car during the Azerbaijan Grand Prix and was relieved just to finish.', 'Mercedes problems with bouncing and porpoising re-emerged at the bumpy Baku street track this weekend, with both Hamilton and teammate George Russell complaining of back pain after practice and qualifying.\r\n<br>\r\nThe seven-time world champion complained of back pain over his team radio during the race, with Mercedes team boss Toto Wolff apologising to him for the cars bouncing problem, as Hamilton was grateful just to finish the race in fourth place due to the pain he was feeling.\r\n<br>\r\n\"I was just holding and biting down on my teeth due to the pain, and the adrenaline [helped], I cannot express the pain that you experience, particularly on the straight here,\" Hamilton told Sky Sports F1, having been visibly in pain when both getting out of the car and in the post-race media interviews.\r\n<br>\r\n\"At the end you are just praying for it to end.\"\r\n<br>\r\n\"But we were in such a good position still, third and fourth, a great result for the team. The team did a great job with the strategy.\"\r\n<br>\r\nHamilton remains confident once Mercedes cures its F1 cars porpoising problem it can make clear performance jumps as he estimated the issue was costing him around one second per lap in Baku.\r\n<br>\r\n\"Once we fix this bouncing well be right there in the race,\" he said. \"But we were losing, for sure, over a second just with bouncing. Or at least a second with bouncing.\r\n<br>\r\n\"I will be at the factory tomorrow, weve got to have some good discussions and keep pushing.\"', 'zdravlje1.jpg', 'zdravlje', 0),
(18, '11.06.2025', 'Aston Martin takes pole position as official Safety Car of Formula One', 'When Aston Martin makes its return to the Formula One World Championship at the end of this month, it will be with more than two Grand Prix contenders on the Bahrain Grand Prix grid. For the first time in the history of the sport, the Official Safety and Medical cars of Formula One will also bear the famous wings of the British luxury brand.', 'Aston Martin DBX, the brands critically acclaimed first SUV, will also take on the role of an Official Medical Car of Formula One, showcasing its own power and handling prowess as it launches into action to support in the event of an emergency.\r\n<br>\r\nThe safety car mimics the Aston Martin Cognizant Formula One? Teams AMR21 with an all-new paint colour, 2021 Aston Martin Racing Green, which was developed specifically to celebrate the marques return to Formula One after more than 60 years.\r\n<br>\r\nA Lime Essence pinstripe highlights the front splitter; a colour synonymous with Aston Martin?s successful racing pedigree, and most recently used on the ultra-successful Vantage that competed in the FIA World Endurance Championship (WEC).\r\n<br>\r\nThe Formula One Safety Car is otherwise distinguished by its prominent FIA Safety Car livery, bodyside mounted radio antennas, an LED rear number plate and a bespoke, roof-mounted LED light-bar, developed by Aston Martin.\r\n<br>\r\nLike the safety car, the medical car is distinguishable by its 2021 Aston Martin Racing Green paint with Lime Green accents - as well as the prominent FIA medical car livery, LED rear number plate and roof-mounted LED light-bar which sits upon the roof rails.', 'zdravlje2.jpg', 'zdravlje', 0),
(19, '11.06.2025', 'Jack Doohan, Aussie rookie F1 driver, crash stops practice session at Japanese Grand Prix', 'Aussie F1 driver Jack Doohan walked away from a 300km/h crash that left former world champion Jacques Villeneuve dumbfounded how his Alpine lost complete control at the Japanese Grand Prix at Suzuka. The team has uncovered the reason.', 'Australian F1 rookie Jack Doohan was lucky to walk away from 300km/h crash that left world champion Jacques Villeneuve dumbfounded how his Alpine lost complete control at the Japanese Grand Prix at Suzuka\r\n<br>\r\nBut the team later put responsibility at the feet of their rookie driver.\r\n<br>\r\nIn a shocking incident in free practice two that had a rival stunned and prompted an immediate investigation by FIA officials, Doohan slammed into the tyre wall at the end of turn one when his car simply lost control as he attempted to brake into the apex of the corner.\r\n<br>\r\nGiven drivers reach speeds of 300km/h down the main straight and Doohan had yet to apply the brakes, Villeneuve said the impact would have been serious on the young Australian.\r\n<br>\r\n?Im OK, yeah, what happened?? Doohan said on the team radio immediately afterwards.\r\n<br>\r\nEven Sky Sports commentators thought there was little Doohan could do to prevent the crash, claiming he was ?just a passenger? as the rear wheels lost grip and complete control.\r\n<br>\r\nThe incident caused immediate shock, with rivals immediately fearful for Doohans safety.\r\n<br>\r\n?Whoa big crash. Big, big crash. Oh my god,? said rival Isack Hadjar said on his team radio having witnessed the spin from behind.', 'zdravlje3.jpg', 'zdravlje', 0),
(26, '19.06.2025', 'Same love', 'dsfdgsrwewfsfwesaf', 'dasdsdassdasadqqreqdqcwqecqwexqweq', 'clanakslika.jpg', 'politika', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `korisnicko_ime` (`korisnicko_ime`);

--
-- Indexes for table `vijesti`
--
ALTER TABLE `vijesti`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `vijesti`
--
ALTER TABLE `vijesti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
