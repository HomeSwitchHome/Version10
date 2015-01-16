-- phpMyAdmin SQL Dump
-- version 4.2.5
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Jan 16, 2015 at 10:11 AM
-- Server version: 5.5.38
-- PHP Version: 5.5.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `hsh`
--

-- --------------------------------------------------------

--
-- Table structure for table `avis`
--

CREATE TABLE `avis` (
`id` int(11) NOT NULL,
  `avis` text,
  `date` datetime DEFAULT NULL,
  `membres_id` int(11) NOT NULL,
  `logements_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `communique`
--

CREATE TABLE `communique` (
`id` int(11) NOT NULL,
  `date` datetime DEFAULT NULL,
  `membres_idMembres` int(11) NOT NULL,
  `membres_idMembres1` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `contraintes`
--

CREATE TABLE `contraintes` (
`id` int(11) NOT NULL,
  `contrainte` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `departements`
--

CREATE TABLE `departements` (
`id` int(11) NOT NULL,
  `departement` varchar(45) DEFAULT NULL,
  `regions_idRegions` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `diponibilites`
--

CREATE TABLE `diponibilites` (
`id` int(11) NOT NULL,
  `dateDebut` datetime DEFAULT NULL,
  `dateFin` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `disponible`
--

CREATE TABLE `disponible` (
`id` int(11) NOT NULL,
  `logements_id` int(11) NOT NULL,
  `diponibilites_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `echanges`
--

CREATE TABLE `echanges` (
`id` int(11) NOT NULL,
  `dateDebut` datetime DEFAULT NULL,
  `dateFin` datetime DEFAULT NULL,
  `logements_idLogements` int(11) NOT NULL,
  `logements_idLogements1` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `equipe`
--

CREATE TABLE `equipe` (
`id` int(11) NOT NULL,
  `logements_id` int(11) NOT NULL,
  `equipements_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `equipements`
--

CREATE TABLE `equipements` (
`id` int(11) NOT NULL,
  `nom` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `evalue`
--

CREATE TABLE `evalue` (
`id` int(11) NOT NULL,
  `couleurPouce` tinyint(1) DEFAULT NULL,
  `signale` tinyint(1) DEFAULT NULL,
  `membres_idMembres` int(11) NOT NULL,
  `messages_idMessages` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `exige`
--

CREATE TABLE `exige` (
`id` int(11) NOT NULL,
  `contraintes_idContraintes` int(11) NOT NULL,
  `logements_idLogements` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `logements`
--

CREATE TABLE `logements` (
`id` int(11) NOT NULL,
  `titre_annonce` varchar(20) NOT NULL DEFAULT '(plus d''annonce)',
  `surfaceInterieur` int(11) DEFAULT NULL,
  `surfaceExterieur` int(11) DEFAULT NULL,
  `nombrePieces` int(11) DEFAULT NULL,
  `description` text,
  `nombreLitsSimples` int(11) DEFAULT NULL,
  `nombreLitsDoubles` int(11) DEFAULT NULL,
  `descriptionProximite` text,
  `membres_idMembres` int(11) NOT NULL,
  `types_idTypes` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=57 ;

--
-- Dumping data for table `logements`
--

INSERT INTO `logements` (`id`, `titre_annonce`, `surfaceInterieur`, `surfaceExterieur`, `nombrePieces`, `description`, `nombreLitsSimples`, `nombreLitsDoubles`, `descriptionProximite`, `membres_idMembres`, `types_idTypes`) VALUES
(4, 'Chez Benoit', 120, 0, 6, 'Maison paumée sur une ile', 1, 3, 'A deux pas du métro', 5, 1),
(5, 'Chez Marc', 70, 0, 6, 'Chez Marc !', 1, 3, 'A douze pas du métro', 6, 1),
(17, 'Titre', 27, 0, 2, ' Desc', 1, 1, ' DescPr', 5, 1),
(18, 'Title', 10, 2, 1, ' DescLog', 1, 1, ' DescProx', 5, 1),
(19, 'Test2', 23, 12, 1, ' TEST2', 2, 2, ' TEST22', 5, 1),
(20, 'Test2', 23, 12, 1, ' TEST2', 2, 2, ' TEST22', 5, 1),
(21, 'Coucou', 33, 12, 3, 'Hey hey hey !', 2, 2, ' Coucou', 5, 1),
(27, 'Logement MAX', 35, 17, 4, ' Prout', 7, 2, ' Hey', 5, 1),
(28, 'Test photo', 15, 10, 11, ' Test photo', 11, 5, ' ', 5, 1),
(29, 'Test photo', 15, 10, 11, ' Test photo', 11, 5, ' ', 5, 1),
(30, 'Test photo', 15, 10, 11, ' Test photo', 11, 5, ' ', 5, 1),
(31, 'Test photo', 15, 10, 11, ' Test photo', 11, 5, ' ', 5, 1),
(32, 'Test photo', 15, 10, 11, ' Test photo', 11, 5, ' ', 5, 1),
(33, 'Retestphoto', 11, 1, 10, ' A', 1, 1, 'A', 5, 1),
(34, 'Retestphoto', 11, 1, 10, ' A', 1, 1, 'A', 5, 1),
(35, 'Retestphoto', 11, 1, 10, ' A', 1, 1, 'A', 5, 1),
(36, 'Retestphoto', 11, 1, 10, ' A', 1, 1, 'A', 5, 1),
(37, 'Retestphoto', 11, 1, 10, ' A', 1, 1, 'A', 5, 1),
(38, 'Retestphoto', 11, 1, 10, ' A', 1, 1, 'A', 5, 1),
(39, 'TEST PHOTO', 1, 1, 1, ' TSET', 1, 1, ' TEETS', 5, 1),
(40, 'TEST PHOTO', 1, 1, 1, ' TSET', 1, 1, ' TEETS', 5, 1),
(41, 'TEST PHOTO', 1, 1, 1, ' TSET', 1, 1, ' TEETS', 5, 1),
(42, 'TEST PHOTO', 1, 1, 1, ' TSET', 1, 1, ' TEETS', 5, 1),
(43, 'TEST PHOTO', 1, 1, 1, ' TSET', 1, 1, ' TEETS', 5, 1),
(44, 'Coucou', 1, 1, 1, ' J', 1, 1, ' A', 5, 1),
(45, 'test', 10, 2, 2, ' test', 1, 1, ' ', 5, 1),
(46, 'test', 10, 2, 2, ' test', 1, 1, ' ', 5, 1),
(47, 'test photos', 12, 1, 9, ' Phoo', 1, 1, ' ', 5, 1),
(48, 'Test session', 11, 1, 1, ' session', 1, 1, ' ', 5, 1),
(49, 'test', 4, 1, 1, ' photo', 1, 1, ' ', 5, 1),
(50, 'Chez Marco', 9, 0, 1, ' Chez Marco, vue sur la Seine', 1, 1, ' ', 5, 1),
(53, 'Test Multi', 14, 1, 1, ' Tes multi photos', 1, 1, ' ', 5, 1),
(54, 'Test Multi', 14, 1, 1, ' Tes multi photos', 1, 1, ' ', 5, 1),
(55, 'Test affichage photo', 44, 7, 10, ' Affichage photo 1', 1, 1, ' ', 5, 1),
(56, 'Test affichage bis', 51, 1, 3, ' Test affichage deux!', 1, 1, ' ', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `membres`
--

CREATE TABLE `membres` (
`id` int(11) NOT NULL,
  `admin` int(11) NOT NULL DEFAULT '0',
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `age` tinyint(4) NOT NULL,
  `telephone` varchar(10) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `membres`
--

INSERT INTO `membres` (`id`, `admin`, `nom`, `prenom`, `email`, `mdp`, `age`, `telephone`) VALUES
(2, 0, 'Westerdyk', 'Kevin', 'westerdyk.kevin@gmail.com', 'ab33ba565638181e6eb2cf44ac0e14cce3c88b1f', 20, ''),
(3, 0, 'Menache', 'Jordan', 'jordan.menache@gmail.com', 'b480c074d6b75947c02681f31c90c668c46bf6b8', 20, ''),
(5, 1, 'Canaan', 'Danny', 'danny.canaan@gmail.com', 'c519b0869bd1e9a41fd8caa349072c7343f3bc57', 20, '0618112849'),
(6, 0, 'Martin Siegfried', 'Marc', 'marc.martin-siegfried2@orange.fr', '8927b12bd34b5ac19381131e8bd22550c2cef120', 20, ''),
(8, 0, 'Machin', 'Bob', 'bobmachin@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 23, '0123456789');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
`id` int(11) NOT NULL,
  `date` datetime DEFAULT NULL,
  `titreMessage` varchar(45) DEFAULT NULL,
  `message` text,
  `membres_idMembres` int(11) NOT NULL,
  `sujets_idSujets` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `minichat`
--

CREATE TABLE `minichat` (
`ID` int(11) NOT NULL,
  `IDLogement` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `date_ajout` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=121 ;

--
-- Dumping data for table `minichat`
--

INSERT INTO `minichat` (`ID`, `IDLogement`, `pseudo`, `message`, `date_ajout`) VALUES
(71, 21, 'randy marsh ', 'south park ', '2015-01-13 15:12:47'),
(72, 21, 'cartman ', 'fatass', '2015-01-13 15:12:50'),
(73, 20, 'kyle', 'blablablablalblablablablablablablablablablablalblzlbzlblzblblblblblblblblblblbl', '2015-01-13 15:12:53'),
(74, 20, 'df', 'DC', '2015-01-13 15:12:56'),
(75, 20, 'ggg', 'jjj', '2015-01-13 16:19:25'),
(76, 20, 'coucou', 'salut ', '2015-01-13 16:19:29'),
(77, 21, 'Salut', 'coucou\r\n', '2015-01-13 15:41:17'),
(78, 20, 'Danny', 'TEST', '2015-01-13 16:19:32'),
(79, 21, 'Danny', 'TEST', '2015-01-13 15:51:32'),
(80, 21, 'Danny', 'TEST', '2015-01-13 16:04:00'),
(81, 19, 'Hey hey hey !', 'Coucou', '2015-01-13 16:05:09'),
(82, 19, 'Hey hey hey !', 'Coucou', '2015-01-13 16:05:35'),
(83, 19, 'Hey hey hey !', 'Coucou', '2015-01-13 16:05:53'),
(84, 19, 'Hey hey hey !', 'Coucou', '2015-01-13 16:06:14'),
(85, 21, 'Coucou', 'salut', '2015-01-13 16:21:16'),
(86, 5, 'test', 'test', '2015-01-13 16:29:37'),
(87, 5, 'test', 'test', '2015-01-13 16:30:38'),
(88, 4, 'Bob', 'Hey Hey Hey !', '2015-01-13 21:06:34'),
(89, 4, 'Super Connard', 'Ta gueule !', '2015-01-13 21:06:57'),
(90, 5, 'Super Connard', 'test\r\n', '2015-01-14 15:34:43'),
(91, 5, 'conardno1', 'salut', '2015-01-14 15:35:15'),
(92, 5, 'connardno2', 'hey toi\r\n', '2015-01-14 15:35:32'),
(93, 5, 'connardno1', 't''as une maison dna sle coin ?\r\n', '2015-01-14 15:35:54'),
(94, 5, 'connardno2', 'une villa avec des toilettes ', '2015-01-14 15:36:26'),
(95, 5, 'connardno1', 't''as une machine Ã  popcorn ?', '2015-01-14 15:38:07'),
(96, 5, 'connardno2', 'evidemment mon bon connard\r\n', '2015-01-14 15:38:30'),
(97, 5, 'connardno1', 'trop cool on se fait un cinÃ© chez toi ? et plus si affinitÃ© ?\r\n', '2015-01-14 15:39:11'),
(98, 5, 'connardno2', 'Hmmhmm :)', '2015-01-14 15:39:45'),
(99, 5, 'connardno1', 'j -e vois qu''on est compatibles :D\r\n', '2015-01-14 15:40:22'),
(100, 5, 'connardno2', 'et plutot deux fois qu''une !', '2015-01-14 15:40:42'),
(101, 5, 'connardno1', 'fois mille', '2015-01-14 15:40:53'),
(102, 5, 'connardno2', 'ca fait deux mille', '2015-01-14 15:41:10'),
(103, 5, 'connardno1', 'wouahah t''es trop fort mon dieu que j''ai chaud !', '2015-01-14 15:41:47'),
(104, 5, 'connardno2', 'j''ai des glacons Ã  la maison si tu veux :D\r\n', '2015-01-14 15:42:29'),
(105, 5, 'connardno1', 'ah ouais ?!', '2015-01-14 15:42:54'),
(106, 4, 'Antoine', 'Superconnard !', '2015-01-14 17:17:17'),
(107, 43, 'Test Ancre', 'Test', '2015-01-14 21:27:59'),
(108, 43, 'Test Ancre', 'Test', '2015-01-14 21:28:41'),
(109, 43, 'test2', 'Re', '2015-01-14 21:28:47'),
(110, 43, 'test', 'test', '2015-01-14 21:29:22'),
(111, 43, 'test', 'test', '2015-01-14 21:30:04'),
(112, 43, 'testfin', 'youpi', '2015-01-14 21:30:18'),
(113, 43, 'testfin', 'youpi', '2015-01-14 21:30:23'),
(114, 44, 'test', 'test', '2015-01-14 21:31:50'),
(115, 44, 'test', 'test', '2015-01-14 21:32:48'),
(116, 44, 'tset', 'test', '2015-01-14 21:32:55'),
(117, 43, 'enfin', 'ok', '2015-01-14 21:34:38'),
(118, 43, 'test', 'test', '2015-01-14 21:35:07'),
(119, 49, 'Test', 'youpi', '2015-01-15 11:58:55'),
(120, 38, 'Marco', 'Yolo', '2015-01-15 16:06:33');

-- --------------------------------------------------------

--
-- Table structure for table `note`
--

CREATE TABLE `note` (
`id` int(11) NOT NULL,
  `date` datetime DEFAULT NULL,
  `note` int(11) DEFAULT NULL,
  `membres_idMembres` int(11) NOT NULL,
  `logements_idLogements` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pays`
--

CREATE TABLE `pays` (
`id` int(11) NOT NULL,
  `pays` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
`id` int(11) NOT NULL,
  `region` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
`id` int(11) NOT NULL,
  `titreSection` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `signalement`
--

CREATE TABLE `signalement` (
`id` int(11) NOT NULL,
  `raison` text,
  `date` datetime DEFAULT NULL,
  `parModo` tinyint(1) DEFAULT NULL,
  `membres_idMembres` int(11) NOT NULL,
  `membres_idMembres1` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sujets`
--

CREATE TABLE `sujets` (
`id` int(11) NOT NULL,
  `date` datetime DEFAULT NULL,
  `statut` tinyint(1) DEFAULT NULL,
  `titreSujet` varchar(45) DEFAULT NULL,
  `message` text,
  `sections_idSections` int(11) NOT NULL,
  `membres_idMembres` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
`id` int(11) NOT NULL,
  `type` varchar(25) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `type`) VALUES
(1, 'Maison');

-- --------------------------------------------------------

--
-- Table structure for table `villes`
--

CREATE TABLE `villes` (
`id` int(11) NOT NULL,
  `ville` varchar(45) DEFAULT NULL,
  `departements_idDepartements` int(11) NOT NULL,
  `pays_idPays` int(11) NOT NULL,
  `logements_idLogements` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `avis`
--
ALTER TABLE `avis`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_avis_membres1_idx` (`membres_id`), ADD KEY `fk_avis_logements1_idx` (`logements_id`);

--
-- Indexes for table `communique`
--
ALTER TABLE `communique`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_communique_membres1_idx` (`membres_idMembres`), ADD KEY `fk_communique_membres2_idx` (`membres_idMembres1`);

--
-- Indexes for table `contraintes`
--
ALTER TABLE `contraintes`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departements`
--
ALTER TABLE `departements`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_departements_regions1_idx` (`regions_idRegions`);

--
-- Indexes for table `diponibilites`
--
ALTER TABLE `diponibilites`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `disponible`
--
ALTER TABLE `disponible`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_disponible_logements1_idx` (`logements_id`), ADD KEY `fk_disponible_diponibilites1_idx` (`diponibilites_id`);

--
-- Indexes for table `echanges`
--
ALTER TABLE `echanges`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_echanges_logements1_idx` (`logements_idLogements`), ADD KEY `fk_echanges_logements2_idx` (`logements_idLogements1`);

--
-- Indexes for table `equipe`
--
ALTER TABLE `equipe`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_equipe_logements1_idx` (`logements_id`), ADD KEY `fk_equipe_equipements1_idx` (`equipements_id`);

--
-- Indexes for table `equipements`
--
ALTER TABLE `equipements`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `evalue`
--
ALTER TABLE `evalue`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_evalue_membres1_idx` (`membres_idMembres`), ADD KEY `fk_evalue_messages1_idx` (`messages_idMessages`);

--
-- Indexes for table `exige`
--
ALTER TABLE `exige`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_exige_contraintes1_idx` (`contraintes_idContraintes`), ADD KEY `fk_exige_logements1_idx` (`logements_idLogements`);

--
-- Indexes for table `logements`
--
ALTER TABLE `logements`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_logements_membres1_idx` (`membres_idMembres`), ADD KEY `fk_logements_types1_idx` (`types_idTypes`);

--
-- Indexes for table `membres`
--
ALTER TABLE `membres`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `password` (`mdp`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_messages_membres_idx` (`membres_idMembres`), ADD KEY `fk_messages_sujets1_idx` (`sujets_idSujets`);

--
-- Indexes for table `minichat`
--
ALTER TABLE `minichat`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `note`
--
ALTER TABLE `note`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_note_membres1_idx` (`membres_idMembres`), ADD KEY `fk_note_logements1_idx` (`logements_idLogements`);

--
-- Indexes for table `pays`
--
ALTER TABLE `pays`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signalement`
--
ALTER TABLE `signalement`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_signalement_membres1_idx` (`membres_idMembres`), ADD KEY `fk_signalement_membres2_idx` (`membres_idMembres1`);

--
-- Indexes for table `sujets`
--
ALTER TABLE `sujets`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_sujets_sections1_idx` (`sections_idSections`), ADD KEY `fk_sujets_membres1_idx` (`membres_idMembres`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `villes`
--
ALTER TABLE `villes`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_villes_departements1_idx` (`departements_idDepartements`), ADD KEY `fk_villes_pays1_idx` (`pays_idPays`), ADD KEY `fk_villes_logements1_idx` (`logements_idLogements`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `avis`
--
ALTER TABLE `avis`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `communique`
--
ALTER TABLE `communique`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `contraintes`
--
ALTER TABLE `contraintes`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `departements`
--
ALTER TABLE `departements`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `diponibilites`
--
ALTER TABLE `diponibilites`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `disponible`
--
ALTER TABLE `disponible`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `echanges`
--
ALTER TABLE `echanges`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `equipe`
--
ALTER TABLE `equipe`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `equipements`
--
ALTER TABLE `equipements`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `evalue`
--
ALTER TABLE `evalue`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `exige`
--
ALTER TABLE `exige`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `logements`
--
ALTER TABLE `logements`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `membres`
--
ALTER TABLE `membres`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `minichat`
--
ALTER TABLE `minichat`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=121;
--
-- AUTO_INCREMENT for table `note`
--
ALTER TABLE `note`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pays`
--
ALTER TABLE `pays`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `signalement`
--
ALTER TABLE `signalement`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sujets`
--
ALTER TABLE `sujets`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `villes`
--
ALTER TABLE `villes`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `avis`
--
ALTER TABLE `avis`
ADD CONSTRAINT `fk_avis_logements1` FOREIGN KEY (`logements_id`) REFERENCES `logements` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_avis_membres1` FOREIGN KEY (`membres_id`) REFERENCES `membres` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `communique`
--
ALTER TABLE `communique`
ADD CONSTRAINT `fk_communique_membres1` FOREIGN KEY (`membres_idMembres`) REFERENCES `membres` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_communique_membres2` FOREIGN KEY (`membres_idMembres1`) REFERENCES `membres` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `departements`
--
ALTER TABLE `departements`
ADD CONSTRAINT `fk_departements_regions1` FOREIGN KEY (`regions_idRegions`) REFERENCES `regions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `disponible`
--
ALTER TABLE `disponible`
ADD CONSTRAINT `fk_disponible_diponibilites1` FOREIGN KEY (`diponibilites_id`) REFERENCES `diponibilites` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_disponible_logements1` FOREIGN KEY (`logements_id`) REFERENCES `logements` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `echanges`
--
ALTER TABLE `echanges`
ADD CONSTRAINT `fk_echanges_logements1` FOREIGN KEY (`logements_idLogements`) REFERENCES `logements` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_echanges_logements2` FOREIGN KEY (`logements_idLogements1`) REFERENCES `logements` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `equipe`
--
ALTER TABLE `equipe`
ADD CONSTRAINT `fk_equipe_equipements1` FOREIGN KEY (`equipements_id`) REFERENCES `equipements` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_equipe_logements1` FOREIGN KEY (`logements_id`) REFERENCES `logements` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `evalue`
--
ALTER TABLE `evalue`
ADD CONSTRAINT `fk_evalue_membres1` FOREIGN KEY (`membres_idMembres`) REFERENCES `membres` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_evalue_messages1` FOREIGN KEY (`messages_idMessages`) REFERENCES `messages` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `exige`
--
ALTER TABLE `exige`
ADD CONSTRAINT `fk_exige_contraintes1` FOREIGN KEY (`contraintes_idContraintes`) REFERENCES `contraintes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_exige_logements1` FOREIGN KEY (`logements_idLogements`) REFERENCES `logements` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `logements`
--
ALTER TABLE `logements`
ADD CONSTRAINT `fk_logements_membres1` FOREIGN KEY (`membres_idMembres`) REFERENCES `membres` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_logements_types1` FOREIGN KEY (`types_idTypes`) REFERENCES `types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
ADD CONSTRAINT `fk_messages_membres` FOREIGN KEY (`membres_idMembres`) REFERENCES `membres` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_messages_sujets1` FOREIGN KEY (`sujets_idSujets`) REFERENCES `sujets` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `note`
--
ALTER TABLE `note`
ADD CONSTRAINT `fk_note_logements1` FOREIGN KEY (`logements_idLogements`) REFERENCES `logements` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_note_membres1` FOREIGN KEY (`membres_idMembres`) REFERENCES `membres` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `signalement`
--
ALTER TABLE `signalement`
ADD CONSTRAINT `fk_signalement_membres1` FOREIGN KEY (`membres_idMembres`) REFERENCES `membres` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_signalement_membres2` FOREIGN KEY (`membres_idMembres1`) REFERENCES `membres` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sujets`
--
ALTER TABLE `sujets`
ADD CONSTRAINT `fk_sujets_membres1` FOREIGN KEY (`membres_idMembres`) REFERENCES `membres` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_sujets_sections1` FOREIGN KEY (`sections_idSections`) REFERENCES `sections` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `villes`
--
ALTER TABLE `villes`
ADD CONSTRAINT `fk_villes_departements1` FOREIGN KEY (`departements_idDepartements`) REFERENCES `departements` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_villes_logements1` FOREIGN KEY (`logements_idLogements`) REFERENCES `logements` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_villes_pays1` FOREIGN KEY (`pays_idPays`) REFERENCES `pays` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
