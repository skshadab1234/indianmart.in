-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2020 at 06:55 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `indiamart`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `password`, `email`, `photo`) VALUES
(1, 'SHADAB', 'shadab1', 'admin', 'admin@gmail.com', '1596790660_khan-shadab_1594910532.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `catgeory_name` varchar(255) NOT NULL,
  `category_img` varchar(255) NOT NULL,
  `category_status` int(1) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `catgeory_name`, `category_img`, `category_status`, `added_on`) VALUES
(2, 'sasa1asasasa', '1596722875_assa_1594104908.jpg', 1, '2020-08-06 07:26:54');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `city_id` int(11) NOT NULL,
  `city_name` varchar(100) NOT NULL,
  `city_state` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`city_id`, `city_name`, `city_state`) VALUES
(1, 'Kolhapur', 'Maharashtra'),
(2, 'Port Blair', 'Andaman & Nicobar Islands'),
(3, 'Adilabad', 'Andhra Pradesh'),
(4, 'Adoni', 'Andhra Pradesh'),
(5, 'Amadalavalasa', 'Andhra Pradesh'),
(6, 'Amalapuram', 'Andhra Pradesh'),
(7, 'Anakapalle', 'Andhra Pradesh'),
(8, 'Anantapur', 'Andhra Pradesh'),
(9, 'Badepalle', 'Andhra Pradesh'),
(10, 'Banganapalle', 'Andhra Pradesh'),
(11, 'Bapatla', 'Andhra Pradesh'),
(12, 'Bellampalle', 'Andhra Pradesh'),
(13, 'Bethamcherla', 'Andhra Pradesh'),
(14, 'Bhadrachalam', 'Andhra Pradesh'),
(15, 'Bhainsa', 'Andhra Pradesh'),
(16, 'Bheemunipatnam', 'Andhra Pradesh'),
(17, 'Bhimavaram', 'Andhra Pradesh'),
(18, 'Bhongir', 'Andhra Pradesh'),
(19, 'Bobbili', 'Andhra Pradesh'),
(20, 'Bodhan', 'Andhra Pradesh'),
(21, 'Chilakaluripet', 'Andhra Pradesh'),
(22, 'Chirala', 'Andhra Pradesh'),
(23, 'Chittoor', 'Andhra Pradesh'),
(24, 'Cuddapah', 'Andhra Pradesh'),
(25, 'Devarakonda', 'Andhra Pradesh'),
(26, 'Dharmavaram', 'Andhra Pradesh'),
(27, 'Eluru', 'Andhra Pradesh'),
(28, 'Farooqnagar', 'Andhra Pradesh'),
(29, 'Gadwal', 'Andhra Pradesh'),
(30, 'Gooty', 'Andhra Pradesh'),
(31, 'Gudivada', 'Andhra Pradesh'),
(32, 'Gudur', 'Andhra Pradesh'),
(33, 'Guntakal', 'Andhra Pradesh'),
(34, 'Guntur', 'Andhra Pradesh'),
(35, 'Hanuman Junction', 'Andhra Pradesh'),
(36, 'Hindupur', 'Andhra Pradesh'),
(37, 'Hyderabad', 'Andhra Pradesh'),
(38, 'Ichchapuram', 'Andhra Pradesh'),
(39, 'Jaggaiahpet', 'Andhra Pradesh'),
(40, 'Jagtial', 'Andhra Pradesh'),
(41, 'Jammalamadugu', 'Andhra Pradesh'),
(42, 'Jangaon', 'Andhra Pradesh'),
(43, 'Kadapa', 'Andhra Pradesh'),
(44, 'Kadiri', 'Andhra Pradesh'),
(45, 'Kagaznagar', 'Andhra Pradesh'),
(46, 'Kakinada', 'Andhra Pradesh'),
(47, 'Kalyandurg', 'Andhra Pradesh'),
(48, 'Kamareddy', 'Andhra Pradesh'),
(49, 'Kandukur', 'Andhra Pradesh'),
(50, 'Karimnagar', 'Andhra Pradesh'),
(51, 'Kavali', 'Andhra Pradesh'),
(52, 'Khammam', 'Andhra Pradesh'),
(53, 'Koratla', 'Andhra Pradesh'),
(54, 'Kothagudem', 'Andhra Pradesh'),
(55, 'Kothapeta', 'Andhra Pradesh'),
(56, 'Kovvur', 'Andhra Pradesh'),
(57, 'Kurnool', 'Andhra Pradesh'),
(58, 'Kyathampalle', 'Andhra Pradesh'),
(59, 'Macherla', 'Andhra Pradesh'),
(60, 'Machilipatnam', 'Andhra Pradesh'),
(61, 'Madanapalle', 'Andhra Pradesh'),
(62, 'Mahbubnagar', 'Andhra Pradesh'),
(63, 'Mancherial', 'Andhra Pradesh'),
(64, 'Mandamarri', 'Andhra Pradesh'),
(65, 'Mandapeta', 'Andhra Pradesh'),
(66, 'Manuguru', 'Andhra Pradesh'),
(67, 'Markapur', 'Andhra Pradesh'),
(68, 'Medak', 'Andhra Pradesh'),
(69, 'Miryalaguda', 'Andhra Pradesh'),
(70, 'Mogalthur', 'Andhra Pradesh'),
(71, 'Nagari', 'Andhra Pradesh'),
(72, 'Nagarkurnool', 'Andhra Pradesh'),
(73, 'Nandyal', 'Andhra Pradesh'),
(74, 'Narasapur', 'Andhra Pradesh'),
(75, 'Narasaraopet', 'Andhra Pradesh'),
(76, 'Narayanpet', 'Andhra Pradesh'),
(77, 'Narsipatnam', 'Andhra Pradesh'),
(78, 'Nellore', 'Andhra Pradesh'),
(79, 'Nidadavole', 'Andhra Pradesh'),
(80, 'Nirmal', 'Andhra Pradesh'),
(81, 'Nizamabad', 'Andhra Pradesh'),
(82, 'Nuzvid', 'Andhra Pradesh'),
(83, 'Ongole', 'Andhra Pradesh'),
(84, 'Palacole', 'Andhra Pradesh'),
(85, 'Palasa Kasibugga', 'Andhra Pradesh'),
(86, 'Palwancha', 'Andhra Pradesh'),
(87, 'Parvathipuram', 'Andhra Pradesh'),
(88, 'Pedana', 'Andhra Pradesh'),
(89, 'Peddapuram', 'Andhra Pradesh'),
(90, 'Pithapuram', 'Andhra Pradesh'),
(91, 'Pondur', 'Andhra pradesh'),
(92, 'Ponnur', 'Andhra Pradesh'),
(93, 'Proddatur', 'Andhra Pradesh'),
(94, 'Punganur', 'Andhra Pradesh'),
(95, 'Puttur', 'Andhra Pradesh'),
(96, 'Rajahmundry', 'Andhra Pradesh'),
(97, 'Rajam', 'Andhra Pradesh'),
(98, 'Ramachandrapuram', 'Andhra Pradesh'),
(99, 'Ramagundam', 'Andhra Pradesh'),
(100, 'Rayachoti', 'Andhra Pradesh'),
(101, 'Rayadurg', 'Andhra Pradesh'),
(102, 'Renigunta', 'Andhra Pradesh'),
(103, 'Repalle', 'Andhra Pradesh'),
(104, 'Sadasivpet', 'Andhra Pradesh'),
(105, 'Salur', 'Andhra Pradesh'),
(106, 'Samalkot', 'Andhra Pradesh'),
(107, 'Sangareddy', 'Andhra Pradesh'),
(108, 'Sattenapalle', 'Andhra Pradesh'),
(109, 'Siddipet', 'Andhra Pradesh'),
(110, 'Singapur', 'Andhra Pradesh'),
(111, 'Sircilla', 'Andhra Pradesh'),
(112, 'Srikakulam', 'Andhra Pradesh'),
(113, 'Srikalahasti', 'Andhra Pradesh'),
(115, 'Suryapet', 'Andhra Pradesh'),
(116, 'Tadepalligudem', 'Andhra Pradesh'),
(117, 'Tadpatri', 'Andhra Pradesh'),
(118, 'Tandur', 'Andhra Pradesh'),
(119, 'Tanuku', 'Andhra Pradesh'),
(120, 'Tenali', 'Andhra Pradesh'),
(121, 'Tirupati', 'Andhra Pradesh'),
(122, 'Tuni', 'Andhra Pradesh'),
(123, 'Uravakonda', 'Andhra Pradesh'),
(124, 'Venkatagiri', 'Andhra Pradesh'),
(125, 'Vicarabad', 'Andhra Pradesh'),
(126, 'Vijayawada', 'Andhra Pradesh'),
(127, 'Vinukonda', 'Andhra Pradesh'),
(128, 'Visakhapatnam', 'Andhra Pradesh'),
(129, 'Vizianagaram', 'Andhra Pradesh'),
(130, 'Wanaparthy', 'Andhra Pradesh'),
(131, 'Warangal', 'Andhra Pradesh'),
(132, 'Yellandu', 'Andhra Pradesh'),
(133, 'Yemmiganur', 'Andhra Pradesh'),
(134, 'Yerraguntla', 'Andhra Pradesh'),
(135, 'Zahirabad', 'Andhra Pradesh'),
(136, 'Rajampet', 'Andhra Pradesh'),
(137, 'Along', 'Arunachal Pradesh'),
(138, 'Bomdila', 'Arunachal Pradesh'),
(139, 'Itanagar', 'Arunachal Pradesh'),
(140, 'Naharlagun', 'Arunachal Pradesh'),
(141, 'Pasighat', 'Arunachal Pradesh'),
(142, 'Abhayapuri', 'Assam'),
(143, 'Amguri', 'Assam'),
(144, 'Anandnagaar', 'Assam'),
(145, 'Barpeta', 'Assam'),
(146, 'Barpeta Road', 'Assam'),
(147, 'Bilasipara', 'Assam'),
(148, 'Bongaigaon', 'Assam'),
(149, 'Dhekiajuli', 'Assam'),
(150, 'Dhubri', 'Assam'),
(151, 'Dibrugarh', 'Assam'),
(152, 'Digboi', 'Assam'),
(153, 'Diphu', 'Assam'),
(154, 'Dispur', 'Assam'),
(156, 'Gauripur', 'Assam'),
(157, 'Goalpara', 'Assam'),
(158, 'Golaghat', 'Assam'),
(159, 'Guwahati', 'Assam'),
(160, 'Haflong', 'Assam'),
(161, 'Hailakandi', 'Assam'),
(162, 'Hojai', 'Assam'),
(163, 'Jorhat', 'Assam'),
(164, 'Karimganj', 'Assam'),
(165, 'Kokrajhar', 'Assam'),
(166, 'Lanka', 'Assam'),
(167, 'Lumding', 'Assam'),
(168, 'Mangaldoi', 'Assam'),
(169, 'Mankachar', 'Assam'),
(170, 'Margherita', 'Assam'),
(171, 'Mariani', 'Assam'),
(172, 'Marigaon', 'Assam'),
(173, 'Nagaon', 'Assam'),
(174, 'Nalbari', 'Assam'),
(175, 'North Lakhimpur', 'Assam'),
(176, 'Rangia', 'Assam'),
(177, 'Sibsagar', 'Assam'),
(178, 'Silapathar', 'Assam'),
(179, 'Silchar', 'Assam'),
(180, 'Tezpur', 'Assam'),
(181, 'Tinsukia', 'Assam'),
(182, 'Amarpur', 'Bihar'),
(183, 'Araria', 'Bihar'),
(184, 'Areraj', 'Bihar'),
(185, 'Arrah', 'Bihar'),
(186, 'Asarganj', 'Bihar'),
(187, 'Aurangabad', 'Bihar'),
(188, 'Bagaha', 'Bihar'),
(189, 'Bahadurganj', 'Bihar'),
(190, 'Bairgania', 'Bihar'),
(191, 'Bakhtiarpur', 'Bihar'),
(192, 'Banka', 'Bihar'),
(193, 'Banmankhi Bazar', 'Bihar'),
(194, 'Barahiya', 'Bihar'),
(195, 'Barauli', 'Bihar'),
(196, 'Barbigha', 'Bihar'),
(197, 'Barh', 'Bihar'),
(198, 'Begusarai', 'Bihar'),
(199, 'Behea', 'Bihar'),
(200, 'Bettiah', 'Bihar'),
(201, 'Bhabua', 'Bihar'),
(202, 'Bhagalpur', 'Bihar'),
(203, 'Bihar Sharif', 'Bihar'),
(204, 'Bikramganj', 'Bihar'),
(205, 'Bodh Gaya', 'Bihar'),
(206, 'Buxar', 'Bihar'),
(207, 'Chandan Bara', 'Bihar'),
(208, 'Chanpatia', 'Bihar'),
(209, 'Chhapra', 'Bihar'),
(210, 'Colgong', 'Bihar'),
(211, 'Dalsinghsarai', 'Bihar'),
(212, 'Darbhanga', 'Bihar'),
(213, 'Daudnagar', 'Bihar'),
(214, 'Dehri-on-Sone', 'Bihar'),
(215, 'Dhaka', 'Bihar'),
(216, 'Dighwara', 'Bihar'),
(217, 'Dumraon', 'Bihar'),
(218, 'Fatwah', 'Bihar'),
(219, 'Forbesganj', 'Bihar'),
(220, 'Gaya', 'Bihar'),
(221, 'Gogri Jamalpur', 'Bihar'),
(222, 'Gopalganj', 'Bihar'),
(223, 'Hajipur', 'Bihar'),
(224, 'Hilsa', 'Bihar'),
(225, 'Hisua', 'Bihar'),
(226, 'Islampur', 'Bihar'),
(227, 'Jagdispur', 'Bihar'),
(228, 'Jamalpur', 'Bihar'),
(229, 'Jamui', 'Bihar'),
(230, 'Jehanabad', 'Bihar'),
(231, 'Jhajha', 'Bihar'),
(232, 'Jhanjharpur', 'Bihar'),
(233, 'Jogabani', 'Bihar'),
(234, 'Kanti', 'Bihar'),
(235, 'Katihar', 'Bihar'),
(236, 'Khagaria', 'Bihar'),
(237, 'Kharagpur', 'Bihar'),
(238, 'Kishanganj', 'Bihar'),
(239, 'Lakhisarai', 'Bihar'),
(240, 'Lalganj', 'Bihar'),
(241, 'Madhepura', 'Bihar'),
(242, 'Madhubani', 'Bihar'),
(243, 'Maharajganj', 'Bihar'),
(244, 'Mahnar Bazar', 'Bihar'),
(245, 'Makhdumpur', 'Bihar'),
(246, 'Maner', 'Bihar'),
(247, 'Manihari', 'Bihar'),
(248, 'Marhaura', 'Bihar'),
(249, 'Masaurhi', 'Bihar'),
(250, 'Mirganj', 'Bihar'),
(251, 'Mokameh', 'Bihar'),
(252, 'Motihari', 'Bihar'),
(253, 'Motipur', 'Bihar'),
(254, 'Munger', 'Bihar'),
(255, 'Murliganj', 'Bihar'),
(256, 'Muzaffarpur', 'Bihar'),
(257, 'Narkatiaganj', 'Bihar'),
(258, 'Naugachhia', 'Bihar'),
(259, 'Nawada', 'Bihar'),
(260, 'Nokha', 'Bihar'),
(261, 'Patna', 'Bihar'),
(262, 'Piro', 'Bihar'),
(263, 'Purnia', 'Bihar'),
(264, 'Rafiganj', 'Bihar'),
(265, 'Rajgir', 'Bihar'),
(266, 'Ramnagar', 'Bihar'),
(267, 'Raxaul Bazar', 'Bihar'),
(268, 'Revelganj', 'Bihar'),
(269, 'Rosera', 'Bihar'),
(270, 'Saharsa', 'Bihar'),
(271, 'Samastipur', 'Bihar'),
(272, 'Sasaram', 'Bihar'),
(273, 'Sheikhpura', 'Bihar'),
(274, 'Sheohar', 'Bihar'),
(275, 'Sherghati', 'Bihar'),
(276, 'Silao', 'Bihar'),
(277, 'Sitamarhi', 'Bihar'),
(278, 'Siwan', 'Bihar'),
(279, 'Sonepur', 'Bihar'),
(280, 'Sugauli', 'Bihar'),
(281, 'Sultanganj', 'Bihar'),
(282, 'Supaul', 'Bihar'),
(283, 'Warisaliganj', 'Bihar'),
(284, 'Ahiwara', 'Chhattisgarh'),
(285, 'Akaltara', 'Chhattisgarh'),
(286, 'Ambagarh Chowki', 'Chhattisgarh'),
(287, 'Ambikapur', 'Chhattisgarh'),
(288, 'Arang', 'Chhattisgarh'),
(289, 'Bade Bacheli', 'Chhattisgarh'),
(290, 'Balod', 'Chhattisgarh'),
(291, 'Baloda Bazar', 'Chhattisgarh'),
(292, 'Bemetra', 'Chhattisgarh'),
(293, 'Bhatapara', 'Chhattisgarh'),
(294, 'Bilaspur', 'Chhattisgarh'),
(295, 'Birgaon', 'Chhattisgarh'),
(296, 'Champa', 'Chhattisgarh'),
(297, 'Chirmiri', 'Chhattisgarh'),
(298, 'Dalli-Rajhara', 'Chhattisgarh'),
(299, 'Dhamtari', 'Chhattisgarh'),
(300, 'Dipka', 'Chhattisgarh'),
(301, 'Dongargarh', 'Chhattisgarh'),
(302, 'Durg-Bhilai Nagar', 'Chhattisgarh'),
(303, 'Gobranawapara', 'Chhattisgarh'),
(304, 'Jagdalpur', 'Chhattisgarh'),
(305, 'Janjgir', 'Chhattisgarh'),
(306, 'Jashpurnagar', 'Chhattisgarh'),
(307, 'Kanker', 'Chhattisgarh'),
(308, 'Kawardha', 'Chhattisgarh'),
(309, 'Kondagaon', 'Chhattisgarh'),
(310, 'Korba', 'Chhattisgarh'),
(311, 'Mahasamund', 'Chhattisgarh'),
(312, 'Mahendragarh', 'Chhattisgarh'),
(313, 'Mungeli', 'Chhattisgarh'),
(314, 'Naila Janjgir', 'Chhattisgarh'),
(315, 'Raigarh', 'Chhattisgarh'),
(316, 'Raipur', 'Chhattisgarh'),
(317, 'Rajnandgaon', 'Chhattisgarh'),
(318, 'Sakti', 'Chhattisgarh'),
(319, 'Tilda Newra', 'Chhattisgarh'),
(320, 'Amli', 'Dadra & Nagar Haveli'),
(321, 'Silvassa', 'Dadra & Nagar Haveli'),
(322, 'Daman and Diu', 'Daman & Diu'),
(323, 'Daman and Diu', 'Daman & Diu'),
(324, 'Asola', 'Delhi'),
(325, 'Delhi', 'Delhi'),
(326, 'Aldona', 'Goa'),
(327, 'Curchorem Cacora', 'Goa'),
(328, 'Madgaon', 'Goa'),
(329, 'Mapusa', 'Goa'),
(330, 'Margao', 'Goa'),
(331, 'Marmagao', 'Goa'),
(332, 'Panaji', 'Goa'),
(333, 'Ahmedabad', 'Gujarat'),
(334, 'Amreli', 'Gujarat'),
(335, 'Anand', 'Gujarat'),
(336, 'Ankleshwar', 'Gujarat'),
(337, 'Bharuch', 'Gujarat'),
(338, 'Bhavnagar', 'Gujarat'),
(339, 'Bhuj', 'Gujarat'),
(340, 'Cambay', 'Gujarat'),
(341, 'Dahod', 'Gujarat'),
(342, 'Deesa', 'Gujarat'),
(343, 'Dharampur', ' India'),
(344, 'Dholka', 'Gujarat'),
(345, 'Gandhinagar', 'Gujarat'),
(346, 'Godhra', 'Gujarat'),
(347, 'Himatnagar', 'Gujarat'),
(348, 'Idar', 'Gujarat'),
(349, 'Jamnagar', 'Gujarat'),
(350, 'Junagadh', 'Gujarat'),
(351, 'Kadi', 'Gujarat'),
(352, 'Kalavad', 'Gujarat'),
(353, 'Kalol', 'Gujarat'),
(354, 'Kapadvanj', 'Gujarat'),
(355, 'Karjan', 'Gujarat'),
(356, 'Keshod', 'Gujarat'),
(357, 'Khambhalia', 'Gujarat'),
(358, 'Khambhat', 'Gujarat'),
(359, 'Kheda', 'Gujarat'),
(360, 'Khedbrahma', 'Gujarat'),
(361, 'Kheralu', 'Gujarat'),
(362, 'Kodinar', 'Gujarat'),
(363, 'Lathi', 'Gujarat'),
(364, 'Limbdi', 'Gujarat'),
(365, 'Lunawada', 'Gujarat'),
(366, 'Mahesana', 'Gujarat'),
(367, 'Mahuva', 'Gujarat'),
(368, 'Manavadar', 'Gujarat'),
(369, 'Mandvi', 'Gujarat'),
(370, 'Mangrol', 'Gujarat'),
(371, 'Mansa', 'Gujarat'),
(372, 'Mehmedabad', 'Gujarat'),
(373, 'Modasa', 'Gujarat'),
(374, 'Morvi', 'Gujarat'),
(375, 'Nadiad', 'Gujarat'),
(376, 'Navsari', 'Gujarat'),
(377, 'Padra', 'Gujarat'),
(378, 'Palanpur', 'Gujarat'),
(379, 'Palitana', 'Gujarat'),
(380, 'Pardi', 'Gujarat'),
(381, 'Patan', 'Gujarat'),
(382, 'Petlad', 'Gujarat'),
(383, 'Porbandar', 'Gujarat'),
(384, 'Radhanpur', 'Gujarat'),
(385, 'Rajkot', 'Gujarat'),
(386, 'Rajpipla', 'Gujarat'),
(387, 'Rajula', 'Gujarat'),
(388, 'Ranavav', 'Gujarat'),
(389, 'Rapar', 'Gujarat'),
(390, 'Salaya', 'Gujarat'),
(391, 'Sanand', 'Gujarat'),
(392, 'Savarkundla', 'Gujarat'),
(393, 'Sidhpur', 'Gujarat'),
(394, 'Sihor', 'Gujarat'),
(395, 'Songadh', 'Gujarat'),
(396, 'Surat', 'Gujarat'),
(397, 'Talaja', 'Gujarat'),
(398, 'Thangadh', 'Gujarat'),
(399, 'Tharad', 'Gujarat'),
(400, 'Umbergaon', 'Gujarat'),
(401, 'Umreth', 'Gujarat'),
(402, 'Una', 'Gujarat'),
(403, 'Unjha', 'Gujarat'),
(404, 'Upleta', 'Gujarat'),
(405, 'Vadnagar', 'Gujarat'),
(406, 'Vadodara', 'Gujarat'),
(407, 'Valsad', 'Gujarat'),
(408, 'Vapi', 'Gujarat'),
(409, 'Vapi', 'Gujarat'),
(410, 'Veraval', 'Gujarat'),
(411, 'Vijapur', 'Gujarat'),
(412, 'Viramgam', 'Gujarat'),
(413, 'Visnagar', 'Gujarat'),
(414, 'Vyara', 'Gujarat'),
(415, 'Wadhwan', 'Gujarat'),
(416, 'Wankaner', 'Gujarat'),
(417, 'Adalaj', 'Gujrat'),
(418, 'Adityana', 'Gujrat'),
(419, 'Alang', 'Gujrat'),
(420, 'Ambaji', 'Gujrat'),
(421, 'Ambaliyasan', 'Gujrat'),
(422, 'Andada', 'Gujrat'),
(423, 'Anjar', 'Gujrat'),
(424, 'Anklav', 'Gujrat'),
(425, 'Antaliya', 'Gujrat'),
(426, 'Arambhada', 'Gujrat'),
(427, 'Atul', 'Gujrat'),
(428, 'Ballabhgarh', 'Hariyana'),
(429, 'Ambala', 'Haryana'),
(430, 'Ambala', 'Haryana'),
(431, 'Asankhurd', 'Haryana'),
(432, 'Assandh', 'Haryana'),
(433, 'Ateli', 'Haryana'),
(434, 'Babiyal', 'Haryana'),
(435, 'Bahadurgarh', 'Haryana'),
(436, 'Barwala', 'Haryana'),
(437, 'Bhiwani', 'Haryana'),
(438, 'Charkhi Dadri', 'Haryana'),
(439, 'Cheeka', 'Haryana'),
(440, 'Ellenabad 2', 'Haryana'),
(441, 'Faridabad', 'Haryana'),
(442, 'Fatehabad', 'Haryana'),
(443, 'Ganaur', 'Haryana'),
(444, 'Gharaunda', 'Haryana'),
(445, 'Gohana', 'Haryana'),
(446, 'Gurgaon', 'Haryana'),
(447, 'Haibat(Yamuna Nagar)', 'Haryana'),
(448, 'Hansi', 'Haryana'),
(449, 'Hisar', 'Haryana'),
(450, 'Hodal', 'Haryana'),
(451, 'Jhajjar', 'Haryana'),
(452, 'Jind', 'Haryana'),
(453, 'Kaithal', 'Haryana'),
(454, 'Kalan Wali', 'Haryana'),
(455, 'Kalka', 'Haryana'),
(456, 'Karnal', 'Haryana'),
(457, 'Ladwa', 'Haryana'),
(458, 'Mahendragarh', 'Haryana'),
(459, 'Mandi Dabwali', 'Haryana'),
(460, 'Narnaul', 'Haryana'),
(461, 'Narwana', 'Haryana'),
(462, 'Palwal', 'Haryana'),
(463, 'Panchkula', 'Haryana'),
(464, 'Panipat', 'Haryana'),
(465, 'Pehowa', 'Haryana'),
(466, 'Pinjore', 'Haryana'),
(467, 'Rania', 'Haryana'),
(468, 'Ratia', 'Haryana'),
(469, 'Rewari', 'Haryana'),
(470, 'Rohtak', 'Haryana'),
(471, 'Safidon', 'Haryana'),
(472, 'Samalkha', 'Haryana'),
(473, 'Shahbad', 'Haryana'),
(474, 'Sirsa', 'Haryana'),
(475, 'Sohna', 'Haryana'),
(476, 'Sonipat', 'Haryana'),
(477, 'Taraori', 'Haryana'),
(478, 'Thanesar', 'Haryana'),
(479, 'Tohana', 'Haryana'),
(480, 'Yamunanagar', 'Haryana'),
(481, 'Arki', 'Himachal Pradesh'),
(482, 'Baddi', 'Himachal Pradesh'),
(483, 'Bilaspur', 'Himachal Pradesh'),
(484, 'Chamba', 'Himachal Pradesh'),
(485, 'Dalhousie', 'Himachal Pradesh'),
(486, 'Dharamsala', 'Himachal Pradesh'),
(487, 'Hamirpur', 'Himachal Pradesh'),
(488, 'Mandi', 'Himachal Pradesh'),
(489, 'Nahan', 'Himachal Pradesh'),
(490, 'Shimla', 'Himachal Pradesh'),
(491, 'Solan', 'Himachal Pradesh'),
(492, 'Sundarnagar', 'Himachal Pradesh'),
(493, 'Jammu', 'Jammu & Kashmir'),
(494, 'Achabbal', 'Jammu & Kashmir'),
(495, 'Akhnoor', 'Jammu & Kashmir'),
(496, 'Anantnag', 'Jammu & Kashmir'),
(497, 'Arnia', 'Jammu & Kashmir'),
(498, 'Awantipora', 'Jammu & Kashmir'),
(499, 'Bandipore', 'Jammu & Kashmir'),
(500, 'Baramula', 'Jammu & Kashmir'),
(501, 'Kathua', 'Jammu & Kashmir'),
(502, 'Leh', 'Jammu & Kashmir'),
(503, 'Punch', 'Jammu & Kashmir'),
(504, 'Rajauri', 'Jammu & Kashmir'),
(505, 'Sopore', 'Jammu & Kashmir'),
(506, 'Srinagar', 'Jammu & Kashmir'),
(507, 'Udhampur', 'Jammu & Kashmir'),
(508, 'Amlabad', 'Jharkhand'),
(509, 'Ara', 'Jharkhand'),
(510, 'Barughutu', 'Jharkhand'),
(511, 'Bokaro Steel City', 'Jharkhand'),
(512, 'Chaibasa', 'Jharkhand'),
(513, 'Chakradharpur', 'Jharkhand'),
(514, 'Chandrapura', 'Jharkhand'),
(515, 'Chatra', 'Jharkhand'),
(516, 'Chirkunda', 'Jharkhand'),
(517, 'Churi', 'Jharkhand'),
(518, 'Daltonganj', 'Jharkhand'),
(519, 'Deoghar', 'Jharkhand'),
(520, 'Dhanbad', 'Jharkhand'),
(521, 'Dumka', 'Jharkhand'),
(522, 'Garhwa', 'Jharkhand'),
(523, 'Ghatshila', 'Jharkhand'),
(524, 'Giridih', 'Jharkhand'),
(525, 'Godda', 'Jharkhand'),
(526, 'Gomoh', 'Jharkhand'),
(527, 'Gumia', 'Jharkhand'),
(528, 'Gumla', 'Jharkhand'),
(529, 'Hazaribag', 'Jharkhand'),
(530, 'Hussainabad', 'Jharkhand'),
(531, 'Jamshedpur', 'Jharkhand'),
(532, 'Jamtara', 'Jharkhand'),
(533, 'Jhumri Tilaiya', 'Jharkhand'),
(534, 'Khunti', 'Jharkhand'),
(535, 'Lohardaga', 'Jharkhand'),
(536, 'Madhupur', 'Jharkhand'),
(537, 'Mihijam', 'Jharkhand'),
(538, 'Musabani', 'Jharkhand'),
(539, 'Pakaur', 'Jharkhand'),
(540, 'Patratu', 'Jharkhand'),
(541, 'Phusro', 'Jharkhand'),
(542, 'Ramngarh', 'Jharkhand'),
(543, 'Ranchi', 'Jharkhand'),
(544, 'Sahibganj', 'Jharkhand'),
(545, 'Saunda', 'Jharkhand'),
(546, 'Simdega', 'Jharkhand'),
(547, 'Tenu Dam-cum- Kathhara', 'Jharkhand'),
(548, 'Arasikere', 'Karnataka'),
(549, 'Bangalore', 'Karnataka'),
(550, 'Belgaum', 'Karnataka'),
(551, 'Bellary', 'Karnataka'),
(552, 'Chamrajnagar', 'Karnataka'),
(553, 'Chikkaballapur', 'Karnataka'),
(554, 'Chintamani', 'Karnataka'),
(555, 'Chitradurga', 'Karnataka'),
(556, 'Gulbarga', 'Karnataka'),
(557, 'Gundlupet', 'Karnataka'),
(558, 'Hassan', 'Karnataka'),
(559, 'Hospet', 'Karnataka'),
(560, 'Hubli', 'Karnataka'),
(561, 'Karkala', 'Karnataka'),
(562, 'Karwar', 'Karnataka'),
(563, 'Kolar', 'Karnataka'),
(564, 'Kota', 'Karnataka'),
(565, 'Lakshmeshwar', 'Karnataka'),
(566, 'Lingsugur', 'Karnataka'),
(567, 'Maddur', 'Karnataka'),
(568, 'Madhugiri', 'Karnataka'),
(569, 'Madikeri', 'Karnataka'),
(570, 'Magadi', 'Karnataka'),
(571, 'Mahalingpur', 'Karnataka'),
(572, 'Malavalli', 'Karnataka'),
(573, 'Malur', 'Karnataka'),
(574, 'Mandya', 'Karnataka'),
(575, 'Mangalore', 'Karnataka'),
(576, 'Manvi', 'Karnataka'),
(577, 'Mudalgi', 'Karnataka'),
(578, 'Mudbidri', 'Karnataka'),
(579, 'Muddebihal', 'Karnataka'),
(580, 'Mudhol', 'Karnataka'),
(581, 'Mulbagal', 'Karnataka'),
(582, 'Mundargi', 'Karnataka'),
(583, 'Mysore', 'Karnataka'),
(584, 'Nanjangud', 'Karnataka'),
(585, 'Pavagada', 'Karnataka'),
(586, 'Puttur', 'Karnataka'),
(587, 'Rabkavi Banhatti', 'Karnataka'),
(588, 'Raichur', 'Karnataka'),
(589, 'Ramanagaram', 'Karnataka'),
(590, 'Ramdurg', 'Karnataka'),
(591, 'Ranibennur', 'Karnataka'),
(592, 'Robertson Pet', 'Karnataka'),
(593, 'Ron', 'Karnataka'),
(594, 'Sadalgi', 'Karnataka'),
(595, 'Sagar', 'Karnataka'),
(596, 'Sakleshpur', 'Karnataka'),
(597, 'Sandur', 'Karnataka'),
(598, 'Sankeshwar', 'Karnataka'),
(599, 'Saundatti-Yellamma', 'Karnataka'),
(600, 'Savanur', 'Karnataka'),
(601, 'Sedam', 'Karnataka'),
(602, 'Shahabad', 'Karnataka'),
(603, 'Shahpur', 'Karnataka'),
(604, 'Shiggaon', 'Karnataka'),
(605, 'Shikapur', 'Karnataka'),
(606, 'Shimoga', 'Karnataka'),
(607, 'Shorapur', 'Karnataka'),
(608, 'Shrirangapattana', 'Karnataka'),
(609, 'Sidlaghatta', 'Karnataka'),
(610, 'Sindgi', 'Karnataka'),
(611, 'Sindhnur', 'Karnataka'),
(612, 'Sira', 'Karnataka'),
(613, 'Sirsi', 'Karnataka'),
(614, 'Siruguppa', 'Karnataka'),
(615, 'Srinivaspur', 'Karnataka'),
(616, 'Talikota', 'Karnataka'),
(617, 'Tarikere', 'Karnataka'),
(618, 'Tekkalakota', 'Karnataka'),
(619, 'Terdal', 'Karnataka'),
(620, 'Tiptur', 'Karnataka'),
(621, 'Tumkur', 'Karnataka'),
(622, 'Udupi', 'Karnataka'),
(623, 'Vijayapura', 'Karnataka'),
(624, 'Wadi', 'Karnataka'),
(625, 'Yadgir', 'Karnataka'),
(626, 'Adoor', 'Kerala'),
(627, 'Akathiyoor', 'Kerala'),
(628, 'Alappuzha', 'Kerala'),
(629, 'Ancharakandy', 'Kerala'),
(630, 'Aroor', 'Kerala'),
(631, 'Ashtamichira', 'Kerala'),
(632, 'Attingal', 'Kerala'),
(633, 'Avinissery', 'Kerala'),
(634, 'Chalakudy', 'Kerala'),
(635, 'Changanassery', 'Kerala'),
(636, 'Chendamangalam', 'Kerala'),
(637, 'Chengannur', 'Kerala'),
(638, 'Cherthala', 'Kerala'),
(639, 'Cheruthazham', 'Kerala'),
(640, 'Chittur-Thathamangalam', 'Kerala'),
(641, 'Chockli', 'Kerala'),
(642, 'Erattupetta', 'Kerala'),
(643, 'Guruvayoor', 'Kerala'),
(644, 'Irinjalakuda', 'Kerala'),
(645, 'Kadirur', 'Kerala'),
(646, 'Kalliasseri', 'Kerala'),
(647, 'Kalpetta', 'Kerala'),
(648, 'Kanhangad', 'Kerala'),
(649, 'Kanjikkuzhi', 'Kerala'),
(650, 'Kannur', 'Kerala'),
(651, 'Kasaragod', 'Kerala'),
(652, 'Kayamkulam', 'Kerala'),
(653, 'Kochi', 'Kerala'),
(654, 'Kodungallur', 'Kerala'),
(655, 'Kollam', 'Kerala'),
(656, 'Koothuparamba', 'Kerala'),
(657, 'Kothamangalam', 'Kerala'),
(658, 'Kottayam', 'Kerala'),
(659, 'Kozhikode', 'Kerala'),
(660, 'Kunnamkulam', 'Kerala'),
(661, 'Malappuram', 'Kerala'),
(662, 'Mattannur', 'Kerala'),
(663, 'Mavelikkara', 'Kerala'),
(664, 'Mavoor', 'Kerala'),
(665, 'Muvattupuzha', 'Kerala'),
(666, 'Nedumangad', 'Kerala'),
(667, 'Neyyattinkara', 'Kerala'),
(668, 'Ottappalam', 'Kerala'),
(669, 'Palai', 'Kerala'),
(670, 'Palakkad', 'Kerala'),
(671, 'Panniyannur', 'Kerala'),
(672, 'Pappinisseri', 'Kerala'),
(673, 'Paravoor', 'Kerala'),
(674, 'Pathanamthitta', 'Kerala'),
(675, 'Payyannur', 'Kerala'),
(676, 'Peringathur', 'Kerala'),
(677, 'Perinthalmanna', 'Kerala'),
(678, 'Perumbavoor', 'Kerala'),
(679, 'Ponnani', 'Kerala'),
(680, 'Punalur', 'Kerala'),
(681, 'Quilandy', 'Kerala'),
(682, 'Shoranur', 'Kerala'),
(683, 'Taliparamba', 'Kerala'),
(684, 'Thiruvalla', 'Kerala'),
(685, 'Thiruvananthapuram', 'Kerala'),
(686, 'Thodupuzha', 'Kerala'),
(687, 'Thrissur', 'Kerala'),
(688, 'Tirur', 'Kerala'),
(689, 'Vadakara', 'Kerala'),
(690, 'Vaikom', 'Kerala'),
(691, 'Varkala', 'Kerala'),
(692, 'Kavaratti', 'Lakshadweep'),
(693, 'Ashok Nagar', 'Madhya Pradesh'),
(694, 'Balaghat', 'Madhya Pradesh'),
(695, 'Betul', 'Madhya Pradesh'),
(696, 'Bhopal', 'Madhya Pradesh'),
(697, 'Burhanpur', 'Madhya Pradesh'),
(698, 'Chhatarpur', 'Madhya Pradesh'),
(699, 'Dabra', 'Madhya Pradesh'),
(700, 'Datia', 'Madhya Pradesh'),
(701, 'Dewas', 'Madhya Pradesh'),
(702, 'Dhar', 'Madhya Pradesh'),
(703, 'Fatehabad', 'Madhya Pradesh'),
(704, 'Gwalior', 'Madhya Pradesh'),
(705, 'Indore', 'Madhya Pradesh'),
(706, 'Itarsi', 'Madhya Pradesh'),
(707, 'Jabalpur', 'Madhya Pradesh'),
(708, 'Katni', 'Madhya Pradesh'),
(709, 'Kotma', 'Madhya Pradesh'),
(710, 'Lahar', 'Madhya Pradesh'),
(711, 'Lundi', 'Madhya Pradesh'),
(712, 'Maharajpur', 'Madhya Pradesh'),
(713, 'Mahidpur', 'Madhya Pradesh'),
(714, 'Maihar', 'Madhya Pradesh'),
(715, 'Malajkhand', 'Madhya Pradesh'),
(716, 'Manasa', 'Madhya Pradesh'),
(717, 'Manawar', 'Madhya Pradesh'),
(718, 'Mandideep', 'Madhya Pradesh'),
(719, 'Mandla', 'Madhya Pradesh'),
(720, 'Mandsaur', 'Madhya Pradesh'),
(721, 'Mauganj', 'Madhya Pradesh'),
(722, 'Mhow Cantonment', 'Madhya Pradesh'),
(723, 'Mhowgaon', 'Madhya Pradesh'),
(724, 'Morena', 'Madhya Pradesh'),
(725, 'Multai', 'Madhya Pradesh'),
(726, 'Murwara', 'Madhya Pradesh'),
(727, 'Nagda', 'Madhya Pradesh'),
(728, 'Nainpur', 'Madhya Pradesh'),
(729, 'Narsinghgarh', 'Madhya Pradesh'),
(730, 'Narsinghgarh', 'Madhya Pradesh'),
(731, 'Neemuch', 'Madhya Pradesh'),
(732, 'Nepanagar', 'Madhya Pradesh'),
(733, 'Niwari', 'Madhya Pradesh'),
(734, 'Nowgong', 'Madhya Pradesh'),
(735, 'Nowrozabad', 'Madhya Pradesh'),
(736, 'Pachore', 'Madhya Pradesh'),
(737, 'Pali', 'Madhya Pradesh'),
(738, 'Panagar', 'Madhya Pradesh'),
(739, 'Pandhurna', 'Madhya Pradesh'),
(740, 'Panna', 'Madhya Pradesh'),
(741, 'Pasan', 'Madhya Pradesh'),
(742, 'Pipariya', 'Madhya Pradesh'),
(743, 'Pithampur', 'Madhya Pradesh'),
(744, 'Porsa', 'Madhya Pradesh'),
(745, 'Prithvipur', 'Madhya Pradesh'),
(746, 'Raghogarh-Vijaypur', 'Madhya Pradesh'),
(747, 'Rahatgarh', 'Madhya Pradesh'),
(748, 'Raisen', 'Madhya Pradesh'),
(749, 'Rajgarh', 'Madhya Pradesh'),
(750, 'Ratlam', 'Madhya Pradesh'),
(751, 'Rau', 'Madhya Pradesh'),
(752, 'Rehli', 'Madhya Pradesh'),
(753, 'Rewa', 'Madhya Pradesh'),
(754, 'Sabalgarh', 'Madhya Pradesh'),
(755, 'Sagar', 'Madhya Pradesh'),
(756, 'Sanawad', 'Madhya Pradesh'),
(757, 'Sarangpur', 'Madhya Pradesh'),
(758, 'Sarni', 'Madhya Pradesh'),
(759, 'Satna', 'Madhya Pradesh'),
(760, 'Sausar', 'Madhya Pradesh'),
(761, 'Sehore', 'Madhya Pradesh'),
(762, 'Sendhwa', 'Madhya Pradesh'),
(763, 'Seoni', 'Madhya Pradesh'),
(764, 'Seoni-Malwa', 'Madhya Pradesh'),
(765, 'Shahdol', 'Madhya Pradesh'),
(766, 'Shajapur', 'Madhya Pradesh'),
(767, 'Shamgarh', 'Madhya Pradesh'),
(768, 'Sheopur', 'Madhya Pradesh'),
(769, 'Shivpuri', 'Madhya Pradesh'),
(770, 'Shujalpur', 'Madhya Pradesh'),
(771, 'Sidhi', 'Madhya Pradesh'),
(772, 'Sihora', 'Madhya Pradesh'),
(773, 'Singrauli', 'Madhya Pradesh'),
(774, 'Sironj', 'Madhya Pradesh'),
(775, 'Sohagpur', 'Madhya Pradesh'),
(776, 'Tarana', 'Madhya Pradesh'),
(777, 'Tikamgarh', 'Madhya Pradesh'),
(778, 'Ujhani', 'Madhya Pradesh'),
(779, 'Ujjain', 'Madhya Pradesh'),
(780, 'Umaria', 'Madhya Pradesh'),
(781, 'Vidisha', 'Madhya Pradesh'),
(782, 'Wara Seoni', 'Madhya Pradesh'),
(783, 'Ahmednagar', 'Maharashtra'),
(784, 'Akola', 'Maharashtra'),
(785, 'Amravati', 'Maharashtra'),
(786, 'Aurangabad', 'Maharashtra'),
(787, 'Baramati', 'Maharashtra'),
(788, 'Chalisgaon', 'Maharashtra'),
(789, 'Chinchani', 'Maharashtra'),
(790, 'Devgarh', 'Maharashtra'),
(791, 'Dhule', 'Maharashtra'),
(792, 'Dombivli', 'Maharashtra'),
(793, 'Durgapur', 'Maharashtra'),
(794, 'Ichalkaranji', 'Maharashtra'),
(795, 'Jalna', 'Maharashtra'),
(796, 'Kalyan', 'Maharashtra'),
(797, 'Latur', 'Maharashtra'),
(798, 'Loha', 'Maharashtra'),
(799, 'Lonar', 'Maharashtra'),
(800, 'Lonavla', 'Maharashtra'),
(801, 'Mahad', 'Maharashtra'),
(802, 'Mahuli', 'Maharashtra'),
(803, 'Malegaon', 'Maharashtra'),
(804, 'Malkapur', 'Maharashtra'),
(805, 'Manchar', 'Maharashtra'),
(806, 'Mangalvedhe', 'Maharashtra'),
(807, 'Mangrulpir', 'Maharashtra'),
(808, 'Manjlegaon', 'Maharashtra'),
(809, 'Manmad', 'Maharashtra'),
(810, 'Manwath', 'Maharashtra'),
(811, 'Mehkar', 'Maharashtra'),
(812, 'Mhaswad', 'Maharashtra'),
(813, 'Miraj', 'Maharashtra'),
(814, 'Morshi', 'Maharashtra'),
(815, 'Mukhed', 'Maharashtra'),
(816, 'Mul', 'Maharashtra'),
(817, 'Mumbai', 'Maharashtra'),
(818, 'Murtijapur', 'Maharashtra'),
(819, 'Nagpur', 'Maharashtra'),
(820, 'Nalasopara', 'Maharashtra'),
(821, 'Nanded-Waghala', 'Maharashtra'),
(822, 'Nandgaon', 'Maharashtra'),
(823, 'Nandura', 'Maharashtra'),
(824, 'Nandurbar', 'Maharashtra'),
(825, 'Narkhed', 'Maharashtra'),
(826, 'Nashik', 'Maharashtra'),
(827, 'Navi Mumbai', 'Maharashtra'),
(828, 'Nawapur', 'Maharashtra'),
(829, 'Nilanga', 'Maharashtra'),
(830, 'Osmanabad', 'Maharashtra'),
(831, 'Ozar', 'Maharashtra'),
(832, 'Pachora', 'Maharashtra'),
(833, 'Paithan', 'Maharashtra'),
(834, 'Palghar', 'Maharashtra'),
(835, 'Pandharkaoda', 'Maharashtra'),
(836, 'Pandharpur', 'Maharashtra'),
(837, 'Panvel', 'Maharashtra'),
(838, 'Parbhani', 'Maharashtra'),
(839, 'Parli', 'Maharashtra'),
(840, 'Parola', 'Maharashtra'),
(841, 'Partur', 'Maharashtra'),
(842, 'Pathardi', 'Maharashtra'),
(843, 'Pathri', 'Maharashtra'),
(844, 'Patur', 'Maharashtra'),
(845, 'Pauni', 'Maharashtra'),
(846, 'Pen', 'Maharashtra'),
(847, 'Phaltan', 'Maharashtra'),
(848, 'Pulgaon', 'Maharashtra'),
(849, 'Pune', 'Maharashtra'),
(850, 'Purna', 'Maharashtra'),
(851, 'Pusad', 'Maharashtra'),
(852, 'Rahuri', 'Maharashtra'),
(853, 'Rajura', 'Maharashtra'),
(854, 'Ramtek', 'Maharashtra'),
(855, 'Ratnagiri', 'Maharashtra'),
(856, 'Raver', 'Maharashtra'),
(857, 'Risod', 'Maharashtra'),
(858, 'Sailu', 'Maharashtra'),
(859, 'Sangamner', 'Maharashtra'),
(860, 'Sangli', 'Maharashtra'),
(861, 'Sangole', 'Maharashtra'),
(862, 'Sasvad', 'Maharashtra'),
(863, 'Satana', 'Maharashtra'),
(864, 'Satara', 'Maharashtra'),
(865, 'Savner', 'Maharashtra'),
(866, 'Sawantwadi', 'Maharashtra'),
(867, 'Shahade', 'Maharashtra'),
(868, 'Shegaon', 'Maharashtra'),
(869, 'Shendurjana', 'Maharashtra'),
(870, 'Shirdi', 'Maharashtra'),
(871, 'Shirpur-Warwade', 'Maharashtra'),
(872, 'Shirur', 'Maharashtra'),
(873, 'Shrigonda', 'Maharashtra'),
(874, 'Shrirampur', 'Maharashtra'),
(875, 'Sillod', 'Maharashtra'),
(876, 'Sinnar', 'Maharashtra'),
(877, 'Solapur', 'Maharashtra'),
(878, 'Soyagaon', 'Maharashtra'),
(879, 'Talegaon Dabhade', 'Maharashtra'),
(880, 'Talode', 'Maharashtra'),
(881, 'Tasgaon', 'Maharashtra'),
(882, 'Tirora', 'Maharashtra'),
(883, 'Tuljapur', 'Maharashtra'),
(884, 'Tumsar', 'Maharashtra'),
(885, 'Uran', 'Maharashtra'),
(886, 'Uran Islampur', 'Maharashtra'),
(887, 'Wadgaon Road', 'Maharashtra'),
(888, 'Wai', 'Maharashtra'),
(889, 'Wani', 'Maharashtra'),
(890, 'Wardha', 'Maharashtra'),
(891, 'Warora', 'Maharashtra'),
(892, 'Warud', 'Maharashtra'),
(893, 'Washim', 'Maharashtra'),
(894, 'Yevla', 'Maharashtra'),
(895, 'Uchgaon', 'Maharashtra'),
(896, 'Udgir', 'Maharashtra'),
(897, 'Umarga', 'Maharastra'),
(898, 'Umarkhed', 'Maharastra'),
(899, 'Umred', 'Maharastra'),
(900, 'Vadgaon Kasba', 'Maharastra'),
(901, 'Vaijapur', 'Maharastra'),
(902, 'Vasai', 'Maharastra'),
(903, 'Virar', 'Maharastra'),
(904, 'Vita', 'Maharastra'),
(905, 'Yavatmal', 'Maharastra'),
(906, 'Yawal', 'Maharastra'),
(907, 'Imphal', 'Manipur'),
(908, 'Kakching', 'Manipur'),
(909, 'Lilong', 'Manipur'),
(910, 'Mayang Imphal', 'Manipur'),
(911, 'Thoubal', 'Manipur'),
(912, 'Jowai', 'Meghalaya'),
(913, 'Nongstoin', 'Meghalaya'),
(914, 'Shillong', 'Meghalaya'),
(915, 'Tura', 'Meghalaya'),
(916, 'Aizawl', 'Mizoram'),
(917, 'Champhai', 'Mizoram'),
(918, 'Lunglei', 'Mizoram'),
(919, 'Saiha', 'Mizoram'),
(920, 'Dimapur', 'Nagaland'),
(921, 'Kohima', 'Nagaland'),
(922, 'Mokokchung', 'Nagaland'),
(923, 'Tuensang', 'Nagaland'),
(924, 'Wokha', 'Nagaland'),
(925, 'Zunheboto', 'Nagaland'),
(950, 'Anandapur', 'Orissa'),
(951, 'Anugul', 'Orissa'),
(952, 'Asika', 'Orissa'),
(953, 'Balangir', 'Orissa'),
(954, 'Balasore', 'Orissa'),
(955, 'Baleshwar', 'Orissa'),
(956, 'Bamra', 'Orissa'),
(957, 'Barbil', 'Orissa'),
(958, 'Bargarh', 'Orissa'),
(959, 'Bargarh', 'Orissa'),
(960, 'Baripada', 'Orissa'),
(961, 'Basudebpur', 'Orissa'),
(962, 'Belpahar', 'Orissa'),
(963, 'Bhadrak', 'Orissa'),
(964, 'Bhawanipatna', 'Orissa'),
(965, 'Bhuban', 'Orissa'),
(966, 'Bhubaneswar', 'Orissa'),
(967, 'Biramitrapur', 'Orissa'),
(968, 'Brahmapur', 'Orissa'),
(969, 'Brajrajnagar', 'Orissa'),
(970, 'Byasanagar', 'Orissa'),
(971, 'Cuttack', 'Orissa'),
(972, 'Debagarh', 'Orissa'),
(973, 'Dhenkanal', 'Orissa'),
(974, 'Gunupur', 'Orissa'),
(975, 'Hinjilicut', 'Orissa'),
(976, 'Jagatsinghapur', 'Orissa'),
(977, 'Jajapur', 'Orissa'),
(978, 'Jaleswar', 'Orissa'),
(979, 'Jatani', 'Orissa'),
(980, 'Jeypur', 'Orissa'),
(981, 'Jharsuguda', 'Orissa'),
(982, 'Joda', 'Orissa'),
(983, 'Kantabanji', 'Orissa'),
(984, 'Karanjia', 'Orissa'),
(985, 'Kendrapara', 'Orissa'),
(986, 'Kendujhar', 'Orissa'),
(987, 'Khordha', 'Orissa'),
(988, 'Koraput', 'Orissa'),
(989, 'Malkangiri', 'Orissa'),
(990, 'Nabarangapur', 'Orissa'),
(991, 'Paradip', 'Orissa'),
(992, 'Parlakhemundi', 'Orissa'),
(993, 'Pattamundai', 'Orissa'),
(994, 'Phulabani', 'Orissa'),
(995, 'Puri', 'Orissa'),
(996, 'Rairangpur', 'Orissa'),
(997, 'Rajagangapur', 'Orissa'),
(998, 'Raurkela', 'Orissa'),
(999, 'Rayagada', 'Orissa'),
(1000, 'Sambalpur', 'Orissa'),
(1001, 'Soro', 'Orissa'),
(1002, 'Sunabeda', 'Orissa'),
(1003, 'Sundargarh', 'Orissa'),
(1004, 'Talcher', 'Orissa'),
(1005, 'Titlagarh', 'Orissa'),
(1006, 'Umarkote', 'Orissa'),
(1007, 'Karaikal', 'Pondicherry'),
(1008, 'Mahe', 'Pondicherry'),
(1009, 'Pondicherry', 'Pondicherry'),
(1010, 'Yanam', 'Pondicherry'),
(1011, 'Ahmedgarh', 'Punjab'),
(1012, 'Amritsar', 'Punjab'),
(1013, 'Barnala', 'Punjab'),
(1014, 'Batala', 'Punjab'),
(1015, 'Bathinda', 'Punjab'),
(1016, 'Bhagha Purana', 'Punjab'),
(1017, 'Budhlada', 'Punjab'),
(1018, 'Chandigarh', 'Punjab'),
(1019, 'Dasua', 'Punjab'),
(1020, 'Dhuri', 'Punjab'),
(1021, 'Dinanagar', 'Punjab'),
(1022, 'Faridkot', 'Punjab'),
(1023, 'Fazilka', 'Punjab'),
(1024, 'Firozpur', 'Punjab'),
(1025, 'Firozpur Cantt.', 'Punjab'),
(1026, 'Giddarbaha', 'Punjab'),
(1027, 'Gobindgarh', 'Punjab'),
(1028, 'Gurdaspur', 'Punjab'),
(1029, 'Hoshiarpur', 'Punjab'),
(1030, 'Jagraon', 'Punjab'),
(1031, 'Jaitu', 'Punjab'),
(1032, 'Jalalabad', 'Punjab'),
(1033, 'Jalandhar', 'Punjab'),
(1034, 'Jalandhar Cantt.', 'Punjab'),
(1035, 'Jandiala', 'Punjab'),
(1036, 'Kapurthala', 'Punjab'),
(1037, 'Karoran', 'Punjab'),
(1038, 'Kartarpur', 'Punjab'),
(1039, 'Khanna', 'Punjab'),
(1040, 'Kharar', 'Punjab'),
(1041, 'Kot Kapura', 'Punjab'),
(1042, 'Kurali', 'Punjab'),
(1043, 'Longowal', 'Punjab'),
(1044, 'Ludhiana', 'Punjab'),
(1045, 'Malerkotla', 'Punjab'),
(1046, 'Malout', 'Punjab'),
(1047, 'Mansa', 'Punjab'),
(1048, 'Maur', 'Punjab'),
(1049, 'Moga', 'Punjab'),
(1050, 'Mohali', 'Punjab'),
(1051, 'Morinda', 'Punjab'),
(1052, 'Mukerian', 'Punjab'),
(1053, 'Muktsar', 'Punjab'),
(1054, 'Nabha', 'Punjab'),
(1055, 'Nakodar', 'Punjab'),
(1056, 'Nangal', 'Punjab'),
(1057, 'Nawanshahr', 'Punjab'),
(1058, 'Pathankot', 'Punjab'),
(1059, 'Patiala', 'Punjab'),
(1060, 'Patran', 'Punjab'),
(1061, 'Patti', 'Punjab'),
(1062, 'Phagwara', 'Punjab'),
(1063, 'Phillaur', 'Punjab'),
(1064, 'Qadian', 'Punjab'),
(1065, 'Raikot', 'Punjab'),
(1066, 'Rajpura', 'Punjab'),
(1067, 'Rampura Phul', 'Punjab'),
(1068, 'Rupnagar', 'Punjab'),
(1069, 'Samana', 'Punjab'),
(1070, 'Sangrur', 'Punjab'),
(1071, 'Sirhind Fatehgarh Sahib', 'Punjab'),
(1072, 'Sujanpur', 'Punjab'),
(1073, 'Sunam', 'Punjab'),
(1074, 'Talwara', 'Punjab'),
(1075, 'Tarn Taran', 'Punjab'),
(1076, 'Urmar Tanda', 'Punjab'),
(1077, 'Zira', 'Punjab'),
(1078, 'Zirakpur', 'Punjab'),
(1079, 'Bali', 'Rajasthan'),
(1080, 'Banswara', 'Rajastan'),
(1081, 'Ajmer', 'Rajasthan'),
(1082, 'Alwar', 'Rajasthan'),
(1083, 'Bandikui', 'Rajasthan'),
(1084, 'Baran', 'Rajasthan'),
(1085, 'Barmer', 'Rajasthan'),
(1086, 'Bikaner', 'Rajasthan'),
(1087, 'Fatehpur', 'Rajasthan'),
(1088, 'Jaipur', 'Rajasthan'),
(1089, 'Jaisalmer', 'Rajasthan'),
(1090, 'Jodhpur', 'Rajasthan'),
(1091, 'Kota', 'Rajasthan'),
(1092, 'Lachhmangarh', 'Rajasthan'),
(1093, 'Ladnu', 'Rajasthan'),
(1094, 'Lakheri', 'Rajasthan'),
(1095, 'Lalsot', 'Rajasthan'),
(1096, 'Losal', 'Rajasthan'),
(1097, 'Makrana', 'Rajasthan'),
(1098, 'Malpura', 'Rajasthan'),
(1099, 'Mandalgarh', 'Rajasthan'),
(1100, 'Mandawa', 'Rajasthan'),
(1101, 'Mangrol', 'Rajasthan'),
(1102, 'Merta City', 'Rajasthan'),
(1103, 'Mount Abu', 'Rajasthan'),
(1104, 'Nadbai', 'Rajasthan'),
(1105, 'Nagar', 'Rajasthan'),
(1106, 'Nagaur', 'Rajasthan'),
(1107, 'Nargund', 'Rajasthan'),
(1108, 'Nasirabad', 'Rajasthan'),
(1109, 'Nathdwara', 'Rajasthan'),
(1110, 'Navalgund', 'Rajasthan'),
(1111, 'Nawalgarh', 'Rajasthan'),
(1112, 'Neem-Ka-Thana', 'Rajasthan'),
(1113, 'Nelamangala', 'Rajasthan'),
(1114, 'Nimbahera', 'Rajasthan'),
(1115, 'Nipani', 'Rajasthan'),
(1116, 'Niwai', 'Rajasthan'),
(1117, 'Nohar', 'Rajasthan'),
(1118, 'Nokha', 'Rajasthan'),
(1119, 'Pali', 'Rajasthan'),
(1120, 'Phalodi', 'Rajasthan'),
(1121, 'Phulera', 'Rajasthan'),
(1122, 'Pilani', 'Rajasthan'),
(1123, 'Pilibanga', 'Rajasthan'),
(1124, 'Pindwara', 'Rajasthan'),
(1125, 'Pipar City', 'Rajasthan'),
(1126, 'Prantij', 'Rajasthan'),
(1127, 'Pratapgarh', 'Rajasthan'),
(1128, 'Raisinghnagar', 'Rajasthan'),
(1129, 'Rajakhera', 'Rajasthan'),
(1130, 'Rajaldesar', 'Rajasthan'),
(1131, 'Rajgarh (Alwar)', 'Rajasthan'),
(1132, 'Rajgarh (Churu', 'Rajasthan'),
(1133, 'Rajsamand', 'Rajasthan'),
(1134, 'Ramganj Mandi', 'Rajasthan'),
(1135, 'Ramngarh', 'Rajasthan'),
(1136, 'Ratangarh', 'Rajasthan'),
(1137, 'Rawatbhata', 'Rajasthan'),
(1138, 'Rawatsar', 'Rajasthan'),
(1139, 'Reengus', 'Rajasthan'),
(1140, 'Sadri', 'Rajasthan'),
(1141, 'Sadulshahar', 'Rajasthan'),
(1142, 'Sagwara', 'Rajasthan'),
(1143, 'Sambhar', 'Rajasthan'),
(1144, 'Sanchore', 'Rajasthan'),
(1145, 'Sangaria', 'Rajasthan'),
(1146, 'Sardarshahar', 'Rajasthan'),
(1147, 'Sawai Madhopur', 'Rajasthan'),
(1148, 'Shahpura', 'Rajasthan'),
(1149, 'Shahpura', 'Rajasthan'),
(1150, 'Sheoganj', 'Rajasthan'),
(1151, 'Sikar', 'Rajasthan'),
(1152, 'Sirohi', 'Rajasthan'),
(1153, 'Sojat', 'Rajasthan'),
(1154, 'Sri Madhopur', 'Rajasthan'),
(1155, 'Sujangarh', 'Rajasthan'),
(1156, 'Sumerpur', 'Rajasthan'),
(1157, 'Suratgarh', 'Rajasthan'),
(1158, 'Taranagar', 'Rajasthan'),
(1159, 'Todabhim', 'Rajasthan'),
(1160, 'Todaraisingh', 'Rajasthan'),
(1161, 'Tonk', 'Rajasthan'),
(1162, 'Udaipur', 'Rajasthan'),
(1163, 'Udaipurwati', 'Rajasthan'),
(1164, 'Vijainagar', 'Rajasthan'),
(1165, 'Gangtok', 'Sikkim'),
(1166, 'Calcutta', 'West Bengal'),
(1167, 'Arakkonam', 'Tamil Nadu'),
(1168, 'Arcot', 'Tamil Nadu'),
(1169, 'Aruppukkottai', 'Tamil Nadu'),
(1170, 'Bhavani', 'Tamil Nadu'),
(1171, 'Chengalpattu', 'Tamil Nadu'),
(1172, 'Chennai', 'Tamil Nadu'),
(1173, 'Chinna salem', 'Tamil nadu'),
(1174, 'Coimbatore', 'Tamil Nadu'),
(1175, 'Coonoor', 'Tamil Nadu'),
(1176, 'Cuddalore', 'Tamil Nadu'),
(1177, 'Dharmapuri', 'Tamil Nadu'),
(1178, 'Dindigul', 'Tamil Nadu'),
(1179, 'Erode', 'Tamil Nadu'),
(1180, 'Gudalur', 'Tamil Nadu'),
(1181, 'Gudalur', 'Tamil Nadu'),
(1182, 'Gudalur', 'Tamil Nadu'),
(1183, 'Kanchipuram', 'Tamil Nadu'),
(1184, 'Karaikudi', 'Tamil Nadu'),
(1185, 'Karungal', 'Tamil Nadu'),
(1186, 'Karur', 'Tamil Nadu'),
(1187, 'Kollankodu', 'Tamil Nadu'),
(1188, 'Lalgudi', 'Tamil Nadu'),
(1189, 'Madurai', 'Tamil Nadu'),
(1190, 'Nagapattinam', 'Tamil Nadu'),
(1191, 'Nagercoil', 'Tamil Nadu'),
(1192, 'Namagiripettai', 'Tamil Nadu'),
(1193, 'Namakkal', 'Tamil Nadu'),
(1194, 'Nandivaram-Guduvancheri', 'Tamil Nadu'),
(1195, 'Nanjikottai', 'Tamil Nadu'),
(1196, 'Natham', 'Tamil Nadu'),
(1197, 'Nellikuppam', 'Tamil Nadu'),
(1198, 'Neyveli', 'Tamil Nadu'),
(1199, 'O\' Valley', 'Tamil Nadu'),
(1200, 'Oddanchatram', 'Tamil Nadu'),
(1201, 'P.N.Patti', 'Tamil Nadu'),
(1202, 'Pacode', 'Tamil Nadu'),
(1203, 'Padmanabhapuram', 'Tamil Nadu'),
(1204, 'Palani', 'Tamil Nadu'),
(1205, 'Palladam', 'Tamil Nadu'),
(1206, 'Pallapatti', 'Tamil Nadu'),
(1207, 'Pallikonda', 'Tamil Nadu'),
(1208, 'Panagudi', 'Tamil Nadu'),
(1209, 'Panruti', 'Tamil Nadu'),
(1210, 'Paramakudi', 'Tamil Nadu'),
(1211, 'Parangipettai', 'Tamil Nadu'),
(1212, 'Pattukkottai', 'Tamil Nadu'),
(1213, 'Perambalur', 'Tamil Nadu'),
(1214, 'Peravurani', 'Tamil Nadu'),
(1215, 'Periyakulam', 'Tamil Nadu'),
(1216, 'Periyasemur', 'Tamil Nadu'),
(1217, 'Pernampattu', 'Tamil Nadu'),
(1218, 'Pollachi', 'Tamil Nadu'),
(1219, 'Polur', 'Tamil Nadu'),
(1220, 'Ponneri', 'Tamil Nadu'),
(1221, 'Pudukkottai', 'Tamil Nadu'),
(1222, 'Pudupattinam', 'Tamil Nadu'),
(1223, 'Puliyankudi', 'Tamil Nadu'),
(1224, 'Punjaipugalur', 'Tamil Nadu'),
(1225, 'Rajapalayam', 'Tamil Nadu'),
(1226, 'Ramanathapuram', 'Tamil Nadu'),
(1227, 'Rameshwaram', 'Tamil Nadu'),
(1228, 'Rasipuram', 'Tamil Nadu'),
(1229, 'Salem', 'Tamil Nadu'),
(1230, 'Sankarankoil', 'Tamil Nadu'),
(1231, 'Sankari', 'Tamil Nadu'),
(1232, 'Sathyamangalam', 'Tamil Nadu'),
(1233, 'Sattur', 'Tamil Nadu'),
(1234, 'Shenkottai', 'Tamil Nadu'),
(1235, 'Sholavandan', 'Tamil Nadu'),
(1236, 'Sholingur', 'Tamil Nadu'),
(1237, 'Sirkali', 'Tamil Nadu'),
(1238, 'Sivaganga', 'Tamil Nadu'),
(1239, 'Sivagiri', 'Tamil Nadu'),
(1240, 'Sivakasi', 'Tamil Nadu'),
(1241, 'Srivilliputhur', 'Tamil Nadu'),
(1242, 'Surandai', 'Tamil Nadu'),
(1243, 'Suriyampalayam', 'Tamil Nadu'),
(1244, 'Tenkasi', 'Tamil Nadu'),
(1245, 'Thammampatti', 'Tamil Nadu'),
(1246, 'Thanjavur', 'Tamil Nadu'),
(1247, 'Tharamangalam', 'Tamil Nadu'),
(1248, 'Tharangambadi', 'Tamil Nadu'),
(1249, 'Theni Allinagaram', 'Tamil Nadu'),
(1250, 'Thirumangalam', 'Tamil Nadu'),
(1251, 'Thirunindravur', 'Tamil Nadu'),
(1252, 'Thiruparappu', 'Tamil Nadu'),
(1253, 'Thirupuvanam', 'Tamil Nadu'),
(1254, 'Thiruthuraipoondi', 'Tamil Nadu'),
(1255, 'Thiruvallur', 'Tamil Nadu'),
(1256, 'Thiruvarur', 'Tamil Nadu'),
(1257, 'Thoothukudi', 'Tamil Nadu'),
(1258, 'Thuraiyur', 'Tamil Nadu'),
(1259, 'Tindivanam', 'Tamil Nadu'),
(1260, 'Tiruchendur', 'Tamil Nadu'),
(1261, 'Tiruchengode', 'Tamil Nadu'),
(1262, 'Tiruchirappalli', 'Tamil Nadu'),
(1263, 'Tirukalukundram', 'Tamil Nadu'),
(1264, 'Tirukkoyilur', 'Tamil Nadu'),
(1265, 'Tirunelveli', 'Tamil Nadu'),
(1266, 'Tirupathur', 'Tamil Nadu'),
(1267, 'Tirupathur', 'Tamil Nadu'),
(1268, 'Tiruppur', 'Tamil Nadu'),
(1269, 'Tiruttani', 'Tamil Nadu'),
(1270, 'Tiruvannamalai', 'Tamil Nadu'),
(1271, 'Tiruvethipuram', 'Tamil Nadu'),
(1272, 'Tittakudi', 'Tamil Nadu'),
(1273, 'Udhagamandalam', 'Tamil Nadu'),
(1274, 'Udumalaipettai', 'Tamil Nadu'),
(1275, 'Unnamalaikadai', 'Tamil Nadu'),
(1276, 'Usilampatti', 'Tamil Nadu'),
(1277, 'Uthamapalayam', 'Tamil Nadu'),
(1278, 'Uthiramerur', 'Tamil Nadu'),
(1279, 'Vadakkuvalliyur', 'Tamil Nadu'),
(1280, 'Vadalur', 'Tamil Nadu'),
(1281, 'Vadipatti', 'Tamil Nadu'),
(1282, 'Valparai', 'Tamil Nadu'),
(1283, 'Vandavasi', 'Tamil Nadu'),
(1284, 'Vaniyambadi', 'Tamil Nadu'),
(1285, 'Vedaranyam', 'Tamil Nadu'),
(1286, 'Vellakoil', 'Tamil Nadu'),
(1287, 'Vellore', 'Tamil Nadu'),
(1288, 'Vikramasingapuram', 'Tamil Nadu'),
(1289, 'Viluppuram', 'Tamil Nadu'),
(1290, 'Virudhachalam', 'Tamil Nadu'),
(1291, 'Virudhunagar', 'Tamil Nadu'),
(1292, 'Viswanatham', 'Tamil Nadu'),
(1293, 'Agartala', 'Tripura'),
(1294, 'Badharghat', 'Tripura'),
(1295, 'Dharmanagar', 'Tripura'),
(1296, 'Indranagar', 'Tripura'),
(1297, 'Jogendranagar', 'Tripura'),
(1298, 'Kailasahar', 'Tripura'),
(1299, 'Khowai', 'Tripura'),
(1300, 'Pratapgarh', 'Tripura'),
(1301, 'Udaipur', 'Tripura'),
(1302, 'Achhnera', 'Uttar Pradesh'),
(1303, 'Adari', 'Uttar Pradesh'),
(1304, 'Agra', 'Uttar Pradesh'),
(1305, 'Aligarh', 'Uttar Pradesh'),
(1306, 'Allahabad', 'Uttar Pradesh'),
(1307, 'Amroha', 'Uttar Pradesh'),
(1308, 'Azamgarh', 'Uttar Pradesh'),
(1309, 'Bahraich', 'Uttar Pradesh'),
(1310, 'Ballia', 'Uttar Pradesh'),
(1311, 'Balrampur', 'Uttar Pradesh'),
(1312, 'Banda', 'Uttar Pradesh'),
(1313, 'Bareilly', 'Uttar Pradesh'),
(1314, 'Chandausi', 'Uttar Pradesh'),
(1315, 'Dadri', 'Uttar Pradesh'),
(1316, 'Deoria', 'Uttar Pradesh'),
(1317, 'Etawah', 'Uttar Pradesh'),
(1318, 'Fatehabad', 'Uttar Pradesh'),
(1319, 'Fatehpur', 'Uttar Pradesh'),
(1320, 'Fatehpur', 'Uttar Pradesh'),
(1321, 'Greater Noida', 'Uttar Pradesh'),
(1322, 'Hamirpur', 'Uttar Pradesh'),
(1323, 'Hardoi', 'Uttar Pradesh'),
(1324, 'Jajmau', 'Uttar Pradesh'),
(1325, 'Jaunpur', 'Uttar Pradesh'),
(1326, 'Jhansi', 'Uttar Pradesh'),
(1327, 'Kalpi', 'Uttar Pradesh'),
(1328, 'Kanpur', 'Uttar Pradesh'),
(1329, 'Kota', 'Uttar Pradesh'),
(1330, 'Laharpur', 'Uttar Pradesh'),
(1331, 'Lakhimpur', 'Uttar Pradesh'),
(1332, 'Lal Gopalganj Nindaura', 'Uttar Pradesh'),
(1333, 'Lalganj', 'Uttar Pradesh'),
(1334, 'Lalitpur', 'Uttar Pradesh'),
(1335, 'Lar', 'Uttar Pradesh'),
(1336, 'Loni', 'Uttar Pradesh'),
(1337, 'Lucknow', 'Uttar Pradesh'),
(1338, 'Mathura', 'Uttar Pradesh'),
(1339, 'Meerut', 'Uttar Pradesh'),
(1340, 'Modinagar', 'Uttar Pradesh'),
(1341, 'Muradnagar', 'Uttar Pradesh'),
(1342, 'Nagina', 'Uttar Pradesh'),
(1343, 'Najibabad', 'Uttar Pradesh'),
(1344, 'Nakur', 'Uttar Pradesh'),
(1345, 'Nanpara', 'Uttar Pradesh'),
(1346, 'Naraura', 'Uttar Pradesh'),
(1347, 'Naugawan Sadat', 'Uttar Pradesh'),
(1348, 'Nautanwa', 'Uttar Pradesh'),
(1349, 'Nawabganj', 'Uttar Pradesh'),
(1350, 'Nehtaur', 'Uttar Pradesh'),
(1351, 'NOIDA', 'Uttar Pradesh'),
(1352, 'Noorpur', 'Uttar Pradesh'),
(1353, 'Obra', 'Uttar Pradesh'),
(1354, 'Orai', 'Uttar Pradesh'),
(1355, 'Padrauna', 'Uttar Pradesh'),
(1356, 'Palia Kalan', 'Uttar Pradesh'),
(1357, 'Parasi', 'Uttar Pradesh'),
(1358, 'Phulpur', 'Uttar Pradesh'),
(1359, 'Pihani', 'Uttar Pradesh'),
(1360, 'Pilibhit', 'Uttar Pradesh'),
(1361, 'Pilkhuwa', 'Uttar Pradesh'),
(1362, 'Powayan', 'Uttar Pradesh'),
(1363, 'Pukhrayan', 'Uttar Pradesh'),
(1364, 'Puranpur', 'Uttar Pradesh'),
(1365, 'Purquazi', 'Uttar Pradesh'),
(1366, 'Purwa', 'Uttar Pradesh'),
(1367, 'Rae Bareli', 'Uttar Pradesh'),
(1368, 'Rampur', 'Uttar Pradesh'),
(1369, 'Rampur Maniharan', 'Uttar Pradesh'),
(1370, 'Rasra', 'Uttar Pradesh'),
(1371, 'Rath', 'Uttar Pradesh'),
(1372, 'Renukoot', 'Uttar Pradesh'),
(1373, 'Reoti', 'Uttar Pradesh'),
(1374, 'Robertsganj', 'Uttar Pradesh'),
(1375, 'Rudauli', 'Uttar Pradesh'),
(1376, 'Rudrapur', 'Uttar Pradesh'),
(1377, 'Sadabad', 'Uttar Pradesh'),
(1378, 'Safipur', 'Uttar Pradesh'),
(1379, 'Saharanpur', 'Uttar Pradesh'),
(1380, 'Sahaspur', 'Uttar Pradesh'),
(1381, 'Sahaswan', 'Uttar Pradesh'),
(1382, 'Sahawar', 'Uttar Pradesh'),
(1383, 'Sahjanwa', 'Uttar Pradesh'),
(1384, 'Saidpur', ' Ghazipur'),
(1385, 'Sambhal', 'Uttar Pradesh'),
(1386, 'Samdhan', 'Uttar Pradesh'),
(1387, 'Samthar', 'Uttar Pradesh'),
(1388, 'Sandi', 'Uttar Pradesh'),
(1389, 'Sandila', 'Uttar Pradesh'),
(1390, 'Sardhana', 'Uttar Pradesh'),
(1391, 'Seohara', 'Uttar Pradesh'),
(1392, 'Shahabad', ' Hardoi'),
(1393, 'Shahabad', ' Rampur'),
(1394, 'Shahganj', 'Uttar Pradesh'),
(1395, 'Shahjahanpur', 'Uttar Pradesh'),
(1396, 'Shamli', 'Uttar Pradesh'),
(1397, 'Shamsabad', ' Agra'),
(1398, 'Shamsabad', ' Farrukhabad'),
(1399, 'Sherkot', 'Uttar Pradesh'),
(1400, 'Shikarpur', ' Bulandshahr'),
(1401, 'Shikohabad', 'Uttar Pradesh'),
(1402, 'Shishgarh', 'Uttar Pradesh'),
(1403, 'Siana', 'Uttar Pradesh'),
(1404, 'Sikanderpur', 'Uttar Pradesh'),
(1405, 'Sikandra Rao', 'Uttar Pradesh'),
(1406, 'Sikandrabad', 'Uttar Pradesh'),
(1407, 'Sirsaganj', 'Uttar Pradesh'),
(1408, 'Sirsi', 'Uttar Pradesh'),
(1409, 'Sitapur', 'Uttar Pradesh'),
(1410, 'Soron', 'Uttar Pradesh'),
(1411, 'Suar', 'Uttar Pradesh'),
(1412, 'Sultanpur', 'Uttar Pradesh'),
(1413, 'Sumerpur', 'Uttar Pradesh'),
(1414, 'Tanda', 'Uttar Pradesh'),
(1415, 'Tanda', 'Uttar Pradesh'),
(1416, 'Tetri Bazar', 'Uttar Pradesh'),
(1417, 'Thakurdwara', 'Uttar Pradesh'),
(1418, 'Thana Bhawan', 'Uttar Pradesh'),
(1419, 'Tilhar', 'Uttar Pradesh'),
(1420, 'Tirwaganj', 'Uttar Pradesh'),
(1421, 'Tulsipur', 'Uttar Pradesh'),
(1422, 'Tundla', 'Uttar Pradesh'),
(1423, 'Unnao', 'Uttar Pradesh'),
(1424, 'Utraula', 'Uttar Pradesh'),
(1425, 'Varanasi', 'Uttar Pradesh'),
(1426, 'Vrindavan', 'Uttar Pradesh'),
(1427, 'Warhapur', 'Uttar Pradesh'),
(1428, 'Zaidpur', 'Uttar Pradesh'),
(1429, 'Zamania', 'Uttar Pradesh'),
(1430, 'Almora', 'Uttarakhand'),
(1431, 'Bazpur', 'Uttarakhand'),
(1432, 'Chamba', 'Uttarakhand'),
(1433, 'Dehradun', 'Uttarakhand'),
(1434, 'Haldwani', 'Uttarakhand'),
(1435, 'Haridwar', 'Uttarakhand'),
(1436, 'Jaspur', 'Uttarakhand'),
(1437, 'Kashipur', 'Uttarakhand'),
(1438, 'kichha', 'Uttarakhand'),
(1439, 'Kotdwara', 'Uttarakhand'),
(1440, 'Manglaur', 'Uttarakhand'),
(1441, 'Mussoorie', 'Uttarakhand'),
(1442, 'Nagla', 'Uttarakhand'),
(1443, 'Nainital', 'Uttarakhand'),
(1444, 'Pauri', 'Uttarakhand'),
(1445, 'Pithoragarh', 'Uttarakhand'),
(1446, 'Ramnagar', 'Uttarakhand'),
(1447, 'Rishikesh', 'Uttarakhand'),
(1448, 'Roorkee', 'Uttarakhand'),
(1449, 'Rudrapur', 'Uttarakhand'),
(1450, 'Sitarganj', 'Uttarakhand'),
(1451, 'Tehri', 'Uttarakhand'),
(1452, 'Muzaffarnagar', 'Uttar Pradesh'),
(1453, 'Adra', ' Purulia'),
(1454, 'Alipurduar', 'West Bengal'),
(1455, 'Arambagh', 'West Bengal'),
(1456, 'Asansol', 'West Bengal'),
(1457, 'Baharampur', 'West Bengal'),
(1458, 'Bally', 'West Bengal'),
(1459, 'Balurghat', 'West Bengal'),
(1460, 'Bankura', 'West Bengal'),
(1461, 'Barakar', 'West Bengal'),
(1462, 'Barasat', 'West Bengal'),
(1463, 'Bardhaman', 'West Bengal'),
(1464, 'Bidhan Nagar', 'West Bengal'),
(1465, 'Chinsura', 'West Bengal'),
(1466, 'Contai', 'West Bengal'),
(1467, 'Cooch Behar', 'West Bengal'),
(1468, 'Darjeeling', 'West Bengal'),
(1469, 'Durgapur', 'West Bengal'),
(1470, 'Haldia', 'West Bengal'),
(1471, 'Howrah', 'West Bengal'),
(1472, 'Islampur', 'West Bengal'),
(1473, 'Jhargram', 'West Bengal'),
(1474, 'Kharagpur', 'West Bengal'),
(1475, 'Kolkata', 'West Bengal'),
(1476, 'Mainaguri', 'West Bengal'),
(1477, 'Mal', 'West Bengal'),
(1478, 'Mathabhanga', 'West Bengal'),
(1479, 'Medinipur', 'West Bengal'),
(1480, 'Memari', 'West Bengal'),
(1481, 'Monoharpur', 'West Bengal'),
(1482, 'Murshidabad', 'West Bengal'),
(1483, 'Nabadwip', 'West Bengal'),
(1484, 'Naihati', 'West Bengal'),
(1485, 'Panchla', 'West Bengal'),
(1486, 'Pandua', 'West Bengal'),
(1487, 'Paschim Punropara', 'West Bengal'),
(1488, 'Purulia', 'West Bengal'),
(1489, 'Raghunathpur', 'West Bengal'),
(1490, 'Raiganj', 'West Bengal'),
(1491, 'Rampurhat', 'West Bengal'),
(1492, 'Ranaghat', 'West Bengal'),
(1493, 'Sainthia', 'West Bengal'),
(1494, 'Santipur', 'West Bengal'),
(1495, 'Siliguri', 'West Bengal'),
(1496, 'Sonamukhi', 'West Bengal'),
(1497, 'Srirampore', 'West Bengal'),
(1498, 'Suri', 'West Bengal'),
(1499, 'Taki', 'West Bengal'),
(1500, 'Tamluk', 'West Bengal'),
(1501, 'Tarakeswar', 'West Bengal'),
(1502, 'Chikmagalur', 'Karnataka'),
(1503, 'Davanagere', 'Karnataka'),
(1504, 'Dharwad', 'Karnataka'),
(1505, 'Gadag', 'Karnataka'),
(1506, 'Chennai', 'Tamil Nadu'),
(1507, 'Coimbatore', 'Tamil Nadu');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `message` text NOT NULL,
  `message_for` int(11) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `mobile`, `subject`, `message`, `message_for`, `added_on`) VALUES
(1, 'Khan Shadab', 'ks615044@gmail.com', '4545758545', 'sksks', 'sasasassasasas', 0, '2020-08-28 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `iso` char(2) NOT NULL,
  `name` varchar(80) NOT NULL,
  `nicename` varchar(80) NOT NULL,
  `iso3` char(3) DEFAULT NULL,
  `numcode` smallint(6) DEFAULT NULL,
  `phonecode` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `iso`, `name`, `nicename`, `iso3`, `numcode`, `phonecode`) VALUES
(99, 'IN', 'INDIA', 'India', 'IND', 356, 91);

-- --------------------------------------------------------

--
-- Table structure for table `coupon_code`
--

CREATE TABLE `coupon_code` (
  `id` int(11) NOT NULL,
  `added_by` int(11) NOT NULL,
  `coupon_code` varchar(20) NOT NULL,
  `coupon_type` enum('P','F') NOT NULL,
  `coupon_value` int(11) NOT NULL,
  `cart_min_value` int(11) NOT NULL,
  `expired_on` date NOT NULL,
  `status` int(11) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coupon_code`
--

INSERT INTO `coupon_code` (`id`, `added_by`, `coupon_code`, `coupon_type`, `coupon_value`, `cart_min_value`, `expired_on`, `status`, `added_on`) VALUES
(2, 39, 'SHADABZONE', 'P', 50, 200, '2020-08-21', 1, '2020-08-10 08:05:18');

-- --------------------------------------------------------

--
-- Table structure for table `enquires`
--

CREATE TABLE `enquires` (
  `id` int(11) NOT NULL,
  `retail_id` int(20) NOT NULL,
  `wholesaler_id` int(20) NOT NULL,
  `product_id` int(20) NOT NULL,
  `requirement_msg` text NOT NULL,
  `daily_leads_per_day` int(30) NOT NULL,
  `status` int(1) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enquires`
--

INSERT INTO `enquires` (`id`, `retail_id`, `wholesaler_id`, `product_id`, `requirement_msg`, `daily_leads_per_day`, `status`, `added_on`) VALUES
(2, 1, 3, 2, 'saasasfffasfsafsa', 121, 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `sub_catid` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `prod_img` varchar(255) NOT NULL,
  `shipping_cost` int(11) NOT NULL,
  `product_measure` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  `added_by` int(11) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `cat_id`, `sub_catid`, `product_name`, `description`, `prod_img`, `shipping_cost`, `product_measure`, `status`, `added_by`, `added_on`) VALUES
(11, 2, 3, 'Love Bite', '                  	sasas', '434930600_1596716700_khan-shadab_1594910437.jpg', 5000, '500kg, 600wt', 1, 39, '2020-08-10 07:35:30');

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

CREATE TABLE `product_details` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `attribute` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `old_price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_details`
--

INSERT INTO `product_details` (`id`, `product_id`, `attribute`, `price`, `old_price`, `qty`, `status`, `added_on`) VALUES
(5, 10, 'Half1', 20011, 100, 100, 1, '2020-08-07 12:02:53'),
(8, 10, 'Mychoice', 1200, 200, 20, 1, '2020-08-07 12:46:38'),
(9, 10, 'skshadb1234', 5000, 50000, 50, 1, '2020-08-10 07:29:55'),
(10, 11, 'Half', 20, 200, 12, 1, '2020-08-10 07:35:30');

-- --------------------------------------------------------

--
-- Table structure for table `retailers`
--

CREATE TABLE `retailers` (
  `id` int(11) NOT NULL,
  `shop_name` varchar(255) NOT NULL,
  `owner_name` varchar(255) NOT NULL,
  `retailer_email` varchar(255) NOT NULL,
  `retailer_password` varchar(255) NOT NULL,
  `otp` int(11) NOT NULL,
  `rand_str` int(11) NOT NULL,
  `retailer_img` varchar(200) NOT NULL,
  `last_login` int(11) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT '0',
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `retailers`
--

INSERT INTO `retailers` (`id`, `shop_name`, `owner_name`, `retailer_email`, `retailer_password`, `otp`, `rand_str`, `retailer_img`, `last_login`, `status`, `added_on`) VALUES
(1, 'My store', 'asasasasasas', 'KS615044@GMAIL.COM', '$2y$10$U8zLWtZ36MRxj/az516V7.5F0kdRXZ0.eIYSBg43hkdcaN5LmAlOO', 0, 0, '1596716700_khan-shadab_1594910437.jpg', 0, '1', '2020-08-06 04:59:14');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `StateID` int(11) NOT NULL,
  `CountryID` int(11) NOT NULL,
  `StateName` varchar(50) NOT NULL,
  `Notes` longtext,
  `ChangedBy` varchar(50) DEFAULT NULL,
  `ChangeDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`StateID`, `CountryID`, `StateName`, `Notes`, `ChangedBy`, `ChangeDate`) VALUES
(36, 1, 'ANDHRA PRADESH', NULL, 'Nieanjan', '2020-08-09 12:37:01'),
(37, 1, 'ASSAM', NULL, 'Nieanjan', '2020-08-09 12:37:01'),
(38, 1, 'ARUNACHAL PRADESH', NULL, 'Nieanjan', '2020-08-09 12:37:01'),
(39, 1, 'GUJRAT', NULL, 'Nieanjan', '2020-08-09 12:37:01'),
(40, 1, 'BIHAR', NULL, 'Nieanjan', '2020-08-09 12:37:01'),
(41, 1, 'HARYANA', NULL, 'Nieanjan', '2020-08-09 12:37:01'),
(42, 1, 'HIMACHAL PRADESH', NULL, 'Nieanjan', '2020-08-09 12:37:01'),
(43, 1, 'JAMMU & KASHMIR', NULL, 'Nieanjan', '2020-08-09 12:37:01'),
(44, 1, 'KARNATAKA', NULL, 'Nieanjan', '2020-08-09 12:37:01'),
(45, 1, 'KERALA', NULL, 'Nieanjan', '2020-08-09 12:37:01'),
(46, 1, 'MADHYA PRADESH', NULL, 'Nieanjan', '2020-08-09 12:37:02'),
(47, 1, 'MAHARASHTRA', NULL, 'Nieanjan', '2020-08-09 12:37:02'),
(48, 1, 'MANIPUR', NULL, 'Nieanjan', '2020-08-09 12:37:02'),
(49, 1, 'MEGHALAYA', NULL, 'Nieanjan', '2020-08-09 12:37:02'),
(50, 1, 'MIZORAM', NULL, 'Nieanjan', '2020-08-09 12:37:02'),
(51, 1, 'NAGALAND', NULL, 'Nieanjan', '2020-08-09 12:37:02'),
(52, 1, 'ORISSA', NULL, 'Nieanjan', '2020-08-09 12:37:02'),
(53, 1, 'PUNJAB', NULL, 'Nieanjan', '2020-08-09 12:37:02'),
(54, 1, 'RAJASTHAN', NULL, 'Nieanjan', '2020-08-09 12:37:02'),
(55, 1, 'SIKKIM', NULL, 'Nieanjan', '2020-08-09 12:37:02'),
(56, 1, 'TAMIL NADU', NULL, 'Nieanjan', '2020-08-09 12:37:02'),
(57, 1, 'TRIPURA', NULL, 'Nieanjan', '2020-08-09 12:37:02'),
(58, 1, 'UTTAR PRADESH', NULL, 'Nieanjan', '2020-08-09 12:37:02'),
(59, 1, 'WEST BENGAL', NULL, 'Nieanjan', '2020-08-09 12:37:02'),
(60, 1, 'DELHI', NULL, 'Nieanjan', '2020-08-09 12:37:02'),
(61, 1, 'GOA', NULL, 'Nieanjan', '2020-08-09 12:37:02'),
(62, 1, 'PONDICHERY', NULL, 'Nieanjan', '2020-08-09 12:37:02'),
(63, 1, 'LAKSHDWEEP', NULL, 'Nieanjan', '2020-08-09 12:37:02'),
(64, 1, 'DAMAN & DIU', NULL, 'Nieanjan', '2020-08-09 12:37:02'),
(65, 1, 'DADRA & NAGAR', NULL, 'Nieanjan', '2020-08-09 12:37:02'),
(66, 1, 'CHANDIGARH', NULL, 'Nieanjan', '2020-08-09 12:37:02'),
(67, 1, 'ANDAMAN & NICOBAR', NULL, 'Nieanjan', '2020-08-09 12:37:03'),
(68, 1, 'UTTARANCHAL', NULL, 'Nieanjan', '2020-08-09 12:37:03'),
(69, 1, 'JHARKHAND', NULL, 'Nieanjan', '2020-08-09 12:37:03'),
(70, 1, 'CHATTISGARH', NULL, 'Nieanjan', '2020-08-09 12:37:03');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `id` int(11) NOT NULL,
  `subcategory_name` varchar(255) NOT NULL,
  `subcategory_img` varchar(255) NOT NULL,
  `cat_id_of_subcat` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id`, `subcategory_name`, `subcategory_img`, `cat_id_of_subcat`, `status`, `added_on`) VALUES
(3, 'Biryani', '1596775058_banner.jpg', 2, 1, '2020-08-07 10:07:38');

-- --------------------------------------------------------

--
-- Table structure for table `subscription_plan`
--

CREATE TABLE `subscription_plan` (
  `id` int(11) NOT NULL,
  `subscription_plan_name` varchar(255) NOT NULL,
  `plan_price` int(11) NOT NULL,
  `plan_expire` varchar(20) NOT NULL,
  `plan_type` varchar(20) NOT NULL,
  `no_of_enquires` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscription_plan`
--

INSERT INTO `subscription_plan` (`id`, `subscription_plan_name`, `plan_price`, `plan_expire`, `plan_type`, `no_of_enquires`, `status`, `added_on`) VALUES
(18, 'Popular', 3000, '30 days', 'no', 500, 1, '2020-08-07 08:51:09'),
(19, 'Basic', 100, '7 days trial', 'yes', 30, 1, '2020-08-07 08:55:38'),
(20, 'Free', 1000, '91 days', 'no', 12121, 1, '2020-08-07 08:56:33');

-- --------------------------------------------------------

--
-- Table structure for table `wholeseller`
--

CREATE TABLE `wholeseller` (
  `id` int(11) NOT NULL,
  `seller_img` varchar(255) NOT NULL,
  `seller_name` varchar(255) NOT NULL,
  `seller_email` varchar(255) NOT NULL,
  `seller_password` varchar(255) NOT NULL,
  `otp` int(11) NOT NULL,
  `seller_shop_name` varchar(255) NOT NULL,
  `seller_country` int(1) NOT NULL,
  `seller_state` int(1) NOT NULL,
  `seller_city` int(1) NOT NULL,
  `seller_address` varchar(255) NOT NULL,
  `category` int(1) NOT NULL,
  `gst_img` varchar(255) NOT NULL,
  `rand_str` int(20) NOT NULL,
  `status` int(1) NOT NULL,
  `admin_approv` int(1) NOT NULL DEFAULT '0',
  `admin_blocked` int(1) NOT NULL,
  `blocking_msg` varchar(255) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wholeseller`
--

INSERT INTO `wholeseller` (`id`, `seller_img`, `seller_name`, `seller_email`, `seller_password`, `otp`, `seller_shop_name`, `seller_country`, `seller_state`, `seller_city`, `seller_address`, `category`, `gst_img`, `rand_str`, `status`, `admin_approv`, `admin_blocked`, `blocking_msg`, `added_on`) VALUES
(39, '', 'khan ', 'ks615044@gmail.com', '$2y$10$8u.cV0tpAVX7OESmZBQ2h.xcZn6evus24HkZbRhk.u3400QKxySaq', 32696, 'shadabzone', 99, 38, 3, 'Height\n6\' 0\" (183 centimeters)\nWeight\n236.9 pounds (107.7 kilograms)\nHair Color\nBrown\nBlood Type\nO+\nMother\'s Maiden Name\nKeene\nCivil Status\nSingle\nEducational Background\nHigh school diploma or GED\nDriver LicenseP362-472-664-352 - issued in Minnesota (MN) ', 2, '1597064562_update.php', 40975, 1, 1, 0, '', '2020-08-10 05:52:30'),
(45, '', 'khan Shadab', 'ksfjjks@gmail.com', '$2y$10$TGeu7Nz8FiQ7ATXs4j.vXuGaoH.pj30/HPBc0Od6H9pHF5uH2fZuW', 0, '', 0, 0, 0, '', 0, '', 81261, 0, 0, 0, '', '2020-08-11 09:16:10'),
(47, '', 'Khan Shadab', 'skshadabkhojo@gmail.com', '$2y$10$Vcj6NF1eNs4P99o4avCBouSAo61M4bWeU3QQCFqMrHD1fVX42nmlu', 0, '', 0, 0, 0, '', 0, '', 67962, 0, 0, 0, '', '2020-08-11 10:18:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupon_code`
--
ALTER TABLE `coupon_code`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enquires`
--
ALTER TABLE `enquires`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `retailers`
--
ALTER TABLE `retailers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`StateID`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscription_plan`
--
ALTER TABLE `subscription_plan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wholeseller`
--
ALTER TABLE `wholeseller`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1624;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;

--
-- AUTO_INCREMENT for table `coupon_code`
--
ALTER TABLE `coupon_code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `enquires`
--
ALTER TABLE `enquires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `product_details`
--
ALTER TABLE `product_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `retailers`
--
ALTER TABLE `retailers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `StateID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subscription_plan`
--
ALTER TABLE `subscription_plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `wholeseller`
--
ALTER TABLE `wholeseller`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
