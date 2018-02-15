-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 28. Jan 2018 um 21:43
-- Server-Version: 10.1.26-MariaDB
-- PHP-Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `zftutorial`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `posts`
--

INSERT INTO `posts` (`id`, `title`, `text`) VALUES
(1, 'Blog #1', 'Welcome to my first blog post'),
(2, 'Blog #2', 'Welcome to my second blog post'),
(6, 'Popcornflackes', 'This might be the only post you will ever read about mosquitos.'),
(7, 'Return to the Past', 'In 1870 a hydro electric power station was designed and built by Lord Armstrong at Cragside, England. It used water from lakes on his estate to power Siemens dynamos. The electricity supplied power to lights, heating, produced hot water, ran an elevator as well as labor-saving devices and farm buildings.[1]\r\n\r\nIn the early 1870s Belgian inventor Zénobe Gramme invented a generator powerful enough to produce power on a commercial scale for industry.[2]\r\n\r\nIn the autumn of 1882, a central station providing public power was built in Godalming, England. It was proposed after the town failed to reach an agreement on the rate charged by the gas company, so the town council decided to use electricity. It used hydroelectric power for street lighting and household lighting. The system was not a commercial success and the town reverted to gas.[3]\r\n\r\nIn 1882 the world\'s first coal-fired public power station, the Edison Electric Light Station, was built in London, a project of Thomas Edison organized by Edward Johnson. A Babcock & Wilcox boiler powered a 125-horsepower steam engine that drove a 27-ton generator. This supplied electricity to premises in the area that could be reached through the culverts of the viaduct without digging up the road, which was the monopoly of the gas companies. The customers included the City Temple and the Old Bailey. Another important customer was the Telegraph Office of the General Post Office, but this could not be reached though the culverts. Johnson arranged for the supply cable to be run overhead, via Holborn Tavern and Newgate.[4]\r\n\r\nIn September 1882 in New York, the Pearl Street Station was established by Edison to provide electric lighting in the lower Manhattan Island area. The station ran until destroyed by fire in 1890. The station used reciprocating steam engines to turn direct-current generators. Because of the DC distribution, the service area was small, limited by voltage drop in the feeders. The War of Currents eventually resolved in favor of AC distribution and utilization, although some DC systems persisted to the end of the 20th century. DC systems with a service radius of a mile (kilometer) or so were necessarily smaller, less efficient of fuel consumption, and more labor-intensive to operate than much larger central AC generating stations.\r\n\r\nAC systems used a wide range of frequencies depending on the type of load; lighting load using higher frequencies, and traction systems and heavy motor load systems preferring lower frequencies. The economics of central station generation improved greatly when unified light and power systems, operating at a common frequency, were developed. The same generating plant that fed large industrial loads during the day, could feed commuter railway systems during rush hour and then serve lighting load in the evening, thus improving the system load factor and reducing the cost of electrical energy overall. Many exceptions existed, generating stations were dedicated to power or light by the choice of frequency, and rotating frequency changers and rotating converters were particularly common to feed electric railway systems from the general lighting and power network.\r\n\r\nThroughout the first few decades of the 20th century central stations became larger, using higher steam pressures to provide greater efficiency, and relying on interconnections of multiple generating stations to improve reliability and cost. High-voltage AC transmission allowed hydroelectric power to be conveniently moved from distant waterfalls to city markets. The advent of the steam turbine in central station service, around 1906, allowed great expansion of generating capacity. Generators were no longer limited by the power transmission of belts or the relatively slow speed of reciprocating engines, and could grow to enormous sizes. For example, Sebastian Ziani de Ferranti planned what would have been the largest reciprocating steam engine ever built for a proposed new central station, but scrapped the plans when turbines became available in the necessary size. Building power systems out of central stations required combinations of engineering skill and financial acumen in equal measure. Pioneers of central station generation include George Westinghouse and Samuel Insull in the United States, Ferranti and Charles Hesterman Merz in UK, and many others.'),
(9, 'The Beast of New Orleans', 'Looking through the future, it might just well that you will have to deal with the fact that roses aren\'t red anymore.'),
(10, 'Leopold the bold', 'This is the man that picked up a flower, smellded and transform himself in the pefect living creature on earth.'),
(11, 'Popcornflackes part II', 'Let the dogs eat the dirt they made.'),
(12, 'Popcornflackes part II', 'Whenever the time as come.'),
(13, 'Sing the love away', 'There is one thing one can always count on: the weather out there : )'),
(14, 'And the tables turned', 'If you can remember the day you smíled for the first time, you would never put on theat ass face of yours.');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
