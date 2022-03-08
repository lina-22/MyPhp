-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 02 mars 2022 à 21:19
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `exemple_shop`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `idAdmin` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) DEFAULT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `email` varchar(256) NOT NULL,
  `mdp` varchar(256) NOT NULL,
  PRIMARY KEY (`idAdmin`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`idAdmin`, `nom`, `prenom`, `email`, `mdp`) VALUES
(1, 'Moulin', 'Timothée', 'timomoulin@msn.com', '532c10db248054697d3e0eb1056b03dfbc5a2b212c365be17fa0111f3d7edf55');

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `idArticle` int(11) NOT NULL AUTO_INCREMENT,
  `nom` char(100) CHARACTER SET latin1 DEFAULT NULL,
  `description` varchar(500) CHARACTER SET latin1 NOT NULL,
  `prixUnitaire` decimal(5,2) DEFAULT NULL,
  `estDisponible` tinyint(1) DEFAULT NULL,
  `idCategorie` int(11) NOT NULL,
  `estFragile` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idArticle`),
  KEY `idCategorie` (`idCategorie`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`idArticle`, `nom`, `description`, `prixUnitaire`, `estDisponible`, `idCategorie`, `estFragile`) VALUES
(1, 'noix de cajou 150g', 'Il suffit de la déguster pour profiter de tous ses bienfaits. Elle se grignote entière ou vous pouvez l\"incorporer dans vos préparations culinaires salées ou sucrées, ou encore mélangées à d\'autres fruits secs ! ', '9.99', 1, 1, 0),
(2, 'coco mademoiselle', '\r\n\r\nL’essence d’une femme libre et audacieuse. Un oriental féminin au caractère affirmé et pourtant d\'une étonnante fraîcheur.\r\n\r\nCOCO MADEMOISELLE puise son inspiration dans la personnalité hors du commun de Gabrielle Chanel. La fragrance s\'affirme comme l’écho olfactif d’un esprit indépendant qui s’affranchit des codes pour mieux créer les siens. Le portrait d’une femme prête à écrire sa destinée avec audace.\r\n', '100.00', 1, 2, 1),
(3, 'furby', 'Furby est un jouet robotique électronique sous forme d\'une petite peluche animée interactive, qu\'il s\'agit de traiter avec grand soin en tant qu\'animal de compagnie virtuel.', '44.99', 1, 3, 1),
(4, 'bâton sauteur', 'Le pogo stick Grom est plus qu’un simple jouet!  Il est parfait pour les garçons et les filles prêts à pratiquer ce nouveau sport innovants!\r\nLes rebonds sont plus silencieux du à notre technologie innovante, plus fluide et plus performants. Les ressorts sont progressifs pour atteindre de plus grandes hauteurs et amortir parfaitement les sauts quand c’est nécessaire. Patin en caoutchouc moulées pour plus de confort.', '65.00', 1, 3, 0),
(5, 'osselets jojos', 'Les osselets Jojos des années 90 sont de retour !\r\n\r\nVoici un sachet contenant 3 Dracco Heads, la version espagnole des célèbres Jojos.\r\n\r\nIl s\'agit de la série 1 Original et vous pouvez collectionner jusqu\'à 40 osselets Jojo\'s dont des versions or et argent !', '3.90', 0, 3, 0);

-- --------------------------------------------------------

--
-- Structure de la table `article_commande`
--

DROP TABLE IF EXISTS `article_commande`;
CREATE TABLE IF NOT EXISTS `article_commande` (
  `idArticle` int(11) NOT NULL,
  `idCommande` int(11) NOT NULL,
  `quantiteArticle` int(4) DEFAULT NULL,
  PRIMARY KEY (`idArticle`,`idCommande`),
  KEY `idCommande` (`idCommande`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `article_commande`
--

INSERT INTO `article_commande` (`idArticle`, `idCommande`, `quantiteArticle`) VALUES
(1, 1, 4),
(1, 2, 4),
(1, 3, 4),
(5, 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `idCategorie` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idCategorie`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`idCategorie`, `nom`) VALUES
(1, 'produits alimentaires'),
(2, 'parfums'),
(3, 'jouets');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `idClient` int(11) NOT NULL AUTO_INCREMENT,
  `prenom` varchar(100) DEFAULT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `email` varchar(256) NOT NULL,
  `mdp` varchar(256) NOT NULL,
  `adresse` varchar(256) DEFAULT NULL,
  `ville` varchar(100) DEFAULT NULL,
  `codePostal` int(11) DEFAULT NULL,
  PRIMARY KEY (`idClient`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`idClient`, `prenom`, `nom`, `email`, `mdp`, `adresse`, `ville`, `codePostal`) VALUES
(1, 'charlie', 'chaplin', 'charliechaplin@gmail.com', 'e4c82eff311fbdaf86d5967406c4eef7b197e2d403579ea8ff01622eb9b9a86b', '77 rue principale', 'corsier-sur-vevey', NULL),
(2, 'louis', 'de funès', 'louisdefunes@gmail.com', '84afa28a46c8c1ee9c4bc2e8df6c3287c124d92415bd86a2622a719dc7eb71b2', '83 rue du maréchal cruchot', 'saint-tropez', 83990);

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `idCommande` int(11) NOT NULL AUTO_INCREMENT,
  `dateCommande` datetime DEFAULT NULL,
  `dateLivraison` date DEFAULT NULL,
  `etat` varchar(50) DEFAULT NULL,
  `idClient` int(11) NOT NULL,
  PRIMARY KEY (`idCommande`),
  KEY `idClient` (`idClient`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`idCommande`, `dateCommande`, `dateLivraison`, `etat`, `idClient`) VALUES
(1, '2021-10-04 20:47:39', NULL, 'En cours', 1),
(2, '2022-03-02 20:47:17', NULL, 'En cours', 1),
(3, '2022-03-02 20:50:39', NULL, 'En cours', 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`idCategorie`) REFERENCES `categorie` (`idCategorie`);

--
-- Contraintes pour la table `article_commande`
--
ALTER TABLE `article_commande`
  ADD CONSTRAINT `article_commande_ibfk_1` FOREIGN KEY (`idArticle`) REFERENCES `article` (`idArticle`),
  ADD CONSTRAINT `article_commande_ibfk_2` FOREIGN KEY (`idCommande`) REFERENCES `commande` (`idCommande`);

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`idClient`) REFERENCES `client` (`idClient`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
