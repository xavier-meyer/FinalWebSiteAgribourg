-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 09 jan. 2023 à 13:38
-- Version du serveur : 5.7.36
-- Version de PHP : 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `agribourg_website`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `artnomproduit` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `artimage` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `artprixaukg` double DEFAULT NULL,
  `artprixht` double NOT NULL,
  `artprixttc` double NOT NULL,
  `artquantite` double DEFAULT NULL,
  `artnbproduits` int(11) DEFAULT NULL,
  `artdescription` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `artcmdmini` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `artconseils` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `artremise` double DEFAULT NULL,
  `artprixpromo` double DEFAULT NULL,
  `artprixunitaire` double DEFAULT NULL,
  `artdisponibilite` longtext COLLATE utf8mb4_unicode_ci,
  `catproduit` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `artnomproduit`, `artimage`, `artprixaukg`, `artprixht`, `artprixttc`, `artquantite`, `artnbproduits`, `artdescription`, `artcmdmini`, `artconseils`, `artremise`, `artprixpromo`, `artprixunitaire`, `artdisponibilite`, `catproduit`) VALUES
(1, 'Fraises BIO', 'fraise.jpg', 11.2, 7.47, 11.2, 1, NULL, 'Nos tomates BIO sont cultivées par nos soins de manière biologique au sein de notre ferme à Bourg en Bresse.', '250 grammes ', 'Ces tomates sont juteuses, idéales pour agrémenter vos salades.', 20, 8.96, NULL, NULL, 1),
(2, 'Pommes BIO', 'pommes.jpg', 3.85, 2.73, 3.27, 1, NULL, 'Nos pommes BIO se caractérisent par un  goût très sucré.', '500 grammes', 'Ces pommes BIO sont idéales pour réaliser des compotes de pomme, des tartes.', 15, 3.27, NULL, NULL, 1),
(3, 'Bananes BIO', 'bananes.jpg', 2.85, 2.38, 2.85, 1, NULL, 'Nos bananes BIO d\'origine antillaise sont bonnes pour la santé, riche en vitamines C.', '500 grammes', 'Ces bananes BIO peuvent être consommées crues, cuites. Il est possible de réaliser un banana split.  ', NULL, NULL, NULL, NULL, 1),
(4, 'Oranges BIO', 'oranges.jpg', 2.65, 2.21, 2.65, 1, NULL, 'Nos oranges BIO sont riches en vitamines C, juteuses et sans pépins.', '500 grammes', 'Ces oranges BIO sont parfaites pour réaliser vos jus d\'oranges pressées.', NULL, NULL, NULL, NULL, 1),
(5, 'kiwi jaunes BIO', 'kiwis_jaunes_BIO.jpg', NULL, 3.27, 3.92, NULL, 8, 'Nos kiwis jaunes ont un goût sucré et sont riches en fibres.', '4 pièces', 'Ces kiwis jaunes BIO sont idéales pour agrémenter vos salades de fruits.', 25, 0.49, 0.65, NULL, 1),
(6, 'Raisins blancs BIO', 'raisins_blancs_Bio.jpg', 5.75, 3.97, 4.76, 1, NULL, 'Nos raisins blancs BIO se caractérisent par un bon goût sucré.', '500 grammes', 'Ces raisons blancs BIO sont idéales pour finir un bon repas.', 20, 4.76, NULL, NULL, 1),
(7, 'Abricots BIO', 'abricots_Bio.jpg', 5, 4.17, 5, 1, NULL, 'Nos abricots BIO d\'origine ardéchoise, fruit star de l\'été moelleux, possèdent un goût sucré et une texture moelleuse.', '250 grammes', 'Ces abricots BIO se dégustent en recettes sucrées et salées.', NULL, NULL, NULL, NULL, 1),
(8, 'Pêches jaunes BIO', 'peches_Bio.jpg', 8.4, 7, 8.4, 1, NULL, 'Nos pêches jaunes BIO d\'origine ardéchoise, fruit star de l\'été, possèdent un gout sucré et une texture moelleuse.', '500 grammes', 'Ces pêches jaunes BIO se dégustent en desserts sucrés comme un crumble de pêches.', NULL, NULL, NULL, NULL, 1),
(9, 'Citrons BIO', 'citrons_Bio.jpg', 2.8, 2.33, 2.8, 1, NULL, 'Nos citrons BIO sont gorgées de vitamines C qui booste le système immunitaire.', '500 grammes ', 'Ces citrons BIO accompagnent harmonieusement les poissons.', NULL, NULL, NULL, NULL, 1),
(10, 'Mangues BIO', 'mangues_Bio.jpg', NULL, 2.49, 2.99, 1, NULL, 'Nos mangues BIO d\'origine antillaise sont juteuses et délicieusement parfumées.', '1 pièce', 'Ces mangues BIO sont très utilisées dans la conception de desserts comme mousse et sorbet.', NULL, NULL, 2.99, NULL, 1),
(11, 'Ananas BIO', 'ananas.jpg', NULL, 2.67, 3.2, 1, NULL, 'Nos ananas BIO d\'origine antillaise sont issus de l\'agriculture biologique.', '1 pièce', 'Ces ananas BIO sont parfaites pour la préparation d\'ananas au sirop.', NULL, NULL, 3.2, NULL, 1),
(12, 'Carottes BIO', 'carottes.jpg', 2.9, 2.42, 2.9, 1, NULL, 'Nos carottes BIO sont issus de l\'agriculture biologique.', '500 grammes', 'Ces carottes BIO peuvent être préparées en boulettes de carottes au cumin ou en chips.', NULL, NULL, NULL, NULL, 2),
(13, 'Courgettes BIO', 'courgettes.jpg', 5.57, 3.94, 4.73, 1, NULL, 'Nos courgettes BIO possèdent une saveur douce et légère. ', '500 grammes', 'Ces courgettes BIO peuvent être cuisinées en spaghetti de courgettes vertes.', 15, 4.73, NULL, NULL, 2),
(14, 'Radis roses BIO', 'radis_roses_en_botte.jpg', NULL, 2.92, 3.5, NULL, 1, 'Nos radis roses BIO sont bien croquants, au goût intense et piquant.', '1 botte de 350 grammes', 'Ces radis roses BIO peuvent être dégustés à la poêle avec du beurre et de la ciboulette.', 10, 3.15, 3.5, NULL, 2),
(15, 'Patates douces BIO', 'patates_douces.jpg', 4.95, 4.13, 4.95, 1, NULL, 'Nos patates douces BIO sont crémeuses et sucrées. ', '500 grammes', 'Ces patates douces BIO peuvent être poêlées en fines tranches, transformées en purée, en frites.', NULL, NULL, NULL, NULL, 2),
(16, 'Concombres BIO', 'concombres.jpg', NULL, 2.49, 2.99, NULL, 1, 'Nos concombres BIO se caractérisent par leur fraicheur remarquable.', '1 pièce d\'environ 415 grammes', 'Nos concombres BIO peuvent être mixées avec de la menthe, citron, poivre et sel pour faire un gaspacho. ', NULL, NULL, 2.99, NULL, 2),
(17, 'Pommes de terre nouvelles BIO', 'pommes_de_terre_nouvelle.jpg', 6.7, 5.58, 6.7, 1, NULL, 'Nos Pommes de terre nouvelle BIO possèdent un  goût finement sucré avec des légères notes de noisettes.', '500 grammes', 'Ces pommes de terre nouvelle BIO peuvent être cuites à la poêle, à la vapeur ou au four. Leurs peaux est fine, il est inutile de les éplucher.  ', NULL, NULL, NULL, NULL, 2),
(18, 'Asperges BIO', 'asperges_blanches.jpg', NULL, 7.05, 8.46, NULL, 1, 'Nos asperges blanches BIO sont fondantes et délicieuses.', '1 bocal de 420 grammes égoutté', 'Ces asperges blanches BIO se marient bien avec de la sauce hollandaise pour faire une entrée réussie.', 15, 8.46, 9.95, NULL, 2),
(19, 'Artichaut BIO', 'artichauts.jpg', NULL, 2.57, 3.08, NULL, 1, 'Nos artichauts BIO ont un cœur tendre et savoureux.', '1 pièce d\'environ 300 grammes', 'Les cœurs d\'artichauts se consomment cru avec une vinaigrette, cuit en casserole, en cocotte. ', NULL, NULL, 3.08, NULL, 2),
(20, 'Blettes BIO', 'blettes.jpg', 5.95, 4.96, 5.95, NULL, NULL, 'Nos blettes BIO ont une texture et chair fondante en bouche.', '1 kilogramme', 'Ces blettes BIO sont parfaites pour concocter un gratin avec une sauce béchamel.', NULL, NULL, NULL, NULL, 2),
(21, 'Salade batavia BIO', 'salade_batavia.jpg', NULL, 1.63, 1.95, NULL, 1, 'Nos salades batavia BIO aux feuilles fraîches, tendres et craquantes.', '1 pièce d\'environ 345 grammes', 'Cette salade batavia BIO est idéale pour la conception de burger maison. ', NULL, NULL, 1.95, NULL, 2),
(22, 'Petit pois BIO', 'petit_pois.jpg', NULL, 2.17, 2.61, NULL, 1, 'Nos petit pois BIO sont bien croquants.', '1 bocal de 420 grammes égoutté.', 'Ces petit pois BIO peuvent être un élément essentiel pour faire une jardinière.', 10, 2.61, 2.89, NULL, 2),
(23, 'Poivron rouge BIO', 'poivrons_rouge.jpg', NULL, 1.33, 1.59, NULL, 1, 'Nos poivrons rouge BIO donneront du piquant à vos plats.', '1 pièce d\'environ 160 grammes.', 'Ces poivrons rouge BIO se cuisinent en salade, tapas, dans une farce, dans un cake.', NULL, NULL, 1.59, NULL, 2),
(24, 'Chou vert frise BIO', 'chou_vert_frise.jpg', NULL, 2.68, 3.21, NULL, 1, 'Nos choux vert frisé BIO sont excellents pour la santé.', '1 pièce d\'environ 1.2 à 1.5 kilogrammes', 'Ces choux vert frisé BIO se cuisinent dans un gratin en champignon, en soupe au chou vert et légumes.', NULL, NULL, 3.21, NULL, 2),
(25, 'Panier fruits et légumes BIO (2-3 personnes)', 'panier_fruit_legume_moyen.jpg', NULL, 15.42, 18.2, NULL, 1, 'Ce panier est composé de 5 à 8 fruits et légumes de saison BIO et parfois de produits exotiques. Son poids peut aller de 4 à 6 kilogrammes en fonction des produits. ', 'Vous pouvez commandez au minimum un panier voire deux si vous êtes gourmands. n\'hésitez pas a vous faire plaisir. ', 'Ce panier BIO permet de réaliser des succulentes recettes de saison.', 15, 18.2, 21.5, NULL, 3),
(27, 'Panier fruits et légumes BIO pour grande famille ', 'panier_fruits_legumes_grand.jpg', NULL, 42.5, 51, NULL, 1, 'Notre panier BIO composé de fruits et légumes, de 12 à 15 produits conviendra aux grandes familles. Son poids va de 12 à 15 kilos.', '1 panier de 12 à 15 kilos.', 'Ce panier BIO de fruits et légumes conviendra parfaitement pour réaliser des plats en famille et passer des moments conviviaux.', 15, 51, 60, NULL, 3),
(28, 'Panier fruits et légumes BIO pour 1 personne', 'panier_fruits_legumes_individuel.jpg', NULL, 11.25, 13.5, NULL, 1, 'Notre panier composé de 5 à 7 fruits et légumes BIO pèse de 2.5 à 3 kilos. \r\nNos paniers sont constituées de produits de saison. ', '1 panier d\'un poids de 2.5 kilogrammes à 3 kilogrammes.', 'Ce panier composé de fruits et légumes BIO conviendra pour une personne pour réaliser des plats équilibré, savoureux et bons pour la santé.', NULL, NULL, 13.5, NULL, 3),
(29, 'Panier fruits BIO (2/3 personnes)\r\n', 'panier_fruit_moyen.jpg', NULL, 18.25, 21.9, NULL, 1, 'Notre panier est composé de fruits de printemps ou d\'été BIO et parfois de fruits exotiques d\'un poids de 5 à 6 kilogrammes.', '1 panier de 4 à 6 kilogrammes.', 'Ce panier de fruits BIO vous permettra de réaliser de belles salades de fruits.', NULL, NULL, 21.9, NULL, 3),
(30, 'Panier fruits BIO (1 personne)', 'panier_fruit_petit.jpg', NULL, 12.5, 15, NULL, 1, 'Notre panier est composée de fruits BIO locales et parfois de fruits exotiques.\r\nSon poids est d\'environ 3 kilogrammes.', '1 panier d\'environ 3 kilogrammes.', 'Ce panier de fruits BIO est adapté la consommation d\'une personne pour environ une semaine.', NULL, NULL, 15, NULL, 3),
(31, 'Panier fruits BIO grande famille', 'panier_fruit_grand.jpg', NULL, 30.42, 36.5, NULL, 1, 'Notre panier de fruits BIO de saison et parfois de fruits exotiques pèse de 7 à 8 kilogrammes.  ', '1 panier de 7 à 8 kilogrammes.', 'Ce panier de fruits BIO conviendra à toutes les familles qui pourront déguster des fruits savoureux et variées autour d\'un bon repas et dans une atmosphère conviviale.', NULL, NULL, 36.5, NULL, 3);

-- --------------------------------------------------------

--
-- Structure de la table `etatcmd`
--

DROP TABLE IF EXISTS `etatcmd`;
CREATE TABLE IF NOT EXISTS `etatcmd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `etatcmdstep` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `historique_entreprise`
--

DROP TABLE IF EXISTS `historique_entreprise`;
CREATE TABLE IF NOT EXISTS `historique_entreprise` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `histannee` int(11) NOT NULL,
  `histdescription` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `historique_entreprise`
--

INSERT INTO `historique_entreprise` (`id`, `histannee`, `histdescription`) VALUES
(1, 1960, 'Agribourg a été crée par Mr Martin, un passionné de jardinage et de cultures qui à décidé d\'en faire son métier.\r\nIl effectue des cultures sur son jardin personnel situé sur Bourg en Bresse.\r\n'),
(2, 1975, 'La société s\'est agrandie suite à une demande accrue des consommateurs.\r\nLa culture s\'effectues désormais sur 2 sites supplémentaires à proximité de Bourg en Bresse.\r\nCet agrandissement s\'accompagne d\'un recrutement de 10 personnes.'),
(3, 1990, 'La société décide de diversifier son offre et de se lancer dans la culture de légumes hors sol et sous terre. '),
(4, 2010, 'l\'entreprise se lances dans la culture de fruits et légumes biologiques répondant à une demande croissante de la part des clients.\r\n'),
(5, 2015, 'L\'engouement des consommateurs pour les produits biologiques a été tel que l\'entreprise a acquis une renommée régionale.'),
(6, 2020, 'Le fils de M.Martin à repris les rennes de l\'entreprise et envisage de vendre ses produits au niveau national.');

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

DROP TABLE IF EXISTS `messenger_messages`;
CREATE TABLE IF NOT EXISTS `messenger_messages` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  KEY `IDX_75EA56E016BA31DB` (`delivered_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ptdecollecte`
--

DROP TABLE IF EXISTS `ptdecollecte`;
CREATE TABLE IF NOT EXISTS `ptdecollecte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ptcollecteadresse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ptcollectetel` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
