-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2023 at 06:35 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sportswh`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryId` int(11) NOT NULL,
  `categoryName` varchar(50) NOT NULL,
  `categoryCode` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryId`, `categoryName`, `categoryCode`) VALUES
(1, 'Shoes', 'SHO'),
(2, 'Helmets', 'HEL'),
(3, 'Pants', 'PAN'),
(4, 'Tops', 'TOP'),
(5, 'Balls', 'BAL'),
(6, 'Equipment', 'EQU'),
(7, 'Training Gear', 'TRA'),
(171, 'Tech', 'TEC');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `itemId` int(11) NOT NULL,
  `itemName` varchar(150) NOT NULL,
  `photo` varchar(250) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `salePrice` decimal(10,2) DEFAULT NULL,
  `description` varchar(2000) DEFAULT NULL,
  `featured` tinyint(1) NOT NULL,
  `categoryId` int(11) NOT NULL,
  `productCode` varchar(20) DEFAULT NULL,
  `brand` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`itemId`, `itemName`, `photo`, `price`, `salePrice`, `description`, `featured`, `categoryId`, `productCode`, `brand`) VALUES
(1, 'Adidas Euro16 Top Soccer Ball', 'soccerBall.webp', 46.00, 23.00, 'Adidas Performance Euro 16 Official Match Soccer Ball, Size 5, White/Bright Blue/Solar    ', 0, 5, 'BALL-PUMA-0001', 'New Balance'),
(2, 'Pro-tec Classic Skate Helmet', 'skateHelmet.webp', 70.00, 0.00, 'Get the classic Pro-Tec look with proven protection. Shop a wide range of skate, bmx & water helmets online at Pro-Tec Australia.  ', 1, 2, 'HEL-TROY-0002', 'Arai'),
(3, 'Nike sport 600ml Water Bottle', 'waterBottle.webp', 17.00, 10.00, 'Rehydrate your body and revive your day with the Nike Sport 600ml Water Bottle. The asymmetrical, one-hand design provides easy grasping while the leakproof valve to prevent leakage.  ', 0, 6, 'EQU-NIKE-0003', 'Puma'),
(4, 'String ArmaPlus Boxing Gloves', 'boxingGloves.webp', 79.00, 0.00, 'Get the perfect hand feel with the anatomically designed square shouldered mould to help you feel every shot land. ', 0, 7, 'TRA-UNDE-0004', 'Reebok'),
(5, 'Asics Gel Lethal Tigreor 8 IT Men\'s', 'footyBoots.webp', 160.00, 0.00, 'The GEL-Lethal Tigreor 8 IT is an advanced lightweight football boot designed for high performance and speed. This boot features HG10mm technology.   ', 0, 1, 'SHO-PUMA-0005', 'Adidas'),
(6, 'Asics GEL Kayano 27 Kids Running Shoes', 'asics-patriot-13-neutral-running-shoe-men.webp', 179.00, 0.00, 'Asics refine running for the next generation of young athletes with the Asics GEL Kayano 27. The exceptional support and comfort of the Kayano return in a lighter even more comfortable runner thanks to the two-piece, Flightfoam Propel midsole.     ', 0, 1, 'SHO-ADID-0006', 'Asics'),
(7, 'Adidas must have stripes tee', 'blackTop.webp', 34.00, 0.00, 'Built for busy training schedules, the adidas Boys Aeroready 3-Stripes Tee is a must have for budding young athletes. ', 0, 4, 'TOP-NIKE-0007', 'Reebok'),
(8, 'Nike girls Futura Air tee', 'whitePinkTop.webp', 29.00, 24.00, 'Your child will be motivated to perform her best at training in the Nike Girls Futura Air Tee. The comfortable, non-restrictive crew neckline offers durability, while the iconic Nike Air logo is featured across the front and on the sleeve to highlight her sporty vibe.   ', 0, 4, 'TOP-PUMA-0008', 'Reebok'),
(9, 'Adidas 3 stripes flare pants', 'tracksuit.webp', 69.00, 55.00, 'Kick it old school this winter when you step out in the adidas Women\'s Tricot 3-Stripes Flare Pants. Ideal for post-gym wear, the stretchy tricot fabric allows you to move with ease as you recover from your big session.  ', 0, 3, 'PAN-ADID-0009', 'New Balance'),
(105, 'Precision Tennis Racquet', 'TennisRacquet.webp', 33.00, 12.00, 'Experience optimal performance on the court with our high-quality Tennis Racquet. Engineered for power and precision, it features a lightweight design, advanced grip technology, and superior control. Elevate your game and dominate the competition with this top-notch racquet.         ', 1, 7, 'TRA-REEB-0105', 'Nike'),
(106, 'Athletes Training Weights', 'weights.webp', 33.00, 12.00, 'Enhance your strength training routine with our Sports Weights. Designed for athletes of all levels, these durable and adjustable weights provide targeted resistance for building muscle and improving endurance. Elevate your fitness game and reach new levels of strength and performance with our premium Sports Weights.', 0, 6, 'EQU-REEB-0106', 'Under Armour'),
(107, 'High-quality JBasketball', 'basketball.webp', 55.00, 25.00, 'Get ready to hit the court with our top-of-the-line Basketball. Designed for precision and durability, this high-quality basketball features a superior grip, excellent bounce, and optimal control. Whether you\'re playing indoors or outdoors, our basketball ensures a great game every time. Elevate your basketball skills and make every shot count with our exceptional basketball. ', 0, 5, 'BALL-REEB-0107', 'Nike'),
(109, 'Running Shoe', '877748950_1_720x928.webp', 178.00, 0.00, 'Experience the ultimate performance and comfort with our high-performance Running Shoes. Designed with advanced cushioning, breathable materials, and superior traction, these shoes provide optimal support and responsiveness for your runs. Whether you\'re a beginner or a seasoned runner, our Running Shoes will help you reach new milestones. Step into the perfect blend of style and functionality with our top-notch running shoes     ', 0, 1, 'SHO-NIKE-0109', 'Reebok'),
(114, 'New Balance Women\'s 411v2 in Black/Noir Mesh', 'new-balance-574-core-shoes-black.webp', 90.00, 0.00, 'Elevate your athletic style with the New Balance Women\'s 411v2 in Black/Noir Mesh. These sleek and versatile shoes feature a breathable mesh upper, providing maximum comfort and airflow. With a supportive cushioning system and a durable outsole, they are perfect for all-day wear and various activities.   ', 0, 1, 'SHO-ASIC-0114', 'Reebok'),
(115, 'Nike Air Max 90 Terrascape Wheat Gold Blue', 'nike-air-vapormax-plus-mens-shoes-blue.webp', 156.00, 0.00, 'Find some fresh style for your season with this new version of the iconic silhouette from Nike. The Air Max 90 Terrascape has been constructed using leather and mesh on its upper, ensuring that you\'ll not only look good but remain comfortable all day long too! You\'ll also benefit from an air-unit combined with recyclable Crater Foam midsole cushioning - providing unparalleled support where ever your feet decide to take you.', 0, 1, 'SHO-PUMA-0115', 'Puma'),
(117, 'Nike Dunk Low Denim Light Orewood Brown', 'nike-dunk-low-denim-light-orewood-brown.webp', 80.00, 0.00, 'Introducing the Nike Dunk Low Denim Light Orewood Brown. These sneakers feature a stylish denim upper in a light orewood brown colorway, providing a versatile and fashion-forward look. With the iconic Dunk silhouette, these shoes offer both style and comfort.', 0, 1, 'SHO-PUMA-0117', 'Reebok'),
(118, 'Nike Air Pegasus 89 - Wolf Grey - Mens', 'nike-air-pegasus-89-wolf-grey-mens.webp', 97.00, 0.00, 'Step up your sneaker game with the Nike Air Pegasus 89 in Wolf Grey for men. These iconic sneakers feature a sleek and timeless design, combining a wolf grey color palette with premium materials for a stylish and versatile look. With the Air Pegasus cushioning technology, these shoes provide exceptional comfort and support for all-day wear. ', 0, 1, 'SHO-NEW -0118', 'Puma'),
(120, 'Nike Max Dawn Trainers - White', 'nike-air-max-dawn-mens-shoe-white.webp', 88.00, 0.00, 'These sleek and modern trainers feature a clean white colorway, offering a fresh and versatile look. With a lightweight and breathable upper, these trainers provide all-day comfort and support. The Max Air cushioning technology in the heel ensures optimal impact absorption and a smooth stride. Whether you\'re hitting the gym or running errands, the Nike Max Dawn Trainers in White deliver both style and performance for your active lifestyle.', 1, 1, 'SHO-ASIC-0120', 'Adidas'),
(121, 'Nike Air Max Sc Trainers In White & Red', 'nike-air-max-sc-trainers-in-white-red.webp', 110.00, 0.00, 'These sneakers feature a clean white upper with vibrant red accents, creating a bold and eye-catching look. With a combination of breathable mesh and durable synthetic overlays, these trainers offer both comfort and support. The iconic Air Max cushioning in the heel provides excellent impact protection and a comfortable ride. Whether you\'re hitting the streets or going for a workout, the Nike Air Max SC Trainers in White & Red will elevate your style and performance to the next level. ', 0, 1, 'SHO-ADID-0121', 'Reebok'),
(122, 'Nike Dunk Low Black White (PS)', 'nike-dunk-low-younger-kids-shoes-white.webp', 77.00, 0.00, 'Mid-80s hoops icon returns with super-durable construction and OG colours. Add in rubber sole for traction and this one\'s an easy score for young sneakerheads.', 0, 1, 'SHO-ASIC-0122', 'Nike'),
(123, 'Nike Air Max Bolt Triple Black Shoes', 'nike-air-max-bolt-mens-shoe-black.webp', 66.00, 0.00, 'Take your running style up a notch with the bold and stylish design of the Men\'s Nike Air Max Bolt casual sneakers from Footy.com! An EVA midsole boosts comfort while synthetic leather reinforcements stitched to mesh offer durability without sacrificing breathability, making them ideal for everyday wear no matter where you go. With an iconic its huge visible zoom unit on it’s heel providing superior cushioning, these trainers will take any look up a level – get yours now at Footy.com!', 0, 1, 'SHO-REEB-0123', 'Puma'),
(124, 'Puma Disc OG Ronnie Fieg COA Coral Salmon', 'puma-x-rf-disc-coa-1.webp', 290.00, 0.00, 'Introducing the Puma Disc OG Ronnie Fieg COA in Coral Salmon. These sneakers combine classic design with a modern twist, featuring a vibrant coral salmon colorway that is sure to turn heads. The Disc closure system provides a secure and personalized fit, while the premium materials ensure durability and comfort. With a nod to retro aesthetics and Ronnie Fieg\'s signature touch, these sneakers offer a unique and stylish look. ', 0, 1, 'SHO-NEW -0124', 'New Balance'),
(125, 'Puma RS-XL - Red', 'puma-rs-xl-red.webp', 87.00, 0.00, 'With a nod to retro aesthetics and Ronnie Fieg\'s signature touch, these sneakers offer a unique and stylish look. Step up your sneaker game with the Puma Disc OG Ronnie Fieg COA in Coral Salmon and make a bold statement with every step.', 0, 1, 'SHO-NIKE-0125', 'Asics'),
(127, 'PUMA RS Fast Caliente Shoes', 'puma-rs-fast-caliente-shoes.webp', 73.00, 0.00, 'Whether you\'re hitting the gym, running errands, or simply want to make a fashion statement, the PUMA RS Fast Caliente Shoes are the perfect choice for those who crave a combination of style, comfort, and performance. ', 1, 1, 'SHO-PUMA-0127', 'Adidas'),
(128, 'Puma Rider FV LTH Sneakers', 'puma-rider-fv-lth-sneakers.webp', 55.00, 0.00, 'Seize the days in true style with these stylish black and white Puma Rider Fv Lth sneakers. As part of the latest addition to our leisure-inspired collection, this sneaker combines mesh upper detailing providing comfort without compromising on its sleek design. With signature branding on the heel and tongue it is perfect everyday footwear look that will last you through all your adventures! Visit FOOTY today to find out more about these must have shoes size 10', 0, 1, 'SHO-ADID-0128', 'Adidas'),
(129, 'Puma Puma R22', 'puma-puma-r22-mens-shoes-trainers-in-black.webp', 66.00, 45.00, 'The RS Fast silhouette offers a comfortable fit and optimal support for your daily activities. Whether you\'re hitting the gym, running errands, or simply want to make a fashion statement, the PUMA RS Fast Caliente Shoes are the perfect choice for those who crave a combination of style, comfort, and performance.', 0, 1, 'SHO-PUMA-0129', 'Adidas'),
(130, 'PUMA Future Rider Play On Sneakers, Ultra Orange', 'puma-rider-mens-shoes-trainers-in-orange.webp', 84.00, 0.00, 'Get the game going with our Rider Play On Trainer sneakers. They are designed for pared-down performance, featuring a comfortable nylon, suede and leather upper as well as shock absorbing Federbein outsole to keep you pounding the streets in style and comfort. Available now from FOOTY.COM in ultra orange/white size 10 only!', 0, 1, 'SHO-UNDE-0130', 'Puma'),
(131, 'Nike Waffle Debut Men\'s Shoes - White', 'nike-waffle-debut-mens-shoes-white.webp', 99.00, 0.00, 'Step out in style with the Nike Men\'s Waffle Debut trainers. These retro-inspired sneaks feature an easy to wear suede and nylon upper, plus rubber waffle details for extra traction and durability. Pull on tab, low cut collar ensure a comfy fit all day long; finished off by perforations add thoughtful aesthetics and classic lacing system delivering you true heritage look that can be styled up or down any time!', 0, 1, 'SHO-NEW -0131', 'Reebok'),
(132, 'Nike Dunk Low Denim Industrial Blue', 'nike-dunk-low-denim-industrial-blue.webp', 123.00, 0.00, 'The upper features a denim construction in a striking industrial blue color, providing a unique and contemporary look. With a low-top design and cushioned support, these shoes offer both style and comfort. The iconic Dunk outsole delivers excellent traction and durability. Whether you\'re a sneaker enthusiast or a fashion-forward individual, the Nike Dunk Low Denim in Industrial Blue is the perfect choice to elevate your streetwear game with a touch of denim sophistication.', 0, 1, 'SHO-REEB-0132', 'Puma'),
(134, 'Nike Air Vapormax Plus - Blue', 'nike-air-vapormax-plus-mens-shoes-blue.webp', 211.00, 0.00, 'The Nike Air VaporMax Plus features a floating cage, padded upper and heel logo. It adds revolutionary VaporMax Air technology to ramp up the comfort.', 0, 1, 'SHO-NIKE-0134', 'Under Armour'),
(135, 'Nike Dunk Low Active Fuchsia (GS)', 'nike-dunk-low-active-fuchsia-gs.webp', 80.00, 0.00, 'The durable construction ensures long-lasting performance, while the cushioned midsole provides all-day comfort. Whether you\'re hitting the skate park or exploring the city streets, the Nike Dunk Low Active Fuchsia (GS) is a stylish and reliable choice for sneaker enthusiasts of all ages. Step up your sneaker game with this eye-catching pair and stand out from the crowd.', 0, 1, 'SHO-UNDE-0135', 'Puma'),
(136, 'Nike Air Jordan 12 Retro PSNY NYC Shoes', 'nike-air-jordan-12-retro-psny-nyc.webp', 444.00, 0.00, 'Upgrade your wardrobe with a stylish and timeless pair. The Air Jordan 12 Retro designed by menswear brand Public School NY continues to stand out today as one of the coveted “City Pack” collections released in 2017. This colorway features an all-over tan suede look, aligning itself perfectly with NYC vibes while also having its own unique style within other Paris or Milan designs from this collection. Look sharp both on court and off using these classic shoes complete with tonal looks that feature a special hangtag detailing courtesy of none other than PSNY for authenticity guaranteed shoe hype status - get yours now!', 0, 1, 'SHO-UNDE-0136', 'Puma'),
(137, 'Nike Go Flyease Trainers Black White', 'nike-go-flyease-easy-on-off-shoes-black.webp', 111.00, 0.00, 'The sleek black and white colorway adds a touch of modern style to these trainers. With a comfortable and supportive fit, these shoes are perfect for everyday wear or light workouts. Whether you\'re on the go or looking for a hassle-free footwear option, the Nike Go Flyease Trainers in Black and White provide a blend of functionality and contemporary design.', 0, 1, 'SHO-NEW -0137', 'Reebok'),
(138, 'Nike Air Force AF 1 Low Wheat', 'nike-air-force-1-07-wb-mens-shoe-brown.webp', 132.00, 0.00, 'The iconic and classic design of the Nike AF1 has been remastered in a wheat brown colorway, perfect for autumn/winter! Constructed with full-grain leather uppers to provide comfortable fit, whilst also featuring an encapsulated air sole unit midsoles for lightweight cushioning complete its ride. This edition is finished off with black branding tags on both tongues and sides - style it up now at FOOTY.COM', 0, 1, 'SHO-REEB-0138', 'Asics'),
(139, 'Vans x Gallery Dept. Vault Old Skool LX', 'vans-x-gallery-dept-vault-old-skool-lx.webp', 66.00, 0.00, 'Vans x Gallery Dept. Vault Old Skool LX', 0, 1, 'SHO-UNDE-0139', 'Adidas'),
(140, 'Vans Sk8-Hi Tapered DIY - Blue Shoes', 'vans-sk8-hi-tapered-diy-blue.webp', 33.00, 0.00, 'Vans Sk8-Hi Tapered DIY - Blue Shoes', 0, 1, 'SHO-ADID-0140', 'Adidas'),
(141, 'vans-vault-ua-knu-skool-vr3-lx-imran-potato-leopard-golden-glow', 'vans-vault-ua-knu-skool-vr3-lx-imran-potato-leopard-golden-glow.webp', 22.00, 0.00, 'vans-vault-ua-knu-skool-vr3-lx-imran-potato-leopard-golden-glow', 0, 1, 'SHO-REEB-0141', 'Asics'),
(142, 'Vans SK8 Mid JJJound Shoes', 'vans-sk8-mid-jjjound.webp', 100.00, 70.00, 'Step up your street style this season with the new JJJJound x Vans Sk8-Mid “Green”. Featuring a classic white jazz stripe and signature minimalistic styling, these green suede skate shoes is everything you need to complete any urban look! Co-produced by Justin Saunders of JJJJounf, these eye catching sneakers are perfect for anyone looking to be ahead in terms of fashion game. Get yours now while stocks last!', 0, 1, 'SHO-ADID-0142', 'Nike'),
(143, 'Vans Old Skool - Pink', 'vans-old-skool-grade-school-shoes.webp', 50.00, 0.00, 'Make a stylish upgrade to your kids\' wardrobe with the classic and iconic Kids Old Skool from Vans. This wardobe staple is constructed with durable suede and canvas uppers in a vibrant powder pink colorway, making it perfect for any occasion. It also comes equipped with re-enforced toe caps, supportive padded collars, signature rubber waffle outsoles as well as the famous Sidestripe that has become an instantly recognizable hallmark of the brand over time. Available in sizes 8 – 14 years they\'re sure to be kept looking fresh all day long!', 0, 1, 'SHO-NEW -0143', 'Puma'),
(144, 'Vans Womens Sk8-low Trainers - Pink', 'vans-womens-sk8-low-trainers-pink.webp', 44.00, 0.00, 'Vans Womens Sk8-low Trainers - Pink', 0, 1, 'SHO-REEB-0144', 'New Balance'),
(145, 'RJAYS GRID MATT BLACK HELMET', 'RJays-Grid-Matt-Black-Helmet-300x300.webp', 122.00, 0.00, 'RJAYS GRID MATT BLACK HELMET', 0, 2, 'HEL-TROY-0145', 'AGV'),
(146, 'SMK GULLWING WHITE HELMET', 'smk-gullwing-white-helmet.webp', 156.00, 0.00, 'One of the new entries of the SMK 2018 collection is the Stellar integral helmet made of materials the latest generation, offering safety and comfort, and for this reason it can be used both in city traffic and for medium or long-distance tourism. The outer shell is printed in two sizes in EIRT (Energy Impact Resistant Thermoplastic), a thermoplastic resin that is particularly resistant to shocks. It has an aerodynamic and aggressive shape, characterized by a rear spoiler that allows the air to slip on its surface for the benefit of the silence of the helmet.', 0, 2, 'HEL-TROY-0146', 'Bell'),
(147, 'ORIGINE PRIMO CLASSIC MOTORCYCLE HELMET - MATTE WHITE/STRIPES', 'ORI202541028502502XS-4_1024x1024@2x.webp', 222.00, 0.00, 'Primo is the classic jet helmet that gives a feeling of safety and a retro 50s styling at the same time. The different graphics remind the \"old style\" riding, adapted to the dynamic of today\'s world.', 0, 2, 'HEL-LAZE-0147', 'Arai'),
(148, 'NOLAN N-21V CLASSIC FLAT BLACK HELMET', 'N21V110_1024x1024@2x.webp', 232.00, 0.00, 'N21V is enriched with a wide molded visor offering excellent face coverage, so changing into N21 VISOR, a product ideal for both city and out-of-town touring.\r\nThe VPS (Vision Protection System) sunscreen vanishes into the shell, giving it a unique and compact look.', 0, 2, 'HEL-SCHW-0148', 'Shoei'),
(149, 'SHARK SPARTAN CARBON SKIN RED HELMET', 'HE5000EDRRS-2_1024x1024@2x.webp', 543.00, 0.00, 'The Shark Spartan Carbon is the new iteration in the premium street segment from Shark. The Spartan Carbon has a luxurious plush microfiber liner which feels extremely comfortable on your skin. The cheek pads wrap around the jawline blocking out wind noise and enhancing comfort. The large front and upper vent intakes and the double spoiler with incorporated air extractors are optimized for aerodynamics and internal cooling. The visor is equipped with the auto-seal system. This flattens the visor onto the helmet, offering better soundproofing and seals the helmet against water and cold.', 0, 2, 'HEL-KASK-0149', 'AGV'),
(150, 'NOLAN N-21V DOLCE VITA BLACK/GOLD HELMET', 'N21V2100_1024x1024@2x.webp', 222.00, 0.00, 'N21V is enriched with a wide molded visor offering excellent face coverage, so changing into N21 VISOR, a product ideal for both city and out-of-town touring.\r\nThe VPS (Vision Protection System) sunscreen vanishes into the shell, giving it a unique and compact look.\r\nThe streamlined shape of the shell is inspired by the timeless vintage look, while presenting clean and modern lines.', 0, 2, 'HEL-GIRO-0150', 'Shoei'),
(151, 'ORIGINE SPRINT MOTORCYCLE HELMET - CAMO MATTE', 'ORI202537020101402XS_1024x1024@2x.webp', 122.00, 0.00, 'The new Sprint jet helmet is a reinterpretation of a timeless classic with an added flip down visor.\r\n\r\nAn icon of style and safety, the Sprint helmet is constructed of high impact thermoplastic material certified in accordance with ECE 22.05 safety standards.\r\n\r\nAttention to details such as improved inner liner fit and finish have beem created according to requests from the market.\r\n\r\nInterior liners are removable and washable (cheek pads).\r\n\r\nMicrometric chin strap retention system.', 0, 2, 'HEL-SCHW-0151', 'AGV'),
(153, 'NOLAN N-21V \'AVANT-GARDE\' CORSA RED HELMET', 'N21V279-3_1024x1024@2x.webp', 200.00, 0.00, 'N21V is enriched with a wide molded visor offering excellent face coverage, so changing into N21 VISOR, a product ideal for both city and out-of-town touring.\r\nThe VPS (Vision Protection System) sunscreen vanishes into the shell, giving it a unique and compact look.\r\nThe streamlined shape of the shell is inspired by the timeless vintage look, while presenting clean and modern lines.', 0, 2, 'HEL-FOX -0153', 'Nolan'),
(154, 'HJC I50 VANISH MC-64HSF HELMET', '1121707_1024x1024@2x.webp', 200.00, 0.00, 'The HJC i50 helmet uses SLID (Sliding Layer Impact Distribution) technology that helps to redirect energy-exerted impacts on the brain by reducing rotational acceleration caused by oblique impacts. SLID is located in the helmet interior and is an advanced gel material with flowable properties. This allows the layer to counter the rotational acceleration, like a slip, thus dispersing the impact when a multi-directional impact occurs. The HJC i50 Helmet also sports a longer visor, protecting your eyes from the sun and face from roost.', 0, 2, 'HEL-FOX -0154', 'AGV'),
(155, 'SMK STELLAR SAMURAI BLACK/GREY/BLUE HELMET', '1122143_1024x1024@2x.webp', 100.00, 0.00, 'One of the new entries of the SMK 2018 collection is the Stellar integral helmet made of materials the latest generation, offering safety and comfort, and for this reason it can be used both in city traffic and for medium or long-distance tourism. The outer shell is printed in two sizes in EIRT (Energy Impact Resistant Thermoplastic), a thermoplastic resin that is particularly resistant to shocks. It has an aerodynamic and aggressive shape, characterized by a rear spoiler that allows the air to slip on its surface for the benefit of the silence of the helmet.', 0, 2, 'HEL-SCHW-0155', 'Arai'),
(156, 'SMK HYBRID EVO WHITE HELMET', '1122422_1024x1024@2x.webp', 230.00, 0.00, 'SMK Hybrid Evo is a modular helmet with a unique combination of five helmet versions in one, for multitasking riders. With dual P/J homologation SMK Hybrid Evo provides protection and safety with both chin guard installed - as a full face helmet and chin guard removed - as an open face helmet.\r\n\r\nAn efficient ventilation system with multiple air vents and air exhausts is providing maximum comfort to the rider, even on long journeys and in extreme weather conditions. The extra wide visor provides the rider with an excellent view of the road.', 0, 2, 'HEL-TROY-0156', 'Nolan'),
(158, 'Nike Tape Track Pants', 'jd_ANZ0073647_a.webp', 66.00, 0.00, 'Regular fit\r\nMade from super soft and comfy polyester\r\nElasticated waistband with adjustable drawstrings\r\nStretchy, ribbed cuffs to show off your fave kicks\r\nSide pockets for the essentials\r\nWhite colourway with Nike details throughout ', 0, 3, 'PAN-REEB-0158', 'Under Armour'),
(164, 'Nike Air Max Track Pants', 'jd_FB1436-010_C_0001_a.webp', 22.00, 0.00, 'Heritage style meets streetwear with these men\'s Air Max Peak Track Pants from Nike. In a Black colourway, these regular-fit sweats are cut from smooth double-knit poly fabric, with a breathable mesh lining for cool comfort. They have an elasticated drawcord waistband to dial the perfect fit, while cuffed ankles taper the legs and show off your sneakers. With a zippered pocket to the left hip to secure your essentials, these pants are finished off with Volt Nike Futura branding. Machine washable. | Our model is 6\'0\" and wears a size medium.', 0, 3, 'PAN-UNDE-0164', 'Puma'),
(165, 'The North Face Outline Joggers', 'jd_611647_b.webp', 100.00, 0.00, 'Freshen up your off-duty looks with these men\'s Outline Joggers from The North Face. Coming in a Shady Blue colourway, these standard-fit sweats are made with a soft cotton-blended fabric for essential comfort. They have an elasticated drawcord waistband and cuffed ankles for a secure fit, and side pockets to stash your gear. Finished up with a The North Face wordmark outlined to the lower leg, and a signature Half Dome logo at the thigh. Machine washable. | Our model is 6\'0\" and wears a size medium.', 0, 3, 'PAN-UNDE-0165', 'Reebok'),
(166, 'The North Face Outdoor Hybrid Track Pants', 'jd_611578_a.webp', 120.00, 0.00, 'From the street to a hike, rep slick style from The North Face with these men\'s Outdoor Hybrid Track Pants. Coming in a Black colourway, these track pants are cut from a light and durable poly fabric that has a smooth feel for lasting comfort. They feature an elasticated waistband to keep you feeling supported and have elastic cuffs that let you showcase your sneaks. With zippered pockets for stashing your essentials, they\'re finished with TNF branding to the thigh. Machine washable. | Our model is 6\'2\" and wears a size medium.', 0, 3, 'PAN-REEB-0166', 'Under Armour'),
(167, 'adidas Energize Fleece Joggers', 'jd_365442_a.webp', 70.00, 0.00, 'Stay warm on the streets with these men\'s Energize Fleece Joggers from adidas, exclusive to JD. Coming in a green colourway, these standard-fit track pants are made from a soft poly cotton fleece. With an elastic waist and ribbed trims for a snug feel, they\'re finished up with side pockets, white 3-Stripes and the iconic Badge of Sport logo. Machine washable. | Our model is 6\'0\" and wears a size medium.', 0, 3, 'PAN-REEB-0167', 'Under Armour'),
(168, 'Under Armour UA Armour Sport Woven Track Pants', 'jd_680344_a (1).webp', 75.00, 0.00, 'Gear up for your training sessions in these women\'s UA Armour Sport Woven Track Pants from Under Armour. In a Black colourway, these regular-fit track pants are made with smooth, lightweight woven poly fabric for lasting comfort. With a four-way stretch construction for maximum movement, they\'re built with UA Storm Tech for water-repellent protection when you\'re on the move. They have an elasticated drawcord waistband to adjust the fit, and stretchy ribbed cuffs for a secure feel, while side pockets offer up easy storage. Finished with classic Under Armour branding at the thigh. Machine washable. | Our model is 5\'7\" and wears a size small.', 0, 3, 'PAN-UNDE-0168', 'Asics'),
(169, 'Nike Academy Track Pants', 'jd_646598_a.webp', 70.00, 0.00, 'Ready to take your game to a new level? Then cop these women\'s Academy Track Pants from Nike. In a Pink colourway, these track pants are cut from a lightweight but durable poly fabric with mesh panels to the side for comfy, breathable wear. They feature an elastic waistband for a supportive feel and have side pockets for storing your essentials. With Dri-FIT tech that works to wick away sweat to keep you cool, they\'re signed off with the Swoosh to the thigh. Machine washable. | Our model is 5\'7\" and wears a size small.', 0, 3, 'PAN-NEW -0169', 'Adidas'),
(170, 'adidas Tiro Track Pants', 'jd_628408_a.webp', 60.00, 0.00, 'evel up your training in these women\'s Tiro Track Pants from adidas. Coming in a Black colourway, these standard-fit track pants are made with ultra-smooth, lightweight recycled polyknit fabric for lasting comfort. Equipped with sweat-wicking AEROREAD tech, they feature a mid-rise elasticated waistband with a drawcord to adjust the fit, and slim, tapered legs for a streamlined feel. With ankle zips for easy on-off, and zippered side pockets for secure storage, they\'re finished with adidas\' iconic 3-Stripes down the sides and signature branding at the thigh. Machine washable. | Our model wears a sze small. | HS9530', 0, 3, 'PAN-PUMA-0170', 'Adidas'),
(171, 'Gym King Results Tights', 'jd_621800_b.webp', 50.00, 0.00, 'Hit the workout in these women\'s Results Tights from Gym King. Coming in a Pink colourway, these JD-exclusive tights are made with a smooth, stretchy nylon blend for lasting wear. They fit tight, and feature a high-rise elasticated waistband for a secure feel with repeat Gym King branding around the waist. Signed off with a classic logo at the thigh. Machine washable. | Our model is 5\'9\" and wears a size 6-8.', 0, 3, 'PAN-ASIC-0171', 'Reebok'),
(172, 'Under Armour Challenger Knit Shorts', 'jd_641831_a.webp', 45.00, 0.00, 'On rest days, stay comfy in these women\'s Challenger Knit Shorts from Under Armour. Coming in a Black colourway, these shorts are made with ultra-smooth, breathable polyknit fabric with a lightewight feel. They\'re sweat-wicking and naturally stretchy, and feature an elasticated waistband with a drawstring to adjust the fit. Finished with signature Under Armour branding above the hem. Machine washable. | Our model is 5\'7\" and wears a size small.', 0, 3, 'PAN-ADID-0172', 'Puma'),
(173, 'adidas Tiro Track Pants', 'jd_628481_a.webp', 70.00, 0.00, 'From HIIT sessions to the pitch, move with freedom in these women\'s Tiro Track Pants from adidas. In a Black colourway, these mid-rise pants are cut from recycled poly fabric, and have an elasticated drawcord waistband for custom comfort. Equipped with sweat-wicking AEROREADY tech for a cool and dry feel, they feature ankle zips and zippered side pockets. Finished off with Violet Fusion 3-Stripes at the sides and a Badge of Sport on the left hip. Machine washable. | Our model is 5\'8\" and wears a size small. | IC1601', 0, 3, 'PAN-PUMA-0173', 'Puma'),
(174, 'Circuit Women\'s Easy Active Tank - White ', 'shopping.webp', 5.00, 0.00, 'Boost your activewear wardrobe with essential pieces like the Circuit Easy Active Tank. This workout tank will be at home in your gym bag and features a split hem, a round neck and is made complete with a cotton construction and a classic sleeveless cut.', 0, 4, 'TOP-UNDE-0174', 'Adidas'),
(175, 'Circuit Women\'s Active Easy Tank', '34919330250782.jpg', 6.00, 0.00, 'Boost your activewear wardrobe with essential pieces like the Circuit Easy Active Tank. This workout tank will be at home in your gym bag and features a split hem, a round neck and is made complete with a cotton construction and a classic sleeveless cut.', 0, 4, 'TOP-UNDE-0175', 'Asics'),
(176, 'Circuit Men\'s Essential Tee', '34323593429022.jpg', 8.00, 0.00, 'Elevate your workout with the Circuit Essential Tee. This tee is a great workout or training companion and features a crew neck, short sleeves and stylish sportswear detailing with moisture wicking properties, and is made complete with a logo detail to the back and a print to the front.', 0, 4, 'TOP-ASIC-0176', 'Puma'),
(177, 'Circuit Men\'s Sublimation Print Tee', '35030263398430.jpg', 9.00, 0.00, 'Elevate your workout wardrobe with must have pieces like the Circuit Sublimation Print Tee. This tee will fit right into your gym bag rotation with its easy-to-breathe construction and is made complete with a sublimation style print, short sleeves and a classic crew neck.\r\n', 0, 4, 'TOP-UNDE-0177', 'Adidas'),
(178, 'Circuit Men\'s Long Sleeve Side Mesh', '34234622214174.jpg', 10.00, 5.00, 'Take your exercise routine to the next level with the Circuit Long Sleeve Side Mesh Tee. This workout essential will be right at home in your activewear wardrobe and features easy-to-breathe mesh detailing to the sides with long sleeves, and is made complete with a round neck and a stretchy construction. ', 0, 4, 'TOP-ADID-0178', 'New Balance'),
(179, 'Circuit Men\'s Essential Exercise Tank', '33988116906014.jpg', 5.00, 0.00, 'Elevate your workout with the Circuit Essential Exercise Tank. This tank is a great workout or training companion and features a crewneck and a classic sleeveless cut, and is made complete with a logo detail to the back.', 0, 4, 'TOP-ADID-0179', 'Nike'),
(180, 'Circuit Men\'s Sublimation Print Tee', '35030120529950.jpg', 3.00, 0.00, 'Elevate your workout wardrobe with must have pieces like the Circuit Sublimation Print Tee. This tee will fit right into your gym bag rotation with its easy-to-breathe construction and is made complete with a sublimation style print, short sleeves and a classic crew neck.', 0, 4, 'TOP-PUMA-0180', 'Under Armour'),
(181, 'Circuit Women\'s Active Easy Tank ', '34234217955358.jpg', 2.00, 0.00, 'Add a splash of colour to your gym bag with the circuit Active Easy Tank. This tank will be a breezy addition to your workout wardrobe and features a sweet Circuit print to the front of a sleeveless cut, and is made complete with a crew neck, a small logo detail to the back and a cotton construction.', 0, 4, 'TOP-ADID-0181', 'Under Armour'),
(182, 'Circuit Women\'s Active Easy Tank', '34920349466654.jpg', 8.00, 0.00, 'Boost your activewear wardrobe with essential pieces like the Circuit Easy Active Tank. This workout tank will be at home in your gym bag and features a split hem, a round neck and is made complete with a cotton construction and a classic sleeveless cut.', 0, 4, 'TOP-PUMA-0182', 'Puma'),
(183, 'Circuit Men\'s Essential Tee', '34322402246686.jpg', 5.00, 0.00, 'Elevate your workout with the Circuit Essential Tee. This tee is a great workout or training companion and features a crew neck, short sleeves and stylish sportswear detailing with moisture wicking properties, and is made complete with a logo detail to the back and a print to the front.', 0, 4, 'TOP-NEW -0183', 'Reebok'),
(184, 'Golf Balls Pure Distance', '13027899342878.jpg', 10.00, 0.00, 'The Optima Pure Distance delivers extreme distance from the tee or the fairway. It features a lower compression, high rebound core for maximum driver speed with low spin for longer, straighter shots. Includes 3 x BONUS Optima TS Competition Plus golf balls.', 0, 5, 'BALL-REEB-0184', 'Puma'),
(185, 'Soccer ball', '44216738676766.jpg', 5.00, 0.00, 'Get ready to kick some goals with this Soccer Ball. Featuring a standard soccer ball design. Ideal for bit of backyard practice or a casual game with mates, this is a must-have for any sports fan.', 0, 5, 'BALL-UNDE-0185', 'Puma'),
(186, 'Steeden Classic Rugby Ball Size 5', '11679805997086.jpg', 20.00, 0.00, 'Bring maximum performance to the field with the Steeden Senior Size 5 Classic Rugby Ball. This premium football boasts a durable skin with micro dimples for uncompromised grip in all playing conditions.', 0, 5, 'BALL-ASIC-0186', 'Adidas'),
(187, 'Bondi Aquatic Neoprene Soccer Ball', '30028832505886.jpg', 10.00, 0.00, 'The Neoprene Soccer ball is for dribbling and passing at the beach, the pool,  or in your own backyard. In bright vibrant colours and with a waterproof neoprene skin, this soccer ball won\'t disappoint regardless of weather conditions.', 0, 5, 'BALL-ADID-0187', 'Adidas'),
(188, 'Hunter Leisure Monster High Bounce Ball ', '32842062069790.jpg', 6.00, 0.00, 'See how high the Monster High Bounce ball can go! Made with durable rubber, these balls come in an assortment of colours your little ones will love. This is a great way to bond with your kids while helping them develop coordination and learn ball skills.', 0, 5, 'BALL-PUMA-0188', 'New Balance'),
(189, 'Slazenger PVC Soccer Ball', '30030825619486.jpg', 6.00, 0.00, 'The Slazenger PVC Soccer Ball is the perfect choice for budding soccer stars. This lightweight and ultra durable ball features a graphic Slazenger print and is ideal for children or those looking to practise their skills.', 0, 5, 'BALL-REEB-0189', 'Adidas'),
(190, 'Summit Socceroos Soccer Ball Size 5', '15326139285534.jpg', 10.00, 0.00, 'Show your pride while you play with the Summit Socceroos Size 5 Ball. This premium soccer ball boasts a durable synthetic outer and is an official licensed product of Football Federation Australia.', 1, 5, 'BALL-PUMA-0190', 'Reebok'),
(191, 'Wilson NBL Graffiti 6 Basketball', '30696449638430.jpg', 5.00, 0.00, 'The Wilson NBL Size 6 Basketball is perfect for up and coming local female talent.', 0, 5, 'BALL-REEB-0191', 'Under Armour'),
(192, 'Wilson NBA Drive Pro Basketball', '28920048451614.jpg', 20.00, 0.00, 'The Drive Pro- This high-performance outdoor ball helps you harness the drive that will propel you to the next level of the game, and one day, to the NBA.', 0, 5, 'BALL-REEB-0192', 'Adidas'),
(193, 'Spalding Lay Up Basketball Size 5', '12256467255326.jpg', 10.00, 0.00, 'Get outside and shoot some hoops with the vintage-look orange full-size Spalding Lay Up Basketball. Featuring natural rubber pebbles and black channels this ball is built to last the streets and on indoor courts.', 0, 5, 'BALL-PUMA-0193', 'Puma'),
(194, 'Circuit Dome Soccer Goals', '15589282545694.jpg', 20.00, 0.00, 'Lightweight and portable, the Circuit Twin Dome Soccer goals are perfect for training exercises or playing in small outdoor areas. Quick and easy to assemble and carry bag to keep the set together when travelling.', 1, 6, 'EQU-UNDE-0194', 'Under Armour'),
(195, ' Action Sports Basketball Stand', '13581401260062.jpg', 100.00, 0.00, 'Work on your jump shot in the safety of your own home with the Action Sports Basketball Stand. This classic basketball stand features a hoop net and is freestanding for your convenience. The perfect addition to your backyard for hours of fun for the whole family!\r\nProduct Features:\r\nClassic basketball stand\r\nTelescopic height adjustment from 230 - 305cm ( Regulation height)\r\nPortable base can be filled with sand or water for stability\r\nIncludes 110cm wide, 71cm high impact backboard and 45cm heavy duty ring for durability', 1, 6, 'EQU-PUMA-0195', 'New Balance'),
(196, 'Action Beach Badminton with Base Set', '32729246138398.jpg', 44.00, 0.00, 'Beach Badminton With Base Set is great fun for your family and friends! You can take this with you to the local park or beach, have fun and stay active in an easy and convenient way.\r\nProduct Features:\r\n\r\n2 Player Badminton Set\r\nFast and easy setup and packdown\r\nLightweight, durable and portable.\r\nIdeal for camping trips, the beach or park.\r\nFill base with sand or water for stability', 0, 6, 'EQU-REEB-0196', 'Under Armour'),
(197, 'Official A-League Slip In Shin Guards', '44663146250270.jpg', 10.00, 0.00, 'Slip in Shin guard made for kids/adults to play football. Approved by A-League they have all the right elements you need to get playing football. Comes with foam backing, breathable air vents and Velcro strips to keep them in place for those fast pace matches.\r\nProduct Features:\r\nDurable outer for high impact protection.\r\nVelcro elasticated straps for easy use.\r\nHard Plastic Outer.\r\nSoft foam inner for comfortable wear.\r\nOne size fits most - size is small/medium but can be used by kids to adults\r\nAssorted colours (randomised colour picking for orders)', 0, 6, 'EQU-PUMA-0197', 'Adidas'),
(198, 'Slazenger Wooden Cricket Set - Size 4', '34332258762782.jpg', 15.00, 0.00, 'Get started in cricket with this Slazenger Wooden Cricket Set, or just use it whilst on the go for friendly competition. The set includes a wooden bat with sticker decals and a gripped handle, three wooden stumps and a wooden bail, as well as one soft felt covered balls for safe use in any outdoor situations.\r\nProduct Features:\r\n\r\nSize 4 Wooden cricket set\r\nincludes: Bat, Stumps, Bails and Ball\r\nReusabel carry bag\r\nIdeal for the backyard or at the park', 0, 6, 'EQU-PUMA-0198', 'Under Armour'),
(199, 'Reliance Knee Pads - Senior', '17472830439454.jpg', 10.00, 0.00, 'Reliance Knee Pads offer lightweight cushioning to the knees, they are suitable for a range of sports and activities, particularly those on hard surfaces. The wide polyester ryon band fits around the knee and features soft rubber/nylon sponge for protection and cushioning. Reliance Knee Pads are perfect when playing Volleyball, Indoor Cricket, Basketball or Indoor Soccer, they can also be worn for dance perfomances or outdoor sports.\r\nProduct Features:\r\n\r\nPadded knee guards perfect for hard surface sports\r\nWide polyester ryon band fits around the knee\r\nRubber/Nylon sponge filling cushions and protects your knees\r\nSuitable for playing volleyball, indoor cricket, basketball or indoor soccer\r\nAlso suitable for dancing and contemporary performances', 0, 6, 'EQU-ADID-0199', 'Puma'),
(200, 'Summit Fast Net Flex 1.5x0.9m Soccer Goal', '31381993422878.jpg', 70.00, 0.00, 'Now you can set up a goal anywhere, with the Summit Fast Net Flex 1.5x0.9m Soccer Goal. Not only is it easily portable, it is also has a sturdy design that will be able to withstand your shots.\r\nProduct Features:\r\nClick-in steel folding base\r\nFlex fibreglass poles\r\nBox style goal\r\nComess with pegs and carry bag', 0, 6, 'EQU-REEB-0200', 'Adidas'),
(201, 'Mini Pro Basketball Board', '27178031284254.jpg', 40.00, 0.00, 'Turn any room into an indoor basketball court with this easy-to-assemble basketball board and ring which can be hooked over any door. 12.7cm Diameter Basketball included.\r\n\r\nProduct Features:\r\n\r\nEasily Mounts with a pre-assembled bracket and over the door foam padded bracket\r\nPadded bracket prevents door damage\r\nLooks and feels like a genuine outdoor hoop\r\n45.7 x 30cm backboard with 1pc polyester net', 0, 6, 'EQU-ADID-0201', 'Reebok'),
(202, 'Circuit Handheld 23cm Ball Pump', '32222735237150.jpg', 5.00, 0.00, 'Circuit Hand pump for sports ball and inflatable toys. With multi-purpose hose and flexible extension handheld ball pump.\r\n\r\nProduct Features:\r\n\r\nMertal sports ball needle\r\nPlastic inflator nozzle\r\nFlexible extension hose\r\nHand pump for sports ball / inflatable toys\r\n23.5cm tall\r\n1 piece needle included ', 0, 6, 'EQU-REEB-0202', 'Reebok'),
(203, 'Gaiam Soft Grip Yoga Mat 4mm - Mint Grey', '28603312865310.jpg', 20.00, 0.00, 'Gaiam’s Soft Grip yoga mat is ideal for intermediate level yogis and performs best in restorative to moderately paced practises. The Soft Grip mat is made of a high performance TPE. Praised by devotees for requiring “zero break-in-time” this material uses a closed-cell structure that locks out moisture, germs and odours. The Soft Grip mat provides a superb blend of cushioning and a soft, tacky feel which results in excellent performance and lightweight portability.\r\n\r\nProduct Features:\r\n\r\nTPE design provides a soft & grippy feel\r\nSuper lightweight and easy to carry\r\nIdeal for intermediate and moderately- paced practices\r\nOn-line yoga practice included', 0, 7, 'TRA-NEW -0203', 'Puma'),
(204, 'York Fitness Body Builder Gym', '14266721796126.jpg', 700.00, 0.00, 'Did you know the best way to increase your metabolism is strength training? Continue to burn calories long after finishing resistance training. The York Fitness Body Builder Home Gym allows you to work through a full range of motion for targeting maximum muscle strength and growth. Another quality home gym built to last from York Fitness.\r\nProduct Features:\r\n\r\n60kg Resistance as Standard (maximum of 100kg)\r\nBullHorn Expander Attachment to Add Additional Weight (40kgs) (additional weights not included)\r\nRemovable Vinyl Plates for Smooth / Quiet Workouts\r\nFull Sized Frame Suitable for Most Users\r\nSturdy Modern Oval Tube Design with Reinforced Top Post\r\nNylon Coated High Tensile Cables\r\nComes in 3 cartons', 0, 7, 'TRA-PUMA-0204', 'Reebok'),
(205, 'FILA Magnetic Exercise Bike', '28071502315550.jpg', 100.00, 0.00, 'FILA Magnetic Exercise Bike adds comfort to your home gym workout. This exercise bike features 8 Levels of manual resistance, to help you improve cardio and keep in shape.\r\nProduct Features:\r\n8 Levels of manual resistance\r\nLCD Displays - Speed, Time, Distance, Calories, ODO, Pulse\r\nTablet / Book Holder\r\nHand pulse sensors\r\nMaximum user weight: 100 kg\r\nHeight recommendations: Up to 180cm', 1, 7, 'TRA-UNDE-0205', 'New Balance'),
(206, 'Circuit Neo 8kg Kettle Bell - Orange', '16982324445214.jpg', 20.00, 0.00, 'Work out with the Circuit Neo Kettlebell to improve your strength, muscle to fat ratio, and bone density. It features a fabulous, bright colour for a fun look as well as a neo coating that helps to protect floors while enhancing your grip. Also available in 4kg, 6kg, 8kg and 12kg.\r\nProduct Features:\r\n\r\n8kg Weight\r\nNeo coating enhances grip and protects floors\r\nBright, fun colour\r\nAlso available in 4kg, 6kg, 8kg, and 12kg', 0, 7, 'TRA-NEW -0206', 'Puma'),
(207, 'York Fitness 6\" Barbell Bar with Spring Clip Collars', '30240545800222.jpg', 70.00, NULL, 'Start weight training at home with the York Fitness 5’6” Barbell Bar. The York Barbell Bar features a solid steel construction and Spring Clip collars.\r\nProduct Features:\r\n\r\nThe maximum load of the York Barbell Bar is 125kg in total, giving a generous amount of leeway for those looking to train from home.\r\nNow you can quickly and safely change the weight plates that you’re using with the barbell bar featuring Spring Clip collars.\r\nMade from solid steel and chrome plated, the York Bar will last you, as well as giving a sturdy feel with impressive durability.', 0, 7, 'TRA-CONV-0207', 'Reebok'),
(208, 'UFC Contender Gloves Large/Extra Large - Red', '14302769119262.jpg', 70.00, 0.00, 'The UFC Contender Gloves are comfort-fit grappling gloves ideal for training. Pre-curved, anatomically correct impact-dispersing soft foam layered over knuckles enhances protection during intense training sessions. Maintain control and range of motion with open-finger design and soft flexible synthetic leather. Adjustable, secure wrap-around hook & loop closure supports wrist.\r\nProduct Features:\r\n\r\nRed – Large/Extra Large\r\nOpen palm design\r\nGreat for grappling\r\nSecure hook & loop closure\r\nSoft finger compartments for comfort while gripping\r\nDurable engineered synthetic leather', 1, 7, 'TRA-ADID-0208', 'Puma'),
(209, 'UFC Contender Leather Speed Bag 10\" x 7\"', '14303047024670.jpg', 150.00, 0.00, 'Work on your speed skills with the UFC Leather Speed Bag. Top quality construction made from genuine cowhide. Inner bladder is extremely durable and weighted properly for quick rebound. Set this up in your home gym to build hand and eye coordination. Fits all standard speed bag platforms. Pairs perfectly with the UFC Speed Bag Platform.\r\nProduct Features:\r\n\r\nGrade A Cowhide Leather Exterior\r\nQuality construction with reinforced stitching\r\nUltra-durable shock absorbing inner bladder\r\nQuick rebound for building eye hand coordination\r\nExcellent training tool for all levels – beginner to pro\r\nSwivel bracket sold separately', 0, 7, 'TRA-REEB-0209', 'Reebok'),
(210, 'UFC Contender Short Curved Focus Mitts - Black/Red', '14303250350110.jpg', 60.00, 0.00, 'Enhance accuracy and speed with the UFC Curved Focus Mitts. Half-circle grip on inside for hand placement helps reduce injury and gives coach or trainer more control over target placement for more complex combinations. The hood over the hand provides additional protection during training. Anatomically correct curved design that is ideal for jabs, straight punches, hooks, overhands and even uppercuts.\r\nProduct Features:\r\n\r\nDevelop speed & fast reflexes\r\nImpact-absorbing layers of foam\r\nDurable PU exterior\r\nHalf-circle grip on inside for proper hand placement\r\n10.25? long x 7.5? wide x 4.9? deep', 0, 7, 'TRA-PUMA-0210', 'Under Armour'),
(211, 'VIP Boxing Bag 75cm', '14410745184286.jpg', 80.00, 0.00, 'Improve your boxing technique and let the punches fly with the VIP Boxing Bag. An excellent choice for your home gym, the VIP Boxing Bag features a PU outer skin designed to endure the rigorous wear and tear of your daily workouts. \r\n\r\nProduct Features:\r\n\r\n75cm Long\r\nPU Outer skin\r\nIncludes 4 webbing straps and 4 D\'s', 0, 7, 'TRA-NIKE-0211', 'Reebok'),
(212, 'UFC Double End Bag', '14303036178462.jpg', 90.00, 0.00, 'Improve response time, rhythm, hand speed, endurance and power with the UFC Double End Speed Bag. The fast rebound movement of the bag improves reaction time and ultimately teaches you how to fight while avoiding your opponent. Made of thick durable leather-like construction with reinforced stitching, you can rely on this bag day in and day out. Easy mounting system that is compatible with all speed bag platforms and double-end attachments.\r\nProduct Features:\r\n\r\nGreat for reflex training\r\nFast rebound\r\nDurable PU construction\r\nEasy mounting system', 0, 7, 'TRA-PUMA-0212', 'Puma'),
(213, 'UFC Contender Muay Thai Pad', '14303255330846.jpg', 50.00, 0.00, 'A staple for every MMA athlete, the UFC Contender Muay Thai Pad is designed to withstand the most intense training sessions. A sturdy top handle and adjustable bottom strap offers control and stability for high-impact knee-strikes, elbow-strikes, punches and other combinations. Made with super reinforced stitching over a thick durable engineered leather, the Contender Muay Thai Pad is built to last.\r\nProduct Features:\r\nDurable engineered leather\r\nBuilt for long life\r\nSturdy handle for handling the heaviest of kicks\r\nGreat for catching: punches, knees, kicks, and elbows\r\nMeasures 15.6? Long x 7.9? Wide x 6.7? Thick', 0, 7, 'TRA-NIKE-0213', 'Under Armour'),
(214, 'FILA Fitness Mini Cycle Trainer', '28071501660190.jpg', 60.00, 0.00, 'FILA Fitness Mini Cycle is perfect for the home office, get your daily exercise without adjusting your schedule with this mini cycle that can be used as you sit at your desk. With a huge range of benefits from improving blood circulation, burning calories, building muscle and endurance, you’ll love the simplicity of a workout that slides neatly into your life.\r\nProduct Features:\r\n\r\nMultiple levels of Resistance\r\nLCD Displays - Total Count, Time, Calories, Scan and Count\r\nCompact for easy storage\r\nMaximum User Weight: 100kg', 0, 7, 'TRA-ASIC-0214', 'Puma');
INSERT INTO `item` (`itemId`, `itemName`, `photo`, `price`, `salePrice`, `description`, `featured`, `categoryId`, `productCode`, `brand`) VALUES
(215, 'Circuit Exercise Wheel with Knee Pad', '11803621851166.jpg', 20.00, 0.00, 'Workout in the comfort of your own home using the Circuit Exercise Wheel. This exercise wheel features soft yet firm griped handles and is sure to give your core a killer workout whilst the knee mat helps provide additional comfort. Don\'t forget to stretch before you start your workout!\r\nProduct Features:\r\n\r\nExcercise wheel\r\nComfortable knee pad\r\nSoft gripped handles\r\nGreat for exercising at home\r\nSure to give your core muscles a burning workout', 0, 7, 'TRA-PUMA-0215', 'Asics'),
(216, 'Circuit Height Adjustable Aerobic Step Kit', '13514353475614.jpg', 30.00, 0.00, 'Build your fitness in the comfort of your own home with the Circuit Height Adjustable Aerobic Step Kit. This fully adjustable aerobic stepper is suitable for all heights and fitness levels, and comes with a bonus speed rope for aerobic skipping and two latex exercise bands for an extra challenge.\r\nProduct Features:\r\n\r\nAerobic stepper adjusts from 10 cm to 15 cm for all heights and fitness levels\r\nImproves aerobic and overall fitness\r\nIncludes 1 x 68 cm aerobic stepper, 1 x 260 cm speed rope, 2 x latex exercise bands', 0, 7, 'TRA-REEB-0216', 'Nike'),
(217, 'Circuit Resistance Tube', '12252231827486.jpg', 5.00, 0.00, 'The lightweight Circuit resistance band with its ergonomic handles for extra comfort, is perfect for adding resistance to your training. The band helps target a variety of muscle groups. It\'s also a great tool to help with mobility and rehabilitation.\r\n\r\nProduct Features:\r\n\r\nAdds resistance to strength training\r\nErgonomic grip for comfort\r\nTightens shoulders, triceps and biceps', 0, 7, 'TRA-NEW -0217', 'Puma'),
(218, 'Circuit Fabric Resistance Bands', '32958641012766.jpg', 15.00, 0.00, 'The Circuit Fabric Resistance Bands are excellent for improving strength and muscle activation. This will greatly assist in resistance training, yoga and pilates.\nProduct Features:\n\nFor improving strength and muscle activation\nSuitable for yoga\nComes in 3 resistance strengths', 0, 7, 'TRA-UNDE-0218', 'Nike'),
(284, 'Reag', 'imageUnavailable.webp', 1.00, 603.00, 'A dolore facere cum      ', 1, 3, 'PAN-ADID-0284', 'New Balance'),
(285, 'Phone 111', '2023-09-10_222432_cr.jpg', 246.00, 723.00, 'Vans x Gallery Dept. Vault Old Skool LX', 1, 171, 'TEC-SONY-0285', 'Sony'),
(286, 'Phone 112', 'benjamin-raffetseder-OYLuqhsSLNk-unsplash_cr.jpg', 333.00, 0.00, 'The iconic and classic design of the Nike AF1 has been remastered in a wheat brown colorway, perfect for autumn/winter! Constructed with full-grain leather uppers to provide comfortable fit, whilst also featuring an encapsulated air sole unit midsoles for lightweight cushioning complete its ride. This edition is finished off with black branding tags on both tongues and sides - style it up now at FOOTY.COM', 0, 171, 'TEC-HUAW-0286', 'Oppo'),
(287, 'Phone123', 'triyansh-gill-VAfKv0MPzjg-unsplash_cr.jpg', 331.00, 263.00, 'The sleek black and white colorway adds a touch of modern style to these trainers. With a comfortable and supportive fit, these shoes are perfect for everyday wear or light workouts. Whether you\'re on the go or looking for a hassle-free footwear option, the Nike Go Flyease Trainers in Black and White provide a blend of functionality and contemporary design.', 0, 171, 'TEC-SONY-0287', 'Huawei'),
(288, 'Phon45', 'sanju-pandita-ZYrhWxIuEqQ-unsplash.jpg', 468.00, 566.00, 'The sleek black and white colorway adds a touch of modern style to these trainers. With a comfortable and supportive fit, these shoes are perfect for everyday wear or light workouts. Whether you\'re on the go or looking for a hassle-free footwear option, the Nike Go Flyease Trainers in Black and White provide a blend of functionality and contemporary design. ', 0, 171, 'TEC-HUAW-0288', 'Huawei');

-- --------------------------------------------------------

--
-- Table structure for table `orderitem`
--

CREATE TABLE `orderitem` (
  `itemId` int(11) NOT NULL,
  `shoppingOrderId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `orderitem`
--

INSERT INTO `orderitem` (`itemId`, `shoppingOrderId`, `quantity`, `price`) VALUES
(1, 278, 3, 46.00),
(3, 277, 1, 17.00),
(3, 279, 1, 17.00),
(9, 278, 1, 69.00),
(118, 278, 1, 97.00),
(189, 279, 1, 6.00),
(203, 280, 1, 20.00),
(203, 281, 1, 20.00),
(205, 278, 1, 100.00);

-- --------------------------------------------------------

--
-- Table structure for table `shoppingorder`
--

CREATE TABLE `shoppingorder` (
  `shoppingOrderId` int(11) NOT NULL,
  `orderDate` datetime NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `contactNumber` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `creditCardNumber` varchar(20) NOT NULL,
  `expiryDate` varchar(10) NOT NULL,
  `nameOnCard` varchar(50) NOT NULL,
  `csv` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `shoppingorder`
--

INSERT INTO `shoppingorder` (`shoppingOrderId`, `orderDate`, `firstName`, `lastName`, `address`, `contactNumber`, `email`, `creditCardNumber`, `expiryDate`, `nameOnCard`, `csv`) VALUES
(277, '2023-07-26 00:55:44', 'Abdul', 'Washington', 'Laboris adipisicing ', '813', 'wakycivik@mailinator.com', '863', '1970-06', 'Ann Foster', '44'),
(278, '2023-07-26 01:00:38', 'Pandora', 'King', 'Delectus error maio', '136', 'cymaja@mailinator.com', '764', '1986-06', 'Dane Lancaster', '15'),
(279, '2023-09-10 22:26:49', 'Kirestin', 'Payne', 'Expedita in dolores ', '119', 'jokoc@mailinator.com', '212', '2017-05', 'Carol Dunlap', '78'),
(280, '2023-09-10 22:31:02', 'Keely', 'Molina', 'Tempor ut laboriosam', '376', 'xiwaci@mailinator.com', '847', '1994-10', 'Kelsey Lopez', '60'),
(281, '2023-09-10 22:32:57', 'Colorado', 'Mcconnell', 'Velit id consequat ', '788', 'saxy@mailinator.com', '464', '1986-09', 'Audrey Stephens', '86');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userId` int(11) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `roles` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `userName`, `password`, `email`, `phone`, `address`, `roles`) VALUES
(100, 'admin-sportswh', '$2y$10$D62PNcpd2pZb8uE2pCrzquZOCHwG03fVw8AERp.7dvlC95kckgx9W', 'nazo@mailinator.com', '', '', 'admin'),
(101, 'user-sportswh', '$2y$10$reuvw0bweHcWoV1n4n6zFeFWPtlC/9BO9NgvWtytr//GKZ8mPLW9S', 'qetyfar@mailinator.com', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryId`),
  ADD KEY `categoryId` (`categoryId`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`itemId`),
  ADD KEY `itemId` (`itemId`),
  ADD KEY `FK_itemCategory` (`categoryId`);

--
-- Indexes for table `orderitem`
--
ALTER TABLE `orderitem`
  ADD PRIMARY KEY (`itemId`,`shoppingOrderId`),
  ADD KEY `shoppingOrderId` (`shoppingOrderId`);

--
-- Indexes for table `shoppingorder`
--
ALTER TABLE `shoppingorder`
  ADD PRIMARY KEY (`shoppingOrderId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `itemId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=289;

--
-- AUTO_INCREMENT for table `shoppingorder`
--
ALTER TABLE `shoppingorder`
  MODIFY `shoppingOrderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=282;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `FK_itemCategory` FOREIGN KEY (`categoryId`) REFERENCES `category` (`categoryId`);

--
-- Constraints for table `orderitem`
--
ALTER TABLE `orderitem`
  ADD CONSTRAINT `orderitem_ibfk_1` FOREIGN KEY (`itemId`) REFERENCES `item` (`itemId`),
  ADD CONSTRAINT `orderitem_ibfk_2` FOREIGN KEY (`shoppingOrderId`) REFERENCES `shoppingorder` (`shoppingOrderId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
