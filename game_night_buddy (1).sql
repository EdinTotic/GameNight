-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 29, 2024 at 06:34 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `game_night_buddy`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `fk_game_id_id` int(11) NOT NULL,
  `fk_user_id_id` int(11) NOT NULL,
  `comment` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `create_gn`
--

CREATE TABLE `create_gn` (
  `id` int(11) NOT NULL,
  `gn_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE `game` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`id`, `name`, `description`, `image`) VALUES
(1, 'Game 1', 'Embark on an epic journey through a mystical land filled with ancient ruins, mythical creatures, and powerful artifacts waiting to be discovered.', 'Default_game.jpg'),
(2, 'Game 2', 'Lead a team of brave adventurers on a quest to save the kingdom from an evil sorcerer threatening to plunge the world into darkness.', 'Default_game.jpg'),
(3, 'Game 3', 'Command a squad of elite soldiers in intense tactical battles against enemy forces in a war-torn futuristic world.', 'Default_game.jpg'),
(4, 'Game 4', 'Build and manage your own virtual city, from bustling metropolises to quaint rural towns, in this addictive city-building simulation game.', 'Default_game.jpg'),
(5, 'Game 5', 'Embark on a perilous voyage across the high seas as a fearless pirate captain, plundering treasure, battling rival corsairs, and navigating treacherous waters.', 'Default_game.jpg'),
(6, 'Game 6', 'Survive in a post-apocalyptic world overrun by zombies, scavenging for resources, fortifying shelters, and forming alliances in a struggle for survival.', 'Default_game.jpg'),
(7, 'Game 7', 'Compete in high-octane street races, customize your ride with the latest upgrades, and dominate the underground racing scene in this adrenaline-fueled racing game.', 'Default_game.jpg'),
(8, 'Game 8', 'Immerse yourself in the world of professional sports, managing your own team, making strategic decisions, and leading them to victory in thrilling matches.', 'Default_game.jpg'),
(9, 'Game 9', 'Explore the vast expanse of outer space, colonize distant planets, and engage in epic space battles in this immersive space exploration game.', 'Default_game.jpg'),
(10, 'Game 10', 'Embark on a quest to uncover the truth behind a series of mysterious murders in this gripping detective adventure game.', 'Default_game.jpg'),
(11, 'Game 11', 'Step into the shoes of a legendary hero, wielding powerful weapons and magic, as you embark on a quest to save the realm from an ancient evil.', 'Default_game.jpg'),
(12, 'Game 12', 'Experience the thrill of the casino floor, from classic card games to cutting-edge slot machines, in this realistic casino simulation game.', 'Default_game.jpg'),
(13, 'Game 13', 'Build and manage your own farm, from planting crops to raising livestock, in this charming agricultural simulation game.', 'Default_game.jpg'),
(14, 'Game 14', 'Lead your nation to victory in epic battles against rival civilizations, from ancient times to the distant future, in this grand strategy game.', 'Default_game.jpg'),
(15, 'Game 15', 'Embark on a quest to become the greatest chef in the world, from humble beginnings in a small kitchen to culinary fame and fortune.', 'Default_game.jpg'),
(16, 'Game 16', 'Command a squad of armored tanks in epic battles against enemy forces, strategically deploying your forces and outmaneuvering your opponents.', 'Default_game.jpg'),
(17, 'Game 17', 'Travel back in time to ancient civilizations, from ancient Egypt to the Roman Empire, and build your own prosperous civilization in this historical simulation game.', 'Default_game.jpg'),
(18, 'Game 18', 'Explore the depths of the ocean in a state-of-the-art submarine, discovering lost civilizations, hidden treasures, and mysterious sea creatures along the way.', 'Default_game.jpg'),
(19, 'Game 19', 'Survive in a hostile alien world, building shelters, crafting tools, and battling dangerous creatures in a struggle for survival against the odds.', 'Default_game.jpg'),
(20, 'Game 20', 'Join forces with friends to explore a vast open world filled with adventure, from epic quests to daring heists, in this multiplayer role-playing game.', 'Default_game.jpg'),
(21, 'Game 21', 'Command a squad of elite special forces operatives in covert missions against terrorist organizations, rogue states, and other threats to global security.', 'Default_game.jpg'),
(22, 'Game 22', 'Embark on an epic journey through a magical realm, battling fierce monsters, solving ancient puzzles, and uncovering the secrets of a lost civilization.', 'Default_game.jpg'),
(23, 'Game 23', 'Race against rivals in high-speed motorcycle races, performing daring stunts and maneuvers as you compete for glory in this adrenaline-fueled racing game.', 'Default_game.jpg'),
(24, 'Game 24', 'Lead a team of superheroes in epic battles against supervillains, saving the world from destruction with your incredible powers and abilities.', 'Default_game.jpg'),
(25, 'Game 25', 'Explore the vast wilderness of the American frontier, hunting wild animals, forging friendships with frontier settlers, and living the life of a true cowboy.', 'Default_game.jpg'),
(26, 'Game 26', 'Build and manage your own zoo, from caring for exotic animals to designing stunning exhibits, in this immersive zoo management simulation game.', 'Default_game.jpg'),
(27, 'Game 27', 'Embark on an epic quest to defeat an ancient dragon threatening the kingdom, gathering allies, mastering powerful magic, and facing legendary challenges along the way.', 'Default_game.jpg'),
(28, 'Game 28', 'Survive in a harsh post-apocalyptic world, scavenging for resources, battling rival factions, and rebuilding civilization from the ashes of the old world.', 'Default_game.jpg'),
(29, 'Game 29', 'Command a squad of futuristic mechs in epic battles against giant monsters, rival pilots, and alien invaders in this high-octane mech combat game.', 'Default_game.jpg'),
(30, 'Game 30', 'Embark on a journey of self-discovery and adventure, exploring vast open worlds, meeting colorful characters, and forging your own path in this immersive role-playing game.', 'Default_game.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `gamenight`
--

CREATE TABLE `gamenight` (
  `id` int(11) NOT NULL,
  `fk_game_id_id` int(11) NOT NULL,
  `fk_user_id_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `location` varchar(255) NOT NULL,
  `gn_name` varchar(255) NOT NULL,
  `gn_description` longtext NOT NULL,
  `gn_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gamenight`
--

INSERT INTO `gamenight` (`id`, `fk_game_id_id`, `fk_user_id_id`, `date`, `location`, `gn_name`, `gn_description`, `gn_image`) VALUES
(1, 1, 1, '2024-04-25 19:00:00', 'Main Street 123', 'Game Night 1', 'Join us for a thrilling night of gaming excitement! We\'ll be playing a variety of games, from classic board games to intense video game battles. Don\'t miss out!', 'Default_GN.jpg'),
(2, 2, 2, '2024-04-26 18:00:00', 'Oak Avenue 456', 'Game Night 2', 'Calling all gamers! Get ready for an epic evening of gaming fun with friends. Bring your A-game and prepare for some intense competition!', 'Default_GN.jpg'),
(3, 3, 3, '2024-04-27 19:30:00', 'Pine Street 789', 'Game Night 3', 'It\'s game night! Come join us for a night of laughter, strategy, and excitement. Whether you\'re a casual player or a seasoned pro, there\'s something for everyone!', 'Default_GN.jpg'),
(4, 4, 4, '2024-04-28 20:00:00', 'Cedar Lane 101', 'Game Night 4', 'Ready to roll the dice and make some memories? Join us for a game night filled with fun, laughter, and friendly competition. All skill levels welcome!', 'Default_GN.jpg'),
(5, 5, 5, '2024-04-29 18:30:00', 'Maple Road 202', 'Game Night 5', 'Attention all gamers! Get ready for a night of epic battles, thrilling adventures, and unforgettable memories. Don\'t miss out on the gaming event of the year!', 'Default_GN.jpg'),
(6, 6, 6, '2024-04-30 19:00:00', 'Elm Street 303', 'Game Night 6', 'Join us for a night of gaming goodness! From tabletop classics to digital favorites, there\'s something for everyone at this epic game night event.', 'Default_GN.jpg'),
(7, 7, 7, '2024-05-01 18:00:00', 'Willow Avenue 404', 'Game Night 7', 'Calling all gamers! Grab your controllers, gather your friends, and get ready for a night of gaming mayhem. It\'s going to be epic!', 'Default_GN.jpg'),
(8, 8, 8, '2024-05-02 19:30:00', 'Oak Lane 505', 'Game Night 8', 'Get ready to level up your gaming experience! Join us for a night of epic battles, thrilling adventures, and endless fun with friends.', 'Default_GN.jpg'),
(9, 9, 9, '2024-05-03 20:00:00', 'Chestnut Street 606', 'Game Night 9', 'Attention all gamers! It\'s time to show off your skills and compete for glory. Join us for an epic game night filled with fun, excitement, and friendly competition.', 'Default_GN.jpg'),
(10, 10, 10, '2024-05-04 18:30:00', 'Pine Lane 707', 'Game Night 10', 'Join us for a night of gaming extravaganza! Whether you\'re a hardcore gamer or just looking for some casual fun, there\'s something for everyone at this epic event.', 'Default_GN.jpg'),
(11, 11, 11, '2024-05-05 19:00:00', 'Maple Avenue 808', 'Game Night 11', 'Get ready for a night of gaming madness! Join us for epic battles, thrilling adventures, and non-stop fun with friends. It\'s going to be legendary!', 'Default_GN.jpg'),
(12, 12, 12, '2024-05-06 18:00:00', 'Elm Lane 909', 'Game Night 12', 'Calling all gamers! Join us for a night of epic gaming action, intense battles, and unforgettable memories. Don\'t miss out on the gaming event of the year!', 'Default_GN.jpg'),
(13, 13, 13, '2024-05-07 19:30:00', 'Willow Street 1010', 'Game Night 13', 'Get ready for a night of gaming fun! Whether you\'re a seasoned pro or a casual player, there\'s something for everyone at this epic game night event.', 'Default_GN.jpg'),
(14, 14, 14, '2024-05-08 20:00:00', 'Main Lane 1111', 'Game Night 14', 'Join us for a night of epic gaming adventures! From classic board games to intense video game battles, there\'s something for every gamer at this exciting event.', 'Default_GN.jpg'),
(15, 15, 15, '2024-05-09 18:30:00', 'Oak Street 1212', 'Game Night 15', 'Attention all gamers! Get ready for a night of non-stop gaming action, intense battles, and epic adventures. It\'s going to be a night to remember!', 'Default_GN.jpg'),
(16, 16, 16, '2024-05-10 19:00:00', 'Pine Lane 1313', 'Game Night 16', 'Join us for a night of gaming fun with friends! Whether you\'re a board game enthusiast or a video game aficionado, there\'s something for everyone at this epic event.', 'Default_GN.jpg'),
(17, 17, 17, '2024-05-11 18:00:00', 'Maple Avenue 1414', 'Game Night 17', 'Calling all gamers! Grab your controllers and get ready for a night of gaming excitement, intense battles, and epic adventures with friends.', 'Default_GN.jpg'),
(18, 18, 18, '2024-05-12 19:30:00', 'Elm Lane 1515', 'Game Night 18', 'Get ready for a night of gaming madness! Join us for epic battles, thrilling adventures, and non-stop fun with friends. It\'s going to be legendary!', 'Default_GN.jpg'),
(19, 19, 19, '2024-05-13 20:00:00', 'Willow Street 1616', 'Game Night 19', 'Join us for a night of gaming extravaganza! Whether you\'re a hardcore gamer or just looking for some casual fun, there\'s something for everyone at this epic event.', 'Default_GN.jpg'),
(20, 20, 20, '2024-05-14 18:30:00', 'Main Lane 1717', 'Game Night 20', 'Calling all gamers! Join us for a night of epic gaming action, intense battles, and unforgettable memories. Don\'t miss out on the gaming event of the year!', 'Default_GN.jpg'),
(21, 21, 21, '2024-05-15 19:00:00', 'Oak Street 1818', 'Game Night 21', 'Get ready for a night of gaming fun! Whether you\'re a seasoned pro or a casual player, there\'s something for everyone at this epic game night event.', 'Default_GN.jpg'),
(22, 22, 22, '2024-05-16 18:00:00', 'Pine Lane 1919', 'Game Night 22', 'Attention all gamers! Get ready for a night of non-stop gaming action, intense battles, and epic adventures. It\'s going to be a night to remember!', 'Default_GN.jpg'),
(23, 23, 23, '2024-05-17 19:30:00', 'Maple Avenue 2020', 'Game Night 23', 'Join us for a night of gaming fun with friends! Whether you\'re a board game enthusiast or a video game aficionado, there\'s something for everyone at this epic event.', 'Default_GN.jpg'),
(24, 24, 24, '2024-05-18 20:00:00', 'Elm Lane 2121', 'Game Night 24', 'Calling all gamers! Grab your controllers and get ready for a night of gaming excitement, intense battles, and epic adventures with friends.', 'Default_GN.jpg'),
(25, 25, 25, '2024-05-19 18:30:00', 'Willow Street 2222', 'Game Night 25', 'Get ready for a night of gaming madness! Join us for epic battles, thrilling adventures, and non-stop fun with friends. It\'s going to be legendary!', 'Default_GN.jpg'),
(26, 26, 26, '2024-05-20 19:00:00', 'Main Lane 2323', 'Game Night 26', 'Join us for a night of gaming extravaganza! Whether you\'re a hardcore gamer or just looking for some casual fun, there\'s something for everyone at this epic event.', 'Default_GN.jpg'),
(27, 27, 27, '2024-05-21 18:00:00', 'Oak Street 2424', 'Game Night 27', 'Get ready for a night of gaming fun! Whether you\'re a seasoned pro or a casual player, there\'s something for everyone at this epic game night event.', 'Default_GN.jpg'),
(28, 28, 28, '2024-05-22 19:30:00', 'Pine Lane 2525', 'Game Night 28', 'Attention all gamers! Get ready for a night of non-stop gaming action, intense battles, and epic adventures. It\'s going to be a night to remember!', 'Default_GN.jpg'),
(29, 29, 29, '2024-05-23 20:00:00', 'Maple Avenue 2626', 'Game Night 29', 'Join us for a night of gaming fun with friends! Whether you\'re a board game enthusiast or a video game aficionado, there\'s something for everyone at this epic event.', 'Default_GN.jpg'),
(30, 30, 30, '2024-05-24 18:30:00', 'Elm Lane 2727', 'Game Night 30', 'Calling all gamers! Grab your controllers and get ready for a night of gaming excitement, intense battles, and epic adventures with friends.', 'Default_GN.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `gamenight_participant`
--

CREATE TABLE `gamenight_participant` (
  `id` int(11) NOT NULL,
  `fk_user_id_id` int(11) NOT NULL,
  `fk_gamenight_id_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gamenight_participant`
--

INSERT INTO `gamenight_participant` (`id`, `fk_user_id_id`, `fk_gamenight_id_id`) VALUES
(1, 1, 17),
(2, 1, 1),
(3, 1, 1),
(4, 33, 1);

-- --------------------------------------------------------

--
-- Table structure for table `gamenight_snacks`
--

CREATE TABLE `gamenight_snacks` (
  `id` int(11) NOT NULL,
  `fk_gamenight_id_id` int(11) NOT NULL,
  `fk_snack_id_id` int(11) NOT NULL,
  `fk_user_id_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gamenight_snacks`
--

INSERT INTO `gamenight_snacks` (`id`, `fk_gamenight_id_id`, `fk_snack_id_id`, `fk_user_id_id`, `quantity`) VALUES
(4, 1, 2, 1, 10),
(5, 1, 21, 1, 10),
(6, 1, 12, 1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `gamenight_tags`
--

CREATE TABLE `gamenight_tags` (
  `id` int(11) NOT NULL,
  `fk_tag_id_id` int(11) NOT NULL,
  `fk_gamenight_id_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gamenight_tags`
--

INSERT INTO `gamenight_tags` (`id`, `fk_tag_id_id`, `fk_gamenight_id_id`) VALUES
(4, 2, 1),
(5, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `invites`
--

CREATE TABLE `invites` (
  `id` int(11) NOT NULL,
  `fk_user_inviter_id` int(11) NOT NULL,
  `fk_user_invitee_id` int(11) NOT NULL,
  `fk_gamenight_id_id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `date` datetime NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invites`
--

INSERT INTO `invites` (`id`, `fk_user_inviter_id`, `fk_user_invitee_id`, `fk_gamenight_id_id`, `status`, `date`, `type`) VALUES
(1, 1, 1, 17, 'accept', '2024-04-24 09:49:24', 'invite'),
(2, 1, 1, 1, 'decline', '2024-04-24 11:38:13', 'invite'),
(3, 1, 1, 1, 'accept', '2024-04-24 11:38:31', 'invite'),
(4, 1, 2, 1, 'pending', '2024-04-24 11:54:41', 'invite'),
(5, 10, 1, 10, 'pending', '2024-04-24 12:42:36', 'request'),
(6, 1, 33, 1, 'accept', '2024-04-24 12:53:26', 'request');

-- --------------------------------------------------------

--
-- Table structure for table `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL,
  `body` longtext NOT NULL,
  `headers` longtext NOT NULL,
  `queue_name` varchar(190) NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `available_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `delivered_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `fk_game_id_id` int(11) NOT NULL,
  `fk_user_id_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `snacks`
--

CREATE TABLE `snacks` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `snacks`
--

INSERT INTO `snacks` (`id`, `name`, `type`) VALUES
(1, 'Potato Chips', 'salty'),
(2, 'Popcorn', 'salty'),
(3, 'Pretzels', 'salty'),
(4, 'Nachos', 'salty'),
(5, 'French Fries', 'salty'),
(6, 'Chocolate Chip Cookies', 'sweet'),
(7, 'Brownies', 'sweet'),
(8, 'Cupcakes', 'sweet'),
(9, 'Ice Cream', 'sweet'),
(10, 'Candy Bars', 'sweet'),
(11, 'Hummus and Veggie Sticks', 'vegan'),
(12, 'Mixed Nuts', 'vegan'),
(13, 'Fruit Salad', 'vegan'),
(14, 'Vegan Cookies', 'vegan'),
(15, 'Granola Bars', 'vegan'),
(16, 'Sparkling Water', 'non-alcohol-drinks'),
(17, 'Fruit Juice', 'non-alcohol-drinks'),
(18, 'Iced Tea', 'non-alcohol-drinks'),
(19, 'Soda', 'non-alcohol-drinks'),
(20, 'Lemonade', 'non-alcohol-drinks'),
(21, 'Beer', 'alcohol-drinks'),
(22, 'Wine', 'alcohol-drinks'),
(23, 'Cocktails', 'alcohol-drinks'),
(24, 'Whiskey', 'alcohol-drinks'),
(25, 'Vodka', 'alcohol-drinks'),
(26, 'Rum', 'alcohol-drinks'),
(27, 'Tequila', 'alcohol-drinks'),
(28, 'Gin', 'alcohol-drinks'),
(29, 'Brandy', 'alcohol-drinks');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`) VALUES
(1, 'cool'),
(2, 'boardgame'),
(3, 'vegan');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) NOT NULL,
  `roles` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL COMMENT '(DC2Type:json)' CHECK (json_valid(`roles`)),
  `password` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `banned` tinyint(1) NOT NULL,
  `banned_duration` datetime DEFAULT NULL,
  `user_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `username`, `first_name`, `last_name`, `banned`, `banned_duration`, `user_image`) VALUES
(1, 'contact@sebastian-lausch.at', '[\"ROLE_ADMIN\"]', '$2y$13$SypALgFQ2MzV8BsLhf/9a.Zuq5cqJ73qg655nQJj0OFXwt8.bmEZy', 'Blub', 'Sebastian', 'Lausch', 0, NULL, NULL),
(2, 'john.doe@example.com', '[]', '123123', 'user1', 'John', 'Doe', 0, NULL, 'Default_user.jpg'),
(3, 'jane.smith@example.com', '[]', '123123', 'user2', 'Jane', 'Smith', 0, NULL, 'Default_user.jpg'),
(4, 'michael.johnson@example.com', '[]', '123123', 'user3', 'Michael', 'Johnson', 0, NULL, 'Default_user.jpg'),
(5, 'emily.brown@example.com', '[]', '123123', 'user4', 'Emily', 'Brown', 0, NULL, 'Default_user.jpg'),
(6, 'william.jones@example.com', '[]', '123123', 'user5', 'William', 'Jones', 0, NULL, 'Default_user.jpg'),
(7, 'olivia.miller@example.com', '[]', '123123', 'user6', 'Olivia', 'Miller', 0, NULL, 'Default_user.jpg'),
(8, 'james.davis@example.com', '[]', '123123', 'user7', 'James', 'Davis', 0, NULL, 'Default_user.jpg'),
(9, 'emma.garcia@example.com', '[]', '123123', 'user8', 'Emma', 'Garcia', 0, NULL, 'Default_user.jpg'),
(10, 'benjamin.rodriguez@example.com', '[]', '123123', 'user9', 'Benjamin', 'Rodriguez', 0, NULL, 'Default_user.jpg'),
(11, 'ava.martinez@example.com', '[]', '123123', 'user10', 'Ava', 'Martinez', 0, NULL, 'Default_user.jpg'),
(12, 'alexander.hernandez@example.com', '[]', '123123', 'user11', 'Alexander', 'Hernandez', 0, NULL, 'Default_user.jpg'),
(13, 'sophia.lopez@example.com', '[]', '123123', 'user12', 'Sophia', 'Lopez', 0, NULL, 'Default_user.jpg'),
(14, 'matthew.gonzalez@example.com', '[]', '123123', 'user13', 'Matthew', 'Gonzalez', 0, NULL, 'Default_user.jpg'),
(15, 'isabella.wilson@example.com', '[]', '123123', 'user14', 'Isabella', 'Wilson', 0, NULL, 'Default_user.jpg'),
(16, 'daniel.anderson@example.com', '[]', '123123', 'user15', 'Daniel', 'Anderson', 0, NULL, 'Default_user.jpg'),
(17, 'mia.taylor@example.com', '[]', '123123', 'user16', 'Mia', 'Taylor', 0, NULL, 'Default_user.jpg'),
(18, 'david.thomas@example.com', '[]', '123123', 'user17', 'David', 'Thomas', 0, NULL, 'Default_user.jpg'),
(19, 'charlotte.moore@example.com', '[]', '123123', 'user18', 'Charlotte', 'Moore', 0, NULL, 'Default_user.jpg'),
(20, 'joseph.jackson@example.com', '[]', '123123', 'user19', 'Joseph', 'Jackson', 0, NULL, 'Default_user.jpg'),
(21, 'amelia.white@example.com', '[]', '123123', 'user20', 'Amelia', 'White', 0, NULL, 'Default_user.jpg'),
(22, 'ryan.harris@example.com', '[]', '123123', 'user21', 'Ryan', 'Harris', 0, NULL, 'Default_user.jpg'),
(23, 'ella.martin@example.com', '[]', '123123', 'user22', 'Ella', 'Martin', 0, NULL, 'Default_user.jpg'),
(24, 'samuel.thompson@example.com', '[]', '123123', 'user23', 'Samuel', 'Thompson', 0, NULL, 'Default_user.jpg'),
(25, 'grace.garcia@example.com', '[]', '123123', 'user24', 'Grace', 'Garcia', 0, NULL, 'Default_user.jpg'),
(26, 'jackson.robinson@example.com', '[]', '123123', 'user25', 'Jackson', 'Robinson', 0, NULL, 'Default_user.jpg'),
(27, 'lily.clark@example.com', '[]', '123123', 'user26', 'Lily', 'Clark', 0, NULL, 'Default_user.jpg'),
(28, 'andrew.lewis@example.com', '[]', '123123', 'user27', 'Andrew', 'Lewis', 0, NULL, 'Default_user.jpg'),
(29, 'liam.walker@example.com', '[]', '123123', 'user28', 'Liam', 'Walker', 0, NULL, 'Default_user.jpg'),
(30, 'chloe.young@example.com', '[]', '123123', 'user29', 'Chloe', 'Young', 0, NULL, 'Default_user.jpg'),
(31, 'madison.allen@example.com', '[]', '123123', 'user30', 'Madison', 'Allen', 0, NULL, 'Default_user.jpg'),
(32, 'jane.doe@gmail.com', '[]', '$2y$13$95h0nXtWvzkRQUlUED/dSOqDWtGVaqmj/vExyHzuwOhggwKsoA2N2', 'Janeson', 'Jane', 'Doe', 0, NULL, NULL),
(33, 'user@mail.com', '[]', '$2y$13$YUEMYeFf1lil9orkl1r.Uu8Zn2x/KwgdvPDrECT03c4z/QWA45rCC', 'Ein_User', 'Sebastian', 'Test', 0, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_5F9E962ABD192D4B` (`fk_game_id_id`),
  ADD KEY `IDX_5F9E962A6DE8AF9C` (`fk_user_id_id`);

--
-- Indexes for table `create_gn`
--
ALTER TABLE `create_gn`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gamenight`
--
ALTER TABLE `gamenight`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_A7EA13A0BD192D4B` (`fk_game_id_id`),
  ADD KEY `IDX_A7EA13A06DE8AF9C` (`fk_user_id_id`);

--
-- Indexes for table `gamenight_participant`
--
ALTER TABLE `gamenight_participant`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_66C5BDA06DE8AF9C` (`fk_user_id_id`),
  ADD KEY `IDX_66C5BDA0777630FB` (`fk_gamenight_id_id`);

--
-- Indexes for table `gamenight_snacks`
--
ALTER TABLE `gamenight_snacks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_157ADA0F777630FB` (`fk_gamenight_id_id`),
  ADD KEY `IDX_157ADA0F72ECE421` (`fk_snack_id_id`),
  ADD KEY `IDX_157ADA0F6DE8AF9C` (`fk_user_id_id`);

--
-- Indexes for table `gamenight_tags`
--
ALTER TABLE `gamenight_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_4521FC823CF150C1` (`fk_tag_id_id`),
  ADD KEY `IDX_4521FC82777630FB` (`fk_gamenight_id_id`);

--
-- Indexes for table `invites`
--
ALTER TABLE `invites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_37E6A6CC95BDDDD` (`fk_user_inviter_id`),
  ADD KEY `IDX_37E6A6C495B2FB` (`fk_user_invitee_id`),
  ADD KEY `IDX_37E6A6C777630FB` (`fk_gamenight_id_id`);

--
-- Indexes for table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_D8892622BD192D4B` (`fk_game_id_id`),
  ADD KEY `IDX_D88926226DE8AF9C` (`fk_user_id_id`);

--
-- Indexes for table `snacks`
--
ALTER TABLE `snacks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_IDENTIFIER_EMAIL` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `create_gn`
--
ALTER TABLE `create_gn`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `game`
--
ALTER TABLE `game`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `gamenight`
--
ALTER TABLE `gamenight`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `gamenight_participant`
--
ALTER TABLE `gamenight_participant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `gamenight_snacks`
--
ALTER TABLE `gamenight_snacks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `gamenight_tags`
--
ALTER TABLE `gamenight_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `invites`
--
ALTER TABLE `invites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `snacks`
--
ALTER TABLE `snacks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `FK_5F9E962A6DE8AF9C` FOREIGN KEY (`fk_user_id_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_5F9E962ABD192D4B` FOREIGN KEY (`fk_game_id_id`) REFERENCES `game` (`id`);

--
-- Constraints for table `gamenight`
--
ALTER TABLE `gamenight`
  ADD CONSTRAINT `FK_A7EA13A06DE8AF9C` FOREIGN KEY (`fk_user_id_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_A7EA13A0BD192D4B` FOREIGN KEY (`fk_game_id_id`) REFERENCES `game` (`id`);

--
-- Constraints for table `gamenight_participant`
--
ALTER TABLE `gamenight_participant`
  ADD CONSTRAINT `FK_66C5BDA06DE8AF9C` FOREIGN KEY (`fk_user_id_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_66C5BDA0777630FB` FOREIGN KEY (`fk_gamenight_id_id`) REFERENCES `gamenight` (`id`);

--
-- Constraints for table `gamenight_snacks`
--
ALTER TABLE `gamenight_snacks`
  ADD CONSTRAINT `FK_157ADA0F6DE8AF9C` FOREIGN KEY (`fk_user_id_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_157ADA0F72ECE421` FOREIGN KEY (`fk_snack_id_id`) REFERENCES `snacks` (`id`),
  ADD CONSTRAINT `FK_157ADA0F777630FB` FOREIGN KEY (`fk_gamenight_id_id`) REFERENCES `gamenight` (`id`);

--
-- Constraints for table `gamenight_tags`
--
ALTER TABLE `gamenight_tags`
  ADD CONSTRAINT `FK_4521FC823CF150C1` FOREIGN KEY (`fk_tag_id_id`) REFERENCES `tags` (`id`),
  ADD CONSTRAINT `FK_4521FC82777630FB` FOREIGN KEY (`fk_gamenight_id_id`) REFERENCES `gamenight` (`id`);

--
-- Constraints for table `invites`
--
ALTER TABLE `invites`
  ADD CONSTRAINT `FK_37E6A6C495B2FB` FOREIGN KEY (`fk_user_invitee_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_37E6A6C777630FB` FOREIGN KEY (`fk_gamenight_id_id`) REFERENCES `gamenight` (`id`),
  ADD CONSTRAINT `FK_37E6A6CC95BDDDD` FOREIGN KEY (`fk_user_inviter_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `FK_D88926226DE8AF9C` FOREIGN KEY (`fk_user_id_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_D8892622BD192D4B` FOREIGN KEY (`fk_game_id_id`) REFERENCES `game` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
