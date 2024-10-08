-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 26, 2024 at 02:05 AM
-- Server version: 10.6.18-MariaDB-cll-lve
-- PHP Version: 8.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aranea_holidaycity_db`
--
USE aranea_holidaycity_db;

-- --------------------------------------------------------

--
-- Table structure for table `survey_responses`
--

CREATE TABLE `survey_responses` (
  `id` int(11) NOT NULL,
  `who_are_you` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `gender` enum('Male','Female','Other') DEFAULT NULL,
  `nationality` varchar(255) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `current_residential_location` varchar(255) DEFAULT NULL,
  `hometown` varchar(255) DEFAULT NULL,
  `project_location` varchar(255) DEFAULT NULL,
  `interested_district` varchar(255) DEFAULT NULL,
  `distance_from_city` varchar(255) DEFAULT NULL,
  `house_type` enum('Farm house','Villa','Resort','Any other') DEFAULT NULL,
  `farm_type` varchar(255) DEFAULT NULL,
  `farm_acres` int(11) DEFAULT NULL,
  `farm_facility_management` enum('Yes','No') DEFAULT NULL,
  `farm_additional_services` text DEFAULT NULL,
  `villa_bedrooms` int(11) DEFAULT NULL,
  `villa_sqft` int(11) DEFAULT NULL,
  `villa_master_bedroom_size` int(11) DEFAULT NULL,
  `villa_living_room_size` int(11) DEFAULT NULL,
  `villa_bedroom_size` int(11) DEFAULT NULL,
  `villa_bathroom_size` int(11) DEFAULT NULL,
  `villa_swimming_pool` enum('Yes','No') DEFAULT NULL,
  `villa_pool_size` int(11) DEFAULT NULL,
  `villa_facility_management` enum('Yes','No') DEFAULT NULL,
  `villa_site_visiting` enum('Yes','No') DEFAULT NULL,
  `villa_online_booking` enum('Yes','No') DEFAULT NULL,
  `villa_real_time_monitoring` enum('Yes','No') DEFAULT NULL,
  `resort_type` varchar(255) DEFAULT NULL,
  `resort_camp_site` enum('Yes','No') DEFAULT NULL,
  `resort_pub` enum('Yes','No') DEFAULT NULL,
  `resort_bar` enum('Yes','No') DEFAULT NULL,
  `resort_open_restaurant` enum('Yes','No') DEFAULT NULL,
  `resort_additional_suggestions` text DEFAULT NULL,
  `resort_yoga_meditations` enum('Yes','No') DEFAULT NULL,
  `resort_indoor_games` enum('Yes','No') DEFAULT NULL,
  `resort_other_suggestions` text DEFAULT NULL,
  `wellness_park_facilities` text DEFAULT NULL,
  `smart_home_facility` enum('Yes','No') DEFAULT NULL,
  `other_facilities` text DEFAULT NULL,
  `budget_range` varchar(255) DEFAULT NULL,
  `family_members` enum('Single','Couple','Family') DEFAULT NULL,
  `additional_income` enum('Yes','No') DEFAULT NULL,
  `income_sources` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `survey_responses`
--

INSERT INTO `survey_responses` (`id`, `who_are_you`, `name`, `gender`, `nationality`, `age`, `phone`, `email`, `designation`, `current_residential_location`, `hometown`, `project_location`, `interested_district`, `distance_from_city`, `house_type`, `farm_type`, `farm_acres`, `farm_facility_management`, `farm_additional_services`, `villa_bedrooms`, `villa_sqft`, `villa_master_bedroom_size`, `villa_living_room_size`, `villa_bedroom_size`, `villa_bathroom_size`, `villa_swimming_pool`, `villa_pool_size`, `villa_facility_management`, `villa_site_visiting`, `villa_online_booking`, `villa_real_time_monitoring`, `resort_type`, `resort_camp_site`, `resort_pub`, `resort_bar`, `resort_open_restaurant`, `resort_additional_suggestions`, `resort_yoga_meditations`, `resort_indoor_games`, `resort_other_suggestions`, `wellness_park_facilities`, `smart_home_facility`, `other_facilities`, `budget_range`, `family_members`, `additional_income`, `income_sources`, `created_at`) VALUES
(1, 'Home Buyer', 'Alice Johnson', 'Female', 'British', 30, '012-345-6789', 'alice.johnson@example.com', 'Software Developer', 'London, UK', 'Bristol, UK', 'Project Bravo', 'kottayam', '5 km', 'Villa', NULL, NULL, NULL, NULL, 3, 1800, 450, 400, 350, 300, 'Yes', 45, 'Yes', 'Yes', 'Yes', 'Yes', 'Luxury', 'Yes', 'Yes', 'No', 'Yes', 'Playground for kids', 'Yes', 'Yes', 'More green spaces', 'Fitness center, Community garden', 'Yes', 'Gym, Cinema', '£400,000 - £600,000', 'Couple', 'Yes', 'Freelancing, Stocks', '2024-08-04 15:06:24'),
(2, 'Home Buyer', 'Alice Johnson', 'Female', 'British', 30, '012-345-6789', 'alice.johnson@example.com', 'Software Developer', 'London, UK', 'Bristol, UK', 'Project Bravo', 'District DEF', '5 km', 'Farm house', NULL, NULL, NULL, NULL, 3, 1800, 450, 400, 350, 300, 'Yes', 45, 'Yes', 'Yes', 'Yes', 'Yes', 'Luxury', 'Yes', 'Yes', 'No', 'Yes', 'Playground for kids', 'Yes', 'Yes', 'More green spaces', 'Fitness center, Community garden', 'Yes', 'Gym, Cinema', '£400,000 - £600,000', 'Couple', 'Yes', 'Freelancing, Stocks', '2024-08-04 15:06:47'),
(3, 'Survey Taker', 'John Doe', 'Male', 'American', 30, '1234567890', 'john.doe@example.com', 'Engineer', 'New York, NY', 'Los Angeles, CA', 'San Francisco, CA', 'San Mateo', '10 miles', 'Villa', NULL, NULL, NULL, NULL, 4, 3000, 400, 500, 300, 100, 'Yes', 500, 'Yes', 'Yes', 'Yes', 'Yes', 'Luxury', 'Yes', 'Yes', 'Yes', 'Yes', 'None', 'Yes', 'Yes', 'None', 'Park with walking trails', 'Yes', 'None', '$500,000 - $1,000,000', 'Family', 'Yes', 'Real Estate, Stock Market', '2024-08-04 15:16:48'),
(4, 'Survey Taker', 'John Doe', 'Male', 'American', 30, '1234567890', 'john.doe@example.com', 'Engineer', 'New York, NY', 'Los Angeles, CA', 'San Francisco, CA', 'kannur', '10 miles', 'Villa', NULL, NULL, NULL, NULL, 4, 3000, 400, 500, 300, 100, 'Yes', 500, 'Yes', 'Yes', 'Yes', 'Yes', 'Luxury', 'Yes', 'Yes', 'Yes', 'Yes', 'None', 'Yes', 'Yes', 'None', 'Park with walking trails', 'Yes', 'None', '$500,000 - $1,000,000', 'Family', 'Yes', 'Real Estate, Stock Market', '2024-08-04 15:31:28'),
(5, 'Survey Taker', 'John Doe', 'Male', 'American', 30, '1234567890', 'john.doe@example.com', 'Engineer', 'New York, NY', 'Los Angeles, CA', 'San Francisco, CA', 'Alappuzha', '10 miles', 'Villa', NULL, NULL, NULL, NULL, 4, 3000, 400, 500, 300, 100, 'Yes', 500, 'Yes', 'Yes', 'Yes', 'Yes', 'Luxury', 'Yes', 'Yes', 'Yes', 'Yes', 'None', 'Yes', 'Yes', 'None', 'Park with walking trails', 'Yes', 'None', '$500,000 - $1,000,000', 'Family', 'Yes', 'Real Estate, Stock Market', '2024-08-04 15:32:51'),
(6, 'FRIENDLY ACTIVE SENIOR LIVING', 'Alice Johnson', 'Female', 'British', 55, '9876543210', 'alice.johnson@example.com', 'Retired', 'London, UK', 'Manchester, UK', 'Brighton, UK', 'Ernakulam', '20 miles', 'Villa', NULL, NULL, NULL, NULL, 3, 2500, 350, 450, 250, 150, 'Yes', 400, 'Yes', 'Yes', 'Yes', 'Yes', 'Contemporary resort', 'Yes', 'Yes', 'Yes', 'Yes', 'More green spaces', 'Yes', 'Yes', 'Gym and spa', 'Environmental wellness, Physical wellness', 'Yes', 'Swimming pool, Football turf, Cafeteria, Super market, Health clinic with wellness park', '30L minimum', 'Couple', 'Yes', 'Rental income, ROI-based income', '2024-08-04 15:35:18'),
(7, 'BACK TO HOME', 'Alice Johnson', 'Female', 'British', 55, '9876543210', 'alice.johnson@example.com', 'Retired', 'London, UK', 'Manchester, UK', 'Brighton, UK', 'Kollam', '20 miles', 'Any other', NULL, NULL, NULL, NULL, 3, 2500, 350, 450, 250, 150, 'Yes', 400, 'Yes', 'Yes', 'Yes', 'Yes', 'Contemporary resort', 'Yes', 'Yes', 'Yes', 'Yes', 'More green spaces', 'Yes', 'Yes', 'Gym and spa', 'Environmental wellness, Physical wellness', 'Yes', 'Swimming pool, Football turf, Cafeteria, Super market, Health clinic with wellness park', '30L minimum', 'Couple', 'Yes', 'Rental income, ROI-based income', '2024-08-04 15:37:35'),
(8, 'EARLY RETIREMENT REMOTE WORK', 'Alice Johnson', 'Female', 'British', 55, '9876543210', 'alice.johnson@example.com', 'Retired', 'London, UK', 'Manchester, UK', 'Brighton, UK', 'Sussex', '20 miles', 'Resort', NULL, NULL, NULL, NULL, 3, 2500, 350, 450, 250, 150, 'Yes', 400, 'Yes', 'Yes', 'Yes', 'Yes', 'Contemporary resort', 'Yes', 'Yes', 'Yes', 'Yes', 'More green spaces', 'Yes', 'Yes', 'Gym and spa', 'Environmental wellness, Physical wellness', 'Yes', 'Swimming pool, Football turf, Cafeteria, Super market, Health clinic with wellness park', '30L minimum', 'Couple', 'Yes', 'Rental income, ROI-based income', '2024-08-04 15:38:12'),
(9, 'INVESTMENT', 'Alice Johnson', 'Female', 'British', 55, '9876543210', 'alice.johnson@example.com', 'Retired', 'London, UK', 'Manchester, UK', 'Brighton, UK', 'Sussex', '20 miles', 'Villa', NULL, NULL, NULL, NULL, 3, 2500, 350, 450, 250, 150, 'Yes', 400, 'Yes', 'Yes', 'Yes', 'Yes', 'Contemporary resort', 'Yes', 'Yes', 'Yes', 'Yes', 'More green spaces', 'Yes', 'Yes', 'Gym and spa', 'Environmental wellness, Physical wellness', 'Yes', 'Swimming pool, Football turf, Cafeteria, Super market, Health clinic with wellness park', '30L minimum', 'Couple', 'Yes', 'Rental income, ROI-based income', '2024-08-04 15:38:26'),
(10, 'SECOND HOME', 'Alice Johnson', 'Female', 'British', 55, '9876543210', 'alice.johnson@example.com', 'Retired', 'London, UK', 'Manchester, UK', 'Brighton, UK', 'Sussex', '20 miles', 'Villa', NULL, NULL, NULL, NULL, 3, 2500, 350, 450, 250, 150, 'Yes', 400, 'Yes', 'Yes', 'Yes', 'Yes', 'Contemporary resort', 'Yes', 'Yes', 'Yes', 'Yes', 'More green spaces', 'Yes', 'Yes', 'Gym and spa', 'Environmental wellness, Physical wellness', 'Yes', 'Swimming pool, Football turf, Cafeteria, Super market, Health clinic with wellness park', '30L minimum', 'Couple', 'Yes', 'Rental income, ROI-based income', '2024-08-04 15:38:39'),
(11, 'VACATION HOME WITH ROI FOR NRIs', 'Alice Johnson', 'Female', 'British', 55, '9876543210', 'alice.johnson@example.com', 'Retired', 'London, UK', 'Manchester, UK', 'Brighton, UK', 'Sussex', '20 miles', 'Villa', NULL, NULL, NULL, NULL, 3, 2500, 350, 450, 250, 150, 'Yes', 400, 'Yes', 'Yes', 'Yes', 'Yes', 'Contemporary resort', 'Yes', 'Yes', 'Yes', 'Yes', 'More green spaces', 'Yes', 'Yes', 'Gym and spa', 'Environmental wellness, Physical wellness', 'Yes', 'Swimming pool, Football turf, Cafeteria, Super market, Health clinic with wellness park', '30L minimum', 'Couple', 'Yes', 'Rental income, ROI-based income', '2024-08-04 15:38:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `mobile_number` varchar(15) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `mobile_number`, `created_at`, `updated_at`, `role`) VALUES
(1, 'Amal Ganesh', 'admin@gmail.com', '$2y$10$vKXtyEH3g6ufFxyMk1CZdup2JsYFNiv7QrkzFEfvQJ/Hg9nalYMwu', '7898767899', '2024-08-01 21:39:30', '2024-08-02 03:25:34', 'super_admin'),
(2, 'Shynesh Moolayi', 'demo@gmail.com', '$2y$10$ywBOQpTNeb7wcyBn8i29n.oNf.oi058LWcJir2OtbNhSGYfriE0q6', '7788998877', '2024-08-06 15:33:17', '2024-08-07 10:52:20', 'super_admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `survey_responses`
--
ALTER TABLE `survey_responses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `survey_responses`
--
ALTER TABLE `survey_responses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
