-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2021 at 01:55 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sdw`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_price` float NOT NULL,
  `product_image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `cust_id`, `product_name`, `product_quantity`, `product_price`, `product_image`) VALUES
(7, 8, 'Panadol', 2, 19.98, 'medicine-1.png'),
(12, 8, 'Paracetamol Calpo', 1, 14.99, 'medicine-2.png'),
(13, 8, 'Panadol Extra', 2, 21.99, 'medicine-8.png'),
(60, 1, 'Panadol', 1, 19.98, 'medicine-1.png'),
(61, 1, 'Small Golden House Decoration ', 1, 50, 'good4.png'),
(62, 1, 'Small Golden House Decoration ', 1, 50, 'good4.png');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cust_id` int(10) NOT NULL,
  `cust_name` varchar(30) NOT NULL,
  `cust_email` varchar(30) NOT NULL,
  `cust_phone` varchar(20) NOT NULL,
  `cust_address` varchar(30) NOT NULL,
  `cust_address2` varchar(256) NOT NULL,
  `cust_city` varchar(256) NOT NULL,
  `cust_state` varchar(256) NOT NULL,
  `cust_zipcode` varchar(256) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `usergroup` int(11) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `verified` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `cust_name`, `cust_email`, `cust_phone`, `cust_address`, `cust_address2`, `cust_city`, `cust_state`, `cust_zipcode`, `username`, `password`, `usergroup`, `token`, `verified`) VALUES
(1, 'Mumin Elhassan', 'muminelhassan98@gmail.com', '0168150529', 'Kolej Kediaman 4', 'Lebuhraya Tun Razak', 'Kuantan', 'Pahang', '26300', 'muminaya', 'muminaya', 1, NULL, NULL),
(2, 'Min Xuan', 'minxuan@hotmail.com', '0124335678', 'Jalan Bahagia', 'Taman Jelita', 'Kuantan', 'Pahang', '26300', 'minxuan', 'minxuan', 1, NULL, 1),
(3, 'Sin Lan', 'sinlan@hotmail.com', '0129988765', '12', 'Jalan Intan', 'Kuantan', 'Pahang', '26300', 'sinlan', 'sinlan', 1, NULL, 1),
(4, 'Syahril', 'syahril@gmail.com', '0121334122', '123', 'Lebuhraya Razak', 'Kuantan', 'Pahang', '26300', 'syahril', 'syahril', 1, NULL, 1),
(5, 'Kok Jiung', 'kokjiung@hotmail.com', '0164534342', '45', 'Kuala Sungai Pinang', 'Kuantan', 'Pahang', '26300', 'kokjiung', 'kokjiung', 1, NULL, 1),
(6, 'Rasydan', 'rasydan@hotmail.com', '0123423223', '9', 'Taman Indah', 'Kuantan', 'Pahang', '26300', 'rasydan', 'rasydan', 1, NULL, 1),
(18, 'Hh', 'h@j.j', '1', 'h', 'h', 'h', 'h', 'h', 'h', 'h', 1, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `food_id` int(11) NOT NULL,
  `food_name` varchar(50) NOT NULL,
  `food_details` varchar(255) NOT NULL,
  `food_quantity` int(11) NOT NULL,
  `food_price` float NOT NULL,
  `food_image` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`food_id`, `food_name`, `food_details`, `food_quantity`, `food_price`, `food_image`) VALUES
(3, 'Beef Burger', '317.3 calories; 27.4 g protein; 10 g carbohydrates; 124.5 mg cholesterol; 474.5 mg sodium. Full Nutrition', 1, 13.5, 0x666f6f64312e6a7067),
(4, 'Shrimp Scampi Pizza', 'Calories 456, Fat 22g (Saturated 12g, Trans 0.3g), Cholesterol 200mg, Sodium 1266mg, Carbs 32g (Fiber 1g, Sugars 1g), Protein 29g', 1, 25, 0x666f6f64322e6a7067),
(5, 'Corndog', 'Cholesterol 45 m, Sodium 556 mg, Potassium 150 mg , Total Carbohydrate 32 g', 1, 10, 0x666f6f64332e6a7067),
(6, 'Spaghetti Bolognese', 'Cholesterol 45 m, Sodium 556 mg, Potassium 150 mg , Total Carbohydrate 32 g', 1, 15, 0x666f6f64342e6a7067),
(7, 'Coca-Cola Classic', 'Less sugar', 1, 5, 0x666f6f64352e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `good`
--

CREATE TABLE `good` (
  `good_id` int(11) NOT NULL,
  `good_name` varchar(50) NOT NULL,
  `good_details` varchar(255) NOT NULL,
  `good_quantity` int(11) NOT NULL,
  `good_price` float NOT NULL,
  `good_image` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `good`
--

INSERT INTO `good` (`good_id`, `good_name`, `good_details`, `good_quantity`, `good_price`, `good_image`) VALUES
(9, 'Small Golden House Decoration ', 'Lawan Sejuk Kecil Villa3DTeka-Teki Logam Tiga DimensidiyBuatan Tangan Dipasang Rumah Dewasa Model Kreatif Hari Jadi Hadiah', 9, 50, 0x676f6f64342e706e67),
(10, '3D Moon LED', '3D Print Moon LED Night Lamp Rechargeable 7 Colors Tap and Touch Control Home Decor Creative Gift  ', 4, 20, 0x676f6f64322e706e67),
(11, 'Modern Super Soft Geometry Series Pillowcase', ' Polyester fabric, durable and wear-resistant.  ', 1234, 25, 0x676f6f64332e706e67),
(12, 'Pure Copper Mug', ' Pure Copper Mug Moscow Mule Cup For Cold drink Cocktail without Inside Liner【bluesky1990】.  ', 124, 18, 0x676f6f64362e706e67),
(13, 'Line Friends Sally Mug Cup', ' Official Line Merchandise: Line Friends Sally Mug Cup.  ', 12, 30, 0x676f6f64352e706e67);

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `medicine_id` int(11) NOT NULL,
  `medicine_name` varchar(50) NOT NULL,
  `medicine_details` varchar(255) NOT NULL,
  `medicine_quantity` int(11) NOT NULL,
  `medicine_price` float NOT NULL,
  `medicine_image` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`medicine_id`, `medicine_name`, `medicine_details`, `medicine_quantity`, `medicine_price`, `medicine_image`) VALUES
(17, 'Panadol', 'Effective pain relief', 10, 19.98, 0x6d65646963696e652d312e706e67),
(18, 'Paracetamol Calpo', 'Cough Medicine', 10, 14.99, 0x6d65646963696e652d322e706e67),
(19, 'Ease a Cold', 'Cough, Cold and Flu medicine', 10, 24.99, 0x6d65646963696e652d332e706e67),
(20, 'Blackmores', 'Blackmores Vitamin C 500 is a dietary supplement that provides vitamin C in the form of ascorbic acid.', 10, 49.99, 0x6d65646963696e652d342e706e67),
(21, 'Nurofen For Children', 'Nurofen for Children starts providing effective relief from fever in just 15 minutes and lasts up to 8 hours*. It contains ibuprofen to effectively provide relief from teething pain, tooth aches, earaches, sore throats, headaches, minor aches, sprains and', 10, 75, 0x6d65646963696e652d352e706e67),
(22, 'Gofen 400', 'Ibuprofen 400mg Capsule Gofen 400 10\'s. 10,000UGX. Status: In stock. Gofen is a non-steroidal anti-inflammatory medicine, which is used to relieve pain in conditions such as osteoarthritis, rheumatoid arthritis, menstrual cramps (dysmenorrhea), muscle ach', 10, 34.99, 0x6d65646963696e652d362e706e67),
(23, 'Panadol Baby', 'Panadol Baby & Infant Suspension provides effective temporary relief from the pain and fever while being gentle on tiny tummies.', 10, 17.99, 0x6d65646963696e652d372e706e67),
(24, 'Panadol Extra', 'Panadol Extra With Optizorb. Panadol Extra with Optizorb provides 37% stronger pain relief as compared to standard paracetamol alone1. It has been proven to be more superior in relieving pain across a number of pain states. 1-5. Apart from tough pain reli', 10, 21.99, 0x6d65646963696e652d382e706e67);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `product_name` varchar(256) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_price` float NOT NULL,
  `product_image` varchar(256) NOT NULL,
  `order_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `cust_id`, `product_name`, `product_quantity`, `product_price`, `product_image`, `order_status`) VALUES
(40, 1, 'Paracetamol Calpo', 1, 14.99, 'medicine-2.png', 1),
(41, 1, 'Corndog', 1, 10, 'food3.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `petgroom`
--

CREATE TABLE `petgroom` (
  `petgroom_id` int(11) NOT NULL,
  `petgroom_name` varchar(50) NOT NULL,
  `petgroom_details` varchar(2556) NOT NULL,
  `petgroom_quantity` int(11) NOT NULL,
  `petgroom_price` float NOT NULL,
  `petgroom_image` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `petgroom`
--

INSERT INTO `petgroom` (`petgroom_id`, `petgroom_name`, `petgroom_details`, `petgroom_quantity`, `petgroom_price`, `petgroom_image`) VALUES
(801, 'Poozie n’ Beach', 'Poozie n’ Beach provides amazing grooming services for your furkids. Many pet parents take their pups to groom here knowing that they are in safe hands. You can also bring your own food or order delivery and enjoy a meal while waiting for your furkid’s grooming session\n\nPoozie n’ Beach is also the only physical location in Klang Valley having PledgeCare air-dried dog food on their shelves.\n\nLook them up on Facebook and Instagram! \n\nAddress: C-GF-06 Sunway Nexis Kota Damansara Jalan PJU 5/1, 47810 Petaling Jaya.\n\nContact Details: 03-7497 9497, 010-299 9745 ', 1, 20, 0x67312e6a7067),
(802, 'Hiro Pets Grooming and Training', 'Located in SS2, Hiro Pets Grooming and Training provides grooming as well as basic training services. Hiro has been grooming pets for the past 3 years and has been grooming more dogs than cats. His most interesting experience is grooming an Afghanistan hound.\n\nFun fact: Hiro used to be a parrot trainer in Thailand! \n\nCheck out their Facebook page here!\n\nAddress: 26 Jalan SS2/68, 47300 Petaling Jaya.\n\nContact Details: 011-1777 0085', 1, 35, 0x67322e6a7067),
(803, 'Paws On The Run', 'Cough, Established just in May 2018, Paws On The Run provides a pet grooming service which is literally on the run. All groomers in Paws On The Run are experienced in grooming, ranging from 2 to 30 years! Each groomer use their own set of skills to communicate with the pets, keeping the pets comfortable and allowing the pets to build trust towards them. The top priorities of Paws On The Run are your convenience and pets’ comfort. This means that they bring their studio to you and your pet in a truck. The truck is equipped with air-conditioner, sink, blower, hairdryer etc. – basically all you need for grooming. You can even monitor and observe your pets being groomed from a live CCTV footage from a mobile application!\n\nPaws On The Run currently have 4 mobile grooming trucks which covers all over Klang Valley! They also take in pre-orders for private events if you are interested to throw a party for your furkids! Feel free to visit their site or Facebook page for more details.\n\nLocations Covered: Klang Valley\n\nContact Details: 012-698 4959', 1, 40, 0x67332e706e67),
(804, 'Pets Grooming Hotel', 'At Pets Grooming Hotel (PGH), the groomers offer easy to follow yet affordable dog grooming services specially for your pets. Be it a basic grooming or if you want your dogs to have a whole new look, their professional dog groomers are always there to advise what is best for your dogs!\n\nFor hygiene purposes, PGH has a strict control on fleas, ticks and mites as they make sure their grooming salon get disinfected twice a day.\n\nFor more information, visit their Facebook & Instagram.\n\nAddress: GF-22A, The Main Place, Jalan USJ 21/10, 47640 Subang Jaya.\n\nContact Detail: 010-203 6088', 1, 50, 0x67342e6a7067),
(805, 'Letoro Grooming', 'Established in 2010 – Letoro Grooming has over a decade of experience and knowledge to give your pets the perfect groom! The grooming salon has expertly trained pet-grooming specialists as to provides a professional grooming service for your pets, in a calm and relaxed environment.\n\nLetoro Grooming works on an appointment only basis in order to keep the salon as stress free as possible. Do make your appointment before you head to the salon!\n\nCheck out their Facebook & Instagram.\n\nAddress: Lot 4211A, Taman Paik Siong, 7 1/2 miles, Jalan Puchong, 47100 Puchong, Selangor // Bandar Puteri branch: 72G, Jalan Puteri 5/5, Bandar Puteri, Puchong, 47100 Puchong, Selangor.\n\nContact Detail: 016-277 0507', 1, 45, 0x67352e706e67);

-- --------------------------------------------------------

--
-- Table structure for table `pethotel`
--

CREATE TABLE `pethotel` (
  `pethotel_id` int(11) NOT NULL,
  `pethotel_name` varchar(50) NOT NULL,
  `pethotel_details` varchar(2556) NOT NULL,
  `pethotel_quantity` int(11) NOT NULL,
  `pethotel_price` float NOT NULL,
  `pethotel_image` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pethotel`
--

INSERT INTO `pethotel` (`pethotel_id`, `pethotel_name`, `pethotel_details`, `pethotel_quantity`, `pethotel_price`, `pethotel_image`) VALUES
(701, 'Barts Sanctuary', 'Barts Sanctuary is a private house with an outdoors space and 250 square foot indoor space (option reserved for hypoallergenic dog breeds). Doggies get to run around under supervision in the spacious garden three to four times a day. When they are kept inside, there a huge space for the pooches to relax or chew a bone in.\n\nPre-boarding assessments are required before a booking can be made. All visits are strictly scheduled only.\n\nAddress: Jalan Sungai Jati, 41200 Klang, Selangor.\n\nContact Details: email bartsanctuary@gmail.com if you have any enquiries.', 1, 50, 0x6874312e706e67),
(702, 'BnB Pet Boarding', 'BnB Pet Boarding Service offers a joyful, care-free experience for all your adorable pooches. All the time that you away, your dogs will be having a fun and interactive caged-free experience. There are also plenty of comfy couches and beds for pooches to chill or snooze. Rates for small, medium and large dogs are RM50, RM60 and RM70 respectively.\n\nAddress: 6, Jalan Awan Kecil 2, Taman Overseas Union, 58200 Kuala Lumpur.\n\nOperating Hours: 10am to 7pm daily.\n\nContact Details: Call 60 12-611 5661 / 60 16-331 1986 or email bnbpets@gmail.com if you have any enquiries.', 1, 55, 0x6874322e6a7067),
(703, 'Pet Playground', 'Cough, Established just in May 2018, Paws On The Run provides a pet grooming service which is literally on the run. All groomers in Paws On The Run are experienced in grooming, ranging from 2 to 30 years! Each groomer use their own set of skills to communicate with the pets, keeping the pets comfortable and allowing the pets to build trust towards them. The top priorities of Paws On The Run are your convenience and pets’ comfort. This means that they bring their studio to you and your pet in a truck. The truck is equipped with air-conditioner, sink, blower, hairdryer etc. – basically all you need for grooming. You can even monitor and observe your pets being groomed from a live CCTV footage from a mobile application!\n\nPaws On The Run currently have 4 mobile grooming trucks which covers all over Klang Valley! They also take in pre-orders for private events if you are interested to throw a party for your furkids! Feel free to visit their site or Facebook page for more details.\n\nLocations Covered: Klang Valley\n\nContact Details: 012-698 4959', 1, 53, 0x6874332e6a7067),
(704, 'L Residence', 'Brought to you by the same owners of Pet Playground, your pets are will appreciate this grandiose getaway to the L Residence private bungalow in PJ. The house has air-conditioned rooms to make sure your pets feel comfortable and pampered. Even TV sessions are prepared to keep them entertained. Plenty of room to run around or chances to play with other guests.\n\nAddress: SS2/24, Petaling Jaya.\n\nContact Details: Call 60 17-364 8117 or email petboardinghouse@gmail.com if you have any enquiries.\n\nOperating Hours: 9am to 8.30pm daily.', 1, 60, 0x6874342e706e67),
(705, 'Wagcations', 'Wagcations naturally fell into place for Mel who had been involved with dog-rescuing scene since 2009. Her knowledge and passion for dogs makes her the perfect candidate to provide your dog with some free basic training. Your dogs will definitely be tail-wagging together with other doggy tenants throughout the stay. Dogs will enjoy walks around the neighbourhood on top of their time they spend lounging about around the house. Rates vary depending on your dog’s needs and behaviour so send her a Facebook message or email to find out more!\n\nAddress: Ara Damansara, Petaling Jaya.\n\nOperating Hours: 9am to 8pm daily.\n\nContact Details: email mel@wagcations.com if you have any enquiries.', 1, 65, 0x6874352e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `petvet`
--

CREATE TABLE `petvet` (
  `petvet_id` int(11) NOT NULL,
  `petvet_name` varchar(50) NOT NULL,
  `petvet_details` varchar(2556) NOT NULL,
  `petvet_quantity` int(11) NOT NULL,
  `petvet_price` float NOT NULL,
  `petvet_image` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `petvet`
--

INSERT INTO `petvet` (`petvet_id`, `petvet_name`, `petvet_details`, `petvet_quantity`, `petvet_price`, `petvet_image`) VALUES
(601, 'Poozie n’ Beach', 'Located at 10-A Jalan Bagan Jermal, Gill’s Veterinary Clinic provides a wide range of pet-friendly services under one roof. This includes the likes of surgery, pet grooming and boarding facilities specially catered for both cats and dogs. Gill’s Veterinary Clinic also offers 24-hour emergency service, allowing pet owners to bring their sick pets anytime or during after hours. For more info, do not hesitate to give them a call at 04-226 2517 or 227 2984.', 1, 30, 0x76312e6a7067),
(602, 'Windsor Animal Hospital', 'Your pet is in good hands at Windsor Animal Hospital, thanks to its dedicated team of veterinary professionals with high levels of experience. Their range of pet care covers from general consultation to surgery and pet grooming for cats and dogs. They also specialise in emergency & critical care such as allergic reaction, dehydration and snake bites. For more info, you can contact the hospital at 04-899 0055.', 1, 35, 0x76322e706e67),
(603, 'Hope Veterinary Centre', 'Founded in 2007, Hope Veterinary Centre offers a comprehensive range of veterinary services such as dentistry & surgery, geriatric screenings, ultrasonography and pet cremation. The clinic’s highly-experienced team of veterinary surgeons are also known to be friendly, patient and detail-oriented. For more info, contact their clinic at 04-656 0113.', 1, 40, 0x76332e706e67),
(604, 'Cuddles Veterinary Clinic', 'Excellent service, friendly and well-attentive staff, reasonable price — these are some of the reasons why Cuddles a highly-recommended veterinarian clinic. You can find out more about their clinic by calling 04-218 949 or visit them at 150, Jalan Kelawai in George Town. Keep in mind that Cuddles closed on Sundays.', 1, 27, 0x76342e6a7067),
(605, 'Pawsitive Pet Animal Clinic', 'Pawsitive Pet Animal Clinic’s range of services consists of everything from preventive medicine (e.g. vaccination & neutering) to diagnostic and surgery. They also accept house calls in case of an emergency where you are unable to visit their clinic. Among the areas they serve includes Bukit Mertajam, Butterworth, Nibong Tebal and Perai. Alternatively, you can reach out to them by calling 010-883 8739.', 1, 24, 0x76352e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `provider`
--

CREATE TABLE `provider` (
  `provider_id` int(10) NOT NULL,
  `provider_name` varchar(30) NOT NULL,
  `provider_email` varchar(30) NOT NULL,
  `provider_phone` varchar(20) NOT NULL,
  `provider_address` varchar(30) NOT NULL,
  `provider_address2` varchar(256) NOT NULL,
  `provider_city` varchar(256) NOT NULL,
  `provider_state` varchar(256) NOT NULL,
  `provider_zipcode` varchar(256) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `usergroup` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `provider`
--

INSERT INTO `provider` (`provider_id`, `provider_name`, `provider_email`, `provider_phone`, `provider_address`, `provider_address2`, `provider_city`, `provider_state`, `provider_zipcode`, `username`, `password`, `usergroup`) VALUES
(1, 'service', 'service@hotmail.com', '0198473922', 'Teluk Bahang', '', 'George Town', 'Penang', '‎11050', 'service', 'service', 2);

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `order_id` int(11) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `customer_phone` varchar(50) NOT NULL,
  `customer_address` varchar(100) NOT NULL,
  `order_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `runner`
--

CREATE TABLE `runner` (
  `runner_id` int(10) NOT NULL,
  `runner_name` varchar(30) NOT NULL,
  `runner_email` varchar(30) NOT NULL,
  `runner_phone` varchar(20) NOT NULL,
  `runner_address` varchar(30) NOT NULL,
  `runner_address2` varchar(256) NOT NULL,
  `runner_city` varchar(256) NOT NULL,
  `runner_state` varchar(256) NOT NULL,
  `runner_zipcode` varchar(256) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `usergroup` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `runner`
--

INSERT INTO `runner` (`runner_id`, `runner_name`, `runner_email`, `runner_phone`, `runner_address`, `runner_address2`, `runner_city`, `runner_state`, `runner_zipcode`, `username`, `password`, `usergroup`) VALUES
(1, 'runner', 'runner@hotmail.com', '0123456273', 'Teluk Intan', '', 'Hilir Perak District', 'Perak', '36001', 'runner', 'runner', 3);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `status_ID` int(100) NOT NULL,
  `tracking_ID` int(100) NOT NULL,
  `tracking_date` varchar(255) DEFAULT NULL,
  `tracking_time` varchar(255) DEFAULT NULL,
  `tracking_progress` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_ID`, `tracking_ID`, `tracking_date`, `tracking_time`, `tracking_progress`) VALUES
(18, 14, '2020-07-14', '11:41:15 am', 'Runner on the way destination'),
(19, 15, '2020-07-14', '11:48:01 am', 'Runner on the way destination');

-- --------------------------------------------------------

--
-- Table structure for table `tracking`
--

CREATE TABLE `tracking` (
  `tracking_ID` int(100) NOT NULL,
  `cust_id` int(100) NOT NULL,
  `runner_id` int(11) DEFAULT NULL,
  `runner_status` varchar(255) DEFAULT NULL,
  `shipping_status` varchar(255) DEFAULT NULL,
  `shipping_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tracking`
--

INSERT INTO `tracking` (`tracking_ID`, `cust_id`, `runner_id`, `runner_status`, `shipping_status`, `shipping_address`) VALUES
(15, 1, 1, 'Accepted', 'On Delivery', 'Kolej Kediaman 4, Lebuhraya Tun Razak, Kuantan. Pahang, 26300');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`food_id`);

--
-- Indexes for table `good`
--
ALTER TABLE `good`
  ADD PRIMARY KEY (`good_id`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`medicine_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `petgroom`
--
ALTER TABLE `petgroom`
  ADD PRIMARY KEY (`petgroom_id`);

--
-- Indexes for table `pethotel`
--
ALTER TABLE `pethotel`
  ADD PRIMARY KEY (`pethotel_id`);

--
-- Indexes for table `petvet`
--
ALTER TABLE `petvet`
  ADD PRIMARY KEY (`petvet_id`);

--
-- Indexes for table `provider`
--
ALTER TABLE `provider`
  ADD PRIMARY KEY (`provider_id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `runner`
--
ALTER TABLE `runner`
  ADD PRIMARY KEY (`runner_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_ID`);

--
-- Indexes for table `tracking`
--
ALTER TABLE `tracking`
  ADD PRIMARY KEY (`tracking_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cust_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `food_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `good`
--
ALTER TABLE `good`
  MODIFY `good_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `medicine_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `petgroom`
--
ALTER TABLE `petgroom`
  MODIFY `petgroom_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=806;

--
-- AUTO_INCREMENT for table `pethotel`
--
ALTER TABLE `pethotel`
  MODIFY `pethotel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=706;

--
-- AUTO_INCREMENT for table `petvet`
--
ALTER TABLE `petvet`
  MODIFY `petvet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=606;

--
-- AUTO_INCREMENT for table `provider`
--
ALTER TABLE `provider`
  MODIFY `provider_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `runner`
--
ALTER TABLE `runner`
  MODIFY `runner_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `status_ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tracking`
--
ALTER TABLE `tracking`
  MODIFY `tracking_ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
