-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2019 at 03:23 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `games`
--

-- --------------------------------------------------------

--
-- Table structure for table `characterrole`
--

CREATE TABLE `characterrole` (
  `roleId` int(11) NOT NULL,
  `theRole` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `characterrole`
--

INSERT INTO `characterrole` (`roleId`, `theRole`) VALUES
(1, 'Antagonist'),
(2, 'Protagonist'),
(3, 'Archenemy'),
(4, 'Deuteragonist'),
(5, 'Narrator'),
(6, 'Tritagonist'),
(7, 'Tragic Hero'),
(8, 'Supporting Character'),
(9, 'Passerby'),
(12, 'Rival');

-- --------------------------------------------------------

--
-- Table structure for table `characterroleingame`
--

CREATE TABLE `characterroleingame` (
  `gameId` int(11) NOT NULL,
  `characterId` int(11) NOT NULL,
  `roleId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `characterroleingame`
--

INSERT INTO `characterroleingame` (`gameId`, `characterId`, `roleId`) VALUES
(5, 3, 2),
(5, 4, 2),
(5, 16, 1),
(6, 3, 2),
(6, 15, 8),
(6, 16, 1),
(8, 17, 1),
(8, 18, 3),
(8, 19, 9),
(8, 20, 2),
(8, 26, 2),
(21, 21, 8),
(21, 22, 1),
(21, 23, 1),
(22, 24, 1),
(22, 25, 1),
(25, 26, 2),
(26, 26, 2),
(26, 30, 3),
(26, 31, 4),
(26, 32, 6),
(26, 33, 1),
(27, 26, 2),
(27, 34, 2),
(27, 35, 1),
(27, 36, 1),
(28, 37, 1),
(28, 38, 1),
(28, 39, 1),
(29, 26, 2),
(30, 40, 1),
(30, 41, 8),
(30, 42, 2),
(30, 43, 1),
(30, 44, 2),
(30, 45, 1),
(31, 26, 2),
(31, 46, 2),
(31, 47, 2),
(31, 48, 4),
(31, 49, 2),
(31, 50, 6),
(32, 26, 2),
(32, 51, 12),
(33, 26, 2),
(33, 51, 12),
(34, 28, 2),
(34, 29, 1),
(35, 52, 2),
(35, 53, 4),
(35, 54, 4),
(35, 55, 1),
(35, 56, 1),
(35, 57, 1),
(35, 57, 3),
(36, 26, 2),
(37, 27, 2),
(37, 58, 4),
(37, 59, 4),
(37, 60, 3),
(38, 26, 2),
(39, 26, 2),
(40, 61, 2),
(40, 62, 8),
(40, 63, 8),
(40, 64, 8),
(41, 65, 2),
(41, 66, 1),
(41, 67, 4),
(41, 68, 8),
(41, 69, 1),
(41, 70, 1),
(41, 71, 1),
(42, 72, 2),
(42, 73, 4),
(42, 74, 8),
(42, 75, 8),
(42, 76, 8),
(42, 77, 3),
(42, 78, 1),
(43, 79, 2),
(43, 80, 8),
(43, 81, 1),
(43, 81, 3),
(43, 82, 8),
(43, 83, 9),
(44, 84, 2),
(44, 85, 8),
(44, 86, 1),
(44, 87, 2),
(44, 88, 2),
(44, 89, 2),
(44, 90, 1),
(45, 26, 2),
(45, 91, 8),
(45, 92, 2),
(45, 93, 2),
(45, 94, 4),
(45, 95, 3),
(46, 12, 2),
(46, 13, 4),
(46, 14, 8),
(46, 96, 3),
(47, 97, 8),
(47, 98, 2),
(47, 99, 8),
(47, 100, 4),
(47, 101, 4),
(47, 102, 2),
(48, 103, 4),
(48, 104, 2),
(48, 105, 1),
(48, 106, 8),
(48, 107, 8),
(49, 108, 2),
(49, 109, 1),
(49, 110, 8),
(50, 2, 2),
(50, 5, 8),
(50, 6, 8),
(50, 7, 1),
(50, 26, 2),
(50, 111, 2),
(51, 8, 2),
(51, 9, 8),
(51, 10, 8),
(51, 11, 1),
(52, 27, 2),
(52, 28, 2),
(52, 29, 2),
(52, 60, 2),
(52, 112, 2),
(52, 114, 2),
(53, 28, 1),
(53, 115, 2),
(54, 26, 2),
(54, 116, 4),
(55, 31, 8),
(56, 26, 2),
(56, 117, 4),
(56, 118, 8),
(56, 119, 1);

-- --------------------------------------------------------

--
-- Table structure for table `developedby`
--

CREATE TABLE `developedby` (
  `gamecompanyId` int(11) NOT NULL,
  `gameId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `developedby`
--

INSERT INTO `developedby` (`gamecompanyId`, `gameId`) VALUES
(1, 5),
(1, 6),
(1, 41),
(2, 8),
(2, 44),
(15, 21),
(17, 22),
(21, 25),
(22, 26),
(22, 55),
(23, 27),
(25, 28),
(26, 29),
(27, 30),
(29, 31),
(31, 32),
(31, 33),
(33, 34),
(33, 43),
(33, 53),
(34, 35),
(36, 36),
(37, 52),
(38, 37),
(39, 38),
(40, 39),
(40, 42),
(41, 40),
(43, 45),
(45, 46),
(46, 47),
(48, 48),
(49, 49),
(51, 50),
(52, 51),
(54, 54),
(56, 56);

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE `game` (
  `gameId` int(11) NOT NULL,
  `gameTitle` varchar(45) NOT NULL,
  `synopsis` text,
  `price` double DEFAULT NULL,
  `releasedate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`gameId`, `gameTitle`, `synopsis`, `price`, `releasedate`) VALUES
(5, 'Soul Reaver 2: Legacy of Kain: Defiance', 'Take control of two powerful and highly evolved vampires: Kain, an all-powerful demigod, and Raziel, a demonic angel of death. Each equipped with a legendary sword, Kain & Raziel must battle through a world loaded with conflict and intrigue as they attempt to unravel their destinies and defeat the dark forces that seek to condemn their world to eternal damnation.', 6.99, '2003-12-17'),
(6, 'Blood Omen 2: Legacy of Kain', 'Cast down from power by a mysterious warlord centuries ago, Kain reawakens in a world he barely recognises. His armies slain, his vampire brethren nearly extinct, Kain is one of the last of his kind. With an agenda of vengeance, Kain shall unleash a wicked wrath to uncover the plot that threatens the land he seeks to conquer.', 5.99, '2002-03-29'),
(8, 'Final Fantasy XIV online', 'Take part in an epic and ever-changing FINAL FANTASY as you adventure and explore with friends from around the world.', 9.99, '2014-02-18'),
(21, 'Dark Souls: Remastered', 'Then, there was fire. Re-experience the critically acclaimed, genre-defining game that started it all. Beautifully remastered, return to Lordran in stunning high-definition detail running at 60fps. ', 39.99, '2018-03-24'),
(22, 'Minecraft', 'Minecraft is a sandbox video game created by Swedish game developer Markus Persson and released by Mojang in 2011. The game allows players to build with a variety of different blocks in a 3D procedurally generated world, requiring creativity from players.', 23.95, '2009-05-17'),
(25, 'Stars End', 'Stars End is a multiplayer sci-fi survival game set hundreds of years in the future, in a star system colonized by humans escaping their dying home world.  Start with basic supplies and find a way into space - without any loading screens! Players will have the opportunity to travel the system to seek out resources, completing missions and uncovering mysteries - while building strongholds in space and planetside, continually facing the danger of other players. Utilising procedural planets, the game world is vast - but it\'s not so large that you won\'t be able to play with your friends.', 19.99, '2019-10-15'),
(26, 'Divinity: Original Sin - Enhanced Edition', 'Gather your party and get ready for a new, back-to-the-roots RPG adventure! Discuss your decisions with companions; fight foes in turn-based combat; explore an open world and interact with everything and everyone you see. Join up with a friend to play online in co-op and make your own adventures with the powerful RPG toolkit.', 39.99, '2015-10-27'),
(27, 'DOOM (2016)', 'Developed by id software, the studio that pioneered the first-person shooter genre and created multiplayer Deathmatch, DOOM returns as a brutally fun and challenging modern-day shooter experience. Relentless demons, impossibly destructive guns, and fast, fluid movement provide the foundation for intense, first-person combat – whether you’re obliterating demon hordes through the depths of Hell in the single-player campaign, or competing against your friends in numerous multiplayer modes. Expand your gameplay experience using DOOM SnapMap game editor to easily create, play, and share your content with the world.', 19.99, '2016-05-13'),
(28, 'The Elder Scrolls Online', 'The Elder Scrolls Online is a massively multiplayer online role-playing game that was announced in May 2012. Developed by the team at ZeniMax Online Studios, The Elder Scrolls Online merges the unmatched exploration of rich worlds that the franchise is known for with the scale and social aspects of a massively multiplayer online role-playing game.  An entirely new chapter of Elder Scrolls history will be revealed in this ambitious world, set a millennium before the events of Skyrim as the Daedric prince, Molag Bal, tries to pull all of Tamriel into his demonic realm.', 19.99, '2014-04-04'),
(29, 'ARK: Survival Evolved', 'ARK: Survival Evolved takes on the survival genre with a unique blend of emergent multiplayer cooperation and competition. Players awake naked and starving on the beach of a mysterious island among a herd of other confused humans. On ARK, they must then hunt, harvest, craft, research technology, and build shelters to protect against scorching days, freezing nights, volatile weather systems, dangerous wildlife, and potential enemies.  Use cunning strategy and tactics to tame and ride the many dinosaurs and other primeval creatures roaming the dynamic, persistent ecosystems across land, sea, air, and even underground. Build your character’s strengths and gain items, skills, and pet creatures using in-depth role-playing systems. Start a tribe with hundreds of other players to survive and dominate competing tribes...and ultimately discover the ARK’s true purpose.', 54.99, '2017-08-29'),
(30, 'Call of Duty 4: Modern Warfare', 'Call of Duty 4: Modern Warfare differs from previous installments of the Call of Duty series. Previous Call of Duty games have a distinct three country-specific campaign style, while Call of Duty 4 has a more film-like plot with interlaced story lines from the perspectives of Sgt. Paul Jackson of the Marines 1st Force Recon and Sgt. \'Soap\' MacTavish of the British 22nd SAS Regiment.', 59.99, '2007-11-05'),
(31, 'Tales of Symphonia', 'THE EPIC BATTLE FOR SURVIVAL  In a dying world, legend has it that a Chosen One will one day rise from amongst the people and the land will be reborn. The line between good and evil blurs in this epic adventure where the fate of two interlocked worlds hangs in the balance.  AN EPIC ADVENTURE – Over 80 hours of gameplay in this epic, emotionally charged storyline.  REAL-TIME 3D BATTLE SYSTEM – Experience the fierce, action-packed battle system. Combine hundreds of special attacks and magic spells.  A CLASSIC ART STYLE LIVES ON – Become absorbed in endearing cel-shaded characters designed by renowned artist Kosuke Fujishima', 19.99, '2003-08-29'),
(32, 'Pokémon Sword', 'Unsheathe your sword and take up your shield!  The world of Pokémon expands to include the Galar region in Pokémon Sword and Pokémon Shield!', 59.99, '2019-11-15'),
(33, 'Pokémon Shield', 'Unsheathe your sword and take up your shield!  The world of Pokémon expands to include the Galar region in Pokémon Sword and Pokémon Shield!', 59.99, '2019-11-15'),
(34, 'Super Mario Odyssey', 'The game has Mario leaving the Mushroom Kingdom to reach an unknown open world-like setting, like Super Mario 64 and Super Mario Sunshine.', 59.99, '2017-10-27'),
(35, 'Warhammer 40,000: Dawn of War', 'Warhammer 40,000: Dawn of War is a revolutionary science fiction real-time strategy (RTS) game set in the violent, post-apocalyptic universe of the 41st Millennium. Utilizing the exceptional game design skills of Relic Entertainment, Dawn of War provides an immersive entertainment experience of epic proportions. Command hardened troops, deadly vehicles and high-tech weaponry with one goal in mind, the complete extermination of the opposition.  Whether you lead Humanity\'s finest - the Space Marines, - the masters of mechanized warfare and billions-strong human army of the Imperial Guard, the diabolic and villainous traitors of man - the Chaos Space Marines, the brutal and savage beasts - the Orks, or the psychic and technologically advanced alien warriors - the Eldar, you control the action and the fate of your race!', 12.99, '2004-09-20'),
(36, 'Total War: Three Kingdoms', 'The year is 190CE. China is in turmoil.  The Han Dynasty crumbles before the child-emperor. He is but a figurehead; a mere puppet for the tyrant warlord Dong Zhuo. It is a brutal and oppressive regime, and as Dong Zhuo’s power grows, the empire slips further into the cauldron of anarchy.  But hope yet blossoms.  Three heroes, sworn to brotherhood in the face of tyranny, rally support for the trials ahead. Scenting opportunity, warlords from China’s great families follow suit, forming a fragile coalition in a bid to challenge Dong Zhuo’s remorseless rule. Will they triumph against the tyrant, or will personal ambition shatter their already crumbling alliance and drive them to supremacy?  The crucible fizzes. Allegiances shift. The fires of conflict stoke opportunity. Only one thing is certain: the very future of China will be shaped by its champions.', 59.99, '2019-05-23'),
(37, 'Sonic Mania', 'It\'s the ultimate Sonic celebration! Sonic returns in a new 2D platforming high speed adventure, and he\'s not alone!  Developed in collaboration between SEGA, Christian Whitehead, Headcannon, and PagodaWest Games, experience new zones and remixed classic levels with Sonic, Tails, and Knuckles!', 19.99, '2017-08-15'),
(38, 'Shadowverse', 'Shadowverse: the next evolution in collectible card games!  Welcome to the fierce battlegrounds of Shadowverse, Japan\'s #1 competitive card collecting game!  From the creators of Rage of Bahamut and RPG sensation Granblue Fantasy, Shadowverse features AAA artwork and unique game mechanics that make it the most visually and tactically rich CCG on the market.  - SUMMON 400+ cards, each lavishly illustrated with jaw-dropping fantasy art - STRATEGIZE with innovative mechanics that guarantee thrilling battles - MASTER seven character classes each with unique play styles and killer cards - BATTLE real-time opponents from around the world, or enjoy the fully voiced story mode  Come join our fun-loving community and show us your Shadowverse style! ', 0, '2016-06-17'),
(39, 'Gwent: The Witcher Card Game', 'Join in The Witcher universe’s favorite card game! In GWENT, you clash with your friends in fast-paced duels that combine bluffing, on-the-fly decision making and careful deck construction.  Play your cards right and manage a two-row battle formation as you unleash your hand over a best-of-three series of rounds. With heroes, spells and special abilities that dramatically turn the tide of battle, deception and clever tricks will be necessary parts of your arsenal.', 0, '2018-10-23'),
(40, 'Silent Hill: Downpour', 'The survival horror experience begins after a prison transport vehicle careens off the road, leaving lone inmate Murphy Pendleton stranded in Silent Hill. Gamers will encounter mind-bending puzzles, as well as horrific creatures and other world terrors using everyday objects from wooden chairs to glass bottles to fend off their enemies. The natural response, fight or flight is left to the player as they unravel a dark, thought-provoking storyline which will appeal to fans of the early, classic Silent Hill series, as well as anyone who enjoys a deep, psychological horror experience. In addition to the main storyline, players will also be presented with variable side quests along the way that can change depending on their play style, revealing unknown evils within the town.', 4.22, '2012-03-13'),
(41, 'Tomb Raider', 'Tomb Raider explores the intense and gritty origin story of Lara Croft and her ascent from a young woman to a hardened survivor. Armed only with raw instincts and the ability to push beyond the limits of human endurance, Lara must fight to unravel the dark history of a forgotten island to escape its relentless hold.', 19.99, '2013-03-05'),
(42, 'The Witcher 3: Wild Hunt', 'The Witcher: Wild Hunt is a story-driven, next-generation open world role-playing game set in a visually stunning fantasy universe full of meaningful choices and impactful consequences. In The Witcher you play as the professional monster hunter, Geralt of Rivia, tasked with finding a child of prophecy in a vast open world rich with merchant cities, viking pirate islands, dangerous mountain passes, and forgotten caverns to explore.', 29.99, '2015-05-19'),
(43, 'The Legend of Zelda: Breath of the Wild', 'Step into a world of discovery, exploration and adventure in The Legend of Zelda: Breath of the Wild, a boundary-breaking new game in the acclaimed series. Travel across fields, through forests and to mountain peaks as you discover what has become of the ruined kingdom of Hyrule in this stunning open-air adventure.', 59.99, '2017-03-03'),
(44, 'Bravely Default', 'Bravely Default follows the story of main character Tiz, a humble shepherd and the lone survivor of a cataclysmic event, as he joins a group of loyal companions on a journey to restore balance to the world. The battle system is what differentiates Bravely Default from other RPGs. Here players can strategically choose when to initiate two complementary commands: Brave and Default. This innovative system encourages players to think carefully about strategy during every enemy encounter. Selecting \"Brave\" lets players increase the number of actions a character can take in a turn, while \"Default\" allows players to store actions for later use.', 34.99, '2012-10-11'),
(45, 'Mass Effect: Andromeda', 'Mass Effect: Andromeda takes you to the Andromeda galaxy, far beyond the Milky Way. There, you\'ll lead our fight for a new home in hostile territory - where WE are the aliens.  Play as the Pathfinder - a leader of a squad of military-trained explorers - with deep progression and customisation systems. This is the story of humanity’s next chapter, and your choices throughout the game will ultimately determine our survival in the Andromeda Galaxy.', 39.99, '2017-03-21'),
(46, 'Dead Space', 'Dead Space is a 2008 science fiction survival horror video game developed by EA Redwood Shores (now Visceral Games) for Microsoft Windows, PlayStation 3 and Xbox 360. The game was released on all platforms through October 2008. The game puts the player in control of an engineer named Isaac Clarke, who battles the Necromorphs, reanimated human corpses, aboard an interstellar mining ship, the USG Ishimura.', 14.99, '2008-10-14'),
(47, 'Halo 5: Guardians', 'Peace is shattered when colony worlds are unexpectedly attacked. But when humanity\'s greatest hero goes missing, a new Spartan is tasked with hunting the Master Chief and solving a mystery that threatens the entire galaxy.', 18, '2015-10-27'),
(48, 'Metal Gear Solid V: The Phantom Pain', 'The 5th installment of the Metal Gear Solid saga, Metal Gear Solid V: The Phantom Pain continues the story of Big Boss (aka Naked Snake, aka David), connecting the story lines from Metal Gear Solid: Peace Walker, Metal Gear Solid: Ground Zeroes, and the rest of the Metal Gear Universe.', 29.99, '2015-09-01'),
(49, 'Darksiders III', 'Return to an apocalyptic planet Earth in Darksiders III, a hack-n-slash action adventure where players take on the role of FURY in her quest to hunt down and dispose of the Seven Deadly Sins. The Charred Council calls upon Fury to battle from the heights of heaven down through the depths of hell in a quest to restore humanity and prove that she is the most powerful of the Horsemen. As a mage, FURY relies on her whip and magic to restore the balance between good and evil. The expansive, Darksiders III game world is presented as an open-ended, living, free-form planet Earth that is dilapidated by war and decay, and overrun by nature. FURY will move back and forth between environments to uncover secrets while advancing the Darksiders III story.', 59.99, '2018-11-27'),
(50, 'S.T.AL.K.E.R. Shadow of Chernobyl', 'S.T.A.L.K.E.R.: Shadow of Chernobyl tells a story about survival in the Zone – a very dangerous place, where you fear not only the radiation, anomalies and deadly creatures, but other S.T.A.L.K.E.R.s, who have their own goals and wishes.', 15.99, '2007-03-20'),
(51, 'Dark Messiah of Might and Magic', 'Discover a new breed of Action-RPG game powered by an enhanced version of the Source™ Engine by Valve. Set in the Might & Magic® universe, players will experience ferocious combat in a dark and immersive fantasy environment. Swords, Stealth, Sorcery. Choose your way to kill.', 4.99, '2006-10-24'),
(52, 'Mario & Sonic at the Olympic Games Tokyo 2020', 'Celebrate the Olympic Games Tokyo 2020 with your favorite characters, loads of events, and so many ways to enjoy the party on your Nintendo Switch™!  Have a blast competing with your friends in 30+ action-packed 3D and classic 2D sports games—including new events for Tokyo 2020!', 59.99, '2019-11-05'),
(53, 'Donkey Kong Jr.', 'Donkey Kong Jr. must rescue his father by working his way through a series of four screens. Mario attempts to stop DK Jr. by releasing animals and putting obstacles in his way. When DK Jr. succeeds on the last screen, Donkey Kong is freed and kicks Mario into the distance, leaving him to run away and to an unknown fate; the game then begins again at a higher difficulty level', 35.99, '1982-08-21'),
(54, 'GreedFall', 'Engage in a core roleplaying experience, and forge the destiny of a new world seeping with magic, and filled with riches, lost secrets, and fantastic creatures. With diplomacy, deception and force, become part of a living, evolving world - influence its course and shape your story.', 49.99, '2019-09-10'),
(55, 'Divinity: Original Sin 2 - Definitive Edition', 'The eagerly anticipated sequel to the award-winning RPG. Gather your party. Master deep, tactical combat. Join up to 3 other players - but know that only one of you will have the chance to become a God.', 44.99, '2017-09-14'),
(56, 'Kingdoms of Amalur: Reckoning', 'The minds of New York Times bestselling author R.A. Salvatore, Spawn creator Todd McFarlane, and Elder Scrolls IV: Oblivion lead designer Ken Rolston have combined to create Kingdoms of Amalur: Reckoning, a new role-playing game set in a world worth saving. Build the character you\'ve always wanted and continuously evolve it to your style of play with the revolutionary Destiny system. Choose your path and battle through a master-crafted universe featuring some of the most intense, responsive, and customizable RPG combat ever.', 19.99, '2012-02-09');

-- --------------------------------------------------------

--
-- Table structure for table `gamecharacter`
--

CREATE TABLE `gamecharacter` (
  `characterId` int(11) NOT NULL,
  `firstName` varchar(45) DEFAULT NULL,
  `lastName` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gamecharacter`
--

INSERT INTO `gamecharacter` (`characterId`, `firstName`, `lastName`) VALUES
(2, 'Strelok', ''),
(3, 'Kain', ''),
(4, 'Raziel', ''),
(5, 'Sidorovich', ''),
(6, 'Barkeep', ''),
(7, 'C-Consciousness', ''),
(8, 'Sareth', ''),
(9, 'Xana', ''),
(10, 'Leanna', ''),
(11, 'Arantir', ''),
(12, 'Isaac', 'Clarke'),
(13, 'Nolan', 'Stross'),
(14, 'Nicole', 'Brennen'),
(15, 'Umah', ''),
(16, 'The Hylden Lord', ''),
(17, 'Lahabrea', ''),
(18, 'Emet-Selch', ''),
(19, 'Lightning', ''),
(20, 'The Warrior of Light', ''),
(21, 'Solaire of Astora', ''),
(22, 'Gwyn', 'Lord of Sunlight'),
(23, 'Great Grey Wolf Sif', ''),
(24, 'Wither', ''),
(25, 'Ender Dragon', ''),
(26, 'The Player', ''),
(27, 'Sonic', ''),
(28, 'Mario', ''),
(29, 'Bowser', ''),
(30, 'Void Dragon', ''),
(31, 'Arhu', ''),
(32, 'The White Witch', ''),
(33, 'Leandra', 'The Conduit'),
(34, 'Doomguy', ''),
(35, 'Olivia', 'Pierce'),
(36, 'Samuel', 'Hayden'),
(37, 'Molag', 'Bal'),
(38, 'Kassandra', ''),
(39, 'Nocturnal', ''),
(40, 'Imran', 'Zakhaev'),
(41, 'Captain Price', ''),
(42, 'John', 'MacTavish'),
(43, 'Khaled', 'Al-Asad'),
(44, 'Paul', 'Jackson'),
(45, 'Viktor', 'Zakhaev'),
(46, 'Lloyd', 'Irving'),
(47, 'Colette', 'Brunel'),
(48, 'Sheena', 'Fujibayashi'),
(49, 'Genis', 'Sage'),
(50, 'Zelos', 'Wilder'),
(51, 'Hop', ''),
(52, 'Gabriel', 'Angelos'),
(53, 'Isador', 'Akios'),
(54, 'Mordecai', 'Toth'),
(55, 'Sindri', 'Myr'),
(56, 'Orkamungus', ''),
(57, 'Lord Bael', ''),
(58, 'Tails', ''),
(59, 'Knuckles', ''),
(60, 'Eggman', ''),
(61, 'Murphy', 'Pendleton'),
(62, 'Anne Marie', 'Cunningham'),
(63, 'Carol', 'Pendleton'),
(64, 'Bobby', 'Ricks'),
(65, 'Lara', 'Croft'),
(66, 'James', 'Whitman'),
(67, 'Jonah', 'Maiava'),
(68, 'Conrad', 'Roth'),
(69, 'Himiko', ''),
(70, 'Vladimir', ''),
(71, 'Mathias', ''),
(72, 'Geralt of Rivia', ''),
(73, 'Ciri', 'Riannon'),
(74, 'Yennefer', ''),
(75, 'Triss', 'Merigold'),
(76, 'Dandelion', ''),
(77, 'The Wild Hunt', ''),
(78, 'Eredin', 'Bréacc Glas'),
(79, 'Link', ''),
(80, 'Zelda', ''),
(81, 'Ganon', ''),
(82, 'Mipha', ''),
(83, 'Farosh', ''),
(84, 'Tiz', 'Arrior'),
(85, 'Airy', ''),
(86, 'Ouroboros', ''),
(87, 'Edea', 'Lee'),
(88, 'Ringabel', ''),
(89, 'Agnès', 'Oblige'),
(90, 'Braev', 'Lee'),
(91, 'Alec', 'Ryder'),
(92, 'Scott', 'Ryder'),
(93, 'Sara', 'Ryder'),
(94, 'Liam', 'Kosta'),
(95, 'The Archon', ''),
(96, 'The Hive Mind', ''),
(97, 'Cortana', ''),
(98, 'John-117', ''),
(99, 'Sarah', 'Palmer'),
(100, 'Linda-058', ''),
(101, 'Kelly-087', ''),
(102, 'Jameson', 'Locke'),
(103, 'Quiet', ''),
(104, 'Venom Snake', ''),
(105, 'Skull Face', ''),
(106, 'Revolver', 'Ocelot'),
(107, 'Kazuhira', 'Miller'),
(108, 'Fury', ''),
(109, 'Seaven Deadly Sins', ''),
(110, 'Ulthane', ''),
(111, 'Streylok', ''),
(112, 'Luigi', ''),
(114, 'Peach', ''),
(115, 'Donkey Kong Jr.', ''),
(116, 'Siora', ''),
(117, 'Alyn', 'Shir'),
(118, 'Agarth', ''),
(119, 'Tirnoch', '');

-- --------------------------------------------------------

--
-- Table structure for table `gamecompany`
--

CREATE TABLE `gamecompany` (
  `gamecompanyId` int(11) NOT NULL,
  `companyname` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gamecompany`
--

INSERT INTO `gamecompany` (`gamecompanyId`, `companyname`) VALUES
(1, 'Crystal Dynamics'),
(2, 'Square Enix'),
(15, 'QLOC'),
(16, 'FromSoftware'),
(17, 'Mojang'),
(21, 'Reverie World Studios'),
(22, 'Larian Studios'),
(23, 'id software'),
(24, 'Bethesda Softworks'),
(25, 'ZeniMax Online Studios'),
(26, 'Studio Wildcard'),
(27, 'Infinity Ward'),
(28, 'Activision'),
(29, 'Namco Tales Studio'),
(30, 'Namco Bandai'),
(31, 'Game Freak'),
(32, 'Nintendo'),
(33, 'Nintendo EPD'),
(34, 'Relic Entertainment'),
(35, 'THQ'),
(36, 'The Creative Assembly'),
(37, 'Sega'),
(38, 'PagodaWest Games'),
(39, 'Cygames'),
(40, 'CD Projekt Red'),
(41, 'Vatra Games'),
(42, 'Konami'),
(43, 'BioWare'),
(44, 'Electronic Arts'),
(45, 'EA Redwood Shores'),
(46, '343 Industries'),
(47, 'Microsoft'),
(48, 'Kojima Productions'),
(49, 'Gunfire Games'),
(50, 'THQ Nordic'),
(51, 'GSC Game World'),
(52, 'Arkane Studios'),
(53, 'Ubisoft'),
(54, 'Spiders'),
(55, 'Focus Home Interactive'),
(56, 'Big Huge Games');

-- --------------------------------------------------------

--
-- Table structure for table `gamesordered`
--

CREATE TABLE `gamesordered` (
  `gameId` int(11) NOT NULL,
  `orderId` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `priceWhenOrdered` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gamesordered`
--

INSERT INTO `gamesordered` (`gameId`, `orderId`, `amount`, `priceWhenOrdered`) VALUES
(5, 14, 5, 6.99),
(5, 15, 5, 6.99),
(5, 16, 5, 6.99),
(6, 17, 1, 5.99),
(21, 17, 1, 39.99),
(22, 14, 3, 23.95),
(26, 4, 1, 39.99),
(29, 17, 4, 54.99),
(35, 3, 1, 12.99),
(35, 14, 3, 12.99),
(41, 17, 1, 19.99),
(46, 5, 3, 14.99),
(46, 17, 1, 14.99),
(56, 6, 2, 19.99);

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `genreId` int(11) NOT NULL,
  `genre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`genreId`, `genre`) VALUES
(1, 'Horror'),
(2, 'Fantasy'),
(3, 'RPG'),
(4, 'Dark Fantasy'),
(5, 'Thriller'),
(6, 'Vampire'),
(7, 'Adventure'),
(8, 'Action'),
(9, 'Casual'),
(10, 'Indie'),
(11, 'Survival'),
(12, 'Singleplayer'),
(13, 'Multiplayer'),
(15, 'Strategy'),
(16, 'Simulation'),
(17, 'MMORPG'),
(18, 'Free to play'),
(19, 'Sandbox'),
(22, 'Shooter'),
(23, 'First-Person'),
(24, 'Hack and Slash'),
(25, 'Female Protagonist'),
(26, 'Stealth'),
(27, 'Open World'),
(28, 'Story Rich'),
(29, 'Sci-Fi'),
(30, 'Space'),
(31, 'Third Person'),
(32, 'Puzzle Solving'),
(33, 'Card Game'),
(34, ''),
(35, 'Platformer'),
(36, 'Classic'),
(37, 'Real Time Strategy'),
(38, 'War'),
(39, 'Historical'),
(40, 'Tactical'),
(41, 'Anime'),
(42, 'JRPG'),
(43, 'Crafting'),
(44, 'Base-Building'),
(45, 'Turn-Based'),
(46, 'Early Access'),
(47, 'Party'),
(48, 'Sports');

-- --------------------------------------------------------

--
-- Table structure for table `genrespergame`
--

CREATE TABLE `genrespergame` (
  `genreId` int(11) NOT NULL,
  `gameId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genrespergame`
--

INSERT INTO `genrespergame` (`genreId`, `gameId`) VALUES
(1, 6),
(1, 21),
(1, 27),
(1, 40),
(1, 46),
(1, 50),
(2, 8),
(2, 26),
(2, 28),
(2, 31),
(2, 51),
(2, 54),
(2, 56),
(3, 8),
(3, 21),
(3, 26),
(3, 28),
(3, 29),
(3, 31),
(3, 32),
(3, 33),
(3, 42),
(3, 44),
(3, 45),
(3, 49),
(3, 54),
(3, 56),
(4, 5),
(4, 6),
(4, 21),
(6, 5),
(6, 6),
(7, 5),
(7, 6),
(7, 21),
(7, 22),
(7, 26),
(7, 29),
(7, 32),
(7, 33),
(7, 34),
(7, 37),
(7, 40),
(7, 41),
(7, 43),
(7, 44),
(7, 45),
(7, 51),
(7, 54),
(8, 5),
(8, 6),
(8, 27),
(8, 30),
(8, 34),
(8, 37),
(8, 41),
(8, 46),
(8, 47),
(8, 48),
(8, 49),
(8, 52),
(9, 32),
(9, 33),
(9, 38),
(9, 39),
(9, 52),
(10, 25),
(11, 25),
(11, 40),
(11, 50),
(12, 54),
(12, 56),
(13, 30),
(15, 26),
(15, 35),
(15, 36),
(16, 25),
(17, 8),
(17, 28),
(22, 27),
(22, 30),
(22, 45),
(22, 47),
(22, 50),
(23, 22),
(23, 28),
(23, 47),
(23, 51),
(24, 49),
(25, 41),
(25, 49),
(26, 48),
(27, 22),
(27, 29),
(27, 42),
(27, 43),
(27, 48),
(27, 54),
(27, 56),
(28, 5),
(28, 8),
(28, 26),
(28, 31),
(28, 42),
(28, 48),
(29, 35),
(29, 46),
(30, 25),
(30, 45),
(30, 46),
(30, 47),
(31, 8),
(31, 28),
(31, 32),
(31, 33),
(31, 34),
(31, 41),
(31, 43),
(31, 46),
(31, 56),
(32, 43),
(33, 38),
(33, 39),
(34, 38),
(35, 34),
(35, 37),
(36, 5),
(36, 37),
(37, 35),
(37, 36),
(38, 30),
(38, 36),
(39, 36),
(40, 35),
(41, 31),
(42, 31),
(43, 29),
(44, 22),
(44, 29),
(45, 26),
(46, 25),
(47, 52),
(48, 52);

-- --------------------------------------------------------

--
-- Table structure for table `publishedby`
--

CREATE TABLE `publishedby` (
  `gamecompanyId` int(11) NOT NULL,
  `gameId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `publishedby`
--

INSERT INTO `publishedby` (`gamecompanyId`, `gameId`) VALUES
(2, 5),
(2, 6),
(2, 8),
(2, 41),
(2, 44),
(16, 21),
(17, 22),
(21, 25),
(22, 26),
(22, 55),
(24, 27),
(24, 28),
(26, 29),
(28, 30),
(30, 31),
(32, 32),
(32, 33),
(32, 34),
(32, 43),
(32, 53),
(35, 35),
(35, 50),
(37, 36),
(37, 37),
(37, 52),
(39, 38),
(40, 39),
(40, 42),
(42, 40),
(42, 48),
(44, 45),
(44, 46),
(44, 56),
(47, 47),
(50, 49),
(53, 51),
(55, 54);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `reviewId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `gameId` int(11) NOT NULL,
  `review` varchar(400) NOT NULL,
  `score` int(11) NOT NULL,
  `reviewDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`reviewId`, `userId`, `gameId`, `review`, `score`, `reviewDate`) VALUES
(4, 5, 46, 'I Am Your Father! Luke, Join me.', 5, '2019-08-14'),
(5, 5, 49, 'I Am Your Father! Luke, Join me.', 5, '2019-08-16'),
(6, 5, 47, 'I Am Your Father! Luke, Join me.', 5, '2019-08-01'),
(7, 5, 48, 'I Am Your Father! Luke, Join me.', 5, '2019-10-01'),
(8, 6, 46, 'I\'m Commander Shepard, and this is my favorite game on GameComp.', 5, '2019-06-06'),
(9, 6, 48, 'I\'m Commander Shepard, and this is my favorite game on GameComp.', 5, '2019-07-27'),
(10, 6, 50, 'I\'m Commander Shepard, and this is my favorite game on GameComp.', 4, '2019-09-18'),
(11, 8, 26, 'Nice story but takes ages  to play through the game.', 3, '2019-10-13'),
(12, 2, 5, 'This is a game.', 3, '2019-10-19'),
(13, 2, 46, 'Review.Review.Review.Review\'Review.Review.Review\r\n.Review', 1, '2019-10-19');

-- --------------------------------------------------------

--
-- Table structure for table `siteuser`
--

CREATE TABLE `siteuser` (
  `userId` int(11) NOT NULL,
  `username` varchar(12) NOT NULL,
  `email` varchar(45) NOT NULL,
  `userPassword` varchar(45) NOT NULL,
  `hashed` tinyint(4) DEFAULT '0',
  `reviewer` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siteuser`
--

INSERT INTO `siteuser` (`userId`, `username`, `email`, `userPassword`, `hashed`, `reviewer`) VALUES
(2, 'admin', 'admin', '1234', 0, 0),
(3, 'yoshi!', 'yoshi@gmail.com', 'y3s', 0, 0),
(4, 'projared', 'projared@gmail.com', 'y3s', 0, 1),
(5, 'DarthVader', 'no@gmail.com', 'starWars', 0, 1),
(6, 'Com Shepard', 'shepard@hotmail.com', 'comShepard', 0, 1),
(7, 'Io', 'io@gmail.com', '1234', 0, 0),
(8, 'MattRad', 'radicalmatt@gmail.com', 'radicalm4t', 0, 1),
(9, 'test', 'test@test.com', 'test', 0, 1),
(10, 'royalshrug', 'shrug@telenet.be', 'shrugs', 0, 0),
(11, 'Flunk Venue', 'flunkV@gmail.com', 'flunkit', 0, 0),
(12, 'transfDesti', 'transferdestiny@gmail.com', 'transfered', 0, 0),
(13, 'sacramento', 'sacraDavis@gmail.com', 'sacramentonavis', 0, 1),
(14, 'wurlwind', 'wurlwind@gmail.com', '$2y$10$ZsXCw2kRdz3uUM20xvPZF.rd//NZxZLOihLPYm', 1, 0),
(15, 'lima', 'lima@gmail.com', 'narmora', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `userorder`
--

CREATE TABLE `userorder` (
  `orderId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `orderDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userorder`
--

INSERT INTO `userorder` (`orderId`, `userId`, `orderDate`) VALUES
(3, 5, '2019-10-01'),
(4, 8, '2019-10-11'),
(5, 7, '2019-08-08'),
(6, 10, '2019-07-11'),
(14, 2, '2019-10-18'),
(15, 2, '2019-10-18'),
(16, 2, '2019-10-18'),
(17, 2, '2019-10-20');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `userId` int(11) NOT NULL,
  `gameId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`userId`, `gameId`) VALUES
(5, 41),
(5, 46),
(7, 26),
(7, 35),
(7, 47),
(8, 34),
(8, 35),
(8, 41),
(8, 47),
(8, 50),
(10, 26),
(10, 46),
(10, 50);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `characterrole`
--
ALTER TABLE `characterrole`
  ADD PRIMARY KEY (`roleId`);

--
-- Indexes for table `characterroleingame`
--
ALTER TABLE `characterroleingame`
  ADD PRIMARY KEY (`gameId`,`characterId`,`roleId`),
  ADD KEY `characterId` (`characterId`),
  ADD KEY `roleId` (`roleId`);

--
-- Indexes for table `developedby`
--
ALTER TABLE `developedby`
  ADD PRIMARY KEY (`gamecompanyId`,`gameId`),
  ADD KEY `gameId` (`gameId`);

--
-- Indexes for table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`gameId`);

--
-- Indexes for table `gamecharacter`
--
ALTER TABLE `gamecharacter`
  ADD PRIMARY KEY (`characterId`);

--
-- Indexes for table `gamecompany`
--
ALTER TABLE `gamecompany`
  ADD PRIMARY KEY (`gamecompanyId`);

--
-- Indexes for table `gamesordered`
--
ALTER TABLE `gamesordered`
  ADD PRIMARY KEY (`gameId`,`orderId`),
  ADD KEY `gamesordered_ibfk_2` (`orderId`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`genreId`);

--
-- Indexes for table `genrespergame`
--
ALTER TABLE `genrespergame`
  ADD PRIMARY KEY (`genreId`,`gameId`),
  ADD KEY `gameId` (`gameId`);

--
-- Indexes for table `publishedby`
--
ALTER TABLE `publishedby`
  ADD PRIMARY KEY (`gamecompanyId`,`gameId`),
  ADD KEY `gameId` (`gameId`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`reviewId`,`userId`,`gameId`),
  ADD KEY `gameId` (`gameId`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `siteuser`
--
ALTER TABLE `siteuser`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `userorder`
--
ALTER TABLE `userorder`
  ADD PRIMARY KEY (`orderId`,`userId`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`userId`,`gameId`),
  ADD KEY `gameId` (`gameId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `characterrole`
--
ALTER TABLE `characterrole`
  MODIFY `roleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `game`
--
ALTER TABLE `game`
  MODIFY `gameId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `gamecharacter`
--
ALTER TABLE `gamecharacter`
  MODIFY `characterId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `gamecompany`
--
ALTER TABLE `gamecompany`
  MODIFY `gamecompanyId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `genreId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `reviewId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `siteuser`
--
ALTER TABLE `siteuser`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `userorder`
--
ALTER TABLE `userorder`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `characterroleingame`
--
ALTER TABLE `characterroleingame`
  ADD CONSTRAINT `characterroleingame_ibfk_1` FOREIGN KEY (`characterId`) REFERENCES `gamecharacter` (`characterId`),
  ADD CONSTRAINT `characterroleingame_ibfk_2` FOREIGN KEY (`gameId`) REFERENCES `game` (`gameId`),
  ADD CONSTRAINT `characterroleingame_ibfk_3` FOREIGN KEY (`roleId`) REFERENCES `characterrole` (`roleId`);

--
-- Constraints for table `developedby`
--
ALTER TABLE `developedby`
  ADD CONSTRAINT `developedby_ibfk_1` FOREIGN KEY (`gameId`) REFERENCES `game` (`gameId`),
  ADD CONSTRAINT `developedby_ibfk_2` FOREIGN KEY (`gamecompanyId`) REFERENCES `gamecompany` (`gamecompanyId`);

--
-- Constraints for table `gamesordered`
--
ALTER TABLE `gamesordered`
  ADD CONSTRAINT `gamesordered_ibfk_1` FOREIGN KEY (`gameId`) REFERENCES `game` (`gameId`),
  ADD CONSTRAINT `gamesordered_ibfk_2` FOREIGN KEY (`orderId`) REFERENCES `userorder` (`orderId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `genrespergame`
--
ALTER TABLE `genrespergame`
  ADD CONSTRAINT `genrespergame_ibfk_1` FOREIGN KEY (`gameId`) REFERENCES `game` (`gameId`),
  ADD CONSTRAINT `genrespergame_ibfk_2` FOREIGN KEY (`genreId`) REFERENCES `genre` (`genreId`);

--
-- Constraints for table `publishedby`
--
ALTER TABLE `publishedby`
  ADD CONSTRAINT `publishedby_ibfk_1` FOREIGN KEY (`gameId`) REFERENCES `game` (`gameId`),
  ADD CONSTRAINT `publishedby_ibfk_2` FOREIGN KEY (`gamecompanyId`) REFERENCES `gamecompany` (`gamecompanyId`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`gameId`) REFERENCES `game` (`gameId`),
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `siteuser` (`userId`);

--
-- Constraints for table `userorder`
--
ALTER TABLE `userorder`
  ADD CONSTRAINT `userorder_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `siteuser` (`userId`);

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`gameId`) REFERENCES `game` (`gameId`),
  ADD CONSTRAINT `wishlist_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `siteuser` (`userId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
